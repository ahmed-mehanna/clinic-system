<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clinic</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('css/new.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body id="body" class="antialiased">
        @include('components.social-bar')
       
        <div> {{-- padding top = 100px if navbar is fixed --}}
        <div class="side-menu">
       
              
             
       <center>
           <img src="user.jpg">
           <br><br>

           <h2>Name</h2>
       </center>
       <br>

      <a href="{{route('index')}}"><i class="fa fa-arrow-left"></i><span>   Home</span></a>
       <a href="/history.blade.php"><i class="fa fa-user"></i><span>My History</span></a>
       <a href="/contactus.blade.php"><i class="fa fa-envelope"></i><span>Contact Us</span></a>
       <a href="/makeappointment.blade.php"><i class="fa fa-sellsy"></i><span>Make an Appointment</span></a>
       <a href="/deleteaccount.blade.php"><i class="fa fa-ban"></i><span>Delete Account</span></a>
       <a href="/resetpasswordpatient.blade.php"><i class="fa fa-cog"></i><span>Setting</span></a>
       
       <a href="#" class="Logout"><span>Logout</span></a>
      

       </div>
      <div class="data">
        @yield('content1')
      </div>

     
      <footer id="newfoot">

      </footer>
       
    </body>
</html>



