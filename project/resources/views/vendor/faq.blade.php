@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>Faq</h2>
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
            @include('front.menu')
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

                        @include('vendor.sidebar')
                    </div>

                    <div class="col-md-9">
                         <div calss="vendor-faq">
                            <h2>Seller Frequently Asked Questions</h2>
                         </div>      
                    </div>
                    
                </div>

            </div>

        </div>

    </div>
</div>




@endsection