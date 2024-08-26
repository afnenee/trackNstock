@extends('layouts/blankLayout')

@section('title', 'Forgot Password Basic - Pages')

@section('page-style')
@vite([
  'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Forgot Password -->
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{ url('#') }}" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-heading fw-bold">
                <img src="{{ asset('assets/img/TrackNStock.png') }}" width="220px" height="90px">
              </span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1">Forgot Password? 🔒</h4>
          <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
          <!-- <form id="formAuthentication" class="mb-6" action="{{url('/')}}" method="GET"> -->
            <form method="POST" id="formAuthentication" class="my-login-validation" novalidate="" action="{{ route('password.email') }}">
              @csrf

              @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
               @endif

              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

            <div class="mb-6">
              <label for="email" class="form-label">Email</label>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
            </div>
            <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
          </form>
          <div class="text-center">
            <a href="{{url('auth/login-basic')}}" class="d-flex justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl me-1"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection
