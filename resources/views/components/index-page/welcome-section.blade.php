<?php
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
?>
<div class="container-fluid welcome-section">
    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="img col-xl-4 d-none d-xl-inline-block">
                    <img class="" src="{{asset('imgs/index-page/doctor1.png')}}" alt="">
                </div>
                <div class="col-xl-8 col-sm-12 data d-inline-block">
                    <h1>
                        HOSPITAL PROVIDING
                    </h1>
                    <p class="lead">
                            <span class="title">
                                TOTAL <span>HEALTHCARE</span> SOLUTION
                            </span>
                        We at Medicare are always fully focused on helping your to overcame any surgeon procedure with great commitment and easy recovery.
                    </p>
                    @auth
                        @if(auth::check())
                            <input type="hidden" value="{{$user = User::find(auth()->user()->id)}}"/>
                            @if($user->Role == 3)
                                <a href="/makeappointment" class="btn btn-primary">
                                    RESERVE NOW
                                </a>
                            @endif
                        @endif
                    @endauth
                    @guest
                        <a href="/makeappointment" class="btn btn-primary">
                            RESERVE NOW
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
