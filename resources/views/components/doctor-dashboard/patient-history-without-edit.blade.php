<div>
    <div class="section">
        <div class="section-icon">
            <i class="fa fa-history">
                <span>Medical History</span>
            </i>
        </div>
        <div class="medical-history">
            <div class="sub-container">
                <div class="form-group data-container border-left-0">
                    <label for="summary">Summary</label>
                    <textarea readonly class="form-control" form="patient-form" name="summary" id="summary" cols='100' rows="60">{{$history['summary']}}</textarea>
                </div>
            </div>

            @for($i = 0; $i < count($history->drugs); $i++)
                <div class="sub-container">
                    <span class="title">Drugs</span>
                    <div class="row mt-2" id="analysis_x1">
                        <div class="col-lg-3">
                            <input readonly type="text" class="form-control" name="medicalData_Title[]" form="patient-form" placeholder="Title">
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <input readonly type="text" class="form-control" name="medicalData_Result[]" form="patient-form" placeholder="Result">
                        </div>
                    </div>
                </div>
            @endfor
            @for($i = 0; $i < count($history->drugs); $i++)
                <div class="sub-container">
                    <span class="title">Analysis</span>
                    <div class="row mt-2" id="analysis_x1">
                        <div class="col-lg-3">
                            <input readonly type="text" class="form-control" name="medicalData_Title[]" form="patient-form" placeholder="Title">
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <input readonly type="text" class="form-control" name="medicalData_Result[]" form="patient-form" placeholder="Result">
                        </div>
                    </div>
                </div>
            @endfor
            @for($i = 0; $i < count($history->drugs); $i++)
                <div class="sub-container">
                    <span class="title">Rumour</span>
                    <div class="row mt-2" id="analysis_x1">
                        <div class="col-lg-3">
                            <input readonly type="text" class="form-control" name="medicalData_Title[]" form="patient-form" placeholder="Title">
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <input readonly type="text" class="form-control" name="medicalData_Result[]" form="patient-form" placeholder="Result">
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
