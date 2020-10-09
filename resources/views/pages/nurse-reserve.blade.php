@extends('components.app')
@section('content')
    <script>
        document.getElementById('nurse-reserve').className = 'nav-item active'
    </script>
    <div class="nurse-reserve-style">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert-danger">
                    <div class="fp w-100" style="text-align:center"><strong >{{Session::get('message')}}</strong></div>
                </div>
            @endif
            <div id="alert" class="alert-danger d-none">
                <div class="fp w-100" style="text-align:center"><strong >You Did Not Choose An Appointment</strong></div>
            </div>
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
                <input id="time" type="number" name="time" style="visibility: hidden" readonly required>
                <input id="day" type="number" name="day" style="visibility: hidden" readonly required>
                <input id="month" type="number" name="month" style="visibility: hidden" readonly required>

                <h3 class="mb-3">Select Appointments</h3>
                <div class="inputs border-bottom pb-3">
                    <div class="row">
                        <div  class="col-lg-3 col-md-5">
                            <span id="date-lg"></span>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-12 cc mb-3">
                            <span id="date-sm"></span>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span id="xx" class="form-control d-inline-block text-center" style="width: 50%" data-toggle="modal" data-target="#calender">
                                Select Reveal Day
                                <i class="fa fa-calendar ml-3"></i>
                            </span>
                            <button type="button" class="today btn btn-primary btn-large">TODAY</button>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-12 cc">
                            <button type="button" class="today btn btn-primary" style="width: 40%">TODAY</button>
                            <button type="button" class="btn btn-primary" style="width: 55%; float: right" onclick="window.location.href = '#appointments-table'">My Appointments</button>
                        </div>
                    </div>
                </div>
                <div class="form-group all-appointments mb-5 pb-3">
                    <div class="row mt-3">
                        <?php $i = 0; $startTime = 800; $endTime = 2200; $revealTime = 30;?>
                        @for($i = $startTime, $countMd = 1, $countLg = 1; $i <= $endTime; $i += $revealTime, $countMd++, $countLg++)
                            <?php
                            if ($i % 100 == 60)
                                $i += 40;
                            ?>
                            @if(($countMd == 3 and $countLg == 4) or ($i == 2200))
                                <div class="col-lg-3 col-md-4 col-sm-12 br-md br-lg br-sm">
                                    <?php
                                    $countMd = 0;
                                    $countLg = 0;
                                    ?>
                                    @include('components.nurse-dashboard.appointments-schedule', ['i' => $i])
                                </div>
                            @elseif($countMd == 3)
                                <div class="col-lg-3 col-md-4 col-sm-12 br-md br-sm">
                                    <?php
                                    $countMd = 0;
                                    ?>
                                    @include('components.nurse-dashboard.appointments-schedule', ['i' => $i])
                                </div>
                            @elseif($countLg == 4)
                                <div class="col-lg-3 col-md-4 col-sm-12 br-lg br-sm">
                                    <?php
                                    $countLg = 0;
                                    ?>
                                    @include('components.nurse-dashboard.appointments-schedule', ['i' => $i])
                                </div>
                            @else
                                <div class="col-lg-3 col-md-4 col-sm-12 br-sm">
                                    @include('components.nurse-dashboard.appointments-schedule', ['i' => $i])
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <button id="validate-btn" type="button" class="btn btn-primary mr-3">Submit</button>
                <button id="submit-btn" type="submit" class="d-none"></button>
                <span class="btn btn-danger" id="go-back" onclick="goBack()">Back</span>
            </form>
        </div>
    </div>
    @include('patient.calender')
    <script>
        Array.prototype.isEqualTo = function (arr = []) {
            if (this.length !== arr.length)
                return false
            for (let i = 0; i < this.length; i++)
                if (this[i] !== arr[i])
                    return false
            return true
        }
        let lastActiveAppointment = null;
        let lastActiveAppointmentTime = null;
        let lastMonthActive = {{ date('m') }}, lastDayActive = {{ date('d') }};
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $('#month-'+lastMonthActive).addClass('active')
        $('#day-'+lastDayActive).addClass('active');
        function goBack () {
            window.history.back();
        }
        function selectAppointment(val) {
            if (lastActiveAppointment !== null) {
                $('#' + lastActiveAppointment).removeClass('active')
                $('#' + lastActiveAppointment).html('Book Now <i class="fa fa-hand-pointer-o"></i>')
            }
            $('#time').attr('value', val)
            $('#day').attr('value', lastDayActive)
            $('#month').attr('value', lastMonthActive)
            $('#btn-'+val).addClass('active')
            $('#btn-'+val).html('Booked <i class="fa fa-exclamation"></i>')
            lastActiveAppointment = 'btn-'+val
            lastActiveAppointmentTime = val
        }
        function selectMonth(monthId) {
            if (monthId === 2) {

            }
            else if (monthId <= 7 && monthId % 2 === 0) {
                if (lastMonthActive !== null)
                    $('#month-'+lastMonthActive).removeClass('active')
                $('#month-'+monthId).addClass('active')
                lastMonthActive = monthId
                $('#day-31').remove();
            }
            else if (monthId <= 7 && monthId % 2 === 1) {
                if (lastMonthActive !== null)
                    $('#month-'+lastMonthActive).removeClass('active')
                $('#month-'+monthId).addClass('active')
                lastMonthActive = monthId
                if (!$('#days-list').find('#day-31').length)
                    $('#days-list').append('<li id="day-31" class="border-bottom m-auto pt-2" onclick="selectDay(31)">31</li>');
            }
            else if (monthId > 7 && monthId % 2 === 0) {
                if (lastMonthActive !== null)
                    $('#month-'+lastMonthActive).removeClass('active')
                $('#month-'+monthId).addClass('active')
                lastMonthActive = monthId
                if (!$('#days-list').find('#day-31').length)
                    $('#days-list').append('<li id="day-31" class="border-bottom m-auto pt-2" onclick="selectDay(31)">31</li>');
            }
            else if (monthId > 7 && monthId % 2 === 1) {
                if (lastMonthActive !== null)
                    $('#month-'+lastMonthActive).removeClass('active')
                $('#month-'+monthId).addClass('active')
                lastMonthActive = monthId
                $('#day-31').remove();
            }
            searchForAppointments()
        }
        function selectDay(dayId) {
            if (lastDayActive !== null)
                $('#day-'+lastDayActive).removeClass('active')
            $('#day-'+dayId).addClass('active');
            lastDayActive = dayId
            searchForAppointments()
        }

        function searchForAppointments() {
            let date = new Date()
            let day = parseInt(lastDayActive)
            let month = parseInt(lastMonthActive)
            if (parseInt(day / 10) === 0)
                day = '0' + day
            $('#date-lg').html(months[month - 1] + ' ' + day + ', ' + date.getFullYear())
            $('#date-sm').html(months[month - 1] + ' ' + day + ', ' + date.getFullYear())
        }

        let reservedAppointments = []
        function searchAjax() {
            $.ajax({
                url: '/nurse/show-appointments/'+ lastDayActive + '/' + lastMonthActive,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (reservedAppointments.isEqualTo(response))
                        return null
                    console.log(reservedAppointments)
                    for (let i = 0; i < reservedAppointments.length; i++) {
                        console.log(reservedAppointments[i], lastActiveAppointmentTime)
                        let btn = $('#btn-'+reservedAppointments[i]);
                        btn.removeClass('btn-danger');
                        btn.removeClass('active')
                        btn.addClass('btn-success');
                        btn.html('Book Now <i class="fa fa-hand-pointer-o"></i>')
                        btn.css({
                            'padding-right': '12px',
                            'padding-left': '12px'
                        })
                        btn.attr('onclick', 'selectAppointment(' + reservedAppointments[i] + ')')
                    }
                    for (let i = 0; i < response.length; i++) {
                        let btn = $('#btn-'+response[i]);
                        btn.removeClass('btn-success');
                        btn.addClass('btn-danger');
                        btn.html('Booked <i class="fa fa-exclamation"></i>');
                        btn.css({
                            'padding-right': '26.8px',
                            'padding-left': '26.8px',
                            'box-shadow': 'none'
                        })
                        btn.attr('onclick', '')
                        if (lastActiveAppointmentTime !== null && lastActiveAppointmentTime === response[i]) {
                            lastActiveAppointment = null
                            btn.removeClass('active')
                            $('#time').attr('value', '')
                            $('#day').attr('value', '')
                            $('#month').attr('value', '')
                        }

                    }
                    reservedAppointments = response;
                }
            });
        }
        let todayBtn = $('.today');
        todayBtn.on('click', function () {
            $('#date-lg').html('{{ date("F d, Y") }}')
            $('#date-sm').html('{{ date("F d, Y") }}')
            searchAjax()
        });
        todayBtn.click();
        let searchBtn = $('#search');
        searchBtn.on('click', function () {
            searchAjax()
        });
        let updateAvailableAppointments = setInterval(function () {
            searchAjax()
        }, 500)
        $('#validate-btn').on('click', function () {
            console.log($('#time').val())
            if ($('#time').val() !== '')
                $('#submit-btn').click()
            else {
                $('#alert').removeClass('d-none')
                window.location.href = '/nurse/reserve#alert'
            }
        })
    </script>
@endsection
