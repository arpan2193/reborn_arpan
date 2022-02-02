<?php $user = Auth::user(); ?>

<div class="ec-shop-leftside ec-vendor-sidebar ">
    <div class="ec-sidebar-wrap">
        <!-- Sidebar Category Block -->
        <div class="ec-sidebar-block">
            <div class="ec-vendor-block">

                <div class="ec-vendor-block-detail">
                    <img class="v-img" src="{{($user->photo) ? asset("assets/images/users/".$user->photo) : asset("images/products/avatar.webp") }}" alt="vendor image">
                    <h5>{{$user->name}}</h5>
                    <a href="{{ route('user-profile-edit') }}" class="edit-btn">Edit Profile</a>
                </div>
                <div class="ec-vendor-block-items">
                    <ul>
                        <li><a href="#">Favorites</a></li>
                        <li><a href="#">Recent Viewed</a></li>
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Orders</a></li>
                        <li><a href="#">Items by People I Follow</a></li>
                        <li><a href="#">People I Follow</a></li>
                        <li><a href="{{ route('user-logout') }}">Logout</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>