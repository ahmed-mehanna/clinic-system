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
                                        @for($i = date('d') % 10; $i <= 12; $i++)
                                            <li id="{{ 'month-'.$i }}" class="border-bottom m-auto pt-2" onclick="selectMonth('{{ $i }}')">{{ date('M', mktime(0, 0, 0, $i, 10)) }} {{ $i }}</li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 text-center">
                                <h3>Day</h3>
                                <div class="calender-menu border mr-auto ml-auto">
                                    <ul id="days-list">
                                        @for($i = 1 % 10; $i <= 31; $i++)
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="searchForAppointments()">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
