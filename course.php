<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
require 'assets/plugins/swiftmailer/lib/swift_required.php';
$database = new Database();

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){ header("Location: ".SITE_URL."courses"); }

$data = array('event_id'=>$_GET['id'],"status"=>1);
$rows = $database -> select(false,"events",$data);

$this_event_state = ''; $add_param = '';
if($rows['state'] !=0){
    $rows_state = $database -> select(false,"states", array('id'=>$rows['state']));
    if($rows_state['id'] == 24){ $add_param = 'Ilorin - ';}
    $this_event_state = '<i class="fa fa-map-marker"></i> <a href="#"> '.$add_param.$rows_state['name'].' State</a>';
}

$database -> update("events","views=views + 1","event_id=".$_GET['id']);
$errorArr = array();

if(isset($_POST['submit-registration'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) :  ''; 
    if($email == "") {array_push ($errorArr, "valid email ");}
    
    $name = filter_input(INPUT_POST, 'name') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'name')) :  ''; 
    if($name == "" || $name == "Name and Surname") {array_push ($errorArr, " name ");}
    
    $company = filter_input(INPUT_POST, 'company') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'company')) :  ''; 
    if($company == "" || $company == "Your Company Here") {array_push ($errorArr, " company ");}
    
    $phone = filter_input(INPUT_POST, 'telephone') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'telephone')) :  ''; 
    if($phone == "" || $company == "Your Telephone Here") {array_push ($errorArr, " phone number ");}
    
    $body = filter_input(INPUT_POST, 'message') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'message')) :  ''; 
    
    $approver = filter_input(INPUT_POST, 'approver') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'approver')) :  '';
    if($approver == "Approver\'s Name Here") { $approver = "";}
    
    $approverNo = filter_input(INPUT_POST, 'approverNo') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'approverNo')) :  ''; 
    if($approverNo == "Approver\'s Telephone") { $approverNo = "";}
    
    
    $subject = filter_input(INPUT_POST, 'title') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'title')) :  ''; 
    if($subject == "") {array_push ($errorArr, " event title ");}
    
    $eventId = filter_input(INPUT_POST, 'courseID') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'courseID')) :  ''; 
    if($eventId == "") {array_push ($errorArr, " event ID ");}
    
    if(count($errorArr) < 1)   {
        $data = array('event_id'=>$eventId,"name"=>$name,"company"=>$company,"email"=>$email,"message"=>$body,"approver"=>$approver,"approver_no"=>$approverNo,"telephone"=>$phone);

        $database-> insert("registration",$data);
        $id = $database->InsertID();
        
        $emailAddress = 'info@tomassociatesng.com';
        
        $transport = Swift_MailTransport::newInstance();
        $message = Swift_Message::newInstance();
        $message->setTo(array($emailAddress => "Tom Associate Training"));
        
        $message->setSubject("New Course Registration for ".$subject);
        $body = "<div><strong>Sender Name:</strong> $name <br/>  <strong>Sender email:</strong> $email <br/>  <strong>Sender Company:</strong> $company <br/> <strong>Phone Number:</strong> $phone <br/>  <strong>Approver Person:</strong> $approver <br/>  <strong>Approver Phone Number:</strong> $approverNo <br/>  <strong>Event Title:</strong> $subject <br/>  <strong>Comment:</strong> <br/> </div>".$body;
        $message->setBody($body);
        $message->setFrom($email, $name);
        $message->setContentType("text/html");
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);
        
        $_SESSION['regNumber'] = $resitrationNumber = 1000 + $id;
        $database -> update("registration","reg_number='".$resitrationNumber."'","reg_id=".$id);
        
        $msgStatus = 'success';
        $msg = messageBox('<h1 style="font-size:18px">Course registration is successfully done!!!</h1>'.$body, 'success');
    }else{ $msgStatus = 'error'; $msg = showError($errorArr); }
    $_SESSION['msgStatus'] = $msgStatus;
    $_SESSION['msg'] = $msg;
}
$pageAuthor = "Tom Associates Training";
$pageTitle = $rows['event_title']." - $pageAuthor";
$pageDescription = RemoveHTML($rows['event_description'], 160);
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
                        <h2 style="color:#fff"><?php echo $rows['event_title'];?></h2>
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
                                <div class="item">
                                    <img class="img-responsive" src="<?php echo SITE_URL.'admin/images/courses/'.$rows['image']; ?>" alt=""/>
                                    <div class="post-meta margin-top">
                                        <span class="post-meta-date"><i class="fa fa-calendar"></i>&nbsp;<a href="#"><?php echo DateRange($rows['start_date'],$rows['end_date']);?></a></span> &nbsp; 
                                        <span class="post-meta-author"><a href="#"><i class="fa fa-clock-o"></i> <?php echo "Duration: ".dateDiff($rows['start_date'],$rows['end_date']);?></a></span>  &nbsp; 
                                        <span class="post-meta-cats"><i class="fa fa-money"></i><a href="#">&nbsp;Fee: <?php echo $rows['event_cost'];?></a></span> &nbsp; 
                                        <span class="post-meta-cats"><?php echo $this_event_state;?> </span>
                                    </div>
                                </div>
                            </div>

                            <!-- -->
                            <hr class="page-divider transparent half"/>
                            <!-- -->

                            <h1 class="section-title">
                                <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-star fa-stack-1x"></i></span></span>
                                <span class="title-inner">Course Description</span>
                            </h1>
                            <div class="post-body">
                                <div class="post-excerpt" style="line-height:2.0;"><?php echo stripslashes($rows['event_description']);?></div>
                            </div>
                            <!-- -->
                            <hr class="page-divider line large"/>
                            <!-- -->

                            <form id="registration-form" name="registration-form" class="registration-form registration-form-alt" action="" method="post">
                                <div class="row">
                                    <div class="col-sm-12 form-alert"></div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group with-icon">
                                            <i class="fa fa-user"></i>
                                            <input name="name"
                                                type="text" class="form-control"
                                                data-toggle="tooltip" title="Name is required"
                                                placeholder="Name and Surname" required="required"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group with-icon">
                                            <i class="fa fa-building"></i>
                                            <input name="company"
                                                type="text" class="form-control input-email"
                                                data-toggle="tooltip" title="Company is required"
                                                placeholder="Your Company Here" required="required"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group with-icon">
                                            <i class="fa fa-phone"></i>
                                            <input name="telephone"
                                                type="text" class="form-control input-email"
                                                data-toggle="tooltip" title="Telephone is required"
                                                placeholder="Your Telephone Here" required="required"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group with-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input name="email"
                                                type="email" class="form-control input-email"
                                                data-toggle="tooltip" title="Email is required"
                                                placeholder="Your Email Here" required="required"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group with-icon">
                                            <i class="fa fa-user-secret"></i>
                                            <input name="approver"
                                                type="text" class="form-control"
                                                data-toggle="tooltip" title="Approver's Name is required"
                                                placeholder="Approver's Name Here"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group with-icon">
                                            <i class="fa fa-phone-square"></i>
                                            <input name="approverNo"
                                                type="text" class="form-control input-email"
                                                data-toggle="tooltip" title="Approver's Telephone is required"
                                                placeholder="Approver's Telephone"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-12">
                                        
                                        <div class="form-group with-icon">
                                            <label for="message">Additional Note</label>
                                            <textarea class="form-control input-name" name="message" id="message" data-toggle="tooltip" title="" placeholder="" rows="8" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <input name="courseID" id="courseID" type="hidden" value="<?php echo $rows['event_id']; ?>">
                                    <input name="title" id="title" type="hidden" value="<?php echo $rows['event_title']; ?>">
                                    
                                    <div class="col-md-12 overflowed">
                                        <div class="text-center margin-top">
                                            <button name="submit-registration"
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
                                <span class="title-inner">You May Also Like</span>
                            </h1>

                            <div class="thumbnails events">
                                <div class="carousel-slider">
                                    <div class="owl-carousel slide-3">
                                        <?php
                                        $upcomingCourses = $database -> select(true,"events","status = 1 AND event_id !=".$rows['event_id']." AND sort_date >= '".date('Y-m-d')."' ","sort_date LIMIT 5 ");
                                        foreach($upcomingCourses as $upcomingCourse){
                                            $thisStartDat = explode(',', $upcomingCourse['start_date']);
                                            $thisStartDate =  explode(' ', $thisStartDat[0]);
                                        ?>
                                        <div class="isotope-item festival">
                                            <div class="thumbnail no-border no-padding">
                                                <div class="media">
                                                    <a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/" class="like"><i class="fa fa-heart"></i></a>
                                                    <div class="date">
                                                        <span><?php echo $thisStartDate[1]; ?></span>
                                                        <span><?php echo substr($thisStartDate[0], 0, 3); ?></span>
                                                    </div>
                                                    <img src="<?php echo SITE_URL.'admin/images/courses/'.$upcomingCourse['image']; ?>" alt="<?php echo $upcomingCourse['image']; ?>">
                                                    <div class="caption hovered"></div>
                                                </div>
                                                <div class="caption">
                                                    <h3 class="caption-title"><a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/"><?php echo $upcomingCourse['event_title']; ?></a></h3>
                                                    <p class="caption-category"><i class="fa fa-calendar-check-o"></i> <?php echo DateRange($upcomingCourse['start_date'],$upcomingCourse['end_date']);?></p>
                                                    <p class="caption-price"> <?php echo $upcomingCourse['event_cost']; ?></p>
                                                    <p class="caption-text"> <?php echo RemoveHTML($upcomingCourse['event_description'], 120); ?>..</p>
                                                    <p class="caption-more"><a href="<?php echo SITE_URL.'course/'.$upcomingCourse['event_id'].'/'.  slugify($upcomingCourse['event_title']); ?>/" class="btn btn-theme">Booking &amp; details</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
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
