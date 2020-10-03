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
                <form id="signup" class="input-group" method="POST" action="/Register/Create" style="margin-top: -20%">
                    @csrf
                    <input type="text" class="input-field" placeholder="Name" name="name" :value="old('name')"
                           required autofocus autocomplete="name"/>
                    <br>@error('name')<span class="fp w-100 mt-3" role="alert"><strong style="color:red">{{ $message }}</strong></span>@enderror <br>
                    <input class="input-field" placeholder="E-mail" type="email" name="email" :value="old('email')" required />
                    @if($errors->has('checkEmail'))
                        <div class="fp w-100 mt-3"><strong style="color:red">{{ $errors->first('checkEmail') }}</strong></div>
                    @endif
                    <br>@error('email')<span class="fp w-100 mt-3" role="alert"><strong style="color:red">{{ $message }}</strong></span>@enderror <br>
                    <input type="number" class="input-field" name= "phoneNumber" placeholder="Phone Number" required />
                    @if($errors->has('checkPhone'))
                        <div class="fp w-100 mt-3"><strong style="color:red">{{ $errors->first('checkPhone') }}</strong></div>
                    @endif
                    <br>@error('phoneNumber')<span class="fp w-100 mt-3" role="alert"><strong style="color:red">{{ $message }}</strong></span>@enderror <br>
                    <input type="password" class="input-field" placeholder="Password" name="password" required autocomplete="new-password" />
                    <br>@error('password')<span class="fp w-100 mt-3" role="alert"><strong style="color:red">{{ $message }}</strong></span>@enderror <br>
                    <input type="password" class="input-field" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" />
                    <br>@error('password_confirmation')<span class="fp w-100 mt-3" role="alert"><strong style="color:red">{{ $message }}</strong></span>@enderror <br>
                    <div class="flex items-center justify-end mt-2">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            Already registered?
                        </a>
                    </div>
                    <button type="submit" class="submit-btn mt-3">
                        <span>Register</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
