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
use App\Models\LandingPageLayanan;

class LayananController extends Controller
{
    public function index()
    {
        return view('mami-clean.landing-page.layanan.index');
    }

    public function store_section_1(Request $request)
    {
        $cek = LandingPageLayanan::first();
        if($cek)
        {
            $layanan = LandingPageLayanan::find($cek->id);
            if($layanan->section_1)
            {
                $get_section_1 = json_decode($layanan->section_1, true);

                if ($request->gambar) {
                    $gambarName = $get_section_1['gambar'];
                    File::delete(public_path('images/landing-page/layanan/'.$gambarName));

                    $gambarExtension = $request->gambar->extension();
                    $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                    $gambar = Image::make($request->gambar);
                    $gambarSize = public_path('images/landing-page/layanan/'.$gambarName);
                    $gambar->save($gambarSize, 100);
                } else {
                    $gambarName = $get_section_1['gambar'];
                }
            } else {
                $gambarExtension = $request->gambar->extension();
                $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                $gambar = Image::make($request->gambar);
                $gambarSize = public_path('images/landing-page/layanan/'.$gambarName);
                $gambar->save($gambarSize, 100);
            }
        } else {
            $layanan = new LandingPageLayanan;

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/landing-page/layanan/'.$gambarName);
            $gambar->save($gambarSize, 100);
        }

        $array = [
            'gambar' => $gambarName
        ];

        $layanan->section_1 = json_encode($array);
        $layanan->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 1');
        return redirect()->route('mami-clean.landing-page.layanan.index');
    }
}
