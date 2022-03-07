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
                            @include('vendor.sidebar')
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
                                        <form class="addproductvendor" action="{{ route('vendor-prod-update',$product->id) }}">
                                            {{csrf_field()}}
                                            <div class="form-group mb-4">
                                                <h5>Doll or Item Name <span>(Sales or discounts are not allowed. If you
                                                        want to discount your item just lower the price.
                                                        Leave descriptive words out from the name. Save those for the
                                                        Description area.
                                                        Name should be just the doll's name and that's it (e.g.
                                                        "Jennifer", "Brian", "Angel", etc.)</span></h5>

                                                <input type="text" class="form-control mt-2" placeholder="{{ __('Type Here')}}" name="name" value="{{$product->name}}">
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>Kit Name <span>(Leave blank if unknown or not applicable)</span>
                                                </h5>

                                                <input type="text" class="form-control mt-2" placeholder="{{ __('Type Here')}}" name="kit_name" value="{{$product->kit_name}}">
                                            </div>
                                            <input type="hidden" placeholder="{{ __('Enter Product Sku') }}" name="sku" value="{{$product->sku}}">
                                            <div class="form-group mb-4">
                                                <h5>Sculptor Name <span>(Leave blank if unknown or not
                                                        applicable)</span></h5>

                                                <input type="text" class="form-control mt-2" placeholder="{{ __('Type Here')}}" name="sculpture_by" value="{{$product->sculpture_by}}">
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
                                                    <option value="{{$category->id}}" {{($category->id == $product->category_id) ? "selected" : ""}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb-4 row">
                                                <h5>Length </h5>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="length" value="{{$product->length}}">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" id="inlineRadio1" value="inch" {{($product->length_unit == "inch") ? "checked" : ""}}>
                                                        <label class="form-check-label" for="inlineRadio1">Inches</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" id="inlineRadio2" value="cms" {{($product->length_unit == "cms") ? "checked" : ""}}>
                                                        <label class="form-check-label"
                                                            for="inlineRadio2">Centimeters</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" id="inlineRadio3" value="feet" {{($product->length_unit == "feet") ? "checked" : ""}}>
                                                        <label class="form-check-label" for="inlineRadio3">Feet </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" value="meters" {{($product->length_unit == "meters") ? "checked" : ""}}>
                                                        <label class="form-check-label" for="inlineRadio3">Meters
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="length_unit" value="n.a" {{($product->length_unit == "n.a") ? "checked" : ""}}>
                                                        <label class="form-check-label" for="inlineRadio3">Not
                                                            Applicable </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4 row">
                                                <h5>Price</h5>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
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
                                                        class="form-check-label" {{($product->layaway_available == "1") ? "checked" : ""}}>Yes</label>
                                                    <input type="radio" name="layaway_available"
                                                        class="form-check-input" value="0" checked><label for=""
                                                        class="form-check-label" {{($product->layaway_available == "0") ? "checked" : ""}}>No</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="add-form">
                                        <h5>Item type
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_type" id="itemtype1" value="human_baby" {{($product->item_type == "human_baby") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Human baby or toddler (assembled and painted)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_type"
                                                id="itemtype2" value="alternative" {{($product->item_type == "alternative") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Alternative reborn (clown, yoda, dog, elf, snail, vampire, monster, etc.)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_type"
                                                id="itemtype3" value="doll_kit" {{($product->item_type == "doll_kit") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Doll kit, doll part or doll creation (unassembled doll, tutorial, arm, back plate, hair, etc.)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_type"
                                                id="itemtype4" value="accessory" {{($product->item_type == "accessory") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios2">
                                                Accessory or other (pacifier, bracelet, clothing, toy, shoes, etc.)
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="hiderow1 {{($product->item_type == "alternative") ? "show" : ""}}">
                                                <div class="row">
                                                    <h5 class="mb-4">Select Alternative Type</h5>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Avatar" {{($product->sub_item_type == "Avatar") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Avatar
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Clown" {{($product->sub_item_type == "Clown") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Clown
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Dragon" {{($product->sub_item_type == "Dragon") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Dragon
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Ghost" {{($product->sub_item_type == "Ghost") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Ghost
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hedgehog" {{($product->sub_item_type == "Hedgehog") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Hedgehog
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Monkey" {{($product->sub_item_type == "Clown") ? "show" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Monkey/Gorilla/Chimp
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Skeleton" {{($product->sub_item_type == "Skeleton") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Skeleton
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Vampire" {{($product->sub_item_type == "Vampire") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Vampire
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Yoda" {{($product->sub_item_type == "Yoda") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Yoda
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Witch" {{($product->sub_item_type == "Clown") ? "show" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Witch
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Cat" {{($product->sub_item_type == "Cat") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Cat
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Dog" {{($product->sub_item_type == "Dog") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Dog
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Zombie" {{($product->sub_item_type == "Zombie") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Zombie
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Alien" {{($product->sub_item_type == "Clown") ? "show" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Alien
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Character" {{($product->sub_item_type == "Character") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                TV/Movie/Cartoon Character
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Elf_fairy" {{($product->sub_item_type == "Elf_fairy") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Elf/Fairy
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Gothic" {{($product->sub_item_type == "Gothic") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Gothic
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hobbit" {{($product->sub_item_type == "Hobbit") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Hobbit
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Monster" {{($product->sub_item_type == "Clown") ? "show" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Monster
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type"
                                                                id="exampleRadios2" value="Snail" {{($product->sub_item_type == "Snail") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Snail
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Gargoyle" {{($product->sub_item_type == "Gargoyle") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Gargoyle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Horror" {{($product->sub_item_type == "Horror") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Horror
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Mermaid" {{($product->sub_item_type == "Mermaid") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Mermaid
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Werewolf" {{($product->sub_item_type == "Werewolf") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Werewolf
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bat" {{($product->sub_item_type == "Bat") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bat
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Devil" {{($product->sub_item_type == "Devil") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Devil
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Fantasy" {{($product->sub_item_type == "Fantasy") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Fantasy
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hafling" {{($product->sub_item_type == "Hafling") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Hafling / Fawna / Minotaur /  Centaur
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Pig" {{($product->sub_item_type == "Pig") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Pig
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Troll" {{($product->sub_item_type == "Troll") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Troll/Ogre
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Squid" {{($product->sub_item_type == "Squid") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Squid
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Skunk" {{($product->sub_item_type == "Skunk") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Skunk
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Turtle" {{($product->sub_item_type == "Turtle") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Turtle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Other" {{($product->sub_item_type == "Other") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Not Listed/Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="hiderow2 {{($product->item_type == "doll_kit") ? "show" : ""}}">
                                                <div class="row">
                                                    <h5>Select Type</h5>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Doll_Kit" {{($product->sub_item_type == "Doll_Kit") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Doll Kit or Part
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Arm" {{($product->sub_item_type == "Arm") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Arm
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Belly" {{($product->sub_item_type == "Belly") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Belly or Back Plate
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Leg" {{($product->sub_item_type == "Leg") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Leg
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bum" {{($product->sub_item_type == "Bum") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bum
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Eyes" {{($product->sub_item_type == "Eyes") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Eyes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Body" {{($product->sub_item_type == "Body") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Body
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hair" {{($product->sub_item_type == "Hair") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Hair
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Head" {{($product->sub_item_type == "Head") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Head
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Tutorial" {{($product->sub_item_type == "Tutorial") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Tutorial
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Other" {{($product->sub_item_type == "Other") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Miscellaneous or Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="hiderow3 {{($product->item_type == "accessory") ? "show" : ""}}">
                                                <div class="row">
                                                    <h5>Select Accessory Type</h5>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Pacifier" {{($product->sub_item_type == "Pacifier") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Pacifier
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Jewelry" {{($product->sub_item_type == "accessory") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bracelet or Jewelry
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Rattle" {{($product->sub_item_type == "accessory") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Rattle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Booties" {{($product->sub_item_type == "Booties") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Booties
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Clothing" {{($product->sub_item_type == "Clothing") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Clothing
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Shoes" {{($product->sub_item_type == "Shoes") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Shoes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bottle" {{($product->sub_item_type == "Bottle") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bottle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Diapers" {{($product->sub_item_type == "Diapers") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Diapers or Swaddlers
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bib" {{($product->sub_item_type == "Bib") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Bib
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Hat" {{($product->sub_item_type == "Hat") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Bonnet or Hat
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Blanket" {{($product->sub_item_type == "Blanket") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Quilt or Blanket
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Toy" {{($product->sub_item_type == "Toy") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Toy
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Bundle" {{($product->sub_item_type == "Bundle") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Box or Bundle
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Headband" {{($product->sub_item_type == "Headband") ? "checked" : ""}}>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Headband or Clip
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="sub_item_type" value="Other" {{($product->sub_item_type == "Other") ? "checked" : ""}}>
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
                                            <input class="form-check-input" type="radio" name="madeornot" value="made" {{($product->madeornot == "made") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Item is made and ready to be shipped
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="madeornot" value="notmade" {{($product->madeornot == "notmade") ? "checked" : ""}}>
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
                                            <input class="form-check-input" type="radio" name="neworold" value="new" {{($product->neworold == "new") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                New - I'm the original artist or seller
                                                
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="neworold" value="pre-loved" {{($product->neworold == "pre-loved") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios2">
                                                Pre-Loved - I'm not the original artist or seller
                                                
                                            </label>
                                        </div>

                                    </div>
                                    <div class="add-form hiderow4 {{( $product->item_type == "alternative" || $product->item_type == 'human_baby' ) ? 'show': ''}}">
                                        <h5>Reborned or Factory Painted
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reborned" value="reborned" {{($product->reborned == "reborned") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Doll is fully reborned
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reborned" value="partially-reborned" {{($product->reborned == "partially-reborned") ? "checked" : ""}}>
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
                                                id="exampleRadios1" value="never_posted" {{($product->postedbefore == "never_posted") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                I've never posted this item on Reborns.com before
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="postedbefore"
                                                id="exampleRadios2" value="posted_before" {{($product->postedbefore == "posted_before") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios2">
                                                I've posted this item before - Includes items that have been on the front page, adoptions that fell through, changes you have made.
                                            </label>
                                        </div>

                                    </div>
                                    <div class="add-form">
                                        <h5>Item Status
                                        </h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="for_adoption" {{($product->itemstatus == "for_adoption") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                For Adoption - Nursery + Main Pages
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="nursery_only" {{($product->itemstatus == "nursery_only") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                For Adoption - Nursery Only
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="adopted" {{($product->itemstatus == "adopted") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Adopted - will show as adopted and also appear in the Adopted section.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="reserved" {{($product->itemstatus == "reserved") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios2">
                                                Reserved - will show as Reserved and won't be able to be ordered by the public unless you give someone the Secret Buying URL.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="itemstatus" value="hidden" {{($product->itemstatus == "hidden") ? "checked" : ""}}>
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
                                            <input class="form-check-input" type="radio" name="afteradopted" value="show_price_all" {{($product->afteradopted == "show_price_all") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Show adopted price to everyone 
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="afteradopted" value="show_price_only" {{($product->afteradopted == "show_price_only") ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Show adopted price only to paid Reborn sellers 
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="afteradopted" value="dont_show" {{($product->afteradopted == "dont_show") ? "checked" : ""}}>
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
                                            <input class="form-check-input" type="radio" name="makecustombaby" value="1" {{$product->makecustombaby == '1' ? "checked" : ""}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="makecustombaby" value="0" {{$product->makecustombaby == '0' ? "checked" : ""}}>
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
                                        <textarea name="description">{{$product->description}}</textarea>
                                        <h5>Keywords </h5>
                                        <p>Enter 0-30 keywords to make it easier to find your item in searches and
                                            on social media. Separate each keyword with a comma.
                                            We will convert your keywords into hashtags when we post your item on
                                            Instagram and Twitter. Example: Reborn Doll → #RebornDoll.</p>
                                        <div class="form-group mb-4">
                                            <input type="text" class="form-control" name="keywords" value={{$product->keywords}}>
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
                                                    <input class="form-check-input" type="radio" name="head_material" value="vinyl" {{($product->head_material == 'vinyl') ? 'checked' : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Vinyl</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="head_material" value="silicone" {{($product->head_material == 'silicone') ? 'checked' : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Silicone</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="head_material" value="other">
                                                    <label class="form-check-label" for="inlineRadio3" {{($product->head_material == 'other') ? 'checked' : ""}}>Other/Not Applicable</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h6>Body Material:</h6>

                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="body_material" value="vinyl" {{($product->body_material == 'vinyl') ? 'checked' : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Vinyl</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="body_material" value="silicone" {{($product->body_material == 'silicone') ? 'checked' : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Silicone</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="body_material" value="cloth" {{($product->body_material == 'cloth') ? 'checked' : ""}}>
                                                    <label class="form-check-label" for="inlineRadio3">Cloth</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="body_material" value="other" {{($product->body_material == 'other') ? 'checked' : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="limb_material" value="vinyl" {{($product->limb_material == 'vinyl') ? 'checked' : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Vinyl</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="limb_material" value="silicone" {{($product->limb_material == 'silicone') ? 'checked' : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Silicone</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="limb_material" value="cloth" {{($product->limb_material == 'cloth') ? 'checked' : ""}}>
                                                    <label class="form-check-label" for="inlineRadio3">Cloth</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="limb_material" value="other" {{($product->limb_material == 'other') ? 'checked' : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="age" value="mini" {{$product->age == "mini" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Mini</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age" value="preemie" {{$product->age == "preemie" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Preemie</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age" value="newborn" {{$product->age == "newborn" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio3">Newborn</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age" value="older_baby" {{$product->age == "older_baby" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio3">Older Baby</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="age" value="toddler" {{$product->age == "toddler" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="gender" value="boy" {{$product->gender == "boy" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Boy</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" value="girl" {{$product->gender == "girl" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Girl</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" value="yourchoice" {{$product->gender == "yourchoice" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="checkbox" value="full_front_plate_boy" name="torso[]" @foreach($torso as $tor) {{($tor == "full_front_plate_boy") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Full Front Plate - Boy
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="full_front_plate_girl" name="torso[]" @foreach($torso as $tor) {{($tor == "full_front_plate_girl") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Front Plate - Girl
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="full_front_plate_non_gendered" name="torso[]" @foreach($torso as $tor) {{($tor == "full_front_plate_non_gendered") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Front Plate - Non Gendered
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="full_back_plate_with_baby_butt" name="torso[]" @foreach($torso as $tor) {{($tor == "full_back_plate_with_baby_butt") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Back Plate (with baby butt)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="belly_plate_no_chest" name="torso[]" @foreach($torso as $tor) {{($tor == "belly_plate_no_chest") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Belly Plate [no chest or genitals]
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="full_vinyl_torso_girl" name="torso[]" @foreach($torso as $tor) {{($tor == "full_vinyl_torso_girl") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Vinyl Torso - Girl
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="full_vinyl_torso_boy" name="torso[]" @foreach($torso as $tor) {{($tor == "full_vinyl_torso_boy") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Full Vinyl Torso - Boy
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="half_upper_vinyl_torso_non_gendered" name="torso[]" @foreach($torso as $tor) {{($tor == "half_upper_vinyl_torso_non_gendered") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Half Upper Vinyl Torso - Non Gendered
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="half_lower_vinyl_torso_girl" name="torso[]" @foreach($torso as $tor) {{($tor == "half_lower_vinyl_torso_girl") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Half Lower Vinyl Torso - Girl
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="half_lower_vinyl_torso_boy" name="torso[]" @foreach($torso as $tor) {{($tor == "half_lower_vinyl_torso_boy") ? "checked" : "" }}
                                                    @endforeach>
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
                                                    <input class="form-check-input" type="radio" name="arms" value="full_length" {{$product->arms == "full_length" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Full Length</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="arms"
                                                        id="inlineRadio2" value="3by4_length" {{$product->arms == "3by4_length" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">3/4 Length</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="arms"
                                                        id="inlineRadio3" value="1by4_length" {{$product->arms == "1by4_length" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio3">1/4 Length</label>
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
                                                        id="inlineRadio1" value="full_length" {{$product->legs == "full_length" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Full Length</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="legs"
                                                        id="inlineRadio2" value="3by4_length" {{$product->legs == "3by4_length" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">3/4 Length</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="legs"
                                                        id="inlineRadio3" value="1by4_length" {{$product->legs == "1by4_length" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="certificate_of_auth_coa" value="yes" {{$product->certificate_of_auth_coa == "yes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="certificate_of_auth_coa" value="no" {{$product->certificate_of_auth_coa == "no" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="certificate_of_auth_coa" value="n_a" {{$product->certificate_of_auth_coa == "n_a" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="edition" value="open_edition" {{$product->edition == "open_edition" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Open Edition</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edition" value="limited_edition" {{$product->edition == "limited_edition" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Limited Edition (LE)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edition" value="sold_out_limited_edition" {{$product->edition == "sold_out_limited_edition" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio3">Sold Out Limited Edition (SOLE)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edition" value="unknown_edition" {{$product->edition == "unknown_edition" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="eyes" value="awake" {{$product->eyes == "awake" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Awake</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eyes" value="asleep" {{$product->eyes == "asleep" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="lashes" value="rooted_lashes" {{ $product->lashes == "rooted_lashes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Rooted Lashes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lashes" value="applied_lashes" {{ $product->lashes == "applied_lashes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Applied Lashes (glued)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lashes" value="painted_lashes" {{ $product->lashes == "painted_lashes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Painted Lashes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lashes" value="no_lashes" {{ $product->lashes == "no_lashes" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="hair" value="painted" {{$product->hair == "painted" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Painted</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="bald" {{$product->hair == "bald" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Bald</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="wig" {{$product->hair == "wig" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Wig</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="rooted" {{$product->hair == "rooted" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Rooted</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hair" value="painted_and_rooted" {{$product->hair == "painted_and_rooted" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="paint" value="genesis_heat_set_paint" {{$product->paint == 'genesis_heat_set_paint' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineRadio1">Genesis Heat Set Paint (GHSP)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paint" value="air_dry_paint" {{$product->paint == 'air_dry_paint' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineRadio2">Air Dry Paint</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paint" value="other_paint_type" {{$product->paint == 'other_paint_type' ? 'checked' : ''}}>
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
                                                    <input class="form-check-input" type="checkbox" value="fine_glass_beads" name="weighting[]" @foreach($weighting as $weight) {{($weight == "fine_glass_beads") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Fine Glass Beads
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="sand_blasted_glass" name="weighting[]" @foreach($weighting as $weight) {{($weight == "sand_blasted_glass") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Sand Blasted Glass
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="polyfil" name="weighting[]" @foreach($weighting as $weight) {{($weight == "polyfil") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Polyfil
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="luxury_fiberfill" name="weighting[]" @foreach($weighting as $weight) {{($weight == "luxury_fiberfill") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Luxury Fiberfill
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="silicone_baby_fat_inserts" name="weighting[]" @foreach($weighting as $weight) {{($weight == "silicone_baby_fat_inserts") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Silicone Baby Fat Inserts
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="silicone_baby_fat_pellets" name="weighting[]" @foreach($weighting as $weight) {{($weight == "silicone_baby_fat_pellets") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Silicone Baby Fat Pellets
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="poly_pellets" name="weighting[]" @foreach($weighting as $weight) {{($weight == "poly_pellets") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Poly-Pellets
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="steel_shots_BBs" name="weighting[]" @foreach($weighting as $weight) {{($weight == "steel_shots_BBs") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Steel Shots/BBs
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="sand" name="weighting[]" @foreach($weighting as $weight) {{($weight == "sand") ? "checked" : "" }}
                                                    @endforeach>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Sand
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="other_weighting_material" name="weighting[]" @foreach($weighting as $weight) {{($weight == "other_weighting_material") ? "checked" : "" }}
                                                    @endforeach>
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
                                                    <input class="form-check-input" type="radio" value="caramel" name="skin_color" {{$product->skin_color == "caramel" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Caramel
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="mottled" name="skin_color" {{$product->skin_color == "mottled" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Mottled
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="strawberries_and_cream" name="skin_color" {{$product->skin_color == "strawberries_and_cream" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Strawberries & Cream
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="dark" name="skin_color" {{$product->skin_color == "dark" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Dark
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="olive" name="skin_color" {{$product->skin_color == "olive" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Olive
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="tan" name="skin_color" {{$product->skin_color == "tan" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Tan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="fair" name="skin_color" {{$product->skin_color == "fair" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Fair
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="peaches_and_cream" name="skin_color" {{$product->skin_color == "peaches_and_cream" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Peaches & Cream
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="other_complexion" name="skin_color" {{$product->skin_color == "other_complexion" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" value="aboriginal" name="race" {{$product->race == "aboriginal" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Aboriginal
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="black_african_american" name="race" {{$product->race == "black_african_american" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Black / African American
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="hispanic_latino" name="race" {{$product->race == "hispanic_latino" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Hispanic / Latino
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="asian_pacific_slander" name="race" {{$product->race == "asian_pacific_slander" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Asian / Pacific Islander
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="	fantasy_make_believe" name="race" {{$product->race == "fantasy_make_believe" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Fantasy / Make Believe
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="other_race" name="race" {{$product->race == "other_race" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Other Race
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="biracial_multiracial" name="race" {{$product->race == "biracial_multiracial" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Biracial / Multiracial
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="white_caucasian" name="race" {{$product->race == "white_caucasian" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        White / Caucasian
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="middle_eastern_india" name="race" {{$product->race == "middle_eastern_india" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Middle Eastern / Indian	
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="native_american_indian" name="race" {{$product->race == "native_american_indian" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Native American Indian
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="animal" name="race" {{$product->race == "animal" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="twin" value="not_a_twin" {{$product->twin == "not_a_twin" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Not a Twin</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="twin" value="twin_sell_separately" {{$product->twin == "twin_sell_separately" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Twins, Will Sell Separately</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="twin" value="twin_not_sell_separately" {{$product->twin == "twin_not_sell_separately" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="realborn" value="yes" {{$product->realborn == "yes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="realborn" value="no" {{$product->realborn == "no" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="pacifier_type" value="regular_pacifier" {{$product->pacifier_type == "regular_pacifier" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Regular Pacifier</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier_type" value="magnetic_pacifier" {{$product->pacifier_type == "magnetic_pacifier" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Magnetic Pacifier</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier_type" value="modified_pacifier" {{$product->pacifier_type == "modified_pacifier" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio2">Modified Pacifier</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier_type" value="cant_take_pacifier" {{$product->pacifier_type == "cant_take_pacifier" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="pacifier" value="included" {{ $product->pacifier == "included" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Included</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pacifier" value="not_included" {{ $product->pacifier == "not_included" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="booboo" value="yes" {{$product->booboo == "yes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="booboo" value="no" {{$product->booboo == "no" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="drink_wet" value="yes" {{$product->drink_wet == "yes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="drink_wet" value="no" {{$product->drink_wet == "no" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="smoke_free_env" value="yes" {{ $product->smoke_free_env == "yes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="smoke_free_env" value="no" {{ $product->smoke_free_env == "no" ? "checked" : ""}}>
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
                                                    <input class="form-check-input" type="radio" name="pet_free_env" value="yes" {{$product->pet_free_env == "yes" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pet_free_env" value="no" {{$product->pet_free_env == "no" ? "checked" : ""}}>
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
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]" value="@php 
                                                    for($i=0;$i<count($shipping_charges);$i++){
                                                            if($shipping_charges[$i][0] == "world_wide"){
                                                                echo $shipping_charges[$i][1];
                                                            }
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]" value="@php 
                                                    for($i=0;$i<count($shipping_charges);$i++){
                                                            if($shipping_charges[$i][0] == "world_wide"){
                                                                echo $shipping_charges[$i][2];
                                                            }
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>

                                        </div>
                                        <h6>or</h6>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]" value="@php 
                                                    for($i=1;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][0];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]" value="@php 
                                                    for($i=1;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][1];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]" value="@php 
                                                    for($i=1;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][2];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]" value="@php 
                                                    for($i=2;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][0];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]" value="@php 
                                                    for($i=2;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][1];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]" value="@php 
                                                    for($i=2;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][2];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]" value="@php 
                                                    for($i=3;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][0];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]" value="@php 
                                                    for($i=3;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][1];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]" value="@php 
                                                    for($i=3;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][2];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]" value="@php 
                                                    for($i=4;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][0];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]" value="@php 
                                                    for($i=4;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][1];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]" value="@php 
                                                    for($i=4;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][2];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[country_name][]" value="@php 
                                                    for($i=5;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][0];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_cost][]" value="@php 
                                                    for($i=5;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][1];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shipping_charges[shipping_notes][]" value="@php 
                                                    for($i=5;$i<count($shipping_charges);$i++){
                                                        echo $shipping_charges[$i][2];
                                                    }
                                                    @endphp">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-5">
                                                <h6>Pet Free Environment:</h6>

                                            </div> --}}
                                            <div class="col-md-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="shipping_condn" value="only_allow" {{$product->shipping_condn == "only_allow" ? "checked" : ""}}>
                                                    <label class="form-check-label" for="inlineRadio1">Only allow orders from locations where you have explicitly listed shipping costs. People from other locations will be told you don't ship to their location.</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="shipping_condn" value="allow_all" {{$product->shipping_condn == "allow_all" ? "checked" : ""}}>
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
                                            <input type="hidden" name="prev_photo" value="{{$product->photo}}">
                                            <input type="hidden" name="prev_thumbnail" value="{{$product->thumbnail}}">
                                        </div>
                                        <div class="mt-4">
                                            <div class="gallery-images">
                                                <div class="prev-image">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="img gallery-img">
                                                                @if(!empty($product->photo))
                                                                <span class="remove-img" onclick="delete_gallery_img({{$product->id}},'{{route('delete-img')}}','p')"><i class="fa fa-times"></i></span>
                                                                <img src="{{asset('assets/images/products/'.$product->photo)}}" alt="gallery image" class="gallery_img">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <h5>Previous Gallery Uploads</h5>
                                        <div class="gallery-images">
                                            <div class="prev-image">
                                                <div class="row">
                                                    @if(!empty($gallery))
                                                            @foreach ($gallery as $gal)
                                                                <div class="col-sm-3">
                                                                    <div class="img gallery-img">
                                                                        <span class="remove-img" onclick="delete_gallery_img({{$gal->id}},'{{route('delete-img')}}','g')"><i class="fa fa-times"></i>
                                                                            <input type="hidden" value="{{$gal->id}}">
                                                                        </span>
                                                                        <a href="{{asset('assets/images/galleries/'.$gal->photo)}}" target="_blank">
                                                                            <img src="{{asset('assets/images/galleries/'.$gal->photo)}}" alt="gallery image" class="gallery_img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                        <textarea placeholder="No Return" class="mb-4 form-control" name="return_policy">{{$product->return_policy}}</textarea>
                                        <h6>General Ordering Information</h6>
                                        <textarea class="form-control" name="ordering_information"
                                            placeholder="I take pictures in all kinds of lighting and take closeups so you can see exactly what you are getting. If you have questions, ask before purchasing as I do not accept returns and will not do exchanges. Baby will be carefully packed, dated and timed photos  will be taken of each box packing to insure there are no questions about what was packed. 

                                                    Reborn dolls are not toys, but are collectable pieces of art. They are made with the adult collector in mind and will not hold up to rough playing like store bought dolls. The paint is permanent, and the doll is sealed with the best varnish that money can buy, but still can be worn away with improper care. If you intend to gift to a child, think about this and be prepared to teach them how to care for the doll as I do not accept returns and will not be responsible for any damage that occurs from rough treatment. 
                                                    
                                                    Reborn dolls are hand painted one by one. What makes them unique and different from factory dolls is their little imperfections.  If they are unintentional and anything major, they will be mentioned and the price will reflect this. 
                                                    
                                                    **Make sure your registered PayPal address is correct because this is where your baby will be shipped. All dolls are shipped with a signature confirmation. "
                                            class="mb-4">{{$product->ordering_information}}</textarea>
                                    </div>
                                    <div class="add-form">
                                        <h5>My Private Notes: </h5>
                                        <textarea class="form-control" name="private_notes">{{$product->private_notes}}</textarea>
                                    </div>
                                    <input type="hidden" name="prod_order" value="{{$product->prod_order}}">
                                    <div class="form-check">
                                        <input class="form-check-input p-0" type="checkbox" value="1" id="flexCheckDefault" name="email_to_subscriber" {{$product->email_to_subscriber == 1  ? "checked" : ""}}>
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

    <!-- Success Modal -->
    <div class="show-modal" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
        <div class="modal-content">
          
          <div class="modal-body pro-success">
              <button type="button" class="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <h3>Product is Updated Successfully.</h3>
          </div>
          
        </div>
      
    </div>


@endsection
