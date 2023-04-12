@php
    use App\Models\Profil;
    use Carbon\Carbon;

    $profil = Profil::first();
@endphp

@extends('landing-page.layouts.app')
@section('title', 'Mami Clean | Beranda')

@section('content')
        @php
            $section_1 = json_decode($beranda->section_1, true);
            $section_2 = json_decode($beranda->section_2, true);
            $section_3 = json_decode($beranda->section_3, true);
            $section_4 = json_decode($beranda->section_4, true);
            $section_5 = json_decode($beranda->section_5, true);
            $section_6 = json_decode($beranda->section_6, true);
            $section_7 = json_decode($beranda->section_7, true);
            $section_8 = json_decode($beranda->section_8, true);
            $section_9 = json_decode($beranda->section_9, true);
        @endphp
    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section class="banner-area jarallax banner-bg" data-background="{{ asset('images/landing-page/beranda/'.$section_1['gambar']) }}">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        <div class="banner-content">
                            <span class="sub-title wow fadeInUp" data-wow-delay=".2s">{{$section_1?$section_1['sub_judul']:'' }}</span>
                            <h2 class="title wow fadeInUp" data-wow-delay=".4s">{{$section_1?$section_1['judul']:'' }}</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">{!!$section_1?$section_1['deskripsi']:'' !!}</p>
                            <div class="banner-btn">
                                <a href="{{ route('layanan') }}" class="btn wow fadeInLeft" data-wow-delay=".8s">Temukan LEBIH BANYAK</a>
                                <a href="{{ route('layanan') }}" class="btn btn-two wow fadeInRight" data-wow-delay=".8s">Layanan Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-area-end -->

        <!-- services-area -->
        <section class="services-area-two pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($section_2 as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="services-item-two wow fadeInUp" data-wow-delay=".2s">
                            <div class="services-icon-two">
                                {!! $item['ikon'] !!}
                            </div>
                            <div class="services-content-two">
                                <h2 class="title"><a href="#">{{$item['judul']}}</a></h2>
                                <p>{!!$item['deskripsi']!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- services-area-end -->

        <!-- introduction-area -->
        <section class="introduction-area pb-130">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-9">
                        <div class="introduction-img-wrap">
                            <img src="{{ asset('images/landing-page/beranda/'.$section_3['gambar_besar']) }}" alt="">
                            <img src="{{ asset('images/landing-page/beranda/'.$section_3['gambar_kecil']) }}" data-aos="fade-right" alt="">
                            <div class="play-btn">
                                <a href="{{$section_3['tautan']}}" class="popup-video"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="introduction-content">
                            <div class="section-title-two mb-20 tg-heading-subheading animation-style2">
                                <span class="sub-title">{{$section_3['sub_judul']}}</span>
                                <h2 class="title tg-element-title">{{$section_3['judul']}}</h2>
                            </div>
                            <p class="info-one">{!!$section_3['deskripsi_judul']!!}</p>
                            <p>{!! $section_3['deskripsi'] !!}</p>
                            <div class="introduction-list">
                                <ul class="list-wrap">
                                    @foreach ($section_3['konten'] as $item)
                                        <li><i class="fas fa-check-circle"></i>{{$item['item']}}   </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="introduction-bottom">
                                <a href="{{ route('perusahaan') }}" class="btn">Temukan Lebih Banyak</a>
                                <span class="call-now"><i class="fas fa-phone-alt"></i><a href="tel:{{$profil->no_hp}}">{{$profil->no_hp}}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- introduction-area-end -->

        <!-- services-area -->
        <section class="services-area-three pt-125">
            <div class="services-bg jarallax" data-background="{{ asset('clentac/assets/img/bg/services_bg.jpg') }}"></div>
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7">
                        <div class="section-title-two white-title text-center mb-65 tg-heading-subheading animation-style2">
                            <span class="sub-title">{{$section_4?$section_4['sub_judul']:'' }}</span>
                            <h2 class="title tg-element-title">{{$section_4?$section_4['judul']:'' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="services-item-wrap-two">
                    <div class="row services-active">
                        @foreach ($layanans as $layanan)
                            <div class="col-lg-3">
                                <div class="services-item-three">
                                    <div class="services-thumb-three">
                                        <a href="{{ route('layanan.detail', ['id'=>$layanan->id]) }}"><img src="{{ asset('images/mami-clean/layanan/'.$layanan->gambar_kecil) }}" alt=""></a>
                                    </div>
                                    <div class="services-content-three">
                                        <div class="icon">
                                            {!! $layanan->ikon !!}
                                        </div>
                                        <h2 class="title"><a href="{{ route('layanan.detail', ['id'=>$layanan->id]) }}">{{$layanan->judul}}</a></h2>
                                        <p>{!!$layanan->deskripsi_mini!!}</p>
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

        <!-- faq-area -->
        <section class="faq-area pt-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="faq-content">
                            <div class="section-title-two mb-40 tg-heading-subheading animation-style2">
                                <span class="sub-title">{{$section_5?$section_5['sub_judul']:'' }}</span>
                                <h2 class="title tg-element-title">{{$section_5?$section_5['judul']:'' }}</h2>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            How stay calm from the first time.
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Our proprietary enables Quality.
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Locate Clean USA Office Near You.
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Visit our office and see services.
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="faq-img">
                            <img src="{{ asset('images/landing-page/beranda/'.$section_5['gambar']) }}" data-aos="fade-left" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area-two testimonial-bg" data-background="{{ asset('clentac/assets/img/bg/testimonial_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title-two text-center mb-65 tg-heading-subheading animation-style2">
                            <span class="sub-title">{{$section_6?$section_6['sub_judul']:'' }}</span>
                            <h2 class="title tg-element-title">{{$section_6?$section_6['judul']:'' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-active-two">
                    @foreach ($testimonials as $testimonial)
                        <div class="col-lg-4">
                            <div class="testimonial-item-two">
                                <div class="testimonial-icon-two">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                                <div class="testimonial-content-two">
                                    <p>{{$testimonial->testimonial}}</p>
                                    <div class="testimonial-avatar-info">
                                        <div class="avatar-thumb">
                                            <img src="{{ asset('images/mami-clean/testimoni/'.$testimonial->foto) }}" alt="">
                                        </div>
                                        <div class="avatar-content">
                                            <h4 class="title">{{$testimonial->nama}}</h4>
                                            <p>{{$testimonial->jabatan}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- project-area -->
        <section class="project-area-two pt-125 pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="section-title-two mb-60 tg-heading-subheading animation-style2">
                            <span class="sub-title">{{$section_7?$section_7['sub_judul']:'' }}</span>
                            <h2 class="title tg-element-title">{{$section_7?$section_7['judul']:'' }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="project-nav-wrap mb-40">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">All</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="office-tab" data-bs-toggle="tab" data-bs-target="#office-tab-pane" type="button" role="tab" aria-controls="office-tab-pane" aria-selected="false">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Office</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="outdoor-tab" data-bs-toggle="tab" data-bs-target="#outdoor-tab-pane" type="button" role="tab" aria-controls="outdoor-tab-pane" aria-selected="false">Outdoor</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="laundry-tab" data-bs-toggle="tab" data-bs-target="#laundry-tab-pane" type="button" role="tab" aria-controls="laundry-tab-pane" aria-selected="false">Laundry Service</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="project-item-two big-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project__img01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Home Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Office Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Outdoor Cleaning</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="office-tab-pane" role="tabpanel" aria-labelledby="office-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="project-item-two big-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project__img02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Home Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Office Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Outdoor Cleaning</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="project-item-two big-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project__img03.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Office Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Office Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Outdoor Cleaning</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="outdoor-tab-pane" role="tabpanel" aria-labelledby="outdoor-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="project-item-two big-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project__img01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Home Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Office Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Outdoor Cleaning</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="laundry-tab-pane" role="tabpanel" aria-labelledby="laundry-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="project-item-two big-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project__img02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Home Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Office Cleaning Services</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                        <div class="project-item-two small-item">
                                            <div class="project-thumb-two">
                                                <a href="project-details.html"><img src="{{ asset('clentac/assets/img/project/h2_project_img02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a href="project-details.html">Outdoor Cleaning</a></h2>
                                                <p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse aliquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- project-area-end -->

        <!-- counter-area -->
        <section class="counter-area-two counter-bg jarallax" data-background="{{ asset('images/landing-page/beranda/'.$section_8['gambar']) }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <svg viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M32.5 40.6251C42.5965 40.6251 50.7812 32.7434 50.7812 23.0209C50.7812 13.2984 42.5965 5.41675 32.5 5.41675C22.4035 5.41675 14.2188 13.2984 14.2188 23.0209C14.2188 32.7434 22.4035 40.6251 32.5 40.6251Z" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M20.3666 36.6164L20.3396 56.6039C20.3396 59.0414 22.0459 60.2331 24.1584 59.231L31.4167 55.7914C32.0125 55.4935 33.0146 55.4935 33.6104 55.7914L40.8959 59.231C42.9813 60.206 44.7146 59.0414 44.7146 56.6039V36.1289" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="2562"></span>+</h2>
                                <p>Satisfied Clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <svg viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M33.4999 28.4495V35.2744C33.4999 40.9744 31.2249 43.2494 25.5249 43.2494H18.725C13.05 43.2494 10.75 40.9744 10.75 35.2744V28.4495C10.75 22.7745 13.025 20.4995 18.725 20.4995H25.5499C31.2249 20.4995 33.4999 22.7745 33.4999 28.4495Z" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M43.2498 18.6997V25.5247C43.2498 31.2246 40.9748 33.4996 35.2748 33.4996H33.4998V28.4497C33.4998 22.7747 31.2248 20.4997 25.5249 20.4997H20.4999V18.6997C20.4999 12.9997 22.7749 10.7498 28.4748 10.7498H35.2998C40.9748 10.7498 43.2498 13.0247 43.2498 18.6997Z" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M51.9997 34.5002C51.9997 44.1752 44.1748 52.0001 34.4998 52.0001L37.1248 47.6252" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2 19.4999C2 9.82496 9.82496 2 19.4999 2L16.8749 6.37498" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="176"></span>+</h2>
                                <p>Active Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <svg viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.125 1.35417C8.125 0.995019 8.26767 0.650582 8.52163 0.396626C8.77558 0.142671 9.12002 0 9.47917 0H39.2708C39.63 0 39.9744 0.142671 40.2284 0.396626C40.4823 0.650582 40.625 0.995019 40.625 1.35417V2.70833H47.3958C47.755 2.70833 48.0994 2.851 48.3534 3.10496C48.6073 3.35892 48.75 3.70335 48.75 4.0625V12.1875C48.75 13.9832 48.0366 15.7054 46.7669 16.9752C45.4971 18.245 43.7749 18.9583 41.9792 18.9583H39.7001C37.6133 24.8625 32.2116 29.2012 25.7292 29.7361V37.9167H35.2083C35.5675 37.9167 35.9119 38.0593 36.1659 38.3133C36.4198 38.5672 36.5625 38.9117 36.5625 39.2708V47.3958C36.5625 47.755 36.4198 48.0994 36.1659 48.3534C35.9119 48.6073 35.5675 48.75 35.2083 48.75H13.5417C13.1825 48.75 12.8381 48.6073 12.5841 48.3534C12.3302 48.0994 12.1875 47.755 12.1875 47.3958V39.2708C12.1875 38.9117 12.3302 38.5672 12.5841 38.3133C12.8381 38.0593 13.1825 37.9167 13.5417 37.9167H23.0208V29.7361C16.5398 29.2012 11.1367 24.8625 9.0499 18.9583H6.77083C4.9751 18.9583 3.25291 18.245 1.98313 16.9752C0.713354 15.7054 0 13.9832 0 12.1875V4.0625C0 3.70335 0.142671 3.35892 0.396626 3.10496C0.650582 2.851 0.995019 2.70833 1.35417 2.70833H8.125V1.35417ZM37.9167 13.5417V2.70833H10.8333V13.5417C10.8333 21.0207 16.8959 27.0833 24.375 27.0833C31.8541 27.0833 37.9167 21.0207 37.9167 13.5417ZM40.625 5.41667V16.25H41.9792C43.0566 16.25 44.0899 15.822 44.8518 15.0601C45.6137 14.2983 46.0417 13.2649 46.0417 12.1875V5.41667H40.625ZM2.70833 5.41667H8.125V16.25H6.77083C5.69339 16.25 4.66008 15.822 3.89821 15.0601C3.13634 14.2983 2.70833 13.2649 2.70833 12.1875V5.41667ZM14.8958 40.625V46.0417H33.8542V40.625H14.8958Z" fill="currentcolor" />
                                </svg>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="28"></span>+</h2>
                                <p>Winning Award</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M44.9999 17.9C44.8499 17.875 44.6749 17.875 44.5249 17.9C41.0749 17.775 38.3249 14.95 38.3249 11.45C38.3249 7.875 41.1999 5 44.7749 5C48.3499 5 51.2249 7.9 51.2249 11.45C51.1999 14.95 48.4499 17.775 44.9999 17.9Z" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M42.4249 36.0999C45.8499 36.6749 49.6249 36.0749 52.2749 34.2999C55.7999 31.9499 55.7999 28.0999 52.2749 25.7499C49.5999 23.9749 45.7749 23.3749 42.3499 23.9749" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14.9248 17.9C15.0748 17.875 15.2498 17.875 15.3998 17.9C18.8498 17.775 21.5998 14.95 21.5998 11.45C21.5998 7.875 18.7248 5 15.1498 5C11.5748 5 8.69983 7.9 8.69983 11.45C8.72483 14.95 11.4748 17.775 14.9248 17.9Z" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.4998 36.0999C14.0748 36.6749 10.2999 36.0749 7.64985 34.2999C4.12485 31.9499 4.12485 28.0999 7.64985 25.7499C10.3249 23.9749 14.1498 23.3749 17.5748 23.9749" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29.9999 36.5748C29.8499 36.5498 29.6749 36.5498 29.5249 36.5748C26.0749 36.4498 23.3249 33.6248 23.3249 30.1248C23.3249 26.5498 26.1999 23.6748 29.7749 23.6748C33.3499 23.6748 36.2249 26.5748 36.2249 30.1248C36.1999 33.6248 33.4499 36.4748 29.9999 36.5748Z" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M22.7249 44.4497C19.1999 46.7997 19.1999 50.6497 22.7249 52.9997C26.7249 55.6747 33.2749 55.6747 37.2749 52.9997C40.7999 50.6497 40.7999 46.7997 37.2749 44.4497C33.2999 41.7997 26.7249 41.7997 22.7249 44.4497Z" stroke="currentcolor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="150"></span>+</h2>
                                <p>Expert Teams</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter-area-end -->

        <!-- blog-area -->
        <section class="blog-area-two pt-125 pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title-two text-center mb-60 tg-heading-subheading animation-style2">
                            <span class="sub-title">{{$section_9?$section_9['sub_judul']:'' }}</span>
                            <h2 class="title tg-element-title">{{$section_9?$section_9['judul']:'' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="blog-item-two">
                            <div class="blog-thumb-two">
                                <a href="blog-details.html"><img src="{{ asset('clentac/assets/img/blog/h2_blog_img01.jpg') }}" alt=""></a>
                            </div>
                            <div class="blog-content-two">
                                <a href="blog.html" class="tag">Kitchen</a>
                                <div class="blog-meta">
                                    <ul class="list-wrap">
                                        <li><i class="fas fa-calendar-alt"></i>Jun 4, 2022</li>
                                        <li><i class="far fa-user"></i><a href="blog.html">David Martin</a></li>
                                    </ul>
                                </div>
                                <h2 class="title"><a href="blog-details.html">New Cleaning With Hydrogen at many Peroxide Tips</a></h2>
                                <a href="blog-details.html" class="btn btn-two">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="blog-item-two">
                            <div class="blog-thumb-two">
                                <a href="blog-details.html"><img src="{{ asset('clentac/assets/img/blog/h2_blog_img02.jpg') }}" alt=""></a>
                            </div>
                            <div class="blog-content-two">
                                <a href="blog.html" class="tag">Home</a>
                                <div class="blog-meta">
                                    <ul class="list-wrap">
                                        <li><i class="fas fa-calendar-alt"></i>Jun 4, 2022</li>
                                        <li><i class="far fa-user"></i><a href="blog.html">David Martin</a></li>
                                    </ul>
                                </div>
                                <h2 class="title"><a href="blog-details.html">The “Flip and Fluff” Routine is the Best Thing</a></h2>
                                <a href="blog-details.html" class="btn btn-two">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
