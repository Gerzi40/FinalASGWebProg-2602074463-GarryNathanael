@extends('layout_guest.master')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height:600px">
        <div class="card shadow p-4" style="width: 400px; border-radius: 10px;">
            <form action="{{ route('regist.pay') }}" method="POST">
                @csrf
                @if(isset($overpaidAmount) && $overpaidAmount > 0)
                    <div class="alert alert-warning text-center">
                        <p>{{ __('auth/payment.overPaid') }} <strong>{{ $overpaidAmount }}</strong>.</p>
                        <p>{{ __('auth/payment.enterWallet') }}</p>
                    </div>
                    <div>
                        <input type="hidden" name="fee" id="fee" value="{{ $registfee }}">
                        <input type="hidden" name="userId" id="userId" value="{{ $userId }}">
                        <input type="hidden" name="overpaidAmount" id="overpaidAmount" value="{{ $overpaidAmount }}">
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" name="confirmation" value="yes" class="btn btn-primary w-45">{{ __('auth/payment.yes') }}</button>
                        <button type="submit" name="confirmation" value="no" class="btn btn-danger w-45">{{ __('auth/payment.no') }}</button>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="registfee" class="form-label">{{ __('auth/payment.fee') }} <strong>{{ $registfee }}</strong></label>
                        <input type="hidden" name="fee" id="fee" value="{{ $registfee }}">
                        <input type="hidden" name="userId" id="userId" value="{{ $userId }}">
                    </div>
                    <div class="mb-3">
                        <label for="EnterNumber" class="form-label">{{ __('auth/payment.input') }}</label>
                        <input type="number" name="number" id="number" class="form-control" placeholder="Enter amount">
                        @error('number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">{{ __('auth/payment.pay') }}</button>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
