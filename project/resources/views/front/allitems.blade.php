@extends('layouts.front')

@section('content')
<!---------- Bottom --product category page with category slug - featured.------->
<section class="about-text">
        <div class="about-img">
            <img src="{{asset('assets/images/bgfeatured.jpg')}}" class="img-fluid w-100">
            <h2>Dolls</h2>
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
    
    <!-- menu section end -->
     <section class="listed-product featured-bg-lis mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="section-title pb-4">
                        <h2 class="ec-title"></h2>
                    </div>
                </div>
              
                <div class="w-100">
                   
                    <div class="row"> 
                   
                    @foreach($dalls as $products) 
                        <div class="col-sm-3">                          
                        <div class="ec-spe-products">                                                                
                         <div class="artist-product-new">
                                    <div class="ec-fs-pro-inner">
                                    <img src="{{asset('assets/images/products/'.$products->photo)}}">
                                        <h5 class="ec-fs-pro-title">
                                            <a href="{{  url('') }}/item/{{$products->slug}}"> 
                                                {{$products->name}}                                              
                                            </a>
                                        </h5>
                                        <p class="ec-fs-pro-desc">
                                           Listed by {{ $products->user->shop_name}}({{$products->user->name}})
                                        </p>
                                        <div class="w-100 d-flex justify-content-between">
                                        <p class="ec-fs-pro-desc-time">
                                            <!-- 2 Hours ago  -->
                                            <?php
                                           $dt = $products->created_at;
                                           $date = date('m/d/Y h:i:s a', time());                                       
                                            $date1=date_create($dt);
                                            $date2=date_create($date);
                                            $diff=date_diff($date1,$date2);
                                            $days =$diff->format("%a days"); 
                                            if($days == '0 days') {
                                             $datetime1 = new DateTime($date);
                                             $datetime2 = new DateTime($dt);
                                             $interval = $datetime1->diff($datetime2);
                                             echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes"; 
                                            }else{
                                               echo $days =$diff->format("%a days"); 
                                            }
                                         ?>
                                          <p class="artist-p-size">{{ $products->length_by_inch}} " ({{$products->length_by_centimeters}} cm)</p>
                                    </div>
                                        <div class="w-100 d-flex justify-content-between">
                                            <p class="time">
                                            {{ $attrPrice != 0 ?  $gs->currency_format == 0 ? $curr->sign.$withSelectedAtrributePrice : $withSelectedAtrributePrice.$curr->sign :$products->showPrice() }}
                                            
                                           </p> 
                                             <p class="fabarite">Add to Favorities</p>
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                        </div> 
                        @endforeach        
                 </div>
                
                 <div class="view-more-btn featrured-doll-btn">
                    <a href="#">View More Featured Dolls</a>
                </div>
            </div>
        </div>
    </section>  
    <!--product details page product slug - feature_listing  -->
@endsection