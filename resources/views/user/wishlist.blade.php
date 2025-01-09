@extends('layout_user.master')

@section('content')
<div class="container-fluid mt-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <h1 class="text-center mb-4">{{ __('user/wishlist.title') }}</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('user/wishlist.sent') }}</h5>
                </div>
                <div class="card-body">
                    @if ($sentRequests && count($sentRequests) > 0)
                        @foreach ($sentRequests as $request)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="mb-0">{{ $request->user2->name }}</p>
                            <a href="{{ route('user.deleteRequest', ['id' => $request->user_id_2]) }}" class="btn btn-danger btn-sm">{{ __('user/wishlist.delete') }}</a>
                        </div>
                        @endforeach
                    @else
                        <p class="text-muted">{{ __('user/wishlist.sentreq') }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">{{ __('user/wishlist.received') }}</h5>
                </div>
                <div class="card-body">
                    @if ($receivedRequests && count($receivedRequests) > 0)
                        @foreach ($receivedRequests as $request)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="mb-0">{{ $request->user1->name }}</p>
                            <div>
                                <a href="{{ route('user.acceptRequest', ['id' => $request->user_id_1]) }}" class="btn btn-success btn-sm">{{ __('user/wishlist.accept') }}</a>
                                <a href="{{ route('user.rejectRequest', ['id' => $request->user_id_1]) }}" class="btn btn-danger btn-sm">{{ __('user/wishlist.reject') }}</a>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-muted">{{ __('user/wishlist.receivereq') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<style>

.card {
    border-radius: 10px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.card-header {
    font-weight: bold;
    text-align: center;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.8rem;
    border-radius: 5px;
}

</style>