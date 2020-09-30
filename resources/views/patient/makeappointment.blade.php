@extends('components.newfile')
@section('content1')
<div class="container">
                <br>
                <h1>
                    Your Appointments:
                </h1>
                <hr color="black" width="320px">
                <br>
                <h2>
                    Your next appointment:
                </h2>
                <hr color="black" width="420px">
                <br>
                <p class="lead">
                   You have no appointments!
                </p>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                    $("button.newbutton").click(function () {
                    $("form").toggle();
                     });
                    });
                </script>
                <button class="newbutton" onclick="makeapp()">Make or Edit Appointment</button>

                <form>
                <div>
                    <br>
                <h4>Choose New Appointment</h4>
                <hr color="black" width="320px">


              </div>
               <button class="newbutton">Cancel Appointment</button>
                <button type="submit" class="newbutton">Save</button>
                </form>






    </div>
@endsection
