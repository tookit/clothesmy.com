<footer class="">
    <div class="tt-footer-default tt-color-scheme-02">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="tt-newsletter-layout-01">
                        <div class="tt-newsletter">
                            <div class="tt-mobile-collapse">
                                <h4 class="tt-collapse-title">
                                    BE IN TOUCH WITH US:
                                </h4>
                                <div class="tt-collapse-content">
                                    <form id="newsletterform"  class="form-inline form-default" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Enter your e-mail">
                                            <button type="submit" class="btn">JOIN US</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">
                    <ul class="tt-social-icon">
                        <li><a class="icon-g-64" target="_blank" href="http://www.facebook.com/"></a></li>
                        <li><a class="icon-h-58" target="_blank" href="http://www.facebook.com/"></a></li>
                        <li><a class="icon-g-66" target="_blank" href="http://www.twitter.com/"></a></li>
                        <li><a class="icon-g-67" target="_blank" href="http://www.google.com/"></a></li>
                        <li><a class="icon-g-70" target="_blank" href="https://instagram.com/"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tt-footer-col tt-color-scheme-01">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-2 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            CATEGORIES
                        </h4>
                        <div class="tt-collapse-content">
                            <ul class="tt-list">
                                @foreach ($categories as $item)
                                    <li>
                                        <a href="{{route('product.category',['slug'=>$item->slug])}}">
                                            <i class="icon-e-03"></i>
                                            <span>{!!  $item->name !!}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            MY ACCOUNT
                        </h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            ABOUT
                        </h4>
                        <div class="tt-collapse-content">
                            <p>
{{--                                {{ about }}--}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="tt-newsletter">
                        <div class="tt-mobile-collapse">
                            <h4 class="tt-collapse-title">
                                CONTACTS
                            </h4>
                            <div class="tt-collapse-content">
                                <address>
                                    <p><span>Address:</span> {{ config('site.address') }}</p>
                                    <p><span>Phone:</span> {{config('site.phone')}}</p>
                                    <p><span>Hours:</span> 7 Days a week from 10 am to 6 pm</p>
                                    <p><span>E-mail:</span> <a href="mailto:{{ config('site.email') }}">{{config('site.email')}}</a></p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tt-footer-custom">
        <div class="container">
            <div class="tt-row">
                <div class="tt-col-left">
                    <div class="tt-col-item tt-logo-col">
                        <!-- logo -->
                        <a class="tt-logo tt-logo-alignment" href="/">
                            <img  src="{{asset('/images/logo/logo.png')}}" alt="The Optic Fiber">
                        </a>
                        <!-- /logo -->
                    </div>
                    <div class="tt-col-item">
                        <!-- copyright -->
                        <div class="tt-box-copyright">
                            &copy; Kame Technology <?php echo date("Y") ?>. All Rights Reserved
                        </div>
                        <!-- /copyright -->
                    </div>
                </div>
                <div class="tt-col-right">
                    <div class="tt-col-item">
                        <!-- payment-list -->
                        <ul class="tt-payment-list">
                            <li><a href="#"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span>
			                </span></a></li>
                            <li><a href="#"> <span class="icon-paypal-2">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
			                </span></a></li>
                            <li><a href="#"><span class="icon-visa">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
			                </span></a></li>
                            <li><a href="#"><span class="icon-mastercard">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span>
			                </span></a></li>
                            <li><a href="#"><span class="icon-discover">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span>
			                </span></a></li>
                            <li><a href="#"><span class="icon-american-express">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span>
			                </span></a></li>
                        </ul>
                        <!-- /payment-list -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
