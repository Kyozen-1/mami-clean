@extends('landing-page.layouts.app')
@section('title', 'Mami Clean | Layanan | Detail')

@section('content')
    @php
        use App\Models\LandingPageLayanan;

        $layanan = LandingPageLayanan::first();

        $section_1 = json_decode($layanan->section_1, true);
    @endphp
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('images/landing-page/layanan/'.$section_1['gambar']) }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">{{$data_layanan->judul}}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$data_layanan->judul}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- services-details-area -->
        <section class="services-deatails-area pt-130 pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 order-0 order-lg-2">
                        <div class="services-details-wrap">
                            <div class="services-details-thumb">
                                <img src="{{ asset('images/mami-clean/layanan/'.$data_layanan->gambar_besar) }}" alt="">
                            </div>
                            <div class="services-details-content">
                                {!! $data_layanan->deskripsi !!}
                                <div class="service-quality-wrap">
                                    <h4 class="title">{{$service_quality->judul}}</h4>
                                    {!! $service_quality->deskripsi !!}
                                    <div id="slider1" class="beer-slider" data-start="50">
                                        <img src="{{ asset('images/mami-clean/service-quality/'.$service_quality->after_img) }}" alt="">
                                        <div class="beer-reveal">
                                            <img src="{{ asset('images/mami-clean/service-quality/'.$service_quality->before_img) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="services-faq faq-content">
                                    <div class="accordion" id="accordionExample">
                                        @if ($pivot_faq['status'] == 'ada')
                                            @foreach ($pivot_faq['data'] as $item)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{$item->id}}">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                                            {{$item->pertanyaan}}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse @if($loop->first) show @endif" aria-labelledby="heading{{$item->id}}"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            {{$item->jawaban}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <aside class="services-sidebar">
                            <div class="widget">
                                <div class="services-cat-list">
                                    <h4 class="title">All Services</h4>
                                    <ul class="list-wrap">
                                        @foreach ($layanans as $id => $judul)
                                            <li><a href="{{ route('layanan.detail', ['id'=>$id]) }}">{{$judul}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="download-wrap" data-background="{{ asset('images/mami-clean/layanan/'.$data_layanan->gambar_kecil) }}">
                                    <span>Berkas PDF</span>
                                    <h2 class="title">Unduh Brosur</h2>
                                    <a href="{{ asset('berkas/brosur/'.$perusahaan_brosur->berkas) }}">{{$perusahaan_brosur->nama}} <i class="far fa-file-pdf"></i></a>
                                    @if ($brosur)
                                        <a href="{{ asset('berkas/brosur/'.$brosur->berkas) }}">{{$brosur->nama}} <i class="far fa-file-pdf"></i></a>
                                    @endif
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- services-details-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
