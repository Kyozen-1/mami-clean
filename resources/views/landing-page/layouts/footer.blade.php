<!-- footer-area -->
@php
    use App\Models\Profil;
    use Carbon\Carbon;
    use App\Models\PivotProfilMediaSosial;
    use App\Models\Brand;

    $profil = Profil::first();

    $pivot_profil_media_sosials = PivotProfilMediaSosial::where('profil_id', $profil->id)->get();

    $brands = Brand::all();
@endphp

<!-- brand-area -->
<div class="brand-area-two pb-60">
    <div class="container">
        <div class="row brand-active">
            @foreach ($brands as $brand)
                <div class="col-12">
                    <div class="brand-item">
                        <img src="{{ asset('images/mami-clean/brand/'.$brand->foto) }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- brand-area-end -->

<footer>
    <div class="footer-area footer-bg">
        <div class="footer-top">
            <div class="container">
                <div class="footer-logo-area">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="logo">
                                <a href="{{ route('beranda') }}"><img src="{{ asset('images/mami-clean/logo/'.$profil->logo) }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="footer-social-menu">
                                <ul class="list-wrap">
                                    @foreach ($pivot_profil_media_sosials as $item)
                                        <li><a href="{{$item->tautan}}"><i class="{{$item->master_media_sosial->kode_ikon}}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="fw-title">
                                <h4 class="title">Kontak Kami</h4>
                            </div>
                            <div class="footer-content">
                                <p>{{$profil->alamat}}</p>
                                <div class="footer-contact">
                                    <ul class="list-wrap">
                                        <li class="phone-addess">
                                            <i class="fas fa-phone-alt"></i>
                                            <a href="tel:{{$profil->no_hp}}">{{$profil->no_hp}}</a>
                                        </li>
                                        <li class="email-addess"><a href="mailto:{{$profil->email}}">{{$profil->email}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="fw-title">
                                <h4 class="title">Our Links</h4>
                            </div>
                            <div class="fw-link-list">
                                <ul class="list-wrap">
                                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                                    <li><a href="{{ route('perusahaan') }}">Perusahaan</a></li>
                                    <li><a href="{{ route('layanan') }}">Layanan</a></li>
                                    <li><a href="https://shop.razen.co.id/stores/mami-clean" target="blank">E-Commerce</a></li>
                                    <li><a href="#">E-Learning</a></li>
                                    <li><a href="{{ route('proyek') }}">Proyek</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="fw-title">
                                <h4 class="title">Layanan Kami</h4>
                            </div>
                            <div class="fw-link-list">
                                <ul class="list-wrap">
                                    <li><a href="services.html">Apartment Cleaning</a></li>
                                    <li><a href="services.html">House Cleaning</a></li>
                                    <li><a href="services.html">Carpet Cleaning</a></li>
                                    <li><a href="services.html">After Renovation</a></li>
                                    <li><a href="services.html">Curtain Cleaning</a></li>
                                    <li><a href="services.html">Window Cleaning</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="fw-title">
                                <h4 class="title">Buletin</h4>
                            </div>
                            <div class="footer-newsletter">
                                <p>Berlangganan buletin kami untuk mendapatkan pembaruan & berita terbaru kami</p>
                                <form action="#">
                                    <input type="text" placeholder="Your mail address">
                                    <button type="submit" class="btn">Berlangganan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright-text">
                            <p>{{Carbon::now()->year}} <a href="{{ route('beranda') }}">{{$profil->nama}}</a> All Rights Reserved by {{$profil->pt}}.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="footer-bottom-menu">
                            <ul class="list-wrap">
                                <li><a href="{{ route('kontak') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('kontak') }}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->
