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
    <title>About us - Tom Associates Training</title>
   <meta name="description" content="Tom Associates is a foremost management training institution in Nigeria; we focus on the development of private/public sector managers since 1992."/>	
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
		<img src="images/banner/tomHouse.jpg" alt ="" />
	</div>

	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2 style="font-size:18px;">About Us</h2>
		        	
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
							<h3 class="page-content-title" style="font-size:14px;">Who We Are</h3>
					<p style="text-align:justify; line-height:30px;">Tom Associates is a limited liability company incorporated in Nigeria. We commenced business in 1992. Tom Associates Management Development Centre is built on a well-appointed location at Anthony Village on the mainland of Lagos, Nigeria. It is a purpose-developed perfect venue for seminars, meetings, training sessions and retreats. The centre provides a most convenient meeting point when it is important to avoid the intractable Lagos traffic. It is also most accessible from both the local and international airports. There are six conference/meeting rooms which feature the latest in comfort and state-of-the-art equipment. The reference library is well-stocked.
<br> Our core business is about: </p>
	<ul class="circle">
					<li>Facilitation of Management Retreats. </li>
							<li>Workshops and seminars in:
        					<ul style="list-style:none;">
								<li>Business Strategy &amp; Management</li>
								<li>Customer Service</li>
								<li>Financial Management</li>
								<li>Human Capital Management</li>
								<li>Leadership Development</li>
								<li>Marketing Management</li>
								<li>Personal Skills Development</li>
								<li>Production &amp; Quality Management</li>
								<li>Selling Skills &amp; Sales Management</li>
								<li>Administrative Management Skills					</li>
        					</ul>
					</li>
						</ul>
                  <h3 style="margin-top:0px;">Our Philosophy</h3>
<p>Our logo reflects our philosophy: <br />

   <em> Brighten up the knowledge, creativity and skills of young managers. Continuously stimulate the minds of managers who participate in the courses as only stimulated minds sustain their capacity for productive output.</em>
</p>
<h3>Gains to Organizations</h3>
                  <p>Our courses help organizations to: </p>
                  <ul class="circle">
                    <li>Discover successful ways to improve business performance</li>
                    <li>Gain sustainable competitive edge by developing skills,   					creativity and commitment of employees</li>
                    <li>Know how to put best practices into action</li>
                    <li>Profit from the changing business environment</li>
                  </ul>      
                  
                  <h3 style="margin-top:0px;">Gains to Employees</h3>
                  <p>Employees   				who go through our courses do gain:</p>
                  <ul class="circle">
                    <li>Benefits from the practical experience of the   					professionals who lead our courses</li>
                    <li>Enhanced personal skills</li>
                    <li>A sense of achievement</li>
                    <li>Renewed professional ambition</li>
                    <li>Increased job satisfaction</li>
                  </ul> 
						</div>
                         <h3 style="margin-top:0px;">Accreditations</h3>
                  <p>Tom Associates is accredited by:<br />
                  <ul class="circle">
<li>Centre for Management Development (CMD)</li>
<li>Industrial Training Fund (ITF)</li>
<li>Nigerian Institute of Training and Development</li>
<li>Directorate for Petroleum Resources</li>

</ul>
					</section><!-- Blog post end -->
				</div>
				<!-- Blog end -->

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<!-- sidebar start -->
					 <?php include('tools/side-bar.php');?>			<!-- sidebar end -->
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