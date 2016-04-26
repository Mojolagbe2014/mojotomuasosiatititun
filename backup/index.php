<?php
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
    <title>Tom Associates | Best in Class Management Training in Nigeria</title>
    <meta name="description" content="Tom Associates is a foremost and very consistent management training institution in Nigeria, focusing on the development of private and public sector managers since 1992.">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Favicons
	================================================== -->
	<link rel="icon" href="tom_favicon.ico" type="image/x-icon" />
	
	
	<!-- CSS
	================================================== -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="css/style.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Prettyphoto -->
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<!-- Bxslider -->
	<link rel="stylesheet" href="css/jquery.bxslider.css">
    
    <link rel="stylesheet" href="rs-plugin/css/settings.css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<style>
/* Revolution Slider */
.revolution-slider {
	padding-bottom: 1px;
	background: #fff;
	margin-top: 0;
	border-bottom: 1px solid;
}
.revolution-slider .bannercontainer {
	width: 100%;
	position: relative;
	padding: 0;
	background: #272727;
}
.revolution-slider .banner {
	width: 100%;
	position: relative;
	z-index: 0;
}
.revolution-slider .tp-caption.revolution-starhotel.bigtext {
	position: absolute;
	color: #fff;
	text-shadow: none;
	font-weight: 600;
	font-size: 45px;
	line-height: 55px;
	font-family: "Open Sans";
	margin: 0px;
	border-width: 0px;
	border-style: none;
	white-space: nowrap;
	padding: 0px 4px;
	padding-top: 1px;
	text-shadow: 0px 3px 3px rgba(0,0,0, 0.3);
}
.revolution-slider .tp-caption.revolution-starhotel.bigtext span {
	letter-spacing: -3px;
}
.revolution-slider .tp-caption.revolution-starhotel.bigtext span i {
	font-size: 0.5em;
	vertical-align: middle;
}
.revolution-slider .tp-caption.revolution-starhotel.smalltext {
	position: absolute;
	color: #fff;
	text-shadow: none;
	font-weight: normal;
	font-size: 30px;
	line-height: 30px;
	font-family: "Open Sans";
	margin: 0px;
	border-width: 0px;
	border-style: none;
	white-space: nowrap;
	padding: 0px 4px;
	padding-top: 1px;
	text-shadow: 0px 3px 3px rgba(0,0,0, 0.3);
	text-align: left;
}
</style>
</head>
	

	<div class="body-inner">
	<!-- Header start -->
  <?php include('tools/nav-bar.php');?>
	<!--/ Header end -->
	
    <!-- Revolution Slider -->
<section class="revolution-slider">
  <div class="bannercontainer">
    <div class="banner">
      <ul>
        <!-- Slide 1 -->
        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" > 
          <!-- Main Image --> 
          <img src="images/slider/tom_welcome2.jpg" style="opacity:0;" alt="slidebg1"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat"> 
          <!-- Layers -->           
          <!-- Layer 1 -->
          <div class="caption sft revolution-starhotel bigtext"  
          				data-x="300" 
                        data-y="250" 
                        data-speed="700" 
                        data-start="1700" 
                        data-easing="easeOutBack"> 
						<span>Welcome to Tom Associates Training</span></div>
           <div class="caption sft revolution-starhotel smalltext"  
          				data-x="550" 
                        data-y="310" 
                        data-speed="800" 
                        data-start="1700" 
                        data-easing="easeOutBack">
						<span>...Keep the quality up</span></div>
        </li>
		<!-- Slide 2 -->
        <li data-transition="boxfade" data-slotamount="7" data-masterspeed="1000" > 
          <!-- Main Image --> 
          <img src="images/slider/tom_courses2.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"> 
          <!-- Layers -->           
          <!-- Layer 1 -->
        <div class="caption sft revolution-starhotel bigtext"  
          				data-x="300" 
                        data-y="250" 
                        data-speed="700" 
                        data-start="1700" 
                        data-easing="easeOutBack"> 
						<span>Conducive Classrooms</span></div>
          
        
        </li>
        	<!-- Slide 3 -->
        <li data-transition="boxfade" data-slotamount="7" data-masterspeed="1000" > 
          <!-- Main Image --> 
          <img src="images/slider/tom_courses.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"> 
          <!-- Layers -->           
          <!-- Layer 1 -->
        <div class="caption sft revolution-starhotel bigtext"  
          				data-x="300" 
                        data-y="250" 
                        data-speed="700" 
                        data-start="1700" 
                        data-easing="easeOutBack"> 
						<span>Cutting Edge Courses</span></div>
        </li>
         	<!-- Slide 4 -->
        <li data-transition="slide" data-slotamount="7" data-masterspeed="1000" > 
          <!-- Main Image --> 
          <img src="images/slider/tom_training.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"> 
          <!-- Layers -->           
          <!-- Layer 1 -->
           <div class="caption sft revolution-starhotel bigtext"  
          				data-x="300" 
                        data-y="250" 
                        data-speed="700" 
                        data-start="1700" 
                        data-easing="easeOutBack"> 
						<span>Talented Trainers</span></div>
       
        </li>
      </ul>
    </div>
  </div>
</section>
	
 <!-- Features start -->
    <section id="features" style="z-index:100" class="wow fadeInUp" >
    	<div class="container" style="margin-top:20px;">
          <div style="text-align:center; margin-top:-90px; margin-bottom:15px; display:block;">
    <img src="images/TomAssociatesAds.gif" width="728" height="90">
      </div>
      <!-- Service box start -->
    <section id="service" class="wow fadeInUp" >
    	<div class="container">
    		<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="service-content">
					    <a href="trainings"><span class="service-icon"><i class="fa fa-graduation-cap img-circle wow flipInX"></i></span></a>
					    <h3 >All Upcoming Courses</h3>
					    <p>Browse the list of all our courses for the year to enable you plan ahead</p>
					</div>
				</div><!--/ End first service -->
				<div class="col-md-3 col-sm-3">
					<div class="service-content">
					    <a href="resources"><span class="service-icon"><i class="fa fa-book img-circle wow flipInX"></i></span></a>
					    <h3>Articles / Resources</h3>
					    <p>view our informative and educative articles</p>
					</div>
				</div><!--/ End 2nd service -->
				<div class="col-md-3 col-sm-3">
					<div class="service-content">
					    <a href="#brochure" data-rel="prettyPhoto" ><span class="service-icon"><i class="fa fa-download img-circle wow flipInX"></i></span></a>
					    <h3>Download Brochure</h3>
					    <p>Download our course brochure to help you stay ahead</p>
					</div>
				</div><!--/ End 3rd service -->
				<div class="col-md-3 col-sm-3">
					<div class="service-content last">
					    <a href="downloads"><span class="service-icon"><i class="fa fa-folder img-circle wow flipInX"></i></span></a>
					    <h3>Our Library</h3>
					    <p>Browse our library to find career changing information</p>
					</div>
				</div><!--/ End 4th service -->
    		</div>
            <div class="row" id="brochure" style="display:none;"> 
			<?php $bro = $database->select(false,"brochure");?>
                <h2 style="text-align:center; display:block;"><?php echo $bro['brochuretitle'];?></h2>
              
				<div class="col-md-3 col-sm-3" style="width:220px;">
					<div> <a href="tools/download?pdf"><img src="images/pdf.png" width="217" height="215"></a>
				     <p style="text-align:center;">PDF Version</p>
				  </div>
				</div><!--/ End first service -->
				<div class="col-md-3 col-sm-3" style="width:220px;">
					<div> <a href="tools/download?excel"><img src="images/excel.png" width="217" height="215"></a>
				     <p style="text-align:center;">Excel Version</p>
					</div>
				</div><!--/ End 2nd service -->
				
    		</div>
    	</div>
    </section><!-- Service box end -->
    		<div class="row">
    			<div class="col-sm-6 wow fadeInLeft">
    				<div class="feature-wrapper1">
	    				<div class="feature-content-wrapper-side" style=" content:inherit;">
                        <h2 style="text-align:right;padding-right:40px; margin-top:0px;">About Us</h2>
	    					<p style="line-height:30px; width:92%; text-align:justify;">Tom Associates is a foremost and very consistent management training institution in Nigeria, focusing on the development of private and public sector managers since 1992. Each year, we organise an average of 200 workshops. Our in-plant courses (60% of total) meet peculiar needs of the clients through programme objectives and contents design. The open subscription courses (40% of total) offer participants the opportunity to meet people of different backgrounds and share experiences...<br /> <a href="about-us" class="read-more" style="color:#9B2231;">Read More <i class="fa fa fa-long-arrow-right"></i></a></p>
<br />
                        <!-- Blog category start -->
						<div class="widget widget-categories" style="width:92%;">
							<h2 style="margin-bottom:28px; text-align:right; padding-right:40px;">In-plant Courses</h2>
                         
                            <?php
							echo ShowCategories();
							  ?>
				          
                           <a href="corporate-training" class="read-more" style="color:#9B2231;">More In-plant Courses <i class="fa fa fa-long-arrow-right"></i></a>
                            
						</div><!-- Blog category end -->
                         <br /> 
	    					
							<div style="margin-top:10px;">
                             <div class="fb-like-box" data-href="http://www.facebook.com/pages/Tom-Associates-Training/300089356711055" data-width="520" data-height="350" data-show-faces="true" data-stream="false" data-header="true"></div>
                            </div>
    					</div>
    				</div>
    			</div>

    			<div class="col-sm-6 wow fadeInRight">
    				<div class="">
	    				<div class="">
	    					<h2 style="text-align:right;padding-right:40px; margin-top:7px;">Upcoming Training</h2>
	    					<?php
							echo ShowUpcomingEvents(0,5);
							?>
				          
                             <br /> <a href="trainings" class="read-more" style="color:#9B2231;">View More Upcoming Courses<i class="fa fa fa-long-arrow-right"></i></a>
    					</div>
    				</div>
    			</div><!-- Features right side end -->
    		</div><!-- Row end -->
    	</div><!-- Container end -->
    </section> <!-- Features end -->

    <!-- Portfolio start -->
	<section id="portfolio">
		<div class="container">
		  <div class="row wow bounceIn">
		  		<div class="col-md-12">
		  			<div class='text-center'>
			    		<h2 class="title"><span>From our training gallery</span></h2>
			    	</div>
		  		</div>
		  </div><!--/ Title row end -->
		  <div class='row wow fadeInUp'>
		    <div class='col-lg-12'>
		      <div class="carousel slide" id="portfolio-carousel">
		        <div class="carousel-inner" style="height:auto;" id="gallery">
		          	<!--/ Item active end -->
                   <?php include('tools/get_gallery.php');?>
					<!--/ Item end -->
		        </div><!-- Carousel inner end -->

	        	<div class="dart-carousel-controller">
			        <a data-slide="prev" href="#portfolio-carousel" class="left"><i class="fa fa-chevron-left"></i></a>
			        <a data-slide="next" href="#portfolio-carousel" class="right"><i class="fa fa-chevron-right"></i></a>
		    	</div><!-- Controller end -->

		      </div><!-- Carousel end -->                          
		    </div><!-- Main Col end -->
		  </div><!--/ Main row end -->
		</div><!--/ Container end -->
	</section><!-- Portfolio end -->

    <!-- Blog & Service -->
    <section id="blog-service">
    	<div class="container">
    		<div class="row">
		   	 	<div class="col-md-12">
		  			<div class='text-center'>
			    		<h2 class="title wow bounceIn"><span>Latest Knowledge in motion series, Articles &amp; Quotes</span></h2>
			    	</div>
		  		</div>

	   	 		<!--Blog start-->
	   	 		<div class="col-md-6 wow slideInLeft">
	   	 			<div class="row">
                     <?php
							$data = $database->select(true,'uploads',"","id desc limit 0, 2");
							foreach($data as $data){
							?>
							
	   	 				<div class="col-sm-6 col-xs-6">
							<div class="media recent-post">
								<img src="images/audio.jpg" alt="blog" />
									
								<div class="media-body post-body">
									<h3><a href="#"><?php echo $data['title'];?></a></h3>
									<p class="post-meta">
										<span class="post-meta-author"><a href="#">Posted : <?php echo time_ago($data['date_posted']);?></a></span>
										
									</p>
									<div class="post-excerpt">
									
									<a href="#" class="read-more">Download <i class="fa fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div><!-- end media -->
	   	 				</div><!--/ end col-sm-6 -->
	   	 			<?php
							}
							?>
	   	 			</div><!-- Row end -->
	   	 		</div><!--Blog end-->

	   	 		<!-- Services start -->
	   	 		<div class="col-md-6 wow slideInRight">
	   	 			<!-- Toggle start -->
					<div class="panel-group" id="accordion">
		              <div class="panel panel-default">
		                <div class="panel-heading">
		                <h4 class="panel-title"> 
		                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Quote of the day</a> 
		                </h4>
		                </div>
		                <div id="collapseOne" class="panel-collapse collapse in">
		                  <div class="panel-body">
                          <?php
						  $quote = $database->select(false,'quotes',"","quote_id desc");
						  ?>
		                    <p><?php echo $quote['content'];?></p>
		                  </div>
		                </div>
		              </div><!--/ Panel 1 end-->
		              <div class="panel panel-default">
		                <div class="panel-heading">
		                <h4 class="panel-title">
		                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo"> Latest Article</a>
		            	</h4>
		                </div>
		                <div id="collapseTwo" class="panel-collapse collapse">
		                  <div class="panel-body">
                         
		                      <?php
						  echo ShowArticles("","",true);
						  ?>

		                  </div>
		                </div>
		              </div><!--/ Panel 2 end-->
		              <!--/ Panel 3 end-->
		            </div><!-- Toggle end -->
	   	 		</div><!-- Services end -->
    		</div><!--/ row end-->
    	</div><!--/ Container end-->
    </section><!-- Blog & Service End -->

    <!-- Testimonial start-->
	<!-- Testimonial end-->


    <!-- Clients start -->
	<!-- Clients end -->
	
	<!-- Main Footer start -->
	<section id="footer-wrapper">
      <!-- Newsletter start -->
    <div id="newsletter" class="wow slideInLeft">
    	<div class="container">
    		<div class="row">
				<form class="form-inline" role="form">
                      <div class="form-group col-lg-9 col-md-8 col-sm-7 col-xs-7">
                         <input type="text" style="width:50%; float:left;" class="form-control" placeholder="Enter Fullname" >
                         <input type="text" style="width:50%;float:right;"  class="form-control" placeholder="Enter Email Address" >
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg">Join Our Newsletter</button>
                 </form>
    		</div>
    	</div>
    </div>
    <!-- Newsletter end -->

		<!-- Footer top start -->
	<?php include('tools/footer.php');?>
	<!-- Footer section end -->

	<!-- Javascript Files
	================================================== -->
	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<!-- PrettyPhoto -->
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<!-- Bxslider -->
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<!-- Isotope -->
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<!-- Wow Animation -->
	<script type="text/javascript" src="js/wow.min.js"></script>
	<!-- SmoothScroll -->
	<script type="text/javascript" src="js/smoothscroll.js"></script>
	<!-- Animated Pie -->
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>


	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>
    
    <script type="text/javascript" >
    $(document).ready(function(e) {
       // Revolution slider
    if (jQuery().revolution) {
        jQuery('.banner').revolution({
            delay: 9000,
            startwidth: 1170,
            startheight: 449,
            autoHeight:"off",
			fullScreenAlignForce:"off",
            
            onHoverStop: "on",

            thumbWidth: 100,
            thumbHeight: 50,
            thumbAmount: 3,

            hideThumbsOnMobile: "on",
            hideBulletsOnMobile: "on",
            hideArrowsOnMobile: "on",
            hideThumbsUnderResoluition: 0,
			
			hideThumbs:0,
			hideTimerBar:"on",

			keyboardNavigation:"on",
			
            navigationType: "none",
            navigationArrows: "solo",
            navigationStyle: "round",

            navigationHAlign: "center",
            navigationVAlign: "bottom",
            navigationHOffset: 30,
            navigationVOffset: 30,

            soloArrowLeftHalign: "left",
            soloArrowLeftValign: "center",
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: "right",
            soloArrowRightValign: "center",
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            touchenabled: "on",
			swipe_velocity:"0.7",
			swipe_max_touches:"1",
			swipe_min_touches:"1",
			drag_block_vertical:"false",

            stopAtSlide: -1,
            stopAfterLoops: -1,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            hideSliderAtLimit: 0,

            dottedOverlay: "none",

			fullWidth:"off",
			forceFullWidth:"off",
            fullScreen: "off",
            fullScreenOffsetContainer: "#topheader-to-offset",

            shadow: 0

        });
    }

    });
    </script>
    
	</div>
</body>
</html>