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
use App\Models\MasterMediaSosial;
use App\Models\PivotProfilMediaSosial;
use App\Models\Profil;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media_sosial = MasterMediaSosial::pluck('nama', 'id');
        $profil = Profil::first();

        $cek_pivot = PivotProfilMediaSosial::where('profil_id', $profil->id)->first();
        $pivot_profil_media_sosial = [];
        if($cek_pivot)
        {
            $pivot_profil_media_sosial = [
                'status' => 'ada',
                'pivot' => PivotProfilMediaSosial::where('profil_id', $profil->id)->get()
            ];
        } else {
            $pivot_profil_media_sosial = [
                'status' => 'tidak ada',
                'pivot' => ''
            ];
        }

        return view('mami-clean.admin.profil.index', [
            'media_sosial' => $media_sosial,
            'profil' => $profil,
            'pivot_profil_media_sosial' => $pivot_profil_media_sosial
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
            'nama' => 'required | max:255',
            'pt' => 'required | max:255',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_mulai_usaha' => 'required',
            'kerja_dari_jam' => 'required',
            'kerja_sampai_jam' => 'required',
            'kerja_dari_hari' => 'required',
            'kerja_sampai_hari' => 'required',
        ]);
        if($errors -> fails())
        {
            return back()->withErrors($errors)->withInput();
        }

        if($request->logo)
        {
            $errors = Validator::make($request->all(), [
                'logo' => 'mimes:png,jpeg,jpg,webp',
            ]);
            if($errors -> fails())
            {
                return back()->withErrors($errors)->withInput();
            }
        }
        $get_profil = Profil::first();
        if($get_profil)
        {
            $profil = Profil::find($get_profil->id);
        } else {
            $profil = new Profil;
        }

        $profil->nama = $request->nama;
        $profil->pt = $request->pt;
        $profil->no_hp = $request->no_hp;
        $profil->email = $request->email;
        $profil->alamat = $request->alamat;
        $profil->tanggal_mulai_usaha = $request->tanggal_mulai_usaha;
        $profil->kerja_dari_jam = $request->kerja_dari_jam;
        $profil->kerja_sampai_jam = $request->kerja_sampai_jam;
        $profil->kerja_dari_hari = $request->kerja_dari_hari;
        $profil->kerja_sampai_hari = $request->kerja_sampai_hari;

        if($request->logo)
        {
            File::delete(public_path('images/mami-clean/logo/'.$profil->logo));

            $logoExtension = $request->logo->extension();
            $logoName =  uniqid().'-'.date("ymd").'.'.$logoExtension;
            $logo = Image::make($request->logo);
            $logoSize = public_path('images/mami-clean/logo/'.$logoName);
            $logo->save($logoSize, 60);

            $profil->logo = $logoName;
        }

        $profil->save();

        Alert::success('Berhasil', 'Berhasil memperbaharui profil');
        return redirect()->route('mami-clean.admin.profil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function edit_media_sosial_profil(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $id = $request->id;
        for ($i=0; $i < count($id); $i++) {
            PivotProfilMediaSosial::find($id[$i])->delete();
        }

        return response()->json(['success' => 'Berhasil menghapus']);
    }

    public function tambah_media_sosial_profil(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'data_media_sosial' => 'required',
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $dataMediaSosial = $request->data_media_sosial;

        for ($i=0; $i < count($dataMediaSosial); $i++) {
            $pivot_profil_media_sosial = new PivotProfilMediaSosial;
            $pivot_profil_media_sosial->master_media_sosial_id = $dataMediaSosial[$i]['master_media_sosial_id'];
            $pivot_profil_media_sosial->profil_id = $dataMediaSosial[$i]['profil_id'];
            $pivot_profil_media_sosial->tautan = $dataMediaSosial[$i]['tautan'];
            $pivot_profil_media_sosial->save();
        }

        return response()->json(['success' => 'Data media sosial profil berhasil ditambahkan!']);
    }
}
