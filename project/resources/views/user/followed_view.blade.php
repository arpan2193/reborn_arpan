@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>People I Follow</h2>
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
    <div class="edit-account">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row">
                <div class="col-md-3">

@include('user.sidebar')
</div>

<div class="col-md-9">
<!-- <div class="row recent-product">
    <h4 class="mb-4 text-capitalize">Recent Viewed</h4></div> -->
    <div class="row">
                                <div class="ec-vendor-dashboard-card space-bottom-30">
                                    <div class="ec-vendor-card-header">
                                        <div class="row">
                                            <div class="col-md-9">
                                               
                                                <form class="row g-3">
                                                    <div class="col-auto">
                                                        <a class="btn btn-primary" href="#">People I Follow ({{$ifollow_count}})</a>
                                                    </div>
                                                    <div class="col-auto">
                                                      
                                                      <input type="text" class="form-control" style="height: 31px !important;
                                                      min-height: 0;" >
                                                    </div>
                                                    <div class="col-auto">
                                                      <button type="submit" class="btn btn-primary mb-3">Search</button>
                                                    </div>
                                                  </form>
                                               
                                            </div>
                                            <div class="col-md-3">
                                               <span>Sort By:</span>
                                                <select class="form-select " aria-label="Default select example" style="width: auto;">
                                                    <option selected>Artist Name</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>
                                            </div>
                                            
                                        </div>
                                                
                                           
                                              
                               
                                    </div>
                                    <div class="ec-vendor-card-body">
                                        <div class="ec-vendor-card-table">
                                            <table class="table ec-table align-middle">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Country</th>
                                                        <th scope="col">Last Active	</th>
                                                        <th scope="col">Emails</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                       @foreach($follow as $followed)
                                                        <td>
                                                        <img class="prod-img" src="{{asset('assets/images/users/'.$followed->photo)}}" alt="Vendor image"> 
                                                       </td>
                                                       
                                                        <td><h6 class="m-0">{{$followed->name}}</h6>
                                                        <p class="m-0">{{$followed->shop_name}}</p>
                                                            <?php $id= $followed->vendor_id;
                                                            $i= 0; ?>
                                                                                   
                                                        <p class="text-muted m-0">
                                                          
                                                        @foreach($count as $vl) 
                                                        @if($id == $vl->vendor_id)
                                                          
                                                         {{$vl->vendor_id}}  
                                                       
                                                      followers
                                                       @endif
                                                    
                                                         @endforeach
                                                        
                                                         
                                                       
                                                    
                                                    </p>
                                                        <p class="text-muted m-0">5 items</p>
                                                        </td>
                                                        <td><span>{{$followed->vendor_country}}</span></td>
                                                        <td><span>Yesterday</span></td>
                                                        <td>
                                                            <input type="checkbox" {{$followed->email_subscriber==1?"checked":""}} style="height:auto">
                                                        </td>
                                                        
                                                <td><a href="javascript:void(0)" class="btn btn-danger btn-sm" style="background: red;"
                                                 onclick="unfollow('{{$followed->vendor_id}}')">Unfllow</a></td>
                                                        </tr>
                                                        @endforeach
                                                    
                                                   
                                                   
                                                </tbody>
                                            </table>
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