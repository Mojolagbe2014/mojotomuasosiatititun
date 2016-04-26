<?php
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');

$database = new Database();

$data = array('event_id'=>$_GET['detail'],"status"=>1);

$rows = $database -> select(false,"events",$data);

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
	
<body id="page">
	<!-- Header start -->
	<?php include('tools/nav-bar.php');?>
    <!--/ Header end -->

	<div id="inner-header">
		<img src="images/banner/register.jpg" alt ="" />
	</div>

	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2 style="font-size:18px;">Course Registration</h2>
		        	
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
							<div class="contact-form col-md-11">
                            
						<h3 style="font-size:14px;"><strong style="color:#FF0000;">Course: </strong><?php echo $rows['event_title'];?></h3>
                        <h3 style="font-size:14px;"><strong style="color:#FF0000;">Date: </strong><?php echo DateRange($rows['start_date'],$rows['end_date']);?></h3>
                        <div class="msg success" style="display:none;">
    <p>This is a successful event box. This can be used for successfully sent messages, ecommerce orders, etc.</p>
</div>
						<form action="" method="post" role="form" id="register">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name</label>
									<input class="form-control" name="name" id="name" placeholder="" type="text" >
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Company</label>
										<input class="form-control" name="company" id="company" 
										placeholder="" >
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Telephone</label>
										<input class="form-control" name="telephone" id="telephone" 
										placeholder="" >
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Approver's Name</label>
										<input class="form-control" name="approval" id="approval" 
										placeholder="" >
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Approver's Telephone</label>
										<input class="form-control" name="approval_no" id="approval_no" 
										placeholder="" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" name="email" id="email" placeholder="" type="email" required>
									</div>
								</div>
								
							</div>
							<div class="form-group">
								<label>Additional Note</label>
								<textarea class="form-control" name="message" id="message" placeholder="" rows="8" ></textarea>
                                <input name="courseID" id="courseID" type="hidden" value="<?php echo $_GET['detail'];?>">
                                <input name="title" id="title" type="hidden" value="<?php echo $rows['event_title'];?>">
							</div>
							<div><br>
							<button class="btn btn-primary" type="submit">Register <i class="fa fa-refresh fa-spin" style="display:none;"></i></button> 
							</div>
						</form>
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
    <script type="text/javascript">
    $(document).ready(function(e) {
        $('#register').submit(function(e) {
			 $('.fa-spin').show();
			 
			if($('#name').val() == ""){
				$('.msg').removeClass('success').addClass('error').html('<p>Please enter your name</p>').fadeIn('slow',function(){
					$('html, body').animate({scrollTop: $("#page").offset().top}, 2000);
					})
			}
			else if($('#company').val() == ""){
				$('.msg').removeClass('success').addClass('error').html('<p>Please enter your companys name</p>').fadeIn('slow',function(){
					$('html, body').animate({scrollTop: $("#page").offset().top}, 2000);
				})
			}
			else if($('#telephone').val() == ""){
				$('.msg').removeClass('success').addClass('error').html('<p>Please enter your telephone</p>').fadeIn('slow',function(){
					$('html, body').animate({scrollTop: $("#page").offset().top}, 2000);
					})
			}
			else if($('#email').val() == ""){
				$('.msg').removeClass('success').addClass('error').html('<p>Please enter your email</p>').fadeIn('slow',function(){
					$('html, body').animate({scrollTop: $("#page").offset().top}, 2000);
					})
			}
			else{
			$.post('tools/register.php',{
				name: $('#name').val(),
				company: $('#company').val(),
				telephone: $('#telephone').val(),
				email: $('#email').val(),
				message: $('#message').val(),
				eventID: $('#courseID').val(),
				approvalPerson: $('#approval').val(),
				approvalNumber: $('#approval_no').val(),
				eventTitle: $('#title').val()
				},
				function(data){
				$('.btn').html(data).fadeIn('slow',function()
			  { 
			  	 //redirect to secure page
				 document.location='confirmation?status=success';
			  });
					 
					// $('html, body').animate({scrollTop: $("#page").offset().top}, 2000);
				})
			}

			return false;
        });
    });
    </script>
	
</body>
</html>