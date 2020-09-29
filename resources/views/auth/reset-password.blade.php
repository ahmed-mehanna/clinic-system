
@extends('components.app')
@section('content')
    <div class="n-designs">
        <div class="container-fluid">
            <div class="form-box">
                <div class="button-box">
                    <h2>Reset Password</h2>
                </div>
                <form id="signup" class="input-group" method="POST" action ="/password/update" style="margin-top: -20%">
                    @csrf
                    <input  class="input-field" placeholder="E-mail" type="email" name="email" required />
                    <br>@error('email')<span class="fp w-100 mt-3" role="alert"><strong style="color:red">{{ $message }}</strong></span>@enderror <br>

                    <input  class="input-field" placeholder="Password" type="password" name="password"  required />
                    <br>@error('password')<span class="fp w-100 mt-3" role="alert"><strong style="color:red">{{ $message }}</strong></span>@enderror <br>

                    <input  class="input-field" placeholder="Confirm Password" type="password" name="password_confirmation" required />
                    <br>@error('password_confirmation')<span class="fp w-100 mt-3" role="alert"><strong style="color:red">{{ $message }}</strong></span>@enderror <br>

                    @if($errors->has('checkInvaliedEmail'))
                        <div class="fp w-100 mt-3"><strong style="color:red">{{ $errors->first('checkInvaliedEmail') }}</strong></div>
                    @endif
                    <div class="flex items-center justify-end mt-2">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            Already registered?
                        </a>
                    </div>
                    <button type="submit" class="submit-btn mt-3" >Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
