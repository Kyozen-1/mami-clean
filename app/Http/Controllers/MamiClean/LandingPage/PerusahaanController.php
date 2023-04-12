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
use App\Models\LandingPagePerusahaan;

class PerusahaanController extends Controller
{
    public function index()
    {
        return view('mami-clean.landing-page.perusahaan.index');
    }

    public function store_section_1(Request $request)
    {
        $cek = LandingPagePerusahaan::first();
        if($cek)
        {
            $perusahaan = LandingPagePerusahaan::find($cek->id);
            if($perusahaan->section_1)
            {
                $get_section_1 = json_decode($perusahaan->section_1, true);

                if ($request->gambar) {
                    $gambarName = $get_section_1['gambar'];
                    File::delete(public_path('images/landing-page/perusahaan/'.$gambarName));

                    $gambarExtension = $request->gambar->extension();
                    $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                    $gambar = Image::make($request->gambar);
                    $gambarSize = public_path('images/landing-page/perusahaan/'.$gambarName);
                    $gambar->save($gambarSize, 100);
                } else {
                    $gambarName = $get_section_1['gambar'];
                }
            } else {
                $gambarExtension = $request->gambar->extension();
                $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                $gambar = Image::make($request->gambar);
                $gambarSize = public_path('images/landing-page/perusahaan/'.$gambarName);
                $gambar->save($gambarSize, 100);
            }
        } else {
            $perusahaan = new LandingPagePerusahaan;

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/landing-page/perusahaan/'.$gambarName);
            $gambar->save($gambarSize, 100);
        }

        $array = [
            'gambar' => $gambarName
        ];

        $perusahaan->section_1 = json_encode($array);
        $perusahaan->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 1');
        return redirect()->route('mami-clean.landing-page.perusahaan.index');
    }

    public function store_section_2(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.perusahaan.index');
        }

        $cek = LandingPagePerusahaan::first();

        if($cek)
        {
            $perusahaan = LandingPagePerusahaan::find($cek->id);
            if($cek->section_2)
            {
                $get_section_2 = json_decode($perusahaan->section_2, true);

                if($request->gambar_kecil)
                {
                    $gambarKecilName = $get_section_2['gambar_kecil'];
                    File::delete(public_path('images/landing-page/perusahaan/'.$gambarKecilName));

                    $gambarKecilExtension = $request->gambar_kecil->extension();
                    $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
                    $gambarKecil = Image::make($request->gambar_kecil);
                    $gambarKecilSize = public_path('images/landing-page/perusahaan/'.$gambarKecilName);
                    $gambarKecil->save($gambarKecilSize, 100);
                } else {
                    $gambarKecilName = $get_section_2['gambar_kecil'];
                }

                if($request->gambar_besar)
                {
                    $gambarBesarName = $get_section_2['gambar_besar'];
                    File::delete(public_path('images/landing-page/perusahaan/'.$gambarBesarName));

                    $gambarBesarExtension = $request->gambar_besar->extension();
                    $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
                    $gambarBesar = Image::make($request->gambar_besar);
                    $gambarBesarSize = public_path('images/landing-page/perusahaan/'.$gambarBesarName);
                    $gambarBesar->save($gambarBesarSize, 100);
                } else {
                    $gambarBesarName = $get_section_2['gambar_besar'];
                }

            } else {
                $gambarKecilExtension = $request->gambar_kecil->extension();
                $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
                $gambarKecil = Image::make($request->gambar_kecil);
                $gambarKecilSize = public_path('images/landing-page/perusahaan/'.$gambarKecilName);
                $gambarKecil->save($gambarKecilSize, 100);

                $gambarBesarExtension = $request->gambar_besar->extension();
                $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
                $gambarBesar = Image::make($request->gambar_besar);
                $gambarBesarSize = public_path('images/landing-page/perusahaan/'.$gambarBesarName);
                $gambarBesar->save($gambarBesarSize, 100);
            }

        } else {
            $perusahaan = new LandingPagePerusahaan;
            $gambarKecilExtension = $request->gambar_kecil->extension();
            $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
            $gambarKecil = Image::make($request->gambar_kecil);
            $gambarKecilSize = public_path('images/landing-page/perusahaan/'.$gambarKecilName);
            $gambarKecil->save($gambarKecilSize, 100);

            $gambarBesarExtension = $request->gambar_besar->extension();
            $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
            $gambarBesar = Image::make($request->gambar_besar);
            $gambarBesarSize = public_path('images/landing-page/perusahaan/'.$gambarBesarName);
            $gambarBesar->save($gambarBesarSize, 100);
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar_kecil' => $gambarKecilName,
            'gambar_besar' => $gambarBesarName
        ];

        $perusahaan->section_2 = json_encode($array);
        $perusahaan->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 2');
        return redirect()->route('mami-clean.landing-page.perusahaan.index');
    }

    public function store_section_3(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.perusahaan.index');
        }

        $cek = LandingPagePerusahaan::first();
        if($cek)
        {
            $perusahaan = LandingPagePerusahaan::find($cek->id);
        } else {
            $perusahaan = new LandingPagePerusahaan;
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul
        ];

        $perusahaan->section_3 = json_encode($array);
        $perusahaan->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 3');
        return redirect()->route('mami-clean.landing-page.perusahaan.index');
    }

    public function store_section_4(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tautan' => 'required'
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.perusahaan.index');
        }

        $cek = LandingPagePerusahaan::first();

        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $request->tautan, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $request->tautan, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        $url = 'https://www.youtube.com/embed/' . $youtube_id ;

        if($cek)
        {
            $perusahaan = LandingPagePerusahaan::find($cek->id);
            if($cek->section_4)
            {
                $get_section_4 = json_decode($perusahaan->section_4, true);

                if($request->gambar_kecil)
                {
                    $gambarKecilName = $get_section_4['gambar_kecil'];
                    File::delete(public_path('images/landing-page/perusahaan/'.$gambarKecilName));

                    $gambarKecilExtension = $request->gambar_kecil->extension();
                    $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
                    $gambarKecil = Image::make($request->gambar_kecil);
                    $gambarKecilSize = public_path('images/landing-page/perusahaan/'.$gambarKecilName);
                    $gambarKecil->save($gambarKecilSize, 100);
                } else {
                    $gambarKecilName = $get_section_4['gambar_kecil'];
                }

                if($request->gambar_besar)
                {
                    $gambarBesarName = $get_section_4['gambar_besar'];
                    File::delete(public_path('images/landing-page/perusahaan/'.$gambarBesarName));

                    $gambarBesarExtension = $request->gambar_besar->extension();
                    $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
                    $gambarBesar = Image::make($request->gambar_besar);
                    $gambarBesarSize = public_path('images/landing-page/perusahaan/'.$gambarBesarName);
                    $gambarBesar->save($gambarBesarSize, 100);
                } else {
                    $gambarBesarName = $get_section_4['gambar_besar'];
                }
            } else {

                $gambarKecilExtension = $request->gambar_kecil->extension();
                $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
                $gambarKecil = Image::make($request->gambar_kecil);
                $gambarKecilSize = public_path('images/landing-page/perusahaan/'.$gambarKecilName);
                $gambarKecil->save($gambarKecilSize, 100);

                $gambarBesarExtension = $request->gambar_besar->extension();
                $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
                $gambarBesar = Image::make($request->gambar_besar);
                $gambarBesarSize = public_path('images/landing-page/perusahaan/'.$gambarBesarName);
                $gambarBesar->save($gambarBesarSize, 100);
            }

        } else {
            $perusahaan = new LandingPagePerusahaan;
            $gambarKecilExtension = $request->gambar_kecil->extension();
            $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
            $gambarKecil = Image::make($request->gambar_kecil);
            $gambarKecilSize = public_path('images/landing-page/perusahaan/'.$gambarKecilName);
            $gambarKecil->save($gambarKecilSize, 100);

            $gambarBesarExtension = $request->gambar_besar->extension();
            $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
            $gambarBesar = Image::make($request->gambar_besar);
            $gambarBesarSize = public_path('images/landing-page/perusahaan/'.$gambarBesarName);
            $gambarBesar->save($gambarBesarSize, 100);
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tautan' => $url,
            'gambar_kecil' => $gambarKecilName,
            'gambar_besar' => $gambarBesarName,
        ];

        $perusahaan->section_4 = json_encode($array);
        $perusahaan->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 4');
        return redirect()->route('mami-clean.landing-page.perusahaan.index');
    }

    public function store_section_5(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.perusahaan.index');
        }

        $cek = LandingPagePerusahaan::first();
        if($cek)
        {
            $perusahaan = LandingPagePerusahaan::find($cek->id);
        } else {
            $perusahaan = new LandingPagePerusahaan;
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul
        ];

        $perusahaan->section_5 = json_encode($array);
        $perusahaan->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 5');
        return redirect()->route('mami-clean.landing-page.perusahaan.index');
    }

    public function store_section_6(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.perusahaan.index');
        }

        $cek = LandingPagePerusahaan::first();
        if($cek)
        {
            $perusahaan = LandingPagePerusahaan::find($cek->id);
        } else {
            $perusahaan = new LandingPagePerusahaan;
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul
        ];

        $perusahaan->section_6 = json_encode($array);
        $perusahaan->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 6');
        return redirect()->route('mami-clean.landing-page.perusahaan.index');
    }
}
