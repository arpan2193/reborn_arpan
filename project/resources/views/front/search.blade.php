@extends('layouts.front')
@section('content')

<section class="search-banner">
<div class="search-img">
    <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100" > 
</div>
</section>
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



<section class="search-result">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <h2 class="font-weight-bold mb-6">Search result for "{{$search_val}}"</h2>

                <div class="col-sm-12">
                        <div class="row search-product">                           
                            @foreach($data as $serache_list)
                            <div class="col-sm-3">
                                <div class="artist-product search-product-box">
                                <img src="{{asset('assets/images/products/'.$serache_list->photo)}}">
                                     <h5 class="ec-fs-pro-title">
                                         <a href="{{ route('front.productdetails', $serache_list->slug) }}" 
                                         onclick="addrecent('{{$serache_list->id}}')">
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
                                             ?>
                                            </p>  
                                         <p class="artist-p-size">{{ getDollLength($serache_list->length, $serache_list->length_unit) }}</p>
                                     </div>
                                     <div class="w-100 d-flex justify-content-between">
                                     <p class="time">{{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$serache_list->showPrice() }}</p>
                                     @php
                                    $favorities_count = DB::table('favorite_items')->where('product_id', $serache_list->id)->count();
                                    @endphp
                                    <p  onclick="addfev('{{$serache_list->id}}')"><a href="javascript:void(0)">Add to Favorities {{$favorities_count}}</a></p>
                                     </div>
                                     <p class="ec-fs-pro-desc" id="{{$serache_list->id}}_favorite_msg"></p>
                                 </div>
                                
                            </div>
                            @endforeach                          
                    </div>
                     <?php  
                 
                
                    ?>                    
                             
                   @if($count_search>4)                   
                   <div class="view-more-btn search-doll-btns" search-totalResult="{{ $count_search }}"> 
                  <a href="javascript:void(0)">View More Dolls</a>
                  </div>
                  
                  @endif
                  </div>
                
            </div>
        </div>
    </div>
</section>

@endsection