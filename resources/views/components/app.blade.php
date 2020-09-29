<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clinic</title>
        <!-- Fonts -->
        @yield('head')
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
            <?php
                use App\Models\User ;
                use Illuminate\Support\Facades\Auth;
            ?>
            @if (Route::has('login'))
                <ul class="navbar-nav mr-auto">
                    @if(auth::check())
                        <input type="hidden" value="{{$user = User::find(auth()->user()->id)}}"/>
                        @if( $user->Role == 1)
                            @include('components.doctor-dashboard.find-patient-pop-up')
                        @endif
                    @endif
                </ul>
            @endif
        </div>
        @include('components.footer')
    </body>
</html>
