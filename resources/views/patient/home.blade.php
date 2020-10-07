@extends('components.app')
@section('content')
    <div class="patient-dashboard-style">
        <div class="patient-home-style">
            <div class="container-fluid">
                <div class="row pt-3 pb-5">
                    <div class="col-xl-3 col-md-6 offset-xl-1">
                        <div class="section rotate-x">
                            <h2>Next Appointment <i class="fa fa-clock-o" style="color: #BDE7A8"></i></h2>
                            <p class="lead">
                                <span>Date: </span>October 08, 2020
                                <a href="" class="my-appointments d-block">my appointments</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="section rotate">
                            <h2>Last Reveal <i class="fa fa-history" style="color: #4FC3CD"></i></h2>
                            <p class="lead">
                                <span class="mb-3">Illness Name</span>
                                Stomach Pain
                                <span class="mb-3 mt-5">Illness Diagnose</span>
                                Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 offset-xl-0 offset-md-6 mt-1">
                        <div class="section rotate-y">
                            <h2>Profile Data <i class="fa fa-user" style="color: #F2825F"></i></h2>
                            <ul class="list-group mb-3">
                                <li>
                                    <span>Name: </span>Ahmed Mehanna
                                </li>
                                <li>
                                    <span>Gender: </span>Male
                                </li>
                                <li>
                                    <span>Age: </span>20
                                </li>
                                <li>
                                    <span>Email: </span>ahmadabobakr1@gmail.com
                                </li>
                                <li>
                                    <span>Phone: </span>01010915791
                                </li>
                            </ul>
                            <a href="" class="edit-btn position-relative d-block">
                                Edit <i class="fa fa-edit mt-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-xl-3 col-md-6 offset-xl-1">
                        <div class="section rotate-x click" onclick="goTo('')">
                            <h2>New Appointment <i class="fa fa-calendar" style="color: #BE4363"></i></h2>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="section rotate click" onclick="goTo('')">
                            <h2>Medical History <i class="fa fa-history" style="color: #605FB5"></i></h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="section rotate-y click" onclick="goTo('')">
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
