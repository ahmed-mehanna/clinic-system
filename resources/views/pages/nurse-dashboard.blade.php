@extends('components.app')
@section('navbar-additional-buttons')
    @include('components.nurse-dashboard.nurse-navbar')
@endsection
@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <script>
        document.getElementById('nurse-reservations').className = 'nav-item active'
    </script>
    <div class="nurse-dashboard-style">
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
                @if(count($reservation)>0)
                        @foreach($reservation as $reservationsData)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$reservationsData->user->name}}</td>
                                <td>{{Carbon::parse($reservationsData["reservation At"])->format('g:i A')}}</td>
                                <td>{{Carbon::parse($reservationsData["reservation At"])->addMinutes(30)->format('g:i A')}}</td>
                                <td>{{$reservationsData['id']}}</td>
                                <td>
                                    <button name="attend" value="true" form="attend" type="submit" data-toggle="modal" data-target="#attend-pop-up">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button name="attend" value="false" form="did-not-attend" class="mr-0" type="submit" data-toggle="modal" data-target="#did-not-attend-pop-up">
                                        <i class="fa fa-times"></i>
                                    </button>
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
    <form id="attend" action="">
        @csrf
    </form>
    <form id="did-not-attend" action="">
        @csrf
    </form>
@endsection
@include('components.nurse-dashboard.attend-pop-up')
@include('components.nurse-dashboard.did-not-attend-pop-up')
