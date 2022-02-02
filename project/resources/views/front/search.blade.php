@extends('layouts.front')
@section('content')

<section class="search-banner">
<div class="search-img">
    <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100" > 
</div>
</section>

<!-- <section class="filter">
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
</section> -->
@php
        $attrPrice = 0;
        $sessionCur = session()->get('currency');
        $sessionCurr = DB::table('currencies')->where('id',$sessionCur)->first();
        $databaseCurr = DB::table('currencies')->where('is_default',1)->first();
        $curr = $sessionCurr ? $sessionCurr: $databaseCurr;

    @endphp



<section class="search-result">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <h2 class="font-weight-bold mb-6">Search result for "{{$search_val}}"</h2>

                <div class="col-sm-12">
                        <div class="row">
                           
                            @foreach($data as $serache_list)
                            <div class="col-sm-3">
                                <div class="artist-product">
                                <img src="{{asset('assets/images/products/'.$serache_list->photo)}}">
                                     <h5 class="ec-fs-pro-title">
                                         <a href="{{ route('front.productdetails', $serache_list->slug) }}">
                                             {{$serache_list->name}}
                                         </a>
                                     </h5>
                                     <p class="ec-fs-pro-desc">
                                         Listed by {{ $serache_list->user->shop_name}}({{$serache_list->user->name}})
                                     </p>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="ec-fs-pro-desc-time">
                                         <?php
                                           $dt = $serache_list->created_at;
                                           $date = date('m/d/Y h:i:s a', time());                                       
                                            $date1=date_create($dt);
                                            $date2=date_create($date);
                                            $diff=date_diff($date1,$date2);
                                            echo $days =$diff->format("%a days"); 
                                             $datetime1 = new DateTime($date);
                                             $datetime2 = new DateTime($dt);
                                             $interval = $datetime1->diff($datetime2);
                                             //echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
                                        // {{$products->created_at}}  ?>
                                            </p>  
                                         <p class="artist-p-size">{{ $serache_list->length_by_inch}} " ({{$serache_list->length_by_centimeters}} cm)</p>
                                     </div>
                                     <div class="w-100 d-flex justify-content-between">
                                     <p class="time">{{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$serache_list->showPrice() }}</p>
                                            <p class="fabarite">Add to Favorities</p>
                                     </div>
                                     
                                 </div>
                                
                            </div>
                            @endforeach
                            
                            <!-- <div class="col-sm-3">
                                <div class="artist-product">
                                    <img src="{{asset('assets/front/images/product-image/6.jpg')}}">
                                     <h5 class="ec-fs-pro-title">
                                         <a href="#">
                                             Alica
                                         </a>
                                     </h5>
                                     <p class="ec-fs-pro-desc">
                                         Listed by Reborn Love(Momma Mary)
                                     </p>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="ec-fs-pro-desc-time">2 Hours ago</p>  
                                         <p class="artist-p-size">19 " (48.2 cm)</p>
                                     </div>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="time">21001.30 INR</p>  <p class="fabarite">Add to Favorities</p>
                                     </div>
                                 </div>
                            </div> -->
                            <!-- <div class="col-sm-3">
                                <div class="artist-product">
                                    <img src="{{asset('assets/front/images/product-image/6.jpg')}}">
                                     <h5 class="ec-fs-pro-title">
                                         <a href="#">
                                             Alica
                                         </a>
                                     </h5>
                                     <p class="ec-fs-pro-desc">
                                         Listed by Reborn Love(Momma Mary)
                                     </p>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="ec-fs-pro-desc-time">2 Hours ago</p>  
                                         <p class="artist-p-size">19 " (48.2 cm)</p>
                                     </div>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="time">21001.30 INR</p>  <p class="fabarite">Add to Favorities</p>
                                     </div>
                                 </div>
                            </div> -->
                            <!-- <div class="col-sm-3">
                                <div class="artist-product">
                                    <img src="{{asset('assets/front/images/product-image/6.jpg')}}">
                                     <h5 class="ec-fs-pro-title">
                                         <a href="#">
                                             Alica
                                         </a>
                                     </h5>
                                     <p class="ec-fs-pro-desc">
                                         Listed by Reborn Love(Momma Mary)
                                     </p>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="ec-fs-pro-desc-time">2 Hours ago</p>  
                                         <p class="artist-p-size">19 " (48.2 cm)</p>
                                     </div>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="time">21001.30 INR</p>  <p class="fabarite">Add to Favorities</p>
                                     </div>
                                 </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-3">
                                <div class="artist-product">
                                    <img src="{{asset('assets/front/images/product-image/6.jpg')}}">
                                     <h5 class="ec-fs-pro-title">
                                         <a href="#">
                                             Alica
                                         </a>
                                     </h5>
                                     <p class="ec-fs-pro-desc">
                                         Listed by Reborn Love(Momma Mary)
                                     </p>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="ec-fs-pro-desc-time">2 Hours ago</p>  
                                         <p class="artist-p-size">19 " (48.2 cm)</p>
                                     </div>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="time">21001.30 INR</p>  <p class="fabarite">Add to Favorities</p>
                                     </div>
                                 </div>
                            </div>
                        </div> -->
                    </div>               
                <div class="view-more-btn ">
                    <a href="javascript:void(0)" class="text-white">View More Result</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection