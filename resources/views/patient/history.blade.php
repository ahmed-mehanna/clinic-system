@extends('components.newfile')
@section('content1')

                
                <h1>Your History</h1>
                <hr color="black" width="220px">
                <br>
                <h2>
                    From Your Previous Visits:
                </h2>
                <hr color="black" width="320px">
                <br>
                        @if(count($Ilness)>0)
                        <div>
    <div class="section">
        <div class="section-icon">
            <i class="fa fa-history">
                <span>Patient Clinic History</span>
            </i>
        </div>
        <div class="patient-clinic-history">
            @foreach($patientHistory as $history)
                <div class="data2">
                    <div class="row2">
                        <div class="col-lg-6">
                            <span class="title">Data:</span>
                            {{ $history['date'] }}
                        </div>
                        <div class="col-lg-6">
                            <span class="title">Illness:</span>
                            {{ $history['illness'] }}
                        </div>
                    </div>
                    <div class="row3">
                        <div class="col-lg-12">
                            <span class="title">Diagnose:</span>
                            <p class="illness-diagnose lead">
                                {{ $history['diagnose'] }}
                            </p>
                        </div>
                    </div>
                    <div class="drugs-container">
                        <span class="title">Drugs:</span>
                        <div class="drugs">
                            @foreach($history['drugs'] as $drug)
                                <div class="row">
                                    <div class="col-lg-2">
                                        {{ $drug['name'] }}
                                    </div>
                                    <div class="col-lg-10">
                                        <p class="lead">
                                            {{ $drug['description'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

                        @else
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1>Your History Is Empty</h1>
                                </div>
                            </div>
                        @endif
                       
               

          
   
@endsection



