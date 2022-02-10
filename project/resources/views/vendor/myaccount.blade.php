@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>My Account</h2>
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
                    <div class="signin-form">

                       <div class="ac-info">
                           <form class="mregisterform" action="{{route('user-register-submit')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="vendor" name="vendor">
                            <div class="form-group mb-4">
                                <h5>Real Full Name </h5>
                                <input type="text" class="form-control mt-2" name="name" >
                            </div>
                            <div class="form-group mb-4">
                                <h5>Nursery Name <span>( Use your real name if you have no nursery name.)</span></h5>
                                <input type="text" class="form-control mt-2" name="shop_name" >
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <h5>City<span>(Optional)</span></h5>
                                        <input type="text" class="form-control mt-2" name="city" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <h5>State / Province</h5>
                                        <input type="text" class="form-control mt-2" name="state" >
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Country</h5>
                                    <select class="form-select" name="country_id">
                                        <option value="">Select Your Country</option>
                                        {{-- @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach --}}
                                        {{-- <option>INDIA</option>
                                        <option>BANGLADESH</option> --}}
                                      </select>
                                </div>
                               </div>
                               <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <h5>Email Address</h5>
                                    <input type="email" class="form-control mt-2" name="email" >
                                </div>  
                               </div>
                           </div>

                             <div class="form-group mb-4">
                                 <h5>Password</h5>
                                 <input type="password" class="form-control mt-2" name="password" >
                             </div>
                             <div class="form-group mb-4">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" required="" class="input-text form-control">
                            </div>

                             <div class="form-group mb-4">
                                 <h5>Reborns URL <span>We give you your own custom nursery page (i.e., custom URL web address). Enter what you would like that to be:(Enter only characters (A-Z), numbers (0-9) or dashes (-). No spaces.
                                    )</span></h5>
                                 <input type="text" class="form-control mt-2" name="reborn_url">
                             </div>  
                             <div class="form-group mb-4">
                                <h5>Website URL <span>This isn't your Reborns URL. Leave blank if you don't have a website.</span></h5>
                                <input type="text" class="form-control mt-2" name="website_url">
                            </div>  
                            <div class="form-group mb-4">
                                <h5>Facebook <span>Your dolls won't post to Facebook unless your handle is entered.</span></h5>
                                <input type="text" class="form-control mt-2" name="f_url" >
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Instagram <span> Your dolls won't post to Instagram unless your handle is entered.</span></h5>
                                <input type="text" class="form-control mt-2" name="I_url">
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Twitter </h5>
                                <input type="text" class="form-control mt-2" name="t_url">
                            </div> 
                            {{-- <div class="form-group mb-4">
                                <h5>Pinterest </h5>
                                <input type="text" class="form-control mt-2" name="p_url">
                            </div>  --}}
                            <div class="form-group">
                                <h5 class="mb-2">Payments Accepted </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="paypal">
                                    <label class="form-check-label" for="flexCheckDefault" >
                                        PayPal Instant Payment at Checkout (recommended to ONLY use this option to avoid fake buyers)
                                    </label>
                                  </div>
                                 
                            </div> 
                            <div class="form-group">
                                <label class="form-check-label">If you allow for other payments types be prepared for many orders from people who will never pay you or respond back.</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="venmo" value="venmo">
                                    <label class="form-check-label" for="inlineCheckbox1">Venmo</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="square" value="square">
                                    <label class="form-check-label" for="inlineCheckbox2">Square</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="check" value="check" >
                                    <label class="form-check-label" for="inlineCheckbox3">Check</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="certified_funds" value="certified_funds" >
                                    <label class="form-check-label" for="inlineCheckbox4">Certified Funds</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="money_order" value="money_order" >
                                    <label class="form-check-label" for="inlineCheckbox5">Money Order</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="cash" value="cash" >
                                    <label class="form-check-label" for="inlineCheckbox6">Cash</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" name="bank_transfer" value="bank_transfer" >
                                    <label class="form-check-label" for="inlineCheckbox7">Bank Transfer </label>
                                  </div>
                            </div>
                              
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                   <input type="text" class="form-control" placeholder="custom" name="custompayment1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="custom" name="custompayment2">
                                         </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="custom" name="custompayment3">
                                         </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <h5>PayPal Address <span>Leave blank if you do not want to accept instant payments.</span></h5>
                                <input type="text" class="form-control mt-2" name="paypal_address" >
                            </div> 

                            <div class="form-group mb-4">
                                <h5>Order Thank You Message <span>This message is sent along in the confirmation email the buyer receives after placing an order with you.</span></h5>
                                <textarea class="form-control" name="order_thank_you_message"></textarea>
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Order Locations</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_location" id="exampleRadios1" value="Only allow orders" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Only allow orders from locations where you have explicitly listed shipping costs. People from other locations will be told you don't ship to their location.
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_location" id="exampleRadios2" value="Allow orders">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Allow orders from locations where you haven't explicitly listed shipping costs. Buyers will be told you will contact them with shipping costs.
                                    </label>
                                  </div>
                                  
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Contact</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allow_contacts" id="exampleRadios3" value="1" >
                                    <label class="form-check-label" for="exampleRadios3">
                                        Allow potential buyers to contact you / ask questions
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allow_contacts" id="exampleRadios4" value="0" checked>
                                    <label class="form-check-label" for="exampleRadios4">
                                        Do not allow anyone to contact you / ask questions
                                    </label>
                                  </div>
                                  
                            </div> 

                            <div class="form-group mb-4">
                                <h5>Member Description <span>(Be as descriptive as you can. Users will be able to see this information on each listing.)</span></h5>
                                <textarea class="form-control" name="member_description"></textarea>
                            </div> 

                            <div class="form-group mb-4">
                                <h5>Layaway</h5>
                                <select class="form-select " name="layaway_state">
                                    <option value="1">Default Setting is YES</option>
                                    <option value="0">Default Setting is NO</option>
                                  </select>
                            </div>

                            <div class="form-group mb-4">
                                <h5>Layaway Policy  <span>Users will see this information on each listing.</span></h5>
                                <textarea class="form-control" placeholder="explain Your Layaway Policy" name="layaway_policy"></textarea>
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Return & Refund Policy <span>Users will be able to see this information on each listing.</span></h5>
                                <textarea class="form-control" placeholder="Do you allow for returns?  if so, who will pay the return shipping costs?" name="return_refund_policy"></textarea>
                            </div> 
                            <div class="form-group mb-4">
                                <h5>General Ordering Information <span>Users will be able to see this information on each listing.</span></h5>
                                <textarea class="form-control" name="general_ordering_information" ></textarea>
                            </div> 
                            <div class="text-center">
                                <button type="submit" class="btn edit-btn" style="height: 60px;">Submit</button>
                            </div>
                       
                           
                           </form>
                       </div>
                   
                    </div>    

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



@endsection