@extends('layouts.app')

@section('title')
    Login Account
@endsection

@section('guest')
    <section class="main container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-mg-6 col-lg-5">
                <div class="my-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <img src="{{ asset(App\Base::$logo) }}" class="w-50" alt="">
                    </div>
                    <div class="border bg-white rounded-lg shadow-sm">
                        <div class="p-4">
                            <h2 class="text-center font-weight-normal">Sign In</h2>
                            <p class="text-center text-black-50 mb-4">
                                Don't have an account yet?
                                <a href="{{ route('register') }}">Sign up here</a>
                            </p>
                            <a href="{{ route('gg.redirect') }}" class="btn btn-lg btn-outline-primary btn-block">
                                <i class="feather-log-in"></i>
                                Sign in with Google
                            </a>
                            <hr class="mb-5">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <div class="custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in</button>
                                <div class="text-center">
                                    {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
