@extends('admin.layouts.app')
@section('title','Add New')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between py-4">
            <p class="page-title">Add New</p>
            <a class="btn btn-sm btn-warning" href="{{route('success_story.index')}}">View All</a>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('success_story.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control rounded-0" name="name" value="{{old('name')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Designation *</label>
                                    <input type="text" class="form-control rounded-0" name="designation" value="{{old('designation')}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Image *</label>
                                    <input type="file" id="image" value="{{ old('image') }}" name="image" class="form-control rounded-0">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Description </label>
                                    {{-- <input type="text" class="form-control rounded-0" name="description" value="{{old('description')}}"> --}}
                                    <textarea class="form-control rounded-0" name="description" value="{{old('description')}}" rows="3"></textarea> 
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label for="link_type_id" class="form-label">Link Type</label>
                                    <select name="link_type_id" class="form-control form-select">
                                        @foreach ($LinkType as $link)
                                        <option
                                            value="{{ $link->id }}">{{ $link->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
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

@endpush
