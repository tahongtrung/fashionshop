@extends('backend.master')
@section('title')
    <h3 class="page-header ">
        Lô hàng /
        <a href="{!! URL::route('admin.lohang.getAdd') !!}" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
@stop
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách lô hàng</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="odd gradeX" align="center">
                <th>Ký hiệu</th>
                <th>Sản phẩm</th>
                <th>Ngày</th>
                <th>SL</th>
                <th>Mua vào</th>
                <th>Size</th>
                <th>Xóa </th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($data as $item)
            <tr class="odd gradeX">
                    <?php 
                        $ngaybd =  date("d-n-Y", strtotime("$item->created_at")); // Năm/Tháng/Ngày
                        
                        // strtotime(date("Y-m-d", $ngaybd,"+ "+$item->khuyenmai_thoi_gian +" days"));
                        //$ngaykt = date("Y-m-d",strtotime($ngaybd . "+ $item->lohang_han_su_dung  day"));
                     ?>
               
                <td>{!! $item->lohang_ky_hieu !!}</td>
                <td>
                    <?php $sanpham = DB::table('sanpham')->where('id',$item->sanpham_id)->first(); ?>
                    @if (!empty($sanpham->sanpham_ten))
                        {!! $sanpham->sanpham_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                </td>
              
                <td>{!! date("d-m-Y",strtotime($ngaybd)) !!}</td>
                <td>{!! $item->lohang_so_luong_nhap !!}</td>
                <td>{!! number_format("$item->lohang_gia_mua_vao",0,",",".")  !!}vnđ</td>
                <td>{!! $item->size_ten !!}</td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{!! URL::route('admin.lohang.getDelete', $item->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                <td class="center">
                <a href="{!! URL::route('admin.lohang.getEdit', $item->id ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>
@stop