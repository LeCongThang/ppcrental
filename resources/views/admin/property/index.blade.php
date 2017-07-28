@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="{{URL::asset('')}}admin/new-property" class="btn btn-md btn-success">Add news</a>
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Properties management
                            {{--<small>Graph title sub-title</small>--}}
                        </h3>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="col-md-12">
                    <table class="table table-bordered tblpro">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Location</th>
                            <th>Area</th>
                            <th>Status</th>
                            <th>Posted by</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($properties as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td width="150"><img src="{{URL::asset('')}}images/project/{{$item->image_overall}}" width="70%"/></td>
                                <td>{{$item->name_en}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->location}}</td>
                                <td>{{$item->area}}</td>
                                <td>@if($item->status==0)
                                        <label class="text-danger"><i class="fa fa-circle-o"></i></label>
                                    @else
                                        <label class="text-success"><i class="fa fa-check-circle"></i></label>
                                    @endif
                                </td>
                                <td>@if(\App\Models\PpcUser::find($item->saler_id)->user_type==0)
                                        <label class="label label-info">Company</label>
                                    @else
                                        <label class="label label-success">Agent</label>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{URL::asset('')}}admin/edit-property-{{$item->id}}" class="btn btn-xs btn-primary">Edit</a>
                                    @if($loop->count<=1)
                                        <i>Default 3 property, can't delete</i>
                                    @else
                                        <a href="{{URL::asset('')}}admin/delete-property-{{$item->id}}" class="btn btn-xs btn-danger deletelink">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>


@endsection
@section('scripts')
    <script>
        $('.deletelink').click(function (e) {
            var a_href = $(this).attr('href');
            /* Lấy giá trị của thuộc tính href */
            e.preventDefault();
            /* Không thực hiện action mặc định */
            $.ajax({
                /* Gửi request lên server */
                url: a_href, /* Nội dung trong Delete.cshtml cụ thể là deleteModal div được server trả về */
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                success: function (data) { /* Sau khi nhận được giá */
                    $('.body-content').prepend(data);
                    /* body-content div (định nghĩa trong _Layout.cshtml) sẽ thêm deleteModal div vào dưới cùng */
                    $('#deleteModal').modal('show');
                    /* Hiển thị deleteModal div dưới kiểu modal */
                }
            });
        })
    </script>
<script src="{{URL::asset('')}}js/jquery.dataTables.min.js"></script>
    <script>
        $('.tblpro').DataTable();
    </script>
@endsection