@extends('components.app')
@section('content')
    <div class="patient-dashboard-style">
        <div class="make-appointment">
            <div class="container">
                <div class="inputs border-bottom pb-3">
                    <div class="row">
                        <div  class="col-lg-3 col-md-5">
                            <span id="available-appointments-day">{{ date("F d, Y") }}</span>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span id="xx" class="form-control d-inline-block text-center" style="width: 35%" data-toggle="modal" data-target="#calender">
                                Select Reveal Day
                                <i class="fa fa-calendar ml-3"></i>
                            </span>
                            <button class="btn btn-primary">TODAY</button>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-12 cc">
                            <span>{{ date("M d, Y") }}</span>
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
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ],
                    [
                        'date'  =>  date("F d, Y"),
                        'from'  =>  '1400',
                        'to'    =>  '1430'
                    ]
                ]
                ?>
                <h3 class="mt-5">My Appointments</h3>
                <div class="my-appointments mb-5 mt-3">
                    <div class="sub-container">
                        <?php $i = 1 ?>
                        @foreach($myAppointments as $appointment)
                            <div class="row" style="<?php if ($i % 2 == 0){ ?>background-color: #F2F2F2; <?php } ?>">
                                <div class="col-sm-1 d-none d-sm-block">
                                    <span>{{ $i }}</span>
                                </div>
                                <div class="col-sm-3">
                                    <span>{{ $appointment['date'] }}</span>
                                </div>
                                <div class="col-sm-2">
                                    @if($appointment['from'] == 1200 or $appointment['from'] == 1230)
                                        <span>
                                        {{ intdiv($appointment['from'], 100) }}:<?php if ($appointment['from'] % 100 == 0): ?>00<?php else: ?>{{ $appointment['from'] % 100 }}<?php endif; ?>pm
                                    </span>
                                    @elseif($appointment['from'] >= 1300)
                                        <span>
                                        {{ intdiv($appointment['from'] - 1200, 100) }}:<?php if ($appointment['from'] % 100 == 0): ?>00<?php else: ?>{{ $appointment['from'] % 100 }}<?php endif; ?>pm
                                    </span>
                                    @else
                                        <span>
                                        {{ intdiv($appointment['from'], 100) }}:<?php if ($appointment['from'] % 100 == 0): ?>00<?php else: ?>{{ $appointment['from'] % 100 }}<?php endif; ?>am
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-2">
                                    @if($appointment['to'] == 1200 or $appointment['to'] == 1230)
                                        <span>
                                        {{ intdiv($appointment['to'], 100) }}:<?php if ($appointment['to'] % 100 == 0): ?>00<?php else: ?>{{ $appointment['to'] % 100 }}<?php endif; ?>pm
                                    </span>
                                    @elseif($appointment['to'] >= 1300)
                                        <span>
                                        {{ intdiv($appointment['to'] - 1200, 100) }}:<?php if ($appointment['to'] % 100 == 0): ?>00<?php else: ?>{{ $appointment['to'] % 100 }}<?php endif; ?>pm
                                    </span>
                                    @else
                                        <span>
                                        {{ intdiv($appointment['to'], 100) }}:<?php if ($appointment['to'] % 100 == 0): ?>00<?php else: ?>{{ $appointment['to'] % 100 }}<?php endif; ?>am
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-danger">
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
        let lastMonthActive = null, lastDayActive = null;
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        function selectMonth(monthId) {
            if (monthId === 2) {

            }
            else if (monthId <= 7 && monthId % 2 === 0) {
                if (lastMonthActive !== null)
                    $('#'+lastMonthActive).removeClass('active')
                $('#month-'+monthId).addClass('active')
                lastMonthActive = 'month-'+monthId
                $('#day-31').remove();
            }
            else if (monthId <= 7 && monthId % 2 === 1) {
                if (lastMonthActive !== null)
                    $('#'+lastMonthActive).removeClass('active')
                $('#month-'+monthId).addClass('active')
                lastMonthActive = 'month-'+monthId
                if (!$('#days-list').find('#day-31').length)
                    $('#days-list').append('<li id="day-31" class="border-bottom m-auto pt-2" onclick="selectDay(31)">31</li>');
            }
            else if (monthId > 7 && monthId % 2 === 0) {
                if (lastMonthActive !== null)
                    $('#'+lastMonthActive).removeClass('active')
                $('#month-'+monthId).addClass('active')
                lastMonthActive = 'month-'+monthId
                if (!$('#days-list').find('#day-31').length)
                    $('#days-list').append('<li id="day-31" class="border-bottom m-auto pt-2" onclick="selectDay(31)">31</li>');
            }
            else if (monthId > 7 && monthId % 2 === 1) {
                if (lastMonthActive !== null)
                    $('#'+lastMonthActive).removeClass('active')
                $('#month-'+monthId).addClass('active')
                lastMonthActive = 'month-'+monthId
                $('#day-31').remove();
            }
        }
        function selectDay(dayId) {
            if (lastDayActive !== null)
                $('#'+lastDayActive).removeClass('active')
            $('#day-'+dayId).addClass('active');
            lastDayActive = 'day-'+dayId
        }
        function searchForAppointments() {
            let date = new Date()
            let day = parseInt(lastDayActive.split('-')[1])
            let month = parseInt(lastMonthActive.split('-')[1])
            if (parseInt(day / 10) === 0)
                day = '0' + day
            $('#available-appointments-day').html(months[month - 1] + ' ' + day + ', ' + date.getFullYear())
        }
    </script>
@endsection
