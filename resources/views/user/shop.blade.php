@extends('layout_user.master')

@section('content')
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h1 class="display-4">{{ __('user/shop.welcome') }}</h1>
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-4">
                <h4 class="h5">Hello, {{ $user->name }}! {{ __('user/shop.have') }} {{ $user->coin_wallet }} {{ __('user/shop.coin') }}.</h4>
                <div class="mt-4">
                    <label for="top-up" class="form-label">{{ __('user/shop.click') }}</label>
                    <a href="{{ route('user.topUp') }}" class="btn btn-primary btn-lg" id="top-up">{{ __('user/shop.topup') }}</a>
                </div>
            </div>
        </div>
        
        {{-- Shop Section --}}
        <div class="row">

        </div>
    </div>
@endsection
