@extends('layouts.front')
@section('content')

    <!---------- About Bottom --------->
    <section class="about-text">
        <div class="about-img">
            <img src="{{ asset('assets/front/images/banner-about.jpg') }}" class="img-fluid w-100">
            <h2>Dashboard</h2>
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

    <!-- --------------------edit account------------- -->

    <div class="edit-account">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="ec-shop-leftside ec-vendor-sidebar ">
                                <div class="ec-sidebar-wrap">
                                    <!-- Sidebar Category Block -->
                                    <div class="ec-sidebar-block">
                                        <div class="ec-vendor-block">

                                            <div class="ec-vendor-block-detail">
                                                <img class="v-img" src="assets/images/avatar.webp"
                                                    alt="vendor image">
                                                <h5>{{$user->name}}</h5>
                                                <a href="edit-profile.html" class="edit-btn">Change Profile Photo</a>
                                                <div class="seller">
                                                    <ul>
                                                        <li><a href="seller-review.html">Review</a></li>
                                                        <li><a href="#">Followers</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="ec-vendor-block-items">
                                                <ul>
                                                    <li><a href="{{ route('vendor-dashboard') }}">Main</a></li>
                                                    <li><a href="{{ route('vendor-product-edit') }}">Edit Dolls</a></li>
                                                    <li><a href="{{route('vendor-prod-add-view')}}">Add Doll/Accessory</a></li>
                                                    <li><a href="#">Inbox</a></li>
                                                    <li><a href="#">Orders</a></li>
                                                    <li><a href="#">Renew Membership</a></li>
                                                    <li><a href="#">View Nursery</a></li>
                                                    <li><a href="#">My Account</a></li>
                                                    <li><a href="#">FAQ</a></li>
                                                    <li><a href="#">Logout</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="ec-vendor-dashboard-card ">

                                <div class="card-inr">
                                    <div class="ec-vendor-card-header p-0">
                                        <form class="row g-3">

                                            <div class="col-auto">

                                                <input type="text" class="form-control" style="height: 31px !important;
                                                  min-height: 0;">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary mb-3">Search Forum</button>
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn btn-success" href="#">Post New Topic</a>
                                            </div>
                                        </form>

                                    </div>



                                    <div class="message bg-light row ">
                                        <div class="col-md-2">
                                            <img src="assets/images/avatar.webp" alt="Avatar">
                                        </div>
                                        <div class="col-md-10">
                                            <h5>Andrea Wilson </h5>
                                            <h6>Andi Pandi Reborns</h6>
                                            <span> Ohio</span>
                                            <p>Does anyone know if Joanna Kazmierczac is for sure cancelling the Lou Lou
                                                Awake production in vinyl due to scam replications? I saw it was cancelled
                                                but on her Insta, I see she’s working on the full body…silicone? Thanks.</p>
                                            <span class="time-right pr-4">9 hours ago</span>
                                            <i class="ecicon eci-thumbs-up"></i>
                                            <div class="row message bg-darker">
                                                <div class="col-md-2">
                                                    <img src="assets/images/avatar.webp" alt="Avatar">
                                                </div>
                                                <div class="col-md-10">
                                                    <h5>Cynthia Jansik </h5>
                                                    <h6>Sweet Dreams Reborn Artistry</h6>
                                                    <span> Florida</span>
                                                    <p>From what I understand she WILL NOT be releasing a VINYL version of
                                                        Loulou awake because of a counterfeit that’s already started
                                                        circling around. But she is working on a silicone one.</p>
                                                    <span class="time-right pr-4">6 hours ago</span>
                                                    <i class="ecicon eci-thumbs-up"></i>
                                                </div>
                                            </div>
                                            <div class="row message bg-darker">
                                                <div class="col-md-2">
                                                    <img src="assets/images/avatar.webp" alt="Avatar">
                                                </div>
                                                <div class="col-md-10">
                                                    <form action="">
                                                        <textarea class="form-control mb-4"
                                                            placeholder="Write a Comment"></textarea>
                                                        <button class="btn btn-success" ">Submit</button>
                                                        </form>
                                                    </div>
                                                 </div>
                                            </div>
                                            
                                          </div>
                                          <div class=" text-center">
                                                            <button class="btn edit-btn" style="height: 50px;">View More
                                                                Posting</button>
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
