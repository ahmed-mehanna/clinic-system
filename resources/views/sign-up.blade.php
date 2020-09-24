@extends('components.app')
@section('content')
    <div class="n-designs">
        <div class="container-fluid">
            <div class="form-box ">
                <div class="button-box">
                    <h1>Register</h1>
                </div>
                <form id="signup" class="input-group">
                    <input type="text" class="input-field" placeholder="Name" required />
                    <input type="text" class="input-field" placeholder="E-mail" />
                    <input type="text" class="input-field" placeholder="Phone Number" required />
                    <input type="text" class="input-field" placeholder="Password" required />
                    <button type="submit" class="submit-btn">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
