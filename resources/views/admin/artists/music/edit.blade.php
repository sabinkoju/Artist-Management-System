@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Music</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Music Management</li>
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
                        {!! Form::model($music, [
                            'class' => 'row g-3 mt-0',
                            'method' => 'PUT',
                            'route' => ['song.update', $music->id],
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Album Name</label>
                            {!! Form::text('album_name', null, ['class' => 'form-control', 'placeholder' => 'Album Name']) !!}
                            {!! $errors->first('album_name', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Genre</label>
                            {{ Form::select('genre', $genres, Request::get('genre'), [
                                'class' => 'form-control',
                                'data-trigger',
                                'id' => 'genre',
                                'placeholder' => 'Select Genre',
                            ]) }}
                            {!! $errors->first('genre', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update Music</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
