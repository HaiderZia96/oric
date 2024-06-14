@extends('admin.layouts.app')
@section('title')
    {{(!empty($page_title) && isset($page_title)) ? $page_title : ''}}
@endsection
<!-- @push('head-scripts')
    <link rel="stylesheet" href="{{asset('admin/css/select2.css')}}">
@endpush -->
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
                        <form method="{{isset($method) ? $method:''}}" id="post-event" enctype="{{isset($enctype) ? $enctype:''}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Event Or News Category</label>
                                            <select class="form-control rounded-0" name="news_categories_id" id="news_categories_id">
                                                <option value="">Please Select</option>
                                                @if($data['categories'])
                                                    @foreach($data['categories'] as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Society</label>
                                            <select class="form-control rounded-0" name="societies_id" id="societies_id">
                                                <option value="">Please Select</option>
                                                @if($data['societies'])
                                                    @foreach($data['societies'] as $society)
                                                        <option value="{{$society->id}}">{{$society->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Project</label>
                                            <select class="form-control rounded-0" name="project_id" id="project_id">
                                                <option value="">Please Select</option>
                                                @if($data['projects'])
                                                    @foreach($data['projects'] as $project)
                                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Department</label>
                                            <select class="form-control rounded-0" name="department_id" id="department_id">
                                                <option value="">Please Select</option>
                                                @if($data['departments'])
                                                    @foreach($data['departments'] as $department)
                                                        <option value="{{$department->id}}">{{$department->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Faculty</label>
                                            <select class="form-control rounded-0" name="dept_faculties_id" id="dept_faculties_id">
                                                <option value="">Please Select</option>
                                                @if($data['faculties'])
                                                    @foreach($data['faculties'] as $faculty)
                                                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control rounded-0" id="name" name="name" value="{{old('name')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date *</label>
                                    <input type="date" class="form-control rounded-0" id="event_date" name="event_date" value="{{old('event_date')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Thumbnail *</label>
                                    <input type="file" class="form-control rounded-0" id="thumbnail" name="thumbnail" value="{{old('thumbnail')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cover Image *</label>
                                    <input type="file" class="form-control rounded-0" id="cover_image" name="cover_image" value="{{old('cover_image')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">SDGS Category</label>
                                    <select class="form-control rounded-0" name="sdgs_category" id="sdgs_category">
                                        <option value="">Please Select</option>
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
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tag</label>
                                    <select class="form-control rounded-0 tags" id="tag" name="tag[]" multiple>
                                        @if($data['tags'])
                                            @foreach($data['tags'] as $tag)
                                                <option value="{{$tag->slug}}">{{$tag->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Short Description *</label>
                                    <textarea class="form-control rounded-0" rows="2" cols="100" id="short_description" name="short_description">{{old('short_description')}}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Event Description *</label>
                                    <textarea class="form-control rounded-0" rows="2" cols="100" id="news-ckeditor"  name="description">{{old('description')}}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="submit" class="btn btn-sm btn-success" value="Add New">
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
