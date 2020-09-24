{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <div class="block">--}}
{{--                <x-jet-label value="{{ __('Email') }}" />--}}
{{--                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-jet-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}

@extends('components.app')
@section('content')
    <div class="n-designs">
        <div class="container-fluid">
            <div class="form-box">
                <div class="button-box">
                    <h1>Register</h1>
                </div>
                <form id="signup" class="input-group" method="POST" action="{{ route('register') }}" style="margin-top: -20%">
                    @csrf
                    <input type="text" class="input-field" placeholder="Name" name="name" :value="old('name')"
                           required autofocus autocomplete="name"/>
                    <input class="input-field" placeholder="E-mail" type="email" name="email" :value="old('email')" required />
                    <input type="text" class="input-field" placeholder="Phone Number" required />
                    <input type="password" class="input-field" placeholder="Password" name="password" required autocomplete="new-password" />
                    <input type="password" class="input-field" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" />
                    <div class="flex items-center justify-end mt-2">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            Already registered?
                        </a>
                    </div>
                    <button type="submit" class="submit-btn mt-3">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
