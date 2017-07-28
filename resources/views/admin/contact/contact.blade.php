@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Contact management
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
                    <table class="table table-bordered tblcon">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contact as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}} </td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->message}}</td>
                                <td>@if($item->status==0)
                                        <label class="label label-danger">Waiting</label>
                                    @else
                                        <label class="label label-success">Seen</label>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status==0)
                                        <a href="{{URL::asset('')}}/admin/seen-contact-{{$item->id}}" class="btn btn-xs btn-success">Seen</a>
                                    @endif
                                    <a href="{{URL::asset('')}}/admin/delete-contact-{{$item->id}}" class="btn btn-xs btn-danger">Delete</a>
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
    <script src="{{URL::asset('')}}js/jquery.dataTables.min.js"></script>
    <script>
        $('.tblcon').DataTable();
    </script>
@endsection