@extends('landing-page.layouts.app')
@section('title', 'Mami Clean | Layanan')

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
                            <h2 class="title">Semua Layanan</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Semua Layanan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- services-area -->
        <section class="services-area-three inner-services-two pt-130 pb-90">
            <div class="container custom-container-two">
                <div class="services-item-wrap-two">
                    <div class="row">
                        @foreach ($layanans as $layanan)
                            <div class="col-xl-4 col-md-6">
                                <div class="services-item-three">
                                    <div class="services-thumb-three">
                                        <a href="{{ route('layanan.detail', ['id'=>$layanan->id]) }}"><img src="{{ asset('images/mami-clean/layanan/'.$layanan->gambar_kecil) }}" alt=""></a>
                                    </div>
                                    <div class="services-content-three">
                                        <div class="icon">
                                            {!! $layanan->ikon !!}
                                        </div>
                                        <h2 class="title"><a href="{{ route('layanan.detail', ['id'=>$layanan->id]) }}">{{$layanan->judul}}</a></h2>
                                        {!! $layanan->deskripsi_mini !!}
                                        <a href="{{ route('layanan.detail', ['id'=>$layanan->id]) }}" class="btn btn-two">Baca Lebih Lanjut</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- services-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
