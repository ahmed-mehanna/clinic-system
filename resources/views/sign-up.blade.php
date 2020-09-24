<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clinic</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="stylesheet" href="{{asset('css/logincss.css')}}" />
        <meta name="viewport" >
    </head>

    
    <body id="body" class="antialiased">
        @include('components.social-bar')
        @include('components.navbar')
        <div> {{-- padding top = 100px if navbar is fixed --}}
            @yield('content')
        </div>
        <div class="hero">
        <div class="form-box ">
            <div class="button-box">
               
                <h1>Register</h1>
               
            </div>
            
            <form id="signup" class="input-group">
                <input type="text" class="input-field" placeholder="Name" required />
                <input type="text" class="input-field" placeholder="E-mail" />
                <input type="text" class="input-field" placeholder="Phone Number" required />
                <input type="text" class="input-field" placeholder="Password" required />
                <button type="submit" class="submit-btn">Register</button>

            </form>
        </div>

    </div>
    </body>

</html>



