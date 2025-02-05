@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">View User</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Management</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            User Information
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="fs-15 mb-2 me-4 fw-semibold">First Name : <label
                                        class="fs-15 mb-2 me-4 fw-normal"> {{ $user->first_name }}</label></p>
                            </div>
                            <div class="col-xl-12">
                                <p class="fs-15 mb-2 me-4 fw-semibold">Last Name : <label class="fs-15 mb-2 me-4 fw-normal">
                                        {{ $user->last_name }}</label></p>
                            </div>
                            <div class="col-xl-12">
                                <p class="fs-15 mb-2 me-4 fw-semibold">Gender : <label class="fs-15 mb-2 me-4 fw-normal">
                                        @if ($user->gender == 'm')
                                            Male
                                        @elseif ($user->gender == 'f')
                                            Female
                                        @else
                                            Other
                                        @endif
                                    </label>
                                </p>
                            </div>
                            <div class="col-xl-12">
                                <p class="fs-15 mb-2 me-4 fw-semibold">Birth Date : <label
                                        class="fs-15 mb-2 me-4 fw-normal"> {{ $user->dob }}</label></p>
                            </div>
                            <div class="col-xl-12">
                                <p class="fs-15 mb-2 me-4 fw-semibold">Phone : <label class="fs-15 mb-2 me-4 fw-normal">
                                        {{ $user->phone }}</label></p>
                            </div>
                            <div class="col-xl-12">
                                <p class="fs-15 mb-2 me-4 fw-semibold">Address : <label class="fs-15 mb-2 me-4 fw-normal">
                                        {{ $user->address }}</label></p>
                            </div>
                            <div class="col-xl-12">
                                <p class="fs-15 mb-2 me-4 fw-semibold">Email : <label class="fs-15 mb-2 me-4 fw-normal">
                                        {{ $user->email }}</label></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
