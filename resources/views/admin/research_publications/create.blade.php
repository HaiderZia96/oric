@extends('admin.layouts.app')
@section('title')
    {{(!empty($page_title) && isset($page_title)) ? $page_title : ''}}
@endsection
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
                        <form method="{{isset($method) ? $method:''}}" id="researches" enctype="{{isset($enctype) ? $enctype:''}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Author *</label>
                                    <input type="text" class="form-control rounded-0" id="author" name="author" value="{{old('author')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control rounded-0" id="name" name="name" value="{{old('name')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control rounded-0" id="title" name="title" value="{{old('title')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Volume No</label>
                                    <input type="text" class="form-control rounded-0" id="volume_no" name="volume_no" value="{{old('volume_no')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Publication Type *</label>
                                    <select class="form-control rounded-0" name="fac_pub_type_id" id="fac_pub_type_id">
                                        <option value="">Please Select</option>
                                        @if($data['fac_pub_types'])
                                            @foreach($data['fac_pub_types'] as $type)
                                                <option value="{{$type->id}}">{{$type->type}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Sdgs Category</label>
                                    <select class="form-control rounded-0" name="sdgs_category" id="sdgs_category">
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
                                    <label class="form-label">DOI</label>
                                    <input type="text" class="form-control rounded-0" id="DOI" name="DOI" value="{{old('DOI')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Impact Factor</label>
                                    <input type="text" class="form-control rounded-0" id="impact_factor" name="impact_factor" value="{{old('impact_factor')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Scopus Index</label>
                                    <input type="text" class="form-control rounded-0" id="scopus_index" name="scopus_index" value="{{old('scopus_index')}}">
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
    <script src="{{asset('admin/js/select2.js')}}"></script>
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/ckeditor/ckfinder/ckfinder.js')}}"></script>
    <script src="{{asset('admin/ckeditor/samples/js/sample.js')}}"></script>
    <script>
        $(document).ready(function() {
            //Upload Data
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('submit', '#researches', function(event) {
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
                            window.location.href="{{route('research-publication.index')}}"

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
