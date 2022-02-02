@extends('layouts.admin')

@section('content')

<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ __('About Us') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="javascript:;">{{ __('Menu Page Settings') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-ps-about') }}">{{ __('About Us Page') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="add-product-content1">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-description">
                    <div class="body-area">
                        <div class="gocover" style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                        </div>
                        <form id="geniusform" action="{{ route('admin-ps-about-update') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')

                            {{-- <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('About Page') }}:
                            </h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="action-list">
                        <select class="process select droplinks {{ $gs->is_contact == 1 ? 'drop-success' : 'drop-danger' }}">
                            <option data-val="1" value="{{ route('admin-gs-iscontact', 1) }}" {{ $gs->is_contact == 1 ? 'selected' : '' }}>{{ __('Activated') }}
                            </option>
                            <option data-val="0" value="{{ route('admin-gs-iscontact', 0) }}" {{ $gs->is_contact == 0 ? 'selected' : '' }}>
                                {{ __('Deactivated') }}
                            </option>
                        </select>
                    </div>
                </div>
            </div> --}}
            <input type="hidden" name="pageId" value="{{$data->id}}">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">
                            {{ __('About Title') }} *
                            {{-- <p class="sub-heading">{{ __(' ') }}</p> --}}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tawk-area">
                        <textarea class="nic-edit" name="title"> {{ $data->title }} </textarea>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">
                            {{ __('About Sub Title') }} *
                            {{-- <p class="sub-heading">{{ __(' ') }}</p> --}}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tawk-area">
                        <textarea class="nic-edit" name="subtitle"> {{ $data->subtitle }} </textarea>
                    </div>
                </div>
            </div>


            {{-- <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('Contact Us Email Address') }} *
            </h4>
        </div>
    </div>
    <div class="col-lg-6">
        <input type="text" class="input-field" placeholder="{{ __('Contact Us Email Address') }}" name="contact_email" value="{{ $data->contact_email }}">

    </div>
</div> --}}
{{-- <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('Contact Form Success Text') }} *
<p class="sub-heading">{{ __(' ') }}</p>
</h4>
</div>
</div>
<div class="col-lg-6">
    <div class="tawk-area">
        <textarea name="contact_success"> {{ $data->contact_success }} </textarea>
    </div>
</div>
</div> --}}

{{-- <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Email') }} *
</h4>
</div>
</div>
<div class="col-lg-6">
    <input type="email" class="input-field" placeholder="{{ __('Enter Email') }}" name="email" value="{{ $data->email }}">
</div>
</div> --}}


{{-- <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Website') }} *
</h4>
</div>
</div>
<div class="col-lg-6">
    <input type="text" class="input-field" placeholder="{{ __('Enter Website') }}" name="site" value="{{ $data->site }}">
</div>
</div> --}}

<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="left-area">
            <h4 class="heading">
                {{ __('Previous Image') }}
            </h4>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="tawk-area">
            <img src="{{ asset('assets/images') }}/{{ $data->featured_image }}" alt="">
            <input type="hidden" name="previous_image" value="{{ $data->featured_image }}">
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="left-area">
            <h4 class="heading">
                {{ __('Upload Image') }}
            </h4>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="tawk-area">
            <input type="file" accept="image/png,image/jpeg,image/jpg,image/gif" name="featured_image">
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="left-area">
            <h4 class="heading">
                {{ __('Body 1') }} *
                {{-- <p class="sub-heading">{{ __(' ') }}</p> --}}
            </h4>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="tawk-area">
            <textarea class="nic-edit" name="body1"> {{ $data->body1 }} </textarea>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="left-area">
            <h4 class="heading">
                {{ __('Body 2') }} *
                {{-- <p class="sub-heading">{{ __(' ') }}</p> --}}
            </h4>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="tawk-area">
            <textarea class="nic-edit" name="body2"> {{ $data->body2 }} </textarea>
        </div>
        <div class="checkbox-wrapper">
            <input type="checkbox" name="secheck" class="checkclick" id="allowProductSEO" {{ $data->meta_key != null || strip_tags($data->meta_description) != null ? 'checked' : '' }}>
            <label for="allowProductSEO">{{ __('Allow Page SEO') }}</label>
        </div>
    </div>
</div>
{{-- <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Body 3') }} *
<p class="sub-heading">{{ __(' ') }}</p>
</h4>
</div>
</div>
<div class="col-lg-6">
    <div class="tawk-area">
        <textarea class="nic-edit" name="body3"> {{ $data->body3 }} </textarea>
    </div>
</div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="left-area">
            <h4 class="heading">
                {{ __('Body 4') }} *
                <p class="sub-heading">{{ __(' ') }}</p>
            </h4>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="tawk-area">
            <textarea class="nic-edit" name="body4"> {{ $data->body4 }} </textarea>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="left-area">
            <h4 class="heading">
                {{ __('Body 5') }} *
                <p class="sub-heading">{{ __(' ') }}</p>
            </h4>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="tawk-area">
            <textarea class="nic-edit" name="body5"> {{ $data->body5 }} </textarea>
        </div>

    </div>
</div> --}}
<div class="{{ $data->meta_key == null && strip_tags($data->meta_description) == null ? 'showbox' : '' }}">
    <div class="row">
        <div class="col-lg-4">
            <div class="left-area">
                <h4 class="heading">{{ __('Meta Tags') }} *</h4>
            </div>
        </div>
        <div class="col-lg-7">
            <ul id="metatags" class="myTags">
                @foreach (explode(',', $data->meta_key) as $element)
                <li>{{ $element }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="left-area">
                <h4 class="heading">
                    {{ __('Meta Description') }} *
                </h4>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="text-editor">
                <textarea name="meta_description" class="input-field" placeholder="{{ __('Meta Description') }}">{{ $data->meta_description }}</textarea>
            </div>
        </div>
    </div>
</div>



{{-- <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Fax') }} *
</h4>
</div>
</div>
<div class="col-lg-6">
    <input type="text" class="input-field" placeholder="{{ __('Enter Fax') }}" name="fax" value="{{ $data->fax }}">
</div>
</div> --}}


<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="left-area">

        </div>
    </div>
    <div class="col-lg-6">
        <button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection