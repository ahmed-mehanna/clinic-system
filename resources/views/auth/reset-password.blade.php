
@extends('components.app')
@section('content')
    <div class="n-designs">
        <div class="container-fluid">
            <div class="form-box">
                <div class="button-box">
                    <h2>Rest Password</h2>
                </div>
                <form id="signup" class="input-group" method="POST" action ="/password/update" style="margin-top: -20%">
                    @csrf
                    <input  placeholder="E-mail" type="email" name="email" required />
                    <input  placeholder="Password" type="password" name="password"  required />
                    <input  placeholder="Confirm Password" type="password" name="password_confirmation" required />
                    <div class="flex items-center justify-end mt-2">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            Already registered?
                        </a>
                    </div>
                    <button type="submit" class="submit-btn mt-3">Rest Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
