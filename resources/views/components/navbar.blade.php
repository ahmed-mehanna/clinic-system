<?php
use App\Models\User ;
use Illuminate\Support\Facades\Auth;
?>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{route('index')}}">
        <img src="{{asset('imgs/index-page/logo.png')}}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify fa-2x"></i>
    </button>
    <div class="collapse navbar-collapse" id="menu" style="padding-top: 25px; padding-left: 50px;">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item not-active" id="home">
                <a class="nav-link" href="/Home">Home</a>
                <span></span>
            </li>
            <li class="nav-item not-active">
                <a class="nav-link" href="/#about-us">About Us</a>
                <span></span>
            </li>
            <li class="nav-item not-active">
                <a class="nav-link" href="/#our-specialist">Our Specialist</a>
                <span></span>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
        @if (Route::has('login'))
            @if(auth::check())
                <input type="hidden" value="{{$user = User::find(auth()->user()->id)}}"/>
                @if( $user->Role == 1)
                        <li class="nav-item not-active" id="">
                            <a class="nav-link" href="{{route('doctor-dashboard')}}">My Dashboard </a>
                            <span></span>
                        </li>
                        <li class="nav-item not-active" id="nurse-work-exception">
                            <a class="nav-link" href="" target="_blank" data-toggle="modal" data-target="#find-patient">Find Patient</a>
                            <span></span>
                        </li>
                    @elseif( $user->Role == 2)
                        <li class="nav-item not-active" id="nurse-reserve">
                            <a class="nav-link" href="{{route('nurse-reserve')}}">Reserve</a>
                            <span></span>
                        </li>
                        <li class="nav-item not-active" id="nurse-work-exception">
                            <a class="nav-link" href="{{route('working-hours')}}">Working Hours</a>
                            <span></span>
                        </li>
                        <li class="nav-item not-active" id="nurse-reservations">
                            <a class="nav-link" href="{{route('nurse-dashboard')}}">Reservations</a>
                            <span></span>
                        </li>
                    @endif
            @endif

        </ul>
        @else

        @endif
        @if (Route::has('login'))
            <ul class="hidden fixed top-0 right-0 sm:block navbar-nav">
                @auth
                   <li class="nav-item not-active" id="dashboard">
                       <a href="/Logout" class="text-sm text-gray-700 mr-3">Logout</a>
                       <span></span>
                   </li>
                @else
                    <li class="nav-item not-active" id="login" style="padding-top: 8px; padding-bottom: 8px;">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700">Login</a>
                        <span></span>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item not-active" id="registration" style="padding-top: 8px; padding-bottom: 8px;">
                            <a href="{{ route('register') }}" class="text-sm text-gray-700">Register</a>
                            <span></span>
                        </li>
                    @endif
                @endif
            </ul>
        @endif
    </div>
</nav>
