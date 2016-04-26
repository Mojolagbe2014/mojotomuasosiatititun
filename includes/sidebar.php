<!-- Sidebar -->
                        <aside id="sidebar" class="sidebar col-sm-4 col-md-3">

                            <div class="widget categories">
                                <h4 class="widget-title">In-Plant Courses</h4>
                                <ul>
                                    <?php  
                                    $theseSidebarCats = $database -> select(true,'course_categories',"","cat_name LIMIT 50");
                                    foreach($theseSidebarCats as $thisSidebarCat){
                                    ?>
                                    <li><a href="<?php echo SITE_URL.'category/'.$thisSidebarCat['cat_id'].'/'.  slugify($thisSidebarCat['cat_name']).'/'; ?>"><?php echo $thisSidebarCat['cat_name']; ?> <small><?php echo CountItem($thisSidebarCat['cat_id'],'department') ?></small></a></li>
                                    <?php } ?>
                                </ul>
                            </div>

<!--                            <div class="widget">
                                <h4 class="widget-title">Facebook</h4>
                                <div class="fb-like-box" data-href="http://www.facebook.com/pages/Tom-Associates-Training/300089356711055" data-width="350" data-height="350" data-show-faces="true" data-stream="false" data-header="true"></div>
                            </div>-->

                        </aside>
                        <!-- /Sidebar -->