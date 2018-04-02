@extends('backend.master')
@section('title')
    <h1 class="page-header">Nhân viên</h1>
@stop
@section('content')                 
<div class="panel-body">
    <form class="navbar-form pull-right">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Tìm kiếm...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /input-group -->
    </form>
    

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
            <tr class="odd gradeX" align="center">
                <td>{!! $item->id !!}</td>
                <td>{!! $item->name !!}</td>
                <td>{!! $item->email !!}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
                <td class="center"><a onclick="return confirmDel('Bạn có chắc đây không phải là nhân viên?')" href="{!! URL::route('admin.nhanvien.toCustomer', $item->id ) !!}" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="NV"><i class="fa fa-edit"></i></a></td>
            </tr>
        @endforeach
    </table>
</div>
    <!-- /.row -->
@stop