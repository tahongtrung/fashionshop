@extends('frontend.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>     
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  <!-- product category -->
  <section id="aa-product-category">
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr class="even gradeC" align="center">
                    <th class="col-lg-1">Id</th>
                    <th class="col-lg-1">Người nhận</th>
                    <th class="col-lg-1">Ghi chú</th>
                    <th class="col-lg-1">Email</th>
                    <th class="col-lg-1">Số điện thoại</th>
                    <th class="col-lg-1">Tình trạng</th>
                    <th class="col-lg-1">Sản phẩm</th>
                    <th class="col-lg-1">Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($info as $item)
                    <tr class="odd gradeX">
                        <td class="center">{!! $item->id!!}</td>
                        <td class="center">{!! $item->donhang_nguoi_nhan !!}</td>
                        <td class="center">{!! $item->donhang_ghi_chu !!}</td>
                        <td class="center">{!! $item->donhang_nguoi_nhan_email !!}</td>
                        <td class="center">{!! $item->donhang_nguoi_nhan_sdt !!}</td>
                        <td class="center">{!! $item->tinhtranghd_ten !!}</td>
                        <td class="center">{!! $item->sanpham_ten !!}</td>
                        <td class="center">{!! $item->donhang_tong_tien !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr class="even gradeC" align="center">
                    <th class="col-lg-1">Sản phẩm</th>
                    <th class="col-lg-1">Ảnh</th>
                    <th class="col-lg-1">Kích cỡ</th>
                    <th class="col-lg-1">Đơn giá</th>
                    <th class="col-lg-1">Số lượng</th>
                    <th class="col-lg-1">Thành tiển</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chitiet as $item)
                    <tr class="odd gradeX">
                        <td class="center">{!! $item->sanpham_ten!!}</td>
                        <td class="center"><a class="aa-product-img"><img src="{!! asset('resources/upload/sanpham/'.$item->sanpham_anh) !!}"  style="max-width: 75px; max-height: 150px;"></a>
                        </td>
                        <td class="center">{!! $item->size_ten !!}</td>
                        <td class="center">{!! $item->sanpham_gia !!}</td>
                        <td class="center">{!! $item->chitietdonhang_so_luong !!}</td>
                        <td class="center">{!! $item->chitietdonhang_so_luong*$item->sanpham_gia !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
  </section>
  <!-- / product category -->
  <!-- Footer -->
@include('frontend.blocks.footer')
<!-- / Footer -->
@stop
