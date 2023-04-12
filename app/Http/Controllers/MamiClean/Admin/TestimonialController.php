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
use App\Models\Testimonial;

class TestimonialController extends Controller
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
            $data = Testimonial::latest()->get();
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
                ->editColumn('foto', function($data) {
                    return '<img src="'.asset('images/mami-clean/testimoni/'.$data->foto).'" style="height:5rem;">';
                })
                ->editColumn('testimonial', function($data) {
                    return strip_tags(substr($data->testimonial,0, 30)) . '...';
                })
                ->rawColumns(['aksi', 'foto'])
                ->make(true);
        }
        return view('mami-clean.admin.testimonial.index');
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
            'nama' => 'required | max:255',
            'jabatan' => 'required | max:255',
            'foto' => 'required | mimes:png,jpg,jpeg,webp',
            'testimonial' => 'required'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $fotoExtension = $request->foto->extension();
        $fotoName =  uniqid().'-'.date("ymd").'.'.$fotoExtension;
        $foto = Image::make($request->foto);
        $fotoSize = public_path('images/mami-clean/testimoni/'.$fotoName);
        $foto->save($fotoSize, 60);

        $testimonial = new Testimonial;
        $testimonial->nama = $request->nama;
        $testimonial->jabatan = $request->jabatan;
        $testimonial->foto = $fotoName;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->save();

        return response()->json(['success' => 'Berhasil menambahkan testimoni']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Testimonial::find($id);

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
        $data = Testimonial::find($id);

        return response()->json(['result' => $data]);
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
            'nama' => 'required | max:255',
            'jabatan' => 'required | max:255',
            'testimonial' => 'required'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        if($request->foto)
        {
            $errors = Validator::make($request->all(), [
                'foto' => 'mimes:png,jpg,jpeg,webp'
            ]);

            if($errors -> fails())
            {
                return response()->json(['errors' => $errors->errors()->all()]);
            }
        }

        $testimonial = Testimonial::find($request->hidden_id);
        $testimonial->nama = $request->nama;
        $testimonial->jabatan = $request->jabatan;

        if($request->foto)
        {
            File::delete(public_path('images/mami-clean/testimoni/'.$testimonial->foto));

            $fotoExtension = $request->foto->extension();
            $fotoName =  uniqid().'-'.date("ymd").'.'.$fotoExtension;
            $foto = Image::make($request->foto);
            $fotoSize = public_path('images/mami-clean/testimoni/'.$fotoName);
            $foto->save($fotoSize, 60);

            $testimonial->foto = $fotoName;
        }

        $testimonial->testimonial = $request->testimonial;
        $testimonial->save();

        return response()->json(['success' => 'Berhasil merubah data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        File::delete(public_path('images/mami-clean/testimoni/'.$testimonial->foto));

        $testimonial->delete();
    }
}
