@extends('front.layouts.app')
@section('content')
<style>

</style>
<div class="container-fluid bg-primary py-5 mb-5 page-banner">
  <div class="container py-5">
      <div class="row justify-content-center">
          <div class="col-lg-10 text-center">
              <h1 class="display-3 text-white animated slideInDown">News and Events</h1>
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                      <li class="breadcrumb-item text-white active" aria-current="page">news-events</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</div>
<div class="container">
  <div class="text-area">
    <div class="heading mb-4">
      <h3 class="section-title bg-white text-start text-primary pe-3">News and Events</h3>
    </div>

    {{-- News & Events --}}
    <div class="news-explore">
      <div class="container">
          <div class="row py-3">
            <div class="search-wrapper">
            <!-- <input type="text" id="searchInput" placeholder="Search..."> -->
              <form method="GET" action="{{route('news-events-search')}}" >
                  @csrf
                  <div class="row">
                      <div class="col-md-7 col-12 offset-lg-2">
                          <label for="tags" class="form-label"></label>
                          <input type="text" class="form-control" id="post_search" name="post_search" placeholder="Search....." style="width: 100%">
                      </div>
                      <div class="mt-4 col-md-2 col-12  filter-button">
                          <button type="submit"  id="area1" class="btn btn-primary px-4 me-1 mb-2 apply-filter search">Search</button>
                      </div>
                  </div>
                  <div class="offset-lg-2 by-filter">
                      <span class="mx-3"> <input  type="radio" value="all" checked="checked" name="searchType">All</span>
                      <span > <input  type="radio" value="title"  name="searchType">Title </span>
                  </div>

              </form>
          </div>

            {{--Filters--}}
              <form class="d-lg-flex justify-content-center" method="GET" action="{{route('news-and-events')}}" >
              <div class="mb-3 me-3">
                    <label for="categories" class="form-label"></label>
                    <select name="slug" class="form-control" id="slug" value="" >
                    <option value="0">Select Category</option>
                    @if($otherData != null)
                        @foreach($otherData['categories'] as $newsCategories)
                        <option  value="{{$newsCategories->slug}}" {{(isset(request()->slug) && $newsCategories->slug == request()->slug ? 'selected': '' )}}>{{$newsCategories->name}}</option>
                        @endforeach
                    @endif
                    </select>
                </div>
              <div class="mb-3 me-3">
                  <label for="projects" class="form-label"></label>
                  <select name="project" class="form-control" id="project" value="" >
                  <option value="0">Select Project</option>
                  @if($otherData != null)
                    @foreach($otherData['projects'] as $allproject)
                    <option value="{{$allproject->slug}}" {{(isset(request()->project) && $allproject->slug == request()->project ? 'selected': '' )}}>{{$allproject->name}}</option>
                    @endforeach
                  @endif
                  </select>
              </div>
               <div class="mb-3 me-3">
                  <label for="date" class="form-label"></label>
                  <select name="date" class="form-control" id="date" value="" >
                  <option value="0">Select Year</option>
                  @if($recentEventDates != null)
                    @foreach($recentEventDates as $newseventdate)
                    <option value="{{date('M-Y', strtotime($newseventdate->event_date))}}"{{(isset(request()->date) && date('M-Y', strtotime($newseventdate->event_date)) == request()->date ? 'selected': '' )}}>{{date('M  Y', strtotime($newseventdate->event_date)) }}</option>
                    @endforeach
                  @endif
                  </select>
              </div>

              <div class="mb-3 me-3">
                  <label for="tags" class="form-label"></label>
                  <select name="tag" class="form-control" id="tag" value="" >
                  <option value="0">Select Tag</option>
                    @if($otherData != null)
                        @foreach($otherData['tags'] as $alltag)
                        <option value="{{$alltag->slug}}" {{(isset(request()->tag) && $alltag->slug == request()->tag ? 'selected': '' )}}>{{$alltag->slug}}</option>
                        @endforeach
                    @endif
                  </select>
              </div>

              <div class="mt-4  filter-button">
              <button type="submit" class="btn btn-primary px-4 me-1 mb-2 apply-filter">Apply Filter</button>
              <button type="delete" class="btn btn-danger px-4 mb-2 remove" onclick="Remove_options()">Reset</button>
              </div>
              </form>

          <div class="row">
              <div class="col-lg-4">
                  {{-- category  --}}
                  <div class="recent-post mt-5">
                      <div class="bg-colr py-2">
                          <h6 class="ms-4 mb-0">Categories</h6>
                      </div>
                      @if($otherData != null)
                        @foreach ($otherData['categories'] as $categories)
                        <div class="yearly-tags pb-2 pt-3">
                            @if (isset($categories->name))
                            <a href="{{url('https://tuf.edu.pk/n/press-release?slug='.$categories->slug)}}"><i class="fa fa-arrow-right text-arrow-blue pe-3 icomooms"></i>{{ $categories->name}}</a>
                            @endif
                        </div>
                        @endforeach
                    @endif
                  </div>
                     {{-- Project  --}}
                     @if($otherData != null)
                          <div class="recent-post mt-3 ">
                              <div class="bg-colr py-2">
                                  <h6 class="ms-4 mb-0">Projects</h6>
                              </div>
                            @foreach ($otherData['projects'] as $allproject)
                              <div class="yearly-tags pb-2 pt-3">
                                  @if (isset($allproject->name))
                                     <a href="{{url('https://tuf.edu.pk/n/press-release?project='.$allproject->slug)}}"><i class="fa fa-arrow-right text-arrow-blue pe-3 icomooms"></i>{{ $allproject->name}}</a>
                                  @endif
                              </div>
                            @endforeach
                          </div>
                    @endif
                  {{-- recent post  --}}
                  <div class="recent-post mt-3">
                      <div class="bg-colr py-2">
                          <h6 class="ms-4 mb-0">Recent Posts</h6>
                      </div>
                    @if($relatedPostNewsEvents != null)
                        @foreach ($relatedPostNewsEvents as $newsevent)
                        <div class="card recent-post-card mb-3 mb-lg-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card-body pe-0">
                                        <img src="https://tuf.edu.pk/Main/frontend/images/NewsAndEvents/thumbnail/{{$newsevent->thumbnail }}" class="img-fluid rounded-start">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ \Illuminate\Support\Str::limit($newsevent->name, 60) }}..
                                            <p>
                                                <a href="{{ route('news-events-detail',$newsevent->slug) }}" class="btn text-white bg-red px-3 py-1" ><i class="fa fa-angle-right me-2 angle-tag" aria-hidden="true"></i> READ MORE</a>
                                            </p>
                                        <div class="card-text d-flex">
                                            <p><small class="text-muted">{{date('M d, Y', strtotime($newsevent->event_date)) }}</small></p>
                                            @if (isset($newsevent->departments->title ))
                                            <p><small class="text-muted">{{ $newsevent->departments->title }}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                  </div>
                  {{-- Archeive  --}}
                  <div class="recent-post mt-3 mb-5">
                      <div class="bg-colr py-2">
                          <h6 class="ms-4 mb-0">Archives</h6>
                      </div>
                      <div class="archeive-posts scroller">
                        @if($recentEventDates != null)
                           @foreach ($recentEventDates as $newseventdate)
                              <div class="yearly-tags pb-2 pt-3">
                                  <a href="{{url('https://tuf.edu.pk/n/press-release?date='.date('M-Y', strtotime($newseventdate->event_date)))}}"><i class="fa fa-arrow-right text-arrow-blue pe-3 icomooms"></i>{{date('M  Y', strtotime($newseventdate->event_date)) }}</a>
                              </div>
                          @endforeach
                        @endif
                      </div>
                  </div>
                <div class="recent-post mt-4">
                      <div class="bg-colr py-2">
                          <h6 class="ms-4 mb-0">Tags</h6>
                      </div>
                      <div class="yearly-tag pb-2 pt-3">
                        @if($otherData != null)
                            @foreach ($otherData['tags'] as $alltag)
                              @if (isset($alltag->name))
                                  <a href="{{url('https://tuf.edu.pk/n/press-release?tag='.$alltag->slug)}}" class="btn bg-red text-white mb-2 me-2">{{ $alltag->name}}</a>
                              @endif
                            @endforeach
                        @endif
                      </div>
                </div>

              </div>
              <div class="col-lg-8">
                  <div class="news-letter-news mt-5">
                      {{-- card start here  --}}
                        @if($newsWithFilteration != null)
                            @foreach ($newsWithFilteration->data as $filteredNewsEvents)
                            <div class="card h-100 mx-0 mx-sm-3 my-4">
                                <div class="main-card">
                                    <img src="https://tuf.edu.pk/Main/frontend/images/NewsAndEvents/thumbnail/{{$filteredNewsEvents->thumbnail }}" class="news-and-events h-100 w-100">
                                </div>
                                <div class="card-body mt-4 mb-3 ps-4 text-adjust-card">
                                    <div class="d-sm-flex d-inline">
                                        <div class="d-inline me-2 me-md-5 text-sm-center">
                                            <h3 class="mb-0">{{date('d', strtotime($filteredNewsEvents->event_date)) }}</h3>
                                            <p class="d-flex text-black mb-sm-3 mb-0">{{date('M', strtotime($filteredNewsEvents->event_date)) }}-<span>{{date('Y', strtotime($filteredNewsEvents->event_date)) }}</span></p>
                                        </div>
                                        @if (isset($filteredNewsEvents->name))
                                        <h2 class="card-title">{{ \Illuminate\Support\Str::limit($filteredNewsEvents->name, 120) }}</h2>
                                        @endif
                                    </div>
                                    <p class="card-text text-black"> {{ \Illuminate\Support\Str::limit($filteredNewsEvents->short_description, 300, $end='...') }}</p>
                                    <a href="{{ route('news-events-detail',$filteredNewsEvents->slug) }}" class="btn text-white bg-red" style="color: black"><i class="fa fa-angle-right me-2 angle-tag" aria-hidden="true"></i> READ MORE</a>
                                </div>
                            </div>
                            @endforeach
                        @endif
                      {{-- end card  --}}
                  </div>
                  <div class="d-flex justify-content-center" style="overflow: hidden;">
                      {!! $paginator->withQueryString()->links() !!}
                  </div>
              </div>

          </div>
      </div>
  </div>
</div> {{-- news wrapper ends here --}}
{{-- {!! $data->links() !!} --}}
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.category-slides').owlCarousel({
        loop: true,
        dots: false,
        responsiveClass: true,
        autoplay:true,
        autoplayTimeout:2000,
        margin:02,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    })
</script>
    <script>
        function Remove_options()
        {
        $('#slug')
        .empty()
        .append('<option selected="selected" value="0" >Select Category</option>');
        $('#project')
        .empty()
        .append('<option selected="selected" value="0">Select Project</option>');
        $('#date')
        .empty()
        .append('<option selected="selected" value="0">Select Year</option>');
        $('#tag')
        .empty()
        .append('<option selected="selected" value="0">Select Tag</option>');
        }
    </script>
@endpush
