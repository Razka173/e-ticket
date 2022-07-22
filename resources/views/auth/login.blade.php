@extends('layouts.app', ['body_class' => 'hold-transition login-page'])

@section('content')
  <div class="login-box">
    {{-- BEGIN LOGIN LOGO --}}
    <div class="login-logo">
      <a href="{{ route('login') }}"> <img src="{{ asset('img/unj_logo.png') }}" alt="Login Admin"> </a>
    </div>
    {{-- END LOGIN LOGO --}}
    {{-- BEGIN LOGIN CARD BODY --}}
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><strong>Silakan login</strong> untuk memulai sesi Anda</p>
        <form method="post" action="{{ route('login') }}">
          @csrf
          {{-- BEGIN EMAIL --}}
          <div class="input-group mb-3">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
            @error('email')
              <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          {{-- END EMAIL --}}
          {{-- BEGIN PASSWORD --}}
          <div class="input-group mb-3">
            <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
              <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          {{-- END PASSWORD --}}

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">Ingat Saya</label>
              </div>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>

          </div>
        </form>

        <p class="mb-1">
          <a href="{{ route('password.request') }}">Lupa password</a>
        </p>

      </div>
      {{-- END LOGIN CARD BODY --}}
    </div>
  </div>
@endsection

@section('custom_stylesheet')
@endsection

@section('third_party_scripts')
@endsection

@push('page_css')
  <style>
    .login-page {
      background-color: lightgreen;
      background-size: cover;
      background-repeat: no-repeat;
      position: relative;
    }

    .login-logo img {
      width: 40%;
    }

    .login-logo a b {
      color: white;
    }

    .login-card-body,
    .card {
      border-radius: 20px;
    }
  </style>
@endpush
