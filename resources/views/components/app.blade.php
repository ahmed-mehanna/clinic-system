<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clinic</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/logincss.scss')}}" />
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body id="body" class="antialiased">
        @include('components.social-bar')
        @include('components.navbar')
        <div> {{-- padding top = 100px if navbar is fixed --}}
            @yield('content')
        </div>
        @include('components.footer')
    </body>
</html>
