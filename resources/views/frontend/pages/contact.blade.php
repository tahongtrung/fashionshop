@extends('frontend.master')
@section('content')
@include('frontend.blocks.menu_1')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! url('public/images/ContactUs.jpg') !!}" alt="fashion img" style="width: 1920px; height: 300px;" >
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Liên hệ</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>         
          <li class="active">Liên hệ</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  </section>
  <!-- / product category -->
  <!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2 style="font:30px tahoma, sans-serif; color:green;">Chúng tôi đang chờ để được hỗ trợ bạn</h2>
             <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quos.</p> -->
           </div>
           <!-- contact map -->
           <div class="aa-contact-map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5181704446904!2d106.78493111435118!3d10.848137392272886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752772b245dff1%3A0xb838977f3d419d!2zSOG7jWMgVmnhu4duIEPDtG5nIE5naOG7hyBCxrB1IENow61uaCBWaeG7hW4gVGjDtG5nIEPGoSBT4bufIDI!5e0!3m2!1sen!2s!4v1488367028705" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="" method="POST">
                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" name="txtName" placeholder="Your Name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" name="txtMail" placeholder="Email" class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" name="txtContent" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button class="aa-secondary-btn">Gửi</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right" style="font: tahoma, sans-serif;">
                   <address>
                     <h4 style="font:24px tahoma, sans-serif; color:red;"><b><i>Shop quần áo nhóm 10</i></b></h4>
                     <p>Chất lượng là hàng đầu</p>
                     <p><span class="fa fa-home"></span>Quận 9-Hồ Chí Minh</p>
                     <p><span class="fa fa-phone"></span>01219187548</p>
                     <p><span class="fa fa-envelope"></span>Email: lordknight1904@gmail.com</p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
<!-- Footer -->

<!-- / Footer -->
@stop