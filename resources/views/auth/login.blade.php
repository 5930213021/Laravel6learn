@extends('layouts.app')
@section('style')
<style>
    .log {
        width: 100vw;
        height: 100vh;
        background: linear-gradient(#FCC7A4,#FCBC9C,#FCAF9C,#FC9093,#FC808C,#FC718A);    
        filter: blur(Add=true, Direction=90, Strength=50);
    }
    .mrt{
        margin-top: 6rem;
    }

    .head{
        text-align: center;
        background-color: transparent;
        border: transparent;
    }
    .header{
        margin-top: 3rem;
        font-size: 20px;
    }

    .edit{
        background-color: rgb(255, 255, 255, 0.25);
        border: transparent;
    }
    .form-control:focus {
        color: #FC718A;
        background-color: rgb(255, 255, 255, 0.25);
        border-color: #FCAF9C;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(252, 144, 147, 0.25);
    }
    .form-control{
       text-align: center;
       width: 70%;
       margin-left: 15%;
       border: 1px solid #FCAF9C;
    }
    .cen{
        text-align: center;
        color: #FFF;
    }
    .left{
        text-align: left;
        margin-left: 15%
    }
</style>
@endsection


@section('content')
<div class="log">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mrt">
            <div class="card head cen">
               <div class="header">{{ __('Login') }}</div> 
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="card-body cen">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            {{-- <label for="email" class="col-form-label text-md">{{ __('E-Mail Address') }}</label> --}}
                            {{-- <div class="cen"> --}}
                                <input id="email" type="email" class="form-control edit @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            {{-- </div> --}}
                        </div>

                        <div class="form-group">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            {{-- <div class="cen"> --}}
                                <input id="password" type="password" class="form-control edit @error('password') is-invalid @enderror" 
                                    name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            {{-- </div> --}}
                        </div>

                        <div class="form-group left">
                            {{-- <div class="offset-md-4"> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            {{-- </div> --}}
                        </div>

                        <div class="form-group cen">
                            {{-- <div class="col-md-8 offset-md-4"> --}}
                                <button type="submit" class="btn btn-danger btn-md btn-block" style="margin-left: 25%; width: 50%;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link cen" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            {{-- </div> --}}
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
