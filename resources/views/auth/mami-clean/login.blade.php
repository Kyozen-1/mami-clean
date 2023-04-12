@extends('auth.mami-clean.layouts.app')

@section('content')
    <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
        <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-50 px-5">
            <div class="sh-11">
            <a href="{{ route('beranda') }}">
                {{-- <div class="logo-default"></div> --}}
                <img src="{{ asset('images/mami-clean/logo/642b9aa063e73-230404.png') }}" alt="logo" style="height: 5rem;"/>
            </a>
            </div>
            <div class="mb-5">
            <h2 class="cta-1 mb-0 text-primary">Selamat Datang,</h2>
            </div>
            <div class="mb-5">
            <p class="h6">Masukan akun anda untuk login.</p>
            {{-- <p class="h6">
                If you are not a member, please
                <a href="Pages.Authentication.Register.html">register</a>
                .
            </p> --}}
            </div>
            <div>
            <form action="{{ route('mami-clean.login.submit') }}" method="POST" class="tooltip-end-bottom" novalidate>
                @csrf
                <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="email"></i>
                <input class="form-control" placeholder="Email" name="email" />
                </div>
                <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="lock-off"></i>
                <input class="form-control pe-7" name="password" type="password" placeholder="Password" />
                {{-- <a class="text-small position-absolute t-3 e-3" href="Pages.Authentication.ForgotPassword.html">Forgot?</a> --}}
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection
