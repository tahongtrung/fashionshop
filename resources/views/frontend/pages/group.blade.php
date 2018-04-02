@extends('frontend.master')
@section('content')
@include('frontend.blocks.menu_1')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! asset('resources/upload/nhom/'.$nhom->nhom_anh) !!}" alt="fashion img" style="width: 1920px; height: 300px;">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{!! $nhom->nhom_ten !!}</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>         
          <li class="active">{!! $nhom->nhom_ten !!}</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            @include('frontend.blocks.head')
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach ($sanpham as $item)
                <?php 
                  $sanphamkhuyenmai = DB::select('select * from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.sanpham_da_xoa = 0 and sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1');
                ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="{!! url('san-pham',$item->sanpham_url) !!}"><img src="{!! asset('resources/upload/sanpham/'.$item->sanpham_anh) !!}"  style="width: 250px; height: 300px;"></a>
                    <a class="aa-add-card-btn" href="{!! url('mua-hang',[$item->id,$item->sanpham_url]) !!}"><span class="fa fa-shopping-cart"></span>Mua ngay</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{!! url('san-pham',$item->sanpham_url) !!}">{!! $item->sanpham_ten !!}</a></h4>
                      <input type="hidden" name="txtqty" value="1" />
                      @if ($item->sanpham_khuyenmai == 1) 
                       <!-- product badge -->

                    <span class="aa-badge aa-sold-out" >Khuyến mãi!</span>
                    <span class="aa-product-price">
                     <?php 
                        $tylegia = DB::select('select khuyenmai_phan_tram from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1 ');
                       $giakm = ($item->sanpham_gia - ($tylegia[0]->khuyenmai_phan_tram*$item->sanpham_gia * 0.01));
                       $tyle = $tylegia[0]->khuyenmai_phan_tram*0.01;
                      ?> 
                      
                        {!! number_format($giakm,0,",",".") !!} VNĐ
                    </span>
                    <span class="aa-product-price">
                    <del>{!! number_format("$item->sanpham_gia",0,",",".") !!} VNĐ</del>
                    </span> 
                     <input type="hidden" name="txtopt" value="{!! $tyle !!}" /> 
                     @else
                         <span class="aa-product-price">
                         {!! number_format("$item->sanpham_gia",0,",",".") !!} VNĐ
                         </span>
                         <input type="hidden" name="txtopt" value="1" /> 
                    @endif
                      </figcaption>
                  </figure>
                </li> 
                @endforeach                                      
              </ul>

            </div>
            <!-- pagination -->

            @include('frontend.blocks.pagination')

            <!-- /pagination -->
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
             <!-- sidebar  1 -->
            
            @include('frontend.blocks.spbanchay')
             <!-- sidebar 2 -->
          
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
  <!-- Footer -->

<!-- / Footer -->
<style>
  <style>
  body{
  font-size: 14px;
    font-family: "Arial";
    color: #333333;
   line-height: 1;
}
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

/*--footer--*/
.top-footer iframe{
  width: 100%;
  min-height:300px;
  border: none;
}
.top-footer1 h2 {
  font-size: 2em;
  color: #52d0c4;
    font-family: 'Time News Roman';
      margin: 0 0 0.5em;
}
.top-footer1 input[type="text"] {
  width: 65%;
  padding: 0.6em;
  outline: none;
  color: #BDBDBD;
  font-size: 1em;
  background: none;
  border: 1px solid #BDBDBD;
}
.top-footer1 input[type="submit"] {
  font-size: 0.9em;
  color: #fff;
  background-color:#000;
  border: none;
  padding: 0.8em 0em;
  width: 30%;
  vertical-align: top;
  outline: none;
}
.top-footer1 input[type="submit"]:hover {
  background-color:#52d0c4;
}
.footer {
  border-top: 1px solid #BDBDBD;
}
.footer-top {
  padding: 3em 0 ;
}
.top-footer1 {
  margin: 6em 0 0;
}
/***==============menu=====================***/

.clear {clear: both; font-size: 0px; line-height: 0px; height:0;}
p {margin:0px;padding:5px 0px;}
ol,ul { list-style: none;}


#vnt-menutop{
   width: 100%;
}
#vnt-menutop .menu-fixed{
  width: 100%;
    top: -100%;
}
#vnt-menutop .menu-fixed.active{
    width: 100%;
    min-width: 1200px;
    position: fixed;
    background-color:#ffffff;
    z-index: 100;
    top:0px;
    left: 0px;
   -webkit-box-shadow: 0px 0px 5px rgba(0,0,0,1.3);
    -moz-box-shadow: 0px 0px 5px rgba(0,0,0,1.3);
    box-shadow: 0px 0px 5px rgba(0,0,0,1.3);
}
#vnt-menutop .menutop{
  width: 1170px;
  margin: 0px auto;
  display:table;
  position: relative;
}
.menutop ul{
  margin: 0px;
  display:table-row;
}
.menutop ul li{
  
  display: table-cell;
  float: left;
  position: relative;
}
.menutop ul li a{
  font-size: 18px;
  line-height: 26px;
  text-transform: uppercase;
  color: #201e33;
  padding: 10px 18px;
  display: inline-block;
  font-family: Arial;
  

}
#vnt-menutop .menutop ul li a:hover{
  color: #00abe5;
  text-decoration: none;
}
#vnt-menutop .menutop ul li a:hover .careti
{
  background: url('{!! url('public/frontend/menu/images/menu_cha2.png') !!}')  no-repeat ;
}
#vnt-menutop .menutop ul li.current a
{
  color: #00abe5;
}
.menutop ul li a .careti{
  display: inline-block;
  background: url('{!! url('public/frontend/menu/images/menu_cha1.png') !!}') no-repeat;
  width: 9px;
  height: 9px;
}


.menutop ul ul li{
  display: block;
  display: table-cell;
  float: left;
  position: relative;
}

#vnt-menutop .menutop ul li ul{
  background-color: #ffffff;
    position: absolute;
    top: 100%;
    left: 0px;
    box-shadow: none;
    visibility: hidden;
    /*opacity: 0;
    -webkit-transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
    transition:all 0.5s ease;*/
    z-index: 999999;
    border-left: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
    border-bottom: 1px solid #e5e5e5;
}
/**/
#vnt-menutop .menutop ul li:hover ul{
    top: 100%;
    visibility: visible;
    opacity: 1;
}


#vnt-menutop .menutop ul ul li{
    width: 100%;
    position: relative;
    background: url('{!! url('public/frontend/menu/images/menu_con.png') !!}') top 15px left 20px no-repeat #ffffff;
    padding-left: 20px;
    padding-right: 20px;
}
#vnt-menutop .menutop ul ul li a{
  display: block;
  white-space: nowrap;
    padding: 10px;
    /*-webkit-transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
    transition:all 0.5s ease;*/
  border-bottom: 1px solid #e5e5e5;
   width: 100%;
   padding-left: 15px;
   text-transform: uppercase;
   font-size: 13px;
    line-height: 20px;
    color: #414141;
   font-family: Arial;
}
#vnt-menutop .menutop ul ul li:last-child{
  border-bottom: none;
}

</style>
@stop
