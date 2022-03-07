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
         @include('front.menu')
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
                    <li @if(isset($alp) && ($alp=='a')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/a">a</a></li>
                    <li @if(isset($alp) && ($alp=='b')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/b">b</a></li>
                    <li @if(isset($alp) && ($alp=='c')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/c">c</a></li>
                    <li @if(isset($alp) && ($alp=='d')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/d">d</a></li>
                    <li @if(isset($alp) && ($alp=='e')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/e">e</a></li>
                    <li @if(isset($alp) && ($alp=='f')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/f">f</a></li>
                    <li @if(isset($alp) && ($alp=='g')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/g">g</a></li>
                    <li @if(isset($alp) && ($alp=='h')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/h">h</a></li>
                    <li @if(isset($alp) && ($alp=='i')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/i">i</a></li>
                    <li @if(isset($alp) && ($alp=='j')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/j">j</a></li>
                    <li @if(isset($alp) && ($alp=='k')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/k">k</a></li>
                    <li @if(isset($alp) && ($alp=='l')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/l">l</a></li>
                    <li @if(isset($alp) && ($alp=='m')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/m">m</a></li>
                    <li @if(isset($alp) && ($alp=='n')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/n">n</a></li>
                    <li @if(isset($alp) && ($alp=='o')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/o">o</a></li>
                    <li @if(isset($alp) && ($alp=='p')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/p">p</a></li>
                    <li @if(isset($alp) && ($alp=='q')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/q">q</a></li>
                    <li @if(isset($alp) && ($alp=='r')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/r">r</a></li>
                    <li @if(isset($alp) && ($alp=='s')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/s">s</a></li>
                    <li @if(isset($alp) && ($alp=='t')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/t">t</a></li>
                    <li @if(isset($alp) && ($alp=='u')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/u">u</a></li>
                    <li @if(isset($alp) && ($alp=='v')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/v">v</a></li>
                    <li @if(isset($alp) && ($alp=='w')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/w">w</a></li>
                    <li @if(isset($alp) && ($alp=='x')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/x">x</a></li>
                    <li @if(isset($alp) && ($alp=='y')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/y">y</a></li>
                    <li @if(isset($alp) && ($alp=='z')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/z">z</a></li>
                    <li @if(isset($alp) && ($alp=='0-9')) style="background: #e7ca9e;"  @endif><a href="{{route('front.nurseries')}}/0-9">0-9</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="search-box">
                <ul>
                    @foreach($countries as $country)
                    <li><a href="{{route('front.nurseriescountry', $country->id)}}">{{$country->country_name}} ({{$country->total_users}})</a></li>
                    @endforeach
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
                    @endif
                    @if(isset($countryname))
                    {{count($datas)}} Results for "{{ $countryname->country_name }}"
                    @endif
                </h2>
                @if(count($datas)>0)
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
                                      <a href="javascript:void(0)"  onclick="followbtn('{{$data->id}}')">Follow</a>
                                      <p class="ec-fs-pro-desc" id="follow_msg{{$data->id}}"></p> 
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
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                @endforeach
                @else
                <h4 class="font-weight-bold mb-6">Result Not Found!</h4>
                @endif
                @if(count($datas)>0)
                @if(request()->input('search'))
                <div class="view-more-btn">
                    <a href="javascript:void(0)" class="text-white">View More Member</a>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</section>

@endsection