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
                            <span id="date">{{ date("F d, Y") }}</span>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-12 cc mb-3">
                            <span id="date">{{ date("M d, Y") }}</span>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span id="xx" class="form-control d-inline-block text-center" style="width: 70%" data-toggle="modal" data-target="#calender">
                                Select Reveal Day
                                <i class="fa fa-calendar ml-3"></i>
                            </span>
                            <button id="today" type="button" class="btn btn-primary btn-large">TODAY</button>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-12 cc">
                            <button id="today" type="button" class="btn btn-primary">TODAY</button>
                        </div>
                    </div>
                </div>
                <div class="all-appointments mt-5 pb-3">
                    <h3>Available Appointments</h3>
                    <div class="row mt-3">
                        <?php $i = 0; $startTime = 800; $endTime = 2200; $revealTime = 30;?>
                        <?php $reserved = [900, 1130, 1000, 1400, 1500, 1530, 2200, 1800, 1830, 1500, 1530, 1600, 1630] ?>
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
                                    @include('patient.appointments-schedule', ['i' => $i, 'reserved' => $reserved])
                                </div>
                            @elseif($countMd == 3)
                                <div class="col-lg-3 col-md-4 col-sm-12 br-md br-sm">
                                    <?php
                                        $countMd = 0;
                                    ?>
                                    @include('patient.appointments-schedule', ['i' => $i, 'reserved' => $reserved])
                                </div>
                            @elseif($countLg == 4)
                                <div class="col-lg-3 col-md-4 col-sm-12 br-lg br-sm">
                                    <?php
                                        $countLg = 0;
                                    ?>
                                    @include('patient.appointments-schedule', ['i' => $i, 'reserved' => $reserved])
                                </div>
                            @else
                                <div class="col-lg-3 col-md-4 col-sm-12 br-sm">
                                    @include('patient.appointments-schedule', ['i' => $i, 'reserved' => $reserved])
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <?php
                    $myAppointments = [
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1500',
                        'to'    =>  '1530'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1600',
                        'to'    =>  '1630'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1700',
                        'to'    =>  '1730'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1800',
                        'to'    =>  '1830'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1900',
                        'to'    =>  '1930'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '2000',
                        'to'    =>  '2030'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '2100',
                        'to'    =>  '2130'
                    ]
                ]
                ?>
                <h3 id="my-appointments" class="mt-5">My Appointments</h3>
                <div class="my-appointments mb-5 mt-3">
                    <div class="row" style="background-color: #5D5D5D; color: #FFF; font-weight: bolder; font-size: 18px;">
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
                    <div id="appointments-table" class="sub-container">
                        <?php $i = 0; $fromTo = ['from', 'to'] ?>
                        @foreach($myAppointments as $appointment)
                            <div id="{{ 'row-'.$i }}" class="row" style="<?php if ($i % 2 == 0){ ?>background-color: #F2F2F2; <?php } ?>">
                                <div id="{{ 'row-'.$i.'-index' }}" class="col-sm-1">
                                    <span>{{ $i + 1 }}</span>
                                </div>
                                <div class="col-sm-3">
                                    <span>{{ $appointment['date'] }}</span>
                                </div>
                                @foreach($fromTo as $data)
                                    <div class="col-sm-2">
                                        @if($appointment[$data] == 1200 or $appointment[$data] == 1230)
                                            <span>
                                        {{ intdiv($appointment[$data], 100) }}:<?php if ($appointment[$data] % 100 == 0): ?>00<?php else: ?>{{ $appointment[$data] % 100 }}<?php endif; ?>pm
                                    </span>
                                        @elseif($appointment[$data] >= 1300)
                                            <span>
                                        {{ intdiv($appointment[$data] - 1200, 100) }}:<?php if ($appointment[$data] % 100 == 0): ?>00<?php else: ?>{{ $appointment[$data] % 100 }}<?php endif; ?>pm
                                    </span>
                                        @else
                                            <span>
                                        {{ intdiv($appointment[$data], 100) }}:<?php if ($appointment[$data] % 100 == 0): ?>00<?php else: ?>{{ $appointment[$data] % 100 }}<?php endif; ?>am
                                    </span>
                                        @endif
                                    </div>
                                @endforeach
                                <div class="col-sm-4">
                                    <button id="{{ 'row-btn-'.$appointment['from'] }}" class="btn btn-danger" onclick="deleteAppointment('{{ $i }}', '{{ $appointment['from'] }}')">
                                        <span>Remove</span>
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <?php $i++ ?>
                        @endforeach
                    </div>
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
        Array.prototype.removeFirst = function (target) {
            let newArr = []
            let count = 0;
            for (let i = 0; i < this.length; i++) {
                if (this[i] === target)
                    break
                newArr.push(this[i])
                count++;
            }
            for (let i = count + 1; i < this.length; i++)
                newArr.push(this[i])
            return newArr;
        }
        let myAppointments = [];
        for (let i = 0; i < {{ count($myAppointments) }}; i++)
            myAppointments.push(i)
        let reservedAppointments = []
        let lastMonthActive = {{ date('m') }}, lastDayActive = {{ date('d') }};
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $('#month-'+lastMonthActive).addClass('active')
        $('#day-'+lastDayActive).addClass('active');
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
        }
        function selectDay(dayId) {
            if (lastDayActive !== null)
                $('#day-'+lastDayActive).removeClass('active')
            $('#day-'+dayId).addClass('active');
            lastDayActive = dayId
        }
        function searchForAppointments() {
            let date = new Date()
            let day = parseInt(lastDayActive)
            let month = parseInt(lastMonthActive)
            if (parseInt(day / 10) === 0)
                day = '0' + day
            $('#date').html(months[month - 1] + ' ' + day + ', ' + date.getFullYear())
        }

        let todayBtn = $('#today');
        todayBtn.on('click', function () {
            $('#date').html('{{ date("F d, Y") }}')
           $.ajax({
               url: '/show-appointments/'+ {{ date('d') }} + '/' + {{ date('m') }},
               type: 'get',
               dataType: 'json',
               success: function (response) {
                   for (let i = 0; i < reservedAppointments.length; i++) {
                       let btn = $('#btn-'+reservedAppointments[i]);
                       btn.removeClass('btn-danger');
                       btn.addClass('btn-success');
                       btn.html('Book Now <i class="fa fa-hand-pointer-o"></i>')
                       btn.css({
                           'padding-right': '12px',
                           'padding-left': '12px'
                       })
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
                    }
                    reservedAppointments = response;
               }
           });
        });
        todayBtn.click();

        let searchBtn = $('#search');
        searchBtn.on('click', function () {
            $.ajax({
                url: '/show-appointments/'+ lastDayActive + '/' + lastMonthActive,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    for (let i = 0; i < reservedAppointments.length; i++) {
                        let btn = $('#btn-'+reservedAppointments[i]);
                        btn.removeClass('btn-danger');
                        btn.addClass('btn-success');
                        btn.html('Book Now <i class="fa fa-hand-pointer-o"></i>')
                        btn.css({
                            'padding-right': '12px',
                            'padding-left': '12px'
                        })
                    }
                    for (let i = 0; i < response.length; i++) {
                        let btn = $('#btn-'+response[i]);
                        btn.removeClass('btn-success');
                        btn.addClass('btn-danger');
                        btn.html('Booked <i class="fa fa-exclamation"></i>');
                        btn.css({
                            'padding-right': '1.675rem',
                            'padding-left': '1.675rem'
                        })
                    }
                    reservedAppointments = response;
                }
            });
        });

        function bookNow(from) {
            $.ajax({
                url: '/create-appointment/'+ 1 + '/' + from,   // Remove 1 And Write User ID
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
        }

        function deleteAppointment(rowId, from) {
            $.ajax({
                url: '/delete-appointment/'+ 1 + '/' + from,   // Remove 1 And Write User ID
                type: 'get'
            });
            console.log(rowId, myAppointments)
            rowId = parseInt(rowId)
            for (let i = rowId + 1; i < myAppointments.length; i++) {
                let row = $('#row-' + i)
                let rowIndex = $('#row-' + i + '-index')
                rowIndex.html(i - 1)
                row.attr('id', 'row-' + (i - 1))
                if (row.css('background-color') === 'rgba(0, 0, 0, 0)')
                    row.css('background-color', 'rgb(242, 242, 242)')
                else if (row.css('background-color') === 'rgb(242, 242, 242)')
                    row.css('background-color', 'rgba(0, 0, 0, 0)')
                myAppointments[i] = i - 1;
            }
            $('#row-' + rowId).remove()
            myAppointments = myAppointments.removeFirst(rowId);
        }

    </script>
@endsection
