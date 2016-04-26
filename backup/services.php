<?php
session_start();
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
    <title>Our Services - Tom Associates Training</title>
   <meta name="description" content="TOM ASSOCIATES Training promotes Peer Experiences Every day of the week Every week of the year All year round"/>	
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
	<?php include('tools/nav-bar.php');?>
    <!--/ Header end -->

	<div id="inner-header">
		<img src="images/banner/services.jpg" alt ="" />
	</div>

	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2 style="font-size:18px;">Services Us</h2>
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
						<div class="row" style="margin:0px;">
						
					<p style="text-align:justify; line-height:30px;"><strong>TOM ASSOCIATES Training</strong> promotes Peer Experiences Every day of the week Every week of the year All year round. Recently, participants in one of our Contract Management classes had a group case exercise involving three companies: execute a gas pipeline contract under very tight time and cost constraints with a very uncompromising weather window. The class was composed of participants from industries as diverse as Petroleum, Aviation, Telecom, Natural Gas, Pharmaceuticals and Finance. A few of them had faced tough contractual obligations, but in radically different settings. Rarely in the course of their careers do young managers have the opportunity to tap such a depth and breadth of peer experience. Since 1992, Tom Associates has been providing such opportunities daily in the numerous open and in-plant courses. The programmes delivered are designed to prepare middle-level managers for top-level strategic responsibilities.</p>
<p style="text-align:justify; line-height:30px;">
Tom Associates Management Development Centre, a purpose-built centre, offers the perfect venue for your private meetings, conferences, training sessions and retreats. Situated off Ikorodu Road in Anthony Village, a most convenient area of Lagos, Nigeria, the centre provides an excellent meeting point when it is important to avoid the intractable Lagos traffic. It is a most accessible centre from all corners of Lagos and from both the local and international airports. There are six conference and meeting rooms which feature the latest in comfort and state-of-the-art equipment. Our reference library stocks contemporary publications. </p>
	<h3> Management Retreat</h3>
<p style="text-align:justify; line-height:30px;">We facilitate Management Retreats, providing tools and guides for systematic discussions and exercises. Senior Management use the tools to develop veritable business success strategies.
</p>
<h3> In-plant Training</h3>
                  <p style="text-align:justify; line-height:30px;">For exclusive in-plant training, you can ask us to modify the objectives, contents and emphasis of any course you are interested in, if that will help us to meet your peculiar and relevant requirements.</p>
                   <h3>Custom-made Courses </h3>
                  <p style="text-align:justify; line-height:30px;">If you have peculiar needs and issues linked to your business strategy and organization culture, which quality training will solve, please ask us to design specialised packages for you.</p>
                   <h3>Open Workshops</h3>
                  <p style="text-align:justify; line-height:30px;">We run public-subscription workshops.  Among other benefits, it is an opportunity for people from various organizations, businesses and locations to meet and share experiences. Note the  dates indicated for each open course.</p>   
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
   
	
</body>
</html>