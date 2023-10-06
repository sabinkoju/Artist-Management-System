@extends('layouts.master')

@section('content')
    <div class="row authentication mx-0">
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="p-5">
                        <p class="h5 fw-semibold mb-2">Sign In</p>
                        <p class="mb-3 text-muted op-7 fw-normal">Welcome to Hamro Artist</p>

                        <div class="text-center my-5 authentication-barrier">

                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12 mt-0">
                                    <label for="signin-username" class="form-label text-default">User Name</label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus"
                                        id="signin-username" placeholder="user name">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label for="signin-password" class="form-label text-default d-block">Password<a
                                            href="{{ route('password.request') }}" class="float-end text-danger">Forget
                                            password
                                            ?</a></label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                            id="signin-password" placeholder="password" name="password" required
                                            autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <button class="btn btn-light" type="button"
                                            onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Remember password ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                                </div>
                                <div class="text-center authentication-barrier">
                                    <span>OR</span>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <a href="{{ route('register') }}" class="btn btn-lg btn-danger label-btn label-end">
                                        Register
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
