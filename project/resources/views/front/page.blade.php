@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
      <h2>{{$page->title}}</h2>
    </div>
</section>
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
         @include('front.menu')
        </div>
</section>
<!---------- Contact Img Bottom --------->
<section class="privacy-txt">
    <div class="container">
      <?php echo $page->details; ?>
    </div>
</section>
@endsection