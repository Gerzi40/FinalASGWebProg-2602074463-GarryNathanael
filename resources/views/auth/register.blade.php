@extends('layout_guest.master')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center mt-5 mb-5">
  <div class="form-box p-4 shadow">
    <h3 class="text-center mb-4">{{ __('auth/register.register') }}</h3>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">{{ __('auth/register.email') }}</label>
          <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">{{ __('auth/register.password') }}</label>
          <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" required>
          @error('password')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">{{ __('auth/register.username') }}</label>
          <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="gender" class="form-label">{{ __('auth/register.gender') }}</label>
          <div class="form-check">
              <input type="radio" id="male" name="gender" value="male" class="form-check-input" {{ old('gender') == 'male' ? 'checked' : '' }}>
              <label for="male" class="form-check-label">{{ __('auth/register.male') }}</label>
          </div>
          <div class="form-check">
              <input type="radio" id="female" name="gender" value="female" class="form-check-input" {{ old('gender') == 'female' ? 'checked' : '' }}>
              <label for="female" class="form-check-label">{{ __('auth/register.female') }}</label>
          </div>
          @error('gender')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="interests" class="form-label">{{ __('auth/register.interests') }}</label>
          <input type="text" name="interests" class="form-control" id="interests" value="{{ old('interests') }}" required>
          @error('interests')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">{{ __('auth/register.linkedin') }}</label>
          <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" required>
          @error('username')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="mobilenumber" class="form-label">{{ __('auth/register.number') }}</label>
          <input type="text" name="mobilenumber" class="form-control" id="mobilenumber" value="{{ old('mobilenumber') }}" required>
          @error('mobilenumber')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="age" class="form-label">{{ __('auth/register.age') }}</label>
          <input type="number" name="age" class="form-control" id="age" value="{{ old('age') }}" required>
          @error('age')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="registprice" class="form-label">{{ __('auth/register.fee') }} {{ $registprice }}</label>
          <input type="hidden" name="registprice" class="form-control" value="{{ $registprice }}">
        </div>

        <button type="submit" class="btn btn-primary w-100">{{ __('auth/register.submit') }}</button>
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

</style>