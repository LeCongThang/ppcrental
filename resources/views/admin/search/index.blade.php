@extends('admin.layout.master')
@section('content')
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Search items management
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

                <form action="{{URL::asset('')}}admin/update-search" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Update" class="btn btn-primary btn-sm"/>
                    <table class="table table-bordered col-lg-4">
                        <thead>
                        <tr>
                            <th>
                                Bedrooms <span><a class="btn btn-xs btn-success"
                                                  href="{{URL::asset('')}}admin/add-bedroom">Add</a> </span>
                            </th>
                            <th>
                                Min budget <span><a class="btn btn-xs btn-success"
                                                    href="{{URL::asset('')}}admin/add-minbudget">Add</a> </span>
                            </th>
                            <th>
                                Max budget <span><a class="btn btn-xs btn-success"
                                                    href="{{URL::asset('')}}admin/add-maxbudget">Add</a> </span>
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>
                                @foreach($bed as $item)
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="0" max="10" required name="number{{$item->id}}"
                                               value="{{$item->number}}"/>
                                        <a href="{{URL::asset('')}}admin/delete-search-{{$item->id}}"
                                           class="btn btn-danger btn-xs input-group-addon deletelink"> Delete</a>
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($min as $item)
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="0" required name="number{{$item->id}}"
                                               value="{{$item->number}}"/>
                                        <a href="{{URL::asset('')}}admin/delete-search-{{$item->id}}"
                                           class="btn btn-danger btn-xs input-group-addon deletelink"> Delete</a>
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($max as $item)
                                    <div class="input-group">
                                        <input type="number" class="form-control"  min="0" required name="number{{$item->id}}"
                                               value="{{$item->number}}"/>
                                        <a href="{{URL::asset('')}}admin/delete-search-{{$item->id}}"
                                           class="btn btn-danger btn-xs input-group-addon deletelink"> Delete</a>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
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