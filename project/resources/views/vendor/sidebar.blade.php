<?php $user = Auth::user(); ?>
<div class="ec-shop-leftside ec-vendor-sidebar ">
            <div class="ec-sidebar-wrap">
                <!-- Sidebar Category Block -->
                <div class="ec-sidebar-block">
                    <div class="ec-vendor-block">
                        
                        <div class="ec-vendor-block-detail">
                            <img class="v-img" src="{{($user->photo) ? asset("assets/images/users/".$user->photo) : asset("images/products/avatar.webp") }}" alt="Profile">
                            <h5>Seller Name</h5>
                            <a href="edit-profile.html" class="edit-btn">Change Profile Photo</a>
                            <div class="seller">
                                <ul>
                                    <li><a href="{{ route('vendor-review')}}">Review</a></li>
                                    <li><a href="{{ route('vendor-followers')}}">Followers</a></li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="ec-vendor-block-items">
                            <ul>
                                <li><a href="{{ route('vendor-dashboard') }}">Main</a></li>
                                <li><a href="{{ route('vendor-product-edit') }}">Edit Dolls</a></li>
                                <li><a href="{{ route('vendor-prod-add-view')}}">Add Doll/Accessory</a></li>
                                <li><a href="{{ route('vendor-inbox') }}">Inbox</a></li>
                                <li><a href="#">Orders</a></li>
                                <li><a href="{{ route('vendor-renew',)}}">Renew Membership</a></li>
                                <li><a href="{{ route('front.nuserydetails', auth()->id())}}" target="_blank">View Nursery</a></li>
                                <li><a href="{{ route('vendor-myaccount')}}">My Account</a></li>
                                <li><a href="{{ route('vendor-faq')}}">FAQ</a></li>
                                <li><a href="{{ route('user-logout') }}">Logout</a></li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>