@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Create New User</h1>
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
                            Basic Information
                        </div>
                    </div>
                    <div class="card-body">

                        <form class="row g-3 mt-0" method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First name"
                                    aria-label="First name">
                                {!! $errors->first('first_name', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last name"
                                    aria-label="Last name">
                                    {!! $errors->first('last_name', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-control" data-trigger name="gender" id="gender">
                                    <option value="">Select Option</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>
                                {!! $errors->first('gender', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Birth Date</label>
                                <input type="datetime-local" name="dob" class="form-control" id="input-date">
                                {!! $errors->first('dob', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control" id="input-tel"
                                    placeholder="Phone">
                                    {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address"
                                    aria-label="Address">
                                    {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="abc@mail.com">
                                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                            </div>


                            <div class="col-md-12">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword4">
                                {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
