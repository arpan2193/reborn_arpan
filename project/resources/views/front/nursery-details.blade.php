@extends('layouts.front')
@section('content')

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
             <button type="button" class="btn-close"></button>
                <ul class="cat-list">
                    <li><a href="#"> Home </a></li>
                    <li><a href="#"> Featured </a></li>
                    <li><a href="#"> custom Made</a></li>
                    <li><a href="#"> Collector Resale</a></li>
                    <li><a href="#"> Alternative</a></li>
                    <li><a href="#"> Atlas Art Dolls </a></li>
                    <li><a href="#"> Accessories </a></li>
                    <li><a href="#"> Adopted </a></li>
                    <li><a href="#"> Nurseries</a></li>
                    <li><a href="#"> Doll Kits</a></li>
                    <li><a href="#" class="nursery-btn">Create Your Nursery</a></li>
                </ul>
            </div>
    </section> 
    <!-- @include('front.menu') -->
    @php
        $attrPrice = 0;
        $sessionCur = session()->get('currency');
        $sessionCurr = DB::table('currencies')->where('id',$sessionCur)->first();
        $databaseCurr = DB::table('currencies')->where('is_default',1)->first();
        $curr = $sessionCurr ? $sessionCurr: $databaseCurr;

    @endphp
    <section class="artist-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="artist-lft-top">
                        <div class="artist-lft">
                           <div class="top-margin">
                               <img alt="artist-photo" src="assets/images/artist-photo.jpg">
                           </div>
                           <div>
                               <h4 class="brenda">Brenda Contreras</h4>
                               <p>Babies by Brenda Oregon</p>
                           </div>
                        </div>
                        <ul class="artist-lising">
                            <li>2.5 years on Reborns</li>
                            <li>1 verified order sold</li>
                        </ul>
                        <p class="followers">3 followers</p>
                        <p class="followers">Infants, sleeping, painted hair, realborn, reese (3)</p>
                        <div class="d-flex w-100 pt-4">
                            <a class="Follow-btn" href="#">Follow</a> 
                            <a class="Follow-btn" href="#">Contact</a>
                        </div>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="artist-banner-rit">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="artist-bottom-part listed-product">
        <div class="container">
            <div class="row">
               <h1 class="hello-titel">Hello,</h1>
               <p class="hello-para">
                   My name is Brenda. I have been reborning since 2019. I took a break from selling my babies for a while, but have finally decided it is time to get my nursery up and running again. I make sure to use only quality supplies to reborn my babies. Reborning is something I absolutely love doing. I am so excited to share my art and passion with all of you once again!
               </p> 
               
               @foreach($nurseries_product as $value)            
               <div class="col-sm-3" id="posts"> 
                    <div class="ec-spe-products">                       
                        <div class="artist-product-new">                        
                            <div class="ec-fs-pro-inner">
                                <img src="{{asset('assets/images/products/'.$value->photo)}}">
                                <h5 class="ec-fs-pro-title">
                                    <a href="{{ route('front.productdetails', $value->slug) }}">
                                       {{$value->name}}                                       
                                    </a>
                                </h5>
                                <p class="ec-fs-pro-desc">
                                    Listed by {{ $value->user->shop_name}}({{$value->user->name}})    
                                </p>
                                <div class="w-100 d-flex justify-content-between">
                                <p class="ec-fs-pro-desc-time">
                                <?php
                                           $dt = $value->created_at;
                                           $date = date('m/d/Y h:i:s a', time());                                       
                                            $date1=date_create($dt);
                                            $date2=date_create($date);
                                            $diff=date_diff($date1,$date2);
                                            echo $days =$diff->format("%a days"); 
                                             $datetime1 = new DateTime($date);
                                             $datetime2 = new DateTime($dt);
                                             $interval = $datetime1->diff($datetime2); ?>                                              
                                </p>  
                                <p class="artist-p-size">{{ $value->length_by_inch}} " ({{$value->length_by_centimeters}} cm)</p>
                            </div>
                                <div class="w-100 d-flex justify-content-between">
                                <p class="time">{{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$value->showPrice() }}</p>
                                <p class="fabarite">Add to Favorities</p>
                                </div>                                
                            </div>                            
                        </div>                     
            </div>           
        </div>
        @endforeach
        <div id="grid"></div>           
    </section>
     
    <div class="view-more-btn featrured-doll-btn" id="load_more_button" >        
    <!-- <a href="{{ route ('front.nuserydetails', $value->user_id)}}/?page="> -->
        View More Nursery Dolls</a>                    
    </div> 
@endsection
<script type="text/javascript">
			  var mainurl = "{{url('/')}}/nursery/{{$value->user_id}}";
              </script>

