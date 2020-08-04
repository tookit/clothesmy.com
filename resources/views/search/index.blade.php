@extends('layouts.app')

@section('content')
    <div class="tt-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>Search</li>
            </ul>
        </div>
    </div>
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="row">
                    <div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside desctop-no-sidebar">
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
                            <h3 class="tt-collapse-title">SORT BY</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-filter-list">
                                    <li class="active">
                                        <a href="#">Shirts &amp; Tops</a>
                                    </li>
                                    <li>
                                        <a href="#">XS</a>
                                    </li>
                                    <li>
                                        <a href="#">White</a>
                                    </li>
                                </ul>
                                <a href="#" class="btn-link-02">Clear All</a>
                            </div>
                        </div>
                        <div class="tt-collapse open">
                            <h3 class="tt-collapse-title">PRODUCT CATEGORIES</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-list-row">
                                    <li class="active"><a href="#">Dresses</a></li>
                                    <li><a href="#">Shirts &amp; Tops</a></li>
                                    <li><a href="#">Polo Shirts</a></li>
                                    <li><a href="#">Sweaters</a></li>
                                    <li><a href="#">Blazers &amp; Vests</a></li>
                                    <li><a href="#">Jackets &amp; Outerwear</a></li>
                                    <li><a href="#">Activewear</a></li>
                                    <li><a href="#">Pants</a></li>
                                    <li><a href="#">Jumpsuits &amp; Shorts</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Skirts</a></li>
                                    <li><a href="#">Swimwear</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tt-collapse open">
                            <h3 class="tt-collapse-title">FILTER BY PRICE</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-list-row">
                                    <li class="active"><a href="#">$0 — $50</a></li>
                                    <li><a href="#">$50 — $100</a></li>
                                    <li><a href="#">$100 — $150</a></li>
                                    <li><a href="#">$150 —  $200</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tt-collapse open">
                            <h3 class="tt-collapse-title">FILTER BY SIZE</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-options-swatch options-middle">
                                    <li><a href="#">4</a></li>
                                    <li class="active"><a href="#">6</a></li>
                                    <li><a href="#">8</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#">12</a></li>
                                    <li><a href="#">14</a></li>
                                    <li><a href="#">16</a></li>
                                    <li><a href="#">18</a></li>
                                    <li><a href="#">20</a></li>
                                    <li><a href="#">22</a></li>
                                    <li><a href="#">24</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tt-collapse open">
                            <h3 class="tt-collapse-title">FILTER BY COLOR</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-options-swatch options-middle">
                                    <li><a class="options-color tt-border tt-color-bg-08" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-09" href="#"></a></li>
                                    <li class="active"><a class="options-color tt-color-bg-10" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-11" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-12" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-13" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-14" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-15" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-16" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-17" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-18" href="#"></a></li>
                                    <li><a class="options-color" href="#">
									<span class="swatch-img">
										<img src="images/custom/texture-img-01.jpg" alt="">
									</span>
                                            <span class="swatch-label color-black"></span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tt-collapse open">
                            <h3 class="tt-collapse-title">VENDOR</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-list-row">
                                    <li><a href="#">Levi's</a></li>
                                    <li><a href="#">Gap</a></li>
                                    <li><a href="#">Polo</a></li>
                                    <li><a href="#">Lacoste</a></li>
                                    <li><a href="#">Guess</a></li>
                                </ul>
                                <a href="#" class="btn-link-02">+ More</a>
                            </div>
                        </div>
                        <div class="tt-collapse open">
                            <h3 class="tt-collapse-title">SALE PRODUCTS</h3>
                            <div class="tt-collapse-content">
                                <div class="tt-aside">
                                    <a class="tt-item" href="product.html">
                                        <div class="tt-img">
                                            <span class="tt-img-default"><img src="images/product/product-01.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/product/product-01-02.jpg" alt=""></span>
                                        </div>
                                        <div class="tt-content">
                                            <h6 class="tt-title">Flared Shift Dress</h6>
                                            <div class="tt-price">
                                                <span class="sale-price">$14</span>
                                                <span class="old-price">$24</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="tt-item" href="product.html">
                                        <div class="tt-img">
                                            <span class="tt-img-default"><img src="images/product/product-02.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/product/product-02-02.jpg" alt=""></span>
                                        </div>
                                        <div class="tt-content">
                                            <h6 class="tt-title">Flared Shift Dress</h6>
                                            <div class="tt-price">
                                                <span class="sale-price">$14</span>
                                                <span class="old-price">$24</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="tt-item" href="product.html">
                                        <div class="tt-img">
                                            <span class="tt-img-default"><img src="images/product/product-03.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/product/product-03-02.jpg" alt=""></span>
                                        </div>
                                        <div class="tt-content">
                                            <h6 class="tt-title">Flared Shift Dress</h6>
                                            <div class="tt-price">
                                                <span class="sale-price">$14</span>
                                                <span class="old-price">$24</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tt-collapse open">
                            <h3 class="tt-collapse-title">TAGS</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-list-inline">
                                    <li><a href="#">Dresses</a></li>
                                    <li><a href="#">Shirts &amp; Tops</a></li>
                                    <li><a href="#">Polo Shirts</a></li>
                                    <li><a href="#">Sweaters</a></li>
                                    <li><a href="#">Blazers</a></li>
                                    <li><a href="#">Vests</a></li>
                                    <li><a href="#">Jackets</a></li>
                                    <li><a href="#">Outerwear</a></li>
                                    <li><a href="#">Activewear</a></li>
                                    <li><a href="#">Pants</a></li>
                                    <li><a href="#">Jumpsuits</a></li>
                                    <li><a href="#">Shorts</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Skirts</a></li>
                                    <li><a href="#">Swimwear</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tt-content-aside">
                            <a href="listing-left-column.html" class="tt-promo-03">
                                <img src="images/custom/listing_promo_img_07.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="content-indent">
                            <div class="tt-filters-options desctop-no-sidebar">
                                <h1 class="tt-title">
                                    {{$query}} <span class="tt-title-total">({{$items->total()}})</span>
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
                                @foreach($items as $item)
                                <div class="col-6 col-md-4 col-lg-3 tt-col-item">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="{{route('product.view',['slug'=>$item->slug])}}">
                                                <span class="tt-img"><img src="{{asset('/images/loader.svg')}}" data-src="{{$item->featured_img}}" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="{{asset('/images/loader.svg')}}" data-src="{{$item->featured_img}}" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <!-- <li><a href="#">category</a></li> -->
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="{{route('product.view',['slug'=>$item->slug])}}">{{$item->name}}</a></h2>
                                            <div class="tt-price">
                                            </div>
                                            <div class="tt-product-inside-hover">
                                                {{--<div class="tt-row-btn">--}}
                                                    {{--<a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>--}}
                                                {{--</div>--}}
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
                            {{-- page--}}
                            <ul class="tt-pagination">
                            {{ $items->withQueryString()->render() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
