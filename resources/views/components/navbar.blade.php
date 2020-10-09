<?php
use App\Models\User ;
use Illuminate\Support\Facades\Auth;
?>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{route('index')}}">
        <img src="{{asset('imgs/index-page/logo.png')}}" alt="" style="max-width: 100%">
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
        @if (Route::has('login'))
            <ul class="navbar-nav mr-auto">
                @if(auth::check())
                    <input type="hidden" value="{{$user = User::find(auth()->user()->id)}}"/>
                    @if( $user->Role == 1)
                        @include('components.doctor-dashboard.doctor-navbar')
                    @elseif( $user->Role == 2)
                        @include('components.nurse-dashboard.nurse-navbar')
                    @elseif($user->Role == 3)
                        @include('patient.patient-navbar')
                    @endif
                @endif
            </ul>
            <ul class="hidden fixed top-0 right-0 sm:block navbar-nav">
                @auth
                    @if(auth::check())
                        <input type="hidden" value="{{$user = User::find(auth()->user()->id)}}"/>
                        @if( $user->Role == 3)
                            <li class="nav-item not-active" id="nurse-reserve">
                                <a class="nav-link" href="/patient">Dashboard</a>
                                <span></span>
                            </li>
                        @endif
                    @endif
                    <li class="nav-item not-active" id="dashboard">
                        <a href="/Logout" class="nav-link">Logout</a>
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
