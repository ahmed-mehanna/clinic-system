@extends('components.app')
@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <script>
        document.getElementById('nurse-reservations').className = 'nav-item active'
    </script>
    <div class="nurse-dashboard-style" style="min-height: 520px; padding-bottom: 0">
        <div class="container-fluid">
            @if(count($reservation)>0)
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
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$reservationsData->user->name}}</td>
                            <td>{{Carbon::parse($reservationsData["reservation At"])->format('g:i A')}}</td>
                            <td>{{Carbon::parse($reservationsData["reservation At"])->addMinutes(30)->format('g:i A')}}</td>
                            <td>
                                <input type="hidden" value="$user">
                                <button type="button" data-toggle="modal" data-target="#attend-pop-up">
                                    <i class="fa fa-check"></i> {{$reservationsData->user->id}}
                                </button>
                                <form class="d-inline" id="attend" method="get" action="/patient/attend/{{$reservationsData->user->id}}">
                                    @csrf
                                </form>
                                <button class="mr-0" type="button" data-toggle="modal" data-target="#did-not-attend-pop-up">
                                    <i class="fa fa-times"></i>
                                </button>
                                <form class="d-inline" id="did-not-attend" method="get" action="/patient/notattend/{{$reservationsData->user->id}}">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1>There Are No Patients Today</h1>
                            </div>
                        </div>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@include('components.nurse-dashboard.attend-pop-up')
@include('components.nurse-dashboard.did-not-attend-pop-up')
