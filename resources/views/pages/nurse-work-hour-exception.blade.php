@extends('components.app')
@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <script>
        document.getElementById('nurse-work-exception').className = 'nav-item active'
    </script>
    <div class="nurse-work-hour-exception" style="min-height: 438px; padding-bottom: 0">
        <div class="container">
            <form action="/update/schedule" method="get">
                @csrf
                <div class="form-group">
                    <label for="day">From</label>
                    <input type="datetime-local" class="form-control" id="day" name="From_That_dayTime"   min="{{\Carbon\Carbon::tomorrow()->addDay()->toDateTimeLocalString()}}" required>
                    <small class="form-text text-muted"><span style="color:red">@error("From_That_dayTime"){{$message}}@enderror</span></small>
                </div>
                 <div class="form-group">
                    <label for="day">To</label>
                    <input type="datetime-local" class="form-control" id="day" name="To_that_Daytime" min="{{\Carbon\Carbon::tomorrow()->addDay()->toDateTimeLocalString()}}"required>
                     <small class="form-text text-muted"><span style="color:red">@error("To_that_Daytime"){{$message}}@enderror</span></small>
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
