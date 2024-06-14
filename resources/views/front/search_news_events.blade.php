
@extends('front.layouts.app')
@section('content')
    <div class="search-news-events-wrapper">
        <div class="top-banner">
            <img class="img-fluid" src="https://tuf.edu.pk/Main/frontend/images/new-design/news-and-event.jpg" alt="How to Apply">
            <div class="perfect-left">
                <h1><span>NEWS &</span></h1>
                <h1><span>EVENTS</span></h1>
            </div>
            <!-- <div class="icon-vertical text-center d-flex flex-column me-4">
                <a href="https://www.instagram.com/unioffaisalabad/"><i class="fa fa-instagram mb-sm-2 mt-sm-3  mt-1" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/unioffaisalabad"><i class="fa fa-facebook mb-sm-2 mt-sm-2 mt-1" aria-hidden="true"></i></a>
                <a href="https://twitter.com/unioffaisalabad"><i class="fa fa-twitter mb-sm-2 mt-sm-2 mt-1" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/universityoffaisalabadofficial"><i class="fa fa-youtube mb-sm-2 mt-sm-2 mt-1" aria-hidden="true"></i></a>
            </div> -->
        </div>
        <div class="container">
            <div class="search-wrapper mt-3">
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
                        <span class="mx-3"> <input  type="radio" value="all" {{ request()->searchType == 'all' ? 'checked' : ''}} name="searchType"> All</span>
                        <span> <input  type="radio" value="title" {{ request()->searchType == 'title' ? 'checked' : ''}} name="searchType"> Title </span>
                    </div>
                </form>
            </div>
            <div class="row my-5" id="newsss"><!-- row start -->

                @if($returningData !=null)
                        @foreach ($res->data as $newsevent)
                        <div class="col-xl-4 col-lg-4 col-md-6 mb-5 col-12" ><!--col-starts-here -->
                            <div class="card news-events-cards h-100 mt-2 mb-2">  <!--card starts -->
                                <div class="top-date-and-month">
                                    <div class="all-dates">
                                        <div class="month">
                                            <label>{{date('d', strtotime($newsevent->event_date)) }}</label>
                                            <label>{{date('M', strtotime($newsevent->event_date)) }}</label>
                                        </div>
                                        <div class="date">{{date('Y', strtotime($newsevent->event_date)) }}</div>
                                    </div>
                                </div>
                                <a href="{{ route('news-events-detail',$newsevent->slug) }}">
                                    <img src="https://tuf.edu.pk/Main/frontend/images/NewsAndEvents/thumbnail/{{$newsevent->thumbnail }}" alt="news-and-events" class="card-img-top img-fluid image-animat"> <!-- card-top-image-starts -->
                                </a>
                                <div class="card-body">
                                    <div class="department-and-campuses mt-2 mb-2">   <!--department-campuses-starts -->
                                        <div class="wings">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i><span>The University of Faisalabad</span>
                                            @if (isset($newsevent->department_id['title']))
                                                <i class="fa fa-university" aria-hidden="true"></i> <span>{{ $newsevent->department_id['title']  }}</span>
                                            @endif
                                        </div>
                                    </div>  <!--department-campuses-ends -->
                                    <a class="card-title mt-3 mb-3" href="{{ route('news-events-detail',$newsevent->slug) }}">
                                      <b>{{ \Illuminate\Support\Str::limit($newsevent->name, 30, $end='...') }}</b>
                                    </a>

                                    <a class="card-text mt-3 mb-3" href="{{ route('news-events-detail',$newsevent->slug) }}">  <!--card text starts -->
                                        {{ \Illuminate\Support\Str::limit($newsevent->short_description, 180, $end='...') }}
                                        <span class="read-more-link read-more">Read More<i class="fa fa-caret-right ms-2" aria-hidden="true"></i></span>
                                    </a><!--card text ends -->
                                </div>
                            </div><!-- card ends here -->
                        </div><!-- col-ends-here -->
                    @endforeach
                @else

                    <div class="text-center text-danger">
                        <h2 class="mt-5">No posts found</h2>
                    </div>
                @endif
                <div class="d-flex justify-content-center" style="overflow: hidden;">
                    {!! $paginator->links() !!}
                </div>
            </div><!-- row ends -->
            <div class="d-flex justify-content-center" style="overflow: hidden;">

            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
