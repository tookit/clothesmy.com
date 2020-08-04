@extends('layouts.app')

@section('content')
    <div class="tt-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/tag">Tag</a></li>
                <li>{!! $item->name  !!}</li>
            </ul>
        </div>
    </div>
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside">
                        <div class="tt-btn-col-close">
                            <a href="#">Close</a>
                        </div>
                        <div class="tt-collapse open tt-filter-detach-option">
                            <div class="tt-collapse-content">
                                <div class="filters-mobile">
                                    <div class="filters-row-select">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-collapse open">
                            <h3 class="tt-collapse-title">PRODUCT CATEGORIES</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-list-row">
                                    @foreach($categories as $cat)
                                    <li class="{{$cat->id == $item->id ? 'active': ''}}"><a href="/product/category/{{ $cat->slug }}">{!! $cat->name !!}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tt-content-aside">
                            <a href="#" class="tt-promo-03">
                                <img src="{{asset('/images/custom/listing_promo_img_07.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9 col-xl-9">
                        <div class="content-indent container-fluid-custom-mobile-padding-02">
                            <div class="tt-filters-options">
                                <h1 class="tt-title">
                                    {!! $item->name !!} <span class="tt-title-total">({{$item->products->count()}})</span>
                                </h1>
                                <div class="tt-btn-toggle">
                                    <a href="#">FILTER</a>
                                </div>
                                <div class="tt-sort">
                                    <select>
                                        <option value="Default Sorting">Default Sorting</option>
                                        <option value="Default Sorting">Default Sorting 02</option>
                                        <option value="Default Sorting">Default Sorting 03</option>
                                    </select>
                                    <select>
                                        <option value="Show">Show</option>
                                        <option value="9">9</option>
                                        <option value="16">16</option>
                                        <option value="32">32</option>
                                    </select>
                                </div>
                                <div class="tt-quantity">
                                    <a href="#" class="tt-col-one" data-value="tt-col-one"></a>
                                    <a href="#" class="tt-col-two" data-value="tt-col-two"></a>
                                    <a href="#" class="tt-col-three" data-value="tt-col-three"></a>
                                    <a href="#" class="tt-col-four" data-value="tt-col-four"></a>
                                    <a href="#" class="tt-col-six" data-value="tt-col-six"></a>
                                </div>
                            </div>
                            <div class="tt-product-listing row">
                                @foreach($item->products as $product)
                                <div class="col-6 col-md-4 tt-col-item">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-pid="{{$product->id}}" 	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" data-toggle="modal" data-target="#ModalQuote" class="btn-quote"  data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="/product/item/{{ $product->slug }}">
                                                @if($product->hasMedia('fiber'))
                                                    <span class="tt-img"><img src="{{asset('/images/loader.svg')}}" data-src="{{ $product->getFirstMedia('fiber')->getProcessImage('w_278','h_348')  }}" alt="{{$product->name}}"></span>
                                                    <span class="tt-img-roll-over"><img src="{{asset('/images/loader.svg')}}" data-src="{{ $product->getFirstMedia('fiber')->getProcessImage('w_278','h_348') }}" alt="{{$product->name}}"></span>
                                                @else
                                                <span class="tt-img"><img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/product/product-18.jpg')}}" alt="{{$product->name}}"></span>
                                                <span class="tt-img-roll-over"><img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/product/product-18-01.jpg')}}" alt="{{$product->name}}"></span>
                                                @endif

                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="/product/category/{{$item->slug}}">{{$item->name}}</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="/product/item/{{ $product->slug}}">{{$product->name}}</a></h2>
                                            <div class="tt-price">
                                            </div>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" data-toggle="modal" data-target="#ModalQuote" class="btn-quote btn thumbprod-button-bg" data-id="{{$product->id}}">Quote</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <ul class="tt-pagination">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
