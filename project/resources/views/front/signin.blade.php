@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>login/register</h2>
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

<!-- --------------------form------------- -->

<div class="signin-form">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row form-v8-content">
                    <div class="col-md-6 p-0">
                        <div class="form-left">
                            <!-- <img src="assets/images/product-image/12.jpg" class="w-100"> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-right">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Register</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Login</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    @include('includes.admin.form-login')
                                    <form class="mregisterform" action="{{route('user-register-submit')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="{{ $langg->lang182 }}" required="" class="input-text form-control">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-select" aria-label="Default select example" name="country_id" required="">
                                                <option value="">Your Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="{{ $langg->lang183 }}" required="" class="input-text form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="{{ $langg->lang184 }}" required="" class="input-text form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="{{ $langg->lang186 }}" required="" class="input-text form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" placeholder="{{ $langg->lang187 }}" required="" class="input-text form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn">{{ $langg->lang189 }}</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane fade login-form signin-form" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    @include('includes.admin.form-login')

                                    <form class="mloginform" action="{{ route('user.login.submit') }}" method="POST">
                                        {{ csrf_field() }}


                                        <div class="form-group">
                                            <input type="email" name="email" class="input-text form-control" placeholder="Email Address">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="input-text form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn">Sign In</button>
                                        </div>
                                        <div class="form-group text-center mt-4">
                                            <a href="{{route('user-forgot')}}" class="forgot text-dark text-capitalize">Forgot password?</a>
                                        </div>

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


@endsection