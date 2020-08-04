@extends('layouts.app')

@section('content')
<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/products">Products</a></li>
            @foreach($item->categories->sortBy('depth') as $cat)
                <li><a href="{{route('product.category',['slug'=>$cat->slug])}}">{{$cat->name}}</a></li>
            @endforeach
            <li>{{$item->name}}</li>

        </ul>
    </div>
</div>

<div id="tt-pageContent">
    <div class="container-indent">
        <!-- mobile product slider  -->
        <div class="tt-mobile-product-layout visible-xs">
            <div class="tt-mobile-product-slider arrow-location-center slick-animated-show-js">
            </div>
        </div>
        <!-- /mobile product slider  -->
        <div class="container container-fluid-mobile">
            <div class="row">
                <div class="col-6 hidden-xs">
                    <div class="tt-product-vertical-layout">
                        <div class="tt-product-single-img">
                            <div>
                                <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
                                @if ($item->hasMedia('fiber'))
                                    <img class="zoom-product" src="{{ $item->firstMedia('fiber')->getProcessImage('w_480','h_600')}}" data-zoom-image="{{$item->getFirstImageUrl()}}" alt="{{$item->name}}">
                                @else
                                    <img class="zoom-product" src="{{asset('/images/product/product-01.jpg') }}" data-zoom-image="{{asset('/images/product/product-01.jpg') }}" alt="{{$item->name}}">
                                @endif
                            </div>
                        </div>
                        <div class="tt-product-single-carousel-vertical">
                            <ul id="smallGallery" class="tt-slick-button-vertical  slick-animated-show-js">
                                @if ($item->media)
                                    @foreach ($item->media as $media)
                                        <li><a href="#" data-image="{{$media->getProcessImage('w_80','h_100')}}" data-zoom-image="{{$media->getUrl()}}"><img src="{{$media->getProcessImage('w_80','h_100')}}" alt=""></a></li>
                                    @endforeach
                                @else
                                    <li><a href="#" data-image="{{'assets/images/product/product-01.jpg'|theme }}" data-zoom-image="{{'assets/images/product/product-01.jpg'|theme }}"><img src="{{'assets/images/product/product-01.jpg'|theme }}" alt=""></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="tt-product-single-info">

                        <h1 class="tt-title">{{$item->name}}</h1>
                        <div class="tt-price">
                        </div>
                        <div class="tt-review">
                            <div class="tt-rating">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-half"></i>
                                <i class="icon-star-empty"></i>
                            </div>
                            <a class="product-page-gotocomments-js" href="#">(1 Customer Review)</a>
                        </div>
                        <div class="tt-wrapper">
                        {!! $item->description !!}
                        </div>
                        <div class="tt-wrapper">
                            <div class="tt-countdown_box_02">
                                <div class="tt-countdown_inner">
                                    <div class="tt-countdown"
                                         data-date="2018-11-01"
                                         data-year="Yrs"
                                         data-month="Mths"
                                         data-week="Wk"
                                         data-day="Day"
                                         data-hour="Hrs"
                                         data-minute="Min"
                                         data-second="Sec"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-wrapper">
                            <div class="tt-row-custom-01">
                                <div class="col-item">
                                    <div class="tt-input-counter style-01">
                                        <span class="minus-btn"></span>
                                        <input type="text" value="1" size="5">
                                        <span class="plus-btn"></span>
                                    </div>
                                </div>
                                <div class="col-item">
                                    <a href="#" data-toggle="modal" data-target="#ModalQuote" class="btn btn-lg" data-pid="{{$item->id}}"><i class="icon-f-39"></i>Quote</a>
                                </div>
                            </div>
                        </div>
                        <div class="tt-wrapper">
                            <ul class="tt-list-btn">
                            </ul>
                        </div>
                        <div class="tt-wrapper">
                            <div class="tt-add-info">
                                <ul>
                                    <!-- <li><span>Vendor:</span> The Optic Fiber </li> -->
                                    <!-- <li><span>Product Type:</span> </li> -->
                                    @if ($item->tags->count() >0)
                                    <li><span>Tag:</span>
                                        @foreach ($item->tags as $tag)
                                            <a href="#">{{$tag->name}} </a> ,
                                        @endforeach
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tt-title-border"></div>
                    <h3 class="tt-title-border mt-3">Description</h3>
                    <div>
                        {!! $item->description !!}
                    </div>
                    <h3 class="tt-title-border mt-3">Features</h3>
                    <div style="margin-bottom: 25px">
                        {!! $item->featrue !!}
                    </div>
                    <h3 class="tt-title-border mt-3">Specs</h3>
                    <div>
                        {!! $item->specs !!}
                    </div>
                    <h3 class="tt-title-border mt-3">Quality Certification</h3>
                    <div>
                        Quality and standards are the foundation of <strong>theopticalfiber.com</strong> We are dedicated to providing customers with outstanding, standards-compliant products and services. <strong>theopticalfiber.com</strong> has passed many quality system verifications, like CE, RoHS, FCC, established an internationally standardized quality assurance system and strictly implemented standardized management and control in the course of design, development, production, installation and service.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent wrapper-social-icon">
        <div class="container">
            <ul class="tt-social-icon justify-content-center">
                <li><a class="icon-g-64" href="http://www.facebook.com/"></a></li>
                <li><a class="icon-h-58" href="http://www.facebook.com/"></a></li>
                <li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
                <li><a class="icon-g-67" href="http://www.google.com/"></a></li>
                <li><a class="icon-g-70" href="https://instagram.com/"></a></li>
            </ul>
        </div>
    </div>
</div>

@endsection
