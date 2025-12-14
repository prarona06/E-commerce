@extends('layouts.admin')

@section('admin-content')
    <div class="login-page bg-body-secondary" style="width:100% !important;">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="../index2.html"
                        class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                        <h1 class="mb-0"><b>Admin</b>LTE</h1>
                    </a>
                </div>
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf

                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input  type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="e.g: example@gmail.com" />
                                <label for="loginEmail">Email</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @if(session()->has('error'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ session()->get('error') }}</strong>
                            </span>
                        @endif

                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control @error('password')
                                    is-invalid
                                @enderror" placeholder="Password" />
                                <label for="loginPassword">Password</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-8 d-inline-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" name="remember" type="checkbox" value="1" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!--end::Row-->
                    </form>
                    <!-- /.social-auth-links -->
                    <p class="mb-1"><a href="#">Forgot Password</a></p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
@endsection
