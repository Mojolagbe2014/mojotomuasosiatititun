<div class="sidebar">

						<!-- Blog search start -->
						<!-- Blog search end -->

						<!-- Tab widget start-->
						<div class="widget widget-tab">
							<ul class="nav nav-tabs">
				              <li class="active"><a href="#popular-tab" data-toggle="tab">Courses</a></li>
				             
				             <li><a href="#comments-tab" data-toggle="tab">Quote of the day</a></li>
				            </ul>
				            <div class="tab-content">
				            	<div class="tab-pane active" id="popular-tab">
					                <ul class="posts-list unstyled clearfix">
                                    <?php
									$events = $database -> select(true,"events","status = 1 and sort_date >= '".date('Y-m-d')."'","sort_date limit 0, 7");
									foreach($events as $events){
									?>
	<li><div class="feature-icon pull-left">
				                    <i class="fa fa-calendar"></i>
				                </div>&nbsp;<a href="training-detail?detail=<?php echo $events['event_id'];?>" style="font-size:12px;"><?php echo $events['event_title'];?></a><br />
    <?php echo DateRange($events['start_date'],$events['end_date']);?>
    </li>
    <?php
									}
									?>
					                </ul>
					            </div><!-- Popular tabpan end -->

					          

					            <div class="tab-pane" id="comments-tab">
					                 <?php
						  $quote = $database->select(false,'quotes',"","quote_id desc");
						  ?>
		                    <p><?php echo $quote['content'];?></p>
					            </div><!-- Comment tabpan end -->
				            </div><!-- Tab content end -->
						</div><!-- Tab widget end-->

						<!-- Blog category start -->
						<div class="widget widget-categories">
							<h3 class="widget-title">In-plant Courses</h3>
							 <?php
							echo ShowCategories();
							  ?>
						</div><!-- Blog category end -->

						<!-- Blog tags start -->
						<div class="widget widget-tags">
							<h3 class="widget-title">Facebook</h3>
							<div class="fb-like-box" data-href="http://www.facebook.com/pages/Tom-Associates-Training/300089356711055" data-width="350" data-height="350" data-show-faces="true" data-stream="false" data-header="true"></div>
                            
						</div><!-- Blog tags end -->
					</div>