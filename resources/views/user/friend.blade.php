@extends('layout_user.master')

@section('content')
<div class="container-fluid mt-4">
    <div class="text-center">
        <h1 class="mb-4">{{ __('user/friend.title') }}</h1>
    </div>
    
    @if ($friends->isNotEmpty() || $friends1->isNotEmpty())
        <div class="d-flex flex-wrap gap-5 justify-content-center">
            @if ($friends->isNotEmpty())
                @foreach ($friends as $friend)
                    <div class="card mb-3 shadow-sm" style="width: 25rem;">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $friend->user2->name }}</h5>
                                <p class="card-text text-muted">
                                    {{ __('user/friend.unread') }}<span class="fw-bold">{{ $unreadCounts[$friend->id] ?? 0 }}</span>
                                </p>
                            </div>
                            <a href="{{ route('user.showChatBox', ['id' => $friend->id]) }}" class="btn btn-primary">
                                <img src="/assets/chat.png" alt="Chat" style="width: 2rem; height: 2rem; margin-right: 5px;">
                                {{ __('user/friend.chat') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

            @if ($friends1->isNotEmpty())
                @foreach ($friends1 as $friend)
                    <div class="card mb-3 shadow-sm" style="width: 25rem;">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $friend->user1->name }}</h5>
                                <p class="card-text text-muted">
                                    {{ __('user/friend.unread') }}<span class="fw-bold">{{ $unreadCounts[$friend->id] ?? 0 }}</span>
                                </p>
                            </div>
                            <a href="{{ route('user.showChatBox', ['id' => $friend->id]) }}" class="btn btn-primary">
                                <img src="/assets/chat.png" alt="Chat" style="width: 2rem; height: 2rem; margin-right: 5px;">
                                {{ __('user/friend.chat') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @else
        <div class="text-center mt-5">
            <h2 class="text-muted">{{ __('user/friend.error1') }}</h2>
            <p>{{ __('user/friend.error2') }}</p>
        </div>
    @endif
</div>
@endsection
