@extends('components.app')
@section('content')
    <ul>
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="makeappointment">Make an Appointment</a></li>
        <li><a href="history">My History</a></li>
        <li><a href="resetpasswordpatient">Reset Password</a></li>
        <li><a href="deleteaccount">Delete Account</a></li>
        <li><a href="contactus">Contact US</a></li>
    </ul>
    <div class="nurse-reserve-style">
        <div class="container">
            <?php
                $data = [
                    'name'  =>  'Ahmed Mehanna',
                    'age'   =>  20,
                    'email' =>  'ahmadabobakr1@gmail.com',
                    'phone' =>  '01010915791',
                    'national-id'   =>  '123456789',
                    'address'   =>  'dfflgkdfkgjdf',
                    'gender'    =>  'male'
                ];
            ?>
            <form action="/patient/fourm/store" method="get">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $data['address'] }}" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ $data['age'] }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $data['email'] }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $data['phone'] }}" required>
                </div>
                <div class="form-group">
                    <label for="national-id">Age</label>
                    <input type="number" class="form-control" id="national-id" name="national-id" value="{{ $data['national-id'] }}" required>
                </div>
                <div class="form-group">
                    <span class="d-block mb-2">Gender</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required <?php if ($data['gender'] === 'male'){ ?> checked <?php } ?> >
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" required <?php if ($data['gender'] === 'female'){ ?> checked <?php } ?>>
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

