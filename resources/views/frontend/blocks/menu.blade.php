  
  
<div id="vnt-menutop">
        <div class="menu-fixed">
            <div class="menutop">
              <ul>
                <li><a href="{!! url('/') !!}" style="font: 15px tahoma, sans-serif;">Trang chủ</a></li>
                <?php 
                    $nhom =  DB::table('nhom')->get();
                ?>
                @foreach ($nhom as $menu_1)
                <li><a href="{!! url('nhom',$menu_1->nhom_url) !!}" style="font: 15px tahoma, sans-serif;" target="_self"> {!! $menu_1->nhom_ten !!}<span class="careti"></span></a>
                    <?php 
                        $loaisp = DB::table('loaisanpham')->where('nhom_id',$menu_1->id)->get();
                    ?>
                    <ul>
                        @foreach ($loaisp as $menu_2)
                            <li><a href="{!! url('loai-san-pham',$menu_2->loaisanpham_url) !!}" style="font: 15px tahoma, sans-serif;">{!! $menu_2->loaisanpham_ten !!}</a></li>             
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
                <div class="clear"></div>
            </div>
        </div>
 </div>

<!-- 
                        <li ><a href="/ao-khoac-han-quoc.html">Áo khoác Hàn Quốc</a></li>
                        <li  ><a href="/ao-khoac-du-breaker.html">Áo khoác dù Breaker</a></li>
                        <li  ><a href="/ao-khoac-cardigan">Áo khoác Cardigan</a></li>
                        <li  ><a href="/ao-vest-nam.html">Áo vest nam</a></li>
                        <li  ><a href="/ao-gile-nam.html">Áo Gile</a></li>
                        <li  ><a href="/ao-khoac-da.html">Áo khoác da</a></li>
                        <li  ><a href="/ao-khoac-jean.html">Áo khoác Jean</a></li>
                        <li  ><a href="/ao-khoac-kaki-bomber.html">Áo khoác Kaki</a></li> -->
           