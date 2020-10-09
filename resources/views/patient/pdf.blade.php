<?php
use Carbon\Carbon;
?>
<style>
    body {
        font-family: Times New Roman;
        border: thin solid #1b9bff;
        padding: 25px 50px;
    }
</style>
<body>
    <div style="border-bottom:thick solid #6cb2eb">
        <h1 style="text-align: center; color: #1b9bff">Health Care</h1>
        <h3>Dr. {{$doctor->name}}</h3>
        <div style="float: right">
            <h5>Phone : +1800 326 3264 </h5>
            <h5>Mail : info@healthcare.com</h5>
        </div>
        <h5>143 Gordon Terrace Embarrassing</h5>
        <h5>NG33 0ZT United Kingdom </h5>
    </div>
    <h3 >Date:
    {{ Carbon::parse($illness["created_at"])->toFormattedDateString()}}</h3><br>
    <h3>Illness:</h3>
    <ul class="b">
        <li>{{ $illness['illnessName']}}</li>
    </ul><br><br>
    <h3>Diagnose:</h3>
    <ul>
        <li>{{ $illness['illnessDiagnose'] }}</li>
    </ul><br><br>
    @if(count($illness->drug) != 0)
        <h3>Drugs:</h3>
        @foreach($illness->drug as $drug)
            <ul><li>{{ $drug['drugName'] }}</li>
                <ul><li>{{ $drug['drugDescription'] }}</li></ul>
            </ul>
        @endforeach
        <br><br>
    @endif
    @if(count($illness->analysis)!=0)
        <h3>Analysis:</h3>
        @foreach($illness->analysis as $analysis)
            <ul><li>{{ $analysis['title'] }}</li>
                <ul><li>{{ $analysis['result'] }}</li></ul>
            </ul>
        @endforeach
        <br><br>
    @endif
    @if(count($illness->rumour)!=0)
        <h3>Rumour:</h3>
        @foreach($illness->rumour as $rumour)
            <ul><li>{{ $rumour['title'] }}</li>
                <ul><li>{{ $rumour['result'] }}</li></ul>
            </ul>
        @endforeach
    @endif
</body>
