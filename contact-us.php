<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
require 'assets/plugins/swiftmailer/lib/swift_required.php';

$database = new Database();
$errorArr = array();

if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) :  ''; 
    if($email == "") {array_push ($errorArr, "valid email ");}
    $name = filter_input(INPUT_POST, 'name') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'name')) :  ''; 
    if($name == "") {array_push ($errorArr, " name ");}
    $phone = filter_input(INPUT_POST, 'phone') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'phone')) :  ''; 
    if($phone == "") {array_push ($errorArr, " phone number ");}
    $body = filter_input(INPUT_POST, 'message') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'message')) :  ''; 
    if($body == "") {array_push ($errorArr, " message ");}
    $subject = filter_input(INPUT_POST, 'subject') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'subject')) :  ''; 

    if(count($errorArr) < 1)   {
        $emailAddress = 'info@tomassociatesng.com';
        if(empty($subject)) $subject = "Inquiry Message From: $name ($phone)";
        $transport = Swift_MailTransport::newInstance();
        $message = Swift_Message::newInstance();
        $message->setTo(array($emailAddress => "Tom Associate Training"));
        $message->setSubject($subject);
        $body = "<div><strong>Sender Name:</strong> $name <br/>  <strong>Sender email:</strong> $email <br/> <strong>Phone Number:</strong> $phone <br/> <strong>Message:</strong> <br/> </div>".$body;
        $message->setBody($body);
        $message->setFrom($email, $name);
        $message->setContentType("text/html");
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);
        $msgStatus = 'success';
        $msg = 'Your message has been sent.';
    }else{ $msgStatus = 'error'; $msg = $errorArr; }
    $_SESSION['msgStatus'] = $msgStatus;
    $_SESSION['msg'] = $msg;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact Us - Tom Associates Training</title>
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
                        <h1>Contact Us</h1>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li class="active">Contact us</li>
                        </ul>
                    </div>
                </section>


                <!-- PAGE -->
                <section class="page-section with-sidebar sidebar-right first-section">
                    <div class="container">

                        <!-- Content -->
                        <section id="content" class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1 class="section-title">
                                        <span data-animation="flipInY" data-animation-delay="100" class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
                                        <span data-animation="fadeInRight" data-animation-delay="100" class="title-inner">Contact Us <small></small></span>
                                    </h1>
                                    <p>5/7, Alade Lawal Street, Opposite Anthony Police Station, Idi-Iroko, Anthony Village, Lagos - Nigeria. </p>
                                    <p data-animation="fadeInUp" data-animation-delay="200" class="text-uppercase">
                                        +234 (0) 7046085660, +234 (0) 8033019120,<br/>
                                        +234 (0) 8033053518, +234 (0) 8055600325,<br/>
                                        +234 (0) 8178591654, +234 (0) 8034078783, <br/>
                                        +234 (0) 8065293674, +234 (0) 8023698989 </p>
                                    <p><a href="mailto: info@tomassociatesng.com"> info@tomassociatesng.com</a></p>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Google map -->
                                    <div class="google-map">
                                        <div id="map-canvas"></div>
                                    </div>
                                    <!-- /Google map -->
                                </div>
                            </div>
                        </section>
                        <!-- /Content -->

                    </div>
                </section>
                <!-- /PAGE -->

                <!-- PAGE CONTACT -->
                <section class="page-section color">
                    <div class="container">

                        <!-- Contact form -->
                        <form name="af-form" method="post" action="<?php echo SITE_URL.'contact-us'; ?>" class="af-form row" id="af-form">

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <input
                                        type="text" name="name" id="name" placeholder="Type Your Name..." value="" size="30"
                                        data-toggle="tooltip" title="Name is required"
                                        class="form-control placeholder" required="required"/>
                                </div>
                            </div>

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <input
                                        type="text" name="email" id="email" placeholder="Type Your Email..." value="" size="30"
                                        data-toggle="tooltip" title="Email is required"
                                        class="form-control placeholder" required="required"/>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <input
                                        type="text" name="phone" id="phone" placeholder="Type Your Phone Number..." value="" size="30"
                                        data-toggle="tooltip" title="Phone Number is required"
                                        class="form-control placeholder" required="required"/>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <input
                                        type="text" name="subject" id="subject" placeholder="Type Subject ..." value="" size="30"
                                        data-toggle="tooltip" title="Subject is required"
                                        class="form-control placeholder" required="required"/>
                                </div>
                            </div>

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <textarea
                                        name="message" id="input-message" placeholder="Type Your Message..." rows="4" cols="50"
                                        data-toggle="tooltip" title="Message is required"
                                        class="form-control placeholder" required="required"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 af-outer af-required text-center">
                                <div class="form-group af-inner">
                                    <input type="submit" name="submit" class="form-button form-button-submit btn btn-theme btn-theme-lg btn-theme-transparent" id="submit_btn" value="Send message" />
                                </div>
                            </div>

                        </form>
                        <!-- /Contact form -->

                    </div>
                </section>
                <!-- /PAGE CONTACT -->

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
        <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

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
