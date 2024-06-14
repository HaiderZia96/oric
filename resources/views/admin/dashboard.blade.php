@extends('admin.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="py-4">
            <p class="page-title">Oric/Dashboard</p>
        </div>
        
        <div class="row mb-4">
            <div class="col-xl-3 col-lg-6 mb-2">
                <div class="bg-pink">
                    <div class="info-box">
                        <div class="info-icon">
                            <i class="fa fa-link"></i>
                        </div>
                        <div class="info-content">
                            <p>Important Links</p>
                            <h3>{{$link_counts}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-2">
                <div class="bg-cyan">
                    <div class="info-box">
                        <div class="info-icon">
                            <i class="fa fa-download"></i>
                        </div>
                        <div class="info-content">
                            <p>Downloads</p>
                            <h3>{{$download_counts}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-2">
                <div class="bg-green">
                    <div class="info-box">
                        <div class="info-icon">
                            <i class="fa  fa-certificate"></i>
                        </div>
                        <div class="info-content">
                            <p>Success Stories</p>
                            <h3>{{$success_counts}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection
@push('js')
    <script src="{{asset('admin/js/Chart.js')}}"></script>
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
@endpush
