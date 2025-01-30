@extends('auth.auth-app')
@section('page_title', ' Login')

@section('content_auth')

<p class="login-box-msg">{{ __('Forgot Password') }} </p>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </div>
</form>
<br>
<p class="mb-2">
    <a href="{{ route('login') }}" class="text-center">{{ __('Try to Login!') }}</a>
</p>

@endsection