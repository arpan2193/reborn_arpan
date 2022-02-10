@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>followed Item Viewed</h2>
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
           <ul class="cat-list">
               <li><a href="{{ route('front.index') }}"> Home </a></li>
               <li><a href="{{ route('front.productfeatured') }}">Featured</a></li>
               <li><a href="{{ route('front.productcategory', 'custom-made') }}">Custom made</a></li>
               <li><a href="{{ route('front.productcategory', 'pre-loved') }}">Pre-loved</a></li>
               <li><a href="{{ route('front.productcategory', 'alternative') }}">Alternative</a></li>
               <li><a href="{{ route('front.productcategory', 'accessories') }}">Accessories</a></li>
               <li><a href="{{ route('front.productcategory', 'adopted') }}">Adopted</a></li>
               <li><a href="{{ route('front.nurseries') }}">Nurseries</a></li>
               <li><a href="{{ route('front.createnursery')}}" class="nursery-btn">Create Your Nursery</a></li>
           </ul>
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

                        @include('user.sidebar')
                    </div>

                    <div class="col-md-9">
                        <div class="row followed-product">
                            <h4 class="mb-4 text-capitalize">followed Items Viewed</h4>
                            @foreach($followitems as $list)
                            <div class="col-sm-4">
                                <div class="ec-spe-products1 followed-product-box">
                                    <div class="artist-product-new">
                                    <img src="{{asset('assets/images/products/'.$list->photo)}}">
                                    </div>
                                    @foreach($list->galleries as $gal)
                                    <div class="artist-product-new">
                                    <img src="{{asset('assets/images/galleries/'.$gal->photo)}}">
                                    </div>
                                    @endforeach
                                </div>                                
                                
                                <div class="ec-fs-pro-inner">
                                    <h5 class="ec-fs-pro-title">
                                    <a href="{{ route('front.productdetails', $list->slug) }}" onclick="addrecent('{{$list->id}}')">
                                        {{$list->name}}
                                        </a>
                                    </h5>
                                    <p class="ec-fs-pro-desc">
                                    Listed by 
                                    {{ $list->user->shop_name}}({{$list->user->name}})
                                    </p>
                                    <div class="w-100 d-flex justify-content-between">
                                        <p class="ec-fs-pro-desc-time">
                                        <?php 
                                           $dt = $list->created_at;
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
                                        <p class="artist-p-size">{{ $list->length_by_inch}} " ({{$list->length_by_centimeters}} cm)</p>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between">
                                        <p class="time">{{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$list->showPrice() }}</p>
                                        @php
                                    $favorities_count = DB::table('favorite_items')->where('product_id', $list->id)->count();
                                    @endphp
                                <p  onclick="addfev('{{$list->id}}')"><a href="javascript:void(0)">Add to Favorities
                                {{$favorities_count}}</a>
                               </p>
                                </div> 
                                <p class="ec-fs-pro-desc" id="{{$list->id}}_favorite_msg"></p>                               
                                </div>   
                                </div>
                            @endforeach

                           </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

@if($count>6)
   <div class="view-more-btn followed-doll-btns" followed-totalResult="{{$count}}" > 
    <a href="javascript:void(0)">View More Dolls</a>
    </div>
    @endif 

@endsection