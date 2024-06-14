@section('title', 'Success Stories | ORIC | The University of Faisalabad (TUF)')
@section('description', 'Explore transformative success stories at The University of Faisalabad\'s ORIC. Discover inspiring journeys of innovation & achievement. Read more for details!')
@section('keywords', 'Success Stories')
@extends('front.layouts.app')
@section('content')
<div class="container-fluid bg-primary py-5 mb-5 page-banner">
  <div class="container py-5">
      <div class="row justify-content-center">
          <div class="col-lg-10 text-center">
              <h1 class="display-3 text-white animated slideInDown">SUCCESS STORIES</h1>
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                      <li class="breadcrumb-item text-white active" aria-current="page">success-story</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</div>
<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">ORIC-SUCCESS STORIES</h1>
        </div>
        <div class=" owl-carousel owl-terminal">
            @foreach ($successStory as $success)
            <div class="item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{URL('/')}}/front/img/Success_Story/{{$success->image }}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">{{$success->name}}</h5>
                <p style="height:40px!important">{{$success->designation}}</p>
                <div class="testimonial-text bg-light text-center p-lg-5 p-3" style="height:300px!important;overflow: auto;">
                <p class="mb-0">{{$success->description}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection
@push('js')
    <script>
      $('.owl-terminal').owlCarousel({
    loop:true,
    margin:10,
    dots:true,
    nav:false,
    autoplay:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:1,
            nav:false,
        }
    }
})
      </script>
@endpush
