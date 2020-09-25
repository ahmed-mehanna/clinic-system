@extends('components.app')
@section('navbar-additional-buttons')
    @include('components.nurse-dashboard.nurse-navbar')
@endsection
@section('content')
    <script>
        document.getElementById('nurse-work-exception').className = 'nav-item active'
    </script>
    <div class="nurse-work-hour-exception">
        <?php
            $times = [
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ],
                [
                    'from'  =>  '10:00 AM',
                    'to'    =>  '10:30 AM'
                ]
            ]
        ?>
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="day">Day</label>
                    <input type="date" class="form-control" id="day" name="day" required>
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <select multiple class="form-control" id="time" name="time">
                        @foreach($times as $time)
                            <option>{{$time['from']}} : {{$time['to']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mr-3">Submit</button>
                <span class="btn btn-danger" id="go-back" onclick="goBack()">Back</span>
            </form>
        </div>
    </div>
    <script>
        function goBack () {
            window.history.back();
        }
    </script>
@endsection
