@extends('components.newfile')
@section('content1')
<script>

  var txt;
  var r = confirm("Are you sure you want to reset your password");
  if (r == true) {
    window.location.href = "password/request";
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;

</script>
<div class="container-fluid about-us-section" id="about-us">
                <h1>Welcome Our Website!</h1>
                <hr color="black" width="400px">
                <h2>
                    About Us:
                    <hr color="black" width="190px">
                    <span class="ml-auto mr-auto"></span>
                </h2>

                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempeor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis norud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat enduis aute irure dolor in reprehenderit in voluptate velit esse.cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <h3>
                    Working Hours
                    <span></span>
                </h3>
                <?php
                $workingHours = [
                    ['Mon-Wed', '10:00am', '09:30pm'],
                    ['Thu-Fri', '09:00am', '10:30pm'],
                    ['Sat-Sun', '09:30am', '08:30pm']
                ];
                ?>
                <table>
                    <tr>
                        <th>DAY</th>
                        <th>OPEN</th>
                        <th class="pr-0">CLOSE</th>
                    </tr>
                    @foreach($workingHours as $workHour)
                        <tr>
                            <td>{{$workHour[0]}}</td>
                            <td>{{$workHour[1]}}</td>
                            <td class="pr-0">{{$workHour[2]}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" style="background-color: #005FCE; font-weight: bolder">
                            For Emergency : <span>+( 91 ) 1800-124-4541</span>
                        </td>
                    </tr>
                </table>
</div>
@endsection
