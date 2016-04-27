<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();

$recordperpage =  15;
$pagenum = 1;
if(isset($_GET['page'])){
$pagenum = $_GET['page'];
$pg = $_GET['page'];
}
$offset = ($pagenum - 1) * $recordperpage;

$pageAuthor = "Tom Associates Training";
$pageTitle = "Download our Knowledge in motion audio series - $pageAuthor";
$pageDescription = $pageTitle;
$pageKeywords = "media, library";
?>
<!DOCTYPE html>
<html lang="en"><!--<![endif]-->
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
    <body id="home" class="wide body-light multipage multipage-sub">

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
                        <h1>All Media Resources</h1>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li class="active">Media Resources</li>
                        </ul>
                    </div>
                </section>


                <!-- PAGE -->
                <section class="page-section with-sidebar sidebar-right first-section">
                    <div class="container">

                        <!-- Content -->
                        <section id="content" class="content col-sm-8 col-md-9">
                            <?php 
                            $theseMedia = $database->select(true,'uploads',""," id desc LIMIT $recordperpage OFFSET $offset");
                            foreach($theseMedia as $thisMedia){
                            ?>
                            <article class="post-wrap">
                                
                                <div class="post-header">
                                    <h2 class="post-title"><i class="fa fa-music"></i> <a href="<?php echo SITE_URL.'media/'.$thisMedia['filename']; ?>"><?php echo $thisMedia['title']; ?></a></h2>
                                </div>
                                <?php if($thisMedia['filename']!="" && file_exists("media/".$thisMedia['filename'])){ ?>
                                <div class="post-body">
                                    <div class="post-excerpt">
                                        <p>
                                            <audio controls style="width:100%;">
                                                <source src="media/<?php echo $thisMedia['filename'];?>" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio> 
                                        </p>
                                    </div>
                                </div>
                                <div class="post-footer">
                                    <span class="post-readmore">
                                        <a href="<?php echo SITE_URL.'media/'.$thisMedia['filename']; ?>" class="btn btn-theme btn-theme-transparent"><i class="fa fa-download"></i> Download</a>
                                    </span>
                                </div>
                                <?php } else { ?>
                                <div class="post-body">
                                    <div class="post-excerpt">
                                        <p><em class="text-danger text-center">The media file is not available.</em></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </article>
                            <?php } ?>
                            <!-- Pagination -->
                            <div class="pagination-wrapper">
                                <?php PagingNew('uploads',"","id",$recordperpage,$pagenum,"media-library?get")?>
                            </div>
                            <!-- /Pagination -->

                        </section>
                        <!-- /Content -->
                        <hr class="page-divider transparent visible-xs"/>

                        <?php include('includes/sidebar.php'); ?>

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
<!--        <script src="http://maps.googleapis.com/maps/api/js19f6?v=3.exp&amp;sensor=false"></script>-->

        <!--<script src="assets/js/theme-ajax-mail.js"></script>-->
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
