@extends('components.app')
@section('content')
    <div class="patient-dashboard-style">
        <div class="patient-home-style">
            <div class="container-fluid">
                <div class="row pt-3 pb-5">
                    <div class="col-xl-3 col-md-6 offset-xl-1">
                        <div class="section rotate-x" style="padding-bottom: 4px">
                            <h2>Next Appointment <i class="fa fa-clock-o" style="color: #BDE7A8"></i></h2>
                            <p class="lead">
                                <span>Date: </span>
                                @if($reservation === null)
                                    No Next Appointment
                                @else
                                    {{\Illuminate\Support\Carbon::parse($reservation["reservation At"])->toFormattedDateString()}}
                                    {{\Illuminate\Support\Carbon::parse($reservation["reservation At"])->format("g:i A")}}
                                @endif
                                <a href="/makeappointment#appointments-table" class="my-appointments d-block">my appointments</a>
                            </p>
                        </div>
                        <div class="section rotate-x click" style="margin-top: 26px;" onclick="goTo('/makeappointment')">
                            <h2>New Appointment <i class="fa fa-calendar" style="color: #BE4363"></i></h2>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="section rotate" style="padding-bottom: 32px">
                            <h2>Last Reveal <i class="fa fa-history" style="color: #4FC3CD"></i></h2>
                            <p class="lead">
                                <span class="mb-3">Illness Name</span>
                                @if($illness === null)
                                    No previous visit
                                @else
                                    {{$illness["illnessName"]}}
                                @endif
                                <span class="mb-3 mt-4">Illness Diagnose</span>
                                @if($illness=== null)
                                    No previous visit
                                @else
                                    {{$illness["illnessDiagnose"]}}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 offset-xl-0 offset-md-3 mt-1">
                        <div class="section rotate-y">
                            <h2>Profile Data <i class="fa fa-user" style="color: #F2825F"></i></h2>
                            <ul class="list-group mb-3">
                                <li>
                                    <span>Name: </span>{{$user->name}}
                                </li>
                                <li>
                                    <span>Gender: </span>{{$user->patient->gender}}
                                </li>
                                <li>
                                    <span>Age: </span>{{$user->patient->age}}
                                </li>
                                <li>
                                    <span>Email: </span>{{$user->email}}
                                </li>
                                <li>
                                    <span>Phone: </span>{{$user->phoneNumber}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-xl-3 col-md-6 offset-xl-1">
                        <div class="section rotate click" onclick="goTo('/history')">
                            <h2>Medical History <i class="fa fa-history" style="color: #605FB5"></i></h2>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="section rotate-y click" onclick="goTo('/delete/account')">
                            <h2>Delete Account <i class="fa fa-trash" style="color: #BE4363"></i></h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 offset-md-3">
                        <div class="section rotate-y click" onclick="goTo('/patient/fourm/edit')">
                            <h2>Edit Profile <i class="fa fa-user" style="color: #59B887"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goTo(url) {
            window.location.href = url
        }
    </script>
@endsection
