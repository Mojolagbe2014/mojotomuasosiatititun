<?php
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();
if(isset($_GET['courses'])) $id=$_GET['courses'] ; else redirect('corporate-training');
$recordperpage =  15;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	$pg = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
	
	$cat  = $database -> select(false,"course_categories","cat_id=$id");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
    <title><?php echo $cat['cat_name'];?> Courses - Tom Associates Training</title>
    <meta name="description" content="">	
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
	
<body>
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
		        	<h2 style="font-size:18px;"><?php echo $cat['cat_name'];?> Courses</h2>
		        	
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
							<div class="col-lg-12 col-md-12">
								
								<!-- post heading end -->
								<div class="entry-content">
									<div class="feature-box clearfix">
				              <?php
							echo ShowUpcomingEvents($offset,$recordperpage,"and department= $id");
							?>
				            </div>
								</div>
								<!-- Author info start -->
								
								<!-- Author info end -->

									<!-- Pagination start -->
                                   <?php PagingNew('course_categories',"","cat_id",$recordperpage,$pagenum,"?get")?>
					<!--<div class="paging">
			            <ul class="pagination">
			              <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
			              <li class="active"><a href="#">1</a></li>
			              <li><a href="#">2</a></li>
			              <li><a href="#">3</a></li>
			              <li><a href="#">4</a></li>
			              <li><a href="#">5</a></li>
			              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
			            </ul>
		          	</div>--><!-- Pagination end -->
								<!-- Post comment start -->
								<!-- Post comment end -->

								<!-- Comments form end -->
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