<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();

$pageAuthor = "Tom Associates Training";
$pageTitle = "Our Training Gallery - $pageAuthor";
$pageDescription = $pageTitle;
$pageKeywords = "gallery, training, our, picture";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/meta-tags.php'); ?>

        <!-- CSS Global -->
        <link href="<?php echo SITE_URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo SITE_URL; ?>assets/plugins/owlcarousel2/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/owlcarousel2/assets/owl.theme.default.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/animate/animate.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/countdown/jquery.countdown.css" rel="stylesheet">

        <link href="<?php echo SITE_URL; ?>assets/css/theme.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/css/custom.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/css/additional-style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SITE_URL; ?>assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SITE_URL; ?>assets/plugins/sweet-alert/google.css" rel="stylesheet" type="text/css"/>
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

                <section class="page-section image breadcrumbs overlay">
                    <div class="container">
                        <h1>Our Training Gallery</h1>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li class="active">Our Gallery</li>
                        </ul>
                    </div>
                </section>


                <!-- PAGE -->
                <section class="page-section">
                    <div class="container">
                        <div class="section-title pull-left" style="width: auto;">
                            <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-picture-o fa-stack-1x"></i></span></span>
                        </div>
                        <ul id="filtrable-gallery" class="filtrable clearfix">
                            <li class="all current"><a href="#" data-filter="*">All</a></li>
                            <li class="photos"><a href="#" data-filter=".training">Training</a></li>
                            <li class="videos"><a href="#" data-filter=".facility">Facility</a></li>
                        </ul>
                        <div class="clear clearfix overflowed"></div>
                        <div class="row thumbnails no-padding gallery isotope isotope-items">
                            <?php
                            $galleryItems = $database->select(true,'gallery');
                            foreach($galleryItems as $galleryItem){
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12 isotope-item <?php echo $galleryItem['type'];?> ">
                                <div class="thumbnail no-border no-padding">
                                    <div class="media">
                                        <img src="<?php echo SITE_URL; ?>images/gallery/thumb/<?php echo $galleryItem['file'];?>" alt="" >
                                        <div class="caption hovered">
                                            <div class="caption-wrapper div-table">
                                                <div class="caption-inner div-cell">
                                                    <p class="caption-buttons">
                                                        
                                                        <a href="<?php echo SITE_URL; ?>images/gallery/<?php echo $galleryItem['file'];?>"    rel="prettyPhoto[gallery2]" title="<?php echo $galleryItem['title'];?>" class="btn caption-link"><i class="fa fa-plus"></i></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption hovered back">
                                            <div class="caption-wrapper div-table">
                                                <div class="caption-inner div-cell">
                                                    <h3 class="caption-title"><?php echo $galleryItem['title'];?></h3>
                                                    <p class="caption-category"><?php echo ucwords($galleryItem['type']);?> Gallery</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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

        <?php include('includes/subscription-form.php'); ?>

        <!-- JS Global -->

        <!--[if lt IE 9]><script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script><![endif]-->
        <script src="assets/plugins/jquery/jquery-2.1.1.min.js"></script>
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
        <script src="../../../maps.googleapis.com/maps/api/js19f6?v=3.exp&amp;sensor=false"></script>
        <script src="assets/js/theme.js"></script>
        <script type="text/javascript">
            "use strict";
            jQuery(document).ready(function () {
                theme.init();
                theme.initMainSlider();
                theme.initCountDown();
                theme.initPartnerSlider2();
                theme.initImageCarousel();
                theme.initTestimonials();
                theme.initGoogleMap();
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
