@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>Forgot Password</h2>
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
        <button type="button" class="btn-close"></button>
        @include('front.menu')
    </div>
</section>

<!-- --------------------form------------- -->

<div class="signin-form">
             <div class="container" >
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="row form-v8-content">
                           <div class="col-md-6 p-0">
                              <div class="form-left">
                                <!-- <img src="assets/images/product-image/12.jpg" class="w-100"> -->
                              </div>
                           </div>
                           <div class="col-md-6 d-flex align-items-center">
                            <div class="form-right">
                                <h2 class="text-center">Forgot Your Password?</h2>
                                @include('includes.admin.form-login')
                               <form class="mregisterform" action="{{route('user-forgot-submit')}}" method="POST">
                                    {{ csrf_field() }}
                                   <div class="form-group">
                                       <input type="email" name="email" placeholder="{{ $langg->lang183 }}" class="form-control" required="">
                                   </div>
                                   <div class="form-group">
                                            <input class="authdata" type="hidden" value="{{ $langg->lang195 }}">
                                            <button type="submit" class="btn">{{ $langg->lang196 }}</button>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <a href="{{ route('front.index') }}" class="text-dark text-capitalize">Back to home page</a>
                                </div>
                               </form>
                            </div>
                        </div>
                            </div>
                    </div>
                </div> 
             </div>
        </div>


@endsection