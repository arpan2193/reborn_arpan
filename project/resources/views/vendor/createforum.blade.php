@extends('layouts.front')
@section('content')

    <!---------- About Bottom --------->
    <section class="about-text">
        <div class="about-img">
            <img src="{{ asset('assets/front/images/banner-about.jpg') }}" class="img-fluid w-100">
            <h2>Create New Forum</h2>
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
                @include('front.menu')
           </div>
    </section>

    <!-- --------------------edit account------------- -->

    <div class="edit-account">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-3">
                            @include('vendor.sidebar')
                        </div>
                        <div class="col-md-9">
                            <div class="ec-vendor-dashboard-card ">
                                <div class="card-inr">
                                    <div class="message bg-light row ">
                                        <div class="col-md-2">
                                            <img src="{{($user->photo) ? asset("assets/images/users/".$user->photo) : asset("images/products/avatar.webp") }}" alt="Avatar">
                                        </div>
                                        <div class="col-md-10">
                                            <form action="{{route('vendor-storenewforum')}}" method="post">
                                                @csrf
                                                <textarea class="form-control mb-4"
                                                    placeholder="Write a Comment" name="forum" required></textarea>
                                                <button class="btn btn-success" type="submit" >Submit</button>
                                            </form>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
