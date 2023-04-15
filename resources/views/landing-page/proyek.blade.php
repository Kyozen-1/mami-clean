@extends('landing-page.layouts.app')
@section('title', 'Mami Clean | Produk')

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
                            <h2 class="title">Produk</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Produk</li>
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
                {{-- <div class="shop-top-wrap mb-50">
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
                </div> --}}
                <div class="shop-item-wrap">
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @foreach ($produks as $produk)
                            <div class="col">
                                <div class="shop-item">
                                    <div class="shop-thumb">
                                        <a href="{{ route('proyek.detail', ['id'=>$produk->id]) }}">
                                            <img src="{{ env('RAZEN_URL') }}storage/{{json_decode($produk->gambar)[0]}}" alt="">
                                        </a>
                                        <div class="shop-action">
                                            <a href="{{preg_replace('#/+#','/',env('RAZEN_URL').$produk->link)}}"><i class="fas fa-shopping-cart"></i></a>
                                            <a href="{{ route('proyek.detail', ['id'=>$produk->id]) }}"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="shop-content">
                                        <a href="{{env('RAZEN_URL')}}product-categories/{{strtolower($produk->kategori_produk[0])}}" class="tag">{{$produk->kategori_produk[0]}}</a>
                                        <h2 class="title"><a href="{{ route('proyek.detail', ['id'=>$produk->id]) }}">{{$produk->nama}}</a></h2>
                                        <h3 class="price">Rp. {{number_format($produk->harga, '2',',', '.')}}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="autoload-btn text-center mt-30">
                        <a href="#!" class="btn">Auto load</a>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- shop-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
