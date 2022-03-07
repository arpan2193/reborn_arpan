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
                    <div class="col-md-3">
                        @include('vendor.sidebar')
                    </div>
                    <div class="col-md-9">
                    @if(session()->has('status'))
                                <div class="alert alert-success">
                                    {{ session()->get('status') }}
                                </div>
                                @endif
                    <div class="signin-form">                   
                       <div class="ac-info">  
                           <form class="meditform" action="{{ route('profile-edit') }}" role="form" method="post">                             
                            {{ csrf_field() }}
                            <input type="hidden" value="vendor" name="vendor">
                            <div class="form-group mb-4">
                                <h5>Real Full Name </h5>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control mt-2" name="name" value="{{$user->name}}" >
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#chngpswrd">Change Password</button>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="form-group mb-4">
                                <h5>Nursery Name <span>( Use your real name if you have no nursery name.)</span></h5>
                                <input type="text" class="form-control mt-2" name="shop_name" value="{{$user->shop_name}}" >
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <h5>City<span>(Optional)</span></h5>
                                        <input type="text" class="form-control mt-2" name="city" value="{{$user->city}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <h5>State / Province</h5>
                                        <input type="text" class="form-control mt-2" name="state" value="{{$user->state}}" >
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Country</h5>
                                    <select class="form-select" name="country_id">
                                    <option selected>Select your Country</option>
                                     @foreach($countries as $country)
                                     <option value="{{$country->id}}" {{($user->country_id == $country->id) ? 'selected' : ''}}>{{$country->country_name}}</option>
                                      @endforeach 
                                      </select>
                                     
                                </div>
                               </div>
                               <!-- <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <h5>Email Address</h5>
                                    <input type="email" class="form-control mt-2" name="email" >
                                </div>  
                               </div> -->
                           </div>

                             <div class="form-group mb-4">
                                 <h5>Reborns URL <span>We give you your own custom nursery page (i.e., custom URL web address). Enter what you would like that to be:(Enter only characters (A-Z), numbers (0-9) or dashes (-). No spaces.
                                    )</span></h5>
                                 <input type="text" class="form-control mt-2" name="reborn_url" value="{{$user->reborn_url}}">
                             </div>  
                             <div class="form-group mb-4">
                                <h5>Website URL <span>This isn't your Reborns URL. Leave blank if you don't have a website.</span></h5>
                                <input type="text" class="form-control mt-2" name="website_url" value="{{$user->website_url}}">
                            </div>  
                            <div class="form-group mb-4">
                                <h5>Facebook <span>Your dolls won't post to Facebook unless your handle is entered.</span></h5>
                                <input type="text" class="form-control mt-2" name="f_url" value="{{$user->f_url}}">
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Instagram <span> Your dolls won't post to Instagram unless your handle is entered.</span></h5>
                                <input type="text" class="form-control mt-2" name="I_url" value="{{$user->l_url}}">
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Twitter </h5>
                                <input type="text" class="form-control mt-2" name="t_url" value="{{$user->t_url}}">
                            </div> 
                            {{-- <div class="form-group mb-4">
                                <h5>Pinterest </h5>
                                <input type="text" class="form-control mt-2" name="p_url" value="{{$user->p_url}}">
                            </div>  --}}
                            <div class="form-group">
                                <h5 class="mb-2">Payments Accepted</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="payment_mode[paypal]" value="paypal" @foreach($payments_accepted as $payment => $val)
                                    {{(!empty($val) && $val == "paypal") ? "checked" : ""}}
                                    @endforeach>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        PayPal Instant Payment at Checkout (recommended to ONLY use this option to avoid fake buyers)
                                    </label>
                                  </div>
                                
                            </div> 
                            <div class="form-group">
                                <label class="form-check-label">If you allow for other payments types be prepared for many orders from people who will never pay you or respond back.</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="payment_mode[venmo]" value="venmo" @foreach($payments_accepted as $payment => $val)
                                    {{(!empty($val) && $val == "venmo") ? "checked" : ""}}
                                    @endforeach>
                                    <label class="form-check-label" for="inlineCheckbox1">Venmo</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="payment_mode[square]" value="square" @foreach($payments_accepted as $payment => $val)
                                    {{(!empty($val) && $val == "square") ? "checked" : ""}}
                                    @endforeach>
                                    <label class="form-check-label" for="inlineCheckbox2">Square</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="payment_mode[cheque]" value="cheque" @foreach($payments_accepted as $payment => $val)
                                    {{(!empty($val) && $val == "cheque") ? "checked" : ""}}
                                    @endforeach>
                                    <label class="form-check-label" for="inlineCheckbox3">Cheque</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="payment_mode[certified_funds]" value="certified_funds" @foreach($payments_accepted as $payment => $val)
                                    {{(!empty($val) && $val == "certified_funds") ? "checked" : ""}}
                                    @endforeach>
                                    <label class="form-check-label" for="inlineCheckbox4">Certified Funds</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="payment_mode[money_order]" value="money_order" @foreach($payments_accepted as $payment => $val)
                                    {{(!empty($val) && $val == "money_order") ? "checked" : ""}}
                                    @endforeach>
                                    <label class="form-check-label" for="inlineCheckbox5">Money Order</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="payment_mode[cash]" value="cash" @foreach($payments_accepted as $payment => $val)
                                    {{(!empty($val) && $val == "cash") ? "checked" : ""}}
                                    @endforeach>
                                    <label class="form-check-label" for="inlineCheckbox6">Cash</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" name="payment_mode[bank_transfer]" value="bank_transfer" @foreach($payments_accepted as $payment => $val)
                                    {{(!empty($val) && $val == "bank_transfer") ? "checked" : ""}}
                                    @endforeach>
                                    <label class="form-check-label" for="inlineCheckbox7">Bank Transfer </label>
                                  </div>
                            </div>
                              
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                   <input type="text" class="form-control" placeholder="custom" name="payment_mode[custom1]" value="@foreach($payments_accepted as $payment => $val){{(!empty($payment) && $payment == 'custom1') ? $val : ''}}@endforeach">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="custom" name="payment_mode[custom2]" value="@foreach($payments_accepted as $payment => $val){{(!empty($payment) && $payment == 'custom2') ? $val : ''}}@endforeach">
                                         </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="custom" name="payment_mode[custom3]" value="@foreach($payments_accepted as $payment => $val){{(!empty($payment) && $payment == 'custom3') ? $val : ''}}@endforeach">
                                         </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <h5>PayPal Address <span>Leave blank if you do not want to accept instant payments.</span></h5>
                                <input type="text" class="form-control mt-2" name="paypal_address" value="{{!empty($user->paypal_address) ? $user->paypal_address : ''}}" autocomplete="off">
                            </div> 

                            <div class="form-group mb-4">
                                <h5>Order Thank You Message <span>This message is sent along in the confirmation email the buyer receives after placing an order with you.</span></h5>
                                <textarea class="form-control" name="order_thank_you_message" value="">{{!empty($user->order_thank_you_message) ? $user->order_thank_you_message : ''}}</textarea>
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Order Locations</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_location" id="exampleRadios1" value="only_allow_orders" {{$user->order_location== 'only_allow_orders' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Only allow orders from locations where you have explicitly listed shipping costs. People from other locations will be told you don't ship to their location.
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_location" id="exampleRadios2" value="allow_orders" {{$user->order_location== 'allow_orders' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Allow orders from locations where you haven't explicitly listed shipping costs. Buyers will be told you will contact them with shipping costs.
                                    </label>
                                  </div>
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Contact</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allow_contacts" id="exampleRadios3" value="1" {{$user->allow_contacts == "1" ? 'checked' : ''}} >
                                    <label class="form-check-label" for="exampleRadios3">
                                        Allow potential buyers to contact you / ask questions
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allow_contacts" id="exampleRadios4" value="0" {{$user->allow_contacts == "0" ? 'checked' : ''}}>
                                    <label class="form-check-label" for="exampleRadios4">
                                        Do not allow anyone to contact you / ask questions
                                    </label>
                                  </div>

                            </div> 

                            <div class="form-group mb-4">
                                <h5>Member Description <span>(Be as descriptive as you can. Users will be able to see this information on each listing.)</span></h5>
                                <textarea class="form-control" name="member_description">{{$user->member_description}}</textarea>
                            </div> 

                            <div class="form-group mb-4">
                                <h5>Layaway</h5>
                                <select class="form-select " name="layaway_state">
                                    <option value="1" {{($user->layaway_state == 1) ? 'selected' : ''}}>Default Setting is YES</option>
                                    <option value="0" {{($user->layaway_state == 0) ? 'selected' : ''}}>Default Setting is NO</option>
                                  </select>
                            </div>

                            <div class="form-group mb-4">
                                <h5>Layaway Policy  <span>Users will see this information on each listing.</span></h5>
                                <textarea class="form-control" placeholder="explain Your Layaway Policy" name="layaway_policy" >{{$user->layaway_policy}}</textarea>
                            </div> 
                            <div class="form-group mb-4">
                                <h5>Return & Refund Policy <span>Users will be able to see this information on each listing.</span></h5>
                                <textarea class="form-control" placeholder="Do you allow for returns?  if so, who will pay the return shipping costs?" name="return_refund_policy">{{$user->return_refund_policy}}</textarea>
                            </div> 
                            <div class="form-group mb-4">
                                <h5>General Ordering Information <span>Users will be able to see this information on each listing.</span></h5>
                                <textarea class="form-control" name="general_ordering_information" >{{$user->general_ordering_information}}</textarea>
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

<!-- Success Modal -->
<div class="show-modal" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
    <div class="modal-content">
      
      <div class="modal-body pro-success">
          <button type="button" class="close">
              <span aria-hidden="true">&times;</span>
            </button>
          <h3><i class='fa fa-check'></i> Profile has been updated successfully.</h3>
      </div>
      
    </div>
  
</div>

<!-- chnage password Modal -->
<div class="modal" id="chngpswrd">
    <form action="{{route('vendor-change-pass',$user->id)}}" class="chngpswrdform">
        <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="success-msg">
                        <p></p>
                    </div>
                    <div class="form-group mb-4">
                        {{csrf_field()}}
                        <input type="password" class="form-control mt-2" name="password" placeholder="Password">
                    </div>
                    <div class="form-group mb-4">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input-text form-control">
                </div>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Change</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
        
            </div>
        </div>
    </form>
  </div>

@endsection