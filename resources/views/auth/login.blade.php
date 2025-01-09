@extends('layout_guest.master')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center mt-5">
    <div class="form-box p-4 shadow">
        <h3 class="text-center mb-4">{{ __('auth/login.loginHeader') }}</h3>
        <form action="{{ route('attemplogin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('auth/login.email') }}</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('auth/login.password') }}</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @error('error')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="text-center mb-3">
                <p>{{ __('auth/login.account') }} <a href="{{ route('register.form') }}" class="text-primary">{{ __('auth/login.register') }}</a></p>
            </div>
            <button type="submit" class="btn btn-primary w-100">{{ __('auth/login.loginButton') }}</button>
        </form>
    </div>
</div>
@endsection

<style>
  /* Form Box Styling */
.form-box {
    background-color: #ffffff; /* White background */
    border: 2px solid #90caf9; /* Light blue border */
    border-radius: 8px; /* Rounded corners */
    width: 100%; /* Full width */
    max-width: 500px; /* Limit the width */
}

.form-label {
    color: #1976d2; /* Blue color for labels */
}

.form-control {
    border-color: #1976d2; /* Blue border for input fields */
    box-shadow: 0 0 5px rgba(25, 118, 210, 0.3); /* Slight shadow effect */
}

.form-control:focus {
    border-color: #1565c0; /* Darker blue when the field is focused */
    box-shadow: 0 0 5px rgba(21, 101, 192, 0.6); /* Shadow effect when focused */
}

.btn-primary {
    background-color: #1976d2; /* Blue background for the button */
    border-color: #1565c0; /* Darker blue border for the button */
}

.btn-primary:hover {
    background-color: #1565c0; /* Darker blue on hover */
    border-color: #0d47a1; /* Even darker blue on hover */
}

.text-danger {
    color: #d32f2f; /* Red color for error messages */
}

.alert-danger {
    background-color: #f8d7da; /* Light red background for alert */
    color: #842029; /* Dark red text for alert */
    border: 1px solid #f5c2c7; /* Light red border for alert */
}

</style>