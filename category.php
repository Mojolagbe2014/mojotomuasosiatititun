<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){ header("Location: ".SITE_URL."courses"); }
$thisCategory = $database -> select(false,'course_categories'," cat_id = ".$_GET['id'],"cat_id LIMIT 1");

$recordperpage =  15;
$pg = "";
$pagenum = 1;
if(isset($_GET['page'])){
$pagenum = $_GET['page'];
$pg = $_GET['page'];
}
$offset = ($pagenum - 1) * $recordperpage;

$pageAuthor = "Tom Associates Training";
$pageTitle = "All Upcoming Courses in ".$thisCategory['cat_name'] ." Category - $pageAuthor";
$pageDescription = $pageTitle;
$pageKeywords = "course, upcoming";
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
                        <h1><?php echo $thisCategory['cat_name'] ." Courses "; ?></h1>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li class="active"><?php echo $thisCategory['cat_name'] ." Courses "; ?></li>
                        </ul>
                    </div>
                </section>


                <!-- PAGE -->
                <section class="page-section with-sidebar sidebar-right first-section">
                    <div class="container">

                        <!-- Sidebar -->
                        <aside id="sidebar" class="sidebar col-sm-4 col-md-3">

                            <div class="widget google-map-widget">
                                <!-- Google map -->
                                <div class="google-map1">
                                    <div id="map-canvas1"></div>
                                </div>
                                <!-- /Google map -->
                                <a href="#" class="link"><i class="fa fa-map-marker"></i> LAGOS,NIGERIA</a>
                            </div>

                            <div class="widget">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                              
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    Course Categories
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <ul>
                                                    <?php  
                                                    $thesSidebarCats = $database -> select(true,'course_categories',"","cat_name LIMIT 50");
                                                    foreach($thesSidebarCats as $thisSidebarCtg){
                                                    ?>
                                                    <li><a href="<?php echo SITE_URL.'category/'.$thisSidebarCtg['cat_id'].'/'.  slugify($thisSidebarCtg['cat_name']).'/'; ?>"><?php echo $thisSidebarCtg['cat_name']; ?> </a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </aside>
                        <!-- /Sidebar -->

                        <hr class="page-divider transparent visible-xs"/>

                        <!-- Content -->
                        <section id="content" class="content col-sm-8 col-md-9">

                            <div class="listing-meta">
                                <div class="options">
                                    <ul class="list-grid-tabs" role="tablist">                                    
                                        <li role="presentation"> <a class="view-list" href="#list-view" data-toggle="tab" role="tab" ><i class="fa fa-th-list"></i></a></li>
                                        <li class="active"  role="presentation"><a class="view-th " href="#grid-view" data-toggle="tab" role="tab"><i class="fa fa-th"></i></a></li>
                                    </ul>
                                </div>

                            </div>

                            <div class="tab-content">
                                <div id="list-view"  class="tab-pane fade" role="tabpanel">
                                    <div class="thumbnails events vertical">
                                        <?php
                                        $upcomingCourses = $database -> select(true,"events","status = 1 AND department =".$thisCategory['cat_id']." AND sort_date >= '".date('Y-m-d')."' ","sort_date LIMIT $recordperpage OFFSET $offset ");
                                        foreach($upcomingCourses as $upcomingCourse){
                                            $thisStartDat = explode(',', $upcomingCourse['start_date']);
                                            $thisStartDate =  explode(' ', $thisStartDat[0]);
                                        ?>
                                        <div class="thumbnail no-border no-padding">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3 col-xs-4">
                                                    <div class="media">
                                                        <a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/" class="like"><i class="fa fa-heart"></i></a>
                                                        <img src="<?php echo SITE_URL.'admin/images/courses/'.$upcomingCourse['image']; ?>" alt="<?php echo $upcomingCourse['event_title']; ?>">
                                                        <div class="caption hovered"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <div class="caption">
                                                        <a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/" class="pull-right">
                                                            <span class="fa-stack fa-lg">
                                                                <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                                <i class="fa fa-stack-1x fa-arrow-right"></i>
                                                            </span>
                                                        </a>
                                                        <h3 class="caption-title"><a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/"><?php echo ucwords(strtolower($upcomingCourse['event_title'])); ?></a></h3>
                                                        <p class="caption-category"><i class="fa fa-calendar-check-o"></i> <?php echo DateRange($upcomingCourse['start_date'],$upcomingCourse['end_date']);?></p>
                                                        <p class="caption-price"><?php echo $upcomingCourse['event_cost']; ?></p>
                                                        <p class="caption-text text-justify"><?php echo RemoveHTML($upcomingCourse['event_description'], 120); ?>..</p>
                                                        <p class="caption-more"><a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/" class="btn btn-theme">Booking &amp; details</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="page-divider half"/>
                                        <?php } ?>

                                    </div>

                                    <!-- Pagination -->
                                    <div class="pagination-wrapper">
                                        <?php PagingNew('events',"status = 1 and sort_date >= '".date('Y-m-d')."'","event_id",$recordperpage,$pagenum,"courses?get")?>
                                    </div>
                                    <!-- /Pagination -->
                                </div>
                                <div id="grid-view"  class="tab-pane fade active in" role="tabpanel">
                                    <div class="row thumbnails events">
                                        <?php
                                        $upcomingCours = $database -> select(true,"events","status = 1 AND department =".$thisCategory['cat_id']." AND sort_date >= '".date('Y-m-d')."' ","sort_date LIMIT $recordperpage OFFSET $offset ");
                                        foreach($upcomingCours as $upcomingCourse){
                                            $thisStartDat = explode(',', $upcomingCourse['start_date']);
                                            $thisStartDate =  explode(' ', $thisStartDat[0]);
                                        ?>
                                        <div class="col-md-4 col-sm-6 isotope-item festival">
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
                                                    <p class="caption-category"><i class="fa fa-file-text-o"></i> <?php echo DateRange($upcomingCourse['start_date'],$upcomingCourse['end_date']);?></p>
                                                    <p class="caption-price"><?php echo $upcomingCourse['event_cost']; ?></p>
                                                    <p class="caption-text text-justify"><?php echo RemoveHTML($upcomingCourse['event_description'], 120); ?>..</p>
                                                    <p class="caption-more"><a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/" class="btn btn-theme">Booking &amp; details</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <!-- Pagination -->
                                    <div class="pagination-wrapper">
                                        <?php PagingNew('events',"status = 1 and sort_date >= '".date('Y-m-d')."'","event_id",$recordperpage,$pagenum,"courses?get")?>
                                    </div>
                                    <!-- /Pagination -->
                                </div>                                
                            </div>
                        </section>
                        <!-- /Content -->

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
        <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

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
