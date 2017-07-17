<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body text-center">
                <h3>Are you sure you want to delete {{$user->fullname}}?</h3>
                <div>

                    <form action="{{URL::asset('')}}/admin/remove-user-{{$user->id}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-actions no-color">
                            <input type="submit" value="Delete" class="btn btn-danger"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>