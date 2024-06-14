@section('title', 'ORIC Important Links | The University of Faisalabad (TUF)')
@section('description', 'Explore essential ORIC links at The University of Faisalabad. Navigate research, innovation & collaboration seamlessly. Your gateway to academic excellence awaits.')
@section('keywords', 'Important Links')
@extends('front.layouts.app')
@section('content')
<div class="container-fluid bg-primary py-5 mb-5 important-links">
  <div class="container py-5">
      <div class="row justify-content-center">
          <div class="col-lg-10 text-center">
              <h1 class="display-3 text-white animated slideInDown">Links</h1>
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                      <li class="breadcrumb-item text-white active" aria-current="page">academic-linkages</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</div>


<div class="container">
  <div class="text-area">
    <div class="heading mb-4">
      <h3 class="section-title bg-white text-start text-primary pe-3">IMPORTANT LINKS</h3>
    </div>
    <table class="table table-striped border imp-table">
      <thead>
        <tr class="bg-dark text-white ">
          <th rowspan="2">
            SR.NO.</th>
          <th>	TITLE OF THE LINK</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Link as $link)
        <tr>
          {{-- <td>{{ $link->id }}</td> --}}
          <td class="counterCell"></td>

        @if (isset($link->url))
        {{-- <div class="icon-bottom-text text-uppercase text-center mb-sm-5 mb-3 px-2"> --}}
                {{-- <p>{{ $affil->url }}</p> --}}
                @if($link->name != '' || null)
          <td><a href="{{ $link->url }}" target="_blank">{{ $link->name}}</a></td>
          @else
          <td><a href="{{ $link->url }}" target="_blank">{{ $link->url}}</td>
        @endif
        {{-- </div><!--icon bottom text ends --> --}}
       @endif
        </tr>
       @endforeach
        {{-- <tr>
          <td>1</td>
          <td><a href="http://www.hec.gov.pk/english/services/faculty/journals/Pages/default.aspx" target="_blank">HEC Recognized Journals (Local)</a></td>
        </tr>
        <tr>
          <td>2</td>
          <td><a href="" target="_blank">International Science Journals (Journal Citation Report)</a></td>
        </tr>
        <tr>
          <td>3</td>
          <td><a href="http://www.isiknowledge.com/" target="_blank">ISI Master List (as HEC Recognized Journals in “W” category</a></td>
        </tr>
        <tr>
          <td>4</td>
          <td><a href="http://science.thomsonreuters.com/cgi-bin/jrnlst/jloptions.cgi?PC=master" target="_blank">ISI Master List</a></td>
        </tr>
        <tr>
          <td>5</td>
          <td><a href="https://beallslist.weebly.com/hijacked-journals.html" target="_blank">List of Hijacked Journals (banned)</a></td>
        </tr> --}}
      </tbody>

    </table>
    {!! $Link->links() !!}
  </div>
</div>
@endsection
