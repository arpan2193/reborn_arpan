@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>Order Items</h2>
    </div>
</section>
<!---------- About Bottom End --------->

<section class="filter">
    <div class="container">
        <div class="row d-flex">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <h1 class="side-menu-panel" id="about-menu">
                    Menu
                </h1>
            </div>
        </div>

    </div>
    <div class="menu-panel">
        <button type="button" class="btn-close" ></button>
           <ul class="cat-list">
               <li><a href="{{ route('front.index') }}"> Home </a></li>
               <li><a href="{{ route('front.productfeatured') }}">Featured</a></li>
               <li><a href="{{ route('front.productcategory', 'custom-made') }}">Custom made</a></li>
               <li><a href="{{ route('front.productcategory', 'pre-loved') }}">Pre-loved</a></li>
               <li><a href="{{ route('front.productcategory', 'alternative') }}">Alternative</a></li>
               <li><a href="{{ route('front.productcategory', 'accessories') }}">Accessories</a></li>
               <li><a href="{{ route('front.productcategory', 'adopted') }}">Adopted</a></li>
               <li><a href="{{ route('front.nurseries') }}">Nurseries</a></li>
               <li><a href="{{ route('front.createnursery')}}" class="nursery-btn">Create Your Nursery</a></li>
           </ul>
       </div>
</section>

@php
        $attrPrice = 0;
        $sessionCur = session()->get('currency');
        $sessionCurr = DB::table('currencies')->where('id',$sessionCur)->first();
        $databaseCurr = DB::table('currencies')->where('is_default',1)->first();
        $curr = $sessionCurr ? $sessionCurr: $databaseCurr;        
    @endphp

<!-- --------------------edit account------------- -->

<div class="edit-account">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row">
                    <!-- <div class="col-md-3">
                            <h4 class="mb-4 text-capitalize" style="visibility: hidden;">My Favorites</h4>
                            <div class="account-inr">
                                <img src="assets/images/avatar.webp" alt="img" class="img-fluid mx-auto">
                                <h4>User Name</h4>
                                <ul>
                                    <li><a href="#">Favorites</a></li>
                                    <li><a href="#">Recent Viewed</a></li>
                                    <li><a href="#">Inbox</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Items by People I Follow</a></li>
                                    <li><a href="#">People I Follow</a></li>
                                    <li><a href="#">Logout</a></li>
                                    					

                                </ul>
                                <a href="edit-profile.html" class="edit-btn">Edit Profile</a>
                            </div>
                        </div> -->
                    <div class="col-md-3">

                        @include('user.sidebar')
                    </div>

                    <div class="col-md-9">
                        <div class="row recent-product">
                            <h4 class="mb-4 text-capitalize">Order Items</h4>

                            <div class="col-sm-4">
                                <div class="ec-spe-products1 recent-product-box">
                                    <div class="artist-product-new">
                                    <img src="{{asset('assets/images/products/6K2Fc58IdX.png')}}">
                                    </div>
                                </div>                                
                                
                                <div class="ec-fs-pro-inner">
                                    <h5 class="ec-fs-pro-title">
                                    <a href="#">Custom Doll</a>
                                    </h5>
                                    <p class="ec-fs-pro-desc">
                                    Listed by Reborn
                                    </p>
                                    <div class="w-100 d-flex justify-content-between">
                                        <p class="ec-fs-pro-desc-time">5 days ago</p>
                                        <p class="artist-p-size">53 " (10 cm)</p>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between">
                                        <p class="time">$100</p>
                                        <p><a href="javascript:void(0)">View Details</a></p>
                                    </div>                                
                                </div>   
                            </div>
                            <div class="col-sm-4">
                                <div class="ec-spe-products1 recent-product-box">
                                    <div class="artist-product-new">
                                    <img src="{{asset('assets/images/products/6K2Fc58IdX.png')}}">
                                    </div>
                                </div>                                
                                
                                <div class="ec-fs-pro-inner">
                                    <h5 class="ec-fs-pro-title">
                                    <a href="#">Custom Doll</a>
                                    </h5>
                                    <p class="ec-fs-pro-desc">
                                    Listed by Reborn
                                    </p>
                                    <div class="w-100 d-flex justify-content-between">
                                        <p class="ec-fs-pro-desc-time">5 days ago</p>
                                        <p class="artist-p-size">53 " (10 cm)</p>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between">
                                        <p class="time">$100</p>
                                        <p><a href="javascript:void(0)">View Details</a></p>
                                    </div>                                
                                </div>   
                            </div>
                            <div class="col-sm-4">
                                <div class="ec-spe-products1 recent-product-box">
                                    <div class="artist-product-new">
                                    <img src="{{asset('assets/images/products/6K2Fc58IdX.png')}}">
                                    </div>
                                </div>                                
                                
                                <div class="ec-fs-pro-inner">
                                    <h5 class="ec-fs-pro-title">
                                    <a href="#">Custom Doll</a>
                                    </h5>
                                    <p class="ec-fs-pro-desc">
                                    Listed by Reborn
                                    </p>
                                    <div class="w-100 d-flex justify-content-between">
                                        <p class="ec-fs-pro-desc-time">5 days ago</p>
                                        <p class="artist-p-size">53 " (10 cm)</p>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between">
                                        <p class="time">$100</p>
                                        <p><a href="javascript:void(0)">View Details</a></p>
                                    </div>                                
                                </div>   
                            </div>
                            

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
