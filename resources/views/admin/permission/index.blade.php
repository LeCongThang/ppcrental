@extends('admin.layout.master')
@section('content')
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-3">
                        <h3>System permission
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
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>

                            <th>Permission</th>
                            <th>User can do</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permission as $item)
                            <tr>
                                <td>{{$item->permission}}</td>

                                <td>{{$item->note}}</td>
                                <td>
                                    <a href="{{URL::asset('')}}admin/edit-permission-{{$item->id}}"
                                       class="btn btn-xs btn-primary editlink"><span class="glyphicon glyphicon-pencil"></span>
                                        Edit</a>
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
        $('.editlink').click(function (e) {
            var a_href = $(this).attr('href'); /* Lấy giá trị của thuộc tính href */
            e.preventDefault(); /* Không thực hiện action mặc định */
            $.ajax({ /* Gửi request lên server */
                url: a_href, /* Nội dung trong Delete.cshtml cụ thể là deleteModal div được server trả về */
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                success: function (data) { /* Sau khi nhận được giá */
                    $('.body-content').prepend(data); /* body-content div (định nghĩa trong _Layout.cshtml) sẽ thêm deleteModal div vào dưới cùng */
                    $('#deleteModal').modal('show'); /* Hiển thị deleteModal div dưới kiểu modal */
                }
            });
        })
    </script>
@endsection