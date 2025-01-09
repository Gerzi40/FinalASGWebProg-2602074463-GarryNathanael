@extends('layout_user.master')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('user/chat.chat') }}</h5>
                    <a href="{{ route('user.friendList') }}" class="btn btn-light btn-sm">{{ __('user/chat.back') }}</a>
                </div>
                <div class="card-body" style="height: 65vh; overflow-y: auto; background-color: #f8f9fa;">
                    @foreach ($chats as $chat)
                        @if ($chat->user_id === $user->id)
                            <div class="d-flex justify-content-end mb-3">
                                <div class="bg-primary text-white p-3 rounded" style="max-width: 70%;">
                                    <small class="fw-bold">{{ __('user/chat.you') }}</small><br>
                                    {{ $chat->message }}
                                    <div class="text-end">
                                        <small class="text-light">{{ $chat->created_at->format('H:i') }}</small>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="d-flex justify-content-start mb-3">
                                <div class="bg-secondary text-white p-3 rounded" style="max-width: 70%;">
                                    <small class="fw-bold">{{ $chat->user->name }}</small><br>
                                    {{ $chat->message }}
                                    <div class="text-start">
                                        <small class="text-light">{{ $chat->created_at->format('H:i') }}</small>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="card-footer">
                    <form action="{{ route('user.sendMessage') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="hidden" name="chatroom_id" value="{{ $chatroom_id }}">
                        <input type="text" name="message" id="message" class="form-control me-2" placeholder="{{ __('user/chat.placeholder') }}" required>
                        <button type="submit" class="btn btn-primary">{{ __('user/chat.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var chatBody = document.querySelector('.card-body');
        chatBody.scrollTop = chatBody.scrollHeight;
    });
</script>
@endsection
