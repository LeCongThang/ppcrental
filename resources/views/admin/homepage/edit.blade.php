<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header modal-custom">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit position</h4>
            </div>
            <form action="{{URL::asset('')}}admin/edit-position-{{$district->id}}" method="post"
                  class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="control-label col-lg-2">District:</label>
                        <div class="col-lg-10">
                            <select name="district" id="district" class="form-control selectpicker"
                                    data-live-search="true"
                                    title="--Choose--"
                                    onchange="loaddistrict();" required>
                                @foreach($province as $item)
                                    <option value="{{$item->id}}"
                                            @if($item->id==$district->id) selected @endif
                                    >{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Name(en):</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" id="name_en" name="name_en" placeholder="Name (en)"
                                   value="{{$district->name_en}}" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Description:</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="description" name="description"
                                      required>{{$district->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Description(en):</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="description_en" name="description_en"
                                      required>{{$district->description_en}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Change image:</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="file" name="image" id="image" required
                                   onchange="loadFile(event)"/>
                            <img id="output" src="{{URL::asset('')}}images/homepage/{{$district->image}}" width="30%"/>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" value="Update" class=" btn search-form"/>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.selectpicker').selectpicker();
    function loaddistrict() {
        var id = $('#district').val();
        $.ajax({
            type: "GET",
            url: "{{URL::asset('')}}admin/district-detail-" + id,

            success: function (data) {
                if (data != null) {
                        $('#name_en').val(data.name_en);
                        $('#description').val(data.description);
                        $('#description_en').val(data.description_en);
                        $('#output').attr('src', '{{URL::asset('')}}images/homepage/' + data.image);
                    }
                }

        })
    }
</script>


