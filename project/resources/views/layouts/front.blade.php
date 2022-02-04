<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!--     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"> -->

    <title>Reborn Market Place</title>
    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- site Favicon -->
    <link rel="icon" href="{{asset('assets/front/images/favicon/favicon.png')}}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{asset('assets/front/images/favicon/favicon.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('assets/front/images/favicon/favicon.png')}}" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{asset('assets/front/css/vendor/ecicons.min.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{asset('assets/front/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/plugins/countdownTimer.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/plugins/slick.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/plugins/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.css')}}" />
    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('assets/front/css/demo1.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{asset('assets/front/css/backgrounds/bg-4.css')}}">
</head>

<body>

    <!-- Header start  -->
    <header class="ec-header">
        <!--Ec Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Header Top social Start -->
                    <div class="col-md-4 text-left header-top-left d-none d-lg-block">
                        <div class="header-logo">
                            <a href="{{ route('front.index') }}"><img src="{{asset('assets/front/images/logo/logo.png')}}" alt="Site Logo" /><img class="dark-logo" src="{{asset('assets/front/images/logo/dark-logo.png')}}" alt="Site Logo" style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Header Top social End -->

                    <!-- Header Top Language Currency -->
                    <div class="col-md-8 header-top-right d-none d-lg-block">
                        <div class="header-top-lan-curr d-flex justify-content-end">
                            <div class="header-search">
                                <form id="searh" class="form-horizontal" action="{{route('front.search')}}" method="GET">
                                    <input class="form-control" name="s" id="s" placeholder="{{ $langg->lang2 }}" type="text" value="{{ request()->input('s') }}">
                                    <button class="submit" type="submit"><img src="{{asset('assets/front/images/icons/search.svg')}}" class="svg_img header_svg" alt="" /></button>
                                </form>
                            </div>
                            <!-- Currency Start -->
                            <div class="header-top-curr dropdown">
                                @if(Auth::user())
                                <a class="g-color" href="{{ route('user-logout') }}" style="background: brown;">Logout</a>
                                @else
                                <a class="g-color" href="{{ route('front.signin') }}">{{ $langg->lang12 }}</a>
                                @endif
                                <button class="dropdown-toggle text-upper g-color" data-bs-toggle="dropdown">
                                <span>{{ Session::has('currency') ?   DB::table('currencies')->where('id','=',Session::get('currency'))->first()->sign   : DB::table('currencies')->where('is_default','=',1)->first()->sign }}</span>
                                <span>{{ Session::has('currency') ?   DB::table('currencies')->where('id','=',Session::get('currency'))->first()->name   : DB::table('currencies')->where('is_default','=',1)->first()->name }}</span>
                                <i class="ecicon eci-caret-down" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" id="drop-one">
                                    @foreach(DB::table('currencies')->get() as $currency)
                                        <li><a class="dropdown-item" href="{{route('front.currency',$currency->id)}}">{{$currency->sign}} {{$currency->name}}</a></li>
									@endforeach
                                    <!-- <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                    <li><a class="dropdown-item" href="#">EUR €</a></li> -->
                                </ul>
                                <button class="dropdown-toggle1 text-upper g-color" data-bs-toggle="dropdown">
                                {{ Session::has('language') ?   DB::table('languages')->where('id','=',Session::get('language'))->first()->language : DB::table('languages')->where('is_default','=',1)->first()->language }}
                                    <i class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu1" style="display: none;">
                                    @foreach(DB::table('languages')->get() as $language)
                                        <li class="active"><a class="dropdown-item" href="{{route('front.language',$language->id)}}">{{$language->language}}</a></li>
                                    @endforeach
                                </ul>
                                <!-- <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon">
                                        <img src="{{asset('assets/front/images/icons/cart.svg')}}" class="svg_img header_svg" alt="">
                                    </div>
                                    <span class="ec-header-count cart-count-lable">3</span>
                                </a> -->
                            </div>

                            <!-- Currency End -->
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- Ec Header Top  End -->

        <!-- Header responsive Bottom  Start -->
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">

                    <!-- Ec Header Logo Start -->
                    <div class="col">
                        <div class="header-logo">
                            <a href="index.html"><img src="{{asset('assets/front/images/logo/logo.png')}}" alt="Site Logo" /><img class="dark-logo" src="{{asset('assets/front/images/logo/dark-logo.png')}}" alt="Site Logo" style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">

                            <div class="header-top-curr dropdown mobile-view">
                                @if(Auth::user())
                                <a class="g-color" href="{{ route('user-logout') }}" style="background: brown;">Logout</a>
                                @else
                                <a class="g-color" href="{{ route('front.signin') }}">{{ $langg->lang12 }}</a>
                                @endif
                                <button class="dropdown-toggle text-upper g-color" data-bs-toggle="dropdown">
                                <span>{{ Session::has('currency') ?   DB::table('currencies')->where('id','=',Session::get('currency'))->first()->sign   : DB::table('currencies')->where('is_default','=',1)->first()->sign }}</span>
                                <span>{{ Session::has('currency') ?   DB::table('currencies')->where('id','=',Session::get('currency'))->first()->name   : DB::table('currencies')->where('is_default','=',1)->first()->name }}</span>
                                <i class="ecicon eci-caret-down" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" id="drop-one">
                                    @foreach(DB::table('currencies')->get() as $currency)
                                        <li><a class="dropdown-item" href="{{route('front.currency',$currency->id)}}">{{$currency->sign}} {{$currency->name}}</a></li>
									@endforeach
                                    <!-- <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                    <li><a class="dropdown-item" href="#">EUR €</a></li> -->
                                </ul>
                                <button class="dropdown-toggle1 text-upper g-color" data-bs-toggle="dropdown">
                                {{ Session::has('language') ?   DB::table('languages')->where('id','=',Session::get('language'))->first()->language : DB::table('languages')->where('is_default','=',1)->first()->language }}
                                    <i class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu1" style="display: none;">
                                    @foreach(DB::table('languages')->get() as $language)
                                        <li class="active"><a class="dropdown-item" href="{{route('front.language',$language->id)}}">{{$language->language}}</a></li>
                                    @endforeach
                                </ul>
                                <!-- <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon">
                                        <img src="{{asset('assets/front/images/icons/cart.svg')}}" class="svg_img header_svg" alt="">
                                    </div>
                                    <span class="ec-header-count cart-count-lable">3</span>
                                </a> -->
                            </div>

                            <form class="ec-btn-group-form" action="#">
                                <input class="form-control" placeholder="Enter Your Product Name..." type="text">
                                <button class="submit" type="submit"><img src="{{asset('assets/front/images/icons/search.svg')}}" class="svg_img header_svg" alt="icon" /></button>
                            </form>

                        </div>

                    </div>
                    <!-- Ec Header Search End -->
                </div>
            </div>
        </div>


    </header>



    <div class="ec-side-cart-overlay"></div>
    <div id="ec-side-cart" class="ec-side-cart">
        <div class="ec-cart-inner">
            <div class="ec-cart-top">
                <div class="ec-cart-title">
                    <span class="cart_title">My Cart</span>
                    <button class="ec-close">×</button>
                </div>
                <ul class="eccart-pro-items">
                    <li>
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img src="{{asset('assets/front/images/product-image/6_1.jpg')}}" alt="product"></a>
                        <div class="ec-pro-content">
                            <a href="product-left-sidebar.html" class="cart_pro_title">T-shirt For Women</a>
                            <span class="cart-price"><span>$76.00</span> x 1</span>
                            <div class="qty-plus-minus">
                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                            </div>
                            <a href="javascript:void(0)" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img src="{{asset('assets/front/images/product-image/12_1.jpg')}}" alt="product"></a>
                        <div class="ec-pro-content">
                            <a href="product-left-sidebar.html" class="cart_pro_title">Women Leather Shoes</a>
                            <span class="cart-price"><span>$64.00</span> x 1</span>
                            <div class="qty-plus-minus">
                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                            </div>
                            <a href="javascript:void(0)" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img src="{{asset('assets/front/images/product-image/3_1.jpg')}}" alt="product"></a>
                        <div class="ec-pro-content">
                            <a href="product-left-sidebar.html" class="cart_pro_title">Girls Nylon Purse</a>
                            <span class="cart-price"><span>$59.00</span> x 1</span>
                            <div class="qty-plus-minus">
                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                            </div>
                            <a href="javascript:void(0)" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ec-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        <tbody>
                            <tr>
                                <td class="text-left">Sub-Total :</td>
                                <td class="text-right">$300.00</td>
                            </tr>
                            <tr>
                                <td class="text-left">VAT (20%) :</td>
                                <td class="text-right">$60.00</td>
                            </tr>
                            <tr>
                                <td class="text-left">Total :</td>
                                <td class="text-right primary-color">$360.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart_btn">
                    <a href="cart.html" class="btn btn-primary">View Cart</a>
                    <a href="checkout.html" class="btn btn-secondary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End  -->


    @yield('content')


    <!-- Footer Start -->
    <footer class="ec-footer section-space-mt py-5">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-sm-12 text-center mb-4">
                    <!-- {{ route('front.index') }}" -->
                    <img src="{{asset('assets/front/images/footer-logo.png')}}"></a>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">

                    <!-- neha insert-suscribe-->
                    <form id="formSuscribe" class="form-horizontal" action="{{route('front.subscribe')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Enter your email" class="email-box" id="email" name="email">
                        <input class="news-btn" value="Subscribe" type="submit" name=""><br>
                        <span id="msg" style="color:green;"></span>
                        <span id="error" style="color:red;"></span>

                    </form>
                </div>
                <div class="col-sm-3"></div>
                <div class="w-100 text-center mt-4">
                    <ul class="footer-list">
                        <li><a href="{{ route('front.index') }}">Home</a></li>
                        <li><a href="{{ url('about-us') }}">About us</a></li>                    
                        <li><a href="{{ url('contact') }}">Contect us</a></li>
                        <li><a href="{{ url('privacy') }}">Privacy</a></li>
                        <li><a href="{{ url('terms') }}">Terms</a></li>
                        <li><a href="{{ route('front.productfeatured') }}">Featured</a></li>
                        <li><a href="{{ route('front.productcategory', 'custom-made') }}">Custom made</a></li>
                        <li><a href="{{ route('front.productcategory', 'pre-loved') }}">Pre-loved</a></li>
                        <li><a href="{{ route('front.productcategory', 'alternative') }}">Alternative</a></li>
                        <li><a href="{{ route('front.productcategory', 'accessories') }}">Accessories</a></li>
                        <li><a href="{{ route('front.productcategory', 'adopted') }}">Adopted</a></li>
                        <li><a href="{{ route('front.nurseries') }}">Nurseries</a></li>
                    </ul>
                    <!-- <ul class="footer-list">
                        <li><a href="{{ url('terms') }}">Terms & Condition</a></li>
                        <li><a href="{{ url('privacy') }}">Privacy & Policy</a></li>
                    </ul> -->
                </div>
                <!-- Footer social Start -->
                <div class="col text-center footer-bottom-left mt-4">
                    <div class="footer-bottom-social">
                        <span class="social-text text-upper">Follow us on:</span>
                        <ul class="mb-0">
                            @if($socialsetting->f_status == 1)
                            <li class="list-inline-item"><a class="hdr-facebook" href="{{ $socialsetting->facebook }}" target="_blank"><i class="ecicon eci-facebook"></i></a></li>
                            @endif
                            @if($socialsetting->t_status == 1)
                            <li class="list-inline-item"><a class="hdr-twitter" href="{{ $socialsetting->twitter }}" target="_blank"><i class="ecicon eci-twitter"></i></a></li>
                            @endif
                            @if($socialsetting->i_status == 1)
                            <li class="list-inline-item"><a class="hdr-instagram" href="{{ $socialsetting->instagram }}" target="_blank"><i class="ecicon eci-instagram"></i></a></li>
                            @endif
                            @if($socialsetting->l_status == 1)
                            <li class="list-inline-item"><a class="hdr-linkedin" href="{{ $socialsetting->linkedin }}" target="_blank"><i class="ecicon eci-linkedin"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 text-center mt-4">
                    <p><a href="{{ route('front.index') }}">rebornmarketplace.com</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<!-- nehaa -->
@php
 $cids = session()->get('cat_name');
         
@endphp 

    <div class="panel">
        <button type="button" class="btn-close"></button>
        <p class="samll-para">Show these kinds of items:</p>
        <div class="w-100 d-flex">
            <form class="w-100" action="{{route('front.allitems')}}" method="POST">
            @csrf()
                <div class="form-group form-check-box pl-0">
                    
                    <input type="checkbox" class="form-check-input2" id="exampleCheck1" name="cat[]" value="Pre-Loved" <?php
                    if(!empty($cids)){
                        foreach($cids as $id)
                        {
                            
                             if ($id == '10') {
                                 echo "checked";
                             }
                        } 
                    } 
                    ?> >
                    <label class="form-check-label" for="exampleCheck1">Pre-Loved</label>
                </div>
                <div class="form-group form-check-box pl-0">
                    <input type="checkbox" class="form-check-input2" id="exampleCheck1" name="cat[]" value="Alternative" <?php
                    if(!empty($cids)){
                        foreach($cids as $id)
                        {
                            
                             if ($id == '4') {
                                 echo "checked";
                             }
                        } 
                    } 
                    ?> >
                    <label class="form-check-label" for="exampleCheck1">Alternative</label>
                </div>
                
                <div class="form-group form-check-box pl-0">
                    <input type="checkbox" class="form-check-input2" id="exampleCheck1" name="cat[]" value="Custom Made"
                    <?php
                    if(!empty($cids)){
                        foreach($cids as $id)
                        {
                            
                             if ($id == '2') {
                                 echo "checked";
                             }
                        } 
                    } 
                    ?>
                   >
                    <label class="form-check-label" for="exampleCheck1">Custom Made</label>
                </div>
                <div class="form-group form-check-box pl-0">
                    <input type="checkbox" class="form-check-input2" id="exampleCheck1" name="cat[]" value="Accessories"
                    <?php
                    if(!empty($cids)){
                        foreach($cids as $id)
                        {
                            
                             if ($id == '5') {
                                 echo "checked";
                             }
                        } 
                    } 
                    ?>
                    >
                    <label class="form-check-label" for="exampleCheck1">Accessories</label>
                </div>
                <div class="form-group form-check-box pl-0">
                    <input type="checkbox" class="form-check-input2" id="exampleCheck1" name="cat[]" value="Adopted"
                    <?php
                    if(!empty($cids)){
                        foreach($cids as $id)
                        {
                            
                             if ($id == '6') {
                                 echo "checked";
                             }
                        } 
                    } 
                    ?>
                    >
                    <label class="form-check-label" for="exampleCheck1">Adopted</label>
                </div>
                <div class="form-group form-check-box pl-0">
                    <input type="checkbox" class="form-check-input2" id="exampleCheck1" name="cat" value="">
                    <label class="form-check-label" for="exampleCheck1">Only with Layaway</label>
                </div>

                <div class="w-100 mob-bre">
                    <select class="selectpicker">
                        <option>All Prices</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select>
                    <select class="selectpicker">
                        <option>All Sizes</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select>
                    <select class="selectpicker">
                        <option>All Locations</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select>
                    <select class="selectpicker">
                        <option>Sort By</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select>
                    <input type="submit" class="submit-button" value="Submit" name="">
                </div>

            </form>
        </div>
    </div>

    <!-- <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="ecicon eci-arrow-up" aria-hidden="true"></i></a> -->
    <a href="javascript:" id="return-to-top"><i class="ecicon eci-arrow-up"></i></a>


    <script type="text/javascript" src="{{asset('assets/front/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/vendor/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/vendor/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/vendor/modernizr-3.11.2.min.js')}}"></script>


    <!-- custom -->
    <script type="text/javascript" src="{{asset('assets/front/js/front_custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/myscript.js')}}"></script>


    <!--Plugins JS-->
    <script type="text/javascript" src="{{asset('assets/front/js/plugins/swiper-bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/plugins/countdownTimer.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/plugins/scrollup.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/plugins/jquery.zoom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/plugins/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/plugins/infiniteslidev2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/plugins/jquery.sticky-sidebar.js')}}"></script>

    <!-- Main Js -->
    <script type="text/javascript" src="{{asset('assets/front/js/vendor/index.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/main.js')}}"></script>



    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $(".panel").addClass("left-menu");
            });
            $(".btn-close").click(function() {
                $(".panel").removeClass("left-menu");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".artist-list").click(function() {
                $(".panel2").addClass("page-header");
            });
            $(".btn-close").click(function() {
                $(".panel2").removeClass("page-header");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".side-menu-panel").click(function() {
                $(".menu-panel").addClass("page-menu");
            });
            $(".btn-close").click(function() {
                $(".menu-panel").removeClass("page-menu");
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".dropdown-toggle1").click(function() {
                $(".dropdown-menu1").toggle("slow");
            });
        });
    </script>

    @yield('scripts')
</body>

</html>