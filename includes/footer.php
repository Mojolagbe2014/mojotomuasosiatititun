<!-- FOOTER -->
            <footer class="footer">
                <div class="footer-widgets">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="widget widget-about">
                                    <h4 class="widget-title">About Us</h4>
                                    <p class="text-justify">Tom Associates Training promotes Peer Experiences Every day of the week Every week of the year All year round. Recently, participants in one of our Contract Management classes had a group case exercise involving three companies: execute a gas pipeline contract under very tight time and cost constraints with a very uncompromising weather window..</p>
                                    <address>
                                        <strong>Socialize with us &nbsp; : &nbsp;</strong><br/><br/>
                                        <div>
                                            <a href="http://twitter.com/TomAssociates" target="_blank" title="twitter page" style="color:#00CCFF;"><i class="fa fa-twitter fa-3x"></i></a> &nbsp; 
                                            <a href="https://www.facebook.com/tomassociates" target="_blank" title="facebook page" style="color:#039;"><i class="fa fa-facebook fa-3x"></i></a> &nbsp; 
                                            <a href="https://plus.google.com/110541269371353134717/about" target="_blank" title="google+ page" style="color:#F00;"><i class="fa fa-google-plus fa-3x"></i></a>
                                        </div>
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="widget widget-categories">
                                    <h4 class="widget-title">Knowledge in motion </h4>
                                    <ul>
                                        <?php
                                        $mediaItems = $database->select(true,'uploads',"","id LIMIT 10");
                                        foreach($mediaItems as $mediaItem){
                                        ?>
                                        <li><a href="<?php echo SITE_URL.'media-library'; ?>" title="<?php echo $mediaItem['title'];?>"><?php echo $mediaItem['title'];?></a></li>
	                         
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="widget widget-twitter">
                                    <h4 class="widget-title">Our Location</h4>
                                    <ul>
                                        <li>
                                            5/7, Alade Lawal Street, Opposite Anthony Police Station, Idi-Iroko, Anthony Village, Lagos - Nigeria. 
                                        </li>
                                        <li>
                                            <strong>Phone: </strong>+234 (0) 8033019120, +234 (0) 7046085660, +234 (0) 8033053518, +234 (0) 8055600325, +234 (0) 8178591654, +234 (0) 8034078783, +234 (0) 8065293674, +234 (0) 8023698989
                                        </li>
                                        <li>
                                            <strong>Email: </strong> info@tomassociatesng.com
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="widget widget-flickr-feed">
                                    <h4 class="widget-title"><span>Facilities Image Gallery</span></h4>
                                    <ul>
                                        <?php
                                        $facility = $database->select(true,'gallery',"type = 'facility'","gallery_id desc limit 0, 6");
                                        foreach($facility as $facility){
                                        ?>
                                        <li>
                                            <a class="thumb-holder" data-rel="prettyPhoto" href="<?php echo SITE_URL; ?>gallery" title="gallery image">
                                                <img src="<?php echo SITE_URL; ?>images/gallery/thumb/<?php echo $facility['file'];?>" alt="gallery images">
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="footer-meta footer-meta-alt">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-9 col-sm-6">
                                <ul class="footer-menu">
                                    <li><a href="<?php echo SITE_URL.'about-us'; ?>">About</a></li>
                                    <li><a href="<?php echo SITE_URL.'contact-us'; ?>">Contact</a></li>
                                    <li><a href="<?php echo SITE_URL.'courses'; ?>">Courses</a></li>
                                    <li><a href="<?php echo SITE_URL.'gallery'; ?>">Gallery</a></li>
                                    <li><a href="<?php echo SITE_URL.'articles'; ?>">Articles</a></li>
                                    <li><a href="<?php echo SITE_URL.'media-library'; ?>">Media Library</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                ©  <?php echo date('Y'); ?> Tom Associates Training. 
                        </div>

                    </div>
                </div>
            </footer>
            <!-- /FOOTER -->