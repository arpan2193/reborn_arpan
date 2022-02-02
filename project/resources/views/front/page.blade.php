@extends('layouts.front')
@section('content')
<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
      <h2>{{$page->title}}</h2>
    </div>
</section>
<!---------- Contact Img Bottom --------->
<?php echo $page->details; ?>
@endsection