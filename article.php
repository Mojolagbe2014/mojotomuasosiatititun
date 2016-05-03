<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){ header("Location: ".SITE_URL."articles"); }
$data = array('article_id'=>$_GET['id']);
$thisArticle = $database -> select(false,"articles",$data);
$database -> update("articles","views=views + 1","article_id=".$_GET['id']);
$mainDateArr = explode(",", $thisArticle['posted_date']);
$dateArr = explode(" ", $mainDateArr[0]);

$pageAuthor = "Tom Associates Training";
$pageTitle = ucwords(strtolower($thisArticle['article_title']))." - $pageAuthor";
$pageDescription = $pageTitle;
$pageKeywords = "article, resources";
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

        <link href="<?php echo SITE_URL; ?>assets/css/theme.css?<?php echo time() ?>" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/css/custom.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/css/additional-style.css?<?php echo time() ?>" rel="stylesheet" type="text/css"/>
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
                        <h1><?php echo $thisArticle['article_title']; ?></h1>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li><a href="<?php echo SITE_URL.'articles'; ?>">Articles</a></li>
                            <li class="active">Article Details</li>
                        </ul>
                    </div>
                </section>


                <!-- PAGE -->
                <section class="page-section with-sidebar sidebar-right first-section">
                    <div class="container">

                        <!-- Content -->
                        <section id="content" class="content col-sm-8 col-md-9">

                            <article class="post-wrap">
                                <div class="post-header">
                                    <h2 class="post-title"><a href="#"><?php echo $thisArticle['article_title']; ?></a></h2>
                                    <div class="post-meta">
                                        <span class="post-date">
                                            Posted on
                                            <span class="day"><?php echo $dateArr[1]; ?></span>
                                            <span class="month"><?php echo $dateArr[0]; ?>,</span>
                                            <span class="year"><?php echo $mainDateArr[1]; ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="post-body">
                                    <div class="post-excerpt"><?php echo stripslashes($thisArticle['article_content']);?></div>
                                </div>
                            </article>
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
        <script src="<?php echo SITE_URL; ?>assets/plugins/jquery/jquery-2.1.1.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/modernizr.custom.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/superfish/js/superfish.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/placeholdem.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/jquery.smoothscroll.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/jquery.easing.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/smooth-scrollbar.min.js"></script>

        <!-- JS Page Level -->
        <script src="<?php echo SITE_URL; ?>assets/plugins/owlcarousel2/owl.carousel.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/waypoints/waypoints.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/countdown/jquery.plugin.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/countdown/jquery.countdown.min.js"></script>
        <script src="<?php echo SITE_URL; ?>assets/plugins/isotope/jquery.isotope.min.js"></script>
<!--        <script src="http://maps.googleapis.com/maps/api/js19f6?v=3.exp&amp;sensor=false"></script>-->

        <!--<script src="assets/js/theme-ajax-mail.js"></script>-->
        <script src="<?php echo SITE_URL; ?>assets/js/theme.js"></script>

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
