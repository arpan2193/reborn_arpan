@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>Recent Viewed</h2>
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
                            <div class="row">
                                <div class="ec-vendor-dashboard-card space-bottom-30">
                                    <div class="ec-vendor-card-header">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-10">
                                                <a class="btn btn-primary" href="{{route('vendor-inbox')}}">Inbox ({{count($inboxs)}})</a>
                                                <a class="btn btn-primary" href="{{route('vendor-sentmail')}}">Sent ({{count($sentmails)}})</a>
                                                <a class="btn  btn-primary" href="{{route('vendor-blockedmail')}}">Blocked ({{count($blockedmails)}})</a>
                                                <a class="btn  btn-primary" href="{{route('vendor-deletedmail')}}">Deleted ({{count($deletemails)}})</a>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-2">
                                                <div class="ec-header-btn">
                                                   
                                                    <select class="form-select " aria-label="Default select example" >
                                                        <option selected>Contact List</option>
                                                        @foreach($users as $customer)
                                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                                
                                           
                                              
                               
                                    </div>
                                    <div class="ec-vendor-card-body">
                                        <div class="ec-vendor-card-table">
                                            <table class="table ec-table align-middle">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th scope="col">From</th>
                                                        <th scope="col"></th>
                                                        <th scope="col">Last Message</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($blockedmails as $mail)
                                                    <tr>
                                                       
                                                        <td><img class="prod-img" src="{{($mail->photo) ? asset("assets/images/users/".$mail->photo) : asset("images/products/avatar.webp") }}" alt="product image"></td>
                                                        <td><span>{{$mail->name}}</span></td>
                                                        <td><span>{{$mail->message}}</span></td>
                                                        @php
                                                            $date1=date_create(date("Y-m-d", strtotime($mail->created)));
                                                            $date2=date_create(date("Y-m-d", strtotime("now")));
                                                            $diff=date_diff($date1,$date2);
                                                        @endphp
                                                        <td><span>{{ ($diff->d<60) ? $diff->format("%a days ago") : date("Y-m-d", strtotime($mail->created)) }}</span></td>
                                                        <td><a href="inbox-details.html" class="btn btn-success btn-sm" >View</a></td>
                                                        <td><a href="#" class="btn btn-info btn-sm">Reply</a></td>
                                                        <td><a href="#" class="btn btn-danger btn-sm" style="background: red;">Delete</a></td>
                                                    </tr>
                                                   @endforeach
                                                </tbody>
                                            </table>
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