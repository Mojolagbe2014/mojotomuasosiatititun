<?php
$total_no = 8;
$hide = "";
$active = 'active';
for($counter = 0 ; $counter <= $total_no; $counter +=4){
	if($counter > 1) $active = '';
	if($counter == $total_no) $hide = 'style="display=none;"';
?>
<div class="item <?php echo $active;?>" <?php echo $hide;?> >
			            <div class="row">
                        <?php
						$gallery = $database->select(true,'gallery',"type = 'training'","gallery_id desc limit $counter, 6");
						foreach($gallery as $gallery){
							?>
							<div class="col-xs-6 col-sm-3 col-md-3" style="width:15%;">   
								<div class="thumbnail">
								    <div class="caption">
								    	<div class="caption-content">
									    	<span>
												<a data-rel="prettyPhoto" href="images/gallery/<?php echo $gallery['file'];?>" title="gallery Image">
												    <i class="fa fa-search"></i>              
												</a>
									        	<a href="#" class="" title="gallery Image url"><i class="fa fa-link"></i></a>
									        </span>
									       <!-- <h3><?php //echo $gallery['title'];?></h3>-->
									        <!--<p>Photo Descriptiton</p>-->
								    	</div>
								    </div>
								   <img height="200" width="200" src="images/gallery/thumb/<?php echo $gallery['file'];?>" alt="gallery Image url-<?php echo $gallery['gallery_id'];?>" />
								</div>
							</div>          
							
							<?php
						}
						?>
			            </div>
		          	</div>
<?php
}
?>