@extends('components.newfile')
@section('content1')
<div class="container">
                <br>
                <h1>Your History</h1>
                        @if(count($Ilness)>0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">illnessName</th>
                                    <th scope="col">created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" value="{{$i=1}}">

                                    @foreach($Ilness as $IlnessData)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td><a href="/show/details/{{$IlnessData->id}}">{{$IlnessData->name}}</a></td>
                                            <td>{{Carbon::parse($IlnessData["created_at"])->format('g:i A')}}</td>
                                        </tr>
                                    @endforeach
                        @else
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1>Your History Is Empty</h1>
                                </div>
                            </div>
                        @endif
                        </tbody>
                    </table>
                <hr color="black" width="220px">
                <br>
                <h2>
                    From Your Previous Visit
                </h2>
                <hr color="black" width="320px">
                <br>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempeor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis norud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat enduis aute irure dolor in reprehenderit in voluptate velit esse.cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

            </div>
        </div>
    </div>
@endsection
