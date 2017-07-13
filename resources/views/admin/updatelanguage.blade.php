<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body text-center">
                <h3>Update language</h3>
                <div>

                    <form action="{{URL::asset('')}}/admin/edit-language-{{$lang->id}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Language name</label>
                            <input class="form-control" type="text" name="language" placeholder="language" value="{{$lang->language}}" required/>
                        </div>
                        <div class="form-actions no-color">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type="submit" value="Update" class="btn btn-success"/>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>