@extends('layouts.layout')

@section('title', 'Dashboard')

@push('vendor.styles')
    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" async type="text/css" href="{{ asset('admin/css/apexcharts.css') }}">
@endpush

@prepend('page.styles')
    <!-- Page Stylesheets -->
    <link rel="stylesheet" async type="text/css" href="{{ asset('admin/css/dashboard-analytics.css') }}">
    <link rel="stylesheet" async type="text/css" href="{{ asset('admin/css/card-analytics.css') }}">
    <link rel="stylesheet" async type="text/css" href="{{ asset('admin/css/tour.css') }}">
@endprepend

@push('vendor.scripts')
    <!-- Vendor JS -->
    <script type="text/javascript" async src="{{ asset('admin/js/apexcharts.min.js') }}"></script>
@endpush

@prepend('page.scripts')
    <!-- Page JS -->
    <script type="text/javascript" async src="{{ asset('admin/js/dashboard-analytics.js') }}"></script>
@endprepend

@section('content')
<style>
.card{
    height:248px;
}
</style>
<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card bg-analytics text-white">
                <div class="card-content">
                    <div class="card-body text-center">
                        <img src="{{ asset('admin/decore-left.png') }}" class="img-left" alt="card-img-left">
                        <img src="{{ asset('admin/decore-right.png')}}" class="img-right" alt="card-img-right">
                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                            <div class="avatar-content">
                                <i class="feather icon-award white font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-2 text-white">Admin Panel</h1>
                            <!--<p class="mx-auto w-75 mb-2">Start your day off right with some <b>account stats</b> and <b>recommendations</b>.</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12" data-metric="usersMetric">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <a href="{{route('categories.index')}}"><i class="fas fa-list text-warning font-medium-5"></i>
                            </a>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25"><a href="{{route('categories.index')}}">{{$categories}}</a></h2>
                    <p class="mb-0">Categories</p>
                </div>
                
            </div>
        </div>
       
        <div class="col-lg-3 col-md-6 col-12" data-metric="usersMetric">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <a href="{{route('languages.index')}}"><i class="fas fa-language text-warning font-medium-5"></i>
                            </a>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25"><a href="{{route('languages.index')}}">{{$languages}}</a></h2>
                    <p class="mb-0">Languages</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12" data-metric="usersMetric">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <a href="{{route('users.index')}}"><i class="feather icon-users text-warning font-medium-5"></i>
                            </a>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25"><a href="{{route('users.index')}}">{{$users}}</a></h2>
                    <p class="mb-0">Users</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12" data-metric="usersMetric">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <a href="{{route('books.index')}}"><i class="fas fa-book text-warning font-medium-5"></i>
                            </a>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25"><a href="{{route('books.index')}}">{{$books}}</a></h2>
                    <p class="mb-0">Books</p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Dashboard Analytics End -->
@endsection