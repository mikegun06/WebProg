@php
$country = ['Indonesia', 'Malaysia', 'Singapore', 'Filipina', 'Laos', 'Vietnam'];
@endphp

@extends('layouts.main')

@section('content')
<body class="bg-dark">

    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-5 p-0 mt-4">
                <div class="card-container p-0">
                    <div class="card-header text-center">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <div class="form-group mt-2">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>

                        <div class="form-group mt-2">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="text" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="form-group mt-2">
                            <label for="email">{{ __('Gender') }}</label>
                            <input id="email" type="text" class="form-control" value="{{ $user->gender }}" readonly>
                        </div>

                        <div class="form-group mt-2">
                            <label for="dob">{{ __('Date of Birth') }}</label>
                            <input id="dob" type="date" class="form-control" value="{{ $user->dob }}" readonly>
                        </div>

                        <div class="form-group mt-2">
                            <label for="country">{{ __('Country') }}</label>
                            <input id="dob" type="text" class="form-control" value="{{ $user->country }}" readonly>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
