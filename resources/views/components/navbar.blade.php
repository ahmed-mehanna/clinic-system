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
                <a class="nav-link" href="{{route('index')}}">Home</a>
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
            @yield('navbar-additional-buttons')
        </ul>
        @if (Route::has('login'))
            <ul class="hidden fixed top-0 right-0 sm:block navbar-nav">
                @auth
                   <li class="nav-item not-active" id="dashboard">
                       <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 mr-3">Dashboard</a>
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
