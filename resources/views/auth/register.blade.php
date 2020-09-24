@extends('components.app')
@section('content')
    <script>
        document.getElementById('registration').className = 'nav-item active';
    </script>
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
                    <input type="number" class="input-field" name= "phoneNumber" placeholder="Phone Number" required />
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
