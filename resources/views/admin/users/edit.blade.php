@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit User</h1>
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
                        {!! Form::model($user, [
                            'class' => 'row g-3 mt-0',
                            'method' => 'PUT',
                            'route' => ['user.update', $user->id],
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            {!! $errors->first('first_name', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                            {!! $errors->first('last_name', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            {{ Form::select('gender', $genders, Request::get('gender'), [
                                'class' => 'form-control',
                                'data-trigger',
                                'id' => 'gender',
                                'placeholder' => 'Select Gender',
                            ]) }}
                            {!! $errors->first('gender', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Birth Date</label>
                            {!! Form::datetimeLocal('dob', (isset($user)) ? $user->dob : null, ['class' => 'form-control']) !!}
                            {!! $errors->first('dob', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            {!! Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
                            {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                            {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@example.com']) !!}
                            {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
