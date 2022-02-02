@extends('layouts.front')
@section('content')
<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>Edit dolls</h2>
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

<!-- --------------------edit account------------- -->

<div class="edit-account">
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="row">
            
            <div class="col-md-3">
                <div class="ec-shop-leftside ec-vendor-sidebar ">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="assets/images/avatar.webp" alt="vendor image">
                                    <h5>Seller Name</h5>
                                    <a href="edit-profile.html" class="edit-btn">Change Profile Photo</a>
                                    <div class="seller">
                                        <ul>
                                            <li><a href="seller-review.html">Review</a></li>
                                            <li><a href="#">Followers</a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a href="#">Main</a></li>
                                        <li><a href="#">Edit Dolls</a></li>
                                        <li><a href="#">Add Doll/Accessory</a></li>
                                        <li><a href="#">Inbox</a></li>
                                        <li><a href="#">Orders</a></li>
                                        <li><a href="#">Renew Membership</a></li>
                                        <li><a href="#">View Nursery</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9">
                
                    <div class="ec-vendor-dashboard-card ">
                        <div class="card-inr">
                        
                                <div class="seller-review">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="v-img" src="assets/images/avatar.webp" alt="vendor image">
                                        <p>Reborn Baby
                                        Ready for shipping
                                        No Layaway
                                        Item is New</p>
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="text-dark"><a href="#" class="text-dark">Delilah </a></h3>
                                        <h5>Price : 525 USD</h5>
                                        <h5>Posted : 16 days Ago</h5>
                                        <p></p>
                                        <form>
                                            <div class="form-group row">
                                                <h6 class="font-weight-bold text-dark col-md-3">Status</h6>
                                                <select class="form-select col-md-6">
                                                <option>For Adoption</option>
                                                <option>Adopted</option>
                                                <option>Nursery Only</option>
                                                <option>Hidden</option>
                                                <option>Reserved</option>
                                                </select>
                                                <div class="col md-3"></div>
                                            </div>
                                        </form>
                                        <div class="row mt-4">
                                            <div class="col-md-3">
                                            <h6 class="font-weight-bold text-dark col-md-3">Engagement</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="m-0">16,153 impressions (~1,009/day)</p>
                                                <p class="m-0"> 957 image slides (~59.8/day)</p>
                                                <p class="m-0">368 clicks (~23/day)</p>
                                                <p class="m-0">23 favorited</p>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        <div class="row mt-4">
                                        <div class="col-md-3">
                                            <h6 class="font-weight-bold text-dark col-md-3">Order</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="">
                                                <div class="form-group">
                                                    <input type="text" value="1" class="form-control" style="height:30px;">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="Btn btn-danger btn-lg" style="background: red;">DELETE</button>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="ec-vendor-dashboard-card mt-4">
                        <div class="card-inr">
                        
                                <div class="seller-review">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="v-img" src="assets/images/avatar.webp" alt="vendor image">
                                        <p>Reborn Baby
                                        Ready for shipping
                                        Layaway Available
                                        Item is New</p>
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="text-dark"><a href="#" class="text-dark">Esmee </a></h3>
                                        <h5>Price : 425 USD</h5>
                                        <h5>Posted : 36 days Ago</h5>
                                        <p></p>
                                        <form>
                                            <div class="form-group row">
                                                <h6 class="font-weight-bold text-dark col-md-3">Status</h6>
                                                <select class="form-select col-md-6">
                                                <option>For Adoption</option>
                                                <option>Adopted</option>
                                                <option>Nursery Only</option>
                                                <option>Hidden</option>
                                                <option>Reserved</option>
                                                </select>
                                                <div class="col md-3"></div>
                                            </div>
                                        </form>
                                        <div class="row mt-4">
                                            <div class="col-md-3">
                                            <h6 class="font-weight-bold text-dark col-md-3">Engagement</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="m-0">16,153 impressions (~1,009/day)</p>
                                                <p class="m-0"> 957 image slides (~59.8/day)</p>
                                                <p class="m-0">368 clicks (~23/day)</p>
                                                <p class="m-0">23 favorited</p>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        <div class="row mt-4">
                                        <div class="col-md-3">
                                            <h6 class="font-weight-bold text-dark col-md-3">Order</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="">
                                                <div class="form-group">
                                                    <input type="text" value="2" class="form-control" style="height:30px;">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="Btn btn-danger btn-lg" style="background: red;">DELETE</button>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn edit-btn" style="height: 60px;">Set Order</button>
                    </div>
            </div>
            
            </div>
        
        </div>
        
    </div>
</div>
</div>
@endsection