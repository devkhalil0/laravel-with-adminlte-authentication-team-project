@extends('layouts.app')
@section('css')
<style>
    .login-page-css{
        -ms-flex-align: center;
        align-items: center;
        background-color: #e9ecef;
        display: -ms-flexbox;
        display: flex;
        padding-bottom: 2rem;
        -ms-flex-direction: column;
        flex-direction: column;
        -ms-flex-pack: center;

        justify-content: center;
    }

    @media(min-width:576px){
        .login-page-css{
        height: 0;
      }
    }
    @media(min-width:768px){
        .login-page-css{
        height: 0;
      }
    }
    @media(min-width:600px){
        .login-page-css{
        height: 50vh;
      }
    }
    @media(min-width:992px){
        .login-page-css {
            height: 100vh;
        }
    }
    @media(min-width:1200px){
        .login-page-css {
            height: 100vh;
        }
    }

</style>
@endsection
@section('content')

<div class="hold-transition login-page-css">
    <div class="login-box bg-4">
        <div class="login-logo">
            <a href="/">Reset Password</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
