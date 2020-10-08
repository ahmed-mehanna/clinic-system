@extends('components.app')
@section('content')
    <ul>
        <li><a href="/patient">Home</a></li>
        <li><a href="makeappointment">Make an Appointment</a></li>
        <li><a href="history">My History</a></li>
        <li><a href="resetpasswordpatient">Reset Password</a></li>
        <li><a href="deleteaccount">Delete Account</a></li>
        <li><a href="contactus">Contact US</a></li>
    </ul>
    <div class="nurse-reserve-style">
        <div class="container">

            <form action="/patient/fourm/update" method="get">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$user->patient->address}}" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{$user->patient->age}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phoneNumber }}" required>
                </div>
                <div class="form-group">
                    <label for="national-id">National-Id</label>
                    <input type="number" class="form-control" id="national-id" name="national-id" value="{{$user->patient["national-id"]}}" required>
                </div>
                <div class="form-group">
                    <span class="d-block mb-2">Gender</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required  @if ($user->patient["gender"] === 'Male') checked @endif
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" required @if ($user->patient["gender"] === 'Female') checked @endif
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-3">Submit</button>
                <span class="btn btn-danger" id="go-back" onclick="goBack()">Back</span>
            </form>
        </div>
    </div>
    <script>
        function goBack () {
            window.history.back();
        }
    </script>
@endsection

