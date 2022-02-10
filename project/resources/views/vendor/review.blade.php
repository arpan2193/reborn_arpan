@extends('layouts.front')
@section('content')
<?php $user = Auth::user(); ?>
<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>Rewiew</h2>
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
                    <div class="ec-vendor-dashboard-card ">
                               
                               <div class="card-inr">
                                  
                                 <div class="seller-review">
                                     <div class="row">
                                         <div class="col-md-3">
                                           <img class="v-img" src="{{($user->photo) ? asset("assets/images/users/".$user->photo) : asset("images/products/avatar.webp") }}" alt="vendor image">
                                         </div>
                                         <div class="col-md-9">
                                          <h3>Veronika Paints</h3>
                                          <h4>VSartDolls</h4>
                                          <h6>Pennsylvania , United States
                                       </h6>
                                       <ul class="align-items-center">
                                           <li><i class="ecicon eci-star"></i></li>
                                           <li><i class="ecicon eci-star"></i></li>
                                           <li><i class="ecicon eci-star"></i></li>
                                           <li><i class="ecicon eci-star"></i></li>
                                           <li><i class="ecicon eci-star"></i></li>
                                       </ul>
                                       <h3>5.0</h3>
                                       <h4 class="mb-3">Seller Reviews (4)</h4>
                                       <h6>5 star</h6>
                                       <div class="progress mb-3">
                                           <div class="progress-bar bg-success" style="width:100%">100%</div>
                                         </div>
                                         <h6>4 star</h6>
                                         <div class="progress mb-3">
                                           <div class="progress-bar bg-light text-muted" style="width:100%">0%</div>
                                         </div>
                                         <h6>3 star</h6>
                                         <div class="progress mb-3">
                                           <div class="progress-bar bg-light text-muted" style="width:100%">0%</div>
                                         </div>
                                         <h6>2 star</h6>
                                         <div class="progress mb-3">
                                           <div class="progress-bar bg-light text-muted" style="width:100%">0%</div>
                                         </div>
                                         <h6>1 star</h6>
                                         <div class="progress mb-3">
                                           <div class="progress-bar bg-light text-muted" style="width:100%">0%</div>
                                         </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="message seller-review row">
                                  <div class="col-md-2">
                                   <img class="" src="assets/images/avatar.webp" alt="vendor image"> 
                                  </div>
                                  <div class="col-md-8 ">
                                      <h4>Vicki Ray wrote: </h4>
                                      <ul class="align-items-center">
                                       <li><i class="ecicon eci-star"></i></li>
                                       <li><i class="ecicon eci-star"></i></li>
                                       <li><i class="ecicon eci-star"></i></li>
                                       <li><i class="ecicon eci-star"></i></li>
                                       <li><i class="ecicon eci-star"></i></li>
                                   </ul>
                                   <p class="text-dark">
                                       Incredible artist and very sweet to work with. Excellent quality babies. Smooth transactions, always packed beautifully, and quick shipping. Highly recommend!!</p>
                                   <span class="time-right">Dec 16, 2021</span>
                                  </div>
                                  <div class="col-md-2 text-right mx-auto ">
                                   <img class="right w-100 d-block mb-3" src="assets/images/avatar.webp" alt="vendor image">
                                   <h6>Ruby</h6>
                                   <span>Ordered:
                                       Jul 26, 2021</span>
                                  </div>
                                 </div>
                                 <div class="message seller-review row">
                                   <div class="col-md-2">
                                    <img class="" src="assets/images/avatar.webp" alt="vendor image"> 
                                   </div>
                                   <div class="col-md-8 ">
                                       <h4>April Trotter wrote: </h4>
                                       <ul class="align-items-center">
                                        <li><i class="ecicon eci-star"></i></li>
                                        <li><i class="ecicon eci-star"></i></li>
                                        <li><i class="ecicon eci-star"></i></li>
                                        <li><i class="ecicon eci-star"></i></li>
                                        <li><i class="ecicon eci-star"></i></li>
                                    </ul>
                                    <p class="text-dark">
                                        Incredible artist and very sweet to work with. Excellent quality babies. Smooth transactions, always packed beautifully, and quick shipping. Highly recommend!!</p>
                                    <span class="time-right">Dec 16, 2021</span>
                                   </div>
                                   <div class="col-md-2 text-right mx-auto ">
                                    <img class="right w-100 d-block mb-3" src="assets/images/avatar.webp" alt="vendor image">
                                    <h6>Ruby</h6>
                                    <span>Ordered:
                                        Jul 26, 2021</span>
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