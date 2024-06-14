@extends('admin.layouts.app')
@section('title','Edit')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between py-4">
            <p class="page-title">Edit</p>
            <a class="btn btn-sm btn-warning" href="{{route('success_story.index')}}">View All</a>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('success_story.update',$success_story->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control rounded-0" name="name" value="{{(isset($success_story->name)?$success_story->name:old('name'))}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Designation *</label>
                                    <input type="text" class="form-control rounded-0" name="designation" value="{{(isset($success_story->designation)?$success_story->designation:old('designation'))}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Image *</label>
                                    <input type="hidden" id="image" name="old_image" value="{{(isset($success_story->image)?$success_story->image:old('image'))}}">
                                    <input type="file" id="image"  name="image" class="form-control rounded-0" >
                                    <p style="font-size:12px;"><small style="color:red;">The previous image is stored here in case of uploading new image click on Choose File.</small></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Description </label>
                                    {{-- <input type="textarea" class="form-control rounded-0" name="description" value="{{(isset($success_story->description)?$success_story->description:old('description'))}}"  rows="3"> --}}
                                    <textarea class="form-control rounded-0" rows="3" cols="60" id="description"  name="description">{!!  $success_story->description !!}</textarea>
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

@endpush
