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
                    @if($history['summary'] != '')
                        <textarea readonly class="form-control" form="patient-form" name="summary" id="summary" cols='100' rows="60">{{$history['summary']}}</textarea>
                        <i class="btn fa fa-edit mt-1" id="edit-summary-button" onclick="editSummary()" style="margin-right: 0.25rem;"></i>
                    @else
                        <textarea class="form-control" form="patient-form" name="summary" id="summary" cols='100' rows="60">{{$history['summary']}}</textarea>
                        <i class="btn fa fa-edit mt-1 active" id="edit-summary-button" onclick="editSummary()" style="margin-right: 0.25rem;"></i>
                    @endif
                </div>
                <div class="form-group data-container analysis-section" id="analysis-section">
                    <div class="row responsive">
                        <div class="col-lg-5">
                            <label>Analysis</label>
                        </div>
                        <div class="col-lg-6">
                            <label>Result</label>
                        </div>
                    </div>
                    <script>
                        let numberOfAnalysis = [];
                    </script>
                    @if(count($history['analysis']) < 1)
                        <script>
                            numberOfAnalysis.push(1);
                        </script>
                        <div class="row responsive" id="analysis-lg-screen1">
                            <div class="col-lg-5" id="analysis-title-lg-screen1">
                                <input class="form-control d-inline-block" form="patient-form" name="analysis-name1" placeholder="Analysis Name"/>
                                <i class="btn fa fa-plus" id="new-analysis-lg-screen1" onclick="addAnalysis()"></i>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control d-inline-block" form="patient-form" name="analysis-result1" placeholder="Analysis Result"/>
                                <i class="btn fa fa-edit active" id="edit-analysis-lg-screen1" onclick="editAnalysis(1)" style="margin-right: 0.25rem;"></i>
                                <i class="btn fa fa-trash" id="delete-analysis-lg-screen1" onclick="removeAnalysis(1)"></i>
                            </div>
                        </div>
                        <div class="mobile-responsive" id="analysis-sm-screen1">
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Analysis</span>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control d-inline-block" form="patient-form" name="analysis-name1" id="name1" placeholder="Analysis Name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Result</span>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control d-inline-block" form="patient-form" name="analysis-result1" id="result1" placeholder="Analysis Result"/>
                                </div>
                            </div>
                            <div class="operations" id="analysis-buttons-sm-screen1">
                                <i class="btn fa fa-plus" id="new-analysis-sm-screen1" onclick="addAnalysis()"></i>
                                <i class="btn fa fa-edit active" id="edit-analysis-sm-screen1" onclick="editAnalysis(1)" style="margin-right: 0.25rem;"></i>
                                <i class="btn fa fa-trash" id="delete-analysis-sm-screen1" onclick="removeAnalysis(1)"></i>
                            </div>
                        </div>
                    @endif
                    @for($i = 0; $i < count($history['analysis']); $i++)
                        <script>
                            numberOfAnalysis.push(numberOfAnalysis.length + 1);
                        </script>
                        <div class="row responsive" id="analysis-lg-screen{{ $i + 1 }}">
                            <div class="col-lg-5" id="{{ 'analysis-title-lg-screen'.($i + 1) }}">
                                <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'analysis-name-lg-screen'.($i + 1) }}" value="{{$history['analysis'][$i]['title']}}"/>
                            @if($i == count($history['analysis']) - 1)
                                <i class="btn fa fa-plus" id="{{ 'new-analysis-lg-screen'.($i + 1) }}" onclick="addAnalysis()"></i>
                            @endif
                            </div>
                            <div class="col-lg-6">
                                <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'analysis-result-lg-screen'.($i + 1) }}" value="{{$history['analysis'][$i]['result']}}"/>
                                <i class="btn fa fa-edit" id="{{ 'edit-analysis-lg-screen'.($i + 1) }}" onclick="editAnalysis({{ $i + 1 }})" style="margin-right: 0.25rem;"></i>
                                <i class="btn fa fa-trash" id="{{ 'delete-analysis-lg-screen'.($i + 1) }}" onclick="removeAnalysis({{ $i + 1 }})"></i>
                            </div>
                        </div>
                        <div class="mobile-responsive" id="analysis-sm-screen{{ $i + 1 }}">
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Analysis</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'analysis-name-sm-screen'.($i + 1) }}" value="{{$history['analysis'][$i]['title']}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Result</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'analysis-result-sm-screen'.($i + 1) }}" value="{{$history['analysis'][$i]['result']}}"/>
                                </div>
                            </div>
                            <div class="operations" id="{{ 'analysis-buttons-sm-screen'.($i + 1) }}">
                                @if($i == count($history['analysis']) - 1)
                                    <i class="btn fa fa-plus" id="{{ 'new-analysis-sm-screen'.($i + 1) }}" onclick="addAnalysis()"></i>
                                @endif
                                <i class="btn fa fa-edit" id="{{ 'edit-analysis-sm-screen'.($i + 1) }}" onclick="editAnalysis({{ $i + 1 }})" style="margin-right: 0.25rem;"></i>
                                <i class="btn fa fa-trash" id="{{ 'delete-analysis-sm-screen'.($i + 1) }}" onclick="removeAnalysis({{ $i + 1 }})"></i>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="form-group data-container analysis-section" id="rumours-section">
                    <div class="row responsive">
                        <div class="col-lg-5">
                            <label>Rumours</label>
                        </div>
                        <div class="col-lg-6">
                            <label>Result</label>
                        </div>
                    </div>
                    <script>
                        let numberOfRumours = [];
                    </script>
                    @if(count($history['rumours']) < 1)
                        <script>
                            numberOfRumours.push(1);
                        </script>
                        <div class="row responsive" id="rumours-lg-screen1">
                            <div class="col-lg-5" id="rumours-title-lg-screen1">
                                <input class="form-control d-inline-block" form="patient-form" name="rumours-name1" placeholder="Rumours Name"/>
                                <i class="btn fa fa-plus" id="new-analysis-lg-screen1" onclick="addRumours()"></i>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control d-inline-block" form="patient-form" name="rumours-result1" placeholder="Rumours Result"/>
                                <i class="btn fa fa-edit active" id="edit-rumours-lg-screen1" onclick="editRumours(1)" style="margin-right: 0.25rem;"></i>
                                <i class="btn fa fa-trash" id="delete-rumours-lg-screen1" onclick="removeRumours(1)"></i>
                            </div>
                        </div>
                        <div class="mobile-responsive" id="rumours-sm-screen1">
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Rumours</span>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control d-inline-block" form="patient-form" name="rumours-name1" id="name1" placeholder="Rumours Name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Result</span>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control d-inline-block" form="patient-form" name="rumours-result1" id="result1" placeholder="Rumours Result"/>
                                </div>
                            </div>
                            <div class="operations" id="analysis-buttons-sm-screen1">
                                <i class="btn fa fa-plus" id="new-rumours-sm-screen1" onclick="addRumours()"></i>
                                <i class="btn fa fa-edit active" id="edit-rumours-sm-screen1" onclick="editRumours(1)" style="margin-right: 0.25rem;"></i>
                                <i class="btn fa fa-trash" id="delete-rumours-sm-screen1" onclick="removeRumours(1)"></i>
                            </div>
                        </div>
                    @endif
                    @for($i = 0; $i < count($history['rumours']); $i++)
                        <script>
                            numberOfRumours.push(numberOfRumours.length + 1);
                        </script>
                        <div class="row responsive" id="rumours-lg-screen{{ $i + 1 }}">
                            <div class="col-lg-5" id="{{ 'rumours-title-lg-screen'.($i + 1) }}">
                                <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'rumours-name-lg-screen'.($i + 1) }}" value="{{$history['rumours'][$i]['title']}}"/>
                                @if($i == count($history['rumours']) - 1)
                                    <i class="btn fa fa-plus" id="{{ 'new-rumours-lg-screen'.($i + 1) }}" onclick="addRumours()"></i>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'rumours-result-lg-screen'.($i + 1) }}" value="{{$history['rumours'][$i]['result']}}"/>
                                <i class="btn fa fa-edit" id="{{ 'edit-rumours-lg-screen'.($i + 1) }}" onclick="editRumours({{ $i + 1 }})" style="margin-right: 0.25rem;"></i>
                                <i class="btn fa fa-trash" id="{{ 'delete-rumours-lg-screen'.($i + 1) }}" onclick="removeRumours({{ $i + 1 }})"></i>
                            </div>
                        </div>
                        <div class="mobile-responsive" id="rumours-sm-screen{{ $i + 1 }}">
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Rumours</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'rumours-name-sm-screen'.($i + 1) }}" value="{{$history['rumours'][$i]['title']}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Result</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'rumours-result-sm-screen'.($i + 1) }}" value="{{$history['rumours'][$i]['result']}}"/>
                                </div>
                            </div>
                            <div class="operations" id="{{ 'rumours-buttons-sm-screen'.($i + 1) }}">
                                @if($i == count($history['rumours']) - 1)
                                    <i class="btn fa fa-plus" id="{{ 'new-rumours-sm-screen'.($i + 1) }}" onclick="addRumours()"></i>
                                @endif
                                <i class="btn fa fa-edit" id="{{ 'edit-rumours-sm-screen'.($i + 1) }}" onclick="editRumours({{ $i + 1 }})" style="margin-right: 0.25rem;"></i>
                                <i class="btn fa fa-trash" id="{{ 'delete-rumours-sm-screen'.($i + 1) }}" onclick="removeRumours({{ $i + 1 }})"></i>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <script>
        if ($(window).width() > 991) {
            for (let i = 0; i < numberOfAnalysis.length; i++) {
                $('#analysis-name-lg-screen' + numberOfAnalysis[i]).attr('name', 'analysis-name' + numberOfAnalysis[i]);
                $('#analysis-result-lg-screen' + numberOfAnalysis[i]).attr('name', 'analysis-result' + numberOfAnalysis[i]);
            }
            for (let i = 0; i < numberOfRumours.length; i++) {
                $('#rumours-name-lg-screen' + numberOfRumours[i]).attr('name', 'rumours-name' + numberOfRumours[i]);
                $('#rumours-result-lg-screen' + numberOfRumours[i]).attr('name', 'rumours-result' + numberOfRumours[i]);
            }
        }
        else {
            for (let i = 0; i < numberOfAnalysis.length; i++) {
                $('#analysis-name-sm-screen' + numberOfAnalysis[i]).attr('name', 'analysis-name' + numberOfAnalysis[i]);
                $('#analysis-result-sm-screen' + numberOfAnalysis[i]).attr('name', 'analysis-result' + numberOfAnalysis[i]);
            }
            for (let i = 0; i < numberOfRumours.length; i++) {
                $('#rumours-name-sm-screen' + numberOfRumours[i]).attr('name', 'rumours-name' + numberOfRumours[i]);
                $('#rumours-result-sm-screen' + numberOfRumours[i]).attr('name', 'rumours-result' + numberOfRumours[i]);
            }
        }
        function editSummary() {
            $('#summary').attr("readonly", false);
            $('#edit-summary-button').css('color', '#2a9055');
        }
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
        function removeAnalysis(id) {
            if (numberOfAnalysis.length > 1) {
                if (id !== numberOfAnalysis[numberOfAnalysis.length - 1]) {
                    $('#analysis-lg-screen' + id).remove();
                    $('#analysis-sm-screen' + id).remove();
                    numberOfAnalysis.remove(id);
                }
                else {
                    $('#analysis-lg-screen' + id).remove();
                    $('#analysis-sm-screen' + id).remove();
                    numberOfAnalysis.remove(id);
                    $('#analysis-title-lg-screen'+numberOfAnalysis[numberOfAnalysis.length - 1])
                        .append('<i class="btn fa fa-plus added-icon" id="new-analysis-lg-screen'
                            + numberOfAnalysis[numberOfAnalysis.length - 1] + '" onclick=addAnalysis()></i>');
                    $('<i class="btn fa fa-plus added-icon" id="new-analysis-sm-screen'
                        + numberOfAnalysis[numberOfAnalysis.length - 1] + '" onclick=addAnalysis()></i>').prependTo('#analysis-buttons-sm-screen'+numberOfAnalysis[numberOfAnalysis.length - 1]);
                }
            }
        }
        function editAnalysis(id) {
            $('#analysis-name-lg-screen' + id).attr("readonly", false);
            $("#analysis-result-lg-screen"+id).attr("readonly", false);
            $("#edit-analysis-lg-screen"+id).css('color', '#2a9055');
            $('#analysis-name-sm-screen' + id).attr("readonly", false);
            $("#analysis-result-sm-screen"+id).attr("readonly", false);
            $("#edit-analysis-sm-screen"+id).css('color', '#2a9055');
        }
        function addAnalysis() {
            let id = numberOfAnalysis[numberOfAnalysis.length - 1] + 1;

            let newAnalysis = '<div class="row responsive" id="analysis-lg-screen' + id + '">';
            newAnalysis += '<div class="col-sm-5" id="analysis-title-lg-screen' + id + '">';
            newAnalysis += '<input class="form-control d-inline-block" form="patient-form" id="analysis-name-lg-screen' + id + '" placeholder="Analysis Name"/>';
            newAnalysis += '<i class="btn fa fa-plus added-icon" id="new-analysis-lg-screen' + id + '" onclick="addAnalysis()"></i></div>';
            newAnalysis += '<div class="col-sm-6">';
            newAnalysis += '<input class="form-control d-inline-block" form="patient-form" id="analysis-result-lg-screen' + id + '" placeholder="Analysis Result"/>';
            newAnalysis += '<i class="btn fa fa-edit added-icon active" onclick="editAnalysis(' + id + ')" style="margin-right: 10px;"></i>';
            newAnalysis += '<i class="btn fa fa-trash" id="delete-analysis-lg-screen' + id + '" onclick="removeAnalysis(' + id + ')"></i></div></div>';

            newAnalysis += '<div class="mobile-responsive" id="analysis-sm-screen' + id +'">';
            newAnalysis += '<div class="row">';
            newAnalysis += '<div class="col-sm-2">';
            newAnalysis += '<span>Analysis</span></div>';
            newAnalysis += '<div class="col-sm-10">';
            newAnalysis += '<input class="form-control d-inline-block" form="patient-form" id="analysis-name-sm-screen' +  id + '" placeholder="Analysis Name"/></div></div>';
            newAnalysis += '<div class="row">';
            newAnalysis += '<div class="col-sm-2">';
            newAnalysis += '<span>Result</span></div>';
            newAnalysis += '<div class="col-sm-10">';
            newAnalysis += '<input class="form-control d-inline-block" form="patient-form" id="analysis-result-sm-screen' + id + '" placeholder="Analysis Result"/></div></div>';
            newAnalysis += '<div class="operations" id="analysis-buttons-sm-screen' + id +'">';
            newAnalysis += '<i class="btn fa fa-plus added-icon" id="new-analysis-sm-screen' + id + '" onclick="addAnalysis()"></i>';
            newAnalysis += '<i class="btn fa fa-edit added-icon active" onclick="editAnalysis(' + id + ')"  style="margin-right: 0.25rem;"></i>';
            newAnalysis += '<i class="btn fa fa-trash" id="delete-analysis-sm-screen' + id + '" onclick="removeAnalysis(' + id + ')"></i></div></div>';

            $('#analysis-section').append(newAnalysis);
            if ($(window).width() > 991) {
                $('#analysis-name-lg-screen' + id).attr('name', 'analysis-name' + id);
                $('#analysis-result-lg-screen' + id).attr('name', 'analysis-result' + id);
            }
            else {
                $('#analysis-name-sm-screen' + id).attr('name', 'analysis-name' + id);
                $('#analysis-result-sm-screen' + id).attr('name', 'analysis-result' + id);
            }

            $('#new-analysis-lg-screen'+numberOfAnalysis[numberOfAnalysis.length - 1]).remove()
            $('#new-analysis-sm-screen'+numberOfAnalysis[numberOfAnalysis.length - 1]).remove()
            numberOfAnalysis.push(id);
        }
        function removeRumours(id) {
            if (numberOfRumours.length > 1) {
                if (id !== numberOfRumours[numberOfRumours.length - 1]) {
                    $('#rumours-lg-screen' + id).remove();
                    $('#rumours-sm-screen' + id).remove();
                    numberOfRumours.remove(id);
                }
                else {
                    $('#rumours-lg-screen' + id).remove();
                    $('#rumours-sm-screen' + id).remove();
                    numberOfAnalysis.remove(id);
                    $('#rumours-title-lg-screen'+numberOfRumours[numberOfRumours.length - 1])
                        .append('<i class="btn fa fa-plus added-icon" id="new-analysis-lg-screen'
                            + numberOfRumours[numberOfRumours.length - 1] + '" onclick=addAnalysis()></i>');
                    $('<i class="btn fa fa-plus added-icon" id="new-analysis-sm-screen'
                        + numberOfRumours[numberOfRumours.length - 1] + '" onclick=addAnalysis()></i>').prependTo('#rumours-buttons-sm-screen'+numberOfAnalysis[numberOfAnalysis.length - 1]);
                }
            }
        }
        function editRumours(id) {
            $('#rumours-name-lg-screen' + id).attr("readonly", false);
            $("#rumours-result-lg-screen"+id).attr("readonly", false);
            $("#edit-rumours-lg-screen"+id).css('color', '#2a9055');
            $('#rumours-name-sm-screen' + id).attr("readonly", false);
            $("#rumours-result-sm-screen"+id).attr("readonly", false);
            $("#edit-rumours-sm-screen"+id).css('color', '#2a9055');
        }
        function addRumours() {
            let id = numberOfRumours[numberOfRumours.length - 1] + 1;

            let newAnalysis = '<div class="row responsive" id="rumours-lg-screen' + id + '">';
            newAnalysis += '<div class="col-sm-5" id="rumours-title-lg-screen' + id + '">';
            newAnalysis += '<input class="form-control d-inline-block" form="patient-form" id="rumours-name-lg-screen' + id + '" placeholder="Rumours Name"/>';
            newAnalysis += '<i class="btn fa fa-plus added-icon" id="new-rumours-lg-screen' + id + '" onclick="addRumours()"></i></div>';
            newAnalysis += '<div class="col-sm-6">';
            newAnalysis += '<input class="form-control d-inline-block" form="patient-form" id="rumours-result-lg-screen' + id + '" placeholder="Rumours Result"/>';
            newAnalysis += '<i class="btn fa fa-edit added-icon active" onclick="editRumours(' + id + ')" style="margin-right: 10px;"></i>';
            newAnalysis += '<i class="btn fa fa-trash" id="delete-rumours-lg-screen' + id + '" onclick="removeRumours(' + id + ')"></i></div></div>';

            newAnalysis += '<div class="mobile-responsive" id="rumours-sm-screen' + id +'">';
            newAnalysis += '<div class="row">';
            newAnalysis += '<div class="col-sm-2">';
            newAnalysis += '<span>Rumours</span></div>';
            newAnalysis += '<div class="col-sm-10">';
            newAnalysis += '<input class="form-control d-inline-block" form="patient-form" id="rumours-name-sm-screen' +  id + '" placeholder="Rumours Name"/></div></div>';
            newAnalysis += '<div class="row">';
            newAnalysis += '<div class="col-sm-2">';
            newAnalysis += '<span>Result</span></div>';
            newAnalysis += '<div class="col-sm-10">';
            newAnalysis += '<input class="form-control d-inline-block" form="patient-form" id="rumours-result-sm-screen' + id + '" placeholder="Rumours Result"/></div></div>';
            newAnalysis += '<div class="operations" id="rumours-buttons-sm-screen' + id +'">';
            newAnalysis += '<i class="btn fa fa-plus added-icon" id="new-rumours-sm-screen' + id + '" onclick="addRumours()"></i>';
            newAnalysis += '<i class="btn fa fa-edit added-icon active" onclick="editRumours(' + id + ')"  style="margin-right: 0.25rem;"></i>';
            newAnalysis += '<i class="btn fa fa-trash" id="delete-rumours-sm-screen' + id + '" onclick="removeRumours(' + id + ')"></i></div></div>';

            $('#rumours-section').append(newAnalysis);
            if ($(window).width() > 991) {
                $('#rumours-name-lg-screen' + id).attr('name', 'rumours-name' + id);
                $('#rumours-result-lg-screen' + id).attr('name', 'rumours-result' + id);
            }
            else {
                $('#rumours-name-sm-screen' + id).attr('name', 'rumours-name' + id);
                $('#rumours-result-sm-screen' + id).attr('name', 'rumours-result' + id);
            }

            $('#new-rumours-lg-screen'+numberOfRumours[numberOfRumours.length - 1]).remove()
            $('#new-rumours-sm-screen'+numberOfRumours[numberOfRumours.length - 1]).remove()
            numberOfRumours.push(id);
        }
    </script>
</div>
