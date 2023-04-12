<?php

namespace App\Http\Controllers\MamiClean\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Validator;
use DataTables;
use Carbon\Carbon;
use Auth;
use App\Models\Brosur;
use App\Models\Layanan;

class BrosurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $data = Brosur::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $button_show = '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-icon waves-effect btn-info" title="Detail Data"><i class="fas fa-eye"></i></button>';
                    $button_edit = '<button type="button" name="edit" id="'.$data->id.'"
                    class="edit btn btn-icon waves-effect btn-warning" title="Edit Data"><i class="fas fa-edit"></i></button>';
                    $button_delete = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-icon waves-effect btn-danger" title="Delete Data"><i class="fas fa-trash"></i></button>';
                    $button = $button_show . ' ' . $button_edit . ' ' . $button_delete;
                    return $button;
                })
                ->editColumn('berkas', function($data) {
                    return '<embed src="'.asset('berkas/brosur/'.$data->berkas).'" style="width: 100%; height: 20rem;">';
                })
                ->editColumn('layanan_id', function($data) {
                    return $data->layanan?$data->layanan->judul:'';
                })
                ->editColumn('status', function($data){
                    if($data->status == '1')
                    {
                        return 'aktif';
                    } else {
                        return 'tidak aktif';
                    }
                })
                ->rawColumns(['aksi', 'berkas'])
                ->make(true);
        }
        $layanan = Layanan::pluck('judul', 'id');
        return view('mami-clean.admin.brosur.index', [
            'layanan' => $layanan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'status_brosur' => 'required',
            'nama' => 'required',
            'berkas' => 'required | mimes:pdf'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $cek_brosur = Brosur::where('status', 1)->where('status_brosur', $request->status_brosur);
        if($request->layanan_id)
        {
            $cek_brosur = $cek_brosur->where('layanan_id', $request->layanan_id);
        }
        $cek_brosur = $cek_brosur->first();

        if($cek_brosur)
        {
            return response()->json(['errors' => 'Tidak dapat menyimpan karena ada brosur yang aktif!']);
        }

        $berkasExtension = $request->berkas->extension();
        $berkasName = uniqid().'-'.date("ymd").'.'.$berkasExtension;
        $request->berkas->move(public_path('berkas/brosur'), $berkasName);

        $brosur = new Brosur;
        $brosur->status_brosur = $request->status_brosur;
        if($request->layanan_id)
        {
            $brosur->layanan_id = $request->layanan_id;
        }
        $brosur->nama = $request->nama;
        $brosur->berkas = $berkasName;
        $brosur->status = '1';
        $brosur->save();

        return response()->json(['success' => 'Berhasil Menyimpan Brosur!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Brosur::find($id);

        $layanan = Layanan::find($data->layanan_id);

        $data['layanan'] = $layanan->judul;

        return response()->json(['result' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(['result' => Brosur::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'status_brosur' => 'required',
            'nama' => 'required',
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        if($request->berkas)
        {
            $errors = Validator::make($request->all(), [
                'berkas' => 'mimes:pdf'
            ]);

            if($errors -> fails())
            {
                return response()->json(['errors' => $errors->errors()->all()]);
            }
        }

        $brosur = Brosur::find($request->hidden_id);

        $cek_brosur = Brosur::where('status', '1')->where('status_brosur', $request->status_brosur);
        if($request->layanan_id)
        {
            $cek_brosur = $cek_brosur->where('layanan_id', $request->layanan_id);
        }
        $cek_brosur = $cek_brosur->first();

        if($cek_brosur)
        {
            if($cek_brosur->id != $request->hidden_id)
            {
                return response()->json(['errors' => 'Tidak dapat menyimpan karena ada brosur yang aktif!']);
            }
        }

        $brosur->status_brosur = $request->status_brosur;
        if($request->layanan_id)
        {
            $brosur->layanan_id = $request->layanan_id;
        }
        $brosur->nama = $request->nama;
        if($request->brosur)
        {
            File::delete(public_path('berkas/brosur/'.$brosur->berkas));

            $berkasExtension = $request->berkas->extension();
            $berkasName = uniqid().'-'.date("ymd").'.'.$berkasExtension;
            $request->berkas->move(public_path('berkas/brosur'), $berkasName);
            $brosur->berkas = $berkasName;
        }
        $brosur->status = $request->status_aktif;
        $brosur->save();

        return response()->json(['success' => 'Berhasil Menyimpan Brosur!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brosur = Brosur::find($id);

        File::delete(public_path('berkas/brosur/'.$brosur->berkas));

        $brosur->delete();
    }
}
