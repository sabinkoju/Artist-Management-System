@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Create New Music</h1>
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

                        <form class="row g-3 mt-0" method="POST" action="{{ route('song.store') }}">
                            @csrf
                            <input type="hidden" name="artist_id" value="{{$artistId}}" class="form-control" placeholder="Name"
                                    aria-label="Title">
                            <div class="col-md-6">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Name"
                                    aria-label="Title">
                                {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Album Name</label>
                                <input type="text" name="album_name" class="form-control" placeholder="Name"
                                    aria-label="Album Name">
                                {!! $errors->first('album_name', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Genre</label>
                                <select class="form-control" data-trigger name="genre" id="genre">
                                    <option value="">Select Option</option>
                                    <option value="rnb">RNB</option>
                                    <option value="country">Country</option>
                                    <option value="classic">Classic</option>
                                    <option value="rock">Rock</option>
                                    <option value="jazz">Jazz</option>
                                </select>
                                {!! $errors->first('genre', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Music</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
