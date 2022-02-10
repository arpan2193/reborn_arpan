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

                        
            <input type="hidden" name="pageId" value="{{$data->id}}">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">
                            {{ __('About Image') }}
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
                            {{ __('About Title') }} *
                            {{-- <p class="sub-heading">{{ __(' ') }}</p> --}}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tawk-area">
                        <input type="text" class="input-field" name="title" placeholder="{{ __('Title') }}" value="{{ $data->title }}" required="">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">
                            {{ __('About Text') }} 
                            {{-- <p class="sub-heading">{{ __(' ') }}</p> --}}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tawk-area">
                        <textarea class="nic-edit-p" name="subtitle"> {{ $data->subtitle }} </textarea>
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
                    <textarea class="nic-edit-p" name="body1"> {{ $data->body1 }} </textarea>
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
            <textarea class="nic-edit-p" name="body2"> {{ $data->body2 }} </textarea>
        </div>
        <div class="checkbox-wrapper">
            <input type="checkbox" name="secheck" class="checkclick" id="allowProductSEO" {{ $data->meta_key != null || strip_tags($data->meta_description) != null ? 'checked' : '' }}>
            <label for="allowProductSEO">{{ __('Allow Page SEO') }}</label>
        </div>
    </div>
</div>

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