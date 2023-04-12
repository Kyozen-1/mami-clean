@extends('landing-page.layouts.app')
@section('title', 'Mami Clean | Proyek | Detail')

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
                        <h2 class="title">{{$produk->nama}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$produk->nama}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-details-area -->
    <section class="shop-details-area pt-130 pb-105">
        <div class="container">
            <div class="row align-items-center">
                <div class="shop-details-images-wrap">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @php
                            $i = 1;
                        @endphp
                        @foreach (json_decode($produk->gambar) as $item)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link @if($loop->first) active @endif" id="item{{$i}}-tab" data-bs-toggle="tab" data-bs-target="#item{{$i}}-tab-pane" type="button" role="tab" aria-controls="item{{$i++}}-tab-pane" aria-selected="true">
                                    <img src="{{ env('RAZEN_URL') }}storage/{{$item}}" alt="">
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @php
                            $i = 1;
                        @endphp
                        @foreach (json_decode($produk->gambar) as $item)
                            <div class="tab-pane show @if($loop->first) active @endif" id="item{{$i}}-tab-pane" role="tabpanel" aria-labelledby="item{{$i++}}-tab" tabindex="0">
                                <a href="{{ env('RAZEN_URL') }}storage/{{$item}}" class="popup-image">
                                    <img src="{{ env('RAZEN_URL') }}storage/{{$item}}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="shop-details-content">
                    <span>{{$produk->kategori_produk[0]}}</span>
                    <h2 class="title">{{$produk->nama}}</h2>
                    <h4 class="price">Rp. {{ number_format($produk->harga, 2, ',', '.') }}</h4>
                    {!! $produk->deskripsi !!}
                    <div class="shop-details-cat">
                        <span class="cat-title">Kategori:</span>
                        @foreach ($produk->kategori_produk as $item)
                            <a href="{{env('RAZEN_URL')}}product-categories/{{strtolower($item)}}">Plumbing @if(!$loop->last), @endif</a>
                        @endforeach

                        {{-- <a href="shop.html">Cleaner</a> --}}
                    </div>
                    <div class="shop-details-qty">
                        <div class="cart-plus-minus d-flex flex-wrap align-items-center">
                            <a href="{{preg_replace('#/+#','/',env('RAZEN_URL').$produk->link)}}" class="shop-details-cart-btn btn btn-two">Cek Ditoko</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-desc-wrap">
                        <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Deskripsi</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="descriptionTabContent">
                            <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                                {!! $produk->konten !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="related-product-area">
                <div class="related-product-wrapper">
                    <h2 class="related-title">Produk - Produk Terkait</h2>
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 justify-content-center">
                        @if ($data_produk_terkait['status'] == 'ada')
                            @foreach ($data_produk_terkait['data'] as $produk_terkait)
                                <div class="col">
                                    <div class="shop-item">
                                        <div class="shop-thumb">
                                            <a href="{{ route('proyek.detail', ['id'=>$produk_terkait->id]) }}">
                                                <img src="{{ env('RAZEN_URL') }}storage/{{json_decode($produk_terkait->gambar)[0]}}" alt="">
                                            </a>
                                            <div class="shop-action">
                                                <a href="{{preg_replace('#/+#','/',env('RAZEN_URL').$produk_terkait->link)}}"><i class="fas fa-shopping-cart"></i></a>
                                                <a href="{{ route('proyek.detail', ['id'=>$produk_terkait->id]) }}"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="shop-content">
                                            <a href="{{env('RAZEN_URL')}}product-categories/{{strtolower($produk_terkait->kategori_produk[0])}}" class="tag">{{$produk_terkait->kategori_produk[0]}}</a>
                                            <h2 class="title"><a href="{{ route('proyek.detail', ['id'=>$produk_terkait->id]) }}">{{$produk_terkait->nama}}</a></h2>
                                            <h3 class="price">Rp. {{number_format($produk_terkait->harga, '2',',', '.')}}</h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

</main>
<!-- main-area-end -->
@endsection
