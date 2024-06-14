@extends('front.layouts.app')
@section('content')

<div class="news-events-detail-wrapper">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="quick-link-pages py-3 px-4 mb-5">
                    <div class="headings">
                     <button class="btn w-100">QUICK LINKS</button>
                    </div>
                    <div class="page mt-3">
                        <div class="d-flex my-2">
                            <div class="tab-icon">
                            {{-- <i class="icon-bullet pe-3 icomooms"></i> --}}
                            <i class="fa fa-arrow-right text-arrow-blue pe-2 icomooms"></i>
                            </div>
                            <div class="tab-text">
                            <a href="https://housing.tuf.edu.pk/"><p>Home</p></a>
                            </div>
                        </div>
                        <div class="d-flex my-2">
                            <div class="tab-icon">
                            {{-- <i class="icon-bullet pe-3 icomooms"></i> --}}
                            <i class="fa fa-arrow-right text-arrow-blue pe-2 icomooms"></i>
                            </div>
                            <div class="tab-text">
                            <a href="https://housing.tuf.edu.pk/"><p>Management Structures</p></a>
                            </div>
                        </div>
                        <div class="d-flex my-2">
                            <div class="tab-icon">
                            {{-- <i class="icon-bullet pe-3 icomooms"></i> --}}
                            <i class="fa fa-arrow-right text-arrow-blue pe-2 icomooms"></i>
                            </div>
                            <div class="tab-text">
                            <a href="https://housing.tuf.edu.pk/"><p>Research & Publications</p></a>
                            </div>
                        </div>
                        <div class="d-flex my-2">
                            <div class="tab-icon">
                            {{-- <i class="icon-bullet pe-3 icomooms"></i> --}}
                            <i class="fa fa-arrow-right text-arrow-blue pe-2 icomooms"></i>
                            </div>
                            <div class="tab-text">
                            <a href="https://housing.tuf.edu.pk/"><p>News & Events</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="press-detail">
                    <div class="press-thumbnail">
                        @if(isset($newsEvents))
                            <img src="https://tuf.edu.pk/Main/frontend/images/NewsAndEvents/thumbnail/{{$newsEvents->thumbnail}}" alt="" class="w-100 py-3 px-4">
                        @endif 
                    </div>
                    <div class="category-logo px-4 d-flex pb-3">
                        <div class="categories d-flex align-items-center mb-2">
                            <i class="fa fa-university pe-3 icomooms"></i>
                                @if (isset($newsEvents->departments->title))
                                    <p class="mb-0">{{ $newsEvents->departments->title }}</p>
                                @endif 
                        </div>
                        <div class="categories d-flex align-items-center mb-2">
                            <i class="fa fa-volleyball-ball pe-3 icomooms"></i>
                            @if (isset($newsEvents->societies->title))
                                <p class="mb-0">{{ $newsEvents->societies->title }}</p>
                            @endif 
                        </div>
                        <div class="categories d-flex align-items-center mb-2">
                            <i class="fa fa-th-large pe-3 icomooms"></i>
                            @if (isset($newsEvents->sdgs_category))
                                <p class="mb-0">{{ $newsEvents->sdgs_category }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="headings post-detail-box">
            {{-- title  --}}
            @if (isset($newsEvents->name))
                <h1 class="mt-4">{{ $newsEvents->name  }}</h1>
            @endif 
            {{-- ck editor  --}}
            @if (isset($newsEvents->description))
                <p class="text-black"> {!! $newsEvents->description  !!}</p>
            @endif 
        </div>
        {{-- Related Post start here --}}
        @if($relatedPostNewsEvents != null) 
        <div class="press-release-slide mb-5">
            <h4 class="text-red mb-3">Related Post</h4>
            <div class="owl-carousel owl-theme category-slides">
                @foreach ($relatedPostNewsEvents as $relates) 
                    @if (isset($relates)) 
                    <div class="item mx-2 h-100">
                        <a href="{{ route('news-events-detail',$relates->slug) }}">
                            @if(isset($relates->thumbnail))
                                <div class="testimonials">
                                    <img src="https://tuf.edu.pk/Main/frontend/images/NewsAndEvents/thumbnail/{{$relates->thumbnail }}" >
                                </div>
                            @endif 
                        </a>
                    </div>
                    @endif 
                 @endforeach 
            </div>
        </div>
        @endif 
        {{-- Related Post end here --}}
    </div>
</div>

@endsection
@push('js')
    <script>
          $('.category-slides').owlCarousel({
            loop: true,
            dots: true,
            responsiveClass: true,
            autoplay:true,
            autoplayTimeout:4000,
            margin:02,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:3,
                },
                1000:{
                    items:3,
                }
            }
        })
    </script>
@endpush