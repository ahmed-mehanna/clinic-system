@extends('components.app')
@section('content')
<div class="home-page-style">
    <script>
        document.getElementById('home').className = 'nav-item active'
    </script>
    @include('components.index-page.welcome-section')
    @include('components.index-page.about-us-section')
    @include('components.index-page.our-specialist')
</div>

@endsection
