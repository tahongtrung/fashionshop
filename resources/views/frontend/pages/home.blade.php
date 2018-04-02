@extends('frontend.master')
@section('content')

<!-- Start slider -->
<!-- slide_1 -->
@include('frontend.blocks.slide_1')
@include('frontend.blocks.menu_1')

<div class="content">
  <div class="container">
    <div class="content-top">
      <h1 style="margin-top: 30px; border-bottom: 1px solid #e5e5e5">SẢN PHẨM NỔI BẬT</h1> <!--  -->
      <div class="content-top1">

       <!-- start single product item -->
       @foreach ($sanpham as $item)

       <?php 
       $sanphamkhuyenmai = DB::select('select* from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.sanpham_da_xoa = 0 and sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1');

       ?>
       <div class="col-md-6 col-md2 text-center divSanPham">
        <div class="col-md1 simpleCart_shelfItem">
          <a href="{!! url('san-pham',$item->sanpham_url) !!}">
            <img width="500" height="600" src="{!! asset('resources/upload/sanpham/'.$item->sanpham_anh) !!}" alt="">
          </a>
          <br/><br/>
          <h3><a href="{!! url('san-pham',$item->sanpham_url) !!}" style="font-family: tahoma; color: #00abe5; ">{{$item->sanpham_ten }}</a></h3>
          <div class="price">
            <h5 class="item_price">{{ number_format("$item->sanpham_gia",0,",",".") }} VNĐ</h5>
            <a href="{!! url('mua-hang',[$item->id,$item->sanpham_url,0]) !!}" class="item_add_1">Mua Ngay</a>
            <div class="clearfix"> </div>
          </div>
        </div>
      </div> 

      @endforeach
    </div>  
    <div style="float: right; margin-right: 15px;">
     @include('frontend.blocks.pagination')
   </div>

 </div>
</div>

</div>


</style>
@stop

@section('styles')
<!-- slide_1 -->
<link href="{{ url('public/frontend/slide_1/css/bootstrap.min.css') }} " rel="stylesheet">
<link href="{{ url('public/frontend/slide_1/css/nivo-slider.css') }}" rel="stylesheet">
<link href="{{ url('public/frontend/slide_1/css/animate.css') }}" rel="stylesheet">
<link href="{{ url('public/frontend/slide_1/css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ url('public/frontend/slide_1/css/style.css') }}" rel="stylesheet">
<link href="{{ url('public/frontend/slide_1/css/responsive.css') }}" rel="stylesheet">

@stop

@section('scripts')

<!-- slide_1 -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="{{ url('public/frontend/slide_1/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/frontend/slide_1/js/jquery.nivo.slider.pack.js') }}"></script>
<script src="{{ url('public/frontend/slide_1/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('public/frontend/slide_1/js/main.js') }}"></script>

<script type="text/javascript">
  /* Main Slideshow */
  $(window).load(function() {
    $(document).off('mouseenter').on('mouseenter', '.pos-slideshow', function(e){
      $('.ma-banner7-container .timethai').addClass('pos_hover');
    });
    $(document).off('mouseleave').on('mouseleave', '.pos-slideshow', function(e){
      $('.ma-banner7-container .timethai').removeClass('pos_hover');
    });
  });
  $(window).load(function() {
    $('#ma-inivoslider-banner7').nivoSlider({
      effect: 'random',
      slices: 15,
      boxCols: 8,
      boxRows: 4,
      animSpeed: 1000,
      pauseTime: 6000,
      startSlide: 0,
      controlNav: false,
      controlNavThumbs: false,
      pauseOnHover: true,
      manualAdvance: false,
      prevText: 'Prev',
      nextText: 'Next',
      afterLoad: function(){
      },     
      beforeChange: function(){ 
      }, 
      afterChange: function(){ 
      }
    });
  });
  $(document).ready(function(){
    /* timely-owl */
    $("#timely-owl .owl").owlCarousel({
      autoPlay : false,
      items : 1,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [991,1],
      itemsTablet: [767,2],
      itemsMobile : [480,1],
      slideSpeed : 1000,
      paginationSpeed : 1000,
      rewindSpeed : 1000,
      navigation : true,
      stopOnHover : true,
      pagination : false,
      scrollPerPage:true,
    });
    /* special-offer slider */
    $("#special-offer .owl").owlCarousel({
      autoPlay : false,
      items : 1,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [991,1],
      itemsTablet: [767,2],
      itemsMobile : [480,1],
      slideSpeed : 3000,
      paginationSpeed : 3000,
      rewindSpeed : 3000,
      navigation : true,
      stopOnHover : true,
      pagination : false,
      scrollPerPage:true,
    });
    /* latest-news slider */
    $("#latest-news .owl").owlCarousel({
      autoPlay : false,
      items : 1,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [991,1],
      itemsTablet: [767,2],
      itemsMobile : [480,1],
      slideSpeed : 1000,
      paginationSpeed : 1000,
      rewindSpeed : 1000,
      navigation : true,
      stopOnHover : true,
      pagination : false,
      scrollPerPage:true,
    });
    /* clients-say slider */
    $("#clients-say .owl").owlCarousel({
      autoPlay : false,
      items : 1,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [991,1],
      itemsTablet: [767,2],
      itemsMobile : [480,1],
      slideSpeed : 3000,
      paginationSpeed : 3000,
      rewindSpeed : 3000,
      navigation : true,
      stopOnHover : true,
      pagination : false,
      scrollPerPage:true,
    });
    /* featured-products slider */
    $("#featured-products .owl").owlCarousel({
      autoPlay : false,
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [991,2],
      itemsTablet: [767,2],
      itemsMobile : [480,1],
      slideSpeed : 3000,
      paginationSpeed : 3000,
      rewindSpeed : 3000,
      navigation : true,
      stopOnHover : true,
      pagination : false,
      scrollPerPage:true,
    });
    /* new-products slider */
    $("#new-products .owl").owlCarousel({
      autoPlay : false,
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [991,2],
      itemsTablet: [767,2],
      itemsMobile : [480,1],
      slideSpeed : 3000,
      paginationSpeed : 3000,
      rewindSpeed : 3000,
      navigation : true,
      stopOnHover : true,
      pagination : false,
      scrollPerPage:true,
    });
  });
</script>

@stop