<?php
function active($script){
		$status = '';
		$path = pathinfo($_SERVER['SCRIPT_NAME']);
		if($path['basename'] == $script){
		$status = 'class="active"';
		}
		return $status;
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<body>
 <header id="header" class="navbar-fixed-top main-nav" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!--/ Top info start -->
					<div class="top-info">
						<ul class="pull-right">
							<li><i class="fa fa-phone"></i> Call Us: 234 (0) 8033019120</li>
							<li><i class="fa fa-envelope"></i> Info@tomassociatesng.com</li>
							<!-- Social links -->
							<li class="social-icon">
								<a id="tooltip1" data-toggle="tooltip" data-placement="top" title="Twitter" target="_blank"  href="http://twitter.com/tomassociatesng">
									<i class="fa fa-twitter"></i>
								</a>
								<a id="tooltip2" data-toggle="tooltip" data-placement="top" title="Facebook" target="_blank" href="https://www.facebook.com/tomassociates">
									<i class="fa fa-facebook"></i>
								</a>
								<a id="tooltip3" href="https://plus.google.com/110541269371353134717/about" data-toggle="tooltip" data-placement="top" title="Google+" target="_blank" >
									<i class="fa fa-google-plus"></i>
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
					    <a class="navbar-brand" href="./">
					    	<img class="img-responsive" src="images/logo.png" alt="logo">
					    </a>                    
					</div><!--/ Logo end -->

					<nav class="collapse navbar-collapse clearfix" role="navigation">
						<ul class="nav navbar-nav navbar-right">
	                        <li <?php echo active('index.php');?>><a href="./">Home</a></li>
	                       	<li <?php echo active('about-us.php');?>><a href="about-us">About</a></li>
	                        <li <?php echo active('services.php');?>><a href="services">Services</a></li>
	                       	<li <?php echo active('resources.php');?>><a href="resources">Articles</i></a></li>
	                      	<li <?php echo active('trainings.php');?>>
	                       		<a href="trainings" >Courses</a></li>
	                       <li <?php echo active('calendar.php');?>>
	                			<a href="calendar" >Calendar</a></li>
	            			<li <?php echo active('contact-us.php');?>><a href="contact-us">Contact us</a></li>
	                        <li class="search"><button class="fa fa-search"> Search</button></li>
	                    </ul>
					</nav><!--/ Navigation end -->
					
					<div class="site-search">
						<div class="container">
                        <form action="search" method="get" autocomplete="off" >
							<input type="text" placeholder="Enter keyword to search for training" name="keyword">
							<span class="close"><button class="fa fa-search" type="submit"></button> &times;</span>
                            </form>
						</div>
					</div>
				</div><!--/ Col end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</header>