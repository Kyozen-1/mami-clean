<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingPage\LandingPageBeranda;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client as GuzzleHttpClient;
use Carbon\Carbon;
use App\Models\Layanan;
use App\Models\ServiceQuality;
use App\Models\PivotFaqServiceQuality;
use App\Models\Brosur;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $beranda = LandingPageBeranda::first();
        $layanans = Layanan::all();
        $testimonials = Testimonial::all();
        return view('landing-page.index', [
            'beranda' => $beranda,
            'layanans' => $layanans,
            'testimonials' => $testimonials
        ]);
    }

    public function perusahaan()
    {
        return view('landing-page.perusahaan');
    }

    public function layanan()
    {
        $layanans = Layanan::all();
        return view('landing-page.layanan', [
            'layanans' => $layanans
        ]);
    }

    public function layanan_detail($id)
    {
        $data_layanan = Layanan::find($id);
        $layanans = Layanan::pluck('judul', 'id');
        $perusahaan_brosur = Brosur::where('status_brosur', 'perusahaan')->where('status', 1)->first();
        $brosur = Brosur::where('layanan_id', $id)->where('status', 1)->first();
        $service_quality = ServiceQuality::first();
        $cek_faq = PivotFaqServiceQuality::where('service_quality_id', $service_quality->id)->first();
        if($cek_faq)
        {
            $pivot_faq = [
                'status' => 'ada',
                'data' => PivotFaqServiceQuality::where('service_quality_id', $service_quality->id)->get()
            ];
        } else {
            $pivot_faq = [
                'status' => 'tidak_ada',
                'data' => ''
            ];
        }
        return view('landing-page.layanan-detail', [
            'layanans' => $layanans,
            'data_layanan' => $data_layanan,
            'perusahaan_brosur' => $perusahaan_brosur,
            'brosur' => $brosur,
            'service_quality' => $service_quality,
            'pivot_faq' => $pivot_faq
        ]);
    }

    public function proyek()
    {
        $guzzleClient = new GuzzleHttpClient();

        $get_produk = $guzzleClient->get(env('RAZEN_URL').'api/product/mami-clean/product');
        $produks = json_decode($get_produk->getBody())->data;

        return view('landing-page.proyek', [
            'produks' => $produks
        ]);
    }

    public function proyek_detail($id)
    {
        $guzzleClient = new GuzzleHttpClient();

        $get_produk = $guzzleClient->get(env('RAZEN_URL').'api/product/mami-clean/product/detail/'.$id);
        $produk = json_decode($get_produk->getBody())->data;

        $get_related_produk = $guzzleClient->get(env('RAZEN_URL').'api/product/mami-clean/product/related/'.$id);
        $data_produk_terkait = [];
        if(json_decode($get_related_produk->getBody()))
        {
            $data_produk_terkait = [
                'status' => 'ada',
                'data' => json_decode($get_related_produk->getBody())->data
            ];
        } else {
            $data_produk_terkait = [
                'status' => 'tidak_ada',
                'data' => ''
            ];
        }
        return view('landing-page.proyek-detail', [
            'produk' => $produk,
            'data_produk_terkait' => $data_produk_terkait
        ]);
    }

    public function blog()
    {
        return view('landing-page.blog');
    }

    public function kontak()
    {
        return view('landing-page.kontak');
    }

    public function kontak_kami(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required | max:255',
            'email' => 'required | max:255',
            'no_hp' => 'required | max:255',
            'subjek' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'subjek' => $request->subjek,
            'body' => $request->message
        ];

        Mail::send('emails.kontak-kami', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('skadi1268@gmail.com', 'Kristoforus Fasco');
            $message->subject($data['subjek']);
        });

        return redirect(route('kontak'));
    }
}

