@extends('backend.master')

@section('content')

    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="{!! URL::route('admin.lohang.list') !!}" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Lô hàng</i></a>
                / Cập nhật
              </h3>
            <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{!! URL::route('admin.lohang.list') !!}" ><i class="btn btn-default" >Hủy</i></a>
            </div>
            </div>
            <div class="panel-body">
        <div class="col-lg-7">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Ký hiệu</label>
                <input class="form-control" name="txtLHSignt" value="{!! $lohang->lohang_ky_hieu !!}" placeholder="Ký hiệu..." />
                <div>
                    {!! $errors->first('txtLHSignt') !!}
                </div>  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Số lượng</label>
                <input class="form-control" name="txtLHQuant" value="{!! $lohang->lohang_so_luong_nhap !!}" placeholder="Số lượng..." />
                <div>
                    {!! $errors->first('txtLHQuant') !!}
                </div> 
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Giá mua vào</label>
                <input class="form-control" name="txtLHBuyPrice" value="{!! $lohang->lohang_gia_mua_vao !!}" placeholder="Giá mua vào..." />
                <div>
                    {!! $errors->first('txtLHBuyPrice') !!}
                </div>  
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input" >Sản phẩm</label>
                <div>
                    <select id="input" name="txtLHProduct"  class="form-control">
                            <option value="">--Chọn sản phẩm--</option>
                            <?php Select_Function($product,$lohang->sanpham_id); ?>
                    </select>
                </div>
                <div>
                    {!! $errors->first('txtLHProduct') !!}
                </div> 
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input" >Nhà cung cấp</label>
                <div>
                    <select id="input" name="txtLHVendor"  class="form-control">
                            <option value="">--Chọn nhà cung cấp--</option>
                            <?php Select_Function($vendor,$lohang->nhacungcap_id); ?>
                    </select>
                </div>
                <div>
                    {!! $errors->first('txtLHVendor') !!}
                </div> 
            </div>
        </div>
        
        </div>
        </div>
        </div>
        </div>
        </div>
    </form>

@stop