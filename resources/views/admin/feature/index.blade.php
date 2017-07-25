@extends('admin.layout.master')
@section('content')
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Property feature
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

                <form action="{{URL::asset('')}}admin/update-feature-property" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="{{URL::asset('')}}admin/new-property-feature" class="btn btn-success btn-sm">New property feature</a>
                    <input type="submit" value="Update all" class="btn btn-primary btn-sm"/>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>
                                Vietnamese
                            </th>
                            <th>English</th>
                            <th>Show/hide</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($feature as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <input type="text" class="form-control" required name="feature{{$item->id}}"
                                           value="{{$item->feature}}"/></td>
                                <td><input type="text" class="form-control" required
                                           name="feature_en{{$item->id}}" value="{{$item->feature_en}}"/></td>
                                <td>
                                    <input class="form-control" value="1" type="checkbox" @if($item->status==1) checked @endif name="status{{$item->id}}"/>
                                </td>
                                <td>
                                    <a href="{{URL::asset('')}}admin/delete-feature-property-{{$item->id}}"
                                       class="btn btn-danger btn-xs deletelink"> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>


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
@endsection