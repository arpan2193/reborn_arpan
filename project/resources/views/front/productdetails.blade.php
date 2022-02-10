@extends('layouts.front')
@section('content')
<!-- menu section start -->
 <section class="filter">
        <div class="container">
            <div class="row d-flex">
                    <div class="col-sm-6">
                        <h1 class="filter-titel text-center" id="flip">Filters</h1>
                    </div>
                    <div class="col-sm-6">
                        <h1 class="side-menu-panel">
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
<!-- menu section end -->
 <!-- feature -->
 @php
        $attrPrice = 0;
        $sessionCur = session()->get('currency');
        $sessionCurr = DB::table('currencies')->where('id',$sessionCur)->first();
        $databaseCurr = DB::table('currencies')->where('is_default',1)->first();
        $curr = $sessionCurr ? $sessionCurr: $databaseCurr;

    @endphp 
 <section class="feature-box">
                <div class="fea-img">                    
                    <img src="../assets/images/products/{{$products_dtls->photo}}" alt="">
                </div>
                <div class="fea-txt">
                    <h4>{{$products_dtls->name}}</h4>
                    <ul>
                        <!-- <li>Sculpt: Li by Priscilla Lopes</li> -->
                        <li>Sculpt: Li by {{$products_dtls->sculpt}}</li>
                        <li>Born at Forever in (loc:-Bloom Nursery) on dom(10/19/21)</li>
                        <!-- <li>Weight is: 9lbs 10oz</li> -->
                        <li>Weight is: {{$products_dtls->weight}} </li>
                    </ul>
                    <p><?php echo $products_dtls->details; ?></p>
                    <!-- <p>This sweet boy is hard to part with! He has been created with love using GHS paints in multiple layers, and sealed with matte varnish. His hair is nicely rooted with hp baby locks mohair, sealed from the inside so it is secure.His eyebrows and eyelashes are also rooted with premium mohair. Eyes are full round German glass in the shade natural blue<br>
                    Cloth doe suede body</p>
                    <p>He has fine details throughout his painting and is very realistic. This reborn baby wears size 0/3 & 3 month clothing.<br>Li will come home with his limited edition COA, 3 outfits, baby scent, socks, and a hat and blanket.</p>
                    <p>This is a one of a kind art doll, not recommended for children.<br>Thank you for visiting my reborn nursery!</p> -->
                </div>
                <div class="clearfix"></div>
            </section>

<!-- image gallery -->
            <section class="doll">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row no-gutters">
                            @foreach($gallery_img as $imgslist)
                                <div class="col-sm-3 mb-5">                                   
                                <img src="{{asset('assets/images/galleries/'.$imgslist->photo)}}">
                                                             
                                </div>
                                @endforeach
                                
                                <h3 class="doll-ashel-h3">More from Ashley</h3>
                                @foreach($vendor_img as $value)
                                <div class="col-md-3">
                                <img src="{{asset('assets/images/products/'.$value->photo)}}">
                                   <p class="mt-2"><a href="{{ route('front.productdetails', $value->slug) }}">{{$value->name}}</a><br>
                                   <!-- ₨{{$value->price}} INR -->                                   
                                {{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$value->showPrice() }}

                                </p>
                                </div>
                               
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="doll-details-one">
                                <h4>Dolls Details</h4>
                                <ul class="mb-3">
                                    <li>Artist: {{$products_dtls->artist}}</li>
                                    <li>Sculpture by: {{$products_dtls->sculpture_by}}</li>
                                    <li>Kit Name: {{$products_dtls->kit_name}}</li>
                                </ul>
                                <ul>
                                    <li>Head Material: {{$products_dtls->head_material}}</li>
                                    <li>Body Material: {{$products_dtls->body_material}}</li>
                                    <li>Limb Material: {{$products_dtls->limb_material}}</li>
                                    <li>Age: {{$products_dtls->age}}</li>
                                    <li>Gender: {{$products_dtls->gender}}</li>
                                    <li>Arms: {{$products_dtls->arms}}</li>
                                    <li>Legs: {{$products_dtls->legs}}</li>
                                    <li>Edition: {{$products_dtls->edition}}</li>
                                    <li>Eyes: {{$products_dtls->eyes}}</li>
                                    <li>Eye Material: {{$products_dtls->eyes_material}}</li>
                                    <li>Lashes: {{$products_dtls->lashes}}</li>
                                    <li>Hair: {{$products_dtls->hair}}</li>
                                    <li>Paint: {{$products_dtls->paint}}</li>
                                    <li>Weighting: {{$products_dtls->weighting}}</li>

                                    <!-- <li>Weighting: Polyfil</li> -->
                                    <li>Skin Color: {{$products_dtls->skin_color}}</li>
                                    <li>Race: {{$products_dtls->race}}</li>
                                    <li>Realborn: {{$products_dtls->realborn}}</li>
                                    <li>Certificate Of Authenticity (COA): {{$products_dtls->certificate_of_auth_coa}}</li>
                                    <li>Pacifier: {{$products_dtls->pacifier}}</li>
                                    <li>Pacifier Type: {{$products_dtls->pacifier_type}}</li>
                                    <li>Drink and Wet: {{$products_dtls->drink_wet}}</li>
                                    <li>Smoke Free Environment: {{$products_dtls->smoke_free_env}}</li>
                                    <li>Pet Free Environment: {{$products_dtls->pet_free_env}}</li>
                                </ul>
                            </div>
                            <div class="doll-details-two">
                                <ul>
                                    <li><strong>File under:</strong> Li baby boy   Doll rooted mohair hp German glass high quality GHS matte 3 month </li>
                                    <li><strong>Ordering Information:</strong><?php echo $products_dtls->ordering_information; ?></li>
                                    <li><strong>Return Policy:</strong><?php echo $products_dtls->return_policy; ?></li>
                                    <li><strong>Shipping:</strong><?php                                   
                                    // $jsonobj = $products_dtls->shipping_charges;
                                    // $arr = json_decode($jsonobj, true);
                                    // foreach($arr as $key=>$val) {                                        
                                    //     echo $key . "=>".$val."<br>";
                                    // }
                                    ?> 
                                    
                                     
                                     
                                                                     
                                    <!-- United States $32.00 USD (₨2375.20 INR) Rest of the World  Based on location -->
                                </li>
                                    <!-- shipping_charges -->
                                    <li><strong>Layaway Available:</strong>
                                    {{$products_dtls->layaway_available}}</li>

                                    <li><strong>Payment Accepted:</strong>PayPal</li>
                                </ul>
                                <div><strong>$850 USD<br>(approx. ₨63091.80 INR)</strong></div>
                                <a href="#">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="doll-ashely">
                <div class="container">
                    <div class="row">
                    <div class="col-md-12 doll-we">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="../assets/images/doll-woman.png" alt="">
                            </div>
                            <div class="col-md-4 p-0">
                                <h4>{{$user->name}}</h4>
                                <p>Forever In {{$user->shop_name}}</p>
                            </div>
                            <div class="col-md-4 p-0">
                                <a href="#">follow</a>
                            </div>
                            <div class="col-md-6 dol-text p-0">
                                @php
                                $datetime1 = new DateTime();
                                $datetime2 = new DateTime($user->created_at);
                                $interval = $datetime1->diff($datetime2);
                                $interval_format = $interval->format('%y years %m months and %d days');
                                @endphp
                                <p>{{$interval_format}} on Reborns<br><br>14 verified orders sold</p>
                            </div>
                            <div class="col-md-6 dol-text p-0">
                                <p>125 followers<br><br>{{count($vendor_img)}} babies</p>
                            </div>
                        </div>
                            <div class="doll-ashely-btn">
                                <a href="{{ route('front.nuserydetails', $user->id)}}" class="nus-btn">Visit Nursery</a>
                                <a href="#" class="nus-btn">Contact</a>
                            </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

