@php
$country = ['Indonesia', 'United States', 'Argentina', 'Costa Rica', 'Japan', 'Brazil'];
@endphp

@extends('layouts.main')

@section('content')
<body class="bg-dark my-auto">

    {{-- login form --}}
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="card col-5 p-0">
                <div class="card-container p-0">
                    <div class="card-header text-center">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- name --}}
                            <div class="form-group mt-1">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter your name">
                                <small id="nameHelp" class="form-text text-muted">Please user your real name, thanks!.</small>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- email --}}
                            <div class="form-group mt-3">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="Enter your email" value="{{ old('email') }}">
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
                                name="password" placeholder="Enter your password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- confirm password --}}
                            <div class="form-group mt-3">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                name="password-confirmation" placeholder="Re-enter your password">
                            </div>

                            {{-- Gender --}}
                            <div class="form-group mt-3">
                                <label for="Gender" class="col-form-label text-md-end">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                            name="gender" id="gender" value="Male"
                                            {{ old('gender')=='Male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                            name="gender" id="gender2" value="Female"
                                            {{ old('gender')=='Female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender2">
                                            Female
                                        </label>
                                    </div>
                                    @error('gender')
                                    {{-- error messages --}}
                                    <span class="invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Date of birth --}}
                            <div class="form-group mt-3">
                                <label for="exampleInputDOB1">Date of Birth</label>
                                <input type="date" id="dob" class="form-control @error('dob') is-invalid @enderror" placeholder="Date of Birth" value="{{ old('dob') }}">
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Country --}}
                            <div class="form-group mt-3">
                                <label for="exampleInputCountry1">Country</label>
                                <select class="form-control @error('country') is-invalid @enderror" name="country"
                                    id="country">
                                    <option value="">Choose Country</option>
                                    @for($a=0;$a<count($country);$a++) <option value="{{ $country[$a] }}"
                                        {{ old('country')==$country[$a] ? 'selected' : '' }}>
                                        {{ $country[$a] }}
                                        </option>
                                        @endfor
                                </select> @error('country') <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Register Button --}}
                        <button type="submit" class="btn btn-primary justify-content-center mt-3">{{ __('Register')}}</button>
                        </form>
                        <p class="mt-3">Have an account? <a href="login">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
