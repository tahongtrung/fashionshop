@extends('backend.master')

@section('content')
<form action="{!! route('admin.size.getAdd') !!}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-green">
                    <div class="panel-heading" style="height:60px;">
                      <h3 >
                        <a href="{!! URL::route('admin.size.list') !!}" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Kích thuớc</i></a>
                        /Thêm mới
                      </h3>
                    <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{!! URL::route('admin.size.list') !!}" ><i class="btn btn-default" >Hủy</i></a>
                    </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-7">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control" name="txtSizeName" value="{!! old('txtSizeName') !!}" placeholder="Tên..." />
                                    <div>
                                        {!! $errors->first('txtSizeName') !!}
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