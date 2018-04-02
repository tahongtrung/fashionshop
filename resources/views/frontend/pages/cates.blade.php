@extends('frontend.master')
@section('content')
@include('frontend.blocks.menu_1')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! asset('resources/upload/loaisanpham/'.$loaisanpham->loaisanpham_anh) !!}" alt="fashion img" style="width: 1920px; height: 300px;">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{!! $loaisanpham->loaisanpham_ten !!}</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>
          <li><a href="{!! url('nhom-thuc-pham',$nhom->nhom_url) !!}">{!! $nhom->nhom_ten !!}</a></li>
          <li class="active">{!! $loaisanpham->loaisanpham_ten !!}</li>
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
                  $sanphamkhuyenmai = DB::select('select * from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1');
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
                      
                        {!! number_format($giakm,0,",",".") !!} vnđ
                    </span>
                    <span class="aa-product-price">
                    <del>{!! number_format("$item->sanpham_gia",0,",",".") !!} vnđ</del>
                    </span> 
                     <input type="hidden" name="txtopt" value="{!! $tyle !!}" /> 
                     @else
                         <span class="aa-product-price">
                         {!! number_format("$item->sanpham_gia",0,",",".") !!} vnđ
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

#vnt-wrapper{
  min-width: 1200px;
  position: relative;
}
#tophead{
  width: 100%;
  background-color: #f7f7f7;
}
.head_top{
  width: 1170px;
  position: relative;
  margin: 0px auto;
}
.phonetop{
  width: 50%;
  float: left;
  position: relative;
}
.phonetop p{
  background: url('../menu/images/top_phone.png') center left no-repeat;
  font-size: 12px;
  line-height: 0px;
  color: #9d9d9d;
  margin: 0 !important;
  padding-top: 10px;
  padding-left: 18px;

  
}

#vnt-header{
  width: 1170px;
  position: relative;
  margin: 0px auto;
  border-bottom: 1px solid #e5e5e5;
}



.header-tool{
  width: 300px;
  position: relative;
  float: left;
}
.header-tool .formSearch_input{
  border: 1px solid #cfcfcf;
    border-radius: 20px;
    height: 35px;
    margin: 15px 0;
}
/*#do_submit{
  background: url('../images/icon_search.png') right top no-repeat;
  border: none;
  min-height: 1px;
  padding-bottom: 13px;
  position: relative;
}
#do_submit:focus{
    outline: none;
}*/
.header-tool .formSearch_input .text_search{
  border: none;
  height: 33px;
  color: #333333;
  margin-left: 15px;
  font-size: 12px;
  line-height: 18px;
  width: 240px;
}
.logo{
  float: left;
    margin-top: 0px;
    position: relative;
    text-align: center;
    width: 570px;
}
.giohang{
  float: right;
  position: relative;
  width: 300px;
  padding-top: 22px;
  text-align: right;
}
.giohang:hover sup,
.giohang:hover span
{
  color: #00abe5;
}
.giohang sup{
  top: -1px;
  font-size: 12px;
  line-height: 18px;
  color: #797979;
  text-transform: uppercase;
  font-family: 'Source Sans Pro', sans-serif;
}
.giohang span{
  color: #333333;
}

#header_icon{
  width: 1170px;
  margin: 0px auto;
    padding-top: 5px;
  padding-bottom: 5px;
  border-bottom: 2px solid #383838;

}
#header_icon .colum_delivery
{
  width: 270px;
  float: left;
  min-height: 1px;
}

#header_icon .item_icon {
  position: relative;
  min-height: 1px;

}
#header_icon .colum_delivery .item_icon .img_icon{
  background: url('../images/icon_giaohang.png') center top 4px no-repeat;
  width: 45px;
  position: relative;
  height: 45px;
  float: left;
  -webkit-transition: box-shadow 0.2s;
    -moz-transition: box-shadow 0.2s;
    transition: box-shadow 0.2s;
    border-radius: 50%;
    display: inline-block;
    border: 1px solid #e5e5e5;
}

#header_icon .colum_delivery .item_icon:hover .img_icon{

  box-shadow: 0 0 0 5px rgba(100,100,101,1);
  color: #8b8b8b;

}
#header_icon .colum_delivery .item_icon .content_icon{
  font-size: 15px;
  line-height: 22px;
  color: #8b8b8b;
  text-transform: uppercase;
  padding-left: 12px;
  bottom: 4px;
  display: inline-block;
     font-family: 'Source Sans Pro', sans-serif;
}
#header_icon .item_icon .content_icon{
  font-size: 15px;
  line-height: 22px;
  color: #8b8b8b;
  text-transform: uppercase;
  padding-left: 12px;
  bottom: -10px;
  display: inline-block;
    font-family: 'Source Sans Pro', sans-serif;
}
#header_icon .colum_exchange
{
  width: 270px;
  float: left;
  min-height: 1px;
  margin-left: -35px;
}
#header_icon .colum_exchange .item_icon .img_icon{
  background: url('../images/icon_vong.png') center top 4px no-repeat;
  width: 45px;
  position: relative;
  height: 45px;
  float: left;
  -webkit-transition: box-shadow 0.2s;
    -moz-transition: box-shadow 0.2s;
    transition: box-shadow 0.2s;
    border-radius: 50%;
    display: inline-block;
    border: 1px solid #e5e5e5;

}


#header_icon .colum_exchange .item_icon:hover .img_icon{

  box-shadow: 0 0 0 5px rgba(100,100,101,1);
  color: #8b8b8b;
}

#header_icon .colum_guarantee
{
  width: 300px;
  float: left;
  min-height: 1px;
  margin-left: 55px;
}
#header_icon .colum_guarantee .item_icon .img_icon{
  background: url('../images/icon_hh.png') center top 4px no-repeat;
  width: 45px;
  position: relative;
  height: 45px;
  float: left;
  -webkit-transition: box-shadow 0.2s;
    -moz-transition: box-shadow 0.2s;
    transition: box-shadow 0.2s;
    border-radius: 50%;
    display: inline-block;
    border: 1px solid #e5e5e5;

}

#header_icon .colum_guarantee .item_icon:hover .img_icon{

  box-shadow: 0 0 0 5px rgba(100,100,101,1);
  color: #8b8b8b;
}
#header_icon .colum_open
{
  width: 270px;
  float: left;
  min-height: 1px;
  
}
#header_icon .colum_open .item_icon .img_icon{
  background: url('../images/icon_open.png') center top 4px no-repeat;
  width: 45px;
  position: relative;
  height: 45px;
  float: left;
  -webkit-transition: box-shadow 0.2s;
    -moz-transition: box-shadow 0.2s;
    transition: box-shadow 0.2s;
    border-radius: 50%;
    display: inline-block;
    border: 1px solid #e5e5e5;
     font-family: 'SourceSansPro-Regular';
}

#header_icon .colum_open .item_icon:hover .img_icon{

  box-shadow: 0 0 0 5px rgba(100,100,101,1);
  color: #8b8b8b;
}


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
  background: url('{!! url('public/frontend/menu/images/menu_cha1.png') !!}')no-repeat;
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


#vnt-footer{
  width: 1170px;
  margin: 0px auto;
}
.footer_adress{
  width: 400px;
  float: left;
  position: relative;
  background: url('images/bg_adress.png')no-repeat;
  height: 316px;
  padding-right: 30px;
}
.adress_bg{
  background: url('images/icon_ken_bot.png') no-repeat;
  width: 100%;
  height: 68px;
  position: relative;
  display: inline-block;
}
.adress_content{
  width: 100%;
  padding-left: 25px;
  margin-top:-10px;
  
}
.adress_content h3{
  color: #171717;
  font-size: 20px;
  line-height: 28px;
  padding-bottom: 12px;
  text-transform: uppercase;
  font-family: 'Source Sans Pro', sans-serif;
}
.adress_content span a{
  color: #4c4c4c;
  font-size: 14px;
  line-height: 20px;
}
.adress_content span a:focus{
  outline: none;
  text-decoration: none;
}
.adress_title_home{
  background: url('../images/home_icon.png') left top 1px no-repeat;
  padding-bottom: 10px;
  padding-left:30px;
}
.adress_title_map{
  background: url('../images/map_icon.png') left top 1px no-repeat;
  padding-bottom: 10px;padding-left:30px;
}




.menu-footer{
  float: right;
  width: 770px;
  position: relative;
  
  border-top: 2px solid #383838;
}
.menu-footer .footer_menu_left{
  width: 202px;
  float: left;
}
.menu-footer .footer_menu_mid{
  width: 268px;
  float: left;
  padding-left: 20px;
}
.menu-footer .footer_menu_right{
  width: 300px;
  float: right;
}

.menu-footer .footer_menu_left ul li,
.menu-footer .footer_menu_mid ul li
{
  background: url('../images/icon_menu_bot.png') center left no-repeat;
  padding: 7px 0px 7px 0px;
}
.menu-footer .footer_menu_left ul li:first-child,
.menu-footer .footer_menu_mid ul li:first-child{
  padding-top: 0px;
}
.menu-footer .footer_menu_left ul li a,
.menu-footer .footer_menu_mid ul li a{
  font-size: 14px;
  line-height: 20px;
  color: #747474;
  padding-left: 20px;
}
.menu-footer .footer_menu_left ul li a:hover,
.menu-footer .footer_menu_mid ul li a:hover{
  color: #00abe5;
  text-decoration: none;
}
.menu-footer .footer_menu_left ul li.current a,
.menu-footer .footer_menu_mid ul li.current a{
  color: #00abe5;
}
.footer_menu_left p,
.footer_menu_mid p,
.footer_menu_right p
{
  padding-top: 45px;
  padding-bottom: 23px;
  font-size: 18px;
  line-height: 26px;
  color: #000000;
  text-transform: uppercase;
  font-family: 'Source Sans Pro', sans-serif;
}
.menu-footer .footer_menu_right ul li{
  display: inline-block;
    overflow: hidden;
    margin-right: 10px;
}
.menu-footer .footer_menu_right ul li img{
   max-width: 100%;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transition: all 1.2s ease-in-out;
    -moz-transition: all 1.2s ease-in-out;
    transition: all 1.2s ease-in-out;
}
.menu-footer .footer_menu_right ul li a:hover img{
  -webkit-transform: rotate3d(0, 1, 0, -360deg);
    -moz-transform: rotate3d(0, 1, 0, -360deg);
    -ms-transform: rotate3d(0, 1, 0, -360deg);
    -o-transform: rotate3d(0, 1, 0, -360deg);
    transform: rotate3d(0, 1, 0, -360deg);
}
   

.footer_copy{
  width: 100%;
  border-top: 1px solid #e4e4e4;
  border-bottom: 5px solid #00abe5;
  padding: 25px 0px;
}
.phone_user{
  width: 585px;
  float: left;
  background: url('../images/iphone_icon.png') left center no-repeat;;
}
.phone_user span{
  font-size: 18px;
  line-height: 24px;
  color: #888888;
  padding-left: 53px;
  font-family: 'Source Sans Pro', sans-serif;
}
.phone_user p{
  font-size: 20px;
  line-height: 25px;
  color: #424242;
  padding-left: 53px;
}
.copyright{
  width: 585px;
  float: right;
  text-align: right;
  font-style: italic;
  color: #888888;
}

.copyright span{
  text-transform: uppercase;
  font-style: normal;
  color: #333333;
  font-weight: bold;
  font-size: 12px;
  line-height: 20px;
}
.copyright p{
  margin-bottom: 0px;
  color: #888888;
  font-size: 12px;
  line-height: 20px;
  font-style: italic;
  padding-bottom: 0px;
}
.copyright strong a{
  color: #333333;
  font-size: 12px;
  line-height: 20px;
  font-style: normal;
}

#vnt-content{
  width: 1170px;
  margin: 0px auto;
}
#vnt-main{
  width: 100%;
    position: relative;
}
#vnt-main .box_mid{
    width: 100%;
    position: relative;
}
#vnt-main .box_mid .mid-title h1{
    width: 100%;
    font-size: 32px;
    line-height: 40px;
    margin: 0px;
    padding-top: 30px;
    padding-bottom: 27px;
    color: #555555;
    font-family: 'Source Sans Pro', sans-serif;
    padding-left: 40px;
    background: url('../images/bg_title.png') left no-repeat;
}
.box_mid .mid-title .titleL
{
  text-align: left;
}
.navation-home{
  background: url('../images/navation_icon.png')no-repeat;
  height: 15px;
  width: 15px;
  display: inline-block;
}
.modal-content {
    top: 75px;
    border-radius: 0px;
}
.modal-header {
    padding: 0px;
    border-bottom: none;
    min-height: 1px;
}
.modal-header .close, .modal-header .close:focus {
    outline: none;
    margin-top: -85px;
    font-size: 60px;
    opacity: 1;
}
.modal-header{
  background-color: #333333;
}
.modal-header .close span {
    color: #ffffff;
}
.modal-header p{
  padding: 5px;
  font-size: 16px;
  line-height: 24px;
  font-family: 'Source Sans Pro', sans-serif;
  color: #ffffff; 
}
.modal-body {
    position: relative;
    padding: 0px;
}
@media (min-width: 768px){
  .modal-sm {
    width: 900px;
  }
}

.copyright a.thietkeweb{
    font-size: 12px;
  line-height: 20px;
  color: #888888  ;
  font-style: italic;
  font-weight: normal;
}
/*--------------------------------------------*/
#search_product {
    background: none repeat scroll 0 0 #f9f9f9;
    float: right;
    position: fixed;
    right: -104px;
    text-align: left;
    top: 100px;
    width: 104px;
    z-index: 999;
}
#search_product #search_product_tab {
    background: url("../images/tab_timkiem.png") no-repeat scroll 0 0 transparent;
    cursor: pointer;
    float: left;
    height: 162px;
    margin-left: -25px;
    width: 25px;
    z-index: 999;
}
#search_product #search_product_tab:hover {
}
#search_product .ctn_search {
    background: none repeat scroll 0 0 #ffffff;
    border: 5px solid #ee7e23;
    padding: 15px 13px;
}
.products_block{
    width:80px;
    border:2px solid #00A8E4;
    background:#f4f4f4;
    padding:10px;
}
.block_title{
    text-align:center;
    line-height:26px;
}
.block_content{
    display:block;
    text-align:center;
    position:relative;
}
.block_content li{margin-bottom:10px;}
.block_content a{
    display:block;
    width:65px;
    margin:0 auto;
    border:1px solid #f4f4f4;
}
.block_content a:hover{
    border:1px solid #ff0000;
}
.block_content .jcarousel-container{
    height:315px;
}
.block_content .jcarousel-container .jcarousel-clip{
    height:280px;
    width:100%;
}
.block_content .jcarousel-list li{
    width:100%;
    height:85px;
}
.block_content .prev{
    position:absolute;
    bottom:10px;
    left:10px;
    cursor:pointer;
    z-index:1;
}
.block_content .next{
    position:absolute;
    bottom:10px;
    right:10px;
    cursor:pointer;
    z-index:1;
}
.header-tool .btn_search
{
  background: url('../images/icon_search.png') right top no-repeat;
    border: none;
    min-height: 1px;
    padding-bottom: 13px;
    position: relative;
}
a:hover
{
  text-decoration: none !important;
}
#TB_window
{
  top:10% !important;
}
#slider:hover .group1-Prev,#slider:hover .group1-Next
{
  display: relative !important;
  
}
.go_top {
    position: fixed;
    width: 100px;
    height: 69px;
    background: url(../images/go_top.png) no-repeat ;
    bottom: 120px;
    right: 20px;
   
    z-index: 9999;
    
}


#vnt-main .box_mid {
    padding-bottom: 62px;
}
#vnt-navation{
  width: 1170px;
  margin: 0px auto;
  background-color: #f7f7f7;
  height: 35px;
    border-top: 1px solid #e5e5e5;
}
.breadcrumb{
  border-radius: 0px;
  background-color: transparent;
  padding-left: 0px;
  padding-top: 10px;
  padding-bottom: 10px;
  font-size: 12px;
  margin: 0px;
  line-height: 18px;
}
.breadcrumb .navation{
  float: right;
}
.breadcrumb ul li + li::before {
    content: " / ";
    padding: 0px 10px;
    color: #545454;
}
.breadcrumb ul li{
    position: relative;
    display: inline-block;
}
.breadcrumb ul li.active a,
.breadcrumb ul li:focus
{
    color: #545454;
}
.breadcrumb ul li a{
    font-size: 12px;
    color: #545454;
    text-decoration: none;
    line-height: 18px;
}
.breadcrumb ul li a:hover{
    color: #545454;
}
.breadcrumb ul li:last-child {
    color: #545454;
}
.breadcrumb ul li img{
  padding-bottom: 5px;
}

.head_menu{
  width: 50%;
  float: right;
  position: relative;
  border-radius: 0px;
  background-color: transparent;
 
 
  font-size: 12px;
  margin: 0px;
  line-height: 18px;
}
.head_menu ul{
  float: right;
  margin-bottom: 2px;
}
.head_menu ul li + li::before {
    content: " / ";
    padding: 0px 10px;
    color: #000;
}
.head_menu ul li{
    position: relative;
    display: inline-block;
    font-family: 'Source Sans Pro', sans-serif;
}
.head_menu ul li.current a,
.head_menu ul li:focus
{
    color: #333333;
}

.head_menu ul li a{
    font-size: 12px;
    color: #9d9d9d;
    text-decoration: none;
    line-height: 18px;
      font-family: 'Source Sans Pro', sans-serif;
}
.head_menu ul li a:hover{
    color: #333333;
}
.head_menu ul li:last-child {
    color: #9d9d9d;
}


#vnt-content .mod-content #vnt-sidebar{
  width: 300px;
  float: left;
  padding-right: 30px;
}
#vnt-content .mod-content #vnt-sidebar .box{
  width: 100%;
  position: relative;
}
#vnt-content .mod-content #vnt-sidebar .box-title .fTitle{
  width: 100%;
  position: relative;
  background: url('../images/bg_title.png')left top 38px no-repeat;

}
#vnt-main .box_mid .mid-title .titleL h1 {
    width: 100%;
    font-size: 30px;
    line-height: 38px;
    margin: 0px;
    padding:0;
    padding-top: 10px;
    color: #555555;
    font-family: 'Source Sans Pro', sans-serif;
    padding-left: 40px;
    background: url('../images/bg_title.png') left 17px no-repeat;
}
#vnt-content .mod-content #vnt-sidebar .box-title .fTitle h2{
  font-size: 30px;
  line-height: 38px;
  font-family: 'Source Sans Pro', sans-serif;
  color: #00abe5;
  padding-left: 41px;
      padding-top: 30px;
    padding-bottom: 10px;
    margin-top: 0;
}
#vnt-content .mod-content #vnt-sidebar .box .box-content{
  width: 100%;
  position: relative;
}
#vnt-content .mod-content #vnt-sidebar .box .box-content ul li{
  padding: 8px 0px;
    position: relative;
    background: url('../images/box_menu.png') no-repeat center left;
}
#vnt-content .mod-content #vnt-sidebar .box .box-content ul li a{
  font-size: 14px;
  line-height: 22px;
  color: #333333;
  padding-left: 15px;
}
#vnt-content .mod-content #vnt-sidebar .box .box-content ul li.current a,
#vnt-content .mod-content #vnt-sidebar .box .box-content ul li:hover a
{
  font-weight: bold;
  color: #00abe5;
}

#vnt-main .box_mid .mid-title h1{
  padding-bottom: 20px;
}


#vnt-content .mod-content #vnt-sidebar .box .box-content .new-box{
  position: relative;
  width: 100%;
  background: url('../images/box_icon.jpg')left top 17px no-repeat;
  padding-top: 15px;
  padding-bottom: 10px;
  border-bottom:dotted 1px #cccccc;
}
#vnt-content .mod-content #vnt-sidebar .box .box-content .new-box .date{
  width: 100%;
  position: relative;
  padding-left: 40px;
  font-size: 12px;
  line-height: 18px;
  color: #888888;
  text-align: left;
  padding-bottom: 3px;
}
#vnt-content .mod-content #vnt-sidebar .box .box-content .new-box p{
  font-size: 13px;
  line-height: 20px;
  color: #000000;
  text-align: justify;
    padding-left: 40px;
}
</style>
<!-- / Footer -->
@stop