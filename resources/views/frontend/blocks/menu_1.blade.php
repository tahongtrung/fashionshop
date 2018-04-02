<!-- <div class="aa-header"> --> <!-- men_border -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="header_bottom_left">

					<div class="menu_1"> <!-- menu -->

						<ul class="megamenu skyblue_1">

							<li><a class="color1" href="{!! url('/') !!}" style="font: 15px tahoma, sans-serif;">Trang chủ</a></li>
							<?php 
							$nhom =  DB::table('nhom')->get();
							?>
							<?php $count = 2; ?>
							@foreach ($nhom as $menu_1)

							<li class="active_1 grid_1"> <a class="<?php echo "color". $count++  ?>" href="{!! url('nhom',$menu_1->nhom_url) !!}" style="font: 15px tahoma, sans-serif;" target="_self"> {!! $menu_1->nhom_ten !!}</a>

								<?php 
								$loaisp = DB::table('loaisanpham')->where('nhom_id',$menu_1->id)->get();
								?>
								<div class="megapanel">
									<div class="row_1">
										<div class="col1_1">
											<div class="h_nav_1"> 
												<ul>
													@foreach ($loaisp as $menu_2)
													<li><a href="{!! url('loai-san-pham',$menu_2->loaisanpham_url) !!}" style="font: 15px tahoma, sans-serif;margin-top: 15px;">{!! $menu_2->loaisanpham_ten !!}</a></li> 
													@endforeach 
												</ul>	
											</div>
										</div>
									</div>
								</div>
							</li>
							@endforeach
						</ul> 
				 	</div>
				</div> 
	 		</div>
		</div>
	</div> 
<!-- </div> -->