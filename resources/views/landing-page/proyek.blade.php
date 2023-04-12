@extends('landing-page.layouts.app')
@section('title', 'Mami Clean | Proyek')

@section('content')
    @php
        use App\Models\LandingPageProyek;

        $proyek = LandingPageProyek::first();

        $section_1 = json_decode($proyek->section_1, true);
    @endphp
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('images/landing-page/proyek/'.$section_1['gambar']) }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Proyek</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Proyek</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-area -->
        <section class="shop-area pt-130 pb-130">
            <div class="container">
                <div class="shop-top-wrap mb-50">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="shop-showing-result">
                                <p>Showing all 9 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="shop-ordering">
                                <select name="orderby" class="orderby">
                                    <option value="Default sorting">Default sorting</option>
                                    <option value="Sort by popularity">Sort by popularity</option>
                                    <option value="Sort by average rating">Sort by average rating</option>
                                    <option value="Sort by latest">Sort by latest</option>
                                    <option value="Sort by latest">Sort by latest</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-item-wrap">
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img01.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Biovert Cleaner</a></h2>
                                    <h3 class="price">$19.99</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img02.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Magic Spin Mop</a></h2>
                                    <h3 class="price">$16.00</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img03.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Biovert Cleaner</a></h2>
                                    <h3 class="price">$32.00</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img04.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Clarke Machines</a></h2>
                                    <h3 class="price">$28.50</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img05.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Clarke CFP Floor</a></h2>
                                    <h3 class="price">$46.00</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img06.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Cillit Bang</a></h2>
                                    <h3 class="price">$12.00</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img07.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Sensitive Skin</a></h2>
                                    <h3 class="price">$14.00</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img08.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Clean Energy</a></h2>
                                    <h3 class="price">$47.99</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img09.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Biovert Cleaner</a></h2>
                                    <h3 class="price">$19.99</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img10.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Magic Spin Mop</a></h2>
                                    <h3 class="price">$16.00</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img11.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Biovert Cleaner</a></h2>
                                    <h3 class="price">$32.00</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop-item">
                                <div class="shop-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('clentac/assets/img/shop/shop_img12.png') }}" alt=""></a>
                                    <div class="shop-action">
                                        <a href="shop-details.html"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-heart"></i></a>
                                        <a href="shop-details.html"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <a href="shop.html" class="tag">Plumbing</a>
                                    <h2 class="title"><a href="shop-details.html">Clarke Machines</a></h2>
                                    <h3 class="price">$28.50</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="autoload-btn text-center mt-30">
                        <a href="#!" class="btn">Auto load</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
