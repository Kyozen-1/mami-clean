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
use App\Models\LandingPage\LandingPageBeranda;

class BerandaController extends Controller
{
    public function index()
    {
        return view('mami-clean.landing-page.beranda.index');
    }

    public function store_section_1(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
            if($beranda->section_1)
            {
                $get_section_1 = json_decode($beranda->section_1, true);

                if ($request->gambar) {
                    $gambarName = $get_section_1['gambar'];
                    File::delete(public_path('images/landing-page/beranda/'.$gambarName));

                    $gambarExtension = $request->gambar->extension();
                    $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                    $gambar = Image::make($request->gambar);
                    $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
                    $gambar->save($gambarSize, 100);
                } else {
                    $gambarName = $get_section_1['gambar'];
                }
            } else {
                $gambarExtension = $request->gambar->extension();
                $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                $gambar = Image::make($request->gambar);
                $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
                $gambar->save($gambarSize, 100);
            }
        } else {
            $beranda = new LandingPageBeranda;

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
            $gambar->save($gambarSize, 100);
        }


        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarName
        ];

        $beranda->section_1 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 1');
        return redirect()->route('mami-clean.landing-page.beranda.index');
    }

    public function store_section_2(Request $request)
    {
        $section_2 = $request->section_2;
        $data = [];
        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $landingpage_beranda = LandingPageBeranda::find($cek->id);
            if($landingpage_beranda->section_2)
            {
                $data_section_2 = json_decode($landingpage_beranda->section_2, true);
                $data_lama = [];

                foreach ($data_section_2 as $item) {
                    $data_lama[] = [
                        'id' => $item['id'],
                        'judul' => $item['judul'],
                        'deskripsi' => $item['deskripsi'],
                        'ikon' => $item['ikon']
                    ];
                }

                $data_baru = [];
                for ($i=0; $i < count($section_2); $i++) {
                    $data_baru[] = [
                        'id' => uniqid(),
                        'judul' => $section_2[$i]['judul'],
                        'deskripsi' => $section_2[$i]['deskripsi'],
                        'ikon' => $section_2[$i]['ikon'],
                    ];
                }

                $data = array_merge($data_lama, $data_baru);
            } else {
                for ($i=0; $i < count($section_2); $i++) {
                    $data[] = [
                        'id' => uniqid(),
                        'judul' => $section_2[$i]['judul'],
                        'deskripsi' => $section_2[$i]['deskripsi'],
                        'ikon' => $section_2[$i]['ikon'],
                    ];
                }
            }
        } else {
            $landingpage_beranda = new LandingPageBeranda;

            for ($i=0; $i < count($section_2); $i++) {
                $data[] = [
                    'id' => uniqid(),
                    'judul' => $section_2[$i]['judul'],
                    'deskripsi' => $section_2[$i]['deskripsi'],
                    'ikon' => $section_2[$i]['ikon'],
                ];
            }
        }

        $landingpage_beranda->section_2 = json_encode($data);
        $landingpage_beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 2');
        return redirect()->route('mami-clean.landing-page.beranda.index');
    }

    public function hapus_section_2(Request $request)
    {
        $get = LandingPageBeranda::first();
        $array = [];
        foreach (json_decode($get->section_2) as $value) {
            if($value->id != $request->id)
            {
                $array[] = [
                    'id' => $value->id,
                    'judul' => $value->judul,
                    'deskripsi' => $value->deskripsi,
                    'ikon' => $value->ikon
                ];
            }
        }

        $landingpage_beranda = LandingPageBeranda::find($get->id);
        $landingpage_beranda->section_2 = json_encode($array);
        $landingpage_beranda->save();

        return response()->json('berhasil');
    }

    public function store_section_3(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
            'deskripsi_judul' => 'required',
            'deskripsi' => 'required',
            'tautan' => 'required'
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();

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
            $beranda = LandingPageBeranda::find($cek->id);
            if($cek->section_3)
            {
                $get_section_3 = json_decode($beranda->section_3, true);

                if($request->gambar_kecil)
                {
                    $gambarKecilName = $get_section_3['gambar_kecil'];
                    File::delete(public_path('images/landing-page/beranda/'.$gambarKecilName));

                    $gambarKecilExtension = $request->gambar_kecil->extension();
                    $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
                    $gambarKecil = Image::make($request->gambar_kecil);
                    $gambarKecilSize = public_path('images/landing-page/beranda/'.$gambarKecilName);
                    $gambarKecil->save($gambarKecilSize, 100);
                } else {
                    $gambarKecilName = $get_section_3['gambar_kecil'];
                }

                if($request->gambar_besar)
                {
                    $gambarBesarName = $get_section_3['gambar_besar'];
                    File::delete(public_path('images/landing-page/beranda/'.$gambarBesarName));

                    $gambarBesarExtension = $request->gambar_besar->extension();
                    $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
                    $gambarBesar = Image::make($request->gambar_besar);
                    $gambarBesarSize = public_path('images/landing-page/beranda/'.$gambarBesarName);
                    $gambarBesar->save($gambarBesarSize, 100);
                } else {
                    $gambarBesarName = $get_section_3['gambar_besar'];
                }

                if($get_section_3['konten'] != '')
                {
                    $konten = $get_section_3['konten'];
                } else {
                    $konten = '';
                }
            } else {

                $gambarKecilExtension = $request->gambar_kecil->extension();
                $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
                $gambarKecil = Image::make($request->gambar_kecil);
                $gambarKecilSize = public_path('images/landing-page/beranda/'.$gambarKecilName);
                $gambarKecil->save($gambarKecilSize, 100);

                $gambarBesarExtension = $request->gambar_besar->extension();
                $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
                $gambarBesar = Image::make($request->gambar_besar);
                $gambarBesarSize = public_path('images/landing-page/beranda/'.$gambarBesarName);
                $gambarBesar->save($gambarBesarSize, 100);

                $konten = '';
            }

        } else {
            $beranda = new LandingPageBeranda;
            $gambarKecilExtension = $request->gambar_kecil->extension();
            $gambarKecilName =  uniqid().'-'.date("ymd").'.'.$gambarKecilExtension;
            $gambarKecil = Image::make($request->gambar_kecil);
            $gambarKecilSize = public_path('images/landing-page/beranda/'.$gambarKecilName);
            $gambarKecil->save($gambarKecilSize, 100);

            $gambarBesarExtension = $request->gambar_besar->extension();
            $gambarBesarName =  uniqid().'-'.date("ymd").'.'.$gambarBesarExtension;
            $gambarBesar = Image::make($request->gambar_besar);
            $gambarBesarSize = public_path('images/landing-page/beranda/'.$gambarBesarName);
            $gambarBesar->save($gambarBesarSize, 100);

            $konten = '';
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul,
            'deskripsi_judul' => $request->deskripsi_judul,
            'deskripsi' => $request->deskripsi,
            'tautan' => $url,
            'gambar_kecil' => $gambarKecilName,
            'gambar_besar' => $gambarBesarName,
            'konten' => $konten
        ];

        $beranda->section_3 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 3');
        return redirect()->route('mami-clean.landing-page.beranda.index');
    }

    public function store_section_3_konten(Request $request)
    {
        $konten_section_3 = $request->section_3;

        $get = LandingPageBeranda::first();

        if($get->section_3)
        {
            $beranda = LandingPageBeranda::find($get->id);

            $data_section_3 = json_decode($get->section_3, true);

            if($data_section_3['konten'] == '')
            {
                for ($i=0; $i < count($konten_section_3); $i++) {
                    $data[] = [
                        'id' => uniqid(),
                        'item' => $konten_section_3[$i]['item']
                    ];
                }
            } else {
                $data_lama = [];
                foreach ($data_section_3['konten'] as $value) {
                    $data_lama[] = [
                        'id' => $value['id'],
                        'item' => $value['item']
                    ];
                }

                $data_baru = [];
                for ($i=0; $i < count($konten_section_3); $i++) {
                    $data_baru[] = [
                        'id' => uniqid(),
                        'item' => $konten_section_3[$i]['item']
                    ];
                }

                $data = array_merge($data_lama, $data_baru);
            }

            $array = [
                'sub_judul' => $data_section_3['sub_judul'],
                'judul' => $data_section_3['judul'],
                'deskripsi_judul' => $data_section_3['deskripsi_judul'],
                'deskripsi' => $data_section_3['deskripsi'],
                'tautan' => $data_section_3['tautan'],
                'gambar_kecil' => $data_section_3['gambar_kecil'],
                'gambar_besar' => $data_section_3['gambar_besar'],
                'konten' => $data
            ];

            $beranda->section_3 = json_encode($array);
            $beranda->save();

            Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 2');
            return redirect()->route('mami-clean.landing-page.beranda.index');
        } else {
            Alert::error('Gagal!', 'Isi terlebih dahulu section 3');
            return redirect()->route('mami-clean.landing-page.beranda.index');
        }
    }

    public function hapus_section_3_konten(Request $request)
    {
        $get = LandingPageBeranda::first();
        $data = [];
        $data_section_3 = json_decode($get->section_3, true);
        foreach ($data_section_3['konten'] as $value) {
            if($value['id'] != $request->id)
            {
                $data[] = [
                    'id' => $value['id'],
                    'item' => $value['item']
                ];
            }
        }

        $landingpage_beranda = LandingPageBeranda::find($get->id);
        $array = [
            'sub_judul' => $data_section_3['sub_judul'],
            'judul' => $data_section_3['judul'],
            'deskripsi_judul' => $data_section_3['deskripsi_judul'],
            'deskripsi' => $data_section_3['deskripsi'],
            'tautan' => $data_section_3['tautan'],
            'gambar_kecil' => $data_section_3['gambar_kecil'],
            'gambar_besar' => $data_section_3['gambar_besar'],
            'konten' => $data
        ];
        $landingpage_beranda->section_3 = json_encode($array);
        $landingpage_beranda->save();

        return response()->json(['success' => 'Berhasil menghapus']);
    }

    public function store_section_4(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
        } else {
            $beranda = new LandingPageBeranda;
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul
        ];

        $beranda->section_4 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 4');
        return redirect()->route('mami-clean.landing-page.beranda.index');
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
            return redirect()->route('mami-clean.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
            if($beranda->section_5)
            {
                $get_section_5 = json_decode($beranda->section_5, true);

                if ($request->gambar) {
                    $gambarName = $get_section_5['gambar'];
                    File::delete(public_path('images/landing-page/beranda/'.$gambarName));

                    $gambarExtension = $request->gambar->extension();
                    $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                    $gambar = Image::make($request->gambar);
                    $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
                    $gambar->save($gambarSize, 100);
                } else {
                    $gambarName = $get_section_5['gambar'];
                }
            } else {
                $gambarExtension = $request->gambar->extension();
                $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                $gambar = Image::make($request->gambar);
                $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
                $gambar->save($gambarSize, 100);
            }
        } else {
            $beranda = new LandingPageBeranda;

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
            $gambar->save($gambarSize, 100);
        }


        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul,
            'gambar' => $gambarName
        ];

        $beranda->section_5 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 5');
        return redirect()->route('mami-clean.landing-page.beranda.index');
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
            return redirect()->route('mami-clean.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
        } else {
            $beranda = new LandingPageBeranda;
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul
        ];

        $beranda->section_6 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 6');
        return redirect()->route('mami-clean.landing-page.beranda.index');
    }

    public function store_section_7(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
        } else {
            $beranda = new LandingPageBeranda;
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul
        ];

        $beranda->section_7 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 7');
        return redirect()->route('mami-clean.landing-page.beranda.index');
    }

    public function store_section_8(Request $request)
    {
        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
            if($beranda->section_8)
            {
                $get_section_8 = json_decode($beranda->section_8, true);

                if ($request->gambar) {
                    $gambarName = $get_section_8['gambar'];
                    File::delete(public_path('images/landing-page/beranda/'.$gambarName));

                    $gambarExtension = $request->gambar->extension();
                    $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                    $gambar = Image::make($request->gambar);
                    $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
                    $gambar->save($gambarSize, 100);
                } else {
                    $gambarName = $get_section_8['gambar'];
                }
            } else {
                $gambarExtension = $request->gambar->extension();
                $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
                $gambar = Image::make($request->gambar);
                $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
                $gambar->save($gambarSize, 100);
            }
        } else {
            $beranda = new LandingPageBeranda;

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
            $gambar->save($gambarSize, 100);
        }

        $array = [
            'gambar' => $gambarName
        ];

        $beranda->section_8 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 8');
        return redirect()->route('mami-clean.landing-page.beranda.index');
    }

    public function store_section_9(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'sub_judul' => 'required',
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('mami-clean.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
        } else {
            $beranda = new LandingPageBeranda;
        }

        $array = [
            'sub_judul' => $request->sub_judul,
            'judul' => $request->judul
        ];

        $beranda->section_9 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 9');
        return redirect()->route('mami-clean.landing-page.beranda.index');
    }
}
