@section('title', 'Contact us | ORIC | The University of Faisalabad (TUF)')
@section('description', 'Connect with excellence at ORIC, The University of Faisalabad. Reach out effortlessly through our Contact Us page for inquiries and academic pursuits today.')
@section('keywords', 'Contact us')
@extends('front.layouts.app')
@section('content')
    <div class="container-fluid bg-primary py-5 mb-5 contact-us">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">contact-us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">OUR TEAM</h1>
            </div>
            <div class="row g-4 our-team">
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.1s">
                    <div class="team-item ">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/aman.jpeg')}}" alt="">
                        </div>
                        {{-- <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i>director.oric@tuf.edu.pk</a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div> --}}
                        <div class="text-center p-4 row info-text">
                            <h5 class="mb-0">Prof. Dr Aman Ullah Malik</h5>
                            <small>Director ORIC</small>
                            <a href="mailto:director.oric@tuf.edu.pk" style="word-wrap: break-word; ">director.oric@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/dummy.png')}}" alt="">
                        </div>
                        <div class="text-center p-4 row info-text">
                            <h5 class="mb-0">dr shaista shafiq</h5>
                            <small>Manager Innovation and Commercialization</small>
                            <a href="mailto:manager.innovation@tuf.edu.pk" style="word-wrap: break-word; ">manager.innovation@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/dummy.png')}}" alt="">
                        </div>
                        <div class="text-center row info-text p-4">
                            <h5 class="mb-0">Dr Aqib Majeed</h5>
                            <small>Manager Research Management</small>
                            <a href="mailto:manager.rod@tuf.edu.pk" style="word-wrap: break-word; ">manager.rod@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/dummy.png')}}" alt="">
                        </div>
                        <div class="text-center p-4 row info-text">
                            <h5 class="mb-0">dr muhammad arshad shehzad hassan</h5>
                            <small>Manager University Industrial linkages & Technology Transfer</small>
                            <a href="mailto:arshad.shehzad@tuf.edu.pk" style="word-wrap: break-word; ">arshad.shehzad@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/dummy.png')}}" alt="">
                        </div>
                        <div class="text-center row info-text p-4">
                            <h5 class="mb-0">dr. amna javed</h5>
                            {{-- <small>Manager I.P / Legal Services & International Linkages</small> --}}
                            <small>Manager International Linkages</small>
                            <a href="mailto:amna.javed@tuf.edu.pk" style="word-wrap: break-word; ">amna.javed@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/dummy.png')}}" alt="">
                        </div>
                        <div class="text-center row info-text p-4">
                            <h5 class="mb-0">Muhammad Zubair</h5>
                            <small>Manager I.P / Legal Services</small>
                            <a href="mailto:muhammad.zubair@tuf.edu.pk" style="word-wrap: break-word; ">muhammad.zubair@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/dummy.png')}}" alt="">
                        </div>
                        <div class="text-center p-4 row info-text">
                            <h5 class="mb-0">mr noman aslam</h5>
                            <small>Publication/Communication Specialist</small>
                            <a href="mailto:publication.officer@tuf.edu.pk" style="word-wrap: break-word; ">publication.officer@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/dummy.png')}}" alt="">
                        </div>
                        <div class="text-center row info-text p-4">
                            <h5 class="mb-0">Dr. Rimsha Riaz</h5>
                            <small>Assistant Manager Research Management</small>
                            <a href="mailto:asst.mgr.research.oric@tuf.edu.pk" style="word-wrap: break-word; ">asst.mgr.research.oric@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp card-team bg-light" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('front/img/our-team/ahmed-saleem.jpg')}}" alt="">
                        </div>
                        <div class="text-center p-4 row info-text">
                            <h5 class="mb-0">mr. muhammad ahmed saleem</h5>
                            <small>Assistant Manager Innovation and Commercialization</small>
                            <a href="mailto:Ahmed.saleem@tuf.edu.pk" style="word-wrap: break-word; ">Ahmed.saleem@tuf.edu.pk</a>
                        </div>
                    </div>
                </div>
                {{--          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">--}}
                {{--              <div class="team-item bg-light">--}}
                {{--                  <div class="overflow-hidden">--}}
                {{--                      <img class="img-fluid" src="{{asset('front/img/Anam.png')}}" alt="">--}}
                {{--                  </div>--}}
                {{--                  <div class="text-center p-4 row">--}}
                {{--                      <h5 class="mb-0">MS. ANAM NAWAZ</h5>--}}
                {{--                      <small>Research Associate</small>--}}
                {{--                      <a href="mailto:anam.nawaz@tuf.edu.pk">anam.nawaz@tuf.edu.pk</a>--}}
                {{--                  </div>--}}
                {{--              </div>--}}
                {{--          </div>--}}







            </div>
        </div>
    </div>
@endsection
