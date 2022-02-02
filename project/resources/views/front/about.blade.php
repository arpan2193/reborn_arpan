@extends('layouts.front')
@section('content')
<section class="about-text">
    <div class="about-img">
        <img src="{{asset('assets/front/images/banner-about.jpg')}}" class="img-fluid w-100">
        <h2>{{$data->name}}</h2>
    </div>
</section>
@include('front.menu')

<section class="about-img-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="./assets/images/about-man.jpg" alt="">
                            <!-- <img src="{{ asset('assets/images') }}/{{ $data->featured_image }}" alt=""> -->
                        </div>
                        <div class="col-md-6">
                            <!-- sub title -->
                          <?php  echo $data->subtitle; ?>
                            <!-- <h3>Hello! I'm Naccy York, the creator and operator of Reborns.</h3> -->
                            <!-- paragraph 1 p1 b1-->
                            <?php echo $data->body1; ?>
                            <!-- b2 -->
                            <!-- <article>Integer sagittis lacus nec commodo semper. Etiam ac mi at ante molestie maximus eu id velit. Nullam neque odio, varius </article> -->
                        <?php echo $data->body2; ?>
                        </div>
                        <div class="col-md-12">
                            <!-- paragraph 1 p2 b2-->
                            <!-- <p class="bt-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dui enim, eleifend nec pharetra nec, tincidunt nec magna. Aliquam tellus orci, interdum non ipsum semper, commodo varius urna. Praesent in vulputate ipsum, vel rhoncus nunc. Fusce ipsum magna, sodales vel pharetra in, laoreet vitae lectus. Suspendisse finibus elementum aliquam. Integer sagittis lacus nec commodo semper. Etiam ac mi at ante molestie maximus eu id velit. Nullam neque odio, varius id ipsum pulvinar, posuere hendrerit ligula. Nunc mauris neque, rhoncus at ex sed, semper posuere arcu. Nulla eget magna magna.</p> -->
                       <?php echo $data->body3; ?>
                        </div>
                    </div>
                </div>
            </section>


@endsection