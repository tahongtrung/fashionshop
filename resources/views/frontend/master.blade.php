
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
  <title>Web bán quần áo </title>
  
  <link href="{{ url('public/css/reset.css') }}" rel="stylesheet">    
  <!-- Custom Theme files -->
  <!-- Bootstrap -->
  <link href="{{ URL::asset('public/frontend/css/bootstrap.css') }}" rel="stylesheet">   
  <!-- SmartMenus jQuery Bootstrap Addon CSS -->
  <link href="{{ URL::asset('public/frontend/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">

  <!-- của template -->
  <link href="{{ URL::asset('public/frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

  <!-- <link href="public/frontend/menu/global.css" rel="stylesheet" type="text/css" media="all" /> -->
  <!--//theme-style-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Fashion Mania Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

  <script src="{{ URL::asset('public/frontend/template/js/simpleCart.min.js') }}"> </script>
  <!-- <script src="public/frontend/template/js/jquery.min.js"></script> -->
  <script src="{{ URL::asset('public/frontend/template/js/jquery.min.js') }}"></script>
  <!--theme-style-->
  <link href="{{ URL::asset('public/frontend/template/css/style.css" rel="stylesheet') }}" type="text/css" media="all" />  
  <!-- style menu -->

  <!-- hết của template -->


  <!-- Font awesome -->
  <link href="{{ url('public/frontend/css/font-awesome.css') }}" rel="stylesheet">

  <!-- Product view slider -->
  <link rel="stylesheet" type="text/css" href="{{ url('public/frontend/css/jquery.simpleLens.css') }}">    
  <!-- slick slider -->
  <link rel="stylesheet" type="text/css" href="{{ url('public/frontend/css/slick.css') }}">
  <!-- price picker slider -->
  <link rel="stylesheet" type="text/css" href="{{ url('public/frontend/css/nouislider.css') }}">
  <!-- Theme color -->
  <link id="switcher" href="{{ url('public/frontend/css/theme-color/green-theme.css') }}" rel="stylesheet">
  <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
  <!-- Top Slider CSS -->
  <link href="{{ url('public/frontend/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

  <!-- Main style sheet -->
  <link href="{{ url('public/frontend/css/style.css') }}" rel="stylesheet">    

  <!-- Google Font -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link href="{{ url('public/frontend/magiczoomplus/magiczoomplus.css') }}" rel="stylesheet">
  <script src="{{ url('public/frontend/magiczoomplus/magiczoomplus.js') }}"></script> 
<!--   <link href="public/frontend/menu/style_menu.css" rel="stylesheet" type="text/css" media="all" /> -->



  <!-- menu_1/ -->
  <link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
  <link href="{{ URL::asset('public/frontend/menu_1/css_1/bootstrap.css') }}" rel='stylesheet' type='text/css' />
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- Custom Theme files -->
  <link href="{{ URL::asset('public/frontend/menu_1/css_1/style.css') }}" rel='stylesheet' type='text/css' />




  <style> 
    .divSanPham{
      margin:15px 0px;
    }
    .fa{
      color: #52D0C4;
    }
  </style> 
  @yield("styles")

</head>
<body>
 <!-- SCROLL TOP BUTTON -->
 <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
 <!-- END SCROLL TOP BUTTON -->
 <header id="aa-header">
  <!--   start header top   -->
  <div class="aa-header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-header-top-area" style="margin: 0px;">
            <!-- start header top left -->
            <div class="aa-header-top-left">
              <!-- start language -->

              <div class="cellphone hidden-xs">
                <p>Thương mại điện tử</p>
              </div>
              <!-- / language -->

              <!-- start cellphone -->
              <div class="cellphone hidden-xs">
                <p><span class="fa fa-phone"></span>012-1918-7548</p>
              </div>
              <!-- / cellphone -->
            </div>
            <!-- / header top left -->
            <div class="aa-header-top-right">
              <ul class="aa-head-top-nav-right" style="margin: 0px;">
                @if (Auth::check())
                  <li class="hidden-xs"><strong>{{ Auth::user()->name }}</strong></li>
                  @if (Auth::user()->loainguoidung_id != 2)
                    <li class="hidden-xs"><a href="{{ url('/admin/bang-dieu-khien') }}">Bảng đk</a></li>
                    @else
                    <?php 
                    $kh = DB::table('khachhang')->where('user_id',Auth::user()->id)->first();
                    ?>
                    <li class="hidden-xs"><a href="{{ url('/danhsachdonhang',[$kh->id]) }}">Đơn hàng</a></li>
                  @endif
                  <li class="hidden-xs"><a href="{{ url('/logout') }}">Thoát</a></li>
                  @else
                    <li class="hidden-xs"><a href="{{ url('/register') }}">Đăng kí</a></li>
                    <li class="hidden-xs"><a href="{{ url('/login') }}">Đăng nhập</a></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <!-- / header top  -->

  <div class="aa-header-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-header-bottom-area">
            <!-- @include('frontend.blocks.marquee', ['mar_content' => 'Shop Quần Áo Nhóm 10 - Good Cloths - Good Life']) -->
            <!-- Support section -->
            <!-- start header bottom  -->
            <!-- logo  -->
            <div class="aa-logo ">
              <!-- Text based logo -->
              <a href="{!! URL('/') !!}">
                <span class="fa fa-shopping-cart"></span>
                <p> Shop Quần áo <span>Good cloths - Good life</span></p>
              </a>
              <!-- img based logo -->
              <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
            </div>


            <div class="aa-cartbox" style="margin-top: 15px; height: 40px;">
             <div  class="box_11">
               <a class="aa-cart-link" href="{!! url('gio-hang') !!}">
                <!-- <span class="fa fa-shopping-basket"></span> -->
                <?php $total = Cart::total(); ?>
                <div class="aa-cart-title" style="color: #fff;">Giỏ hàng: {!! number_format("$total",0,",",".") !!}  VNĐ  (<?php 
                  $count = Cart::count(); 
                  print_r($count);
                  ?>) <img src="{!! url('public/images/bag.png') !!}" alt=""/> </div>

                  <div class="clearfix"> </div>
                </a>
              </div>
            </div>

            <!-- / logo  -->
            <!-- cart box -->

            @include('frontend.blocks.search')
            <!-- / cart box -->
            <!-- search box -->

            <!-- / search box -->     
            
          </div>

        </div>
      </div>
    </div>
  </div>

<script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('h1').innerHTML );var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async=1; ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=6e6d70d0998864e9b0a17df813f9bbde&data=eyJzc29faWQiOjQ4MDQ4MzYsImhhc2giOiJmYjg1ZTRjYWMxOGRmMWI2NjFjZDcyZDU5Nzc0NDZmYSJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script> 
  <!-- / header bottom  -->
</header>

<!-- / header section -->
<!-- menu -->





@yield("content")
@include("frontend.blocks.footer")
<!--   <script>$(document).ready(function(){$(".memenu").memenu();});</script> -->
<!--//footer-->
<!-- / Content pages -->

<!-- / product category -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- start menu -->
<link href="{{ URL::asset('public/frontend/template/css/memenu.css') }}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{ URL::asset('public/frontend/template/js/memenu.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ URL::asset('public/frontend/js/bootstrap.js') }}"></script>  
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="{{ URL::asset('public/frontend/js/jquery.smartmenus.js') }}"></script>
<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="{{ URL::asset('public/frontend/js/jquery.smartmenus.bootstrap.js') }}"></script>  
<!-- To Slider JS -->
<!-- <script src="{{ url('public/frontend/js/sequence.js') }}"></script>
<script src="{{ url('public/frontend/js/sequence-theme.modern-slide-in.js') }}"></script>  --> 
<!-- Product view slider -->
<script type="text/javascript" src="{{ url('public/frontend/js/jquery.simpleGallery.js') }}"></script>
<script type="text/javascript" src="{{ url('public/frontend/js/jquery.simpleLens.js') }}"></script>
<!-- slick slider -->
<script type="text/javascript" src="{{ url('public/frontend/js/slick.js') }}"></script>
<!-- Price picker slider -->
<script type="text/javascript" src="{{ url('public/frontend/js/nouislider.js') }}"></script>
<!-- Custom js -->
<!-- <script src="{{ url('public/frontend/js/custom.js') }}"></script>  -->

<!-- My scripts -->
<script src="{{ url('public/frontend/js/myscript.js') }}"></script> 
@yield("scripts")


<!-- menu_1 -->

<!-- start menu -->
<!--   <script type="text/javascript" src="{{ url('public/frontend/menu_1/js_1/jquery-1.11.1.min.js') }}"></script> -->
<link href="{{ url('public/frontend/menu_1/css_1/megamenu.css') }}"  rel="stylesheet" type="text/css" media="all" />
<script src="{{ URL::asset('public/frontend/menu_1/js_1/simpleCart.min.js') }}"> </script>
<script type="text/javascript" src="{{ url('public/frontend/menu_1/js_1/megamenu.js') }}" ></script>
<script>$(document).ready(function(){
  $(".megamenu").megamenu();

});</script>
</body>
</html>