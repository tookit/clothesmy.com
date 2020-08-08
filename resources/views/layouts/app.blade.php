<!DOCTYPE html>
<!--
Theme: The Optical Fiber
Version: 2.0.1
Site: http://www.isocked.com
-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->


<html  lang="en-x-mtfrom-fr">
<head>
    <meta charset="utf-8" />
    <title>The best manufacture of The Optical Fiber  </title>
    <meta name="description" content="{{ $meta['description'] ?? ''  }}">
    <meta name="keywords" content="{{ $meta['keywords'] ?? '' }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="michaelwang" name="author" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Theme Core CSS -->
    <link href="{{ asset('/css/theme.css')  }}" rel="stylesheet">
    <link href="{{ asset('/external/message/message.css')  }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css').'?v='.now()  }}" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/Swiper/5.4.5/css/swiper.min.css" rel="stylesheet">
    <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
</head>

<body>
<div id="loader-wrapper">
    <div id="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>

<!-- BEGIN: HEADER -->
@include('layouts.header')

<!-- END: HEADER -->

<!-- BEGIN: PAGE CONTAINER -->
@yield('content')
<!-- END: PAGE CONTAINER -->

<!-- BEGIN: Footer-->
@include('layouts.footer')

<!-- END: Footer -->

<a href="#" class="tt-back-to-top">BACK TO TOP</a>

<!-- modal (quickViewModal) -->
<div class="modal  fade"  id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body" id="productQuickView">
            </div>
        </div>
    </div>
</div>

<!-- Modal (Quote) -->
<div class="modal  fade"  id="ModalQuote" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true"  data-pause=2000>
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <h3>Quote</h3>
                <div class="tt-modal-quote">
                    <form id="quoteForm" class="contact-form form-default" method="post"  action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" id="inputName" placeholder="Your Name (required)">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Your Email (required)">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="mobile" class="form-control" id="inputSubject" placeholder="Mobile (required)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea  name="remark" class="form-control" rows="7" placeholder="Remark"  id="textareaMessage"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" id="quoteBtn" class="btn tt-btn-quote">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN: LAYOUT/BASE/BOTTOM -->



<!-- END: CORE PLUGINS -->

<!-- BEGIN: LAYOUT PLUGINS -->
<script src="https://cdn.bootcdn.net/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>


<?php
Assets::add([
    'external/jquery/jquery.min.js',
    'external/bootstrap/js/bootstrap.min.js',
    'external/slick/slick.min.js',
    'external/perfect-scrollbar/perfect-scrollbar.min.js',
    'external/panelmenu/panelmenu.js',
    'external/countdown/jquery.countdown.min.js',
    'external/countdown/jquery.plugin.min.js',
    'external/elevatezoom/jquery.elevatezoom.js',
    'external/magnific-popup/jquery.magnific-popup.min.js',
    'external/lazyLoad/lazyload.min.js',
    'external/message/message.min.js',
    'main.js',

]);
echo Assets::js('external')
?>
<!-- END: THEME SCRIPTS -->

<!-- form validation and sending to mail -->



<!-- END: PAGE SCRIPTS -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134541321-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-134541321-2');
</script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="4314339a-f19c-4c71-b27b-b3bae5a38e5d";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>

</html>
