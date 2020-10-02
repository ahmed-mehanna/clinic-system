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
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <div class="modal fade" id="attend-pop-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Attend</h5>
                                                    <button form="" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Patient Has Attend
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="/patient/attend/{{$reservationsData->user->id}}" method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <button class="mr-0" type="button" data-toggle="modal" data-target="#did-not-attend-pop-up">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <div class="modal fade" id="did-not-attend-pop-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Attend</h5>
                                                    <button form="" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Patient Has Not Attend
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="/patient/notattend/{{$reservationsData->user->id}}" method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
{{--@include('components.nurse-dashboard.attend-popup')--}}
{{--@include('components.nurse-dashboard.did-not-attend-pop-up')--}}
