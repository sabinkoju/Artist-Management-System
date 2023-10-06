@extends('layouts.admin')

@section('content')
    <div class="container-fluid pt-5">

        <!-- Start::row-1 -->
        <div class="row mt-5">
            @include('admin.dashboard.user')
            @include('admin.dashboard.album')
            @include('admin.dashboard.music')
        </div>
        <!--End::row-1 -->
    </div>
@endsection
