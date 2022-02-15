@extends('layouts.front')
@section('content')

    <!---------- About Bottom --------->
    <section class="about-text">
        <div class="about-img">
            <img src="{{ asset('assets/front/images/banner-about.jpg') }}" class="img-fluid w-100">
            <h2>Dashboard</h2>
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
                                    <div class="ec-vendor-card-header p-0">
                                        <form class="row g-3">
                                            <div class="col-auto">
                                                <input type="text" class="form-control" style="height: 31px !important;
                                                  min-height: 0;">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary mb-3">Search Forum</button>
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn btn-success" href="{{route('vendor-createforum')}}">Post New Topic</a>
                                            </div>
                                        </form>
                                    </div>
                                    @if(count($forums)>0)
                                    @foreach($forums as $forum)
                                    <div class="message bg-light row ">
                                        <div class="col-md-2">
                                            <img src="{{($forum->photo) ? asset("assets/images/users/".$forum->photo) : asset("images/products/avatar.webp") }}" alt="Avatar">
                                        </div>
                                        <div class="col-md-10">
                                            <h5>{{$forum->name}}</h5>
                                            <h6>Andi Pandi Reborns</h6>
                                            <span> Ohio</span>
                                            <p>{{$forum->blog}}</p>
                                            <p><span class="time-right pr-4">9 hours ago</span>
                                            <i class="ecicon eci-thumbs-up"></i> {{ $forum->likes}} </p>
                                            @if(count($forum->comments)>0)
                                            @foreach($forum->comments as $forumcomment)
                                            <div class="row message bg-darker">
                                                <div class="col-md-2">
                                                    <img src="{{($forumcomment->photo) ? asset("assets/images/users/".$forumcomment->photo) : asset("images/products/avatar.webp") }}" alt="Avatar">
                                                </div>
                                                <div class="col-md-10">
                                                    <h5>{{$forumcomment->name}}</h5>
                                                    <h6>Sweet Dreams Reborn Artistry</h6>
                                                    <span> Florida</span>
                                                    <p>{{$forumcomment->blog}}</p>
                                                    <p><span class="time-right pr-4">6 hours ago</span>
                                                    <i class="ecicon eci-thumbs-up"></i> {{$forumcomment->likes}} </p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            <div class="row message bg-darker">
                                                <div class="col-md-2">
                                                    <img src="{{($user->photo) ? asset("assets/images/users/".$user->photo) : asset("images/products/avatar.webp") }}" alt="Avatar">
                                                </div>
                                                <div class="col-md-10">
                                                    <form action="{{route('vendor-storenewreplyforum')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="pid" value="{{$forum->id}}">
                                                        <textarea class="form-control mb-4"
                                                            placeholder="Write a Comment" name="forum" required=""></textarea>
                                                        <button class="btn btn-success" ">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    @endforeach
                                    @endif
                                    <div class=" text-center">
                                        <button class="btn edit-btn" style="height: 50px;">View More Posting</button>
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
