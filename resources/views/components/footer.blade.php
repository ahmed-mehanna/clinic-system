<footer>
    <div class="container">
        <?php
            $data = [
                'facebook'  =>  '',
                'twitter'   =>  '',
                'linkedin'  =>  '',
                'whatsapp'  =>  '',
                'location'  =>  '143 Gordon Terrace Embarrassing NG33 0ZT United Kingdom',
                'email-address' =>  'info@healthcare.com',
                'phone' =>  '+1800 326 3264'
            ]
        ?>
        <div class="row">
            <div class="col-lg-5 col-sm-12">
                <img src="{{asset('imgs/index-page/logo2.png')}}" alt="">
                <p class="lead">
                    Lorem ipsum dolor sit amet onsectetur adipi sicing elit, sed do eiusmod empor incididunt ut labore et onsectetur adipisicing elit dolore a aliquia. Ut enim ad minim veniam quis nstrud exercitation ullamco.
                </p>
            </div>
            <div class="col-lg-3 col-sm-12 offset-lg-1">
                <h2>Social Media</h2>
                <ul>
                    <li>
                        <i class="fa fa-facebook-f">
                            <a href="{{ $data['facebook'] }}">&nbsp;Facebook</a>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-twitter">
                            <a href="{{ $data['twitter'] }}">Twitter</a>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-linkedin">
                            <a href="{{ $data['linkedin'] }}">Linkedin</a>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-whatsapp">
                            <a href="{{ $data['whatsapp'] }}">Whatsapp</a>
                        </i>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-12" id="contact-us">
                <h2>Find Us</h2>
                <ul>
                    <li>
                        <i class="fa fa-home">
                            <span style="line-height: 1.2;">
                                {{ $data['location'] }}
                            </span>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-envelope">
                            <a>{{ $data['email-address'] }}</a>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-phone">
                            <span>
                                {{ $data['phone'] }}
                            </span>
                        </i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright text-center d-none d-sm-block">
        <i class="fa fa-copyright">
            <span>
                Copyright 2018, All Rights Reserved, <a href="">HEALTHCARE</a>
            </span>
        </i>
    </div>
</footer>
