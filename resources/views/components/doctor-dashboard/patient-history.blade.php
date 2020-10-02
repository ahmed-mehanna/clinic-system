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
                    @if($history->patientHistory->Summary != '')
                        <textarea readonly class="form-control" form="patient-form" name="summary" id="summary" cols='100' rows="60">{{$history->patientHistory->Summary}}</textarea>
                        <i class="btn fa fa-edit mt-1" id="edit-summary-button" onclick="editSummary()" style="margin-right: 0.25rem;"></i>
                    @else
                        <textarea class="form-control" form="patient-form" name="summary" id="summary" cols='100' rows="60">{{$history->patientHistory->Summary}}</textarea>
                        <i class="btn fa fa-edit mt-1 active" id="edit-summary-button" onclick="editSummary()" style="margin-right: 0.25rem;"></i>
                    @endif
                </div>
            </div>



            <div class="sub-container" id="analysises">
                <span class="title">Analysis</span>
                <script>
                    let numberOfAnalysis = [1];
                </script>
                <div class="row mt-2" id="analysis_x1">
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="analysis_name[]" form="patient-form" placeholder="Title">
{{--                        <small  class="form-text text-muted"><span style="color:red">@error("analysis_x1-name"){{$message}}@enderror</span></small>--}}
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="analysis_result[]" form="patient-form" placeholder="Result">
{{--                        <small  class="form-text text-muted"><span style="color:red">@error("analysis_x1-description"){{$message}}@enderror</span></small>--}}
                    </div>
                    <div class="col-lg-3" id="buttons-container1">
                        <i class="btn fa fa-plus" id="new-button" onclick="addAnalysis()"></i>
                        <i class="btn fa fa-trash" onclick="removeAnalysis(1)"></i>
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
            let id = numberOfAnalysis[numberOfAnalysis.length - 1] + 1;
            numberOfAnalysis.push(id);
            $('#new-button').remove();
            let newAnalysis = '<div class="row mt-2" id="analysis_x' + id + '">\n' +
                '                    <div class="col-lg-3">\n' +
                '                        <input type="text" class="form-control" name="analysis_name[]" form="patient-form" placeholder="Title">\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-6">\n' +
                '                        <input type="text" class="form-control" name="analysis_result[]" form="patient-form" placeholder="Result">\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-3" id="buttons-container' + id + '">\n' +
                '                        <i class="btn fa fa-plus" id="new-button" onclick="addAnalysis()"></i>\n' +
                '                        <i class="btn fa fa-trash" onclick="removeAnalysis(' + id + ')"></i>\n' +
                '                    </div>\n' +
                '                </div>'
            $('#analysises').append(newAnalysis)
        }
        function removeAnalysis(id) {
            if (numberOfAnalysis.length > 1) {
                if (id !== numberOfAnalysis[numberOfAnalysis.length - 1]) {
                    $('#analysis_x' + id).remove();
                    numberOfAnalysis.remove(id);
                }
                else {
                    $('#analysis_x' + id).remove();
                    numberOfAnalysis.remove(id);
                    $('<i class="btn fa fa-plus" id="new-button" onclick="addAnalysis()"></i>').prependTo('#buttons-container' + numberOfAnalysis[numberOfAnalysis.length - 1])

                }
            }
        }
    </script>




</div>


