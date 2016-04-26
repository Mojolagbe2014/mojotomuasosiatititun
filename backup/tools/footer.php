	<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="footer-about-us">
							<h3 class="footer-title"><span><strong>Our</strong> Services</span></h3>
							<p class="desc" style="padding-top:0px;"><strong>Tom Associates Training</strong> promotes Peer Experiences Every day of the week Every week of the year All year round. Recently, participants in one of our Contract Management classes had a group case exercise involving three companies: execute a gas pipeline contract under very tight time and cost constraints with a very uncompromising weather window..</p>
							<p class="footer-social">
								<a href="http://twitter.com/tomassociatesng" target="_blank"><i class="fa fa-twitter"></i></a>
								<a href="https://www.facebook.com/tomassociates"><i class="fa fa-facebook"></i></a>
								<a href="https://plus.google.com/110541269371353134717/about"><i class="fa fa-google-plus"></i></a>
								
							</p>
						</div>
					</div><!--/ end about us -->
					
					<div class="col-md-3">
						<div class="recent-post">
							<h3 class="footer-title"><span><strong>Knowledge</strong> in motion series </span></h3>
							<ul>
                            <?php
							$data = $database->select(true,'uploads',"","id limit 0, 5");
							foreach($data as $data){
							?>
	                            <li><a href="downloads"><?php echo $data['title'];?></a></li>
	                         
                                <?php
							}
							?>
	                        </ul>
						</div>
					</div><!--/ end recent post -->

					<div class="col-md-3">
						<div class="img-gallery">
							<h3 class="footer-title"><span><strong>Facilities Image</strong> Gallery</span></h3>
							<div class="img-container">
                            <?php
							$facility = $database->select(true,'gallery',"type = 'facility'","gallery_id desc limit 0, 6");
							foreach($facility as $facility){
							?>
								<a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/<?php echo $facility['file'];?>">
									<img src="images/gallery/thumb/<?php echo $facility['file'];?>" alt="gallery">
								</a>
                                <?php
							}
							?>
							</div>
						</div>
					</div><!--/ end flickr -->

					<div class="col-md-3">
						<div class="twitter">
							<h3 class="footer-title"><span><strong>Our</strong> Location</span></h3>
							<div class="tweet">
			                  <div><span>5/7, Alade Lawal Street, Opposite Anthony Police Station, Idi-Iroko, Anthony Village, Lagos - Nigeria.  </span><br />
<span><strong>Phone:</strong> +234 (0) 8033019120, +234 (0) 7046085660,<br />
+234 (0) 8033053518, +234 (0) 8055600325,<br />
+234 (0) 8178591654, +234 (0) 8034078783,<br />
 +234 (0) 8065293674, +234 (0) 8023698989 <br /></span><br />
<span><strong>Email : </strong> info@tomassociatesng.com</span>
			                  </div>
			                 
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
					<div class="col-md-5 wow fadeInLeft">
						<ul class="footer-bottom-menu">
							<li><a href="about-us">About Us</a></li>
	                        <li><a href="trainings">Courses</a></li>
	                        <li><a href="contact-us">Contact Us</a></li>
						</ul>
					</div>
					<div class="col-md-2">
						<a id="back-to-top" href="#" class="scroll-up back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
							<img class="wow flipInY" src="images/to-top.png" alt="to top">
						</a>
					</div>
					<div class="col-md-5 wow fadeInRight">
						<div class="copyright-info">
	         			 &copy; Copyright 2014 Tom Associates Training. 
	        			</div>
					</div>
				</div><!-- Row end -->
			</div><!-- Container end -->
		</div><!-- Footer bottom end -->
	</section>