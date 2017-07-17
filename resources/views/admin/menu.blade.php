@extends('admin.layout.master')
@section('content')
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-3">
                        <h3>Menu management
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

                <form action="{{URL::asset('')}}admin/update-menu" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Update" class="btn btn-primary btn-sm"/>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>
                                Vietnamese
                            </th>
                            <th>English</th>
                            <th>Sort order</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>


                        @foreach($menu as $item)
                            <tr>
                                <td>
                                    <input type="text" class="form-control" required name="name{{$item->id}}"
                                           value="{{$item->name}}"/></td>
                                <td><input type="text" class="form-control" required
                                           name="name_en{{$item->id}}" value="{{$item->name_en}}"/></td>
                                <td><input type="text" class="form-control" required
                                           name="sort_order{{$item->id}}" value="{{$item->sort_order}}"/></td>
                                <td><a href="{{URL::asset('')}}admin/create-menu-{{$item->id}}"
                                       class="btn btn-success btn-xs"> New submenu</a></td>
                            </tr>
                            <?php
                            $sub = DB::table('ppc_property_category')
                                ->where('ppc_property_category.status', 1)
                                ->where('ppc_property_category.parent_id', $item->id)
                                ->orderBy('ppc_property_category.sort_order', 'asc')
                                ->get();
                            ?>
                            @foreach($sub as $i)
                                <tr>
                                    <td>
                                        |_ _ <input type="text" required name="name{{$i->id}}"
                                                    value="{{$i->name}}"/></td>
                                    <td>
                                        |_ _ <input type="text" required
                                                    name="name_en{{$i->id}}" value="{{$i->name_en}}"/></td>
                                    <td>
                                        |_ _ <input type="text" required
                                                    name="sort_order{{$i->id}}" value="{{$i->sort_order}}"/></td>
                                    <td>
                                        |_ _ <a href="{{URL::asset('')}}admin/delete-menu-{{$i->id}}"
                                                class="btn btn-danger btn-xs deletelink" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
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