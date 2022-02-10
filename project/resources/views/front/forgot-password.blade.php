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
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Forgot Password</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    @include('includes.admin.form-login')
                                    <form class="mregisterform" action="{{route('user-register-submit')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="{{ $langg->lang183 }}" required="" class="input-text form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn">Submit</button>
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