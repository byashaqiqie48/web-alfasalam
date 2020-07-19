@extends('layouts.frontend')

@section('title', 'Login Warga Belajar')

@section('body')
<div id="page-container">
    <main id="main-container">
        <div class="hero-static d-flex align-items-center">
            <div class="w-100">
                <div class="bg-white">
                    <div class="content content-full">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                                <div class="text-center">
                                    <p class="mb-2">
                                        <i class="fa fa-2x fa-circle-notch text-primary"></i>
                                    </p>
                                    <h1 class="h4 mb-1">
                                        Warga Belajar Sign In
                                    </h1>
                                    <h2 class="h6 font-w400 text-muted mb-3">
                                        Alfasalam
                                    </h2>
                                    <h6 class="text-muted mb-3">
                                        <strong>Yayasan Alfasalam</strong>
                                    </h6>
                                    @if (session('status'))
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <small>{{ session('status') }}</small>
                                    </div>
                                    @endif
                                </div>
                                <form class="js-validation-signin" method="POST" action="{{route('warga_belajar.login.post')}}">
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-md-flex align-items-md-center justify-content-md-between">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="login-remember" name="remember">
                                                    <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center mb-0">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-primary">
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@stop