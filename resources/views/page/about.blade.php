@extends('layouts.app')

@section('content')
    <div class="tt-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>About</li>
            </ul>
        </div>
    </div>
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">

                <h1 class="tt-title-subpages">Kame Technology</h1>
                <div class="tt-box-faq-listing">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <h2 class="tt-base-color">About US </h2>
                            <div class="tt">
                                <p>
                                    Established in 2007, Kame is a leading manufacturer of fiber optic components and a
                                    professional provider of FTTH and FTTA solution, and OEM solution in China.
                                    Headquarter located in center Shenzhen with 3,000 sq.m factory, over 200 workers in
                                    sub Shenzhen producing PLC splitter, fiber patch cords, fiber pigtails... etc.
                                    The number of our global customers has grown over the years. We have increased our
                                    presence in the United States, Asia and Germany and are still expanding our business in
                                    Australia, the United Kingdom, Singapore and Russia and so on.
                                    It is our unwavering commitment to create market leading products and bring value to
                                    customers around the world. As a means of demonstrating our commitment to supply the
                                    best products and network solutions.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <h2 class="tt-base-color mt-5">Product Highlight </h2>
                            <div class="tt">
                                <table class="tt-table-01">
                                    <thead>
                                    <tr>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Cable Assembly</td>
                                        <td>
                                            SC, LC, FC, ST, MTRJ,E2000 patch cords, FTTH pigtails with sockets, and data
                                            center cabling MTP/MPO solution, FTTA solution, various adapters, attenuators
                                            and loopbacks;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Passive
                                            Components</td>
                                        <td>
                                            PLC splitter, FBT coupler, CWDM device, CCWDM device, DWDM device, AWG
                                            device and FA-MT, etc.;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ODN Products</td>
                                        <td>
                                            Optical Fiber Cables, Splice Enclosures, Terminal Box and various ODF, Cabinets
                                            and Fiber Patch panel;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Toolkits and FTTH
                                            Accessories</td>
                                        <td>
                                            Toolkit set, like kelvar cutter, cable strippers, pen type cleaner, etc and FTTH
                                            accessories like splice tube, faster connector, various FTTH installation materials.
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <h2 class="tt-base-color mt-5">Kame Certification </h2>
                            <div class="tt">
                                <p>Quality and standards are the foundation of Kame ,We are dedicated to providing customers with the
                                    outstanding, standards-compliant products and services.
                                    And has passed many quality system verifications, after ISO9001 certified in April2009, NSD has
                                    acquired CE, ROSH in 2013</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <h2 class="tt-base-color mt-5">Kame Core Value </h2>
                            <div class="tt">
                                <p>
                                    Customers come first” and Quality First
                                    We will do our best to satisfy our customers’ requirements and offer quality products and
                                    quality service is our key for long-term cooperation.
                                </p>
                            </div>
                            <blockquote class="tt-blockquote">
                                <i class="tt-icon icon-g-56"></i>
                                <span class="tt-title">Customer First !</span>
                                <span class="tt-title-description"><span>We will always spare no effort to offer meticulous &amp; comprehensive services to our clients from the very
beginning of project evaluation to the fulfillment of network communication, and whatever stage of your
project is, it is our honor to provide you all-round service.</span></span>
                            </blockquote>
                        </div>
                    </div>
                </div>



                <h2 class="tt-base-color mt-5">Our Factory</h2>
                <div class="tt-box-thumb-listing">
                    <div class="row">
                        @foreach($images as $img)
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="tt-box-thumb">
                                <a href="#" class="tt-img"><img src="{{asset('/images/loader.svg')}}" data-src="{{$img}}" alt=""></a>
{{--                                <h6 class="tt-title"><a href="#">FUTURE LEADERS</a></h6>--}}
{{--                                <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>--}}
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
