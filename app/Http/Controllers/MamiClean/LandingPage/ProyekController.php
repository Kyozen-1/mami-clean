<?php

namespace App\Http\Controllers\MamiClean\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Validator;
use Carbon\Carbon;
use App\Models\LandingPageProyek;

class ProyekController extends Controller
{
    public function index()
    {
        return view('mami-clean.landing-page.proyek.index');
    }

    public function store_section_1(Request $request)
    {
        $cek = LandingPageProyek::first();
        if($cek)
        {
            $proyek = LandingPageProyek::find($cek->id);
            if($proyek->section_1)
            {
                $get_section_1 = json_decode($proyek->section_1, true);

                if ($request->gambar) {
                    $gambarName = $get_section_1['gambar'];
                    File::delete(public_path('images/landing-page/proyek/'.$gambarName));

                    $gambarExtension = $request->gambar->extension();
                    $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                    $gambar = Image::make($request->gambar);
                    $gambarSize = public_path('images/landing-page/proyek/'.$gambarName);
                    $gambar->save($gambarSize, 100);
                } else {
                    $gambarName = $get_section_1['gambar'];
                }
            } else {
                $gambarExtension = $request->gambar->extension();
                $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                $gambar = Image::make($request->gambar);
                $gambarSize = public_path('images/landing-page/proyek/'.$gambarName);
                $gambar->save($gambarSize, 100);
            }
        } else {
            $proyek = new LandingPageProyek;

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/landing-page/proyek/'.$gambarName);
            $gambar->save($gambarSize, 100);
        }

        $array = [
            'gambar' => $gambarName
        ];

        $proyek->section_1 = json_encode($array);
        $proyek->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 1');
        return redirect()->route('mami-clean.landing-page.proyek.index');
    }
}
