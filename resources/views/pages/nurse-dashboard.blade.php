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
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Attend</th>
                </tr>
                </thead>
                <tbody>
                <input type="hidden" value="{{$i=1}}">
                @foreach($reservation as $reservationsData)
                    <tr <?php if ($i === 1){ ?> class="active" <?php } ?> >
                        <th scope="row">{{$i++}}</th>
                        <td>{{$reservationsData->user->name}}</td>
                        <td>{{Carbon::parse($reservationsData["reservation At"])->format('g:i A')}}</td>
                        <td>{{Carbon::parse($reservationsData["reservation At"])->addMinutes(30)->format('g:i A')}}</td>
                        <td>
                            <input type="hidden" value="$user">
                            <button type="button" data-toggle="modal" data-target="{{ '#attend-pop-up-user-'.$reservationsData->user->id }}">
                                <i class="fa fa-check"></i>
                            </button>
                            <form class="d-inline" id="{{ 'attend'.$reservationsData->user->id }}" method="get" action="/patient/attend/{{$reservationsData->user->id}}">
                                @csrf
                            </form>
                            <button class="mr-0" type="button" data-toggle="modal" data-target="{{ '#did-not-attend-pop-up-user-'.$reservationsData->user->id }}">
                                <i class="fa fa-times"></i>
                            </button>
                            <form class="d-inline" id="{{ 'did-not-attend'.$reservationsData->user->id }}" method="get" action="/patient/notattend/{{$reservationsData->user->id}}">
                                @csrf
                            </form>
                        </td>
                        <x-attend-pop-up :id="$reservationsData->user->id" />
                        <x-did-not-attend-pop-up :id="$reservationsData->user->id" />
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <button id="ajax-btn" class="d-none" data-toggle="modal" data-target="#notification"></button>
    @include('components.nurse-dashboard.notification')
    <script>
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
