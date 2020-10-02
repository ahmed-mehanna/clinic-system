@extends('components.app')
@section('content')
    <div class="home-page-style">
        <script>
            document.getElementById('home').className = 'nav-item active'
        </script>
        @if(Session::has('message'))
            <div class="alert-success">
                <div class="fp w-100" style="text-align:center"><strong >{{Session::get('message')}}</strong></div>
            </div>
        @endif
        @if(Session::has('messageError'))
            <div class="alert-danger">
                <div class="fp w-100" style="text-align:center"><strong >{{Session::get('messageError')}}</strong></div>
            </div>
        @endif
        @if(Session::has('searchError'))
            <div class="alert-danger">
                <div class="fp w-100" style="text-align:center"><strong >{{Session::get('searchError')}}</strong></div>
            </div>
        @endif
        @include('components.index-page.welcome-section')
        @include('components.index-page.about-us-section')
        @include('components.index-page.our-specialist')
    </div>
@endsection
