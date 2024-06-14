@section('title', 'ORIC Research Publication | The University of Faisalabad (TUF)')
@section('description', 'Elevate your knowledge journey with The University of Faisalabad’s ORIC, a hub driving impactful research bridging academia, industry & society. Read more here!')
@section('keywords', 'ORIC Research Publication')
@extends('front.layouts.app')
@section('content')

<div class="research-advance-study-wrapper">
  <div class="top-banner">
    <img class="img-fluid" src="{{asset('/front/img/oric-research.png')}}" alt="How to Apply">
    {{-- <div class="perfect-left">
      <h1>RESEARCH</h1>
      <h1><span>WORK</span></h1>
    </div> --}}
    <div class="icon-vertical text-center d-flex flex-column me-4">
      <a href="https://www.instagram.com/unioffaisalabad/"><i class="fa fa-instagram mb-sm-2 mt-sm-3  mt-1" aria-hidden="true"></i></a>
      <a href="https://www.facebook.com/unioffaisalabad"><i class="fa fa-facebook mb-sm-2 mt-sm-2 mt-1" aria-hidden="true"></i></a>
      <a href="https://twitter.com/unioffaisalabad"><i class="fa fa-twitter mb-sm-2 mt-sm-2 mt-1" aria-hidden="true"></i></a>
      <a href="https://www.youtube.com/universityoffaisalabadofficial"><i class="fa fa-youtube mb-sm-2 mt-sm-2 mt-1" aria-hidden="true"></i></a>
    </div>
  </div>
  {{-- <div class="container">
    <div class="row">
      <div class="research-repository mt-4">
        <h1 class="text-red">RESEARCH</h1>
        <p>The University of Faisalabad is one of the leading research institutions in the region, with the signified impact both nationally
          and internationally. Our mission is to create a supportive avenue for the researchers, innovators and learners to do what
          they want to do with an advanced understanding of knowledge. Our work support, fosters the research of innovative culture
          and activity of our faculty and students across the entire University</p>
        <div class="repository card-body mt-5 mb-3 px-md-5 py-5">
          <h3 class="text-red">RESEARCH REPOSITORY</h3>
          <p>Repository of research Synopsis presented to the Board of Advance Studies and research</p>
          <ul class="px-4 mt-lg-3">
            <li><i class="icon-bullet me-sm-3"></i>Repository of research Synopsis for PhD Degree</li>
            <li><i class="icon-bullet me-sm-3"></i>Repository of research Synopsis for MS Degree</li>
            <li><i class="icon-bullet me-sm-3"></i>Repository of research Synopsis for MPhil Degree</li>
          </ul>
          <div class="tags-btn text-center">
            <a class="btn px-4 my-3 me-3 bg-red text-white" target="blank" href="mailto:oric@tuf.edu.pk"><i class="fa fa-angle-right me-3" aria-hidden="true"></i>RECTOR@tuf.edu.pk</a>
            <a class="btn px-4 my-3 bg-dark text-white" target="blank" href="{{route('basr-policy')}}"><i class="fa fa-angle-right me-3" aria-hidden="true"></i>Research Policy</a>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- search bar  --}}
  {{-- <div class="departmnet-search">
    <div class="container">
      <div class="row py-5">
        <h4 >RESEARCH PUBLICATIONS</h4>
        <div class="col-lg-2 col-sm-6 mt-2">
          <select class="form-select form-control form-control-sm" id="dpt_id">
            <option value="">Explore By Faculty</option>
            @foreach ($Dpts as $Dpt)
            <option value="{{$Dpt->id}}">{{$Dpt->title}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-lg-2 col-sm-6 mt-2">
          <select class="form-select form-control form-control-sm" id="pubTypes">
            <option value="">Publication </option>
              @foreach($pubTypes as $pubType)
                  <option value="{{$pubType->id}}">{{$pubType->type}}</option>
              @endforeach
          </select>
        </div>
        <div class="col-lg-2 col-sm-6 mt-2">
          <select class="form-select form-control form-control-sm"  id="sdgs_category">
            <option value="">SDG</option>
            <option value="No Poverty">No Poverty</option>
            <option value="Zero Hunger">Zero Hunger</option>
            <option value="Good Health and Well-being">Good Health and Well-being</option>
            <option value="Quality Education">Quality Education</option>
            <option value="Gender Equality">Gender Equality</option>
            <option value="Clean Water and Sanitation">Clean Water and Sanitation</option>
            <option value="Affordable and Clean Energy">Affordable and Clean Energy</option>
            <option value="Decent Work and Economic Growth">Decent Work and Economic Growth</option>
            <option value="Industry, Innovation and Infrastructure">Industry, Innovation and Infrastructure</option>
            <option value="Reduced Inequality">Reduced Inequality</option>
            <option value="Sustainable Cities and Communities">Sustainable Cities and Communities</option>
            <option value="Responsible Consumption and Production">Responsible Consumption and Production</option>
            <option value="Climate Action">Climate Action</option>
            <option value="Life Below Water">Life Below Water</option>
            <option value="Life on Land">Life on Land</option>
            <option value="Peace and Justice Strong Institutions">Peace and Justice Strong Institutions</option>
            <option value="Partnerships to achieve the Goal">Partnerships to achieve the Goal</option>
          </select>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- end search bar  --}}
  <div class="container">
    <div class="row">
      <!-- row start here  -->
      <div class="col-md-12 mb-5">
        <div class="table-responsive">
          <table class=" table table-striped table-bordered border mt-3 mb-3 graduate-fonts dataTable" >
            <thead>
              <tr class="bg-red text-center align-middle">
                <th class="text-white width-table">Serial No</th>
                <th class="text-white width-table">Title</th>
                <th  class="text-white width-table">Author</th>
                <th  class="text-white width-table">Journal</th>
                <th  class="text-white width-table">Volume No</th>
                <th  class="text-white width-table">Impact Factor</th>
                <th  class="text-white width-table">Scopus Index</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- row end here  -->
    </div>
  </div>
  <!-- oric start here -->
  {{-- <div class="oric-research">
    <div class="rs-counter bg2">
      <div class="container">
        <div class="sec-title py-5">
          <h1>ORIC <span class="designation">(OFFICE OF research,
            INNOVATION & COMMERCIALIZATION)</span></h1>
          <p>Academic research in all areas extends the frontiers of human knowledge. The fundamental process of discovery provides us with a deeper understanding of the world and its cultural, social, natural and engineered systems. The University of Faisalabad’s Office of research provides programs and services to support faculty and staff in their research efforts. The office invests in research initiatives, promotes our research among sponsors, and provides services that make certain that TUF achieves the highest standards in international research.</p>
        </div>
        <div class="row pb-5">
          <div class="col-lg-12 col-md-12">
            <div class="courses-item">
              <h4 class="courses-title mb-3">ORIC dedicates to:</h4>
              <p>Provide a sound and supportive research infrastructure, improve research services by meeting challenges through innovative interdisciplinary team efforts and creative problem solving, provide quality incentives to researchers, who, in turn, will generate high standard research, assess policies and targeting trends in research in order to advance and achieve institutional initiatives, maintain the highest standards championed by the research administration profession to ensure the responsible conduct of research, promote initiatives for public and private partnerships that will enhance the well-being of people in our community</p>
              <div class="research-explore">
                <a class="btn my-3 me-3 bg-red text-white" target="blank" href="mailto:oric@tuf.edu.pk"><i class="fa fa-angle-right me-3" aria-hidden="true"></i>ORIC@tuf.edu.pk</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- oric end here  -->
  <!-- Vision and mission start here  -->
  {{-- <div class="qec-vision-mision my-5">
    <div class="container">
      <div class="col-md-12 mt-5">
        <div class="toper-text mb-5">
          <h2>QEC <span>(QUALITY ENHANCEMENT CELL)</span></h2>
        </div>
      </div>
      <div class="row rs-timeline pb-5">
        <div class="col-lg-6">
          <div class="qec-vision-block text-center bg-red text-white rounded py-2 mb-2">
            <h4><span>VISON</span></h4>
          </div>
          <div class="vision-mision-content card-body px-md-5 h-100">
            <p>To be a leading educational institution characterized
              by:An intellectual environment conducive for
              innovative teaching and learning.A culture of
              research to address the challenges faced by
              Pakistan.Top quality professional Faculty meeting
              the local and global educational requirements.
              Emphasis on Islamic/ethical values for inculcating
              love, patriotism and service to humanity.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="qec-vision-block text-center bg-red text-white rounded py-2 mb-2">
            <h4><span>MISION</span></h4>
          </div>
          <div class="vision-mision-content card-body px-md-5 h-100">
            <p>Mission of the University is to contribute and create a
              transformative educational experience through
              pursuit of learning, research, innovation and
              collaborations at the highest global level of
              excellence, with emphasis on lslamic/ethical values.</p>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- vision and mission end here  -->
  {{-- <div class="jumdc-umdc py-5">
    <div class="container">
      <div class="row">
        <div class="mb-4">
          <h2 class="text-red mb-4">UMDC <span>(UNIVERSITY DENTAL & MEDICAL COLLEGE)</span></h2>
          <p>Following the vision of its founder Chairman Mian Muhammad Saleem (Late) 'Industry, Service & Education', Madina Foundation has established University Medical and Dental College in Faisalabad, established Medical College in 2003 to fill this vacuum in the medical education in Faisalabad. Since beginning, the College has strived hard and under the table, dynamic leadership and guidance of our present Chairman, Mian Muhammad Hanif, has achieved unique honors and distinction.</p>
          <div class="research-explore text-center">
            <a class="btn my-3 me-3 bg-dark text-white" target="blank" href="https://umdc.pk/"><i class="fa fa-angle-right me-3" aria-hidden="true"></i>ABOUT UMDC</a>
          </div>
        </div>
        <div class="mb-4">
          <h2 class="text-red mb-4">JUMDC <span>(JOURNAL OF UNIVERSITY
            MEDICAL & DENTAL COLLEGE)</span></h2>
            <h4>JOURNAL OF UNIVERSITY MEDICAL & DENTAL COLLEGE:</h4>
            <p>Journal of University Medical & Dental College, JUMDC, is the official peer reviewed Journal of University Medical and Dental
              College; a consistent college of The University of Faisalabad. JUMDC is open access journal being published quarterly</p>
              <div class="research-explore text-center">
                <a class="btn my-3 me-3 bg-dark text-white" target="blank" href="mailto:editor@jumdc.tuf.edu.pk"><i class="fa fa-angle-right me-3" aria-hidden="true"></i>EDITOR@jumdc.tuf.edu.pk</a>
              </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- JUMDC & UMDC end here  -->
</div>
  @endsection
  @push('js')
  <script>
    // $("#sdgs_category").change(function() {
    //   selectRange()
    // });
    // $("#pubTypes").change(function() {
    //   selectRange()
    // });
    // $("#dpt_id").change(function() {
    //   selectRange()
    // });
        $(function (){
          var t = $('.dataTable').DataTable({

            processing: true,
            serverSide: true,
            order:[[0,'desc']],
            ajax: {
              "type":"GET",
              "url":"{{route('getResearchIndexFront')}}",
              "data":function (d){
                // d.sdgs_category = document.getElementById('sdgs_category').value;
                // d.pubTypes = document.getElementById('pubTypes').value;
                // d.dpt_id = document.getElementById('dpt_id').value;
              }
            },
            columns: [
            { data: 'id',orderable:false },
            { data: 'title' },
            { data: 'author' },
            { data: 'name' },
            { data: 'volume_no' },
            { data: 'impact_factor' },
            { data: 'scopus_index' },
            ],
            columnDefs: [
            {
              render: function ( data, type, row,meta,name ) {
                return meta.row + meta.settings._iDisplayStart + 1;

              },
              searchable:false,
              orderable:true,
              targets: 0
            },
            ]

          });
        });
        function selectRange(){
          $('.dataTable').DataTable().ajax.reload()
        }
      </script>
      @endpush
