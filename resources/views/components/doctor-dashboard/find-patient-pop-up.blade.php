<div class="modal fade" id="find-patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Find Patient</h5>
                <button form="" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/search/patient" method="get">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Patient ID / Patient Email / Patient Mobile</label>
                        <input type="text" class="form-control" name="data" placeholder="Enter One Of Them To Find Patient">
                    </div>
                    @if($errors->has('checkInvaliedPatient'))
                        <div class="fp w-100 mt-3"><strong style="color:red">{{ $errors->first('checkInvaliedPatient') }}</strong></div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Find Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>
