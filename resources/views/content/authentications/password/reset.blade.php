@extends('layouts.blankLayout')

@section('title', 'Reset Password - Pages')

@section('page-style')
@vite([
  'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <div class="app-brand justify-content-center">
            <a href="{{ url('#') }}" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-heading fw-bold">
                <img src="{{ asset('assets/img/TrackNStock.png') }}" width="220px" height="90px">
              </span>
            </a>
          </div>
          <h4 class="mb-1">Reset Password 🔒</h4>
          <p class="mb-6">Enter your new password below</p>

          <form method="POST" id="formAuthentication" class="my-login-validation" novalidate="" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-6">
              <label for="email" class="form-label">Email</label>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
            </div>

            <div class="mb-6">
              <label for="password" class="form-label">New Password</label>
              <input id="password" type="password" class="form-control" name="password" placeholder="Enter your new password">
            </div>

            <div class="mb-6">
              <label for="password_confirmation" class="form-label">Confirm New Password</label>
              <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm your new password">
            </div>

            <button type="submit" class="btn btn-primary d-grid w-100">Reset Password</button>
          </form>

          <div class="text-center">
            <a href="{{ url('auth/login-basic') }}" class="d-flex justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl me-1"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
