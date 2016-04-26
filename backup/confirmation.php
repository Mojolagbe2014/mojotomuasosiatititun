<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');

$database = new Database();

$rows = $database -> select(false,"registration a, events b","reg_number = '".$_SESSION['regNumber']."' and b.event_id=a.event_id");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
    <title><?php echo $rows['event_title'];?></title>
    <meta name="description" content="">	
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Favicons
	================================================== -->
	<link rel="icon" href="img/favicon/favicon-32x32.html" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/favicon-144x144.html">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/favicon-72x72.html">
	<link rel="apple-touch-icon-precomposed" href="img/favicon/favicon-54x54.html">
	
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
    <style>
	.registration{
		margin:10px 0 10px 0;
	}
	.registration td{
		padding:8px;
	}
	</style>
    
</head>
	
<body id="page">
	<!-- Header start -->
	<header id="header" class="navbar-fixed-top main-nav" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!--/ Top info start -->
					<div class="top-info">
						<ul class="pull-right">
							<li><i class="fa fa-phone"></i> Call Us: (20) 3893-837</li>
							<li><i class="fa fa-envelope"></i> Info@sample.com</li>
							<!-- Social links -->
							<li class="social-icon">
								<a id="tooltip1" data-toggle="tooltip" data-placement="top" title="Twitter"  href="#">
									<i class="fa fa-twitter"></i>
								</a>
								<a id="tooltip2" data-toggle="tooltip" data-placement="top" title="Facebook" href="#">
									<i class="fa fa-facebook"></i>
								</a>
								<a id="tooltip3" href="#" data-toggle="tooltip" data-placement="top" title="Google+">
									<i class="fa fa-google-plus"></i>
								</a>
								<a id="tooltip4" href="#" data-toggle="tooltip" data-placement="top" title="Dribble">
									<i class="fa fa-dribbble"></i>
								</a>
							</li><!-- Social links end-->
						</ul>
					</div><!--/ Top info end -->

					<!-- Logo start -->
					<div class="navbar-header">
					    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					    </button>
					    <a class="navbar-brand" href="index.html">
					    	<img class="img-responsive" src="images/logo.png" alt="logo">
					    </a>                    
					</div><!--/ Logo end -->

					<nav class="collapse navbar-collapse clearfix" role="navigation">
						<ul class="nav navbar-nav navbar-right">
	                        <li><a href="index.html">Home</a></li>
	                       	<li><a href="about.html">About</a></li>
	                        <li><a href="service.html">Services</a></li>
	                       	<li class="dropdown">
	                       		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
		                            <li><a href="team.html">Team Members</a></li>
		                            <li><a href="price.html">Pricing Table</a></li>
		                            <li><a href="faq.html">Faq</a></li>
		                        </ul>
	                       	</li>
	                      	<li class="dropdown">
	                       		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
		                            <li><a href="portfolio-4col.html">Portfolio 4col</a></li>
		                            <li><a href="portfolio-item.html">Portfolio Details</a></li>
		                        </ul>
	                       	</li>
	                       <li class="dropdown active">
	                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <i class="fa fa-caret-down"></i></a>
		                        <ul class="dropdown-menu">
		                            <li><a href="blog.html">Blog with Sidebar</a></li>
		                            <li class="active"><a href="blog-item.html">Blog Single</a></li>
		                        </ul>
	            			</li>
	            			<li><a href="contact.html">Contact</a></li>
	                        <li class="search"><button class="fa fa-search"></button></li>
	                    </ul>
					</nav><!--/ Navigation end -->
					
					<div class="site-search">
						<div class="container">
							<input type="text" placeholder="type what you want and enter">
							<span class="close">&times;</span>
						</div>
					</div>
				</div><!--/ Col end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</header><!--/ Header end -->

	<div id="inner-header">
		<img src="images/banner/register.jpg" alt ="" />
	</div>

	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2>Course Registration</h2>
		        	
	          	</div>
	        </div>
	      </div>
	    </div>
	 </section>
	<!-- Subpage title end -->

	<div class="gap-10"></div>


	<!-- Blog details page start -->
	<section id="blog-details">
		<div class="container">
			<div class="row">
				<!-- Blog start -->
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<!-- Blog post start -->
					<section class="blog-post">
						<div class="row">
							<div class="col-1">
                           <h2 class="extra_suc" style="color:#060;">Congratulations your registration was successful!</h2><br />
                           <h4 style="color:#900;">Registration Details:</h4><br />
                       <span><strong>Course Title:</strong> <?php echo $rows['event_title'];?> </span><br />
                           <span><strong>Date:</strong> <?php echo $rows['start_date']." - ".$rows['end_date'];?></span><br />
                           
                           <form action="" method="post" id="register">
                            <table width="100%" class="registration" >
  <tr>
    <td align="right" bgcolor="#F4F4F4"><strong>Registration No:</strong></td>
    <td bgcolor="#FFFFCC"><?php echo $rows['reg_number'];?></td>
  </tr>
  <tr>
    <td width="21%" align="right" bgcolor="#F4F4F4"><strong>Name:</strong></td>
    <td width="79%" bgcolor="#FFFFCC"><?php echo $rows['name'];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F4F4F4"><strong>Company:</strong></td>
    <td bgcolor="#FFFFCC"><?php echo $rows['company'];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F4F4F4"><strong>Approver's Name:</strong></td>
    <td bgcolor="#FFFFCC"><?php echo $rows['approver'];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F4F4F4"><strong>Approver's No.</strong></td>
    <td bgcolor="#FFFFCC"><?php echo $rows['approver_no'];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F4F4F4"><strong>Telephone:</strong></td>
    <td bgcolor="#FFFFCC"><?php echo $rows['telephone'];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F4F4F4"><strong>Emai:l</strong></td>
    <td bgcolor="#FFFFCC"><?php echo $rows['email'];?></td>
  </tr>
                            </table>

                            
                           
                  </form>
                          <table class="registration">
                             <tr>
                               <td width="48%"><strong>Venue:</strong> 5/7, Alade Lawal Street, <br />
                                 Opposite Anthony Police   													Station, <br />
                                 Idi-Iroko, Anthony Village,<br />
                                 Lagos - Nigeria.</td>
                               <td width="52%"></td>
                             </tr>
                             <tr>
                               <td colspan="2">For more information call: <br />
                                 +234 (0) 803 301 9120, +234 (0) 803 305 3518 <br />
+234 (0) 803 406 4263, +234 (0) 805 560 0325<br />
+234 (0) 703 225 2123, +234 (0) 817 859 1654<br />
+234 (0) 806 529 3674<br /><p>or email <a href="mailto:info@tomassociatesng.com">info@tomassociatesng.com</a></p></td>
                             </tr>
                          </table>
                          <p>&nbsp;</p>
                           <!--<a class="rss" href="#">RSS Feed</a>--> 
                       </div>
						</div>
					</section><!-- Blog post end -->
				</div>
				<!-- Blog end -->

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<!-- sidebar start -->
					 <?php include('tools/side-bar.php');?><!-- sidebar end -->
				</div>
    		</div><!--/ row end -->
		</div><!--/ container end -->
	</section><!-- Blog details page end -->
	

	<div class="gap-40"></div>

	<!-- Main Footer start -->
	<section id="footer-wrapper">
		<!-- Footer top start -->
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="footer-about-us">
							<img src="images/footer-logo.png" alt="" />
							<p class="desc">Suspendisse condimentum mollis vehicula. Praesent sodales interdum elit interdum ornare. Suspendisse tristique semper arcu nec.</p>
							<p class="footer-social">
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
							</p>
						</div>
					</div><!--/ end about us -->
					
					<div class="col-md-3">
						<div class="recent-post">
							<h3 class="footer-title"><span>Recent <strong>Posts</strong></span></h3>
							<ul>
	                            <li><a href="#">Pellentesque dolor metus</a></li>
	                            <li><a href="#">Sed neque lacus mollis vitae</a></li>
	                            <li><a href="#">Vivamus dignissim turpis</a></li>
	                            <li><a href="#">Pellentesque aliquam lorem</a></li>
	                            <li><a href="#">Fusce suscipit lectus at</a></li>
	                        </ul>
						</div>
					</div><!--/ end recent post -->

					<div class="col-md-3">
						<div class="img-gallery">
							<h3 class="footer-title"><span>Photo <strong>Gallery</strong></span></h3>
							<div class="img-container">
								<a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/1.jpg">
									<img src="images/gallery/1.jpg" alt="gallery">
								</a>
								<a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/2.jpg">
									<img src="images/gallery/2.jpg" alt="gallery">
								</a>
								<a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/3.jpg">
									<img src="images/gallery/3.jpg" alt="gallery">
								</a>
								<a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/4.jpg">
									<img src="images/gallery/4.jpg" alt="gallery">
								</a>
								<a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/5.jpg">
									<img src="images/gallery/5.jpg" alt="gallery">
								</a>
								<a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/6.jpg">
									<img src="images/gallery/6.jpg" alt="gallery">
								</a>
							</div>
						</div>
					</div><!--/ end flickr -->

					<div class="col-md-3">
						<div class="twitter">
							<h3 class="footer-title"><span>Twitter <strong>Feed</strong></span></h3>
							<div class="tweet">
			                  <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at dolor lectus, vel rhoncus magna. <a href="#">http://twitterinfo </a> #themeforest
			                  </div>
			                  <p class="tweet-time"><i class="fa fa-twitter"></i> 2 Days ago</p>
			                </div>
						</div>
					</div><!--/ end tweet -->

				</div><!-- Row end -->
			</div><!-- Container end -->
		</footer><!-- Footer top end -->

		<!-- Footer bottom start -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-5 wow fadeInLeft animated">
						<ul class="footer-bottom-menu">
							<li><a href="#">About Us</a></li>
	                        <li><a href="#">Blog</a></li>
	                        <li><a href="#">Contact Us</a></li>
						</ul>
					</div>
					<div class="col-md-2">
						<a id="back-to-top" href="#" class="scroll-up back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
							<img class="wow flipInY animated" src="images/to-top.png" alt="">
						</a>
					</div>
					<div class="col-md-5 wow fadeInRight animated">
						<div class="copyright-info">
	         			 &copy; Copyright 2014 Dart. <span>Designed &amp; developed by- <a href="#" target="_blank">TrippleS</a></span>
	        			</div>
					</div>
				</div><!-- Row end -->
			</div><!-- Container end -->
		</div><!-- Footer bottom end -->
	</section><!-- Footer section end -->
	
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
   
	
</body>
</html>