@extends('layouts.front')
@section('content')

    <section class="about-text">
        <div class="about-img">
            <img src="{{ asset('assets/front/images/banner-about.jpg') }}" class="img-fluid w-100">
            <h2>Add Doll/Accessory</h2>
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
                <li><a href="{{ route('front.createnursery') }}" class="nursery-btn">Create Your Nursery</a></li>
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
                                                <img class="v-img" src="assets/images/avatar.webp"
                                                    alt="vendor image">
                                                <h5>{{ $user->name }}</h5>
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
                                                    <li><a href="{{ route('vendor-dashboard') }}">Main</a></li>
                                                    <li><a href="{{ route('vendor-product-edit') }}">Edit Dolls</a></li>
                                                    <li><a href="{{ route('vendor-prod-add-view') }}">Add
                                                            Doll/Accessory</a></li>
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
                                    <div class="alert-danger">
                                        <p></p>
                                    </div>
                                    <div class="alert-success">
                                        <p></p>
                                    </div>
                                    <h5>Posting Rules: </h5>
                                    <p class="m-0">Do not post contests or auctions.</p>
                                    <p class="m-0">Do not redirect people to other web sites for more information
                                        on
                                        your items.</p>
                                    <p class="m-0">Do not repost your doll multiple times, or to show the doll as
                                        a
                                        different gender, or in different outfits, or as part of a set unless you mark
                                        it as having been posted before.</p>
                                    <p class="m-0">Do not post pictures of real babies as if they are your reborn
                                        baby.
                                    </p>
                                    <p class="m-0">Do not post sales, discounts or specials.</p>
                                    <p class="m-0">Do not post images with watermarks, logos/branding, text
                                        overlays.
                                    </p>
                                    <p class="m-0">Do not post safety images as your first image.</p>
                                    <p class="m-0">Do not post dolls with sculpts that are knock-offs or that use
                                        stolen
                                        sculpts.</p>
                                    <p>Do not share accounts with other artists or resellers, or post on behalf of
                                        others.</p>

                                    <div class="add-form">
                                        <form class="addproductvendor" action="{{ route('vendor-prod-add') }}">
                                            {{csrf_field()}}
                                            <div class="form-group mb-4">
                                                <h5>Doll or Item Name <span>(Sales or discounts are not allowed. If you
                                                        want to discount your item just lower the price.
                                                        Leave descriptive words out from the name. Save those for the
                                                        Description area.
                                                        Name should be just the doll's name and that's it (e.g.
                                                        "Jennifer", "Brian", "Angel", etc.)</span></h5>

                                                <input type="text" class="form-control mt-2" placeholder="Type Here" name="name">
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>Kit Name <span>(Leave blank if unknown or not applicable)</span>
                                                </h5>

                                                <input type="text" class="form-control mt-2" placeholder="Type Here" name="kit_name">
                                            </div>
                                            <input type="hidden" placeholder="{{ __('Enter Product Sku') }}" name="sku" value="{{ Str::random(3).substr(time(), 6,8).Str::random(3) }}">
                                            <div class="form-group mb-4">
                                                <h5>Sculptor Name <span>(Leave blank if unknown or not
                                                        applicable)</span></h5>

                                                <input type="text" class="form-control mt-2" placeholder="Type Here" name="sculpture_by">
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>Artist(s) Who Painted or Assembled Item <span>(Leave blank if
                                                        unknown or not applicable)</span></h5>

                                                <input type="text" class="form-control mt-2" placeholder="Type Here"
                                                    value="{{ $user->name }}" name="artist">
                                                <input type="hidden" class="form-control mt-2" placeholder="Type Here" value="{{ $user->id }}" name="user_id">
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>Category <span>( Add / Edit Categories)</span></h5>
                                                <select class="form-select " name="category_id">
                                                    {{-- <option>Infants (121)</option> --}}
                                                    <option>Select Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb-4 row">
                                                <h5>Length </h5>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="length">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" id="inlineRadio1" value="inch">
                                                        <label class="form-check-label" for="inlineRadio1">Inches</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" id="inlineRadio2" value="cms">
                                                        <label class="form-check-label"
                                                            for="inlineRadio2">Centimeters</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" id="inlineRadio3" value="feet">
                                                        <label class="form-check-label" for="inlineRadio3">Feet </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" value="meters">
                                                        <label class="form-check-label" for="inlineRadio3">Meters
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" value="n.a">
                                                        <label class="form-check-label" for="inlineRadio3">Not
                                                            Applicable </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4 row">
                                                <h5>Price</h5>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="price">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">USD</label>
                                                    {{-- <select class="form-select ">
                                                        <option>USD</option>
                                                        @foreach ($currencies as $currency)
                                                            <option value={{ $currency->id }}
                                                                <?= //$currency->is_default == 1 ? 'selected' : '' ?>>
                                                                {{ $currency->name }}</option>
                                                        @endforeach
                                                        <option>AUD</option>
                                                        <option>INR</option>
                                                    </select> --}}
                                                </div>

                                            </div>
                                            <div class="form-group mb-4 row">
                                                <h5>Layaway available</h5>
                                                <div class="col-md-6">
                                                    <input type="radio" name="layaway_available"
                                                        class="form-check-input" value="1"><label for=""
                                                        class="form-check-label">Yes</label>
                                                    <input type="radio" name="layaway_available"
                                                        class="form-check-input" value="0" checked><label for=""
                                                        class="form-check-label">No</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="add-form">
                                        <h5>Item type
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_type" id="itemtype1" value="human_baby">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Human baby or toddler (assembled and painted)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_type"
                                                id="itemtype2" value="alternative">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Alternative reborn (clown, yoda, dog, elf, snail, vampire, monster, etc.)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_type"
                                                id="itemtype3" value="doll_kit">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Doll kit, doll part or doll creation (unassembled doll, tutorial, arm, back plate, hair, etc.)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_type"
                                                id="itemtype4" value="accessory">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Accessory or other (pacifier, bracelet, clothing, toy, shoes, etc.)
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="hiderow1">
                                                <div class="row">
                                                    <h5 class="mb-4">Select Alternative Type</h5>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Avatar">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Avatar
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Clown">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Clown
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Dragon">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Dragon
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Ghost">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Ghost
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hedgehog">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Hedgehog
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Monkey">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Monkey/Gorilla/Chimp
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Skeleton">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Skeleton
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Vampire">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Vampire
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Yoda">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Yoda
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Witch">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Witch
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Cat">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Cat
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Dog">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Dog
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Zombie">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Zombie
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Alien">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Alien
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Character">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                TV/Movie/Cartoon Character
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type"
                                                                id="exampleRadios2" value="Elf_fairy">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Elf/Fairy
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Gothic">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Gothic
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hobbit">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Hobbit
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Monster">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Monster
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type"
                                                                id="exampleRadios2" value="Snail">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Snail
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Gargoyle">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Gargoyle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Horror">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Horror
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Mermaid">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Mermaid
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Werewolf">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Werewolf
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bat">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bat
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Devil">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Devil
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Fantasy">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Fantasy
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hafling">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Hafling / Fawna / Minotaur /  Centaur
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Pig">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Pig
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Troll">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Troll/Ogre
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Squid">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Squid
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type"
                                                                id="exampleRadios2" value="option2">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Skunk
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Turtle">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Turtle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Other">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Not Listed/Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="hiderow2">
                                                <div class="row">
                                                    <h5>Select Type</h5>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Doll Kit">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Doll Kit or Part
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Arm">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Arm
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Belly">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Belly or Back Plate
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Leg">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Leg
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bum">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bum
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Eyes">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Eyes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Body">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Body
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hair">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Hair
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Head">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Head
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Tutorial">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Tutorial
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Other">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Miscellaneous or Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="hiderow3">
                                                <div class="row">
                                                    <h5>Select Accessory Type</h5>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Pacifier">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Pacifier
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Jewelry">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bracelet or Jewelry
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Rattle">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Rattle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Booties">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Booties
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Clothing">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Clothing
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Shoes">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Shoes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bottle">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bottle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Diapers">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Diapers or Swaddlers
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bib">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Bib
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hat">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Bonnet or Hat
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Blanket">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Quilt or Blanket
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Toy">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Toy
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bundle">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Box or Bundle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Headband">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Headband or Clip
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Other">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Miscellaneous or Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-form">
                                        <h5>Made or Custom</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="madeornot" value="made" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Item is made and ready to be shipped
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="madeornot"
                                                id="exampleRadios2" value="notmade">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Item is custom or not yet ready to be shipped - I want to take a
                                                pre-order or will customize the item
                                            </label>
                                        </div>
                                    </div>
                                    <div class="add-form">
                                        <h5>New or Pre-Loved
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="neworold" value="new">
                                            <label class="form-check-label" for="exampleRadios1">
                                                New - I'm the original artist or seller
                                                
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="neworold" value="pre-loved">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Pre-Loved - I'm not the original artist or seller
                                                
                                            </label>
                                        </div>

                                    </div>
                                    <div class="add-form hiderow4">
                                        <h5>Reborned or Factory Painted
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reborned" value="reborned">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Doll is fully reborned
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reborned" value="partially-reborned">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Doll is factory painted and/or partially reborned (Kinby, Ashton Drake, Paradise Gallery, Berenguer, etc.) - Will only appear in your nursery by default
                                            </label>
                                        </div>

                                    </div>
                                    <div class="add-form">
                                        <h5>Posted Before
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="postedbefore"
                                                id="exampleRadios1" value="never posted">
                                            <label class="form-check-label" for="exampleRadios1">
                                                I've never posted this item on Reborns.com before
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="postedbefore"
                                                id="exampleRadios2" value="posted before">
                                            <label class="form-check-label" for="exampleRadios2">
                                                I've posted this item before - Includes items that have been on the front page, adoptions that fell through, changes you have made.
                                            </label>
                                        </div>

                                    </div>
                                    <div class="add-form">
                                        <h5>Item Status
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="for_adoption">
                                            <label class="form-check-label" for="exampleRadios1">
                                                For Adoption - Nursery + Main Pages
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="nursery_only">
                                            <label class="form-check-label" for="exampleRadios1">
                                                For Adoption - Nursery Only
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="adopted">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Adopted - will show as adopted and also appear in the Adopted section.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="reserved">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Reserved - will show as Reserved and won't be able to be ordered by the public unless you give someone the Secret Buying URL.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="hidden">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Hidden / Draft - only you can see this unless you give someone the Secret Buying URL.
                                            </label>
                                        </div>
                                        {{-- <div class="subitemtype"></div> --}}
                                    </div>
                                    <div class="add-form">
                                        <h5>After Adopted
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="afteradopted" value="Show adopted price to everyone">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Show adopted price to everyone 
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="afteradopted" value="Show adopted price only to paid Reborn sellers">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Show adopted price only to paid Reborn sellers 
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="afteradopted" value="Don't show adopted price" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Don't show adopted price 
                                            </label>
                                        </div>
                                        {{-- <div class="subitemtype"></div> --}}
                                    </div>
                                    <div class="add-form">
                                        <h6>Would you be willing to make another baby just like this one if someone commissioned you (i.e., will you make a custom baby)?
                                        </h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="makecustombaby" value="Yes">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="makecustombaby" value="No" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                No
                                            </label>
                                        </div>
                                        {{-- <div class="subitemtype"></div> --}}
                                    </div>
                                    <div class="add-form">
                                        <h5>Description </h5>
                                        <p>Do not advertise for your web site below. Please only describe your reborn
                                            and/or tell it's story.</p>
                                        <textarea name="description"></textarea>
                                        <h5>Keywords </h5>
                                        <p>Enter 0-30 keywords to make it easier to find your item in searches and
                                            on social media. Separate each keyword with a comma.
                                            We will convert your keywords into hashtags when we post your item on
                                            Instagram and Twitter. Example: Reborn Doll → #RebornDoll.</p>
                                        <div class="form-group mb-4">
                                            <input type="text" class="form-control" name="keywords">
                                        </div>
                                    </div>
                                    <div class="add-form">
                                        <p>Select options below to maximize your doll coming up in searches. Leave
                                            blank if not applicable.</p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Head Material:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="head_material"
                                                        id="inlineRadio1" value="vinyl">
                                                    <label class="form-check-label" for="inlineRadio1">Vinyl</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="head_material"
                                                        id="inlineRadio2" value="silicone">
                                                    <label class="form-check-label" for="inlineRadio2">Silicone</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="head_material"
                                                        id="inlineRadio3" value="n.a">
                                                    <label class="form-check-label" for="inlineRadio3">Other/Not Applicable</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Body Material:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="body_material"
                                                        id="inlineRadio1" value="vinyl">
                                                    <label class="form-check-label" for="inlineRadio1">Vinyl</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="body_material"
                                                        id="inlineRadio2" value="silicone">
                                                    <label class="form-check-label" for="inlineRadio2">Silicone</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="body_material"
                                                        id="inlineRadio3" value="cloth">
                                                    <label class="form-check-label" for="inlineRadio3">Cloth</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="body_material"
                                                        id="inlineRadio3" value="n.a">
                                                    <label class="form-check-label" for="inlineRadio3">Other/Not Applicable</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Limb Material:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="limb_material"
                                                        id="inlineRadio1" value="vinyl">
                                                    <label class="form-check-label" for="inlineRadio1">Vinyl</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="limb_material"
                                                        id="inlineRadio2" value="silicone">
                                                    <label class="form-check-label" for="inlineRadio2">Silicone</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="limb_material"
                                                        id="inlineRadio3" value="cloth">
                                                    <label class="form-check-label" for="inlineRadio3">Cloth</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="limb_material"
                                                        id="inlineRadio4" value="n.a">
                                                    <label class="form-check-label" for="inlineRadio3">Other/Not Applicable</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Age:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age"
                                                        id="inlineRadio1" value="mini">
                                                    <label class="form-check-label" for="inlineRadio1">Mini</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age"
                                                        id="inlineRadio2" value="preemie">
                                                    <label class="form-check-label" for="inlineRadio2">Preemie</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age"
                                                        id="inlineRadio3" value="newborn">
                                                    <label class="form-check-label" for="inlineRadio3">Newborn</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age"
                                                        id="inlineRadio4" value="older_baby">
                                                    <label class="form-check-label" for="inlineRadio3">Older Baby</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age"
                                                        id="inlineRadio4" value="toddler">
                                                    <label class="form-check-label" for="inlineRadio3">Toddler</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Gender:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio1" value="boy">
                                                    <label class="form-check-label" for="inlineRadio1">Boy</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio2" value="girl">
                                                    <label class="form-check-label" for="inlineRadio2">Girl</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio3" value="yourchoice">
                                                    <label class="form-check-label" for="inlineRadio3">Your Choice</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Torso/Plates:</h6>
                                                <span>Select Up to Two:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Full Front Plate - Boy" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Full Front Plate - Boy
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Full Front Plate - Girl" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Front Plate - Girl
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Full Front Plate - Non Gendered" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Front Plate - Non Gendered
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Full Back Plate (with baby butt)" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Back Plate (with baby butt)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Belly Plate [no chest or genitals]" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Belly Plate [no chest or genitals]
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Full Vinyl Torso - Girl" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Vinyl Torso - Girl
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Full Vinyl Torso - Boy" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Vinyl Torso - Boy
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Half Upper Vinyl Torso - Non Gendered" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Half Upper Vinyl Torso - Non Gendered
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Half Lower Vinyl Torso - Girl" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Half Lower Vinyl Torso - Girl
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Half Lower Vinyl Torso - Boy" name="torso[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Half Lower Vinyl Torso - Boy
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Arms:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="arms"
                                                        id="inlineRadio1" value="Full Length">
                                                    <label class="form-check-label" for="inlineRadio1">Full Length</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="arms"
                                                        id="inlineRadio2" value="3/4 Length">
                                                    <label class="form-check-label" for="inlineRadio2">3/4 Length</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="arms"
                                                        id="inlineRadio3" value="1/4 Length">
                                                    <label class="form-check-label" for="inlineRadio3">1/4 Length	</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Legs:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="legs"
                                                        id="inlineRadio1" value="Full Length">
                                                    <label class="form-check-label" for="inlineRadio1">Full Length</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="legs"
                                                        id="inlineRadio2" value="3/4 Length">
                                                    <label class="form-check-label" for="inlineRadio2">3/4 Length</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="legs"
                                                        id="inlineRadio3" value="1/4 Length">
                                                    <label class="form-check-label" for="inlineRadio3">1/4 Length	</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>COA:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="certificate_of_auth_coa" value="yes">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="certificate_of_auth_coa" value="no">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="certificate_of_auth_coa" value="n.a">
                                                    <label class="form-check-label" for="inlineRadio3">Not Applicable</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Edition:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edition" value="Open Edition">
                                                    <label class="form-check-label" for="inlineRadio1">Open Edition</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edition" value="Limited Edition">
                                                    <label class="form-check-label" for="inlineRadio2">Limited Edition (LE)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edition" value="Sold Out Limited Edition">
                                                    <label class="form-check-label" for="inlineRadio3">Sold Out Limited Edition (SOLE)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edition" value="Unknown Edition">
                                                    <label class="form-check-label" for="inlineRadio3">Unknown Edition</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Eyes:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eyes" value="Awake">
                                                    <label class="form-check-label" for="inlineRadio1">Awake</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eyes" value="Asleep">
                                                    <label class="form-check-label" for="inlineRadio2">Asleep</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Lashes:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lashes" value="Rooted Lashes">
                                                    <label class="form-check-label" for="inlineRadio1">Rooted Lashes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lashes" value="Applied Lashes (glued)">
                                                    <label class="form-check-label" for="inlineRadio2">Applied Lashes (glued)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lashes" value="Painted Lashes">
                                                    <label class="form-check-label" for="inlineRadio2">Painted Lashes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lashes" value="No Lashes">
                                                    <label class="form-check-label" for="inlineRadio2">No Lashes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Hair:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="Painted">
                                                    <label class="form-check-label" for="inlineRadio1">Painted</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="Bald">
                                                    <label class="form-check-label" for="inlineRadio2">Bald</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="Wig">
                                                    <label class="form-check-label" for="inlineRadio2">Wig</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="Rooted">
                                                    <label class="form-check-label" for="inlineRadio2">Rooted</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="Painted & Rooted (Combi)">
                                                    <label class="form-check-label" for="inlineRadio2">Painted & Rooted (Combi)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Paint:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paint" value="Genesis Heat Set Paint">
                                                    <label class="form-check-label" for="inlineRadio1">Genesis Heat Set Paint (GHSP)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paint" value="Air Dry Paint">
                                                    <label class="form-check-label" for="inlineRadio2">Air Dry Paint</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paint" value="Other Paint Type">
                                                    <label class="form-check-label" for="inlineRadio2">Other Paint Type</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Weighting:</h6>
                                                <span>Select Up to Three (3):</span>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Fine Glass Beads" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Fine Glass Beads
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Sand Blasted Glass" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Sand Blasted Glass
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Polyfil" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Polyfil
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Luxury Fiberfill" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Luxury Fiberfill
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Silicone Baby Fat Inserts" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Silicone Baby Fat Inserts
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Silicone Baby Fat Pellets" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Silicone Baby Fat Pellets
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Poly-Pellets" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Poly-Pellets
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Steel Shots/BBs" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Steel Shots/BBs
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Sand" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Sand
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Other Weighting Material" name="weighting[]">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Other Weighting Material
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Skin:</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Caramel" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Caramel
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Mottled" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Mottled
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Strawberries & Cream" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Strawberries & Cream
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Dark" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Dark
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Olive" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Olive
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Tan" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Tan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Fair" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Fair
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Peaches & Cream" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Peaches & Cream
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Other Complexion" name="skin_color">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Other Complexion
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Race:</h6>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Aboriginal" name="race">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Aboriginal
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Black/African American" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Black / African American
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Hispanic/Latino" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Hispanic / Latino
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Asian/Pacific Islander" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Asian / Pacific Islander
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="	Fantasy/Make Believe" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Fantasy / Make Believe
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Other Race" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Other Race
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Biracial/Multiracial" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Biracial / Multiracial
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="White/Caucasian" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        White / Caucasian
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Middle Eastern/Indian	" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Middle Eastern / Indian	
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Native American Indian" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Native American Indian
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Animal" name="race">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Animal
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Twin:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="twin" value="Not a Twin">
                                                    <label class="form-check-label" for="inlineRadio1">Not a Twin</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="twin" value="Twins, Will Sell Separately">
                                                    <label class="form-check-label" for="inlineRadio2">Twins, Will Sell Separately</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="twin" value="Twins, Will Not Sell Separately">
                                                    <label class="form-check-label" for="inlineRadio2">Twins, Will Not Sell Separately</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Realborn:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="realborn" value="yes">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="realborn" value="no">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Pacifier Type:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier_type" value="Regular Pacifier">
                                                    <label class="form-check-label" for="inlineRadio1">Regular Pacifier</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier_type" value="Magnetic Pacifier">
                                                    <label class="form-check-label" for="inlineRadio2">Magnetic Pacifier</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier_type" value="Modified Pacifier">
                                                    <label class="form-check-label" for="inlineRadio2">Modified Pacifier</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier_type" value="Can't Take a Pacifier">
                                                    <label class="form-check-label" for="inlineRadio2">Can't Take a Pacifier</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Pacifier:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier" value="Included">
                                                    <label class="form-check-label" for="inlineRadio1">Included</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier" value="Not Included">
                                                    <label class="form-check-label" for="inlineRadio2">Not Included</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Boo Boo:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="booboo" value="yes">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="booboo" value="no">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Drink and Wet:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="drink_wet" value="yes">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="drink_wet" value="no">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h6>Smoke Free Environment:</h6>

                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="smoke_free_env" value="yes">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="smoke_free_env" value="no">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h6>Pet Free Environment:</h6>

                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pet_free_env" value="yes">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pet_free_env" value="no">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-form">
                                        <h5>Shipping Costs</h5>
                                        <p>Your last entered shipping information has been pre-loaded into the fields
                                            below. Edit as needed.</p>
                                        <h6 class="text-danger">
                                            You must enter a shipping value(s) in this section if you wish to take
                                            instant PayPal Instant Payments</h6>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <h6>Shipping Destination</h6>
                                                <p>You may add or remove from the list below.</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h6>Postage Fee</h6>
                                                <p>Only filled fields
                                                    will be used.
                                                    Enter 0 for
                                                    Free Postage.</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h6>Shipping Notes</h6>
                                                <p>Does it include insurance and/or tracking?
                                                    What kind of shipping / estimated ship time?</p>
                                            </div>
                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <p>Worldwide Shipping</p>
                                                <input type="hidden" name="shipping_charges[country_name][]" value="world_wide">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]">
                                                </div>
                                            </div>

                                        </div>
                                        <h6>or</h6>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-5">
                                                <h6>Pet Free Environment:</h6>

                                            </div> --}}
                                            <div class="col-md-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="shipping_condn" value="only_allow" checked>
                                                    <label class="form-check-label" for="inlineRadio1">Only allow orders from locations where you have explicitly listed shipping costs. People from other locations will be told you don't ship to their location.</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="shipping_condn" value="allow_all">
                                                    <label class="form-check-label" for="inlineRadio2">Allow orders from locations where you haven't explicitly listed shipping costs. Buyers will be told you will contact them with shipping costs.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-form">
                                        <h5>Feature Image</h5>
                                        <p class="m-0">• Post a picture which will be shown on the site.
                                            any size JPG or PNG file.</p>
                                        <div class="mt-4">
                                            <input type="file" class="form-control" name="photo" accept="image/jpeg,image/png">
                                        </div>
                                    </div>
                                    <div class="add-form">
                                        <h5>Pictures</h5>
                                        <p class="m-0">• Post up to 20 pictures with your listing. Our system
                                            accepts
                                            any size JPG or PNG file.</p>
                                        <p class="m-0">• Do not post safety images as your first image.</p>
                                        <p class="m-0">• Do not post pictures of real babies as if they are the
                                            reborn
                                            baby you are selling.</p>
                                        <p class="">• Only use other peoples pictures if you have been given
                                            expressed
                                            (not assumed) permission.</p>
                                        <h5>Problems adding pictures?</h5>
                                        <p class="m-0">• Try clearing your browser cache. Google "how to clear
                                            browser
                                            cache Chrome/Firefox/Edge" for how.</p>
                                        <p class="m-0">• Try uploading only a few images at at time, then edit
                                            the
                                            listing and add more images.</p>
                                        <p class="m-0">• If the file size of your images are large, try reducing
                                            the
                                            file size to be a .JPG less than 1MB in size.</p>
                                        <p>• Try uploading from a different browser or machine/device.</p>

                                        <h6 class="text-danger">Do not upload watermarked, logo/branded, or images with
                                            text on them. They will be removed.</h6>
                                        <div class="mt-4">
                                            <input type="file" id="uploadgallery" class="form-control" name="gallery[]" accept="image/jpeg,image/png" multiple>
                                            <div class="gallery-images">
                                                <div class="selected-image">
                                                    <div class="row">
                            
                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-form">
                                        <h5 class="mb-4">Global Information on All Your Listings </h5>
                                        <h6>Return & Refund Policy </h6>
                                        <textarea placeholder="No Return" class="mb-4 form-control" name="return_policy"></textarea>
                                        <h6>General Ordering Information</h6>
                                        <textarea class="form-control" name="ordering_information"
                                            placeholder="I take pictures in all kinds of lighting and take closeups so you can see exactly what you are getting. If you have questions, ask before purchasing as I do not accept returns and will not do exchanges. Baby will be carefully packed, dated and timed photos  will be taken of each box packing to insure there are no questions about what was packed. 

                                                    Reborn dolls are not toys, but are collectable pieces of art. They are made with the adult collector in mind and will not hold up to rough playing like store bought dolls. The paint is permanent, and the doll is sealed with the best varnish that money can buy, but still can be worn away with improper care. If you intend to gift to a child, think about this and be prepared to teach them how to care for the doll as I do not accept returns and will not be responsible for any damage that occurs from rough treatment. 
                                                    
                                                    Reborn dolls are hand painted one by one. What makes them unique and different from factory dolls is their little imperfections.  If they are unintentional and anything major, they will be mentioned and the price will reflect this. 
                                                    
                                                    **Make sure your registered PayPal address is correct because this is where your baby will be shipped. All dolls are shipped with a signature confirmation. "
                                            class="mb-4"></textarea>
                                    </div>
                                    <div class="add-form">
                                        <h5>My Private Notes: </h5>
                                        <textarea class="form-control" name="private_notes"></textarea>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input p-0" type="checkbox" value="1" id="flexCheckDefault" name="email_to_subscriber" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Email your subscribers to announce your new listing -- Will go out to 261 of
                                            your 261 followers.
                                            (Applies only to items that are for adoption, made, and have never been
                                            posted before)
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn edit-btn" style="height: 60px;">Submit</button>
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


@endsection
