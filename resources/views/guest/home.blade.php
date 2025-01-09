@extends('layout_guest.master')

@section('content')
<div class="container-fluid mt-4 mb-4">
    <h1 class="text-center mb-4">{{ __('guest/home.welcome') }}</h1>
    <div class="d-flex flex-wrap gap-4 justify-content-center">
        @foreach ($users as $user)
        <div class="card shadow-sm" style="width: 18rem; border-radius: 10px; overflow: hidden;">
            <img src="/assets/work.jpg" class="card-img-top" alt="Work Image" style="height: 180px; object-fit: cover;">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title text-primary fs-5">{{ $user->name }}</h5>
                    <p class="card-text text-secondary fs-6">
                        {{ __('guest/home.interest') }}: 
                        <span class="text-dark">
                            @foreach($user->interests as $interest)
                                {{ $interest }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </span>
                    </p>
                </div>
                <div class="text-end mt-3">
                    <a href="{{ route('login') }}">
                        <img src="/assets/add.png" alt="+" class="rounded-circle" style="width: 2rem; height: 2rem;">
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


<style>
.card {
    transition: transform 0.2s, box-shadow 0.2s; /
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    border-bottom: 1px solid #e0e0e0;
}

.card-title {
    font-weight: bold;
}

.card-text {
    font-size: 0.9rem;
    color: #6c757d;
}

a img {
    transition: transform 0.2s;
}

a img:hover {
    transform: scale(1.2);
}
</style>