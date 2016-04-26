<?php
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tom Associates | Best in Class Management Training in Nigeria</title>
        <meta name="description" content="Tom Associates is a foremost and very consistent management training institution in Nigeria, focusing on the development of private and public sector managers since 1992.">
        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/tom_favicon.ico">

        <!-- CSS Global -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <link href="assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/owlcarousel2/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/plugins/owlcarousel2/assets/owl.theme.default.min.css" rel="stylesheet">
        <link href="assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
        <link href="assets/plugins/animate/animate.min.css" rel="stylesheet">
        <link href="assets/plugins/countdown/jquery.countdown.css" rel="stylesheet">

        <link href="assets/css/theme.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
        <link href="assets/css/additional-style.css" rel="stylesheet" type="text/css"/>
        <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="home" class="wide body-light multipage">

        <!-- Preloader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Wrap all content -->
        <div class="wrapper">

           <?php include('includes/header.php'); ?>

            <!-- Content area -->
            <div class="content-area">

                <div id="main">
                    <!-- SLIDER -->
                    <section class="page-section no-padding background-img-slider">
                        <div class="container">

                            <div id="main-slider" class="owl-carousel owl-theme">

                                <!-- Slide -->
                                
                                <!-- Slide -->
                                <div class="item text-center slide5">
                                    <div class="caption">
                                        <div class="container">
                                            <div class="div-table">
                                                <div class="div-cell">

                                                    <div class="div-table slider-content">

                                                        <div class="div-cell event-image"></div>
                                                        <div class="div-cell">

                                                            <h3 class="caption-subtitle animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="300">Welcome to Tom Associates Training</h3>
                                                            <h2 class="caption-title animated fadeInDown visible" data-animation="fadeInDown" data-animation-delay="100">...Keep the quality up</h2>
                                                            <p class="caption-text"></p>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>
                    <!-- /SLIDER -->
                </div>

                <!-- Featured Event -->
                <section class="page-section color featured-line xs-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <h1 class="section-title two-lines">
                                    <span data-animation="flipInY" data-animation-delay="300" class="icon-inner"><span class="fa-stack"><i class="fa rhex dark fa-stack-2x"></i><i class="fa fa-calendar fa-stack-1x"></i></span></span>
                                    <span data-animation="fadeInRight" data-animation-delay="500" class="title-inner"> What You Want <small>Find Best Course For You</small></span>
                                </h1>
                            </div>
                            <div class="col-md-9">
                                <form id="registration-form" name="registration-form" class="event-form" action="<?php echo SITE_URL.'search'; ?>" method="GET">
                                    <div class="row">
                                        <div class="col-sm-12 form-alert"></div>
                                        <div class="col-sm-6 col-md-3">                                           
                                            <div class="form-group selectpicker-wrapper with-icon">
                                                <i class="fa fa-globe"></i>
                                                <select class="selectpicker input-price" name="state" id="state" data-live-search="true" data-width="100%"
                                                        data-toggle="tooltip" title="Select Location">
                                                    <option>Select Location</option>
                                                    <?php 
                                                    $statesArrs = $database -> select(true,'states');
							foreach ($statesArrs as $statesArr){
                                                    ?>
                                                    <option value="<?php echo $statesArr['id'];?>"><?php echo $statesArr['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>                                           
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group selectpicker-wrapper with-icon">
                                                <i class="fa fa-bars"></i>
                                                <select class="selectpicker input-price" name="category" id="category" data-live-search="true" data-width="100%"
                                                        data-toggle="tooltip" title="Select Category">
                                                    <option>Select Category</option>
                                                    <?php 
                                                    $categories = $database -> select(true,'course_categories');
							foreach ($categories as $category){
                                                    ?>
                                                    <option value="<?php echo $category['cat_id'];?>"><?php echo $category['cat_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>     
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group selectpicker-wrapper with-icon">
                                                <i class="fa fa-calendar"></i>
                                                <input type="text" class="form-control datetimepicker" name="datetimepicker" placeholder ="Select Date" />
                                            </div>     
                                        </div>
                                        <div class="col-md-3 overflowed">
                                            <div class="form-group">
                                                <button class="btn btn-theme" type="submit"> Find Course <i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- /Featured Event -->

                <!-- PAGE -->
                <section class="page-section light">
                    <div class="container">

                        <div class="row thumbnails info-thumbs clear">
                            <div class="col-sm-6 col-md-3" data-animation="fadeInUp" data-animation-delay="100">
                                <div class="thumbnail no-border no-padding text-center">
                                    <div class="rehex">
                                        <div class="rehex-deg">
                                            <div class="rehex-deg">
                                                <div class="rehex-inner">
                                                    <div class="caption-wrapper div-table">
                                                        <div class="caption-inner div-cell">
                                                            <p class="caption-buttons"><a href="<?php echo SITE_URL.'courses'; ?>" class="btn caption-link"><i class="fa fa-calendar"></i></a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h3 class="caption-title">All Upcoming Courses</h3>
                                        <p class="caption-text">Browse the list of all our courses for the year to enable you plan ahead</p>
                                        <p class="caption-more"><a href="<?php echo SITE_URL.'courses'; ?>" class="btn btn-theme">Details</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-sm-6 col-md-3" data-animation="fadeInUp" data-animation-delay="300">
                                <div class="thumbnail no-border no-padding text-center">
                                    <div class="rehex">
                                        <div class="rehex-deg">
                                            <div class="rehex-deg">
                                                <div class="rehex-inner">
                                                    <div class="caption-wrapper div-table">
                                                        <div class="caption-inner div-cell">
                                                            <p class="caption-buttons"><a href="<?php echo SITE_URL.'articles'; ?>" class="btn caption-link"><i class="fa fa-book"></i></a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h3 class="caption-title">Articles / Resources</h3>
                                        <p class="caption-text">View our informative and educative articles</p>
                                        <p class="caption-more"><a href="<?php SITE_URL.'articles'; ?>" class="btn btn-theme">Details</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-sm-6 col-md-3" data-animation="fadeInUp" data-animation-delay="500">
                                <div class="thumbnail no-border no-padding text-center">
                                    <div class="rehex">
                                        <div class="rehex-deg">
                                            <div class="rehex-deg">
                                                <div class="rehex-inner">
                                                    <div class="caption-wrapper div-table">
                                                        <div class="caption-inner div-cell">
                                                            <p class="caption-buttons"><a href="#" class="btn caption-link"><i class="fa fa-download"></i></a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h3 class="caption-title">Download Brochure</h3>
                                        <p class="caption-text">Download our course brochure to help you stay ahead</p>
                                        <?php $brochure = $database->select(false,"brochure");?>
                                        <p class="caption-more"><a href="<?php echo SITE_URL.'brochure/'.$brochure['file_pdf'];?>" class="btn btn-theme" title="<?php echo $brochure['brochuretitle'];?> in PDF format">PDF</a> <a href="<?php echo SITE_URL.'brochure/'.$brochure['file_excel'];?>" title="<?php echo $brochure['brochuretitle'];?> in Excel format" class="btn btn-theme">Excel</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-sm-6 col-md-3" data-animation="fadeInUp" data-animation-delay="700">
                                <div class="thumbnail no-border no-padding text-center">
                                    <div class="rehex">
                                        <div class="rehex-deg">
                                            <div class="rehex-deg">
                                                <div class="rehex-inner">
                                                    <div class="caption-wrapper div-table">
                                                        <div class="caption-inner div-cell">
                                                            <p class="caption-buttons"><a href="<?php echo SITE_URL.'media'; ?>" class="btn caption-link"><i class="fa fa-music"></i></a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h3 class="caption-title">Our Media Library</h3>
                                        <p class="caption-text">Browse our library to find career changing information</p>
                                        <p class="caption-more"><a href="<?php echo SITE_URL.'media'; ?>" class="btn btn-theme">Details</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- /PAGE -->

                <!-- PAGE -->
                <section class="page-section">
                    <div class="container">

                        <div class="clear clearfix overflowed">
                            <div class="section-title pull-left" style="width: auto;">
                                <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-star fa-stack-1x"></i></span></span>
                            </div>
                            <ul id="filtrable-events" class="filtrable clearfix">
                                <li class="all"><a href="#" data-filter="*">Upcoming Courses</a></li>
                            </ul>
                        </div>

                        <div class="row thumbnails events isotope isotope-items">
                            <?php
                            $upcomingCourses = $database -> select(true,"events","status = 1 and sort_date >= '".date('Y-m-d')."' ","sort_date LIMIT 8 ");
                            foreach($upcomingCourses as $upcomingCourse){
                                $thisStartDat = explode(',', $upcomingCourse['start_date']);
                                $thisStartDate =  explode(' ', $thisStartDat[0]);
                            ?>
                            <div class="col-md-3 col-sm-6 isotope-item festival">
                                <div class="thumbnail no-border no-padding">
                                    <div class="media">
                                        <a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/" class="like"><i class="fa fa-heart"></i></a>
                                        <div class="date">
                                            <span><?php echo $thisStartDate[1]; ?></span>
                                            <span><?php echo substr($thisStartDate[0], 0, 3); ?></span>
                                        </div>
                                        <img src="<?php echo SITE_URL.'admin/images/courses/'.$upcomingCourse['image']; ?>" alt="<?php echo $upcomingCourse['event_title']; ?>">
                                        <div class="caption hovered"></div>
                                    </div>
                                    <div class="caption">
                                        <h3 class="caption-title"><a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/"><?php echo ucwords(strtolower($upcomingCourse['event_title'])); ?></a></h3>
                                        <p class="caption-category"><i class="fa fa-calendar-check-o"></i> <?php echo DateRange($upcomingCourse['start_date'],$upcomingCourse['end_date']);?></p>
                                        <p class="caption-price"> <?php echo $upcomingCourse['event_cost']; ?></p>
                                        <p class="caption-text"> <?php echo RemoveHTML($upcomingCourse['event_description'], 120); ?>..</p>
                                        <p class="caption-more"><a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/" class="btn btn-theme">Booking &amp; details</a></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="text-center margin-top">
                            <a data-animation="fadeInUp" data-animation-delay="100" href="<?php echo SITE_URL.'courses'; ?>" class="btn btn-theme btn-theme-grey-dark btn-theme-md"><i class="fa fa-file-text-o"></i> See all courses</a>
                        </div>

                    </div>
                </section>
                <!-- /PAGE -->

                <!-- PAGE -->
                <section class="page-section light">
                    <div class="container">

                        <!-- Quotes -->
                        <h2 class="text-center text-danger">QUOTES</h2>
                        <div id="testimonials" class="owl-carousel testimonials testimonials-alt" data-animation="fadeInUp" data-animation-delay="100">
                            <?php 
                            $theseQuotes = $database->select(true,'quotes',"","quote_id DESC LIMIT 10");
                            foreach($theseQuotes as $thisQuote){
                            ?>
                            <div class="media testimonial">
                                <div class="media-body">
                                    <p><?php echo $thisQuote['content']; ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Testimonials -->

                    </div>
                </section>
                <!-- /PAGE -->

                <!-- PAGE -->
                <section class="page-section">
                    <div class="container">

                        <h1 class="section-title">
                            <span data-animation="flipInY" data-animation-delay="300" class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-folder fa-stack-1x"></i></span></span>
                            <span data-animation="fadeInRight" data-animation-delay="500" class="title-inner">Course Categories <small> / In-plant Courses</small></span>
                        </h1>

                        <div class="thumbnails hotels">
                            <div class="carousel-slider">
                                <div class="owl-carousel slide-4">
                                    <?php  
                                    $theseCategories = $database -> select(true,'course_categories',"","cat_name LIMIT 50");
                                    foreach($theseCategories as $thisCategory){
                                    ?>
                                    <div>
                                        <div class="thumbnail no-border no-padding">
                                            <div class="caption">
                                                <h3 class="caption-title"><a href="<?php echo SITE_URL.'category/'.$thisCategory['cat_id'].'/'.  slugify($thisCategory['cat_name']).'/'; ?>"><?php echo $thisCategory['cat_name']; ?></a></h3>
                                                <div class="caption-rating rating">
                                                    <?php
                                                    $stars = CountItem($thisCategory['cat_id'],'department');
                                                    if($stars > 0 && $stars < 6 ){
                                                      for($i=1; $i<=$stars; $i++)   {                                                 
                                                    ?>
                                                    <span class="star active"></span><!--
                                                    -->
                                                    <?php } } else if($stars > 0 && $stars > 5){ ?>
                                                    <span class="star"></span><!--
                                                    --><span class="star active"></span><!--
                                                    --><span class="star active"></span><!--
                                                    --><span class="star active"></span><!--
                                                    --><span class="star active"></span><!--
                                                    --><span class="star active"></span><!--
                                                    -->
                                                    <?php } ?>
                                                </div>
                                                <p class="caption-text">Available Courses: <strong class="text-success"><?php echo $stars; ?></strong></p>
                                                <p class="caption-more"><a href="<?php echo SITE_URL.'category/'.$thisCategory['cat_id'].'/'.  slugify($thisCategory['cat_name']).'/'; ?>" class="btn btn-theme">View Courses</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="text-center margin-top">
                            <a data-animation="fadeInUp" data-animation-delay="100" href="<?php echo SITE_URL.'categories'; ?>" class="btn btn-theme btn-theme-grey-dark btn-theme-md"><i class="fa fa-folder"></i>&nbsp; See all Categories</a>
                        </div>

                    </div>
                </section>
                <!-- /PAGE -->

                <!-- PAGE -->
                <section class="page-section dark call-action">
                    <div class="container">
                        <div class="row div-table">
                            <div class="col-sm-12 col-md-10 div-cell">
                                <h1 class="section-title">Join Our Newsletter</h1>
                                <p class="font_roboto">Subscribe to our site to receive news/updates and training alerts as well as relevant information we believe can help you .</p>
                            </div>
                            <div class="col-sm-12 col-md-2 purchase-now div-cell">
                                <a href="#popup-login"  data-toggle="modal" class="btn btn-theme">SUBSCRIBE NOW</a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /PAGE -->


            </div>
            <!-- /Content area -->

            <?php include('includes/footer.php'); ?>

            <div class="to-top"><i class="fa fa-angle-up"></i></div>

        </div>
        <!-- /Wrap all content -->

        <!-- Popup: Login -->
        <div class="modal fade login-register" id="popup-login" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">                 
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="form-background">
                    <div class="popup-form col-sm-6">
                        <div class="form-header color">
                            <h1 class="section-title">
                                <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
                                <span class="title-inner">Subscribe to Our Site</span>
                            </h1>
                        </div>
                        <form method="post" action="<?php echo SITE_URL.'subscribe'; ?>" class="registration-form alt" name="registration-form-alt" id="registration-form-alt">
                            <div class="row">
                                <div class="col-sm-12 form-alert"></div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="User Name" title="" data-toggle="tooltip" class="form-control input-name" data-original-title="Name is required">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text"  placeholder="E-mail"  title="" data-toggle="tooltip" class="form-control input-password" data-original-title="Email is required">
                                    </div>
                                </div>                                  
                                <div class="col-sm-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-theme btn-block submit-button" data-animation-delay="100" data-animation="flipInY"> Subscribe Now <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>                         
                    </div> 

                </div>
            </div>

        </div>
        <!-- /Popup: Login -->

        <!-- JS Global -->

        <!--[if lt IE 9]><script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script><![endif]-->
        <!--[if gte IE 9]><!--><script src="assets/plugins/jquery/jquery-2.1.1.min.js"></script><!--<![endif]-->
        <script src="assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
        <script src="assets/plugins/modernizr.custom.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="assets/plugins/superfish/js/superfish.js"></script>
        <script src="assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
        <script src="assets/plugins/placeholdem.min.js"></script>
        <script src="assets/plugins/jquery.smoothscroll.min.js"></script>
        <script src="assets/plugins/jquery.easing.min.js"></script>
        <script src="assets/plugins/smooth-scrollbar.min.js"></script>

        <!-- JS Page Level -->
        <script src="assets/plugins/owlcarousel2/owl.carousel.min.js"></script>
        <script src="assets/plugins/waypoints/waypoints.min.js"></script>
        <script src="assets/plugins/countdown/jquery.plugin.min.js"></script>
        <script src="assets/plugins/countdown/jquery.countdown.min.js"></script>
        <script src="assets/plugins/isotope/jquery.isotope.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js19f6?v=3.exp&amp;sensor=false"></script>

        <script src="assets/js/theme-ajax-mail.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="assets/js/custom.js"></script>

        <script type="text/javascript">
            "use strict";
            jQuery(document).ready(function () {
                theme.init();
                theme.initMainSlider();
                theme.initCountDown();
                theme.initPartnerSlider();
                theme.initCorouselSlider4();
                theme.initTestimonials();
            });
            jQuery(window).load(function () {
                theme.initAnimation();
            });

            jQuery(window).load(function () {
                jQuery('body').scrollspy({offset: 100, target: '.navigation'});
            });
            jQuery(window).load(function () {
                jQuery('body').scrollspy('refresh');
            });
            jQuery(window).resize(function () {
                jQuery('body').scrollspy('refresh');
            });

            jQuery(document).ready(function () {
                theme.onResize();
            });
            jQuery(window).load(function () {
                theme.onResize();
            });
            jQuery(window).resize(function () {
                theme.onResize();
            });

            jQuery(window).load(function () {
                if (location.hash != '') {
                    var hash = '#' + window.location.hash.substr(1);
                    if (hash.length) {
                        jQuery('html,body').delay(0).animate({
                            scrollTop: jQuery(hash).offset().top - 44 + 'px'
                        }, {
                            duration: 1200,
                            easing: "easeInOutExpo"
                        });
                    }
                }
            });

        </script>

    </body>
</html>
