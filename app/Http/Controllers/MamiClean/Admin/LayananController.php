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
use App\Models\Layanan;

class LayananController extends Controller
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
            $data = Layanan::latest()->get();
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
                ->editColumn('ikon', function($data){
                    return $data->ikon;
                })
                ->editColumn('gambar_kecil', function($data) {
                    return '<img src="'.asset('images/mami-clean/layanan/'.$data->gambar_kecil).'" style="height:5rem;">';
                })
                ->editColumn('gambar_besar', function($data) {
                    return '<img src="'.asset('images/mami-clean/layanan/'.$data->gambar_besar).'" style="height:5rem;">';
                })
                ->editColumn('deskripsi_mini', function($data) {
                    return strip_tags(substr($data->deskripsi_mini,0, 30)) . '...';
                })
                ->editColumn('deskripsi', function($data) {
                    return strip_tags(substr($data->deskripsi,0, 30)) . '...';
                })
                ->rawColumns(['aksi', 'gambar_kecil', 'gambar_besar','ikon'])
                ->make(true);
        }
        return view('mami-clean.admin.layanan.index');
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
            'judul' => 'required | max:255',
            'deskripsi_mini' => 'required',
            'deskripsi' => 'required',
            'ikon' => 'required',
            'gambar_kecil' => 'required | mimes:png,jpg,jpeg,webp',
            'gambar_besar' => 'required | mimes:png,jpg,jpeg,webp'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $gambarKecilExtension = $request->gambar_kecil->extension();
        $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
        $gambarKecil = Image::make($request->gambar_kecil);
        $gambarKecilSize = public_path('images/mami-clean/layanan/'.$gambarKecilName);
        $gambarKecil->save($gambarKecilSize, 60);

        $gambarBesarExtension = $request->gambar_besar->extension();
        $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
        $gambarBesar = Image::make($request->gambar_besar);
        $gambarBesarSize = public_path('images/mami-clean/layanan/'.$gambarBesarName);
        $gambarBesar->save($gambarBesarSize, 60);

        $layanan = new Layanan;
        $layanan->judul = $request->judul;
        $layanan->deskripsi_mini = $request->deskripsi_mini;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->ikon = $request->ikon;
        $layanan->gambar_kecil = $gambarKecilName;
        $layanan->gambar_besar = $gambarBesarName;
        $layanan->save();

        return response()->json(['success' => 'Berhasil menambahkan layanan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['result' => Layanan::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(['result' => Layanan::find($id)]);
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
            'judul' => 'required | max:255',
            'deskripsi_mini' => 'required',
            'deskripsi' => 'required',
            'ikon' => 'required'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        if($request->gambar_kecil)
        {
            $errors = Validator::make($request->all(), [
                'gambar_kecil' => 'required | mimes:png,jpg,jpeg,webp'
            ]);

            if($errors -> fails())
            {
                return response()->json(['errors' => $errors->errors()->all()]);
            }
        }

        if($request->gambar_besar)
        {
            $errors = Validator::make($request->all(), [
                'gambar_besar' => 'required | mimes:png,jpg,jpeg,webp'
            ]);

            if($errors -> fails())
            {
                return response()->json(['errors' => $errors->errors()->all()]);
            }
        }

        $layanan = Layanan::find($request->hidden_id);
        $layanan->judul = $request->judul;
        $layanan->deskripsi_mini = $request->deskripsi_mini;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->ikon = $request->ikon;
        if($request->gambar_kecil)
        {
            File::delete(public_path('images/mami-clean/layanan/'.$layanan->gambar_kecil));

            $gambarKecilExtension = $request->gambar_kecil->extension();
            $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
            $gambarKecil = Image::make($request->gambar_kecil);
            $gambarKecilSize = public_path('images/mami-clean/layanan/'.$gambarKecilName);
            $gambarKecil->save($gambarKecilSize, 60);

            $layanan->gambar_kecil = $gambarKecilName;
        }

        if($request->gambar_besar)
        {
            File::delete(public_path('images/mami-clean/layanan/'.$layanan->gambar_besar));

            $gambarBesarExtension = $request->gambar_besar->extension();
            $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
            $gambarBesar = Image::make($request->gambar_besar);
            $gambarBesarSize = public_path('images/mami-clean/layanan/'.$gambarBesarName);
            $gambarBesar->save($gambarBesarSize, 60);

            $layanan->gambar_besar = $gambarBesarName;
        }
        $layanan->save();

        return response()->json(['success' => 'Berhasil menambahkan layanan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan = Layanan::find($id);

        File::delete(public_path('images/mami-clean/layanan/'.$layanan->gambar_kecil));

        File::delete(public_path('images/mami-clean/layanan/'.$layanan->gambar_besar));

        $layanan->delete();
    }
}
