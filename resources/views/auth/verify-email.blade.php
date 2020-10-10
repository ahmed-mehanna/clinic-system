@extends('components.app')
@section('content')
    <div class="container" style="padding-top: 40px; min-height: 534px;">
        <h1 class="alert alert-info" role="alert">Verification</h1>
        <p class="lead">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </p>
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                <strong class="alert">{{ __('A new verification link has been sent to the email address you provided during registration.') }}</strong>
            </div>
        @endif
        <div class="mt-4 mb-5 flex items-center justify-between">
            <form class="d-inline-block mr-3" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button type="submit" class="btn btn-primary" style="font-size: 18px;">
                        Send Verification Email
                    </button>
                </div>
            </form>
            <form class="d-inline-block mt-3" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger" style="font-size: 18px;">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>
@endsection
