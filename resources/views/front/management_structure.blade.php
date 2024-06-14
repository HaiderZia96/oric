@section('title', 'Management Structure | ORIC | The University of Faisalabad')
@section('description', 'Explore the dynamic Management Structure at The University of Faisalabad\'s ORIC. Discover a harmonious blend of expertise steering innovation and research.')
@section('keywords', 'Management Structure')
@extends('front.layouts.app')
@section('content')
<div class="container-fluid bg-primary py-5 mb-5 management-structure">
  <div class="container py-5">
      <div class="row justify-content-center">
          <div class="col-lg-10 text-center">
              <h1 class="display-3 text-white animated slideInDown">MANAGEMENT STRUCTURE</h1>
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                      <li class="breadcrumb-item text-white active" aria-current="page">management-structure</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</div>
<div class="container">
    <div class="text-area">
      <div class="heading mb-4">
        <h3 class="section-title bg-white text-start text-primary pe-3">MANAGEMENT STRUCTURE</h3>
      </div>
      <img class="img-fluid" src="{{asset('front/img/organogram-01.png')}}" alt="">
    </div>
</div>
@endsection
