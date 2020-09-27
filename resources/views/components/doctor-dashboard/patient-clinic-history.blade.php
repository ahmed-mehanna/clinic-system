<div>
    <div class="section">
        <div class="section-icon">
            <i class="fa fa-history">
                <span>Patient Clinic History</span>
            </i>
        </div>
        <div class="patient-clinic-history">
            @foreach($patientHistory as $history)
                <div class="data">
                    <div class="row">
                        <div class="col-lg-6">
                            <span class="title">Data:</span>
                            {{ $history['date'] }}
                        </div>
                        <div class="col-lg-6">
                            <span class="title">Illness:</span>
                            {{ $history['illness'] }}
                        </div>
                    </div>
                    <div class="row">
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
