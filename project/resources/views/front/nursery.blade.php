@extends('layouts.front')
@section('content')

<section class="search-banner">
<div class="search-img">
    <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100" > 
</div>
</section>

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

<section class="search1">
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form id="nursery_serch" class="form-horizontal" action="{{route('front.nurseries')}}" method="GET">
                <div class="form-group">
                    <input type="text" placeholder="Search Nursery..." class="form-control search-input" name="search" id="search" value="{{ request()->input('search') }}">
                </div>
            </form>
            
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="search-pagination">
                <ul>
                    <li><a href="{{route('front.nurseries')}}/a">a</a></li>
                    <li><a href="{{route('front.nurseries')}}/b">b</a></li>
                    <li><a href="{{route('front.nurseries')}}/c">c</a></li>
                    <li><a href="{{route('front.nurseries')}}/d">d</a></li>
                    <li><a href="{{route('front.nurseries')}}/e">e</a></li>
                    <li><a href="{{route('front.nurseries')}}/f">f</a></li>
                    <li><a href="{{route('front.nurseries')}}/g">g</a></li>
                    <li><a href="{{route('front.nurseries')}}/h">h</a></li>
                    <li><a href="{{route('front.nurseries')}}/i">i</a></li>
                    <li><a href="{{route('front.nurseries')}}/j">j</a></li>
                    <li><a href="{{route('front.nurseries')}}/k">k</a></li>
                    <li><a href="{{route('front.nurseries')}}/l">l</a></li>
                    <li><a href="{{route('front.nurseries')}}/m">m</a></li>
                    <li><a href="{{route('front.nurseries')}}/n">n</a></li>
                    <li><a href="{{route('front.nurseries')}}/o">o</a></li>
                    <li><a href="{{route('front.nurseries')}}/p">p</a></li>
                    <li><a href="{{route('front.nurseries')}}/q">q</a></li>
                    <li><a href="{{route('front.nurseries')}}/r">r</a></li>
                    <li><a href="{{route('front.nurseries')}}/s">s</a></li>
                    <li><a href="{{route('front.nurseries')}}/t">t</a></li>
                    <li><a href="{{route('front.nurseries')}}/u">u</a></li>
                    <li><a href="{{route('front.nurseries')}}/v">v</a></li>
                    <li><a href="{{route('front.nurseries')}}/w">w</a></li>
                    <li><a href="{{route('front.nurseries')}}/x">x</a></li>
                    <li><a href="{{route('front.nurseries')}}/y">y</a></li>
                    <li><a href="{{route('front.nurseries')}}/z">z</a></li>
                    <li><a href="{{route('front.nurseries')}}/0-9">0-9</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="search-box">
                <ul>
                    <li><a href="#">australia (2)</a></li>
                    <li><a href="#">Hungary (2)</a></li>
                    <li><a href="#">mexico (1)</a></li>
                    <li><a href="#">russia (6)</a></li>
                    <li><a href="#">sweden (1)</a></li>
                    <li><a href="#">canada (25)</a></li>
                    <li><a href="#">ireland (2)</a></li>
                    <li><a href="#">poland (1)</a></li>
                    <li><a href="#">singapore (1)</a></li>
                    <li><a href="#">united kingdom (7)</a></li>
                    <li><a href="#">france (2)</a></li>
                    <li><a href="#">italy (1)</a></li>
                    <li><a href="#">puerto rico (1)</a></li>
                    <li><a href="#">spain (1)</a></li>
                    <li><a href="#">united states (401)</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
<section class="search-result">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <h2 class="font-weight-bold mb-6">
                    @if(request()->input('search')){{count($datas)}} Results for "{{ request()->input('search') }}"
                    @endif</h2>
                @foreach($datas as $data)
                <div class="row mb-6">
                    <div class="col-lg-5 col-12">
                      <div class="result-1">
                         
                              <div class="result-img">
                                  @if($data->photo!='')
                                    <img src="{{asset('assets/images/admin.jpg')}}" class="img-fluid">
                                  @else
                                    <img src="{{asset('assets/images/admin.jpg')}}" class="img-fluid">
                                  @endif
                              </div>
                             
                                  <div class="result-box">
                                      <h3>{{$data->shop_name}}</h3>
                                      <h4>By {{$data->owner_name}}</h4>
                                      <h5>{{$data->country}}</h5>
                                      <h6 class="mb-4"> {{count($data->products)}} items</h6>
                                      {{-- <a href="#">Follow</a> --}}
                                  </div>
                            
                         
                      </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="result2">
                            <div class="row">
                                @php
                                    $count=0;
                                @endphp
                                @foreach($data->products as $product)
                                <div class="col-md-4">
                                    <img src="{{asset('assets/images/products/'.$product->photo)}}" class="img-fluid">
                                </div>
                                @php
                                    $count++;
                                    if($count==3){ break; }
                                @endphp
                                @endforeach

                                {{-- <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/2.png')}}" class="img-fluid">
                                </div> --}}
                            </div>
                           
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="row mb-6">
                    <div class="col-lg-5 col-12">
                      <div class="result-1">
                         
                              <div class="result-img">
                                  <img src="{{asset('assets/front/images/icon2.png')}}" class="img-fluid">
                              </div>
                             
                                  <div class="result-box">
                                      <h3>Olivia Theobald</h3>
                                      <h4> Babies by Olive</h4>
                                      <h5> Wisconsin</h5>
                                      <h6 class="mb-4" style="visibility: hidden;"> 2 items</h6>
                                      <a href="#">Follow</a>
                                  </div>
                            
                         
                      </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="result2">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/3.png')}}" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/4.png')}}" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/5.png')}}" class="img-fluid">
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="row mb-6">
                    <div class="col-lg-5 col-12">
                      <div class="result-1">
                         
                              <div class="result-img">
                                  <img src="{{asset('assets/front/images/icon3.png')}}" class="img-fluid">
                              </div>
                             
                                  <div class="result-box">
                                    
                                   <h3>Olivia Marie Tosolt</h3>
                                      <h4> Babies by Olivia Marie</h4>
                                      <h5> Pennsylvania</h5>
                                      <h6 class="mb-4" style="visibility: hidden;"> 2 items</h6>
                                      <a href="#">Follow</a>
                                  </div>
                            
                         
                      </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="result2">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/6.png')}}" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/7.png')}}" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/8.png')}}" class="img-fluid">
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="row mb-6">
                    <div class="col-lg-5 col-12">
                      <div class="result-1">
                         
                              <div class="result-img">
                                  <img src="{{asset('assets/front/images/icon4.png')}}" class="img-fluid">
                              </div>
                             
                                  <div class="result-box">
                                    
                                      <h3>Janet Toro</h3>
                                      <h4>Babies of the Rainbow
                                        Nursery</h4>
                                      <h5>Sunnyvale, California</h5>
                                      <h6 class="mb-4" style="visibility: hidden;"> 2 items</h6>
                                      <a href="#">Follow</a>
                                  </div>
                      </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        
                        <div class="result2">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/9.png')}}" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/10.png')}}" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('assets/front/images/11.png')}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="view-more-btn ">
                    <a href="javascript:void(0)" class="text-white">View More Member</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection