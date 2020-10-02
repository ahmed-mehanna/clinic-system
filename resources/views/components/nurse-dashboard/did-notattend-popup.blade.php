<input type="hidden" value="$user">
<button class="mr-0" type="button" data-toggle="modal" data-target="#did-not-attend-pop-up">
    <i class="fa fa-times"></i>
</button>
<div class="modal fade" id="did-not-attend-pop-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attend</h5>
                <button form="" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Patient Has Not Attend
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{--                <form id="did-not-attend" action="/patient/notAttend/{{$id}}">--}}
                {{--                    @csrf--}}
                <button form="did-not-attend" name="attend" value="false" type="submit" class="btn btn-primary">Save changes</button>
                {{--                </form>--}}
            </div>
        </div>
    </div>
</div>
