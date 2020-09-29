@extends('components.newfile')
@section('content1')
<div class="container-fluid about-us-section" id="about-us">
                <h1>
                    Contact Us
                    <hr color="black" width="220px">
                    <span class="ml-auto mr-auto"></span>
                </h1>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempeor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis norud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat enduis aute irure dolor in reprehenderit in voluptate velit esse.cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                
                
                <h2>Social Media</h2>
                <ul>
                    <li>
                        <i class="fa fa-facebook-f">
                            <a href="">&nbsp;Facebook</a>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-twitter">
                            <a href="">Twitter</a>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-linkedin">
                            <a href="">Linkedin</a>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-whatsapp">
                            <a href="">Whatsapp</a>
                        </i>
                    </li>
                </ul>
            
            <div class="new" >
                <h2>Find Us</h2>
                <ul>
                    <li>
                        <i class="fa fa-home">
                            <span style="line-height: 1.2;">
                                143 Gordon Terrace Embarrassing NG33 0ZT United Kingdom
                            </span>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-envelope">
                            <a href="">info@healthcare.com</a>
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-phone">
                            <span>
                                +1800 326 3264
                            </span>
                        </i>
                    </li>
                </ul>
            </div>



            <h2>
                    Working Hours
                    <span></span>
                </h2>
                <?php
                $workingHours = [
                    ['Mon-Wed', '10:00am', '09:30pm'],
                    ['Thu-Fri', '09:00am', '10:30pm'],
                    ['Sat-Sun', '09:30am', '08:30pm']
                ];
                ?>
                <table>
                    <tr>
                        <th>DAY</th>
                        <th>OPEN</th>
                        <th class="pr-0">CLOSE</th>
                    </tr>
                    @foreach($workingHours as $workHour)
                        <tr>
                            <td>{{$workHour[0]}}</td>
                            <td>{{$workHour[1]}}</td>
                            <td class="pr-0">{{$workHour[2]}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" style="background-color: #005FCE; font-weight: bolder">
                            For Emergency : <span>+( 91 ) 1800-124-4541</span>
                        </td>
                    </tr>
                </table>
</div>
@endsection

