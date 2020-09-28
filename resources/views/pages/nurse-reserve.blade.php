@extends('components.app')
@section('navbar-additional-buttons')
    @include('components.nurse-dashboard.nurse-navbar')
@endsection
@section('content')
    <script>
        document.getElementById('nurse-reserve').className = 'nav-item active'
    </script>
    <div class="nurse-reserve-style">
        <div class="container">
            <form action="/nurse/reserve/store" method="get">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="container mt-0">
                        <div class="row">
                            <div class="col-sm-4 p-0">
                                <input type="text" class="form-control col-sm-4" name="first-name" placeholder="First Name" required>
                            </div>
                            <div class="col-sm-4 p-0 text-center">
                                <input type="text" class="form-control col-sm-4" id="name" name="middle-name" placeholder="Middle Name" required>
                            </div>
                            <div class="col-sm-4 p-0 text-right">
                                <input type="text" class="form-control col-sm-4" id="name" name="last-name" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="national-id">National ID</label>
                    <input type="number" class="form-control" id="national-id" name="national-id" placeholder="Enter National ID" required>
                </div>
                <div class="form-group">
                    <label for="phone-number">Phone Number</label>
                    <input type="number" class="form-control" id="phone-number" name="phone-number" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>

                    <input type="hidden" class="form-control" id="password" name="password" value="pass123">

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" required>
                </div>
                <div class="form-group">
                    <span class="d-block mb-2">Gender</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" required>
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
