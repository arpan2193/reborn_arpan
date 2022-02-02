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
				<h4 class="heading">{{ __('Physical Product') }} <a class="add-btn" href="{{ route('admin-prod-types') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
				</h4>
				<ul class="links">
					<li>
						<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
					</li>
					<li>
						<a href="javascript:;">{{ __('Products') }} </a>
					</li>
					<li>
						<a href="{{ route('admin-prod-index') }}">{{ __('All Products') }}</a>
					</li>
					<li>
						<a href="{{ route('admin-prod-types') }}">{{ __('Add Product') }}</a>
					</li>
					<li>
						<a href="{{ route('admin-prod-physical-create') }}">{{ __('Physical Product') }}</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<form id="geniusform" action="{{route('admin-prod-store')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row">
			<div class="col-lg-8">
				<div class="add-product-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="product-description">
								<div class="body-area">

									<div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
									</div>

									@include('includes.admin.form-both')

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __('Product Name') }} </h4>
												<p class="sub-heading">{{ __(' ') }}</p>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="text" class="input-field" placeholder="{{ __('Enter Product Name') }}" name="name">
										</div>

									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __('Product Sku') }} </h4>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="text" class="input-field" placeholder="{{ __('Enter Product Sku') }}" name="sku" value="{{ Str::random(3).substr(time(), 6,8).Str::random(3) }}">

											{{-- <div class="checkbox-wrapper">
												<input type="checkbox" name="product_condition_check" class="checkclick"
													id="conditionCheck" value="1">
												<label for="conditionCheck">{{ __('Allow Product Condition') }}</label>
										</div> --}}

									</div>
								</div>

								{{-- <div class="showbox">
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">{{ __('Product Condition') }}</h4>
							</div>
						</div>
						<div class="col-lg-12">
							<select name="product_condition">
								<option value="2">{{ __('New') }}</option>
								<option value="1">{{ __('Used') }}</option>
							</select>
						</div>
					</div>
				</div> --}}

				<div class="row">
					<div class="col-lg-12">
						<div class="left-area">
							<h4 class="heading">{{ __('Category') }}</h4>
						</div>
					</div>
					<div class="col-lg-12">
						<select id="cat" name="category_id">
							<option value="">{{ __('Select Category') }}</option>
							@foreach($cats as $cat)
							<option data-href="{{ route('admin-subcat-load',$cat->id) }}" value="{{ $cat->id }}">{{$cat->name}}</option>
							@endforeach
						</select>
					</div>
				</div>

				{{--<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __('Sub Category') }}</h4>
			</div>
		</div>
		<div class="col-lg-12">
			<select id="subcat" name="subcategory_id" disabled="">
				<option value="">{{ __('Select Sub Category') }}</option>
			</select>
		</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Child Category') }}</h4>
		</div>
	</div>
	<div class="col-lg-12">
		<select id="childcat" name="childcategory_id" disabled="">
			<option value="">{{ __('Select Child Category') }}</option>
		</select>
	</div>
</div>


<div id="catAttributes"></div>
<div id="subcatAttributes"></div>
<div id="childcatAttributes"></div>







<div class="row">
	<div class="col-lg-12">
		<div class="left-area">

		</div>
	</div>
	<div class="col-lg-12">
		<ul class="list">
			<li>
				<input class="checkclick1" name="shipping_time_check" type="checkbox" id="check1" value="1">
				<label for="check1">{{ __('Allow Estimated Shipping Time') }}</label>
			</li>
		</ul>
	</div>
</div>



<div class="showbox">
	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">{{ __('Product Estimated Shipping Time') }} </h4>
			</div>
		</div>
		<div class="col-lg-12">
			<input type="text" class="input-field" placeholder="{{ __('Estimated Shipping Time') }}" name="ship">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
		</div>
	</div>
	<div class="col-lg-12">
		<ul class="list">
			<li>
				<input name="size_check" type="checkbox" id="size-check" value="1">
				<label for="size-check">{{ __('Allow Product Sizes') }}</label>
			</li>
		</ul>
	</div>
</div>
<div class="showbox" id="size-display">
	<div class="row">
		<div class="col-lg-12">
		</div>
		<div class="col-lg-12">
			<div class="product-size-details" id="size-section">
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
							<input type="text" name="size[]" class="input-field" placeholder="{{ __('Size Name') }}">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>
								{{ __('Size Qty') }} :
								<span>
									{{ __('(Number of quantity of this size)') }}
								</span>
							</label>
							<input type="number" name="size_qty[]" class="input-field" placeholder="{{ __('Size Qty') }}" value="1" min="1">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>
								{{ __('Size Price') }} :
								<span>
									{{ __('(This price will be added with base price)') }}
								</span>
							</label>
							<input type="number" name="size_price[]" class="input-field" placeholder="{{ __('Size Price') }}" value="0" min="0">
						</div>
					</div>
				</div>
			</div>

			<a href="javascript:;" id="size-btn" class="add-more"><i class="fas fa-plus"></i>{{ __('Add More Size') }} </a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="left-area">

		</div>
	</div>
	<div class="col-lg-12">
		<ul class="list">
			<li>
				<input class="checkclick1" name="color_check" type="checkbox" id="check3" value="1">
				<label for="check3">{{ __('Allow Product Colors') }}</label>
			</li>
		</ul>
	</div>
</div>

<div class="showbox">

	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">
					{{ __('Product Colors') }}
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
	</div>

</div>

<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
		</div>
	</div>
	<div class="col-lg-12">
		<ul class="list">
			<li>
				<input class="checkclick1" name="whole_check" type="checkbox" id="whole_check" value="1">
				<label for="whole_check">{{ __('Allow Product Whole Sell') }}</label>
			</li>
		</ul>
	</div>
</div>

<div class="showbox">
	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">

			</div>
		</div>
		<!-- <div class="col-lg-12">
			<div class="featured-keyword-area">
				<div class="feature-tag-top-filds" id="whole-section">
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
				</div>

				<a href="javascript:;" id="whole-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
			</div>
		</div> -->
	</div>
</div>

<div class="row" id="stckprod">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">{{ __('Product Stock') }}</h4>
			<p class="sub-heading">{{ __('(Leave Empty will Show Always Available)') }}</p>
		</div>
	</div>
	<div class="col-lg-12">
		<input name="stock" type="text" class="input-field" placeholder="{{ __('e.g 20') }}">
		<div class="checkbox-wrapper">
			<input type="checkbox" name="measure_check" class="checkclick" id="allowProductMeasurement" value="1">
			<label for="allowProductMeasurement">{{ __('Allow Product Measurement') }}</label>
		</div>
	</div>
</div>



<div class="showbox">

	<div class="row">
		<div class="col-lg-6">
			<div class="left-area">
				<h4 class="heading">{{ __('Product Measurement') }}</h4>
			</div>
		</div>
		<div class="col-lg-6">
			<select id="product_measure">
				<option value="">{{ __('None') }}</option>
				<option value="Gram">{{ __('Gram') }}</option>
				<option value="Kilogram">{{ __('Kilogram') }}</option>
				<option value="Litre">{{ __('Litre') }}</option>
				<option value="Pound">{{ __('Pound') }}</option>
				<option value="Custom">{{ __('Custom') }}</option>
			</select>
		</div>
		<div class="col-lg-6 hidden" id="measure">
			<input name="measure" type="text" id="measurement" class="input-field" placeholder="{{ __('Enter Unit') }}">
		</div>
	</div>

</div> --}}


<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">
				{{ __('Product Description') }}
			</h4>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="text-editor">
			<textarea class="nic-edit-p" name="details"></textarea>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-lg-12">
		<div class="left-area">
			<h4 class="heading">
				{{ __('Product Buy/Return Policy') }}
			</h4>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="text-editor">
			<textarea class="nic-edit-p" name="return_policy"></textarea>
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
		<input type="text" class="input-field" placeholder="{{ __('Enter Kit Name') }}" name="kit_name">
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
		<input type="text" class="input-field" placeholder="{{ __('Enter Sculpt') }}" name="sculpt">
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
		<input type="text" class="input-field" placeholder="{{ __('Enter Artist') }}" name="artist">
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
		<input type="text" class="input-field" placeholder="{{ __('Enter Length by Inch') }}" name="length_by_inch">
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
		<input type="text" class="input-field" placeholder="{{ __('Enter Length by cm') }}" name="length_by_centimeters">
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
			<option value="1">Yes</option>
			<option value="0" selected>No</option>
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
		<input type="text" class="input-field" placeholder="{{ __('Enter Weight in pound') }}" name="weight">
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
			<option value="Vinyl">Vinyl</option>
			<option value="Silicone">Silicone</option>
			<option value="Other">Other / Not Applicable</option>
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
			<option value="vinyl">Vinyl</option>
			<option value="Silicone">Silicone</option>
			<optioin value="Cloth">Cloth</option>
			<option value="Other">Other / Not Applicable</option>
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
			<option value="vinyl">Vinyl</option>
			<option value="Silicone">Silicone</option>
			<optioin value="Cloth">Cloth</option>
			<option value="Other">Other / Not Applicable</option>
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
			<option value="Mini">Mini</option>
			<option value="Preemie">Preemie</option>
			<option value="New born">New Born</option>
			<option value="Older Baby">Older Baby</option>
			<option value="Toddler">Toddler</option>
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
			<option value="boy">Boy</option>
			<option value="girl">Girl</option>
			<option value="Your Choice">Your Choice</option>
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
			<option value="Full Front Plate - Boy">Full Front Plate - Boy</option>
			<option value="Full Front Plate - Girl">Full Front Plate - Girl</option>
			<option value="Full Front Plate - Non Gendered">Full Front Plate - Non Gendered</option>
			<option value="Full Back Plate">Full Back Plate (with baby butt)</option>
			<option value="Belly Plate">Belly Plate [no chest or genitals]</option>
			<option value="Full Vinyl Torso - Girl">Full Vinyl Torso - Girl</option>
			<option value="Full Vinyl Torso - Boy">Full Vinyl Torso - Boy</option>
			<option value="Half Upper Vinyl Torso - Non Gendered">Half Upper Vinyl Torso - Non Gendered</option>
			<option value="Half Lower Vinyl Torso - Girl">Half Lower Vinyl Torso - Girl</option>
			<option value="Half Lower Vinyl Torso - Boy">Half Lower Vinyl Torso - Boy</option>
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
			<option value="Full Lengt">Full Length</option>
			<option value="3/4 Length">3/4 Length</option>
			<option value="1/4 Length">1/4 Length</option>
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
			<option value="Full Lengt">Full Length</option>
			<option value="3/4 Length">3/4 Length</option>
			<option value="1/4 Length">1/4 Length</option>
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
			<option value="yes">Yes</option>
			<option value="no">No</option>
			<option value="Not Applicable">Not Applicable</option>
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
			<option value="Open Edition">Open Edition</option>
			<option value="Limited Edition">Limited Edition (LE)</option>
			<option value="Sold Out Limited Edition">Sold Out Limited Edition (SOLE)</option>
			<option value="Unknown Edition">Unknown Edition</option>
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
			<option value="awake">Awake</option>
			<option value="asleep">Asleep</option>
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
			<option value="acrylic">Acrylic</option>
			<option value="glass">Glass</option>
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
			<option value="Rooted Lashes">Rooted Lashes</option>
			<option value="Applied Lashes">Applied Lashes (glued)</option>
			<option value="Painted Lashes">Painted Lashes</option>
			<option value="No Lashes">No Lashes</option>
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
			<option value="Painted">Painted</option>
			<option value="Bald">Bald</option>
            <option value="Wig">Wig</option>
			<option value="Rooted">Rooted</option>
			<option value="Painted & Rooted">Painted & Rooted (Combi)</option>
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
			<option value="Genesis Heat Set Paint">Genesis Heat Set Paint (GHSP)</option>
			<option value="Air Dry Paint">Air Dry Paint</option>
			<option value="Other Paint Type">Other Paint Type</option>
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
			<option value="Fine Glass Beads">Fine Glass Beads</option>
			<option value="Polyfil">Polyfil</option>
			<option value="Silicone Baby Fat Inserts">Silicone Baby Fat Inserts</option>
			<option value="Baby Fat Pellets">Baby Fat Pellets</option>
			<option value="Poly-Pellets">Poly-Pellets</option>
			<option value="Steel Pellets">Steel Pellets</option>
			<option value="Sand">Sand</option>
			<option value="Other Weighting Materia">Other Weighting Materia</option>
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
			<option value="Caramel">Caramel</option>
			<option value="Mottled">Mottled</option>
			<option value="Strawberries & Cream">Strawberries & Cream</option>
            <option value="Dark">Dark</option>
			<option value="Olive">Olive</option>
			<option value="Tan">Tan</option>
			<option value="Fair">Fair</option>
			<option value="Peaches & Cream">Peaches & Cream</option>
			<option value="Other Complexion">Other Complexion</option>
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
			<option value="Aboriginal">Aboriginal</option>
			<option value="Black / African American">Black / African American</option>
			<option value="Hispanic / Latino">Hispanic / Latino</option>
            <option value="Asian / Pacific Islander">Asian / Pacific Islander</option>
			<option value="Fantasy / Make Believe">Fantasy / Make Believe</option>
			<option value="Biracial / Multiracial">Biracial / Multiracial</option>
			<option value="White / Caucasian">White / Caucasian</option>
			<option value="Middle Eastern / Indian">Middle Eastern / Indian</option>
			<option value="Native American Indian">Native American Indian</option>
			<option value="Animal">Animal</option>
			<option value="Other Race">Other Race</option>
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
			<option value="Not a Twin">Not a Twin</option>
			<option value="Twins, Will Sell Separately">Twins, Will Sell Separately</option>
			<option value="Twins, Will Not Sell Separately">Twins, Will Not Sell Separately</option>
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
			<option value="tan">Yes</option>
			<option value="fair">No</option>

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
			<option value="Regular Pacifier">Regular Pacifier</option>
			<option value="Magnetic Pacifier">Magnetic Pacifier</option>
			<option value="Modified Pacifierr">Modified Pacifier</option>
			<option value="Can't Take a Pacifier">Can't Take a Pacifier</option>
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
			<option value="Included">Included</option>
			<option value="Not Included">Not Included</option>
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
			<option value="Yes">Yes</option>
			<option value="No">No</option>
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
			<option value="yes">Yes</option>
			<option value="no">No</option>
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
			<option value="yes">Yes</option>
			<option value="no">No</option>
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
			<option value="yes">Yes</option>
			<option value="no">No</option>
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
			<textarea class="nic-edit-p" name="ordering_information"></textarea>
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
				<div class="feature-area">
					<span class="remove feature-remove"><i class="fas fa-times"></i></span>
					<div class="row">
						<div class="col-lg-4">
							<input type="text" name="shipping_charges[country_name][]" class="input-field" placeholder="{{ __('Enter Country Name') }}">
						</div>
						<div class="col-lg-4">
							<input type="text" name="shipping_charges[shipping_cost][]" class="input-field" placeholder="{{ __('Enter Shipping Cost in USD') }}">
						</div>
						<div class="col-lg-4">
							<input type="text" name="shipping_charges[shipping_type][]" class="input-field" placeholder="{{ __('Enter Shipping Type') }}">
						</div>


					</div>
				</div>
			</div>

			<a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
		</div>
	</div>
</div>


<!-- extra field end -->
<div class="row">
	<div class="col-lg-12">
		<div class="checkbox-wrapper">
			<input type="checkbox" name="seo_check" value="1" class="checkclick" id="allowProductSEO" value="1">
			<label for="allowProductSEO">{{ __('Allow Product SEO') }}</label>
		</div>
	</div>
</div>



<div class="showbox">
	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">{{ __('Meta Tags') }} </h4>
			</div>
		</div>
		<div class="col-lg-12">
			<ul id="metatags" class="myTags">
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="left-area">
				<h4 class="heading">
					{{ __('Meta Description') }}
				</h4>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="text-editor">
				<textarea name="meta_description" class="input-field" placeholder="{{ __('Meta Description') }}"></textarea>
			</div>
		</div>
	</div>
</div>




<div class="row">
	<div class="col-lg-12 text-center">
		<button class="addProductSubmit-btn" type="submit">{{ __('Create Product') }}</button>
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
									<h4 class="heading">{{ __('Feature Image') }} </h4>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-body">
									<div class="span4 cropme text-center" id="landscape" style="width: 100%; height: 285px; border: 1px dashed #ddd; background: #f1f1f1;">
										<a href="javascript:;" id="crop-image" class=" mybtn1" style="">
											<i class="icofont-upload-alt"></i> {{ __('Upload Image Here') }}
										</a>
									</div>
								</div>
							</div>
						</div>

						<input type="hidden" id="feature_photo" name="photo" value="">

						<input type="file" name="gallery[]" class="hidden" id="uploadgallery" accept="image/" multiple>

						<div class="row mb-4">
							<div class="col-lg-12 mb-2">
								<div class="left-area">
									<h4 class="heading">
										{{ __('Product Gallery Images') }}
									</h4>
								</div>
							</div>
							<div class="col-lg-12">
								<a href="#" class="set-gallery" data-toggle="modal" data-target="#setgallery">
									<i class="icofont-plus"></i> {{ __('Set Gallery') }}
								</a>
							</div>
						</div>



						<div class="row">
							<div class="col-lg-12">
								<div class="left-area">
									<h4 class="heading">
										{{ __('Product Current Price') }}
									</h4>
									<p class="sub-heading">
										({{ __('In') }} {{$sign->name}})
									</p>
								</div>
							</div>
							<div class="col-lg-12">
								<input name="price" type="number" class="input-field" placeholder="{{ __('e.g 20') }}" step="0.01" min="0">
							</div>

							
						</div>

						<div class="row">
							<div class="col-lg-12">
								<div class="checkbox-wrapper">
									<input type="checkbox" name="featured" value="1" class="checkclick" id="featured">
									<label for="featured">Allow Featured</label>
								</div>
							</div>
						</div>

						{{-- <div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __('Product Previous Price') }}</h4>
						<p class="sub-heading">{{ __('(Optional)') }}</p>
					</div>
				</div>
				<div class="col-lg-12">
					<input name="previous_price" step="0.01" type="number" class="input-field" placeholder="{{ __('e.g 20') }}" min="0">
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
					<input name="youtube" type="text" class="input-field" placeholder="{{ __('Enter Youtube Video URL') }}">
				</div>
			</div> 
			<div class="row">
				<div class="col-lg-12">
					<div class="left-area">

					</div>
				</div>
				<!-- <div class="col-lg-12">
					<div class="featured-keyword-area">
						<div class="left-area">
							<h4 class="heading">{{ __('Feature Tags') }}</h4>
						</div>
						<div class="feature-tag-top-filds" id="feature-section">
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
						</div>

						<a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
					</div>
				</div> -->
			</div>


			<div class="row">
				<div class="col-lg-12">
					<div class="left-area">
						<h4 class="heading">{{ __('Tags') }} </h4>
					</div>
				</div>
				<div class="col-lg-12">
					<ul id="tags" class="myTags">
					</ul>
				</div>
			</div>
			<input type="hidden" name="type" value="Dolls">

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
								<label for="image-upload" id="prod_gallery"><i class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
							</div>
						</div>
						<div class="col-sm-6">
							<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
						</div>
						<div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small>
							)</div>
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

<script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

<script type="text/javascript">
	// Gallery Section Insert

	$(document).on('click', '.remove-img', function() {
		var id = $(this).find('input[type=hidden]').val();
		$('#galval' + id).remove();
		$(this).parent().parent().remove();
	});

	$(document).on('click', '#prod_gallery', function() {
		$('#uploadgallery').click();
		$('.selected-image .row').html('');
		$('#geniusform').find('.removegal').val(0);
	});


	$("#uploadgallery").change(function() {
		var total_file = document.getElementById("uploadgallery").files.length;
		for (var i = 0; i < total_file; i++) {
			$('.selected-image .row').append('<div class="col-sm-6">' +
				'<div class="img gallery-img">' +
				'<span class="remove-img"><i class="fas fa-times"></i>' +
				'<input type="hidden" value="' + i + '">' +
				'</span>' +
				'<a href="' + URL.createObjectURL(event.target.files[i]) + '" target="_blank">' +
				'<img src="' + URL.createObjectURL(event.target.files[i]) + '" alt="gallery image">' +
				'</a>' +
				'</div>' +
				'</div> '
			);
			$('#geniusform').append('<input type="hidden" name="galval[]" id="galval' + i +
				'" class="removegal" value="' + i + '">')
		}

	});

	// Gallery Section Insert Ends
</script>

<script type="text/javascript">
	$('.cropme').simpleCropper();
</script>


<script src="{{asset('assets/admin/js/product.js')}}"></script>
@endsection
