@extends('components.app')
@section('head')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="{{asset('css/new.css')}}">
@endsection
@section('content')

       

      
       
       
        <div class="side-menu">

            <center>
                <img src="user.jpg">
                <br><br>

                <h2>Name</h2>
            </center>
            <br>
           
            <a href="/history.blade.php"><i class="fa fa-user"></i><span>My History</span></a>
            <a href="#"><i class="fa fa-envelope"></i><span>Contact Us</span></a>
            <a href="/makeappointment.blade.php"><i class="fa fa-sellsy"></i><span>Make an Appointment</span></a>
            <a href="#"><i class="fa fa-ban"></i><span>Delete Account</span></a>
            <a href="#"><i class="fa fa-cog"></i><span>Reset password</span></a>
            <a href="#" class="Logout"><span>Logout</span></a>
       

        </div>
        <div class="data">
             @yield('content1')
        </div>
    
</div>


@endsection

