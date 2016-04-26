<?php
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();
$random = strtolower(random(8));
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
    <title>Contact-us - Tom Associates Training</title>
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
		<img src="images/banner/banner4.jpg" alt ="" />
	</div>

	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2 style="font-size:18px;">Contact Us</h2>
		        	<ul class="breadcrumb">
			            <li> <a href="#">Home </a></li>
			            <li><a href="#"> Contact</a></li>
		          	</ul>
	          	</div>
	        </div>
	      </div>
	    </div>
	 </section>
	<!-- Subpage title end -->

	<div class="gap-40"></div>


	<!-- Contact page start -->
	<section id="Contact-page">
		<div class="container">
			<div class="row">

				<!-- Map start here -->
				<div class="map" id="map"></div>
				<!-- Map end here -->

				<!-- Contact form start -->
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                <div class="msg success" style="display:none;">
    <p>This is a successful event box. This can be used for successfully sent messages, ecommerce orders, etc.</p>
</div>
					<div class="contact-form">
						<h3 style="font-size:18px;">Contact us</h3>
						<form action="" method="post" role="form" id="contact">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name</label>
									<input class="form-control" name="name" id="name" placeholder="" type="text" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Telephone</label>
										<input class="form-control" name="telephone" id="telephone" 
										placeholder="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" name="email" id="email" 
										placeholder="" type="email" required>
									</div>
								</div>
                            
								<div class="col-md-6">
									<div class="form-group">
										<label>Subject</label>
										<input class="form-control" name="subject" id="subject" 
										placeholder="" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" name="message" id="message" placeholder="" rows="8" required></textarea>
							</div>
							<div>
                            <div class="col-md-3">
									<div class="form-group">
										<label>Verification Code</label>
										<input class="form-control" name="verify" id="verify" 
										placeholder="" value="<?php echo $random;?>" disabled readonly>
									</div>
								</div>
                            
								<div class="col-md-9">
									<div class="form-group">
										<label>Enter Verification Code here</label>
										<input class="form-control" name="code" id="code" 
										placeholder="" required>
									</div>
								</div>
                            <br>
							<button class="btn btn-primary" type="submit">Send Message <i class="fa fa-refresh fa-spin" style="display:none;"></i></button> 
							</div>
						</form>
					</div><!-- Contact form end -->	
				</div> <!-- Col end -->

				<!-- sidebar start -->
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="contact-info">
		    		<h3>Contact Info</h3>
		    		  
		    		<br>
		    		<p><i class="fa fa-home"></i>  5/7, Alade Lawal Street, Opposite Anthony Police Station, Idi-Iroko, Anthony Village, Lagos - Nigeria.  </p>
					<p><i class="fa fa-phone"></i> +234 (0) 7046085660, +234 (0) 8033019120,<br />
+234 (0) 8033053518, +234 (0) 8055600325,<br />
+234 (0) 8178591654, +234 (0) 8034078783,<br />
 +234 (0) 8065293674, +234 (0) 8023698989 <br /> </p>
					<p><i class="fa fa-envelope-o"></i>  info@tomassociatesng.com</p>
					
		    		</div>
				</div><!-- sidebar end -->
    		</div><!--/ row end -->
		</div><!--/ container end -->
	</section>
	<!-- Faq page end -->

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
	<!-- Google Map API Key Source -->
	<!--<script src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
	<!-- For Google Map -->
	<!--<script type="text/javascript" src="js/gmap3.js"></script>-->
	<!-- Doc http://www.mkyong.com/google-maps/google-maps-api-hello-world-example/ -->
    <script type="text/javascript" src="https://maps.google.com/maps?file=api&amp;v=3&amp;key=AIzaSyDSt4wuqlV19kn3NUuQGohOkeM7yuRBVgs&sensor=true"></script>
<script type="text/javascript" src="js/jquery.gmap-1.0.3-min.js"></script>

    
        <script type="text/javascript">
    $(document).ready(function(e) {
        $('#contact').submit(function(e) {
			 $('.fa-spin').show();
			 var scrollTop = $('html, .map').animate({scrollTop: $("#map").offset().top}, 2000);
			if($('#name').val() == ""){
				$('.msg').removeClass('success').addClass('error').html('<p>Please enter your name</p>').fadeIn('slow',function(){
					scrollTop;
					$('.fa-spin').hide();
					})
			}
			else if($('#email').val() == ""){
				$('.msg').removeClass('success').addClass('error').html('<p>Please enter your email</p>').fadeIn('slow',function(){
				scrollTop;
				$('.fa-spin').hide();
				})
			}
			else if($('#subject').val() == ""){
				$('.msg').removeClass('success').addClass('error').html('<p>Please enter subject</p>').fadeIn('slow',function(){
					scrollTop;
					$('.fa-spin').hide();
					})
			}
			else if($('#message').val() == ""){
				$('.msg').removeClass('success').addClass('error').html('<p>Please enter your message</p>').fadeIn('slow',function(){
					scrollTop;
					$('.fa-spin').hide();
					})
			}
			else if($('#verify').val() != $('#code').val()){
				$('.msg').removeClass('success').addClass('error').html('<p>Invalid verification code</p>').fadeIn('slow',function(){
					scrollTop;
					$('.fa-spin').hide();
					})
			}
			else{
			$.post('tools/contact.php',{
				name: $('#name').val(),
				email: $('#email').val(),
				message: $('#message').val(),
				subject: $('#subject').val(),
				telephone: $('#telephone').val()
				},
				function(data){
					if(data == 'sent'){
						
				$('#name').val(""),
				$('#email').val(""),
				$('#message').val(""),
				$('#subject').val(""),
				$('#telephone').val("")
						
					$(".msg ").fadeTo(200,0.1,function()  
					//start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Thank you for contacting us, We will respond to your email as soon as possible').removeClass('error').addClass('success').fadeTo(900,1,
              function()
			  { 
			  $('.fa-spin').hide();
			  	 //redirect to secure page
				scrollTop;
				
			  });
			  
			});
		}
		else{
		$(".msg ").fadeTo(200,0.1,function()  
					//start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Sorry an error occured while sending your message, please try again').removeClass('success').addClass('error').fadeTo(900,1,
              function()
			  { 
			  $('.fa-spin').hide();
			  	 //redirect to secure page
				scrollTop;
				
			  });
			  
			});
			//alert(data) uncomment to see what when wrong in the php script.
			
			}
					 
				})
			}

			return false;
        });
    });
    </script>

	<script type="text/javascript">
	
	$(function() {
    $("#map").gMap
	({ controls: false,
	   scrollwheel: false,
	   markers: [{ latitude:	6.6088109,
                   longitude: 3.4371245,
				    html: "5/7 Alade Lawal Street, opposite Anthony Police Station,  Anthony Village, off Ikorodu Road, Lagos, Nigeria",
                              popup: true }],
	   zoom: 13   
	});
});
    /*  $(function() {
        $("#map").gmap3({
          map:{
            options:{
              zoom: 14,
            }
          },
          getlatlng:{
            address:  "5/7 Alade Lawal Street, opposite Anthony Police Station,  Anthony Village, off Ikorodu Road, Lagos, Nigeria",
            callback: function(results) {
              if ( !results ) return;
              $(this).gmap3('get').setCenter(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
              $(this).gmap3({
                marker:{
                  latLng:results[0].geometry.location,
                  options:{
                	  	icon: new google.maps.MarkerImage(
						"../../../gmap3.net/skin/gmap/magicshow.png",
						new google.maps.Size(32, 37, "px", "px")
						)
              		}
                }
              });
            }
          }

        });

        });*/
    </script>


	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>


</body>
</html>


