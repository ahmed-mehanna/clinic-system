@extends('components.app')
@section('content')
    <script>
        document.getElementById('reserved-appointments').className = 'nav-item active'
    </script>
    <?php
        use Carbon\Carbon;
    ?>
    @if(Session::has('messageError'))
        <div class="alert-danger">
            <div class="fp w-100" style="text-align:center"><strong >{{Session::get('messageError')}}</strong></div>
        </div>
    @endif
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
        let reservedAppointments = []
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let monthsNum = {"January": 1, "February": 2, "March": 3, "April": 4, "May": 5, "June": 6, "July": 7, "August": 8, "September": 9, "October": 10, "November": 11, "December": 12}
        function searchAjax() {
            $.ajax({
                url: '/doctor/show-appointments/'+ lastDayActive + '/' + lastMonthActive,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    let canReserve = response[response.length - 1]
                    for (let i = 800; i < 2200; i += 30) {
                        if (i % 100 === 60)
                            i += 40
                        let btn = $('#btn-' + i)
                        btn.attr('onclick', '')
                        btn.html('Book Now <i class="fa fa-hand-pointer-o"></i>')
                        if (response.indexOf(i) === -1) {
                            btn.addClass('not-available')
                            btn.html('Book Now <i class="fa fa-hand-pointer-o"></i>')
                            btn.css({
                                'padding-right': '12px',
                                'padding-left': '12px'
                            })
                        }
                    }
                    for (let i = 0; i < response.length; i++) {
                        let btn = $('#btn-'+response[i]);
                        btn.removeClass('not-available');
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
    </script>
@endsection
