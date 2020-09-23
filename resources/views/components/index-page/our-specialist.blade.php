<div class="container-fluid our-specialist-section" id="our-specialist">
    <div class="container">
        <div class="section-data">
            <h1 class="text-center">
                OUR SPECIALIST
                <span></span>
            </h1>
            <p class="lead text-center mr-auto ml-auto">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit sed
                do eiusmod tempor incididunt ut labore.
            </p>
        </div>
        <?php
            $doctors = [
                [
                    'img'   =>  'imgs/index-page/doctor4.png',
                    'name'  =>  'Randall Drake',
                    'job'   =>  'Gerontologists',
                    'twitter'  =>  '',
                    'linkedin'  =>  '',
                    'facebook'  =>  '',
                    'youtube'   =>  ''
                ],
                [
                    'img'   =>  'imgs/index-page/doctor5.png',
                    'name'  =>  'Melissa Lombardo',
                    'job'   =>  'Cardiologists',
                    'twitter'  =>  '',
                    'linkedin'  =>  '',
                    'facebook'  =>  '',
                    'youtube'   =>  ''
                ],
                [
                    'img'   =>  'imgs/index-page/doctor6.png',
                    'name'  =>  'Vanessa Lewis',
                    'job'   =>  'Dermatologists',
                    'twitter'  =>  '',
                    'linkedin'  =>  '',
                    'facebook'  =>  '',
                    'youtube'   =>  ''
                ]
            ]
        ?>
        <div class="row">
            @foreach($doctors as $doctor)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="doctor-container">
                        <img src="{{asset($doctor['img'])}}" alt="">
                        <div class="data-container">
                            <div class="data text-center">
                                <h1>
                                    {{$doctor['name']}}
                                </h1>
                                <h5>
                                    {{$doctor['job']}}
                                </h5>
                                <div class="links">
                                    <a href="{{$doctor['twitter']}}">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="{{$doctor['linkedin']}}">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <a href="{{$doctor['facebook']}}">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                    <a href="{{$doctor['youtube']}}">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="summary">
                                <h4>{{$doctor['name']}}</h4>
                                <h5>{{$doctor['job']}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
