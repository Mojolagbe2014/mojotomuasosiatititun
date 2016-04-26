<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();
?>
<!DOCTYPE html>
<html lang="en"><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About Us - Tom Associates Training</title>
        <meta name="description" content="Tom Associates is a foremost and very consistent management training institution in Nigeria, focusing on the development of private and public sector managers since 1992.">
        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/tom_favicon.ico">

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
                        <h1>About Us</h1>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </section>


                <!-- PAGE -->
                <section class="page-section with-sidebar sidebar-right first-section">
                    <div class="container">

                        <!-- Content -->
                        <section id="content" class="content col-sm-8 col-md-9">

                            <article class="post-wrap">
                                <div class="post-body">
                                    <div class="post-excerpt" style="line-height: 2.0">
                                        <h3>Who We Are</h3>

                                        <p class="text-justify">Tom Associates is a limited liability company incorporated in Nigeria. We commenced business in 1992. Tom Associates Management Development Centre is built on a well-appointed location at Anthony Village on the mainland of Lagos, Nigeria. It is a purpose-developed perfect venue for seminars, meetings, training sessions and retreats. The centre provides a most convenient meeting point when it is important to avoid the intractable Lagos traffic. It is also most accessible from both the local and international airports. There are six conference/meeting rooms which feature the latest in comfort and state-of-the-art equipment. The reference library is well-stocked.<br />
                                        Our core business is about:</p>

                                        
                                        <strong>Facilitation of Management Retreats.<br/>
                                            Workshops and seminars in: </strong>
                                            <ul>
                                                <li>Business Strategy &amp; Management</li>
                                                <li>Customer Service</li>
                                                <li>Financial Management</li>
                                                <li>Human Capital Management</li>
                                                <li>Leadership Development</li>
                                                <li>Marketing Management</li>
                                                <li>Personal Skills Development</li>
                                                <li>Production &amp; Quality Management</li>
                                                <li>Selling Skills &amp; Sales Management</li>
                                                <li>Administrative Management Skills</li>
                                            </ul>

                                        <h3>Our Philosophy</h3>

                                        <p>Our logo reflects our philosophy:<br />
                                        <em>Brighten up the knowledge, creativity and skills of young managers. Continuously stimulate the minds of managers who participate in the courses as only stimulated minds sustain their capacity for productive output.</em></p>

                                        <h3>Gains to Organizations</h3>

                                        <p>Our courses help organizations to:</p>

                                        <ul style="list-style-type:circle">
                                                <li>Discover successful ways to improve business performance</li>
                                                <li>Gain sustainable competitive edge by developing skills, creativity and commitment of employees</li>
                                                <li>Know how to put best practices into action</li>
                                                <li>Profit from the changing business environment</li>
                                        </ul>

                                        <h3>Gains to Employees</h3>

                                        <p>Employees who go through our courses do gain:</p>

                                        <ul>
                                                <li>Benefits from the practical experience of the professionals who lead our courses</li>
                                                <li>Enhanced personal skills</li>
                                                <li>A sense of achievement</li>
                                                <li>Renewed professional ambition</li>
                                                <li>Increased job satisfaction</li>
                                        </ul>

                                        <h3>Accreditations</h3>

                                        <p>Tom Associates is accredited by:</p>

                                        <ul>
                                                <li>Centre for Management Development (CMD)</li>
                                                <li>Industrial Training Fund (ITF)</li>
                                                <li>Nigerian Institute of Training and Development</li>
                                                <li>Directorate for Petroleum Resources</li>
                                        </ul>

                                    </div>
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
