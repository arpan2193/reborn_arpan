@extends('layouts.front')
@section('content')

<!---------- About Bottom --------->
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>contact us</h2>
    </div>
</section>
@include('front.menu')
<!-- <section class="filter">
        <div class="container">
            <div class="row d-flex">
                    <div class="col-sm-6">
                        <h1 class="filter-titel text-center" id="flip">Filters</h1>
                    </div>
                    <div class="col-sm-6">
                        <h1 class="side-menu-panel">
                            Menu
                        </h1>
                    </div>
                </div>

            </div>
            <div class="menu-panel">
             <button type="button" class="btn-close" ></button>
                <ul class="cat-list">
                    <li><a href="{{url('') }}"> Home </a></li>
                    <li><a href="{{url('')}}/product/featured"> Featured </a></li>                   
                    <li><a href="{{url('')}}/categories/custom-made"> custom Made</a></li>
                    <li><a href="{{url('')}}/categories/collector-resale"> Collector Resale</a></li>
                    <li><a href="{{url('')}}/categories/alternative"> Alternative</a></li>
                    <li><a href="#"> Atlas Art Dolls </a></li>
                    <li><a href="{{url('')}}/categories/accessories"> Accessories </a></li>
                    <li><a href="{{url('')}}/categories/adopted"> Adopted </a></li>
                    <li><a href="{{url('')}}/categories/nurseries"> Nurseries</a></li>
                    <li><a href="{{url('')}}/categories/doll-kits"> Doll Kits</a></li>
                </ul>
            </div>
    </section> -->
<!---------- About Bottom End --------->
<!---------- Contact Img Bottom --------->
<section class="contact-img-bottom">
    <div class="box">
    <?php  $val_title = $ps->contact_title; ?>
        <?php echo $val_title; ?> 
       
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dui enim, eleifend nec pharetra
        nec, tincidunt nec magna. </p> -->
     <p> <?php $val_text   = $ps->contact_text;
                          echo $val_text; ?></p>
    </div>
</section>
<!---------- Contact Img Bottom End --------->
<!---------- Contact Frombox --------->
<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" class="mainWrap">
                    <input placeholder="Full Name" type="text" class="name" />
                    <input placeholder="Email" type="email" class="email" />
                    <input placeholder="Country" type="email" class="email" />
                    <input placeholder="Phone" type="number" class="name" />
                    <textarea placeholder="Tell us your enquiry" class="mainArea"></textarea>
                    <button class="bigBtn">Submit Now</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!---------- Contact Frombox End --------->

<!---------- Contact map --------->
<section class="contact-form">
        <div class="row no-gutters">
            <div class="col-md-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-5 find">
                <h5>Find US Here</h5>
                <ul>
                    <li><span>phone:</span> {{$ps->phone}}</li>
                    <li><span>Address:</span>{{$ps->street}}</li>
                    <li><span>Email Id:</span> {{$ps->email}}</li>
                    <li><span>Website:</span>{{$ps->site}}</li>
                </ul>
            </div>
        </div>
</section>
<!---------- Contact map End --------->
@endsection