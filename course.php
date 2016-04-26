<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){ header("Location: ".SITE_URL."articles"); }

$data = array('event_id'=>$_GET['id'],"status"=>1);
$rows = $database -> select(false,"events",$data);

$this_event_state = ''; $add_param = '';
if($rows['state'] !=0){
    $rows_state = $database -> select(false,"states", array('id'=>$rows['state']));
    if($rows_state['id'] == 24){ $add_param = 'Ilorin - ';}
    $this_event_state = '<i class="fa fa-map-marker"></i> '.$add_param.$rows_state['name'].' State';
}

$database -> update("events","views=views + 1","event_id=".$_GET['id']);
//$mainDateArr = explode(",", $thisArticle['posted_date']);
//$dateArr = explode(" ", $mainDateArr[0]);
?>
<!DOCTYPE html>
<html lang="en"><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo ucwords(strtolower($rows['event_title'])); ?> - Tom Associates Training</title>
        <meta name="description" content="Tom Associates is a foremost and very consistent management training institution in Nigeria, focusing on the development of private and public sector managers since 1992.">
        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="<?php echo SITE_URL; ?>assets/ico/tom_favicon.ico">

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
                        <h1>EVENT DETAIL PAGE</h1>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li><a href="<?php echo SITE_URL.'courses'; ?>">All Courses</a></li>
                            <li class="active">Course Detail</li>
                        </ul>
                    </div>
                </section>


                <!-- PAGE -->
                <section class="page-section with-sidebar sidebar-right first-section light">
                    <div class="container">

                        <!-- Content -->
                        <section id="content" class="content col-sm-12 col-md-8 col-lg-9">

                            <div class="owl-carousel img-carousel">
                                <div class="item"><img class="img-responsive" src="assets/img/preview/img-slider-1.jpg" alt=""/></div>
                                <div class="item"><img class="img-responsive" src="assets/img/preview/img-slider-1.jpg" alt=""/></div>
                                <div class="item"><img class="img-responsive" src="assets/img/preview/img-slider-1.jpg" alt=""/></div>
                                <div class="item"><img class="img-responsive" src="assets/img/preview/img-slider-1.jpg" alt=""/></div>
                            </div>

                            <!-- -->
                            <hr class="page-divider transparent half"/>
                            <!-- -->

                            <h1 class="section-title">
                                <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-star fa-stack-1x"></i></span></span>
                                <span class="title-inner">What's about event <small>/ whats going on there come and learn</small></span>
                            </h1>
                            <p class="font_roboto font_size16">Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et fermentum semper.</p>
                            <p class="font_roboto font_size16">In hac habitasse platea dictumst. Curabitur eget dui id metus pulvinar suscipit. Quisque vitae ligula laoreet, scelerisque leo quis, facilisis metus. Sed pellentesque, urna sed varius consectetur, eros augue fringilla magna, id sem magna vel diam. Nulla sed hendrerit nunc.</p>
                            <p class="btn-row">
                                <a href="#" class="btn btn-theme btn-theme-xl scroll-to">Register <i class="fa fa-arrow-circle-right"></i></a><!--
                                --><a href="#" class="btn btn-theme btn-theme-xl btn-theme-transparent">Watch video</a>
                            </p>

                            <div class="text-center margin-top">
                                <a href="#" class="btn btn-theme btn-theme-grey-dark"><i class="fa fa-user"></i> See all speakers</a>
                            </div>

                            <!-- -->
                            <hr class="page-divider line large"/>
                            <!-- -->

                            <h1 class="section-title">
                                <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
                                <span class="title-inner">Register now <small> / dont mıss event!</small></span>
                            </h1>

                            <form id="registration-form" name="registration-form" class="registration-form registration-form-alt" action="#" method="post">
                                <div class="row">
                                    <div class="col-sm-12 form-alert"></div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group with-icon">
                                            <i class="fa fa-user"></i>
                                            <input
                                                type="text" class="form-control input-name"
                                                data-toggle="tooltip" title="Name is required"
                                                placeholder="Name and Surname"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group with-icon">
                                            <i class="fa fa-globe"></i>
                                            <input
                                                type="text" class="form-control input-email"
                                                data-toggle="tooltip" title="Mail is required"
                                                placeholder="Your Mail Here"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group selectpicker-wrapper">
                                            <select
                                                class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                data-toggle="tooltip" title="Select Your Price Tab">
                                                <option>Select Your Price Tab</option>
                                                <option>$100</option>
                                                <option>$200</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 overflowed">
                                        <div class="text-center margin-top">
                                            <button
                                                class="btn btn-theme btn-theme-xl submit-button" type="submit"
                                                > Register Now <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- -->
                            <hr class="page-divider line large"/>
                            <!-- -->

                            <h1 class="section-title">
                                <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-star fa-stack-1x"></i></span></span>
                                <span class="title-inner">You May Like</span>
                            </h1>

                            <div class="thumbnails events">
                                <div class="carousel-slider">
                                    <div class="owl-carousel slide-3">
                                        <div class="isotope-item festival">
                                            <div class="thumbnail no-border no-padding">
                                                <div class="media">
                                                    <a href="#" class="like"><i class="fa fa-heart"></i></a>
                                                    <div class="date">
                                                        <span>25</span>
                                                        <span>Jan</span>
                                                    </div>
                                                    <img src="assets/img/preview/hotel-1.jpg" alt="">
                                                    <div class="caption hovered"></div>
                                                </div>
                                                <div class="caption">
                                                    <h3 class="caption-title"><a href="#">Standart Event Name Here</a></h3>
                                                    <p class="caption-category"><i class="fa fa-file-text-o"></i> 15 October <i class="fa fa-map-marker"></i> Manhattan / New York</p>
                                                    <p class="caption-price">Tickets from $49,99</p>
                                                    <p class="caption-text">Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi.	</p>
                                                    <p class="caption-more"><a href="#" class="btn btn-theme">Tickets &amp; details</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="isotope-item festival">
                                            <div class="thumbnail no-border no-padding">
                                                <div class="media">
                                                    <a href="#" class="like"><i class="fa fa-heart"></i></a>
                                                    <div class="date">
                                                        <span>25</span>
                                                        <span>Jan</span>
                                                    </div>
                                                    <img src="assets/img/preview/hotel-1.jpg" alt="">
                                                    <div class="caption hovered"></div>
                                                </div>
                                                <div class="caption">
                                                    <h3 class="caption-title"><a href="#">Standart Event Name Here</a></h3>
                                                    <p class="caption-category"><i class="fa fa-file-text-o"></i> 15 October <i class="fa fa-map-marker"></i> Manhattan / New York</p>
                                                    <p class="caption-price">Tickets from $49,99</p>
                                                    <p class="caption-text">Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi.	</p>
                                                    <p class="caption-more"><a href="#" class="btn btn-theme">Tickets &amp; details</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="isotope-item festival">
                                            <div class="thumbnail no-border no-padding">
                                                <div class="media">
                                                    <a href="#" class="like"><i class="fa fa-heart"></i></a>
                                                    <div class="date">
                                                        <span>25</span>
                                                        <span>Jan</span>
                                                    </div>
                                                    <img src="assets/img/preview/hotel-1.jpg" alt="">
                                                    <div class="caption hovered"></div>
                                                </div>
                                                <div class="caption">
                                                    <h3 class="caption-title"><a href="#">Standart Event Name Here</a></h3>
                                                    <p class="caption-category"><i class="fa fa-file-text-o"></i> 15 October <i class="fa fa-map-marker"></i> Manhattan / New York</p>
                                                    <p class="caption-price">Tickets from $49,99</p>
                                                    <p class="caption-text">Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi.	</p>
                                                    <p class="caption-more"><a href="#" class="btn btn-theme">Tickets &amp; details</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<!--        <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>-->

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
                theme.initCorouselSlider4();
                theme.initCorouselSlider3();
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
