@extends('layouts.app')

@section('content')

<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li>Product</li>
        </ul>
    </div>
</div>
<div id="tt-pageContent">
    <div class="container-indent">
        <div class="container">
            <div class="tt-layout-promo-box">
                <div class="row">
                    @foreach($categories as $item)
                        <div class="col-sm-6 col-md-4">
                            <a href="{{route('product.category',['slug'=>$item->slug])}}" class="tt-promo-box tt-one-child">
                                <img src="{{asset('/images/loader.svg')}}" data-src="{{ $item->featured_img ?  $item->getProcessImage('w_580','h_500') : asset('/images/promo/promo-collection-03.jpg')}}" alt="">
                                <div class="tt-description">
                                    <div class="tt-description-wrapper">
                                        <div class="tt-background"></div>
                                        <div class="tt-title-small"> {!! $item->name !!}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
