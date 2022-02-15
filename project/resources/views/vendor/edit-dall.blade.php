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
                
                    {{-- <div class="ec-vendor-dashboard-card ">
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
                    </div> --}}
                    @if(!empty($products))
                    @foreach($products as $product)
                    <div class="ec-vendor-dashboard-card mt-4">
                        <div class="card-inr">
                        
                                <div class="seller-review">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="v-img" src="{{asset('assets/images/thumbnails/'.$product->thumbnail.'')}}" alt="vendor image">
                                        <p>Reborn Baby</p>
                                        <p>Ready for shipping</p>
                                        <p>{{($product->layaway_available == '1') ? 'Layaway Available' : 'No Layaway'}}</p>
                                        <p>{{($product->neworold == 'new') ? 'Item is new' : 'Item is old'}}</p>
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="text-dark"><a href="{{route('vendor-prod-edit-view',$product->id)}}" class="text-dark">{{$product->name}} </a></h3>
                                        <h5>Price : {{$product->price}} USD</h5>
                                        <h5>Posted : @php
                                            $from = strtotime($product->created_at);
                                            $today = time();
                                            $difference = $today - $from;
                                            echo floor($difference / 86400);
                                        @endphp days Ago</h5>
                                        <p></p>
                                        <form>
                                            <div class="form-group row">
                                                <h6 class="font-weight-bold text-dark col-md-3">Status</h6>
                                                <select class="form-select col-md-6">
                                                <option value="for_adoption" {{($product->itemstatus=='for_adoption') ? 'selected' : ''}}>For Adoption</option>
                                                <option value="adopted" {{($product->itemstatus=='adopted') ? 'selected' : ''}}>Adopted</option>
                                                <option value="nursery_only" {{($product->itemstatus=='nursery_only') ? 'selected' : ''}}>Nursery Only</option>
                                                <option value="hidden" {{($product->itemstatus=='hidden') ? 'selected' : ''}}>Hidden</option>
                                                <option value="reserved" {{($product->itemstatus=='reserved') ? 'selected' : ''}}>Reserved</option>
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
                    @endforeach
                    @else
                    <div>No Products For this Seller</div>
                    @endif
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