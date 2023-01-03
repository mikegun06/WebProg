@extends('layouts.main')

@section('css')
<style>
    .row {
        justify-content: space-around;
    }

</style>
@endsection

@section('content')
<body class="bg-dark my-auto">

    {{-- login form --}}
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="card col-5 p-0">
                <div class="card-container p-0">
                    <div class="card-header text-center">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- email baru --}}
                            <div class="form-group mt-2">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- password --}}
                            <div class="form-group mt-3">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Enter your password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                        <p class="mt-3">Already have an account? <a href="register">Register Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
