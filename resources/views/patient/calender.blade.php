<div>
    <div class="modal fade" id="calender">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Calender</h5>
                    <button form="" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 offset-lg-1 text-center">
                                <h3>Month</h3>
                                <div class="calender-menu border mr-auto ml-auto">
                                    <ul>
                                        @for($i = date('m'); $i <= 12; $i++)
                                            <li id="{{ 'month-'.$i }}" class="border-bottom m-auto pt-2" onclick="selectMonth('{{ $i }}')">{{ date('M', mktime(0, 0, 0, $i, 10)) }} {{ $i }}</li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 text-center">
                                <h3>Day</h3>
                                <div class="calender-menu border mr-auto ml-auto">
                                    <ul id="days-list">
                                        @for($i = date('d'); $i <= 31; $i++)
                                            <li id="{{ 'day-'.$i }}" class="border-bottom m-auto pt-2" onclick="selectDay('{{ $i }}')">{{ $i }}</li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="search" type="button" class="btn btn-primary" data-dismiss="modal" onclick="searchForAppointments()">Search</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let lastMonthActive = {{ date('m') }}, lastDayActive = {{ date('d') }};
        $('#month-'+lastMonthActive).addClass('active')
        $('#day-'+lastDayActive).addClass('active');
        function selectMonth(monthId) {
            let day = {{ date('d') }}
            if (monthId !== {{ date('m') }} && $('#days-list > li').attr('id') !== 'day-1') {
                for (let i = day - 1; i >= 1; i--)
                    $('#days-list').prepend('<li id="day-' + i + '" class="border-bottom m-auto pt-2" onclick="selectDay(' + i + ')">' + i + '</li>')
                selectDay(1)
            }
            else if ($('#days-list > li').attr('id') !== 'day-' + day) {
                for (let i = 1; i < day; i++)
                    $('#day-' + i).remove()
                selectDay(day)
            }

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
    </script>
</div>
