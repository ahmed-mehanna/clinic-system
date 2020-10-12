@extends('components.app')
@section('content')
    <?php
        use Carbon\Carbon;
    ?>
    <div class="patient-dashboard-style">
        <div class="make-appointment">
            <div class="container">
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
                        </div>
                    </div>
                </div>
                <div class="all-appointments mt-5 pb-3">
                    <h3>Available Appointments</h3>
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
                                    @include('patient.appointments-schedule', ['i' => $i])
                                </div>
                            @elseif($countMd == 3)
                                <div class="col-lg-3 col-md-4 col-sm-12 br-md br-sm">
                                    <?php
                                    $countMd = 0;
                                    ?>
                                    @include('patient.appointments-schedule', ['i' => $i])
                                </div>
                            @elseif($countLg == 4)
                                <div class="col-lg-3 col-md-4 col-sm-12 br-lg br-sm">
                                    <?php
                                    $countLg = 0;
                                    ?>
                                    @include('patient.appointments-schedule', ['i' => $i])
                                </div>
                            @else
                                <div class="col-lg-3 col-md-4 col-sm-12 br-sm">
                                    @include('patient.appointments-schedule', ['i' => $i])
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <h3 id="my-appointments" class="mt-5">My Appointments</h3>
                <div class="my-appointments mb-5 mt-3">
                    <div class="row d-none d-sm-flex" style="background-color: #5D5D5D; color: #FFF; font-weight: bolder; font-size: 18px;">
                        <div class="col-sm-1">
                            <span>#</span>
                        </div>
                        <div class="col-sm-3">
                            <span>Date</span>
                        </div>
                        <div class="col-sm-2">
                            <span>From</span>
                        </div>
                        <div class="col-sm-2">
                            <span>To</span>
                        </div>
                    </div>
                    <div id="appointments-table" class="sub-container"></div>
                </div>
            </div>
        </div>
    </div>
    @include('patient.calender')
    <script>
        Array.prototype.remove = function() {
            let what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };
        Array.prototype.removeByIndex = function (index) {
            let newArr = []
            for (let i = 0; i < index; i++)
                newArr.push(this[i])
            for (let i = index + 1; i < this.length; i++)
                newArr.push(this[i])
            return newArr
        }
        Array.prototype.isEqualTo = function (arr = []) {
            if (this.length !== arr.length)
                return false
            for (let i = 0; i < this.length; i++)
                if (this[i] !== arr[i])
                    return false
            return true
        }
        Array.prototype.isEqualTo2 = function (arr = []) {
            if (this.length !== arr.length)
                return false
            for (let i = 0; i < this.length; i++)
                for (let j = 0; j < this[i].length; j++)
                    if (this[i][j] !== arr[i][j])
                        return false
            return true
        }
        let myAppointments = []
        let reservedAppointments = []
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let monthsNum = {"January": 1, "February": 2, "March": 3, "April": 4, "May": 5, "June": 6, "July": 7, "August": 8, "September": 9, "October": 10, "November": 11, "December": 12}
        function updateAppointmentsTable() {
            if (myAppointments.length === 0)
                $('#appointments-table').empty()
            for(let i = 0; i < myAppointments.length; i++) {
                let bg = null, fromHour = 0, fromMin, toHour = 0, toMin = 0
                let day = myAppointments[i]['date'].substring(myAppointments[i]['date'].indexOf(' ') + 1, myAppointments[i]['date'].lastIndexOf(','))
                let month = monthsNum[myAppointments[i]['date'].substring(0, myAppointments[i]['date'].indexOf(' '))]
                if (i % 2 === 0) bg = '#F2F2F2'; else bg = '#FFF'
                if (myAppointments[i]['from'] % 100 == 0)
                    fromMin = '00'
                else
                    fromMin = myAppointments[i]['from'] % 100
                if (myAppointments[i]['from'] === '1200' || myAppointments[i]['from'] === '1230')
                    fromHour = parseInt(myAppointments[i]['from'] / 100)
                else
                    fromHour = parseInt((myAppointments[i]['from']) / 100)
                if (fromHour > 12) {
                    fromHour -= 12
                    fromMin += 'pm'
                }
                else
                    fromMin += 'am'
                if (myAppointments[i]['to'] % 100 == 0)
                    toMin = '00'
                else
                    toMin = myAppointments[i]['to'] % 100
                if (myAppointments[i]['to'] === '1200' || myAppointments[i]['to'] === '1230')
                    toHour = parseInt(myAppointments[i]['to'] / 100)
                else
                    toHour = parseInt((myAppointments[i]['to']) / 100)
                if (toHour > 12) {
                    toHour -= 12
                    toMin += 'pm'
                }
                else
                    toMin += 'am'
                let row = '<div id="row-'+day + '-' + month + '-' +myAppointments[i]['from']+'" class="row" style="background-color: '+bg+'">' +
                    '<div id="row-'+myAppointments[i]['from']+'-index" class="col-sm-1 d-none d-sm-block">' +
                    '<span>'+ (i + 1) + '</span>' +
                    '</div>' +
                    '<div class="col-sm-3">' +
                    '<span>'+ myAppointments[i]['date'] + '</span>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<span>'+ fromHour + ':' + fromMin + '</span>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<span>'+ toHour + ':' + toMin + '</span>' +
                    '</div>' +
                    '<div class="col-sm-4">' +
                    '<button id="row-btn-' + myAppointments[i]['from'] + '" class="btn btn-danger" onclick="deleteAppointment(' + myAppointments[i]['from'] + ')">' +
                    '<span>Remove </span>' +
                    '<i class="fa fa-trash"></i>' +
                    '</button>'+
                    '</div>' +
                    '</div>'
                $('#appointments-table').append(row)
            }
        }
        function initializeAppointmentsTable() {
            $.ajax({
                url: '/show-my-appointments',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (myAppointments.isEqualTo2(response))
                        return null
                    $('#appointments-table').empty()
                    myAppointments = response
                    updateAppointmentsTable()
                }
            })
        }
        let updateTable = setInterval(function () {
            initializeAppointmentsTable()
        }, 500)
        function searchAjax() {
            $.ajax({
                url: '/patient/show-appointments/'+ lastDayActive + '/' + lastMonthActive,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    let canReserve = response[response.length - 1]
                    for (let i = 800; i < 2200; i += 30) {
                        if (i % 100 === 60)
                            i += 40
                        let btn = $('#btn-' + i)
                        if (canReserve == true) {
                            btn.attr('onclick', 'bookNow(' + i + ')')
                            btn.removeClass('not-available')
                        }
                        else {
                            btn.attr('onclick', '')
                            if (response.indexOf(i) === -1)
                                btn.addClass('not-available')
                        }
                    }
                    for (let i = 0; i < reservedAppointments.length; i++) {
                        let btn = $('#btn-'+reservedAppointments[i]);
                        btn.removeClass('btn-danger');
                        btn.addClass('btn-success');
                        btn.html('Book Now <i class="fa fa-hand-pointer-o"></i>')
                        btn.css({
                            'padding-right': '12px',
                            'padding-left': '12px'
                        })
                        btn.attr('onclick', 'bookNow(' + reservedAppointments[i] + ')')
                    }
                    for (let i = 0; i < response.length; i++) {
                        let btn = $('#btn-'+response[i]);
                        btn.removeClass('btn-success');
                        btn.addClass('btn-danger');
                        btn.html('Booked <i class="fa fa-exclamation"></i>');
                        btn.css({
                            'padding-right': '26.8px',
                            'padding-left': '26.8px'
                        })
                        btn.attr('onclick', '')
                    }
                    reservedAppointments = response;
                }
            });
        }
        let todayBtn = $('.today');
        todayBtn.on('click', function () {
            selectMonth({{ date('m') }})
            selectDay({{ date('d') }})
            searchForAppointments()
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
        function bookNow(from) {
            reservedAppointments.push(from)
            $.ajax({
                url: '/create-appointment/'+ lastDayActive + '/' + lastMonthActive + '/' + from,   // Remove 1 And Write User ID
                type: 'get'
            });
            let btn = $('#btn-'+from);
            btn.removeClass('btn-success');
            btn.addClass('btn-danger');
            btn.html('Booked <i class="fa fa-exclamation"></i>');
            btn.css({
                'padding-right': '26.8px',
                'padding-left': '26.8px'
            })
            btn.attr('onclick', '')
            let to = from + 30
            if (to % 100 === 60)
                to += 40
            myAppointments.push({'date': $('#date-lg').html(), 'from': from.toString(), 'to': to.toString()})
            myAppointments.sort(function(x, y) {
                let xMonth = monthsNum[x.date.substr(0, x.date.indexOf(' '))], yMonth = monthsNum[y.date.substr(0, y.date.indexOf(' '))]
                let xDay = x.date.substring(x.date.indexOf(' '), x.date.indexOf(','))
                let yDay = y.date.substring(y.date.indexOf(' '), y.date.indexOf(','))
                let xFrom = parseInt(x.from), yFrom = parseInt(y.from)
                if (xMonth < yMonth) return -1
                if (xMonth > yMonth) return 1
                if (xDay < yDay) return -1
                if (xDay > yDay) return 1
                if (xFrom < yFrom) return -1
                if (xFrom > yFrom) return 1
            });
            $('#appointments-table').empty()
            let index = null
            for (let i = 0; i < myAppointments.length; i++)
                if (myAppointments[i]['date'] == $('#date-lg').html() && myAppointments[i]['from'] == from && myAppointments[i]['to'] == to) {
                    index = i
                    break
                }
            updateAppointmentsTable()
            let day = myAppointments[index]['date'].substring(myAppointments[index]['date'].indexOf(' ')+1, myAppointments[index]['date'].lastIndexOf(','))
            let month = monthsNum[myAppointments[index]['date'].substring(0, myAppointments[index]['date'].indexOf(' '))]
            $('#row-'+day + '-' + month + '-' + from).css('background-color', '#BEE1BC')
            window.location.href = '#row-'+day + '-' + month + '-' + from
        }
        function deleteAppointment(from) {
            let index = null
            for (let i = 0; i < myAppointments.length; i++)
                if (myAppointments[i]['from'] == from) {
                    index = i
                    break
                }
            let day = myAppointments[index]['date'].substring(myAppointments[index]['date'].indexOf(' '), myAppointments[index]['date'].lastIndexOf(','))
            let month = monthsNum[myAppointments[index]['date'].substring(0, myAppointments[index]['date'].indexOf(' '))]
            $.ajax({
                url: '/delete-appointment/'+ day + '/' + month + '/' + from,   // Remove 1 And Write User ID
                type: 'get'
            });
            let btn = $('#btn-'+from);
            btn.removeClass('btn-danger');
            btn.addClass('btn-success');
            btn.html('Book Now <i class="fa fa-hand-pointer-o"></i>');
            btn.css({
                'padding-right': '12px',
                'padding-left': '12px'
            })
            btn.attr('onclick', 'bookNow(' + from + ')')
            myAppointments = myAppointments.removeByIndex(index)

            $('#appointments-table').empty()
            updateAppointmentsTable(myAppointments)
        }
    </script>
@endsection
