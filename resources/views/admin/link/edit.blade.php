@extends('admin.layouts.app')
@section('title','Edit')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between py-4">
            <p class="page-title">Edit</p>
            <a class="btn btn-sm btn-warning" href="{{route('link.index')}}">View All</a>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('link.update',$link->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control rounded-0" name="name" value="{{(isset($link->name)?$link->name:old('name'))}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Url *</label>
                                    <input type="text" class="form-control rounded-0" name="url" value="{{(isset($link->url)?$link->url:old('url'))}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="link_type_id" class="form-label">Link Type *</label>
                                    <select name="link_type_id" class="form-control form-select">
                                        @foreach ($LinkType as $linkt)
                                        <option
                                            value="{{ $linkt->id }}"@if($linkt->id ==$link->link_type_id ) selected @endif>{{ $linkt->name }}</option>
                                        @endforeach
                                    </select>
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
