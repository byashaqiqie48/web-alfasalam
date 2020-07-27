@extends('layouts.frontend')

@section('title','Forgot Password')
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
                                        <i class="fa fa-2x fa-question-circle text-primary"></i>
                                    </p>
                                    <h1 class="h4 mb-1">
                                        Warga Belajar Forgot Password
                                    </h1>
                                    <h2 class="h6 font-w400 text-muted mb-3">
                                        Alfasalam
                                    </h2>
                                    <h6 class="text-muted mb-3">
                                        <strong>Yayasan Alfasalam</strong>
                                    </h6>
                                </div>
                                <form id="form-forgot" class="js-validation-signin" method="POST" action="{{route('warga_belajar.forgot.submit')}}">
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-alt" id="email" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group row justify-content-center mb-0">
                                            <div class="col-md-6 col-xl-10">
                                                <button type="submit" class="btn btn-block btn-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Forgot Password
                                                </button>
                                            </div>
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