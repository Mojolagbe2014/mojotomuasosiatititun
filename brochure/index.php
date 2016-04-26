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

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
	

	<div class="body-inner">
	<!-- Header start -->
  <?php include('tools/nav-bar.php');?>
	<!--/ Header end -->
	

	<!-- Slider start -->
	<section id="home" >	
		<!-- Carousel -->
    	<div id="main-slide" class="carousel slide" data-ride="carousel" >

			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#main-slide" data-slide-to="0" class="active"></li>
			    <li data-target="#main-slide" data-slide-to="1"></li>
			    <li data-target="#main-slide" data-slide-to="2"></li>
                 <li data-target="#main-slide" data-slide-to="3"></li>
			</ol><!--/ Indicators end-->

			<!-- Carousel inner -->
			<div class="carousel-inner" >
			    <div class="item active">
			    	<img class="img-responsive" src="images/slider/tom_welcome2.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                   		  <h2 class="animated2">
                        		<span style="color:#FF0000;"><strong>Welcome to Tom Associates Training</strong></span>
                        	</h2>
                          <h3 class="animated3">
                            	<span style="color:#FF0000;">...Keep the quality up</span>
                            </h3>
                        </div>
                    </div>
			    </div><!--/ Carousel item end -->
			    <div class="item">
			    	<img class="img-responsive" src="images/slider/tom_courses2.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h2 class="animated4">
                                <span><strong>Conducive Classrooms</strong></span>
                            </h2>
                           	
                                
                        </div>
                    </div>
			    </div><!--/ Carousel item end -->
			    <div class="item">
			    	<img class="img-responsive" src="images/slider/tom_courses.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h2 class="animated7">
                                <span style="color:#FF0000;" ><strong>Cutting Edge Courses</strong></span>
                            </h2>
                         	
                          
                        </div>
                    </div>
			    </div><!--/ Carousel item end -->
                 <div class="item">
			    	<img class="img-responsive" src="images/slider/tom_training.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h2 class="animated7">
                                <span style="color:#FF0000;"><strong>Talented Trainers</strong></span>
                            </h2>
                         	
                         
                        </div>
                    </div>
			    </div><!--/ Carousel item end -->
			</div><!-- Carousel inner end-->

			<!-- Controls -->
			<a class="left carousel-control" href="#main-slide" data-slide="prev">
		    	<span><i class="fa fa-angle-left"></i></span>
			</a>
			<a class="right carousel-control" href="#main-slide" data-slide="next">
		    	<span><i class="fa fa-angle-right"></i></span>
			</a>
		</div><!-- /carousel -->    	
    </section>
    <!--/ Slider end -->


  
	<!-- Service box start -->
    <section id="service" class="wow fadeInUp" style="margin-top:20px;">
    	<div class="container">
        
          <div style="text-align:center; margin-top:-95px; margin-bottom:15px; display:block;">
    <img src="images/TomAssociatesAds.gif" width="728" height="90">
      </div>
        
    		<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="service-content">
					    <a href="trainings"><span class="service-icon"><i class="fa fa-graduation-cap img-circle wow flipInX"></i></span></a>
					    <h3>All Upcoming Courses</h3>
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

    <!-- Features start -->
    <section id="features">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-6 wow fadeInLeft">
    				<div class="feature-wrapper1">
	    				<div class="feature-content-wrapper-side" style=" content:inherit;">
                        
                        <!-- Blog category start -->
						<div class="widget widget-categories" style="width:92%;">
							<h2 style="margin-bottom:28px;">In-plant Courses</h2>
                         
                            <?php
							echo ShowCategories();
							  ?>
				          
                           <a href="corporate-training" class="read-more" style="color:#9B2231;">More In-plant Courses <i class="fa fa fa-long-arrow-right"></i></a>
                            
						</div><!-- Blog category end -->
                         <br /> 
	    					<h2>About Us</h2>
	    					<p style="line-height:30px; width:92%; text-align:justify;">Tom Associates is a foremost and very consistent management training institution in Nigeria, focusing on the development of private and public sector managers since 1992. Each year, we organise an average of 200 workshops. Our in-plant courses (60% of total) meet peculiar needs of the clients through programme objectives and contents design. The open subscription courses (40% of total) offer participants the opportunity to meet people of different backgrounds and share experiences...<br /> <a href="about-us" class="read-more" style="color:#9B2231;">Read More <i class="fa fa fa-long-arrow-right"></i></a></p>

							<div style="margin-top:10px;">
                             <div class="fb-like-box" data-href="http://www.facebook.com/pages/Tom-Associates-Training/300089356711055" data-width="520" data-height="350" data-show-faces="true" data-stream="false" data-header="true"></div>
                            </div>
    					</div>
    				</div>
    			</div>

    			<div class="col-sm-6 wow fadeInRight">
    				<div class="feature-wrapper">
	    				<div class="feature-content-wrapper">
	    					<h2 >Upcoming Training</h2>
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
	<script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script>


	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>
    
    <script type="text/javascript" >
    /*$(document).ready(function(e) {
       $.get('resources/get_gallery.php', {ajax: 'true' },function(data){
			$('#gallery').html(data)
	   });
    });*/
    </script>
    
	</div>
</body>
</html>