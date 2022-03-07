@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>Subscription</h2>
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
                    <section class="subscription-content-box">
                            <div class="container">
                                    <div class="row justify-content-center">
                                    <h2 class="subscription-title2">
                                            Choose the right for you
                                        </h2>
                                        @php $i=1; @endphp
                                        @foreach($subscriptions as $subscription)
                                        @php
                                        $stat = "";
                                        if($i % 2 === 0){
                                            $stat = "even";
                                        }else{
                                            $stat = "odd";
                                        }
                                        @endphp
                                        <div class="col-sm-4">
                                            <div class="subscription-box {{$stat == 'odd' ? "" : "deep-gra"}}">
                                                <div class="subscription-circle pink-bg {{$stat == 'odd' ? "" : "silver white-text"}}">
                                                    {{$subscription->title}}
                                                </div>
                                                <h3 class="subscription-price {{$stat == 'odd' ? "" : "white-text"}}">
                                                    {{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$subscription->showPrice() }}
                                                </h3>
                                                <ul class="subscription-list {{$stat == 'odd' ? "" : "mid-gb"}}">
                                                    @php echo htmlspecialchars_decode($subscription->details); @endphp
                                                </ul>
                                                <a class="purches-btn {{$stat == 'odd' ? "" : "white"}}" href="{{route('vendor-subscription-purchase',$subscription->id)}}"> Purchase Now </a>
                                            </div>
                                        </div>
                                        @php ++$i; @endphp
                                        @endforeach
                                        {{-- <div class="col-sm-4">
                                            <div class="subscription-box deep-gra">
                                                <div class="subscription-circle pink-bg silver white-text">
                                                    Silver
                                                </div>
                                                <h3 class="subscription-price white-text">
                                                    $19.99
                                                </h3>
                                                <ul class="subscription-list mid-gb">
                                                    <li>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit
                                                    </li>
                                                    <li>
                                                        Praesent a molestie turpis. Nam fringilla
                                                    </li>
                                                    <li>
                                                        Praesent a molestie turpis. Nam fringilla
                                                    </li>
                                                    <li>
                                                        Praesent a molestie turpis. Nam fringilla
                                                    </li>
                                                </ul>

                                                <a class="purches-btn white" href="#"> Purchase Now </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="subscription-box">
                                                <div class="subscription-circle pink-bg">
                                                    Gold
                                                </div>
                                                <h3 class="subscription-price">
                                                    $29.99
                                                </h3>
                                                <ul class="subscription-list">
                                                    <li>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit
                                                    </li>
                                                    <li>
                                                        Praesent a molestie turpis. Nam fringilla
                                                    </li>
                                                    <li>
                                                        Praesent a molestie turpis. Nam fringilla
                                                    </li>
                                                    <li>
                                                        Praesent a molestie turpis. Nam fringilla
                                                    </li>
                                                    <li>
                                                        Praesent a molestie turpis. Nam fringilla
                                                    </li>
                                                </ul>
                                                <a class="purches-btn" href="#"> Purchase Now </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </section>
                        
                        </div>

                </div>

            </div>

        </div>
    </div>
</div>



@endsection