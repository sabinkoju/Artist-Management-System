@extends('layouts.master')

@section('content')
    <div class="row authentication mx-0">
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="p-5">
                        <p class="h5 fw-semibold mb-2">Register</p>
                        <p class="mb-3 text-muted op-7 fw-normal">Welcome to Hamro Artist</p>

                        <div class="text-center my-5 authentication-barrier">

                        </div>
                        <form method="POST" action="{{ route('postRegistration') }}">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-6 mt-0">
                                    <label for="first_name" class="form-label text-default">First Name</label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                        name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 mt-0">
                                    <label for="last_name" class="form-label text-default">Last Name</label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                        name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 mt-0">
                                    <label for="input-DataList" class="form-label">Gender</label>
                                    <select class="form-control" data-trigger name="gender" id="gender">
                                        <option value="">Select Option</option>
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                        <option value="o">Other</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mt-0">
                                    <label for="dob" class="form-label text-default">Birth Date</label>
                                    <input type="datetime-local"
                                        class="form-control form-control-lg @error('dob') is-invalid @enderror"
                                        name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 mt-0">
                                    <label for="phone" class="form-label text-default">Phone</label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 mt-0">
                                    <label for="address" class="form-label text-default">Address</label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('address') is-invalid @enderror"
                                        name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-12 mt-0">
                                    <label for="email" class="form-label text-default">Email Address</label>
                                    <input type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="password" class="form-label text-default d-block">Password</label>
                                <div class="input-group">
                                    <input type="password"
                                        class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <button class="btn btn-light" type="button"
                                        onclick="createpassword('password',this)" id="button-addon2"><i
                                            class="ri-eye-off-line align-middle"></i></button>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary" value="Register">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
