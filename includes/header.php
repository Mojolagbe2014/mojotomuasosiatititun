 <!-- HEADER -->
            <header class="header fixed">
                <div>
                    <?php if(isset($_SESSION['msg'])) {  ?>
                    <script src="<?php echo SITE_URL; ?>assets/plugins/sweet-alert/sweetalert.min.js" type="text/javascript"></script>
                    <script>
                        swal({
                            title: "Message Box!",
                            text: '<?php echo $_SESSION['msg']; ?>',
                            confirmButtonText: "Okay",
                            customClass: 'google',
                            html: true,
                            type: '<?php echo $_SESSION['msgStatus']; ?>'
                        });
                    </script>
                    <?php  unset($_SESSION['msg']); unset($_SESSION['msgStatus']);  } ?>
                </div>
                <!-- Top Line -->
                <div class="top-line">
                    <div class="container">
                        <ul class="user-menu">
                            <li><a href="#popup-login"  data-toggle="modal"><i class="fa fa-file-text-o"></i> Subscribe</a></li>
                        </ul>
                        <div class="hot-line">
                            <span><i class="fa fa-calendar"></i> <strong>Latest Event:</strong></span>                           
                            <div id="rotate"> 
                                <?php flashingUpcomingEvents(); ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- /Top Line -->

                <div class="container">
                    <div class="header-wrapper clearfix">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?php echo SITE_URL; ?>" class="scroll-to">
                                <span class="fa-stack">
                                    <img class="fa logo-hex fa-stack-2x" src="<?php echo SITE_URL; ?>assets/img/logo.png" alt=""/>
<!--                                    <i class="fa logo-hex fa-stack-2x"></i>
                                    <i class="fa logo-fa fa-map-marker fa-stack-1x"></i>-->
                                </span>
                                Tom Associates Training
                            </a>
                        </div>
                        <!-- /Logo -->

                        <!-- Navigation -->
                        <div id="mobile-menu"></div>
                        <nav class="navigation closed clearfix">
                            <a href="#" class="menu-toggle btn"><i class="fa fa-bars"></i></a>
                            <ul class="sf-menu nav">
                                <li class="<?php echo active($_SERVER['SCRIPT_NAME'], 'index', 'active'); ?>">
                                    <a href="<?php echo SITE_URL; ?>">Home</a>
                                </li>
                                <li class="<?php echo active($_SERVER['REQUEST_URI'], 'about-us', 'active').active($_SERVER['REQUEST_URI'], 'services', 'active').active($_SERVER['REQUEST_URI'], 'gallery', 'active'); ?>">
                                    <a href="<?php echo SITE_URL.'about-us'; ?>">About</a>
                                    <ul>
                                        <li><a href="<?php echo SITE_URL.'about-us'; ?>">About Us</a></li>
                                        <li><a href="<?php echo SITE_URL.'services'; ?>">Services</a></li>
                                        <li><a href="<?php echo SITE_URL.'gallery'; ?>">Gallery</a></li>
                                    </ul>
                                </li>
                                <li class="<?php echo active($_SERVER['REQUEST_URI'], 'course', 'active').active($_SERVER['REQUEST_URI'], 'categories', 'active'); ?>">
                                    <a href="<?php echo SITE_URL.'courses'; ?>">Courses</a> 
                                    <ul>
                                        <li><a href="<?php echo SITE_URL.'All Courses'; ?>">All Courses</a></li>
                                        <li><a href="<?php echo SITE_URL.'categories'; ?>">Categories/Departments</a></li>
                                    </ul>
                                </li>
                                <li class="<?php echo active($_SERVER['REQUEST_URI'], 'calendar', 'active'); ?>"><a href="<?php echo SITE_URL.'calendar'; ?>">Calendar</a></li>
                                <li class="<?php echo active($_SERVER['REQUEST_URI'], 'articles', 'active'); ?>"><a href="<?php echo SITE_URL.'articles'; ?>">Articles</a></li>
                                <li class="<?php echo active($_SERVER['REQUEST_URI'], 'contact-us', 'active'); ?>"><a href="<?php echo SITE_URL.'contact-us'; ?>">Contact Us</a></li>
                                <li class="header-search-wrapper">
                                    <form action="<?php echo SITE_URL.'search'; ?>" class="header-search-form">
                                        <input type="text" name="q" id="q" class="form-control header-search" placeholder="Search"/>
                                        <input type="submit" hidden="hidden"/>
                                    </form>
                                </li>
                                <li><a href="#" class="btn-search-toggle"><i class="fa fa-search"></i></a></li>
                            </ul>
                        </nav>
                        <!-- /Navigation -->

                    </div>
                </div>
            </header>
            <!-- /HEADER -->