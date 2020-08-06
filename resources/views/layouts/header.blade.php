<header>
    <div class="tt-color-scheme-01">
        <div class="container">
            <div class="tt-header-row tt-top-row">
                <div class="tt-col-left">
                    <div class="tt-box-info">
                        <ul>
                            <li><i class="icon-f-44"></i>Production lead time: 7~12 days after deposit</li>
                        </ul>
                    </div>
                </div>
                <div class="tt-col-right ml-auto">
                    <ul class="tt-social-icon">
                        <li><a class="icon-g-64" target="_blank" href="http://www.facebook.com/"></a></li>
                        <li><a class="icon-h-58" target="_blank" href="http://www.twitter.com/"></a></li>
                        <li><a class="icon-g-66" target="_blank" href="http://www.google.com/"></a></li>
                        <li><a class="icon-g-67" target="_blank" href="http://www.instagram.com/"></a></li>
                        <li><a class="icon-g-70" target="_blank" href="#"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- tt-mobile menu -->
    <nav class="panel-menu mobile-main-menu">
        <ul>
            @foreach ($categories as $item)
                <li>
                    <a href="{{route('product.category',['slug'=>$item->slug])}}">
                        <i class="icon-e-03"></i>
                        <span>{!! $item->name !!}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="mm-navbtn-names">
            <div class="mm-closebtn">Close</div>
            <div class="mm-backbtn">Back</div>
        </div>
    </nav>
    <!-- tt-mobile-header -->
    <div class="tt-mobile-header">
        <div class="container-fluid">
            <div class="header-tel-info">
                <i class="icon-f-93"></i> {{config('site.phone')}}
            </div>
        </div>
        <div class="container-fluid tt-top-line">
            <div class="tt-header-row">
                <div class="tt-mobile-parent-menu">
                    <div class="tt-menu-toggle stylization-02">
                        <i class="icon-03"></i>
                    </div>
                </div>
                <div class="tt-mobile-parent-menu-categories tt-parent-box">
                    <button class="tt-categories-toggle">
                        <i class="icon-categories"></i>
                    </button>
                </div>
                <!-- search -->
                <div class="tt-mobile-parent-search tt-parent-box"></div>
                <!-- /search -->
                <!-- cart -->
                <div class="tt-mobile-parent-cart tt-parent-box"></div>
                <!-- /cart -->
                <!-- account -->
                <div class="tt-mobile-parent-account tt-parent-box"></div>
                <!-- /account -->
                <!-- currency -->
                <div class="tt-mobile-parent-multi tt-parent-box"></div>
                <!-- /currency -->
            </div>
        </div>
        <div class="container-fluid tt-top-line">
            <div class="row">
                <div class="tt-logo-container">
                    <!-- mobile logo -->
                    <a class="tt-logo tt-logo-alignment" href="/"><img src="{{asset('/images/logo/logo_text.png')}}" alt="Clothes My">Clothes My</a>
                    <!-- /mobile logo -->
                </div>
            </div>
        </div>
    </div>
    <!-- tt-desktop-header -->
    <div class="tt-desktop-header headerunderline">
        <div class="container">
            <div class="tt-header-holder">
                <div class="tt-col-obj tt-obj-logo">
                    <!-- logo -->
                    <a class="tt-logo tt-logo-alignment" href="/"><img src="{{asset('/images/logo/logo_text.png')}}" alt="Clothes My">
                    </a>
                    <!-- /logo -->
                </div>
                <div class="tt-col-obj tt-obj-search-type2">
                    <div class="tt-search-type2">
                        <form action="/search" method="get" role="search">
                            <i class="icon-f-85"></i>
                            <input value="{{$query ?? ''}}" name="q" class="tt-search-input" type="search" placeholder="SEARCH PRODUCTS..." aria-label="SEARCH PRODUCTS..." autocomplete="off">
                            <button type="submit" class="tt-btn-search">SEARCH</button>
                            <div class="search-results" style="display: none;"></div>
                        </form>
                    </div>
                </div>
                <div class="tt-col-obj tt-obj-options obj-move-right">

                    <!-- tt-langue and tt-currency -->
                    <div id="google_translate_element"></div>
                    <!-- /tt-langue and tt-currency -->
                </div>
            </div>
        </div>
        <div class="container small-header">
            <div class="tt-header-holder">
                <div class="tt-col-obj tt-obj-menu-categories tt-desctop-parent-menu-categories">
                    <div class="tt-menu-categories">
                        <button class="tt-dropdown-toggle">
                            CATEGORIES
                        </button>
                        <div class="tt-dropdown-menu">
                            <nav>
                                <ul>
                                    @foreach ($categories as $item)
                                        <li>
                                            <a href="{{route('product.category',['slug'=>$item->slug])}}">
                                                <i class="icon-e-03"></i>
                                                <span>{!! $item->name !!}</span>
                                            </a>

                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="tt-col-obj tt-obj-menu">
                    <!-- tt-menu -->
                    <div class="tt-desctop-parent-menu tt-parent-box">
                        <div class="tt-desctop-menu">
                            <nav>
                                <ul>
                                    <li class="dropdown">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="/product">Product</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="/news">News</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="/about">About</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="/contact">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /tt-menu -->
                </div>
                <div class="tt-col-obj tt-obj-options obj-move-right">
                    <!-- tt-search -->
                    <div class="tt-desctop-parent-search tt-parent-box tt-obj-desktop-hidden">
                        <div class="tt-search tt-dropdown-obj">
                            <button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
                                <i class="icon-f-85"></i>
                            </button>
                            <div class="tt-dropdown-menu">
                                <div class="container">
                                    <form>
                                        <div class="tt-col">
                                            <input type="text" class="tt-search-input" placeholder="Search Products...">
                                            <button class="tt-btn-search" type="submit"></button>
                                        </div>
                                        <div class="tt-col">
                                            <button class="tt-btn-close icon-g-80"></button>
                                        </div>
                                        <div class="tt-info-text">
                                            What are you Looking for?
                                        </div>
                                        <div class="search-results">
                                            <button type="button" class="tt-view-all">View all products</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /tt-search -->

                </div>
            </div>
        </div>
    </div>
    <!-- /tt-desktop-header -->
    <!-- stuck nav -->
    <div class="tt-stuck-nav">
        <div class="container">
            <div class="tt-header-row ">
                <div class="tt-stuck-desctop-menu-categories"></div>
                <div class="tt-stuck-parent-menu"></div>
                <div class="tt-stuck-mobile-menu-categories"></div>
                <div class="tt-stuck-parent-search tt-parent-box"></div>
                <div class="tt-stuck-parent-cart tt-parent-box"></div>
                <div class="tt-stuck-parent-account tt-parent-box"></div>
                <div class="tt-stuck-parent-multi tt-parent-box"></div>
            </div>
        </div>
    </div>
</header>
