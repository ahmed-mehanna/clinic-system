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
                    <textarea readonly class="form-control" form="patient-form" name="summary" id="summary" cols='100' rows="60">{{$history->patientHistory->summary}}</textarea>
                </div>
            </div>

            <div class="sub-container">
                <span class="title">Drugs</span>
                @if(count($history->Drug_Medical_History)!=0)
                    @for($i = 0; $i < count($history->Drug_Medical_History); $i++)
                        <div class="row mt-2" id="analysis_x1">
                            <div class="col-lg-3">
                                <input readonly type="text" class="form-control"  form="patient-form" placeholder="Title" value="{{$history->Drug_Medical_History[$i]["drugName"]}}">
                            </div>
                            <div class="col-lg-5 offset-lg-1">
                                <input readonly type="text" class="form-control"  form="patient-form" placeholder="Result" value="{{$history->Drug_Medical_History[$i]["drugDescription"]}}">
                            </div>
                        </div>
                    @endfor
                @else
                    <div class="drugs">
                        <div class="col-lg-12" style="margin-top:30px">
                            <span style="color: red">Drugs is empty</span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="sub-container">
                <span class="title">Analysis</span>
                @if(count($history->analysis_medical_history)!=0)
                    @for($i = 0; $i < count($history->analysis_medical_history); $i++)
                        <div class="row mt-2" id="analysis_x1">
                            <div class="col-lg-3">
                                <input readonly type="text" class="form-control"  form="patient-form" value="{{$history->analysis_medical_history[$i]["title"]}}">
                            </div>
                            <div class="col-lg-5 offset-lg-1">
                                <input readonly type="text" class="form-control"  form="patient-form" value="{{$history->analysis_medical_history[$i]["result"]}}">
                            </div>
                        </div>
                    @endfor
                @else
                    <div class="drugs">
                        <div class="col-lg-12" style="margin-top:30px">
                            <span style="color: red">Analysis is empty</span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="sub-container">
                <span class="title">Rumour</span>
                @if(count($history->rumour_medical_history)!=0)
                    @for($i = 0; $i < count($history->rumour_medical_history); $i++)
                        <div class="row mt-2" id="analysis_x1">
                            <div class="col-lg-3">
                                <input readonly type="text" class="form-control" form="patient-form" value="{{$history->rumour_medical_history[$i]["title"]}}">
                            </div>
                            <div class="col-lg-5 offset-lg-1">
                                <input readonly type="text" class="form-control" form="patient-form" value="{{$history->rumour_medical_history[$i]["result"]}}">
                            </div>
                        </div>
                    @endfor
                @else
                    <div class="drugs">
                        <div class="col-lg-12" style="margin-top:30px">
                            <span style="color: red">Rumour is empty</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
