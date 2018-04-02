@extends('frontend.master')
@section('content')
  <!-- catg header banner section -->
  <!-- <section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <ol class="breadcrumb">  
        </ol>
      </div>
     </div>
   </div>
  </section> -->
  <!-- / catg header banner section -->
  <!-- product category -->
  <section id="aa-product-category">
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr class="even gradeC" align="center">
                    <th class="col-lg-1">Id</th>
                    <th class="col-lg-1">Ngày đặt</th>
                    <th class="col-lg-1">Người nhận</th>
                    <th class="col-lg-1">Ghi chú</th>
                    <th class="col-lg-1">Tình trạng</th>
                    <th class="col-lg-1">Sản phẩm</th>
                    <th class="col-lg-1">Tổng tiền</th>
                    <th class="col-lg-1">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($info as $item)
                    <tr class="odd gradeX">
                        <td class="center">{!! $item->id !!}</td>
                        <td class="center">{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                        <td class="center">{!! $item->donhang_nguoi_nhan !!}</td>
                        <td class="center">{!! $item->donhang_ghi_chu !!}</td>
                        <td class="center">{!! $item->tinhtranghd_ten !!}</td>
                        <td class="center">{!! $item->sanpham_ten !!}</td>
                        <td class="center">{!! $item->donhang_tong_tien !!}</td>
                        <td class="center">
                          <a href="{{ url('/thongtindonhang',[$item->id]) }}" 
                             type="button" class="btn btn-info" 
                             data-toggle="tooltip" data-placement="left" 
                             title="Thông tin chi tiết đơn hàng">
                              <i class="fa fa-info"></i>
                          </a>
                          <a onclick="return confirmDel('Bạn có chắc muốn hủy đơn hàng này?')" 
                            href="{{ url('/huydonhang', [$item->id, $item->khachhang_id]) }}" 
                             type="button" class="btn btn-danger" 
                             data-toggle="tooltip" data-placement="left" 
                             title="Hủy đơn hàng">
                            <i class="fa fa fa-trash-o"></i>
                          </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </section>
  <!-- / product category -->
  <!-- Footer -->
<!-- / Footer -->
@stop
