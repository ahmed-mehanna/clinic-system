

{{--<div class="container">--}}
{{--    <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
{{--    <div class="alert alert-danger" role="alert" style="margin-top: 40%"><h1 style="text-align: center  ">403 FORBIDDEN</h1></div>--}}
{{--</div>--}}


<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{ asset('js/app.js') }}"></script>
<style>
    img {
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-top: 5%;
        transition: all .8s ease-in-out;
    }
    img.rotate-right{
        transform: rotateZ(30deg);
    }
    img.rotate-left {
        transform: rotateZ(-30deg);
    }
    h1 {
        margin-left: 38%;
        margin-top: 6%;
        font-family: 'Righteous', cursive;
        font-size: 50px;
    }
</style>

<div class="container-fluid">
    <img class="rotate-right" src="{{ asset('imgs/lock.png') }}" alt="">
    <h1>403 FORBIDDEN</h1>
</div>

<script>
    setInterval(function () {
        if ($('img').hasClass('rotate-right')) {
            $('img').removeClass('rotate-right')
            $('img').addClass('rotate-left')
        }
        else {
            $('img').removeClass('rotate-left')
            $('img').addClass('rotate-right')
        }
    }, 800)
</script>
