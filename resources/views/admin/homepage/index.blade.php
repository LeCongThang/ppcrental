@extends('admin.layout.master')
@section('content')

    <div class="row">
        <div class="col-lg-3">
            <img src="{{URL::asset('')}}images/common_icon/district-position.png">
        </div>
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>District</th>
                    <th>Name(en)</th>
                    <th>Description</th>
                    <th>Description(en)</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($district as $i)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><select name="district" id="district" class="form-control selectpicker"
                                    data-live-search="true"
                                    title="--Choose--"
                                    onchange="loaddistrict();" required>
                                @foreach($province as $item)
                                    <option value="{{$item->id}}"
                                            @if($item->id==$i->id) selected @endif
                                    >{{$item->name}}</option>
                                @endforeach
                            </select></td>
                        <td>{{$i->name_en}}</td>
                        <td>{{$i->description}}</td>
                        <td>{{$i->description_en}}</td>

                        <td>{{$i->image}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>

@endsection
@section('scripts')

    <link href="{{URL::asset('')}}css/set1.css" rel="stylesheet">
    <script>
        $('.editlink').click(function (e) {
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
                    $('#editModal').modal('show');
                    /* Hiển thị deleteModal div dưới kiểu modal */
                }
            });
        })


    </script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"></script>

@endsection