@extends('layouts.front')
@section('content')
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>{{$data->name}}</h2>
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

<section class="about-img-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="./assets/images/about-man.jpg" alt="">
                        </div>
                        <div class="col-md-6">
                            <h3>{{$data->title}}</h3>
                            <p>{{$data->subtitle}}</p>
                            <article>{{$data->body1}}</article>
                        </div>
                        <div class="col-md-12">
                            <p class="bt-txt">{{$data->body2}}</p>
                        </div>
                    </div>
                </div>
            </section>

@endsection