@extends('layouts.admin')
@section('styles')

<link href="{{asset('assets/admin/css/product.css')}}" rel="stylesheet" />
<link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet" />
<link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet" />

@endsection
@section('content')

<div class="content-area">
	<div class="mr-breadcrumb">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading"> {{ __('Edit Product') }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
				<ul class="links">
					<li>
						<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
					</li>
					<li>
						<a href="{{ route('admin-prod-index') }}">{{ __('Products') }} </a>
					</li>
					<li>
						<a href="javascript:;">{{ __('Physical Product') }}</a>
					</li>
					<li>
						<a href="javascript:;">{{ __('Edit') }}</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<form id="geniusform" action="{{route('admin-prod-update',$data->id)}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}

		<div class="row">
			<div class="col-lg-8">

				<div class="add-product-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="product-description">
								<div class="body-area">

									<div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>



									@include('includes.admin.form-both')

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __('Product Name') }}* </h4>
												<p class="sub-heading">{{ __(' ') }}</p>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="text" class="input-field" placeholder="{{ __('Enter Product Name') }}" name="name" required="" value="{{ $data->name }}">
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __('Product Sku') }}* </h4>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="text" class="input-field" placeholder="{{ __('Enter Product Sku') }}" name="sku" required="" value="{{ $data->sku }}">

											{{-- <div class="checkbox-wrapper">
							                              <input type="checkbox" name="product_condition_check" class="checkclick" id="conditionCheck" value="1" {{ $data->product_condition != 0 ? "checked":"" }}>
											<label for="conditionCheck">{{ __('Allow Product Condition') }}</label>
										</div> --}}

									</div>
								</div>


								<div class="{{ $data->product_condition == 0 ? "showbox":"" }}">

									{{-- <div class="row">
													<div class="col-lg-12">
														<div class="left-area">
																<h4 class="heading">{{ __('Product Condition') }}*</h4>
								</div>
							</div>
							<div class="col-lg-12">
								<select name="product_condition">
									<option value="2" {{$data->product_condition == 2
                                                    ? "selected":""}}>{{ __('New') }}</option>
									<option value="1" {{$data->product_condition == 1
                                                    ? "selected":""}}>{{ __('Used') }}</option>
								</select>
							</div>

						</div> --}}


					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="left-area">
								<h4 class="heading">{{ __('Category') }}*</h4>
							</div>
						</div>
						<div class="col-lg-12">
							<select id="cat" name="category_id" required="">
								<option>{{ __('Select Category') }}</option>

								@foreach($cats as $cat)
								<option data-href="{{ route('admin-subcat-load',$cat->id) }}" value="{{$cat->id}}" {{$cat->id == $data->category_id ? "selected":""}}>{{$cat->name}}</option>
								@endforeach
							</select>
						</div>
					</div>

					{{-- <div class="row">
													<div class="col-lg-12">
														<div class="left-area">
																<h4 class="heading">{{ __('Sub Category') }}*</h4>
				</div>
			</div>
			<div class="col-lg-12">
				<select id="subcat" name="subcategory_id">
					<option value="">{{ __('Select Sub Category') }}</option>
					@if($data->subcategory_id == null)
					@foreach($data->category->subs as $sub)
					<option data-href="{{ route('admin-childcat-load',$sub->id) }}" value="{{$sub->id}}">{{$sub->name}}</option>
					@endforeach
					@else
					@foreach($data->category->subs as $sub)
					<option data-href="{{ route('admin-childcat-load',$sub->id) }}" value="{{$sub->id}}" {{$sub->id == $data->subcategory_id ? "selected":""}}>{{$sub->name}}</option>
					@endforeach
					@endif


				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="left-area">
					<h4 class="heading">{{ __('Child Category') }}*</h4>
				</div>
			</div>
			<div class="col-lg-12">
				<select id="childcat" name="childcategory_id" {{$data->subcategory_id == null ? "disabled":""}}>
					<option value="">{{ __('Select Child Category') }}</option>
					@if($data->subcategory_id != null)
					@if($data->childcategory_id == null)
					@foreach($data->subcategory->childs as $child)
					<option value="{{$child->id}}">{{$child->name}}</option>
					@endforeach
					@else
					@foreach($data->subcategory->childs as $child)
					<option value="{{$child->id}} " {{$child->id == $data->childcategory_id ? "selected":""}}>{{$child->name}}</option>
					@endforeach
					@endif
					@endif
				</select>
			</div>
		</div> --}}


		{{-- @php
													$selectedAttrs = json_decode($data->attributes, true);
													// dd($selectedAttrs);
												@endphp --}}


		{{-- Attributes of category starts --}}
		{{-- <div id="catAttributes">
													@php
														$catAttributes = !empty($data->category->attributes) ? $data->category->attributes : '';
													@endphp
													@if (!empty($catAttributes))
														@foreach ($catAttributes as $catAttribute)
															<div class="row">
																 <div class="col-lg-12">
																		<div class="left-area">
																			 <h4 class="heading">{{ $catAttribute->name }} *</h4>
</div>
</div>
<div class="col-lg-12">
	@php
	$i = 0;
	@endphp
	@foreach ($catAttribute->attribute_options as $optionKey => $option)
	@php
	$inName = $catAttribute->input_name;
	$checked = 0;
	@endphp


	<div class="row">
		<div class="col-lg-5">
			<div class="custom-control custom-checkbox">
				<input type="checkbox" id="{{ $catAttribute->input_name }}{{$option->id}}" name="{{ $catAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox" @if (is_array($selectedAttrs) && array_key_exists($catAttribute->input_name,$selectedAttrs))
				@if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
				checked
				@php
				$checked = 1;
				@endphp
				@endif
				@endif
				>
				<label class="custom-control-label" for="{{ $catAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
			</div>
		</div>

		<div class="col-lg-7 {{ $catAttribute->price_status == 0 ? 'd-none' : '' }}">
			<div class="row">
				<div class="col-2">
					+
				</div>
				<div class="col-10">
					<div class="price-container">
						<span class="price-curr">{{ $sign->sign }}</span>
						<input type="text" class="input-field price-input" id="{{ $catAttribute->input_name }}{{$option->id}}_price" data-name="{{ $catAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
					</div>
				</div>
			</div>
		</div>
	</div>


	@php
	if ($checked == 1) {
	$i++;
	}
	@endphp
	@endforeach
</div>

</div>
@endforeach
@endif
</div> --}}
{{-- Attributes of category ends --}}


{{-- Attributes of subcategory starts --}}
{{-- <div id="subcatAttributes">
													@php
														$subAttributes = !empty($data->subcategory->attributes) ? $data->subcategory->attributes : '';
													@endphp
													@if (!empty($subAttributes))
														@foreach ($subAttributes as $subAttribute)
															<div class="row">
																 <div class="col-lg-12">
																		<div class="left-area">
																			 <h4 class="heading">{{ $subAttribute->name }} *</h4>
</div>
</div>
<div class="col-lg-12">
	@php
	$i = 0;
	@endphp
	@foreach ($subAttribute->attribute_options as $option)
	@php
	$inName = $subAttribute->input_name;
	$checked = 0;
	@endphp

	<div class="row">
		<div class="col-lg-5">
			<div class="custom-control custom-checkbox">
				<input type="checkbox" id="{{ $subAttribute->input_name }}{{$option->id}}" name="{{ $subAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox" @if (is_array($selectedAttrs) && array_key_exists($subAttribute->input_name,$selectedAttrs))
				@php
				$inName = $subAttribute->input_name;
				@endphp
				@if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
				checked
				@php
				$checked = 1;
				@endphp
				@endif
				@endif
				>
				<label class="custom-control-label" for="{{ $subAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
			</div>
		</div>
		<div class="col-lg-7 {{ $subAttribute->price_status == 0 ? 'd-none' : '' }}">
			<div class="row">
				<div class="col-2">
					+
				</div>
				<div class="col-10">
					<div class="price-container">
						<span class="price-curr">{{ $sign->sign }}</span>
						<input type="text" class="input-field price-input" id="{{ $subAttribute->input_name }}{{$option->id}}_price" data-name="{{ $subAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
					</div>
				</div>
			</div>
		</div>
	</div>
	@php
	if ($checked == 1) {
	$i++;
	}
	@endphp
	@endforeach

</div>
</div>
@endforeach
@endif
</div> --}}
{{-- Attributes of subcategory ends --}}


{{-- Attributes of child category starts --}}
{{-- <div id="childcatAttributes">
													@php
														$childAttributes = !empty($data->childcategory->attributes) ? $data->childcategory->attributes : '';
													@endphp
													@if (!empty($childAttributes))
														@foreach ($childAttributes as $childAttribute)
															<div class="row">
																 <div class="col-lg-12">
																		<div class="left-area">
																			 <h4 class="heading">{{ $childAttribute->name }} *</h4>
</div>
</div>
<div class="col-lg-12">
	@php
	$i = 0;
	@endphp
	@foreach ($childAttribute->attribute_options as $optionKey => $option)
	@php
	$inName = $childAttribute->input_name;
	$checked = 0;
	@endphp
	<div class="row">
		<div class="col-lg-5">
			<div class="custom-control custom-checkbox">
				<input type="checkbox" id="{{ $childAttribute->input_name }}{{$option->id}}" name="{{ $childAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox" @if (is_array($selectedAttrs) && array_key_exists($childAttribute->input_name,$selectedAttrs))
				@php
				$inName = $childAttribute->input_name;
				@endphp
				@if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
				checked
				@php
				$checked = 1;
				@endphp
				@endif
				@endif
				>
				<label class="custom-control-label" for="{{ $childAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
			</div>
		</div>


		<div class="col-lg-7 {{ $childAttribute->price_status == 0 ? 'd-none' : '' }}">
			<div class="row">
				<div class="col-2">
					+
				</div>
				<div class="col-10">
					<div class="price-container">
						<span class="price-curr">{{ $sign->sign }}</span>
						<input type="text" class="input-field price-input" id="{{ $childAttribute->input_name }}{{$option->id}}_price" data-name="{{ $childAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
					</div>
				</div>
			</div>
		</div>
	</div>
	@php
	if ($checked == 1) {
	$i++;
	}
	@endphp
	@endforeach
</div>

</div>
@endforeach
@endif
</div> --}}
{{-- Attributes of child category ends --}}


{{-- <div class="row">
													<div class="col-lg-12">
														<ul class="list">
															<li>
																<input class="checkclick1" name="shipping_time_check" type="checkbox" id="check1" value="1" {{$data->ship != null ? "checked":""}}>
<label for="check1">{{ __('Allow Estimated Shipping Time') }}</label>
</li>
</ul>
</div>
</div>



<div class="{{ $data->ship != null ? "":"showbox" }}">

	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">{{ __('Product Estimated Shipping Time') }}* </h4>
			</div>
		</div>
		<div class="col-lg-12">
			<input type="text" class="input-field" placeholder="{{ __('Estimated Shipping Time') }}" name="ship" value="{{ $data->ship == null ? "" : $data->ship }}">
		</div>
	</div>


</div> --}}

{{-- <div class="row">
													<div class="col-lg-12">
														<div class="left-area">

														</div>
													</div>
													<div class="col-lg-12">
														<ul class="list">
															<li>
																<input name="size_check" type="checkbox" id="size-check" value="1" {{ !empty($data->size) ? "checked":"" }}>
<label for="size-check">{{ __('Allow Product Sizes') }}</label>
</li>
</ul>
</div>
</div> --}}
{{-- <div class="{{ !empty($data->size) ? "":"showbox" }}" id="size-display">
<div class="row">
	<div class="col-lg-12">
	</div>
	<div class="col-lg-12">
		<div class="product-size-details" id="size-section">
			@if(!empty($data->size))
			@foreach($data->size as $key => $data1)
			<div class="size-area">
				<span class="remove size-remove"><i class="fas fa-times"></i></span>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<label>
							{{ __('Size Name') }} :
							<span>
								{{ __('(eg. S,M,L,XL,XXL,3XL,4XL)') }}
							</span>
						</label>
						<input type="text" name="size[]" class="input-field" placeholder="Size Name" value="{{ $data->size[$key] }}">
					</div>
					<div class="col-md-4 col-sm-6">
						<label>
							{{ __('Size Qty') }} :
							<span>
								{{ __('(Number of quantity of this size)') }}
							</span>
						</label>
						<input type="number" name="size_qty[]" class="input-field" placeholder="Size Qty" min="1" value="{{ $data->size_qty[$key] }}">
					</div>
					<div class="col-md-4 col-sm-6">
						<label>
							{{ __('Size Price') }} :
							<span>
								{{ __('(This price will be added with base price)') }}
							</span>
						</label>
						<input type="number" name="size_price[]" class="input-field" placeholder="{{ __('Size Price') }}" min="0" value="{{round($data->size_price[$key] * $sign->value , 2)}}">
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="size-area">
				<span class="remove size-remove"><i class="fas fa-times"></i></span>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<label>
							{{ __('Size Name') }} :
							<span>
								{{ __('(eg. S,M,L,XL,XXL,3XL,4XL)') }}
							</span>
						</label>
						<input type="text" name="size[]" class="input-field" placeholder="Size Name">
					</div>
					<div class="col-md-4 col-sm-6">
						<label>
							{{ __('Size Qty') }} :
							<span>
								{{ __('(Number of quantity of this size)') }}
							</span>
						</label>
						<input type="number" name="size_qty[]" class="input-field" placeholder="Size Qty" value="1" min="1">
					</div>
					<div class="col-md-4 col-sm-6">
						<label>
							{{ __('Size Price') }} :
							<span>
								{{ __('(This price will be added with base price)') }}
							</span>
						</label>
						<input type="number" name="size_price[]" class="input-field" placeholder="Size Price" value="0" min="0">
					</div>
				</div>
			</div>
			@endif
		</div>

		<a href="javascript:;" id="size-btn" class="add-more"><i class="fas fa-plus"></i>{{ __('Add More Size') }} </a>
	</div>
</div>
</div> --}}

{{-- <div class="row">
													<div class="col-lg-12">
														<div class="left-area">

														</div>
													</div>
													<div class="col-lg-12">
														<ul class="list">
															<li>
																<input class="checkclick1" name="color_check" type="checkbox" id="check3" value="1" {{ !empty($data->color) ? "checked":"" }}>
<label for="check3">{{ __('Allow Product Colors') }}</label>
</li>
</ul>
</div>
</div>



<div class="{{ !empty($data->color) ? "":"showbox" }}">

	<div class="row">
		@if(!empty($data->color))
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">
					{{ __('Product Colors') }}*
				</h4>
				<p class="sub-heading">
					{{ __('(Choose Your Favorite Colors)') }}
				</p>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="select-input-color" id="color-section">
				@foreach($data->color as $key => $data1)
				<div class="color-area">
					<span class="remove color-remove"><i class="fas fa-times"></i></span>
					<div class="input-group colorpicker-component cp">
						<input type="text" name="color[]" value="{{ $data->color[$key] }}" class="input-field cp" />
						<span class="input-group-addon"><i></i></span>
					</div>
				</div>
				@endforeach
			</div>
			<a href="javascript:;" id="color-btn" class="add-more mt-4 mb-3"><i class="fas fa-plus"></i>{{ __('Add More Color') }} </a>
		</div>
		@else
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">
					{{ __('Product Colors') }}*
				</h4>
				<p class="sub-heading">
					{{ __('(Choose Your Favorite Colors)') }}
				</p>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="select-input-color" id="color-section">
				<div class="color-area">
					<span class="remove color-remove"><i class="fas fa-times"></i></span>
					<div class="input-group colorpicker-component cp">
						<input type="text" name="color[]" value="#000000" class="input-field cp" />
						<span class="input-group-addon"><i></i></span>
					</div>
				</div>
			</div>
			<a href="javascript:;" id="color-btn" class="add-more mt-4 mb-3"><i class="fas fa-plus"></i>{{ __('Add More Color') }} </a>
		</div>


		@endif
	</div>

</div> --}}



{{-- <div class="row">
													<div class="col-lg-12">
														<div class="left-area">

														</div>
													</div>
													<div class="col-lg-12">
														<ul class="list">
															<li>
																<input class="checkclick1" name="whole_check" type="checkbox" id="whole_check" value="1" {{ !empty($data->whole_sell_qty) ? "checked":"" }}>
<label for="whole_check">{{ __('Allow Product Whole Sell') }}</label>
</li>
</ul>
</div>
</div>

<div class="{{ !empty($data->whole_sell_qty) ? "":"showbox" }}">
	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">

			</div>
		</div>
		<div class="col-lg-12">
			<div class="featured-keyword-area">
				<div class="feature-tag-top-filds" id="whole-section">
					@if(!empty($data->whole_sell_qty))

					@foreach($data->whole_sell_qty as $key => $data1)

					<div class="feature-area">
						<span class="remove whole-remove"><i class="fas fa-times"></i></span>
						<div class="row">
							<div class="col-lg-6">
								<input type="number" name="whole_sell_qty[]" class="input-field" placeholder="{{ __('Enter Quantity') }}" min="0" value="{{ $data->whole_sell_qty[$key] }}" required="">
							</div>

							<div class="col-lg-6">
								<input type="number" name="whole_sell_discount[]" class="input-field" placeholder="{{ __('Enter Discount Percentage') }}" min="0" value="{{ $data->whole_sell_discount[$key] }}" required="">
							</div>
						</div>
					</div>


					@endforeach
					@else


					<div class="feature-area">
						<span class="remove whole-remove"><i class="fas fa-times"></i></span>
						<div class="row">
							<div class="col-lg-6">
								<input type="number" name="whole_sell_qty[]" class="input-field" placeholder="{{ __('Enter Quantity') }}" min="0">
							</div>

							<div class="col-lg-6">
								<input type="number" name="whole_sell_discount[]" class="input-field" placeholder="{{ __('Enter Discount Percentage') }}" min="0" />
							</div>
						</div>
					</div>

					@endif
				</div>

				<a href="javascript:;" id="whole-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
			</div>
		</div>
	</div>
</div> --}}


{{-- <div class="{{ !empty($data->size) ? "showbox":"" }}" id="stckprod">
<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Product Stock') }}*</h4>
			<p class="sub-heading">{{ __('(Leave Empty will Show Always Available)') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<input name="stock" type="text" class="input-field" placeholder="e.g 20" value="{{ $data->stock }}">
		<div class="checkbox-wrapper">
			<input type="checkbox" name="measure_check" class="checkclick1" id="allowProductMeasurement" value="1" {{ $data->measure == null ? '' : 'checked' }}>
			<label for="allowProductMeasurement">{{ __('Allow Product Measurement') }}</label>
		</div>
	</div>
</div>

</div> --}}

{{-- <div class="{{ $data->measure == null ? 'showbox' : '' }}">

<div class="row">
	<div class="col-lg-6">
		<div class="left-area">
			<h4 class="heading">{{ __('Product Measurement') }}*</h4>
		</div>
	</div>
	<div class="col-lg-6">
		<select id="product_measure">
			<option value="" {{$data->measure == null ? 'selected':''}}>{{ __('None') }}</option>
			<option value="Gram" {{$data->measure == 'Gram' ? 'selected':''}}>{{ __('Gram') }}</option>
			<option value="Kilogram" {{$data->measure == 'Kilogram' ? 'selected':''}}>{{ __('Kilogram') }}</option>
			<option value="Litre" {{$data->measure == 'Litre' ? 'selected':''}}>{{ __('Litre') }}</option>
			<option value="Pound" {{$data->measure == 'Pound' ? 'selected':''}}>{{ __('Pound') }}</option>
			<option value="Custom" {{ in_array($data->measure,explode(',', 'Gram,Kilogram,Litre,Pound')) ? '' : 'selected' }}>{{ __('Custom') }}</option>
		</select>
	</div>
	<div class="col-lg-6 {{ in_array($data->measure,explode(',', 'Gram,Kilogram,Litre,Pound')) ? 'hidden' : '' }}" id="measure">
		<input name="measure" type="text" id="measurement" class="input-field" placeholder="Enter Unit" value="{{$data->measure}}">
	</div>
</div>

</div> --}}


<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">
				{{ __('Product Description') }}*
			</h4>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="text-editor">
			<textarea name="details" class="nic-edit-p">{{$data->details}}</textarea>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">
				{{ __('Product Buy/Return Policy') }}*
			</h4>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="text-editor">
			<textarea name="policy" class="nic-edit-p">{{$data->policy}}</textarea>
		</div>
	</div>
</div>

<!-- extra field start -->

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Kit Name') }} </h4>
			<p class="sub-heading">{{ __(' ') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<input type="text" class="input-field" placeholder="{{ __('Enter Kit Name') }}" name="kit_name" value="{{ ($data->kit_name) }}">
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Sculptor Name') }} </h4>
			<p class="sub-heading">{{ __(' ') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<input type="text" class="input-field" placeholder="{{ __('Enter Sculpt') }}" name="sculpt" value="{{ ($data->sculpt) }}">
	</div>

</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Artist Name') }} </h4>
			<p class="sub-heading">{{ __(' ') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<input type="text" class="input-field" placeholder="{{ __('Enter Artist') }}" name="artist" value="{{ $data->artist }}">
	</div>

</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Length by Inch') }} </h4>
			<p class="sub-heading">{{ __(' ') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<input type="text" class="input-field" placeholder="{{ __('Enter Length by Inch') }}" name="length_by_inch" value="{{ $data->length_by_inch }}">
	</div>

</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Length by cm') }} </h4>
			<p class="sub-heading">{{ __(' ') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<input type="text" class="input-field" placeholder="{{ __('Enter Length by cm') }}" name="length_by_centimeters" value="{{ $data->length_by_centimeters }}">
	</div>

</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Layaway Available') }} </h4>
		</div>
	</div>
	<div class="col-lg-12">
		<select name="layaway_available" id="layaway_available">
			<option value="1" {{ ($data->layaway_available == 1) ? 'selected' : '' }}>Yes</option>
			<option value="0" {{ ($data->layaway_available == 0) ? 'selected' : '' }}>No</option>
		</select>
	</div>

</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Weight') }} </h4>
			<p class="sub-heading">{{ __(' ') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<input type="text" class="input-field" placeholder="{{ __('Enter Weight') }}" name="weight" value="{{ ($data->weight) }}">
	</div>

</div>

<div class="row">

	<div class="col-lg-12">
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Head Material</h4>
		</div>
		<select name="head_material" id="head_material">
			<option value="">Please Select Material</option>
			<option value="Vinyl" {{ ($data->head_material == 'Vinyl') ? 'selected' : '' }}>Vinyl</option>
			<option value="Silicone" {{ ($data->head_material == 'Silicone') ? 'selected' : '' }}>Silicone</option>
			<option value="Other" {{ ($data->head_material == 'Other') ? 'selected' : '' }}>Other / Not Applicable</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Body Material</h4>
		</div>
		<select name="body_material" id="body_material">
			<option value="">Please Select Material</option>
			<option value="vinyl" {{ ($data->body_material == 'vinyl') ? 'selected' : '' }}>Vinyl</option>
			<option value="Silicone" {{ ($data->body_material == 'Silicone') ? 'selected' : '' }}>Silicone</option>
			<optioin value="Cloth" {{ ($data->body_material == 'Cloth') ? 'selected' : '' }}>Cloth</option>
			<option value="Other" {{ ($data->body_material == 'Other') ? 'selected' : '' }}>Other / Not Applicable</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Limb Material</h4>
		</div>
		<select name="limb_material" id="limb_material">
			<option value="">Please Select Material</option>
			<option value="vinyl" {{ ($data->limb_material == 'vinyl') ? 'selected' : '' }}>Vinyl</option>
			<option value="Silicone" {{ ($data->limb_material == 'Silicone') ? 'selected' : '' }}>Silicone</option>
			<optioin value="Cloth" {{ ($data->limb_material == 'Cloth') ? 'selected' : '' }}>Cloth</option>
			<option value="Other" {{ ($data->limb_material == 'Other') ? 'selected' : '' }}>Other / Not Applicable</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Age</h4>
		</div>
		<select name="age" id="age">
			<option value="">Please Select Age</option>
			<option value="Mini" {{ ($data->age == 'Mini') ? 'selected' : '' }}>Mini</option>
			<option value="Preemie" {{ ($data->age == 'Preemie') ? 'selected' : '' }}>Preemie</option>
			<option value="New born" {{ ($data->age == 'New born') ? 'selected' : '' }}>New Born</option>
			<option value="Older Baby" {{ ($data->age == 'Older Baby') ? 'selected' : '' }}>Older Baby</option>
			<option value="Toddler" {{ ($data->age == 'Toddler') ? 'selected' : '' }}>Toddler</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Gender</h4>
		</div>
		<select name="gender" id="gender">
			<option value="">Please Select Gender</option>
			<option value="boy" {{ ($data->gender == 'boy') ? 'selected' : '' }}>Boy</option>
			<option value="girl" {{ ($data->gender == 'girl') ? 'selected' : '' }}>Girl</option>
			<option value="Your Choice" {{ ($data->gender == 'Your Choice') ? 'selected' : '' }}>Your Choice</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Torso/Plates</h4>
		</div>
		<select name="torso" id="torso">
			<option value="">Please Select Torso/Plates</option>
			<option value="Full Front Plate - Boy" {{ ($data->torso == 'Full Front Plate - Boye') ? 'selected' : '' }}>Full Front Plate - Boy</option>
			<option value="Full Front Plate - Girl" {{ ($data->torso == 'Full Front Plate - Girl') ? 'selected' : '' }}>Full Front Plate - Girl</option>
			<option value="Full Front Plate - Non Gendered" {{ ($data->torso == 'Full Front Plate - Non Gendered') ? 'selected' : '' }}>Full Front Plate - Non Gendered</option>
			<option value="Full Back Plate" {{ ($data->torso == 'Full Back Plate') ? 'selected' : '' }}>Full Back Plate (with baby butt)</option>
			<option value="Belly Plate" {{ ($data->torso == 'Belly Plate') ? 'selected' : '' }}>Belly Plate [no chest or genitals]</option>
			<option value="Full Vinyl Torso - Girl" {{ ($data->torso == 'Full Vinyl Torso - Girl') ? 'selected' : '' }}>Full Vinyl Torso - Girl</option>
			<option value="Full Vinyl Torso - Boy" {{ ($data->torso == 'Full Vinyl Torso - Boy') ? 'selected' : '' }}>Full Vinyl Torso - Boy</option>
			<option value="Half Upper Vinyl Torso - Non Gendered" {{ ($data->torso == 'Half Upper Vinyl Torso - Non Gendered') ? 'selected' : '' }}>Half Upper Vinyl Torso - Non Gendered</option>
			<option value="Half Lower Vinyl Torso - Girl" {{ ($data->torso == 'Half Lower Vinyl Torso - Girl') ? 'selected' : '' }}>Half Lower Vinyl Torso - Girl</option>
			<option value="Half Lower Vinyl Torso - Boy" {{ ($data->torso == 'Half Lower Vinyl Torso - Boy') ? 'selected' : '' }}>Half Lower Vinyl Torso - Boy</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Arms</h4>
		</div>
		<select name="arms" id="arms">
			<option value="">Please Select Arms</option>
			<option value="Full Lengt" {{ ($data->arms == 'Full Lengt') ? 'selected' : '' }}>Full Length</option>
			<option value="3/4 Length" {{ ($data->arms == '3/4 Length') ? 'selected' : '' }}>3/4 Length</option>
			<option value="1/4 Length" {{ ($data->arms == '1/4 Length') ? 'selected' : '' }}>1/4 Length</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Legs Length</h4>
		</div>
		<select name="legs" id="legs">
			<option value="">Please Select Length</option>
			<option value="Full Lengt" {{ ($data->legs == 'Full Lengt') ? 'selected' : '' }}>Full Length</option>
			<option value="3/4 Length" {{ ($data->legs == '3/4 Length') ? 'selected' : '' }}>3/4 Length</option>
			<option value="1/4 Length" {{ ($data->legs == '1/4 Length') ? 'selected' : '' }}>1/4 Length</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Certificate Of Authenticity (COA)</h4>
		</div>
		<select name="certificate_of_auth_coa" id="certificate_of_auth_coa">
			<option value="">Please Select Certificate Of Authenticity (COA)</option>
			<option value="yes" {{ ($data->certificate_of_auth_coa == 'yes') ? 'selected' : '' }}>Yes</option>
			<option value="no" {{ ($data->certificate_of_auth_coa == 'no') ? 'selected' : '' }}>No</option>
			<option value="Not Applicable" {{ ($data->certificate_of_auth_coa == 'Not Applicable') ? 'selected' : '' }}>Not Applicable</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Edition</h4>
		</div>
		<select name="edition" id="edition">
			<option value="">Please Select Edition</option>
			<option value="Open Edition" {{ ($data->edition == 'Open Edition') ? 'selected' : '' }}>Open Edition</option>
			<option value="Limited Edition" {{ ($data->edition == 'Limited Edition') ? 'selected' : '' }}>Limited Edition (LE)</option>
			<option value="Sold Out Limited Edition" {{ ($data->edition == 'Sold Out Limited Edition') ? 'selected' : '' }}>Sold Out Limited Edition (SOLE)</option>
			<option value="Unknown Edition" {{ ($data->edition == 'Unknown Edition') ? 'selected' : '' }}>Unknown Edition</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Eyes</h4>
		</div>
		<select name="eyes" id="eyes">
			<option value="">Please Select Eyes</option>
			<option value="awake" {{ ($data->eyes == 'awake') ? 'selected' : '' }}>Awake</option>
			<option value="asleep" {{ ($data->eyes == 'asleep') ? 'selected' : '' }}>Asleep</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Eyes Material</h4>
		</div>
		<select name="eyes_material" id="eyes_material">
			<option value="">Please Select Eyes Material</option>
			<option value="acrylic" {{ ($data->eyes_material == 'acrylic') ? 'selected' : '' }}>Acrylic</option>
			<option value="glass" {{ ($data->eyes_material == 'glass') ? 'selected' : '' }}>Glass</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Lashes</h4>
		</div>
		<select name="lashes" id="lashes">
			<option value="">Please Select Lashes</option>
			<option value="Rooted Lashes" {{ ($data->lashes == 'Rooted Lashes') ? 'selected' : '' }}>Rooted Lashes</option>
			<option value="Applied Lashes" {{ ($data->lashes == 'Applied Lashess') ? 'selected' : '' }}>Applied Lashes (glued)</option>
			<option value="Painted Lashes" {{ ($data->lashes == 'Painted Lashes') ? 'selected' : '' }}>Painted Lashes</option>
			<option value="No Lashes" {{ ($data->lashes == 'No Lashes') ? 'selected' : '' }}>No Lashes</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Hair</h4>
		</div>
		<select name="hair" id="hair">
			<option value="">Please Select Hair</option>
			<option value="Painted" {{ ($data->hair == 'Painted') ? 'selected' : '' }}>Painted</option>
			<option value="Bald" {{ ($data->hair == 'Bald') ? 'selected' : '' }}>Bald</option>
            <option value="Wig" {{ ($data->hair == 'Wig') ? 'selected' : '' }}>Wig</option>
			<option value="Rooted" {{ ($data->hair == 'Rooted') ? 'selected' : '' }}>Rooted</option>
			<option value="Painted & Rooted" {{ ($data->hair == 'Painted & Rooted') ? 'selected' : '' }}>Painted & Rooted (Combi)</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Paint</h4>
		</div>
		<select name="paint" id="paint">
			<option value="">Please Select Paint</option>
			<option value="Genesis Heat Set Paint" {{ ($data->paint == 'Genesis Heat Set Paint') ? 'selected' : '' }}>Genesis Heat Set Paint (GHSP)</option>
			<option value="Air Dry Paint" {{ ($data->paint == 'Air Dry Paint') ? 'selected' : '' }}>Air Dry Paint</option>
			<option value="Other Paint Type" {{ ($data->paint == 'Other Paint Type') ? 'selected' : '' }}>Other Paint Type</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Weighting</h4>
		</div>
		<select name="weighting" id="weighting">
			<option value="">Please Select Weighting</option>
			<option value="Fine Glass Beads" {{ ($data->weighting == 'Fine Glass Beads') ? 'selected' : '' }}>Fine Glass Beads</option>
			<option value="Polyfil" {{ ($data->weighting == 'Polyfil') ? 'selected' : '' }}>Polyfil</option>
			<option value="Silicone Baby Fat Inserts" {{ ($data->weighting == 'Silicone Baby Fat Inserts') ? 'selected' : '' }}>Silicone Baby Fat Inserts</option>
			<option value="Baby Fat Pellets" {{ ($data->weighting == 'Baby Fat Pellets') ? 'selected' : '' }}>Baby Fat Pellets</option>
			<option value="Poly-Pellets" {{ ($data->weighting == 'Poly-Pellets') ? 'selected' : '' }}>Poly-Pellets</option>
			<option value="Steel Pellets" {{ ($data->weighting == 'Steel Pellets') ? 'selected' : '' }}>Steel Pellets</option>
			<option value="Sand" {{ ($data->weighting == 'Sand') ? 'selected' : '' }}>Sand</option>
			<option value="Other Weighting Materia" {{ ($data->weighting == 'Other Weighting Materia') ? 'selected' : '' }}>Other Weighting Materia</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Skin Color</h4>
		</div>
		<select name="skin_color" id="skin_color">
			<option value="">Please Select Skin Color</option>
			<option value="Caramel" {{ ($data->skin_color == 'Caramel') ? 'selected' : '' }}>Caramel</option>
			<option value="Mottled" {{ ($data->skin_color == 'Mottled') ? 'selected' : '' }}>Mottled</option>
			<option value="Strawberries & Cream" {{ ($data->skin_color == 'Strawberries & Cream') ? 'selected' : '' }}>Strawberries & Cream</option>
            <option value="Dark" {{ ($data->skin_color == 'Dark') ? 'selected' : '' }}>Dark</option>
			<option value="Olive" {{ ($data->skin_color == 'Olive') ? 'selected' : '' }}>Olive</option>
			<option value="Tan" {{ ($data->skin_color == 'Tan') ? 'selected' : '' }}>Tan</option>
			<option value="Fair" {{ ($data->skin_color == 'Fair') ? 'selected' : '' }}>Fair</option>
			<option value="Peaches & Cream" {{ ($data->skin_color == 'Peaches & Cream') ? 'selected' : '' }}>Peaches & Cream</option>
			<option value="Other Complexion" {{ ($data->skin_color == 'Other Complexion') ? 'selected' : '' }}>Other Complexion</option>
		</select>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Race</h4>
		</div>
		<select name="race" id="race">
			<option value="">Please Select Race</option>
			<option value="Aboriginal" {{ ($data->race == 'Aboriginal') ? 'selected' : '' }}>Aboriginal</option>
			<option value="Black / African American" {{ ($data->race == 'Black / African American') ? 'selected' : '' }}>Black / African American</option>
			<option value="Hispanic / Latino" {{ ($data->race == 'Hispanic / Latino') ? 'selected' : '' }}>Hispanic / Latino</option>
            <option value="Asian / Pacific Islander" {{ ($data->race == 'Asian / Pacific Islander') ? 'selected' : '' }}>Asian / Pacific Islander</option>
			<option value="Fantasy / Make Believe" {{ ($data->race == 'Fantasy / Make Believe') ? 'selected' : '' }}>Fantasy / Make Believe</option>
			<option value="Biracial / Multiracial" {{ ($data->race == 'Biracial / Multiracial') ? 'selected' : '' }}>Biracial / Multiracial</option>
			<option value="White / Caucasian" {{ ($data->race == 'White / Caucasian') ? 'selected' : '' }}>White / Caucasian</option>
			<option value="Middle Eastern / Indian" {{ ($data->race == 'Middle Eastern / Indian') ? 'selected' : '' }}>Middle Eastern / Indian</option>
			<option value="Native American Indian" {{ ($data->race == 'Native American Indian') ? 'selected' : '' }}>Native American Indian</option>
			<option value="Animal" {{ ($data->race == 'Animal') ? 'selected' : '' }}>Animal</option>
			<option value="Other Race" {{ ($data->race == 'Other Race') ? 'selected' : '' }}>Other Race</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Twin</h4>
		</div>
		<select name="twin" id="twin">
			<option value="">Please Select twin</option>
			<option value="Not a Twin" {{ ($data->twin == 'Not a Twin') ? 'selected' : '' }}>Not a Twin</option>
			<option value="Twins, Will Sell Separately" {{ ($data->twin == 'Twins, Will Sell Separately') ? 'selected' : '' }}>Twins, Will Sell Separately</option>
			<option value="Twins, Will Not Sell Separately" {{ ($data->twin == 'Twins, Will Not Sell Separately') ? 'selected' : '' }}>Twins, Will Not Sell Separately</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Realborn</h4>
		</div>
		<select name="realborn" id="realborn">
			<option value="">Please Select Realborn</option>
			<option value="tan" {{ ($data->realborn == 'tan') ? 'selected' : '' }}>Yes</option>
			<option value="fair" {{ ($data->realborn == 'fair') ? 'selected' : '' }}>No</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Pacifier Type</h4>
		</div>
		<select name="pacifier_type" id="pacifier_type">
			<option value="">Please Select Pacifier</option>
			<option value="Regular Pacifier" {{ ($data->pacifier_type == 'Regular Pacifier') ? 'selected' : '' }}>Regular Pacifier</option>
			<option value="Magnetic Pacifier" {{ ($data->pacifier_type == 'Magnetic Pacifier') ? 'selected' : '' }}>Magnetic Pacifier</option>
			<option value="Modified Pacifierr" {{ ($data->pacifier_type == 'Modified Pacifierr') ? 'selected' : '' }}>Modified Pacifier</option>
			<option value="Cant Take a Pacifier" {{ ($data->pacifier_type == 'Cant Take a Pacifie') ? 'selected' : '' }}>Can't Take a Pacifier</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Pacifier</h4>
		</div>
		<select name="pacifier" id="pacifier">
			<option value="">Please Select Pacifier</option>
			<option value="Included" {{ ($data->pacifier == 'Included') ? 'selected' : '' }}>Included</option>
			<option value="Not Included" {{ ($data->pacifier == 'Not Included') ? 'selected' : '' }}>Not Included</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Boo Boo</h4>
		</div>
		<select name="boo_boo" id="boo_boo">
			<option value="">Please Select Pacifier</option>
			<option value="Yes" {{ ($data->boo_boo == 'Yes') ? 'selected' : '' }}>Yes</option>
			<option value="No" {{ ($data->boo_boo == 'No') ? 'selected' : '' }}>No</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Drink and Wet</h4>
		</div>
		<select name="drink_wet" id="drink_wet">
			<option value="">Please Select Drink and Wet</option>
			<option value="yes" {{ ($data->drink_wet == 'yes') ? 'selected' : '' }}>Yes</option>
			<option value="no" {{ ($data->drink_wet == 'no') ? 'selected' : '' }}>No</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Smoke free Environment</h4>
		</div>
		<select name="smoke_free_env" id="smoke_free_env">
			<option value="">Please Select Smoke free Environment</option>
			<option value="yes" {{ ($data->smoke_free_env == 'yes') ? 'selected' : '' }}>Yes</option>
			<option value="no" {{ ($data->smoke_free_env == 'no') ? 'selected' : '' }}>No</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">Choose Pet free Environment</h4>
		</div>
		<select name="pet_free_env" id="pet_free_env">
			<option value="">Please Select Pet free Environment</option>
			<option value="yes" {{ ($data->pet_free_env == 'yes') ? 'selected' : '' }}>Yes</option>
			<option value="no" {{ ($data->pet_free_env == 'no') ? 'selected' : '' }}>No</option>
		</select>
	</div>
</div>




<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Ordering Information') }} </h4>
			<p class="sub-heading">{{ __(' ') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="text-editor">
			<textarea class="nic-edit-p" name="ordering_information">{{$data->ordering_information}}</textarea>
		</div>
	</div>

</div>



<div class="row">
	<div class="col-lg-12">
		<div class="featured-keyword-area">
			<div class="left-area">
				<h4 class="heading">{{ __('Shipping Charges Details') }}</h4>
			</div>
			<div class="feature-tag-top-filds" id="feature-section">
				<?php  
					$shipping_charges_arr = json_decode($data->shipping_charges);
					// echo "<pre>";
					// print_r($shipping_charges_arr);
					// exit;
					foreach($shipping_charges_arr as $shippingcharge){
				?>
				<div class="feature-area">
					<span class="remove feature-remove"><i class="fas fa-times"></i></span>
					<div class="row">
						<div class="col-lg-4">
							<input type="text" name="shipping_charges[country_name][]" value="{{ $shippingcharge[0] }}" class="input-field" placeholder="{{ __('Enter Country Name') }}">
						</div>
						<div class="col-lg-4">
							<input type="text" name="shipping_charges[shipping_cost][]" value="{{ $shippingcharge[1] }}" class="input-field" placeholder="{{ __('Enter Shipping Cost') }}">
						</div>
						<div class="col-lg-4">
							<input type="text" name="shipping_charges[shipping_type][]" value="{{ $shippingcharge[2] }}" class="input-field" placeholder="{{ __('Enter Shipping Type') }}">
						</div>
					</div>
				</div>
				<?php } ?>

			</div>

			<a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="checkbox-wrapper">
			<input type="checkbox" name="seo_check" value="1" class="checkclick" id="allowProductSEO" {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }}>
			<label for="allowProductSEO">{{ __('Allow Product SEO') }}</label>
		</div>
	</div>
</div>



<div class="{{ ($data->meta_tag == null && strip_tags($data->meta_description) == null) ? "showbox":"" }}">
	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">{{ __('Meta Tags') }} *</h4>
			</div>
		</div>
		<div class="col-lg-12">
			<ul id="metatags" class="myTags">
				@if(!empty($data->meta_tag))
				@foreach ($data->meta_tag as $element)
				<li>{{ $element }}</li>
				@endforeach
				@endif
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">
					{{ __('Meta Description') }} *
				</h4>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="text-editor">
				<textarea name="meta_description" class="input-field" placeholder="{{ __('Details') }}">{{ $data->meta_description }}</textarea>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 text-center">
		<button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4">

	<div class="add-product-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="product-description">
					<div class="body-area">



						<div class="row">
							<div class="col-lg-12">
								<div class="left-area">
									<h4 class="heading">{{ __('Feature Image') }} *</h4>
								</div>
							</div>
							<div class="col-lg-12">

								<div class="panel panel-body">
									<div class="span4 cropme text-center" id="landscape" style="width: 100%; height: 285px; border: 1px dashed #ddd; background: #f1f1f1;">
										<a href="javascript:;" id="crop-image" class="d-inline-block mybtn1">
											<i class="icofont-upload-alt"></i> {{ __('Upload Image Here') }}
										</a>
									</div>
								</div>




							</div>
						</div>

						<input type="hidden" id="feature_photo" name="photo" value="{{ $data->photo }}" accept="image/*">

						<div class="row">
							<div class="col-lg-12">
								<div class="left-area">
									<h4 class="heading">
										{{ __('Product Gallery Images') }} *
									</h4>
								</div>
							</div>
							<div class="col-lg-12">
								<a href="javascript" class="set-gallery" data-toggle="modal" data-target="#setgallery">
									<input type="hidden" value="{{$data->id}}">
									<i class="icofont-plus"></i> {{ __('Set Gallery') }}
								</a>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-12">
								<div class="left-area">
									<h4 class="heading">
										{{ __('Product Current Price') }}*
									</h4>
									<p class="sub-heading">
										({{ __('In') }} {{$sign->name}})
									</p>
								</div>
							</div>
							<div class="col-lg-12">
								<input name="price" type="number" class="input-field" placeholder="e.g 20" step="0.01" min="0" value="{{round($data->price * $sign->value , 2)}}" required="">
							</div>
						</div>

						{{-- <div class="row">
													<div class="col-lg-12">
														<div class="left-area">
																<h4 class="heading">{{ __('Product Previous Price') }}*</h4>
						<p class="sub-heading">{{ __('(Optional)') }}</p>
					</div>
				</div>
				<div class="col-lg-12">
					<input name="previous_price" step="0.01" type="number" class="input-field" placeholder="e.g 20" value="{{round($data->previous_price * $sign->value , 2)}}" min="0">
				</div>
			</div> --}}

			<div class="row">
				<div class="col-lg-12">
					<div class="left-area">
						<h4 class="heading">{{ __('Youtube Video URL') }}</h4>
						<p class="sub-heading">{{ __('(Optional)') }}</p>
					</div>
				</div>
				<div class="col-lg-12">
					<input name="youtube" type="text" class="input-field" placeholder="{{ __('Enter Youtube Video URL') }}" value="{{ $data->youtube }}"> 
				</div>
			</div> 




			<div class="row">
				<div class="col-lg-12">
					<div class="checkbox-wrapper">
						<input type="checkbox" name="featured" value="1" class="checkclick" id="featured" {{ ($data->featured != null || $data->featured == 1) ? 'checked':'' }}>
						<label for="featured">Allow Featured</label>
					</div>
				</div>
			</div>




			<!-- <div class="row">
				<div class="col-lg-12">
					<div class="left-area">

					</div>
				</div>
				<div class="col-lg-12">
					<div class="featured-keyword-area">
						<div class="left-area">
							<h4 class="heading">{{ __('Feature Tags') }}</h4>
						</div>

						<div class="feature-tag-top-filds" id="feature-section">
							@if(!empty($data->features))

							@foreach($data->features as $key => $data1)

							<div class="feature-area">
								<span class="remove feature-remove"><i class="fas fa-times"></i></span>
								<div class="row">
									<div class="col-lg-6">
										<input type="text" name="features[]" class="input-field" placeholder="{{ __('Enter Your Keyword') }}" value="{{ $data->features[$key] }}">
									</div>

									<div class="col-lg-6">
										<div class="input-group colorpicker-component cp">
											<input type="text" name="colors[]" value="{{ $data->colors[$key] }}" class="input-field cp" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
								</div>
							</div>


							@endforeach
							@else

							<div class="feature-area">
								<span class="remove feature-remove"><i class="fas fa-times"></i></span>
								<div class="row">
									<div class="col-lg-6">
										<input type="text" name="features[]" class="input-field" placeholder="{{ __('Enter Your Keyword') }}">
									</div>

									<div class="col-lg-6">
										<div class="input-group colorpicker-component cp">
											<input type="text" name="colors[]" value="#000000" class="input-field cp" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
								</div>
							</div>

							@endif
						</div>

						<a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
					</div>
				</div>
			</div> -->


			<div class="row">
				<div class="col-lg-12">
					<div class="left-area">
						<h4 class="heading">{{ __('Tags') }} *</h4>
					</div>
				</div>
				<div class="col-lg-12">
					<ul id="tags" class="myTags">
						@if(!empty($data->tags))
						@foreach ($data->tags as $element)
						<li>{{ $element }}</li>
						@endforeach
						@endif
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
</div>
</div>
</div>

</form>
</div>

<div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="top-area">
					<div class="row">
						<div class="col-sm-6 text-right">
							<div class="upload-img-btn">
								<form method="POST" enctype="multipart/form-data" id="form-gallery">
									{{ csrf_field() }}
									<input type="hidden" id="pid" name="product_id" value="">
									<input type="file" name="gallery[]" class="hidden" id="uploadgallery" accept="image/*" multiple>
									<label for="image-upload" id="prod_gallery"><i class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
								</form>
							</div>
						</div>
						<div class="col-sm-6">
							<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
						</div>
						<div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small> )</div>
					</div>
				</div>
				<div class="gallery-images">
					<div class="selected-image">
						<div class="row">


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
	// Gallery Section Update

	$(document).on("click", ".set-gallery", function() {
		var pid = $(this).find('input[type=hidden]').val();
		$('#pid').val(pid);
		$('.selected-image .row').html('');
		$.ajax({
			type: "GET",
			url: "{{ route('admin-gallery-show') }}",
			data: {
				id: pid
			},
			success: function(data) {
				if (data[0] == 0) {
					$('.selected-image .row').addClass('justify-content-center');
					$('.selected-image .row').html('<h3>{{ __('
						No Images Found.
						') }}</h3>');
				} else {
					$('.selected-image .row').removeClass('justify-content-center');
					$('.selected-image .row h3').remove();
					var arr = $.map(data[1], function(el) {
						return el
					});

					for (var k in arr) {
						$('.selected-image .row').append('<div class="col-sm-6">' +
							'<div class="img gallery-img">' +
							'<span class="remove-img"><i class="fas fa-times"></i>' +
							'<input type="hidden" value="' + arr[k]['id'] + '">' +
							'</span>' +
							'<a href="' + '{{asset('
							assets / images / galleries ').' / '}}' + arr[k]['photo'] + '" target="_blank">' +
							'<img src="' + '{{asset('
							assets / images / galleries ').' / '}}' + arr[k]['photo'] + '" alt="gallery image">' +
							'</a>' +
							'</div>' +
							'</div>');
					}
				}

			}
		});
	});


	$(document).on('click', '.remove-img', function() {
		var id = $(this).find('input[type=hidden]').val();
		$(this).parent().parent().remove();
		$.ajax({
			type: "GET",
			url: "{{ route('admin-gallery-delete') }}",
			data: {
				id: id
			}
		});
	});

	$(document).on('click', '#prod_gallery', function() {
		$('#uploadgallery').click();
	});


	$("#uploadgallery").change(function() {
		$("#form-gallery").submit();
	});

	$(document).on('submit', '#form-gallery', function() {
		$.ajax({
			url: "{{ route('admin-gallery-store') }}",
			method: "POST",
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				if (data != 0) {
					$('.selected-image .row').removeClass('justify-content-center');
					$('.selected-image .row h3').remove();
					var arr = $.map(data, function(el) {
						return el
					});
					for (var k in arr) {
						$('.selected-image .row').append('<div class="col-sm-6">' +
							'<div class="img gallery-img">' +
							'<span class="remove-img"><i class="fas fa-times"></i>' +
							'<input type="hidden" value="' + arr[k]['id'] + '">' +
							'</span>' +
							'<a href="' + '{{asset('
							assets / images / galleries ').' / '}}' + arr[k]['photo'] + '" target="_blank">' +
							'<img src="' + '{{asset('
							assets / images / galleries ').' / '}}' + arr[k]['photo'] + '" alt="gallery image">' +
							'</a>' +
							'</div>' +
							'</div>');
					}
				}

			}

		});
		return false;
	});


	// Gallery Section Update Ends
</script>

<script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>

<script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

<script type="text/javascript">
	$('.cropme').simpleCropper();
</script>


<script type="text/javascript">
	$(document).ready(function() {

		let html = `<img src="{{ empty($data->photo) ? asset('assets/images/noimage.png') : (filter_var($data->photo, FILTER_VALIDATE_URL) ? $data->photo : asset('assets/images/products/'.$data->photo)) }}" alt="">`;
		$(".span4.cropme").html(html);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

	});


	$('.ok').on('click', function() {

		setTimeout(

			function() {

				var img = $('#feature_photo').val();

				$.ajax({
					url: "{{route('admin-prod-upload-update',$data->id)}}",
					type: "POST",
					data: {
						"image": img
					},
					success: function(data) {
						if (data.status) {
							$('#feature_photo').val(data.file_name);
						}
						if ((data.errors)) {
							for (var error in data.errors) {
								$.notify(data.errors[error], "danger");
							}
						}
					}
				});

			}, 1000);

	});
</script>

<script type="text/javascript">
	$('#imageSource').on('change', function() {
		var file = this.value;
		if (file == "file") {
			$('#f-file').show();
			$('#f-link').hide();
		}
		if (file == "link") {
			$('#f-file').hide();
			$('#f-link').show();
		}
	});
</script>

<script src="{{asset('assets/admin/js/product.js')}}"></script>
@endsection