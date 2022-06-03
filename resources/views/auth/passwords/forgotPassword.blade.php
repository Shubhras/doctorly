@extends('layouts.master-without-nav')

@section('title') {{ __("Forgot Password") }} @endsection

@section('body')
<header id="page-topbar" class="login-header-bg-color">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="22">
                    </span>
                </a>
                <a href="{{ url('/') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('assets/images/logo-light1.png') }}" alt="" height="35">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="{{ __("Search ...") }}"
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- App Search-->
        </div>
        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <span class="logo-lg" >
                    <img src="{{ URL::asset('assets/images/btc_logo1-new.png') }}" alt="" height="30">
                </span>&nbsp;
                <span class="logo-lg" >
                    <img src="{{ URL::asset('assets/images/btc_logo2-new.png') }}" alt="" height="30">
                </span>
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen icon-color"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<body>
@endsection

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login-top">
                            <div class="row">
                                <!-- <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> {{ __("Forgot Password") }}</h5>
                                        <p>Reset your password with {{ config('app.name'); }}.</p>
                                    </div>
                                </div> -->
                                <div class="col-6 align-self-end">
                                    <img src="{{ URL::asset('assets/images/btc_logo1-new.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="col-6 align-self-end">
                                    <img src="{{ URL::asset('assets/images/btc_logo2-new.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="{{ url('/') }}">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-login-logo">
                                        <img src="{{ URL::asset('assets/images/login-logo.png') }}" alt="" class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ url('forgot-password') }}">
                                    @csrf
                                    @if ($msg = Session::get('error'))
                                        <div class="alert alert-danger">
                                            <span> {{ $msg }} </span>
                                        </div>
                                    @endif
                                    @if ($msg = Session::get('success'))
                                        <div class="alert alert-success">
                                            <span> {{ $msg }} </span>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="username">{{ __("Email") }}</label>
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" @if (old('email')) value="{{ old('email') }}" @endif id="username" placeholder="{{ __("Enter email") }}" autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button class="btn w-md waves-effect waves-light bg-btn"
                                                type="submit">{{ __("Reset") }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>{{ __("Remember It ?") }} <a href="{{ url('login') }}" class="font-weight-medium text-primary"> {{ __("Sign In here") }}</a> </p>
                        <!-- <p>© {{ date('Y') }} {{ config('app.name'); }}. Crafted with <i class="mdi mdi-heart text-danger"></i> {{ __("by Themesbrand") }}</p> -->
                        <p>© {{ date('Y') }} {{ "BTC Latam Group" }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
