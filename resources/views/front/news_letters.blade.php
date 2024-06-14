@extends('front.layouts.app')
@section('content')
    <div class="container-fluid bg-primary py-5 mb-5 news-letter">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Publications</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">News Letters</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="news-letter-wrapper">
        <div class="container">
            <div class="text-area">
                <div class="heading mb-4">
                    <h3 class="section-title bg-white text-start text-primary pe-3">News Letters</h3>
                    <p class="mt-2">Office of Research, Innovation and Commercialization (ORIC) at The university of
                        Faisalabad (TUF) publishes Newsletter on Monthly basis to share TUF R&D activities, initiatives,
                        achievements, National/International research funding opportunities and scientific & academic
                        News.</p>

                </div>
            </div>
            <div class="news-letter-card mb-5">
                <div class="row">
                    {{--  4th newsletter --}}
                    <div class="col-xl-3 col-lg-4 col-md-6 text-center">
                        <div class="card news-card position-relative mx-2 my-4">
                            <div class="card-body p-0 ">
                                <img src="{{asset('front/img/news-letters/oric-e-newsletter-april-2024.jpg')}}"
                                     class="w-100 h-100">
                                <div class="name-of-news">
                                    <h5 class="text-center my-3">April 2024</h5>
                                </div>
                                <div class="download-btn w-100">
                                    <a class="link-download pe-4 pt-4"
                                       href="{{asset('front/pdf/news-letters/oric-e-newsletter-april-2024.pdf')}}"
                                       download>Download <i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    {{--  3rd newsletter --}}
                    <div class="col-xl-3 col-lg-4 col-md-6 text-center">
                        <div class="card news-card position-relative mx-2 my-4">
                            <div class="card-body p-0 ">
                                <img src="{{asset('front/img/news-letters/oric-e-newsletter-march-2024.jpg')}}"
                                     class="w-100 h-100">
                                <div class="name-of-news">
                                    <h5 class="text-center my-3">March 2024</h5>
                                </div>
                                <div class="download-btn w-100">
                                    <a class="link-download pe-4 pt-4"
                                       href="{{asset('front/pdf/news-letters/oric-e-newsletter-march-2024.pdf')}}"
                                       download>Download <i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    {{--  1st newsletter --}}
                    <div class="col-xl-3 col-lg-4 col-md-6 text-center">
                        <div class="card news-card position-relative mx-2 my-4">
                            <div class="card-body p-0 ">
                                <img src="{{asset('front/img/news-letters/oric-e-newsletter-february-2024.png')}}"
                                     class="w-100 h-100">
                                <div class="name-of-news">
                                    <h5 class="text-center my-3">February 2024</h5>
                                </div>
                                <div class="download-btn w-100">
                                    <a class="link-download pe-4 pt-4"
                                       href="{{asset('front/pdf/news-letters/oric-e-newsletter-february-2024.pdf')}}"
                                       download>Download <i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End  -->
                    {{--  2nd newsletter --}}
                    <div class="col-xl-3 col-lg-4 col-md-6 text-center">
                        <div class="card news-card position-relative mx-2 my-4">
                            <div class="card-body p-0 ">
                                <img src="{{asset('front/img/news-letters/oric-e-newsletter-january-2024.jpg')}}"
                                     class="w-100 h-100">
                                <div class="name-of-news">
                                    <h5 class="text-center my-3">January 2024</h5>
                                </div>
                                <div class="download-btn w-100">
                                    <a class="link-download pe-4 pt-4"
                                       href="{{asset('front/pdf/news-letters/oric-e-newsletter-january-2024.pdf')}}"
                                       download>Download <i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End  -->
                </div>
            </div>
        </div>
    </div>
@endsection
