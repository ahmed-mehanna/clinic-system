<?php
use Carbon\Carbon;
?>
<div>
    <div class="section">
        <div class="section-icon">
            <i class="fa fa-history">
                <span>Patient Clinic History</span>
            </i>
        </div>
        <div class="patient-clinic-history">
{{--            patientHistory=user--}}
            @if(count($patientHistory->illness)>0)
            @foreach($patientHistory->illness as $illness)
                <div class="data">
                    <div class="row">
                        <div class="col-lg-6">
                            <span class="title">Data:</span>
                            {{ Carbon::parse($illness["created_at"])->toFormattedDateString()}}
                        </div>
                        <div class="col-lg-6">
                            <span class="title">Illness:</span>
                            {{ $illness['illnessName'] }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="title">Diagnose:</span>
                            <p class="illness-diagnose lead">
                                {{ $illness['illnessDiagnose'] }}
                            </p>
                        </div>
                    </div>
                    <div class="drugs-container">
                        <span class="title">Drugs:</span>
                        <div class="drugs">
                            @if(count($illness->drug)!=0)
                            @foreach($illness->drug as $drug)
                                <div class="row">
                                    <div class="col-lg-2">
                                        {{ $drug['drugName'] }}
                                    </div>
                                    <div class="col-lg-10">
                                        <p class="lead">
                                            {{ $drug['drugDescription'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span style="color: red">Drugs is empty</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="drugs-container">
                        <span class="title">Analysis:</span>
                        <div class="drugs">
                            @if(count($illness->analysis)!=0)
                            @foreach($illness->analysis as $analysis)
                                <div class="row">
                                    <div class="col-lg-2">
                                        {{ $analysis['title'] }}
                                    </div>
                                    <div class="col-lg-10">
                                        <p class="lead">
                                            {{ $analysis['result'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span style="color: red">Analysis is empty</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="drugs-container">
                        <span class="title">Rumour:</span>
                        <div class="drugs">
                            @if(count($illness->rumour)!=0)
                            @foreach($illness->rumour as $rumour)
                                <div class="row">
                                    <div class="col-lg-2">
                                        {{ $rumour['title'] }}
                                    </div>
                                    <div class="col-lg-10">
                                        <p class="lead">
                                            {{ $rumour['result']}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span style="color: red">Rumour is empty</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <div class="col-lg-12">
                    <span class="title"><h1> No history </h1></span>
                </div>
            @endif
        </div>
    </div>
</div>
