@section('title', 'Offices of Research, Innovation and Commercialization (ORIC)')
@section('description', 'The University of Faisalabad’s Office of Research provides programs and services to support faculty and staff in their research efforts. Read more for details!')
@section('keywords', 'Offices of Research, Innovation and Commercialization (ORIC)')
@extends('front.layouts.app')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('front/img/cover-01.png')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                     style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">University of
                                    Faisalabad</h5>
                                <h1 class="display-4 text-white animated slideInDown">Office of Research, Innovation and
                                    Commercialization</h1>
                                <p class="fs-5 text-white mb-4 pb-2"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                {{-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('front/img/about.jpg')}}" alt="" style="object-fit: cover;">
                    </div>
                </div> --}}
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Welcome to ORIC</h6>
                    <h3 class="mt-2"> INTRODUCTION:</h3>
                    <p class="mb-4">Academic research in all areas extends the frontiers of human knowledge. The
                        fundamental process of discovery provides us with a deeper understanding of the world and its
                        cultural, social, natural and engineered systems. The University of Faisalabad’s Office of
                        Research provides programs and services to support faculty and staff in their research efforts.
                        The office invests in research initiatives, promotes our research among sponsors, and provides
                        services that make certain that TUF achieves the highest standards in international
                        research.</p>
                    <p class="mb-2">ORIC dedicates to:</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Provide a sound and
                                supportive research infrastructure</p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Improve research services
                                by meeting challenges through innovative interdisciplinary team efforts and creative
                                problem solving</p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Provide quality
                                incentives to researchers, who, in turn, will generate high standard research</p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Assess policies and
                                targeting trends in research in order to advance and achieve institutional initiatives
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Maintain the highest
                                standards championed by the research administration profession to ensure the responsible
                                conduct of research</p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Promote initiatives for
                                public and private partnerships that will enhance the well-being of people in our
                                community</p>
                        </div>
                    </div>
                    {{-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                {{-- <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Skilled Instructors</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Online Classes</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3 h-100">
                        <div class="p-4">
                            {{-- <i class="fa fa-3x fa-home text-primary mb-4"></i> --}}
                            <i class="fas fa-bullseye fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">MISSION</h5>
                            <p>ORIC aims to maximize success in research and innovation and to guarantee that all the
                                research programs and policies reflect the core values of academic freedom, professional
                                integrity and ethical conduct and full compliance with all policies, legal requirements
                                and operational standards of the university.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp h-100" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            {{-- <i class="fa fa-3x fa-book-open text-primary mb-4"></i> --}}
                            <i class="fas fa-eye fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">VISION</h5>
                            <p>ORIC strives to lead the The University of Faisalabad in discoveries, publications,
                                mentoring and training, and in the translation of research into health and economic
                                benefits. It envisions a dynamic, innovative, and diversified environment that will
                                promote and support the research and creative scholarly activities of faculty, staff,
                                and students.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100"
                             src="{{asset('front/img/our-team/aman.jpeg')}}" alt="" style="object-fit: contain;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">MESSAGE OF DIRECTOR</h1>
                    <p class="mb-4" style="text-align: justify;">The Office of Research, Innovation and Commercialization (ORIC) at The University of
                        Faisalabad (TUF) was established in 2014. This is a fundamental step in embodying the students,
                        faculty, departments, and institutes to work for intensive research activities. The ORIC at TUF
                        incentives the research culture by encouraging the faculty and students to generate intellectual
                        properties, innovate the projects through research, and commercialize the products for the
                        benefit of the nation, and build a trustworthy bridge among the university and industries. In
                        the modern era, to lead in educational institutes, it requires impassioned, strong commitment,
                        and deep research expertise</p>
                    <p class="mb-4" style="text-align: justify;">In today’s competitive environment our faculty and departments continuously making
                        their efforts to boost their standards toward teaching expertise and quality research. The
                        mission of ORIC is to manage, enhance and develop the research programs and recognize the TUF
                        among the best in advanced research culture and the research-based top-ranking higher education
                        institutes. I am confident that ORIC at TUF will continue the progress to achieve the goals and
                        one day we will be accomplished prominent success in the fields for that we are struggling.</p>
                    <h5>Prof. Dr Aman Ullah Malik</h5>
                    <h6>Director ORIC</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Team Start -->
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
    <!-- Team End -->
 {{-- Footer  --}}
 <div class="footer-logos">
    <div class="container">
      <div class="row py-2 g-0">
          {{-- 1st  --}}
          <div class="owl-carousel owl-theme owl-footer-logo">
              <div class="item px-1"><!--col starts here -->
                  <img src="{{asset('front/img/header-footer/logos/rankingss-01.png')}}" alt="The University of Faisalabad" title="The University of Faisalabad" class="footer-logo "> </div>

             <!--col ends here -->
              <div class="item  px-1" ><!--col starts here -->
                  <img src="{{asset('front/img/header-footer/logos/rankingss-02.png')}}" alt="The University of Faisalabad" title="The University of Faisalabad" class="footer-logo "> </div>
                <!--col ends here -->
              <div class="item px-1"><!--col starts here -->
                 <img src="{{asset('front/img/header-footer/logos/rankingss-03.png')}}" alt="The University of Faisalabad" title="The University of Faisalabad" class="footer-logo "> </div>

                 <!--col ends here -->

              <div class="item  px-1"><!--col starts here -->
                  <img src="{{asset('front/img/header-footer/logos/rankingss-04.png')}}" alt="The University of Faisalabad" title="The University of Faisalabad" class="footer-logo "> </div>

                  <!--col ends here -->
              <div class="item   px-1"><!--col starts here -->
                  <img src="{{asset('front/img/header-footer/logos/rankingss-05.png')}}" alt="The University of Faisalabad" title="The University of Faisalabad" class="footer-logo "> </div>

                  <!--col ends here -->
                  <div class="item  px-1"><!--col starts here -->
                    <img src="{{asset('front/img/header-footer/logos/rankingss-06.png')}}" alt="The University of Faisalabad" title="The University of Faisalabad" class="footer-logo "> </div>

                    <div class="item  px-1"><!--col starts here -->
                        <img src="{{asset('front/img/header-footer/logos/rankingss-07.png')}}" alt="The University of Faisalabad" title="The University of Faisalabad" class="footer-logo "> </div>

      </div> <!--project wrapper end here -->
      </div>
  </div>

    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('front/img/testimonial-1.jpg')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('front/img/testimonial-2.jpg')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('front/img/testimonial-3.jpg')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('front/img/testimonial-4.jpg')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->

@endsection
@push('js')
<script>
          // Footer logo script
          $('.owl-footer-logo').owlCarousel({
    rtl:false,
    loop: true,
    dots: false,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 2000,
    // margin: 04,
    responsive:{
        0:{
            items:1
        },
        800:{
            items:3
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})</script>
@endpush
