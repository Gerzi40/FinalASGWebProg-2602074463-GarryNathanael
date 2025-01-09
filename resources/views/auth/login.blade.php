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
.form-box {
    background-color: #ffffff;
    border: 2px solid #90caf9;
    border-radius: 8px;
    width: 100%;
    max-width: 500px;
}

.form-label {
    color: #1976d2;
}

.form-control {
    border-color: #1976d2;
    box-shadow: 0 0 5px rgba(25, 118, 210, 0.3);
}

.form-control:focus {
    border-color: #1565c0;
    box-shadow: 0 0 5px rgba(21, 101, 192, 0.6);
}

.btn-primary {
    background-color: #1976d2;
    border-color: #1565c0;
}

.btn-primary:hover {
    background-color: #1565c0;
    border-color: #0d47a1;
}

.text-danger {
    color: #d32f2f;
}

.alert-danger {
    background-color: #f8d7da;
    color: #842029;
    border: 1px solid #f5c2c7;
}

</style>