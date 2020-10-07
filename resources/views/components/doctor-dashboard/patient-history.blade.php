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
                    @if($history->patientHistory->summary != '')
                        <textarea readonly class="form-control" form="patient-form" name="Summary" id="summary" cols='100' rows="60">{{$history->patientHistory->summary}}</textarea>
                        <i class="btn fa fa-edit mt-1" id="edit-summary-button" onclick="editSummary()" style="margin-right: 0.25rem;"></i>
                    @else
                        <textarea class="form-control" form="patient-form" name="Summary" id="summary" cols='100' rows="60">{{$history->patientHistory->summary}}</textarea>
                        <i class="btn fa fa-edit mt-1 active" id="edit-summary-button" onclick="editSummary()" style="margin-right: 0.25rem;"></i>
                    @endif
                </div>
            </div>
            @if(count($history->Drug_Medical_History)!=0)
                <div class="sub-container">
                    <span class="title">Drugs</span>
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
                </div>
            @endif
            @if(count($history->analysis_medical_history)!=0)
                <div class="sub-container">
                    <span class="title">Analysis</span>
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
                </div>
            @endif
            @if(count($history->rumour_medical_history)!=0)
                <div class="sub-container">
                    <span class="title">Rumour</span>
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
                </div>
            @endif
            <div class="sub-container" id="analysises">
                <span class="title">Medical Data</span>
                <script>
                    let numberOfAnalysis = [1];
                </script>
                <div class="row mt-2" id="box1">
                    <div class="col-lg-2">
                        <select form="patient-form" class="form-control" name="select-type2[]">
                            <option>Drugs</option>
                            <option>Analysis</option>
                            <option>Rumours</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <input id="title-1" type="text" class="form-control" name="medicalData_Title[]" form="patient-form" placeholder="Title">
                    </div>
                    <div class="col-lg-4">
                        <input id="result-1" type="text" class="form-control" name="medicalData_Result[]" form="patient-form" placeholder="Result">
                    </div>
                    <div class="col-lg-3" id="buttons-container-1">
                        <i class="btn fa fa-plus" id="new-button" onclick="addAnalysis()"></i>
                        <i class="btn fa fa-trash" id="remove-button-1" onclick="removeAnalysis(1)"></i>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script>
        Array.prototype.remove = function() {
            let what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };
        function addAnalysis() {
            if ($('#title-' + numberOfAnalysis[numberOfAnalysis.length - 1]).val() === ''
                && $('#result-' + numberOfAnalysis[numberOfAnalysis.length - 1]).val() === '' )
                return null;
            let id = numberOfAnalysis[numberOfAnalysis.length - 1] + 1;
            numberOfAnalysis.push(id);
            $('#new-button').remove();
            let newAnalysis = '<div class="row mt-2" id="box' + id + '">\n' +
                '<div class="col-lg-2">\n' +
                '                        <select id="select-' + id + '" form="patient-form" class="form-control" name="select-type2[]">\n' +
                '                            <option>Drugs</option>\n' +
                '                            <option>Analysis</option>\n' +
                '                            <option>Rumours</option>\n' +
                '                        </select>\n' +
                '                    </div>' +
                '                    <div class="col-lg-3">\n' +
                '                        <input id="title-'+id+'" type="text" class="form-control" name="medicalData_Title[]" form="patient-form" placeholder="Title">\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-4">\n' +
                '                        <input id="result-'+id+'" type="text" class="form-control" name="medicalData_Result[]" form="patient-form" placeholder="Result">\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-3" id="buttons-container-' + id + '">\n' +
                '                        <i class="btn fa fa-plus" id="new-button" onclick="addAnalysis()"></i>\n' +
                '                        <i class="btn fa fa-trash" id="remove-button-'+id+'" onclick="removeAnalysis(' + id + ')"></i>\n' +
                '                    </div>\n' +
                '                </div>'
            $('#analysises').append(newAnalysis)
        }
        function removeAnalysis(id) {
            if (numberOfAnalysis.length > 1) {
                if (id !== numberOfAnalysis[numberOfAnalysis.length - 1]) {
                    console.log($('#box' + id))
                    $('#box' + id).remove();
                    numberOfAnalysis.remove(id);
                }
                else {
                    $('#box' + id).remove();
                    numberOfAnalysis.remove(id);
                    $('<i class="btn fa fa-plus" id="new-button" onclick="addAnalysis()"></i>').prependTo('#buttons-container-' + numberOfAnalysis[numberOfAnalysis.length - 1])
                }
            }
        }
        function editSummary() {
            $('#summary').attr("readonly", false);
            $('#edit-summary-button').css('color', '#2a9055');
        }
    </script>
</div>


