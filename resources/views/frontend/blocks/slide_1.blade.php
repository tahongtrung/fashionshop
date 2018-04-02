
<div class="aa-header-top" style="margin-top: 20px">
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12">
            <div class="flexslider_1 ma-nivoslider">
                <div class="ma-loading"></div>

                <ul >
                    <!-- single slide item -->
                    <?php 
                    $data = DB::table('quangcao')->where('quangcao_trang_thai',1)->get();
                    ?>
                    <div id="ma-inivoslider-banner7" class="slides">
                        @foreach ($data as $item)
                        <li>

                            <img data-seq src="{!! asset('resources/upload/quangcao/'.$item->quangcao_anh) !!}" class="dn" alt="" title="#banner7-caption1"/>
                            <div id="banner7-caption2" class="banner7-caption nivo-html-caption nivo-caption">
                                <div class="timethai"></div>
                                <div class="banner7-content slider-2">
                                    <div class="title-container">
                                        <h1 class="title1">thời trang cao cấp</h1>
                                        <h2 class="title2" >Chất liệu cao cấp - bền đẹp</h2>                                          
                                    </div>
                                    <div class="banner7-des">
                                        <div class="des">
                                            <h1>sale up to!</h1>
                                            <h2>50% off</h2>
                                        </div>
                                    </div>                                             
                                    <!--  <img class="img1" src="images/slider/img-05.png" alt="" />   -->                              
                                </div>
                            </div>
                        </li>
                        @endforeach  
                    </div>            
                </ul>

                <!-- <div id="ma-inivoslider-banner7" class="slides">
                <img src="{!! asset('public/images/slide_1/dong_phuc_nu.jpg') !!}" class="dn" alt="" title="#banner7-caption1"  />                           
                    <img src="{!! asset('public/images/slide_1/jean_nam.jpg') !!}" class="dn" alt="" title="#banner7-caption2"  />
                </div> -->

                <!-- <div id="banner7-caption1" class="banner7-caption nivo-html-caption nivo-caption">
                    <div class="timethai"></div>
                    <div class="banner7-content slider-1">
                        <div class="title-container">
                            <h1 class="title1">đồng phục công sở</h1>
                            <h2 class="title2" >Chất liệu vải mềm mại và thoải mái</h2>           
                        </div>
                        <div class="banner7-des">
                            <div class="des">
                                <h1>sale up to!</h1>
                                <h2>30% off</h2>
                                <div class="check-box">
                                    <ul class="list-unstyled">
                                        <li>Áp dụng tất cả đồng phục công sở</li>
                                        <li>All combos $699.000VNĐ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>    
                        <img class="img1" src="images/slider/img-04.png" alt="" />               
                    </div>
                </div>                      
                <div id="banner7-caption2" class="banner7-caption nivo-html-caption nivo-caption">
                    <div class="timethai"></div>
                    <div class="banner7-content slider-2">
                        <div class="title-container">
                            <h1 class="title1">Quần Jeans nam cao cấp</h1>
                            <h2 class="title2" >Chất liệu jean cao cấp - bền đẹp</h2>                                          
                        </div>
                        <div class="banner7-des">
                            <div class="des">
                                <h1>sale up to!</h1>
                                <h2>50% off</h2>
                            </div>
                        </div>                                             
                        <!--  <img class="img1" src="images/slider/img-05.png" alt="" />   -->                              
                 <!--    </div>
             </div>  -->      
         </div><!-- /.flexslider -->
         <!--     </div> -->
     </div>
 </div>
</div>
