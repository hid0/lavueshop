@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-5">
            <div class="card bg-white border">
                {{-- <div class="card-header bg-transparent border-0">{{__('Login')}}</div> --}}

                <div class="card-body">
                    <form action="{{route('login')}}" method="POST" aria-label="{{__('Login')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="col-sm-12 col-form-label pl-0">
                                    {{__('Email Address')}}
                                </label>
                            <br>
                            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="col-md-4 col-form-label text-md-left pl-0">
                                    {{ __('Password') }}
                                </label>
                                <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">{{ __('Remember Me') }}</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn-block btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <br>

                                <a href="{{ route('password.request') }}" class="btn btn-link pl-0">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
