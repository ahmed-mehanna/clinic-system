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
    <div class="nurse-dashboard-style" style="min-height: 535px; padding-bottom: 0">
        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Illness Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Button</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Name</td>
                        <td>Created</td>
                        <td>
                            <a class="btn btn-primary">Button</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
