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
        <div class="hero">
        <div class="form-box ">
            <div class="button-box">
                
                <h1>Log In </h1>
                
               
            </div>
            <form class="input-group">
                <input type="text" class="input-field" placeholder="Enter Phone Number" required />
                <input type="text" class="input-field" placeholder="Enter Password" required />
                <def class="fp">
                <a href=https://google.com >Forgot password?
                </def> 
                <button type="submit" class="submit-btn">Log In</button>
                

            </form>
           
        </div>

    </div>
        </div>
       
    </body>
    <body>
    
    
</body>
</html>



