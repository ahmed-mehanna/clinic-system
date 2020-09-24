@extends('components.app')
@section('content')
    <div class="n-designs">
        <div class="container-fluid">
            <div class="form-box ">
                <div class="button-box">
                    <h1>Log In </h1>
                </div>
                <form class="input-group">
                    <input type="text" class="input-field" placeholder="Enter Phone Number" required />
                    <input type="text" class="input-field" placeholder="Enter Password" required />
                    <div class="fp">
                        <a href=https://google.com >Forgot password?</a>
                    </div>
                    <button type="submit" class="submit-btn">Log In</button>
                </form>
            </div>
        </div>
    </div>
@endsection

