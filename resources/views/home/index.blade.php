@extends('layouts.app')

@section('content')

    <div class="container-indent nomargin">
        <div class="container-fluid">
            <div class="row">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    @foreach ($sliders as $item)
                        <div class="swiper-slide">
                            <img src="{{$item->img}}" alt="">
                        </div>
                    @endforeach
                    </div>
                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>

            </div>
        </div>
    </div>
    <div id="tt-pageContent">
        @if($promotes->count() > 3)
        <div class="container-indent0">
            <div class="container">
                <div class="row flex-sm-row-reverse tt-layout-promo-box">
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{$promotes[0]->href}}" class="tt-promo-box tt-one-child hover-type-2">
                                    <img src="{{asset('/images/loader.svg')}}" data-src="{{$promotes[0]->getProcessImage('w_280','h_240')}}" alt="{{$promotes[0]->name}}">
                                    <div class="tt-description">
                                        <div class="tt-description-wrapper">
                                            <div class="tt-background"></div>
                                            <div class="tt-title-small">{{$promotes[0]->name}}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{$promotes[1]->href}}" class="tt-promo-box tt-one-child hover-type-2">
                                    <img src="{{asset('/images/loader.svg')}}" data-src="{{$promotes[1]->getProcessImage('w_280','h_240')}}" alt="{{$promotes[1]->name}}">
                                    <div class="tt-description">
                                        <div class="tt-description-wrapper">
                                            <div class="tt-background"></div>
                                            <div class="tt-title-small">{{$promotes[1]->name}}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12">
                                <a href="{{$promotes[2]->href}}" class="tt-promo-box tt-one-child">
                                    <img src="{{asset('/images/loader.svg')}}" data-src="{{$promotes[1]->getProcessImage('w_580','h_240')}}" alt="{{$promotes[2]->name}}">
                                    <div class="tt-description">
                                        <div class="tt-description-wrapper">
                                            <div class="tt-background"></div>
                                            <div class="tt-title-small">{{$promotes[2]->name}}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{$promotes[3]->href}}" class="tt-promo-box">
                            <img src="{{asset('/images/loader.svg')}}" data-src="{{$promotes[3]->getProcessImage('w_580','h_500')}}" alt="{{$promotes[3]->name}}">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-large">{{$promotes[3]->name}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="container-indent1">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-block-title text-left">
                    <h1 class="tt-title">{{$fiber->name}}</h1>
                </div>
                <div class="tt-tab-wrapper">
                    @if($fiber)
                    <ul class="nav nav-tabs tt-tabs-default" role="tablist">
                        @foreach ($fiber->children->take(4) as $item)
                            <li class="nav-item">
                                <a class="nav-link show" data-toggle="tab" href="#tt-tab-{{$item->id}}" role="tab">{{$item->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($fiber->children->take(4) as $cat)
                        <div class="tab-pane fade {{$loop->index === 1 ? 'active':''}}" id="tt-tab-{{$cat->id}}" role="tabpanel">
                            <div class="tt-carousel-products row arrow-location-tab tt-alignment-img tt-collection-listing slick-animated-show-js">
                                @foreach( $cat->products as $item)
                                <div class="col-2 col-md-4 col-lg-3">
                                    <a href="{{route('product.view',['slug'=>$item->slug])}}" class="tt-collection-item">
                                        <div class="tt-image-box"><img src="{{$item->getFirstImageUrl()}}" alt="{{$item->name}}"></div>
                                        <div class="tt-description">
                                            <h2 class="tt-title">{{ \Illuminate\Support\Str::limit($item->name, 80) }}</h2>
                                            <ul class="tt-add-info">
                                                <!--<li>22 PRODUCTS</li>-->
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="container-indent" style="margin-bottom: 35px">
            <div class="container">
                <div class="row tt-layout-promo-box">
                    <div class="col-md-6">
                        <a href="#" class="tt-promo-box tt-one-child">
                            <img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/promo/index04-promo-img-05.jpg')}}" alt="">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">NEW IN:</div>
                                    <div class="tt-title-large">Category</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="listing-left-column.html" class="tt-promo-box tt-one-child">
                            <img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/promo/index04-promo-img-06.jpg')}}" alt="">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">CLEARANCE SALES</div>
                                    <div class="tt-title-large">GET UP TO <span class="tt-base-color">20% OFF</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-indent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <h6 class="tt-title-sub">NEW PRODUCTS</h6>
                        <div class="tt-layout-vertical-listing">
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-18.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-18-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $24
                                        </div>
                                        <div class="tt-option-block">
                                            <ul class="tt-options-swatch">
                                                <li><a class="options-color tt-color-bg-01" href="#"></a></li>
                                                <li><a class="options-color tt-color-bg-02" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-19.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-19-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $84
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-20.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-20-01.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $78
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider visible-xs"></div>
                    <div class="col-sm-6 col-md-4">
                        <h6 class="tt-title-sub">SPECIAL PRODUCTS</h6>
                        <div class="tt-layout-vertical-listing">
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-22.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-22-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            <span class="new-price">$14</span>
                                            <span class="old-price">$24</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-23.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-23-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            <span class="new-price">$14</span>
                                            <span class="old-price">$24</span>
                                        </div>
                                        <div class="tt-option-block">
                                            <ul class="tt-options-swatch">
                                                <li><a class="options-color tt-color-bg-03" href="#"></a></li>
                                                <li><a class="options-color tt-color-bg-04" href="#"></a></li>
                                                <li><a class="options-color tt-color-bg-05" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-21.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-21-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            <span class="new-price">$34</span>
                                            <span class="old-price">$74</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider visible-sm visible-xs"></div>
                    <div class="col-sm-6 col-md-4">
                        <h6 class="tt-title-sub">FEATURED PRODUCTS</h6>
                        <div class="tt-layout-vertical-listing">
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-16.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-16-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $24
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-12.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-12-01.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $178
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-13.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-13-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $54
                                        </div>
                                        <div class="tt-option-block">
                                            <ul class="tt-options-swatch">
                                                <li><a class="options-color tt-color-bg-01" href="#"></a></li>
                                                <li><a class="options-color tt-color-bg-02" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- brand
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-block-title">
                    <h2 class="tt-title">POPULAR</h2>
                    <div class="tt-description">CLOTHING BRANDS</div>
                </div>
                <div class="row tt-img-box-listing">
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-01.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-02.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-03.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-04.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-05.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-06.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-07.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-08.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!--
        <div class="container-indent">
            <div class="container-fluid">
                <div class="tt-block-title">
                    <h2 class="tt-title"><a href="https://www.instagram.com/">@ FOLLOW</a> US ON</h2>
                    <div class="tt-description">INSTAGRAM</div>
                </div>
                <div class="row">
                    <div id="instafeed" class="instafeed-fluid"
                         data-accessToken="8626857013.dd09515.0fcd8351c65140d48f5a340693af1c3f"
                         data-clientId="dd095157744c4bd0a67181fc4906e5b6"
                         data-userId="8626857013"
                         data-limitImg="6">
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>

@endsection
