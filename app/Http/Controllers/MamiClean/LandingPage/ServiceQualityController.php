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
use App\Models\ServiceQuality;
use App\Models\PivotFaqServiceQuality;

class ServiceQualityController extends Controller
{
    public function index()
    {
        $service_quality = ServiceQuality::first();

        $cek_faq = PivotFaqServiceQuality::where('service_quality_id', $service_quality->id)->first();
        $pivot_faq = [];
        if($cek_faq)
        {
            $pivot_faq = [
                'status' => 'ada',
                'pivot' => PivotFaqServiceQuality::where('service_quality_id', $service_quality->id)->get()
            ];
        } else {
            $pivot_faq = [
                'status' => 'tidak ada',
                'pivot' => ''
            ];
        }
        return view('mami-clean.landing-page.service-quality.index', [
            'service_quality' => $service_quality,
            'pivot_faq' => $pivot_faq
        ]);
    }

    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'judul' => 'required | max:255',
            'deskripsi' => 'required',
        ]);
        if($errors -> fails())
        {
            return back()->withErrors($errors)->withInput();
        }

        if($request->logo)
        {
            $errors = Validator::make($request->all(), [
                'before_img' => 'mimes:png,jpeg,jpg',
                'after_img' => 'mimes:png,jpeg,jpg',
            ]);
            if($errors -> fails())
            {
                return back()->withErrors($errors)->withInput();
            }
        }

        $cek = ServiceQuality::first();
        if($cek)
        {
            $service_quality = ServiceQuality::find($cek->id);
        } else {
            $service_quality = new ServiceQuality;
        }

        $service_quality->judul = $request->judul;
        $service_quality->deskripsi = $request->deskripsi;

        if($request->before_img)
        {
            File::delete(public_path('images/mami-clean/service-quality/'.$service_quality->before_img));

            $beforeImgExtension = $request->before_img->extension();
            $beforeImgName =  uniqid().'-'.date("ymd").'.'.$beforeImgExtension;
            $beforeImg = Image::make($request->before_img);
            $beforeImgSize = public_path('images/mami-clean/service-quality/'.$beforeImgName);
            $beforeImg->save($beforeImgSize, 60);

            $service_quality->before_img = $beforeImgName;
        }

        if($request->after_img)
        {
            File::delete(public_path('images/mami-clean/service-quality/'.$service_quality->after_img));

            $afterImgExtension = $request->after_img->extension();
            $afterImgName =  uniqid().'-'.date("ymd").'.'.$afterImgExtension;
            $afterImg = Image::make($request->after_img);
            $afterImgSize = public_path('images/mami-clean/service-quality/'.$afterImgName);
            $afterImg->save($afterImgSize, 60);

            $service_quality->after_img = $afterImgName;
        }

        $service_quality->save();

        Alert::success('Berhasil', 'Berhasil memperbaharui Service Quality');
        return redirect()->route('mami-clean.landing-page.service-quality.index');
    }

    public function faq_store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'data_faq' => 'required',
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $dataFaq = $request->data_faq;

        for ($i=0; $i < count($dataFaq); $i++) {
            $pivot = new PivotFaqServiceQuality;
            $pivot->service_quality_id = $dataFaq[$i]['service_quality_id'];
            $pivot->pertanyaan = $dataFaq[$i]['pertanyaan'];
            $pivot->jawaban = $dataFaq[$i]['jawaban'];
            $pivot->save();
        }

        return response()->json(['success' => 'Data Faq Service Quality berhasil ditambahkan!']);
    }

    public function faq_delete(Request $request)
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
            PivotFaqServiceQuality::find($id[$i])->delete();
        }

        return response()->json(['success' => 'Berhasil menghapus']);
    }
}
