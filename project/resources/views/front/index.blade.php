@extends('layouts.front')

@section('content')
    <!-- Main Slider Start -->
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
            @foreach($sliders as $slider)

                <div class="ec-slide-item swiper-slide d-flex ec-slide-1" style="background-image: url({{asset('assets/images/sliders/'.$slider->photo.'')}})" !important>
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">

                                <div class="ec-slide-content slider-animation">
                                    <h1 class="ec-slide-title">{{$slider->title_text}}</h1>
                                    <p> {{$slider->details_text}} </p>
                                    <a href="{{$slider->link}}" class="btn btn-lg btn-secondary">{{ $langg->lang25 }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- Main Slider End -->
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


    @php
        $attrPrice = 0;
        $sessionCur = session()->get('currency');
        $sessionCurr = DB::table('currencies')->where('id',$sessionCur)->first();
        $databaseCurr = DB::table('currencies')->where('is_default',1)->first();
        $curr = $sessionCurr ? $sessionCurr: $databaseCurr;        
    @endphp   
    <section class="section ec-fre-spe-section section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="section-title tit1">
                        <h2 class="ec-title">Dolls For Adoption</h2>
                    </div>
                </div>
                @include('includes.admin.form-login')                     
                <div class="ec-fre-products">  
                @foreach($adoption_doll as $doll)                
                    <div class="ec-fs-product">
                        <div class="ec-fs-pro-inner">
                            <img src="{{asset('assets/images/products/'.$doll->photo)}}">
                            
                            <h5 class="ec-fs-pro-title">
                                <a href="{{ route('front.productdetails', $doll->slug) }}" onclick="addrecent('{{$doll->id}}')">
                                    {{$doll->name}}
                                </a>
                            </h5>
                            <p class="ec-fs-pro-desc" id="{{$doll->id}}_recent_msg"></p>
                            <p class="ec-fs-pro-desc">
                                Listed by {{ $doll->user->shop_name}}({{$doll->user->name}})
                            </p>
                            <div class="w-100 d-flex justify-content-between">
                                <p class="ec-fs-pro-desc-time">
                                <?php
                                           $dt = $doll->created_at;
                                           $date = date('m/d/Y h:i:s a', time());                                       
                                            $date1=date_create($dt);
                                            $date2=date_create($date);
                                            $diff=date_diff($date1,$date2);
                                            echo $days =$diff->format("%a days"); 
                                             $datetime1 = new DateTime($date);
                                             $datetime2 = new DateTime($dt);
                                             $interval = $datetime1->diff($datetime2);
                                 ?>
                                </p> 
                                <p class="artist-p-size">{{ getDollLength($doll->length, $doll->length_unit) }}</p>
                            </div>
                            
                            <div class="w-100 d-flex justify-content-between">
                                <p class="time">{{$doll->showPrice() }}</p>
                                @php
                                    $favorities_count = DB::table('favorite_items')->where('product_id', $doll->id)->count();
                                @endphp
                                <p  onclick="addfev('{{$doll->id}}')"><a href="javascript:void(0)">Add to Favorities {{$favorities_count}}</a></p>

                            </div>
                            <p class="ec-fs-pro-desc" id="{{$doll->id}}_favorite_msg"></p>
                        </div>                        
                    </div>
                    @endforeach
                  <!-- end -->
                </div>            
                <div class="view-more-btn">
                    <a href="{{ route('front.productcategory', 'adopted') }}">View More Dolls</a>
                </div>
            </div>
        </div>
    </section>
    <section class="artist">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="section-title pb-4 tit2">
                        <h2 class="ec-title">Reborn Dolls</h2>
                    </div>
                </div>

                <div class="col-sm-12">                   
                        <div class="row">
                        @foreach($reborn_doll as $reborn)
                            <div class="col-sm-3">
                                <div class="artist-product">
                                <img src="{{asset('assets/images/products/'.$reborn->photo)}}">
                                     <h5 class="ec-fs-pro-title">                                        
                                         <a href="{{ route('front.productdetails', $reborn->slug) }}" value="{{$reborn->id}}">
                                         {{$reborn->name}}
                                         </a>
                                       
                                     </h5>
                                     <p class="ec-fs-pro-desc">
                                         Listed by {{ $reborn->user->shop_name}}({{$reborn->user->name}})      
                                     </p>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="ec-fs-pro-desc-time">
                                         <?php
                                           $dt = $reborn->created_at;
                                           $date = date('m/d/Y h:i:s a', time());                                       
                                            $date1=date_create($dt);
                                            $date2=date_create($date);
                                            $diff=date_diff($date1,$date2);
                                            echo $days =$diff->format("%a days"); 
                                             $datetime1 = new DateTime($date);
                                             $datetime2 = new DateTime($dt);
                                             $interval = $datetime1->diff($datetime2); ?>                                             
                                            </p>  
                                         <p class="artist-p-size">{{ getDollLength($reborn->length, $reborn->length_unit) }}</p>
                                     </div>
                                     <div class="w-100 d-flex justify-content-between">
                                         <p class="time">{{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$reborn->showPrice() }}
                                         </p> 
                                         @php
                                            $favorities_count = DB::table('favorite_items')->where('product_id', $reborn->id)->count();
                                        @endphp
                                        <p  onclick="addfev('{{$reborn->id}}')"><a href="javascript:void(0)">Add to Favorities {{$favorities_count}}</a></p>
                                     </div>
                                     <p class="ec-fs-pro-desc" id="{{$reborn->id}}_favorite_msg"></p>
                                 </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="artist-list">
                <a href="javascript:void(0)"> Reborn Nurseries</a>
            </div>
            <div class="panel2">
                <button type="button" class="btn-close" ></button>
                <ul class="cat-list">
                @foreach($nurseries as $nursery)
                <li><a href="{{ route('front.nuserydetails', $nursery->id)}}"> {{$nursery->shop_name}} <span>({{count($nursery->products)}})</span></a></li>
                @endforeach
                </ul>
                <div class="view-more-btn artist-btn">
                    <a href="{{ route('front.nurseries')}}">View More Artist</a>
                </div>
            </div>        
    </section>

    <section class="listed-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="section-title tit3 pb-4">
                        <h2 class="ec-title">Just Listed</h2>
                    </div>
                </div>
               @foreach($just_listed as $listed_dall)
                <div class="col-sm-3">
                    <div class="ec-spe-products1">
                   
                        <div class="artist-product-new">
                            <img src="{{asset('assets/images/products/'.$listed_dall->photo)}}">
                        </div> 
                        @foreach($listed_dall->galleries as $gal)
                        <div class="artist-product-new">
                            <img src="{{asset('assets/images/galleries/'.$gal->photo)}}">
                        </div>
                        @endforeach
                            
                    </div>
                     <div class="ec-fs-pro-inner">
                       <h5 class="ec-fs-pro-title">
                            <a href="{{ route('front.productdetails', $listed_dall->slug) }}" onclick="addrecent('{{$listed_dall->id}}')">
                            {{$listed_dall->name}}  
                            </a>
                       </h5>
                       <p class="ec-fs-pro-desc">
                         Listed by {{ $listed_dall->user->shop_name}}({{$listed_dall->user->name}})
                        </p>  
                        <div class="w-100 d-flex justify-content-between">
                            <p class="ec-fs-pro-desc-time">
                            <?php 
                            $dt = $listed_dall->created_at;
                                           $date = date('m/d/Y h:i:s a', time());                                       
                                            $date1=date_create($dt);
                                            $date2=date_create($date);
                                            $diff=date_diff($date1,$date2);
                                            echo $days =$diff->format("%a days"); 
                                             $datetime1 = new DateTime($date);
                                             $datetime2 = new DateTime($dt);
                                             $interval = $datetime1->diff($datetime2);
                            ?>
                            </p>  
                            <p class="artist-p-size">{{ getDollLength($listed_dall->length, $listed_dall->length_unit) }}</p>
                        </div>
                        <div class="w-100 d-flex justify-content-between">
                            <p class="time">{{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$listed_dall->showPrice() }}</p>
                            @php
                                $favorities_count = DB::table('favorite_items')->where('product_id', $listed_dall->id)->count();
                            @endphp
                            <p  onclick="addfev('{{$listed_dall->id}}')"><a href="javascript:void(0)">Add to Favorities {{$favorities_count}}</a></p>
                        </div>
                        <p class="ec-fs-pro-desc" id="{{$listed_dall->id}}_favorite_msg"></p>
                   </div>
                </div>
               @endforeach
                </div>




                <div class="view-more-btn">
                    <a href="{{ route('front.allitems') }}">View More Dolls</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('front.productcategory', 'custom-made') }}">
                        <div class="pic-box">
                            <img src="{{asset('assets/front/images/pic1.jpg')}}">
                            <div class="custom-doll">
                                Custom Dolls
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('front.productfeatured') }}">
                        <div class="pic-box">
                            <img src="{{asset('assets/front/images/pic2.jpg')}}">
                            <div class="custom-doll">
                                featured Dolls
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section ec-fre-spe-section section-space-p pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="section-title tit5">
                        <h2 class="ec-title">View More Alternative Dolls</h2>
                    </div>
                </div>
                <div class="ec-fre-products">
                    @foreach($alternative_doll as $altdall)
                        <div class="ec-fs-product">
                            <div class="ec-fs-pro-inner">
                                <img src="{{asset('assets/images/products/'.$altdall->photo)}}">
                                <h5 class="ec-fs-pro-title">
                                <a href="{{ route('front.productdetails', $altdall->slug) }}" onclick="addrecent('{{$altdall->id}}')">
                                    {{$altdall->name}}  
                                </a>
                                </h5>
                                <p class="ec-fs-pro-desc">
                                    Listed by {{ $altdall->user->shop_name}}({{$altdall->user->name}})
                                </p>
                                <div class="w-100 d-flex justify-content-between">
                                    <p class="ec-fs-pro-desc-time">
                                  <?php
                                    $dt = $altdall->created_at;
                                           $date = date('m/d/Y h:i:s a', time());                                       
                                            $date1=date_create($dt);
                                            $date2=date_create($date);
                                            $diff=date_diff($date1,$date2);
                                            echo $days =$diff->format("%a days"); 
                                             $datetime1 = new DateTime($date);
                                             $datetime2 = new DateTime($dt);
                                             $interval = $datetime1->diff($datetime2);
                                      ?>
                                    </p>  
                                    <p class="artist-p-size">{{ getDollLength($altdall->length, $altdall->length_unit) }}</p>
                                </div>
                                <div class="w-100 d-flex justify-content-between">
                                    <p class="time">{{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$altdall->showPrice() }}</p>  
                                    @php
                                    $favorities_count = DB::table('favorite_items')->where('product_id', $altdall->id)->count();
                                    @endphp
                                <p  onclick="addfev('{{$altdall->id}}')"><a href="javascript:void(0)">Add to Favorities {{$favorities_count}}</a></p>
                                </div>
                                 <p class="ec-fs-pro-desc" id="{{$doll->id}}_favorite_msg"></p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="view-more-btn">
                    <a href="{{ route('front.productcategory', 'alternative') }}">View More Dolls</a>
                </div>
            </div>
        </div>
    </section>
@endsection

