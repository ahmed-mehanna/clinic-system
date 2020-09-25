@extends('components.app')
@section('content')
    <script>
        document.getElementById('registration').className = 'nav-item active';
    </script>
    <div class="n-designs">
        <div class="container-fluid">
            <div class="form-box">
                <div class="button-box">
                    <h1>Login</h1>
                </div>
                <form id="signup" class="input-group" method="POST" action="/login/custom" style="margin-top: -20%">
                    @csrf
                    <input type="number" class="input-field" name= "phoneNumber" placeholder="Phone Number" required />
                    <br>@error('phoneNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror <br>
                    <input type="password" class="input-field" placeholder="Password" name="password" required autocomplete="new-password" />
                    <br>@error('Password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror <br>
                    <div class="flex items-center justify-end mt-2">
                    </div>
                    <button type="submit" class="submit-btn mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

