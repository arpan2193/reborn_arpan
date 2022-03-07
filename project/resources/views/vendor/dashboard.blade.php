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
    <div class="edit-account" >
        <div class="container">
            <div class="row post-comment">               
                <div class="col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-3">
                            @include('vendor.sidebar')
                        </div>
                        <div class="col-md-9">
                            <div class="ec-vendor-dashboard-card ">
                                <div class="card-inr">
                                    <div class="ec-vendor-card-header p-0">                                      
                                        <form id="forum_serchfrom" class="row g-3" action="{{route('vendor-dashboard')}}" method="GET">
                                            <div class="col-auto">
                                                <input type="text" class="form-control"  style="height: 31px !important;
                                                  min-height: 0;" id="forum_serch" name="search" value="{{ request()->input('search') }}" placeholder="Search Forum...">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary mb-3">Search Forum</button>
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn btn-success" href="{{route('vendor-createforum')}}">Post New Topic</a>
                                            </div>
                                        </form>
                                                                               
                                    </div>
                                    @if (session('success'))
                                    <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong> {{ session('success') }} </strong>
                                    </div>
                                    @endif                                   
 <!-- =================NEW POST blog COMMENT============================================================================== -->
                                    @if(count($forums)>0)
                                    @foreach($forums as $forum)
                                    <div class="post-comment-boxs">
                                        <div class="message bg-light row forum-product-box">
                                            <div class="col-md-2 ">
                                                <img src="{{($forum->photo) ? asset("assets/images/users/".$forum->photo) : asset("images/products/avatar.webp") }}" alt="Avatar">
                                            </div>
                                            <div class="col-md-10">
                                                <h5>{{$forum->name}}</h5>
                                                <h6>{{$forum->shop_name}}</h6>
                                                <span>{{$forum->country_name}}</span>
                                                <p>{{$forum->blog}}</p>
                                                <p><span class="time-right pr-4">                                                                
                                                {{posted_time_calculation($forum->created)}}
                                                </span>                                          
                                                <a  onclick="bloglike('{{$forum->pid}}')" class="ecicon eci-thumbs-up" ></a>    
                                                {{$forum->likes}}</p>                              
                     <!-- ================================================================================================ -->
                                                @if(count($forum->comments)>0)
                                                @foreach($forum->comments as $forumcomment)
                                                <div class="row message bg-darker">
                                                    <div class="col-md-2">
                                                        <img src="{{($forumcomment->photo) ? asset("assets/images/users/".$forumcomment->photo) : asset("images/products/avatar.webp") }}" alt="Avatar">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <h5>{{$forumcomment->name}}</h5>
                                                        <h6>{{$forumcomment->shop_name}}</h6>
                                                        <span>{{$forumcomment->country_name}}</span>
                                                        <p>{{$forumcomment->blog}}</p>
                                                        <p><span class="time-right pr-4"> 
                                                        {{posted_time_calculation($forumcomment->created)}}
                                                        </span>                                                    
                                                        <a  onclick="comentlike('{{$forumcomment->id}}')" class="ecicon eci-thumbs-up" ></a> 
                                                    {{$forumcomment->likes}}</p>                                                 
                                                    
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif

                <!-- =================chlide COMMENT=============================================== -->
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
                                                            <button class="btn btn-success">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div> 

                                    </div> 
                                    @endforeach
                                    
                                    @else
                                    <div class="post-comment-boxs">
                                        <div class="message bg-light row forum-product-box">
                                            <div class="col-md-12">
                                                <h5>Post not found</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div id="add_forum_ajax">
                                    </div>  
                                    @if(count($forums)>0)                                
                                    <div class="text-center">
                                        <button class="post-view-btn  edit-btn" style="height: 50px;" forums-totalResult="{{ $count_post }}">View More Posting</button>
                                    </div> 
                                    @endif                                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
   