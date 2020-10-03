<div>
    <div class="section">
        <div class="section-icon">
            <i class="fa fa-user">
                <span>Illness Form</span>
            </i>
        </div>

        <div class="patient-form">
            <div class="form-group sub-container row">
                <label for="illness" class="col-sm-2 col-form-label">Illness</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-25" id="illness" name="illness-name" form="patient-form" placeholder="Illness">
                    <small  class="form-text text-muted"><span style="color:red">@error("illness-name"){{$message}}@enderror</span></small>
                </div>
            </div>
            <div class="form-group sub-container">
                <label for="illness-diagnose">Illness Diagnose</label>
                <textarea class="form-control w-50" id="illness-diagnose" name="illness-diagnose" form="patient-form" rows="3"></textarea>
                <small  class="form-text text-muted"><span style="color:red">@error("illness-diagnose"){{$message}}@enderror</span></small>
            </div>
            <div class="sub-container" id="drugs">
                <span class="title">Medical Data</span>
                <script>
                    let numberOfDrugs = [1];
                </script>
                <div class="row mt-2" id="drug1">
                    <div class="col-lg-2">
                        <select form="patient-form" class="form-control" name="select_type[]">
                            <option>Drugs</option>
                            <option>Analysis</option>
                            <option>Rumours</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="name[]" form="patient-form" placeholder="Name">
                        <small  class="form-text text-muted"><span style="color:red">
                                @if($errors->any())
                                    {{ implode('', $errors->all('<div>:message</div>')) }}
                                @endif</span></small>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="description[]" form="patient-form" placeholder="Description">
                        <small  class="form-text text-muted"><span style="color:red">@error("description"){{$message}}@enderror</span></small>
                    </div>
                    <div class="col-lg-3" id="buttons-container1">
                        <i class="btn fa fa-plus" id="new-button-patient-form" onclick="addDrug()"></i>
                        <i class="btn fa fa-trash" onclick="removeDrug(1)"></i>
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
        function addDrug() {
            let id = numberOfDrugs[numberOfDrugs.length - 1] + 1;
            numberOfDrugs.push(id);
            $('#new-button-patient-form').remove()
            let newDrug = '<div class="row mt-2" id="drug' + id + '">\n' +
                '<div class="col-lg-2">\n' +
                '                        <select form="patient-form" class="form-control" name="select_type[]">\n' +
                '                            <option>Drugs</option>\n' +
                '                            <option>Analysis</option>\n' +
                '                            <option>Rumours</option>\n' +
                '                        </select>\n' +
                '                    </div>'+
                '                    <div class="col-lg-3">\n' +
                '                        <input type="text" class="form-control" name="name[]" form="patient-form" placeholder="Name">\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-4">\n' +
                '                        <input type="text" class="form-control" name="description[]" form="patient-form" placeholder="Description">\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-3" id="buttons-container' + id + '">\n' +
                '                        <i class="btn fa fa-plus" id="new-button-patient-form" onclick="addDrug()"></i>\n' +
                '                        <i class="btn fa fa-trash" onclick="removeDrug(' + id + ')"></i>\n' +
                '                    </div>\n' +
                '                </div>'
            $('#drugs').append(newDrug)
        }
        function removeDrug(id) {
            if (numberOfDrugs.length > 1) {
                if (id !== numberOfDrugs[numberOfDrugs.length - 1]) {
                    $('#drug' + id).remove();
                    numberOfDrugs.remove(id);
                }
                else {
                    $('#drug' + id).remove();
                    numberOfDrugs.remove(id);
                    $('<i class="btn fa fa-plus" id="new-button" onclick="addDrug()"></i>').prependTo('#buttons-container' + numberOfDrugs[numberOfDrugs.length - 1])

                }
            }
        }
    </script>
</div>
