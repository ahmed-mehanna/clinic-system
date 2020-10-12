@extends('components.app')
@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <script>
        document.getElementById('nurse-reservations').className = 'nav-item active'
    </script>
    <div class="nurse-dashboard-style" style="min-height: 535px; padding-bottom: 0">
        <div class="container-fluid">
            <table id="table" class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Attend</th>
                </tr>
                </thead>
                <tbody id="table-body"></tbody>
            </table>
        </div>
    </div>
    <button id="ajax-btn" class="d-none" data-toggle="modal" data-target="#notification"></button>
    @include('components.nurse-dashboard.notification')
    <script>
        Array.prototype.isEqualTo = function (target) {
            if (this.length !== target.length)
                return false
            for (let i = 0; i < this.length; i++) {
                if (this[i].length !== target[i].length)
                    return false
                for (let j = 0; j < this[i].length; j++)
                    if (this[i][j] !== target[i][j])
                        return false
            }
            return true
        }


        let table = []
        let reservationTable = setInterval(function (){
            $.ajax({
                url: '/nurse/reservations',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (table.isEqualTo(response))
                        return null
                    $('#table-body').empty()
                    for (let i = 0; i < response.length; i++) {
                        let row = ''
                        if (i === 0)
                            row = '<tr class="active">'
                        else
                            row = '<tr>'
                        row += '<th scope="row">' + (i + 1) + '</th>' +
                                '<td>' + response[i]['name'] + '</td>' +
                                '<td>' + response[i]['from'] + '</td>' +
                                '<td>' + response[i]['to'] + '</td>' +
                                '<td>' +
                                '<button type="button" data-toggle="modal" data-target="#attend-pop-up-user-' + response[i]['user_id'] + '">' +
                                '<i class="fa fa-check"></i>' +
                                '</button>' +
                                '<input type="hidden" value="' + response[i]['user_id'] + '">' +
                                '<form class="d-inline" id="attend' + response[i]['user_id'] + '" method="get" action="/patient/attend/' + response[i]['user_id'] + '">' +
                                '@csrf' +
                                '</form>' +
                                '<form class="d-inline" id="did-not-attend' + response[i]['user_id'] + '" method="get" action="/patient/notattend/' + response[i]['user_id'] + '">' +
                                '@csrf' +
                                '</form>' +
                                '<button class="mr-0" type="button" data-toggle="modal" data-target="#did-not-attend-pop-up-user-' + response[i]['user_id'] + '">' +
                                '<i class="fa fa-times"></i>' +
                                '</button>' +
                                '</td>' +
                            '</tr>'
                        $('#table-body').append(row)
                        let attendPopup = '<div>' +
                            '    <div class="modal fade" id="attend-pop-up-user-' + response[i]['user_id'] + '">' +
                            '        <div class="modal-dialog">' +
                            '            <div class="modal-content">' +
                            '                <div class="modal-header">' +
                            '                    <h5 class="modal-title">Attend</h5>' +
                            '                    <button form="" type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                            '                        <span aria-hidden="true">&times;</span>' +
                            '                    </button>' +
                            '                </div>' +
                            '                <div class="modal-body">' +
                            '                    Patient Has Attend' +
                            '                </div>' +
                            '                <div class="modal-footer">' +
                            '                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                            '                    <button form="attend' + response[i]['user_id'] + '" name="attend" value="true" type="submit" class="btn btn-primary">Save changes</button>' +
                            '                </div>' +
                            '            </div>' +
                            '        </div>' +
                            '    </div>' +
                            '</div>'
                        let didNotAttendPopup = '<div>\n' +
                            '    <div class="modal fade" id="did-not-attend-pop-up-user-'+response[i]['user_id'] + '">\n' +
                            '        <div class="modal-dialog" role="document">\n' +
                            '            <div class="modal-content">\n' +
                            '                <div class="modal-header">\n' +
                            '                    <h5 class="modal-title">Attend</h5>\n' +
                            '                    <button form="" type="button" class="close" data-dismiss="modal" aria-label="Close">\n' +
                            '                        <span aria-hidden="true">&times;</span>\n' +
                            '                    </button>\n' +
                            '                </div>\n' +
                            '                <div class="modal-body">\n' +
                            '                    Patient Has Not Attend\n' +
                            '                </div>\n' +
                            '                <div class="modal-footer">\n' +
                            '                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>\n' +
                            '                    <button form="did-not-attend' + response[i]['user_id'] + '" name="attend" value="false" type="submit" class="btn btn-primary">Save changes</button>\n' +
                            '                </div>\n' +
                            '            </div>\n' +
                            '        </div>\n' +
                            '    </div>\n' +
                            '</div>\n'
                        $('#table').append(attendPopup, didNotAttendPopup)
                    }
                    table = response
                }
            })
        }, 500)


        function notify() {
            $.ajax({
                url: '/notification',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (response === true) {
                        clearInterval(notificationCheck)
                        $('#ajax-btn').click()
                    }
                }
            })
        }
        let notificationCheck = setInterval(notify, 500);
    </script>
@endsection
