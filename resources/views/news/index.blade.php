@extends('layouts.app')

@section('content')
    <div class="tt-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>News</li>
            </ul>
        </div>
    </div>
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages noborder">News</h1>
                <div class="row flex-sm-row-reverse">
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <div class="tt-listing-post">
                        @foreach($news->paginate(15) as $item)
                            <div class="tt-post">
                                <div class="tt-post-img">
                                    <a href="{{$item->href}}"><img src="images/loader.svg" data-src="images/blog/blog-post-img-01.jpg" alt=""></a>
                                </div>
                                <div class="tt-post-content">
                                    <div class="tt-tag"><a href="{{$item->href}}">{{ $item->category->name }}</a></div>
                                    <h2 class="tt-title"><a href="{{$item->href}}">{{ $item->name }}</a></h2>
                                    <div class="tt-description">
                                        {{$item->description}}
                                    </div>
                                    <div class="tt-meta">
                                        <div class="tt-autor">
                                            by <span>Coco</span> {{$item->created_at}}
                                        </div>
                                        <div class="tt-comments">
                                            <a href="#"><i class="tt-icon icon-f-88"></i>7</a>
                                        </div>
                                    </div>
                                    <div class="tt-btn">
                                        <a href="{{$item->href}}" class="btn">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <ul class="tt-pagination">
                                {{ $news->paginate()->render() }}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 leftColumn">
                        <div class="tt-block-aside">
                            <h3 class="tt-aside-title">CATEGORIES</h3>
                            <div class="tt-aside-content">
                                <ul class="tt-list-row">
                                    @foreach($newsCategories as $item)
                                    <li><a href="{{$item->href}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tt-block-aside">
                            <h3 class="tt-aside-title">ABOUT</h3>
                            <div class="tt-aside-content">
                                <div class="tt-aside-info">
                                    <a href="#" class="tt-aside-img">
                                        <img src="images/loader.svg" data-src="images/blog/blog-post-img-07.jpg" alt="">
                                    </a>
                                    <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                                    <a href="#" class="btn-link btn-top">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="tt-block-aside">
                            <h3 class="tt-aside-title">TAGS</h3>
                            <div class="tt-aside-content">
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

                        <div class="tt-block-aside">
                            <h3 class="tt-aside-title">FOLLOW US</h3>
                            <div class="tt-aside-content">
                                <ul class="tt-social-icon">
                                    <li><a class="icon-g-64" href="http://www.facebook.com/"></a></li>
                                    <li><a class="icon-h-58" href="http://www.facebook.com/"></a></li>
                                    <li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
                                    <li><a class="icon-g-67" href="http://www.google.com/"></a></li>
                                    <li><a class="icon-g-70" href="https://instagram.com/"></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
