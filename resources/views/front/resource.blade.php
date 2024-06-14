@section('title', 'Resource | Office of Research, Innovation & Commercialization')
@section('description', 'Discover boundless knowledge at TUF\'s ORIC Resource Center. Empowering your academic journey with a rich repository of resources. Explore excellence today!')
@section('keywords', 'Resource')
@extends('front.layouts.app')
@section('content')
<div class="container-fluid bg-primary py-5 mb-5 important-links">
  <div class="container py-5">
      <div class="row justify-content-center">
          <div class="col-lg-10 text-center">
              <h1 class="display-3 text-white animated slideInDown">Resource</h1>
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                      <li class="breadcrumb-item text-white active" aria-current="page">resource</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</div>
<div class="container-xxl py-5">
  <div class="container">
      <div class="wow fadeInUp mb-4" data-wow-delay="0.1s">
          <h4 class="section-title bg-white text-primary px-3">Resource</h4>
      </div>
      <ul>
        @foreach ($Link as $link)

        <tr>
          {{-- <td>{{ $link->id }}</td> --}}
        @if (isset($link->url))
        {{-- <div class="icon-bottom-text text-uppercase text-center mb-sm-5 mb-3 px-2"> --}}
                {{-- <p>{{ $affil->url }}</p> --}}
          {{-- <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td> --}}
          @if($link->name != '' || null)
          <li><a href="{{ $link->url }}">{{ $link->name }}</a></li>
          @else
          <li><a href="{{ $link->url }}">{{ $link->url }}</a></li>
        @endif
          {{-- <li><a href="{{ $link->url }}">{{ $link->name }}</a></li> --}}
        {{-- </div><!--icon bottom text ends --> --}}
       @endif
        </tr>
       @endforeach
        {{-- <li><a href="#">Travel grant</a></li>
        <li><a href="#">Single Author Co Author proforma</a></li>
        <li><a href="#">Funding for submission of research paper</a></li>
        <li><a href="#">Policy guidelines for availing Travel Grants TUF</a></li> --}}
        <!--<li><a href="https://tuf.edu.pk/oric/wp-content/uploads/2019/03/Policy-Guidelines-for-Submission-of-Research-Publications.pdf">Policy Guidelines for Submission of Research Publications</a></li>-->
      </ul>
      {!! $Link->links() !!}
  </div>
</div>
@endsection
