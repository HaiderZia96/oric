@extends('admin.layouts.app')
@section('title','Edit')
@section('content')
<div class="container-fluid">
        <div class="d-flex justify-content-between py-4">
            <p class="page-title">{{(!empty($title) && isset($title)) ? $title : ''}}</p>
            <a class="btn btn-sm btn-warning" href="{{(!empty($indexRoute) && isset($indexRoute)) ? $indexRoute : ''}}">View All</a>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="{{ isset($method) ? $method : '' }}" id="post-event" action="{{ isset($action) ? $action : '' }}" enctype="{{ isset($enctype) ? $enctype : '' }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Event Or News Category</label>
                                            <select class="form-control rounded-0" name="news_categories_id" id="news_categories_id">
                                                <option value="">Please Select</option>
                                                     @foreach($data['categories'] as $category)
                                                        @if ($category->id)
                                                        <option {{ $newsEvent->news_categories_id == $category->id ? 'selected="selected"' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                                        @else
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endif
                                                    @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Society</label>
                                            <select class="form-control rounded-0" name="societies_id" id="societies_id">
                                                @foreach($data['societies'] as $society)
                                                        @if ($society->id)
                                                            <option {{ $newsEvent->societies_id == $society->id ? 'selected="selected"' : '' }} value="{{$society->id}}">{{$society->title}}</option>
                                                        @else
                                                            <option value="{{$society->id}}">{{$society->title}}</option>
                                                        @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Project</label>
                                            <select class="form-control rounded-0" name="project_id" id="project_id">
                                                    @foreach($data['projects'] as $project)
                                                       @if ($project->id)
                                                       <option {{ $newsEvent->project_id == $project->id ? 'selected="selected"' : '' }} value="{{$project->id}}">{{$project->name}}</option>
                                                       @else
                                                           <option value="{{$project->id}}">{{$project->name}}</option>
                                                       @endif
                                                   @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Department</label>
                                            <select class="form-control rounded-0" name="department_id" id="department_id">
                                                    @foreach($data['departments'] as $dept)
                                                        @if ($dept->id)
                                                        <option {{ $newsEvent->department_id == $dept->id ? 'selected="selected"' : '' }} value="{{$dept->id}}">{{$dept->title}}</option>
                                                        @else
                                                            <option value="{{$dept->id}}">{{$dept->title}}</option>
                                                        @endif
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Faculty</label>
                                            <select class="form-control rounded-0" name="dept_faculties_id" id="dept_faculties_id">
                                                    @foreach($data['faculties'] as $deptFaculty)
                                                        @if ($deptFaculty->id)
                                                        <option {{ $newsEvent->dept_faculties_id == $deptFaculty->id ? 'selected="selected"' : '' }} value="{{$deptFaculty->id}}">{{$deptFaculty->name}}</option>
                                                        @else
                                                            <option value="{{$deptFaculty->id}}">{{$deptFaculty->name}}</option>
                                                        @endif
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control rounded-0" id="name" name="name" value="{{(isset($newsEvent->name))?$newsEvent->name:old('name')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date *</label>
                                    <input type="date" class="form-control rounded-0" id="event_date" name="event_date" value="{{(isset($newsEvent->event_date))?$newsEvent->event_date:old('event_date')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cover Image *</label>
                                    <input type="hidden" class="form-control rounded-0" id="cover_image" name="cover_image" value="{{(isset($newsEvent->cover_image))?$newsEvent->cover_image:old('cover_image')}}">
                                    <input type="file" class="form-control rounded-0" id="cover_image" name="cover_image">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Thumbnail *</label>
                                    <input type="hidden" class="form-control rounded-0" id="thumbnail" name="thumbnail" value="{{(isset($newsEvent->thumbnail))?$newsEvent->thumbnail:old('thumbnail')}}">
                                    <input type="file" class="form-control rounded-0" id="thumbnail" name="thumbnail">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">SDGS Category</label>
                                    <select class="form-control rounded-0" name="sdgs_category" id="sdgs_category">
                                    @if ($newsEvent->sdgs_category)
                                        <option value="{{ $newsEvent->sdgs_category }}">{{ $newsEvent->sdgs_category }}</option>
                                    @endif
                                        <option value="">Please Select</option>
                                        <option value="No Poverty">1 [No Poverty]</option>
                                        <option value="Zero Hunger">2 [Zero Hunger]</option>
                                        <option value="Good Health and Well-being">3 [Good Health and Well-being]</option>
                                        <option value="Quality Education">4 [Quality Education]</option>
                                        <option value="Gender Equality">5 [Gender Equality]</option>
                                        <option value="Clean Water and Sanitation">6 [Clean Water and Sanitation]</option>
                                        <option value="Affordable and Clean Energy">7 [Affordable and Clean Energy]</option>
                                        <option value="Decent Work and Economic Growth">8 [Decent Work and Economic Growth]</option>
                                        <option value="Industry, Innovation and Infrastructure">9 [Industry, Innovation and Infrastructure]</option>
                                        <option value="Reduced Inequality">10 [Reduced Inequality]</option>
                                        <option value="Sustainable Cities and Communities">11 [Sustainable Cities and Communities]</option>
                                        <option value="Responsible Consumption and Production">12 [Responsible Consumption and Production]</option>
                                        <option value="Climate Action">13 [Climate Action]</option>
                                        <option value="Life Below Water">14 [Life Below Water]</option>
                                        <option value="Life on Land">15 [Life on Land]</option>
                                        <option value="Peace, Justice and Strong Institution">16 [Peace, Justice and Strong Institution]</option>
                                        <option value="Partnerships for the Goals">17 [Partnerships for the Goals]</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tag</label>
                                    <select class="form-control rounded-0 tags" id="tag" name="tag[]" multiple="multiple">
                                        @foreach($data['tags'] as $newtag)
                                                <option value="{{$newtag->slug}}" @foreach($selectedtags as $selectedtag) {{ $newtag->slug == $selectedtag ? 'selected' : '' }} @endforeach>{{$newtag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Short Description </label>
                                    <textarea class="form-control rounded-0" rows="2" cols="100" id="short_description" name="short_description">{{ (isset($newsEvent->short_description))?$newsEvent->short_description:old('short_description') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Event Description *</label>
                                    <textarea class="form-control rounded-0" rows="2" cols="100" id="news-ckeditor"  name="description">{!! (isset($newsEvent->description))?$newsEvent->description:old('description') !!}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="submit" class="btn btn-sm btn-success" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- <script src="{{asset('admin/js/select2.js')}}"></script> -->
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/ckeditor/ckfinder/ckfinder.js')}}"></script>
    <script src="{{asset('admin/ckeditor/samples/js/sample.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#tags').select2();
            //Editor
            var editor = CKEDITOR.replace( 'news-ckeditor', {
                filebrowserUploadUrl: "{{route('news-event.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
            });
            //Upload Data
             //Upload Data
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('submit', '#post-event', function(event) {
                var formData = new FormData(this);
                event.preventDefault();
                $.ajax({
                    type:'POST',
                    url:"{{ (isset($action) ? $action : '') }}",
                    dataType: "json",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(!$.trim(response.data)) {
                            toastr.success("Data Updated Successfully!")
                            window.location.href="{{route('news-event.index')}}"

                        }else{
                            $.each(response.data, function (key, v) {
                                toastr.error(v)
                            });
                        }
                    }
                });
            });
    });
</script>
@endpush

