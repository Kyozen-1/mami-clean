@extends('landing-page.layouts.app')
@section('title', 'Mami Clean | Kontak')

@section('content')
    @php
        use App\Models\Profil;
        use Carbon\Carbon;
        use App\Models\LandingPageKontak;

        $profil = Profil::first();

        $kontak = LandingPageKontak::first();

        $section_1 = json_decode($kontak->section_1, true);
        $section_2 = json_decode($kontak->section_2, true);
    @endphp
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('images/landing-page/kontak/'.$section_1['gambar']) }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Halaman Kontak</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Halaman Kontak</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact-area pt-130 pb-130">
            <div class="container">
                <div class="inner-contact-info-wrap">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="inner-contact-info-item">
                                <div class="icon">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                                <div class="content">
                                    <a href="tel:{{$profil->no_hp}}">{{$profil->no_hp}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="inner-contact-info-item">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <a href="mailto:{{$profil->email}}">{{$profil->email}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="inner-contact-info-item">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="content">
                                    <p>{{$profil->alamat}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form-area">
                    <div class="row align-items-center g-0">
                        <div class="col-lg-6">
                            <div class="contact-img">
                                <img src="{{ asset('images/landing-page/kontak/'.$section_2['gambar']) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-content">
                                <h2 class="title">Kontak untuk Layanan</h2>
                                <form action="{{ route('kontak-kami') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-grp">
                                                <input type="text" name="nama" placeholder="Nama">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grp">
                                                <input type="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grp">
                                                <input type="text" name="no_hp" placeholder="Nomor HP">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grp">
                                                <input type="text" name="subjek" placeholder="Subjek">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-grp">
                                        <textarea name="message" placeholder="Tulis Pesan"></textarea>
                                    </div>
                                    <button type="submit" class="btn">Kirim Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

        <!-- contact-map -->
        <div id="contact-map">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=razen%20teknologi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://123movies-i.net">lethal weapon 1987 123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}</style><a href="https://www.embedgooglemap.net">embedding google maps into website</a>
                    <style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style>
                </div>
            </div>
        </div>
        <!-- contact-map-end -->

    </main>
    <!-- main-area-end -->
@endsection
