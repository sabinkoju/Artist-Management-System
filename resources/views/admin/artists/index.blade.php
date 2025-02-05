@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Artist Management</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Artist Management</li>
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
                            {{ count($artists) }} Artists
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="deleted-table table-responsive">
                            <div class="text-center">
                                <a href="{{ route('artist.create') }}" id="button" class="btn btn-primary">Add
                                    New</a>

                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#import-artist">Import Data</button>

                                <a class="btn btn-success" href="{{ route('artist.file-export') }}">Export Data</a>

                                <!-- Start:: Excel Import -->
                                <div class="modal fade" id="import-artist" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form action="{{ route('artist.file-import') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Import Data</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-4">
                                                    <div class="row gy-3">
                                                        <div class="col-xl-12">
                                                            <input type="file" name="file" class="form-control"
                                                                id="customFile">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary">Import Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End:: Excel Import -->
                            </div>
                            <table id="delete-datatable" class="table table-bordered text-nowrap mt-4">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artists as $artist)
                                        <tr>
                                            <td>{{ $artist->name }}</td>
                                            <td>
                                                @if ($artist->gender == 'm')
                                                    Male
                                                @elseif ($artist->gender == 'f')
                                                    Female
                                                @else
                                                    Other
                                                @endif
                                            </td>
                                            <td>{{ $artist->address }}</td>
                                            <td>
                                                <div class="mb-md-0 mb-2">
                                                    <a href="{{ route('artist.song', ['artist_id' => $artist->id]) }}"
                                                        class="btn btn-icon btn-success-transparent rounded-pill btn-wave">
                                                        <i class="ri-mv-fill"></i>
                                                    </a>
                                                    <a href="{{ route('artist.edit', ['artist_id' => $artist->id]) }}"
                                                        class="btn btn-icon btn-primary-transparent rounded-pill btn-wave">
                                                        <i class="ri-edit-line"></i>
                                                    </a>
                                                    <a href="{{ route('artist.show', ['artist_id' => $artist->id]) }}"
                                                        class="btn btn-icon btn-secondary-transparent rounded-pill btn-wave">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a href="{{ route('artist.delete', ['artist_id' => $artist->id]) }}"
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
