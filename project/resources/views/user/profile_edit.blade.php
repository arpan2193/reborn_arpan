@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>Profile Update</h2>
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
            <div class="col-md-10 mx-auto">
                <div class="row">
                    <div class="col-md-3">

                        @include('user.sidebar')

                    </div>
                    <div class="col-md-8">

                        <div class="row form-v8-content py-5">
                            <div class="col-md-9 ">
                                @if($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="error" style="color: chocolate;text-align: center;">
                                    {{$error}}
                                </div>
                                @endforeach
                                @endif

                                @if(session()->has('status'))
                                <div class="alert alert-success">
                                    {{ session()->get('status') }}
                                </div>
                                @endif
                                <form class="form-right p-0" action="" method="POST" enctype="multipart/form-data" id="profileupdate">
                                    @csrf
                                    <h4 class="text-dark mb-3">Edit Profile</h4>
                                    <div class="form-group">
                                        <input type="text" placeholder="Full Name" class="form-control" name="full_name" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Address 1" class="form-control" name="address1" value="{{$user->address}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Address 2" class="form-control" name="address2" value="{{$user->address2}}">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" placeholder="City" class="form-control" name="city" value="{{$user->city}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" placeholder="State" class="form-control" name="state" value="{{$user->state}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="number" placeholder="Postal Code" class="form-control" name="postal_code" value="{{$user->zip}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select class="form-select" aria-label="Default select example" name="country_id">
                                                <option selected>Select your Country</option>

                                                @foreach($countries as $country)

                                                <option value="{{$country->id}}" {{($user->country_id == $country->id) ? 'selected' : ''}}>{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="email" placeholder="Email Address" class="form-control" name="email" value="{{$user->email}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="number" placeholder="Phone No" class="form-control" name="phone_no" value="{{$user->phone}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" placeholder="Password" class="form-control" name="login_password">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn">Update</button>
                                    </div>

                            </div>
                            <div class="col-md-3 text-center">
                                <img src="{{($user->photo) ? asset("assets/images/users/".$user->photo) : asset("images/products/avatar.webp") }}" alt="img" class="img-fluid mb-3 v-img mx-auto">
                                <div class="file-input">
                                    <input type="file" name="profile_photo" id="file-input" class="file-input__input" />
                                    <label class="file-input__label" for="file-input">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                        </svg>
                                        <span>Upload file</span></label>
                                </div>

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