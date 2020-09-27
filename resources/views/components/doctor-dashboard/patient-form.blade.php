<div>
    <div class="section">
        <div class="section-icon">
            <i class="fa fa-user">
                <span>Illness Form</span>
            </i>
        </div>
        <div class="patient-form">
            <div class="form-group row">
                <label for="illness" class="col-sm-2 col-form-label">Illness</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-25" id="illness" name="illness-name" form="patient-form" placeholder="Illness">
                    <small  class="form-text text-muted"><span style="color:red">@error("illness-name"){{$message}}@enderror</span></small>
                </div>
            </div>
            <div class="form-group">
                <label for="illness-diagnose">Illness Diagnose</label>
                <textarea class="form-control w-50" id="illness-diagnose" name="illness-diagnose" form="patient-form" rows="3"></textarea>
                <small  class="form-text text-muted"><span style="color:red">@error("illness-diagnose"){{$message}}@enderror</span></small>
            </div>
            <div class="drugs" id="drugs">
                <span class="title">Drugs</span>
                <script>
                    let numberOfDrugs = [1];
                </script>
                <div class="row mt-2" id="drug1">
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="drugname[]" form="patient-form" placeholder="Drug Name">
                        <small  class="form-text text-muted"><span style="color:red">@error("drug1-name"){{$message}}@enderror</span></small>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="drugdescription[]" form="patient-form" placeholder="Drug Description">
                        <small  class="form-text text-muted"><span style="color:red">@error("drug1-description"){{$message}}@enderror</span></small>
                    </div>
                    <div class="col-lg-3" id="buttons-container1">
                        <i class="btn fa fa-plus" id="new-button" onclick="addDrug()"></i>
                        <i class="btn fa fa-trash" onclick="removeDrug(1)"></i>
                    </div>
                </div>
            </div>
            <button type="submit" form="patient-form" class="btn btn-primary mt-5">Save</button>
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
            $('#new-button').remove();
            let newDrug = '<div class="row mt-2" id="drug' + id + '">\n' +
                '                    <div class="col-lg-3">\n' +
                '                        <input type="text" class="form-control" name="drugname[]" form="patient-form" placeholder="Drug Name">\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-6">\n' +
                '                        <input type="text" class="form-control" name="drugdescription[]" form="patient-form" placeholder="Drug Description">\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-3" id="buttons-container' + id + '">\n' +
                '                        <i class="btn fa fa-plus" id="new-button" onclick="addDrug()"></i>\n' +
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
