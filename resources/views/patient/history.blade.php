@extends('components.app')
@section('content')
    <div class="nurse-dashboard-style" style="min-height: 535px; padding-bottom: 0">
        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Illness Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Details</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @if(count($user->illness)!=0)
                            <input type="hidden" value="{{$i=1}}">
                            @foreach($user->illness as $Illness)
                                <td>{{$i++}}</td>
                                <td>{{$Illness["illnessName"]}}</td>
                                <td>{{\Carbon\Carbon::parse($Illness["created_at"])->toFormattedDateString()}}</td>
                                <td>
                                    <a href="/history/details/{{$Illness->id}}" class="btn btn-primary" target="_blank" >Show</a>
                                </td>
                            @endforeach
                        @else
                            <td colspan="4"><h2 style="color: #005FCE">No History Is Available Until Now</h2></td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
