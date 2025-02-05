@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Song Management</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Song Management</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start:: row-5 -->
        <div class="row">
            <div class="col-xl-12">
                @include('admin.widgets.messages')
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            {{ count($songs) }} Songs By {{ $artist->name }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="deleted-table table-responsive">
                            <div class="text-center">
                                <a href="{{ route('song.create', ['artist_id' => $artist->id]) }}" id="button"
                                    class="btn btn-primary mb-2 data-table-btn">Add New</a>
                            </div>
                            <table id="delete-datatable" class="table table-bordered text-nowrap mt-4">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Album Name</th>
                                        <th>Genre</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($songs as $song)
                                        <tr>
                                            <td>{{ $song->title }}</td>
                                            <td>{{ $song->album_name }}</td>
                                            <td>{{ $song->genre }}</td>
                                            <td>
                                                <div class="mb-md-0 mb-2">
                                                    <a href="{{ route('song.edit', ['song_id' => $song->id]) }}"
                                                        class="btn btn-icon btn-primary-transparent rounded-pill btn-wave">
                                                        <i class="ri-edit-line"></i>
                                                    </a>
                                                    <a href="{{ route('song.delete', ['song_id' => $song->id]) }}"
                                                        class="btn btn-icon btn-danger-transparent rounded-pill btn-wave me-5"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"
                                                        onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-5 -->

    </div>
@endsection
