@extends('landing-page.layouts.app')
@section('title', 'Mami Clean | Proyek | Detail')

@section('content')
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('clentac/assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Shop Details</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="itemOne-tab" data-bs-toggle="tab" data-bs-target="#itemOne-tab-pane" type="button" role="tab" aria-controls="itemOne-tab-pane" aria-selected="true">
                                <img src="{{ asset('clentac/assets/img/shop/shop_nav_img01.jpg') }}" alt="">
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="itemTwo-tab" data-bs-toggle="tab" data-bs-target="#itemTwo-tab-pane" type="button" role="tab" aria-controls="itemTwo-tab-pane" aria-selected="false">
                                <img src="{{ asset('clentac/assets/img/shop/shop_nav_img02.jpg') }}" alt="">
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="itemThree-tab" data-bs-toggle="tab" data-bs-target="#itemThree-tab-pane" type="button" role="tab" aria-controls="itemThree-tab-pane" aria-selected="false">
                                <img src="{{ asset('clentac/assets/img/shop/shop_nav_img03.jpg') }}" alt="">
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="itemOne-tab-pane" role="tabpanel" aria-labelledby="itemOne-tab" tabindex="0">
                            <a href="{{ asset('clentac/assets/img/shop/shop_details01.jpg') }}" class="popup-image">
                                <img src="{{ asset('clentac/assets/img/shop/shop_details01.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="tab-pane" id="itemTwo-tab-pane" role="tabpanel" aria-labelledby="itemTwo-tab" tabindex="0">
                            <a href="{{ asset('clentac/assets/img/shop/shop_details02.jpg') }}" class="popup-image">
                                <img src="{{ asset('clentac/assets/img/shop/shop_details02.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="tab-pane" id="itemThree-tab-pane" role="tabpanel" aria-labelledby="itemThree-tab" tabindex="0">
                            <a href="{{ asset('clentac/assets/img/shop/shop_details03.jpg') }}" class="popup-image">
                                <img src="{{ asset('clentac/assets/img/shop/shop_details03.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="shop-details-content">
                    <span>Plumbing</span>
                    <h2 class="title">Biovert Cleaner</h2>
                    <h4 class="price">$19.99</h4>
                    <p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla tincidunt urna sed massa dummy text sed.</p>
                    <ul class="list-wrap">
                        <li><i class="fas fa-check-circle"></i>Augue eu vulputate tortor egestas cursus vivamus.</li>
                        <li><i class="fas fa-check-circle"></i>Aulputate tortor egestas cursus vivamus.</li>
                        <li><i class="fas fa-check-circle"></i>The dummy textortor egestas cursus.</li>
                    </ul>
                    <div class="shop-details-cat">
                        <span class="cat-title">Category:</span>
                        <a href="shop.html">Plumbing,</a>
                        <a href="shop.html">Cleaner</a>
                    </div>
                    <div class="shop-details-qty">
                        <div class="cart-plus-minus d-flex flex-wrap align-items-center">
                            <form action="#" class="num-block">
                                <input type="text" class="in-num" value="1" readonly="">
                                <div class="qtybutton-box">
                                    <span class="plus"><i class="fas fa-sort-up"></i></span>
                                    <span class="minus dis"><i class="fas fa-sort-down"></i></span>
                                </div>
                            </form>
                            <button class="shop-details-cart-btn btn btn-two">add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-desc-wrap">
                        <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews (0)</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="descriptionTabContent">
                            <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                                <p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentum massa dolor. Lacus purus lectus diam diam tellus libero id sapien justo.Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentum massa dolor. Lacus purus lectus diam diam tellus libero id sapien justo.</p>
                            </div>
                            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                                <div class="product-desc-review">
                                    <div class="product-desc-review-title mb-15">
                                        <h5 class="title">Customer Reviews (0)</h5>
                                    </div>
                                    <div class="left-rc">
                                        <p>No reviews yet</p>
                                    </div>
                                    <div class="right-rc">
                                        <a href="#">Write a review</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-product-area">
                <div class="related-product-wrapper">
                    <h2 class="related-title">Related products</h2>
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 justify-content-center">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

</main>
<!-- main-area-end -->
@endsection
