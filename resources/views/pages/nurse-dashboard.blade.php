@extends('components.app')
@section('navbar-additional-buttons')
    @include('components.nurse-dashboard.nurse-navbar')
@endsection
@section('content')
    <script>
        document.getElementById('nurse-reservations').className = 'nav-item active'
    </script>
    <div class="nurse-dashboard-style">
        <div class="container-fluid">
            <?php
                $reservationsData = [
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                    [
                        'name'  =>  'Ahmed Mehanna',
                        'from'  =>  '02:00 PM',
                        'to'    =>  '02:30 PM'
                    ],
                ];
            ?>
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
                    <tr class="table-success">
                        <th scope="row">1</th>
                        <td>{{$reservationsData[0]['name']}}</td>
                        <td>{{$reservationsData[0]['from']}}</td>
                        <td>{{$reservationsData[0]['to']}}</td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#attend-pop-up">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="mr-0" type="button" data-toggle="modal" data-target="#did-not-attend-pop-up">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                    @for($i = 1; $i < count($reservationsData); $i++)
                        <tr>
                            <th scope="row">{{$i + 1}}</th>
                            <td>{{$reservationsData[$i]['name']}}</td>
                            <td>{{$reservationsData[$i]['from']}}</td>
                            <td>{{$reservationsData[$i]['to']}}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#attend-pop-up">
                                    <i class="fa fa-check"></i>
                                </button>
                                <button class="mr-0" type="button" data-toggle="modal" data-target="#did-not-attend-pop-up">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    @endfor
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
