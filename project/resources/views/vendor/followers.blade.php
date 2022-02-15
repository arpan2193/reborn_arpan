@extends('layouts.front')
@section('content')
<?php $user = Auth::user(); ?>
    <!---------- About Bottom --------->
    <section class="about-text">
        <div class="about-img">
            <img src="{{ asset('assets/front/images/banner-about.jpg') }}" class="img-fluid w-100">
            <h2>Followers</h2>
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

    <!-- --------------------edit account------------- -->

    <div class="edit-account">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="row">

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
                                          <h3>{{$user->name}}</h3>
                                          <h4>{{$user->shop_name}}</h4>
                                          <h6>Followers : {{$ifollow_count}}</h6>
                                          <h6>Email Subscribers : {{$email_subscribers}}</h6>                                         
                                         </div>
                                     </div>
                                 </div>
                                
                                     
                                     
                                    
                                     
                                  
                               </div>
                              
                               </div>
                               <div class="ec-vendor-dashboard-card mt-4">
                                   <div class="card-inr">
                                       <table class="table">
                                           <thead>
                                               <tr>
                                                 <th>Follower</th>
                                                 <th>Country</th>
                                                 <th>Email Subscriber</th>
                                                 <th></th>
                                               </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach($ifollow_user as $user_list)
                                               <tr>
                                                 <td>{{$user_list->name}}</td>
                                                 <td>{{$user_list->user_country}}</td>
                                                 <td>
                                                    <i class="ecicon eci-check {{$user_list->email_subscriber==1?"text-success":"text-danger"}} style="height:auto" id="test"></i>
                                                   
                                                </td>
                                                 <td><a href="javascript:void(0)" onclick="blockfollow('{{$user_list->user_id}}')">Block</a>
                                                </td>
                                               </tr>
                                              @endforeach
                                             </tbody>
                                        </table>
                                   </div>
                                 
                               </div>

                        </div>
                    </div>
                </div>


            @endsection
