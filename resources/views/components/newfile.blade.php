@extends('components.app2')
@section('head')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="{{asset('css/new.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
@endsection
@section('content')
<div > {{-- padding top = 100px if navbar is fixed --}}
        <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">HEALTHCARE</label>
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="makeappointment">Make an Appointment</a></li>
            <li><a href="history">My History</a></li>
            <li><a href="resetpasswordpatient">Reset Password</a></li>
            <li><a href="deleteaccount">Delete Account</a></li>
            <li><a href="contactus">Contact US</a></li>
        </ul>
        </nav>
        <div class="data">
        @yield('content1')
        </div>
@endsection
