<?php
include('functions.php');

function redirect($link){
	header("location: $link");
	exit;
}

function RemoveHTML($str, $limit = null){
	$value = stripslashes(strip_tags($str));
	if($limit != null)
	$returnString = substr($value,0,$limit);
	else
	$returnString = $value;
	return str_replace('&nbsp;',"",$returnString);
}
function changeCase($str, $type = null){
	$change = strtolower($str);
	switch ($type){
		case 'u':
		return strtoupper($change);
		break;
		case 'l':
		return $change;
		break;
		case 's':
		return ucwords($change);
		break;
		default: 
		return $str;
	}
}
function DateRange($start, $end){
	$start_D = explode(",", $start);
	$end_D = explode(" ",$end);
	return $start_D[0]." - ".$end_D[1]." ".$end_D[2];
}
function CountItem($id,$column){
	global $database;
	$event = $database -> select(false,'events',"$column='$id' and status=1 and sort_date >= '".date('Y-m-d')."'","","count($column) as numrows");
	$number = $event['numrows'];
	return $number;
}


function PagingNew($table,$cond,$column,$recordperpage,$pagenum,$pagelink){
	global $database;
	$row = $database -> select(false,$table,$cond,"","count($column) as numrows");
	$total_record = $row ['numrows'];
	$maxpage = ceil($total_record / $recordperpage);

	//$nav ="";
	$current = "";
	$current = $pagenum;
	$index_limit = 8;
	$start=max($current-intval($index_limit/2), 1);
    $end=$start+$index_limit-1;	 
	echo '<div class="paging"><ul class="pagination">';

        if($current==1) {
            echo '<li class="disabled" ><a href="#"><i class="fa fa-angle-left"></i></a></li>
			';
        } else {
            $i = $current-1;
            echo '<li><a href="'.$pagelink.'&page=1" rel="nofollow" title="go to page 1">&laquo;</a>&nbsp;</li>
			<li><a href="'.$pagelink.'&page='.$i.'" rel="nofollow" title="go to previous">&lsaquo;</a>&nbsp;</li>
';
            //echo '<span class="prn">...</span>&nbsp;';
        }
		
	  if($start > 1) {
            $i = 1;
            echo '<li ><a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;</li>';
        }

        for ($i = $start; $i <= $end && $i <= $maxpage; $i++){
            if($i==$current) {
                echo '<li class="active"><a href="#" >'.$i.'</a></li>';
            } else {
                echo '<li><a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;</li>';
            }
        }
		   if($maxpage > $end){
            $i = $maxpage;
            echo '<li><a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;</li>';
        }

         if($current < $maxpage) {
            $i = $current+1;
            //echo '<span>...</span>&nbsp;';
            echo '<li class="next"><a href="'.$pagelink.'&page='.$i.'" class="prn" rel="nofollow" title="go to next page"><i class="fa fa-angle-right"></i></a>&nbsp;</li>
			<li class="last"><a href="'.$pagelink.'&page='.$maxpage.'" class="prn" rel="nofollow" title="go to last page">&raquo;</a>&nbsp;</li>';
        } else {
            echo '<li class="disabled"><a href="#" ><i class="fa fa-angle-right"></i></a></li>';
        }
        
        //if nothing passed to method or zero, then dont print result, else print the total count below:
        if ($maxpage != 0){
            //prints the total result count just below the paging
			echo '</ul><p id="total_count" style="text-align:center;">(Viewing Page '.$pagenum.' of '.$maxpage.') | (Total '.$total_record.' Result (s))</p></div>';
        }
}


?>
<?php
function ShowUpcomingEvents($limit="",$recordperpage="",$cat=""){
	global $database;
	$limitQuery = "";
	if($limit != "" || $recordperpage != "") $limitQuery = "limit ".$limit.",".$recordperpage; 
	$events = $database -> select(true,"events","status = 1 and sort_date >= '".date('Y-m-d')."' $cat ","sort_date $limitQuery");
	ob_start();
							foreach($events as $events){
						
?>
							<div class="feature-box clearfix">
				                <div class="feature-icon pull-left">
				                    <i class="fa fa-calendar"></i>
				                </div>
				                <div class="feature-box-content">
					                <h2 style="font-size:14px;"><?php echo changeCase($events['event_title']);?></h2>
					                <p><?php echo RemoveHTML($events['event_description'], 180)."...";?></p>
                                     <p style="color:#F00;"><?php echo DateRange($events['start_date'],$events['end_date']);?></p>
                                     <p><a href="training-detail?detail=<?php echo $events['event_id'];?>" class="read-more" style="color:#9B2231;" title="<?php echo changeCase($events['event_title']);?>">View Detail<i class="fa fa fa-long-arrow-right"></i></a></p>
					            </div>
				            </div>
     <?php  
							}
	$content = ob_get_clean();
	return $content;
}
function ShowCategories($limit="",$recordperpage=""){
	global $database;
	$limitQuery = "";
	if($limit != "" || $recordperpage != "") $limitQuery = "limit ".$limit.",".$recordperpage;
	$categories = $database -> select(true,'course_categories',"","cat_name $limitQuery");
	ob_start();
	?>
      <ul class="circle category-list clearfix">
                            <?php
							$categories = $database -> select(true,'course_categories');
							foreach ($categories as $category){
							?>
				              <li><a href="departments?courses=<?php echo $category['cat_id'];?>" title="<?php echo $category['cat_name'];?>"><?php echo $category['cat_name'];?></a><span class="posts-count"><?php echo CountItem($category['cat_id'],'department');?></span></li>
                              <?php
							  }
							  ?>
				            </ul>
<?php	
	$content = ob_get_clean();
	return $content;
}
?>
<?php
function ShowArticles($limit="",$recordperpage="",$single=false){
	global $database;
	$limitQuery = "";
	if($limit != "" || $recordperpage != "") $limitQuery = "limit ".$limit; 
	ob_start();
	if(!$single){
	$article = $database -> select(true,"articles","","article_id desc limit 4");
	
							foreach($article as $article){
						
?>
							<div class="feature-box clearfix">
				                <div class="feature-icon pull-left">
				                    <i class="fa fa-file-pdf-o"></i>
				                </div>
				                <div class="feature-box-content">
					                <h3><?php echo changeCase($article['article_title'],'s');?></h3>
					                <p><?php echo RemoveHTML($article['article_content'], 200);?></p>
                                     
                                     <p><a href="article?detail=<?php echo $article['article_id'];?>" class="read-more" style="color:#9B2231;" title="<?php echo changeCase($article['article_title'],'s');?>">Article Detail<i class="fa fa fa-long-arrow-right"></i></a></p>
					            </div>
				            </div>
     <?php  
							}
	}
	else{
		$article = $database -> select(false,"articles","","article_id desc ");
		?>
          <strong><?php echo changeCase($article['article_title'],'s');?></strong>
          <div>
          <?php echo RemoveHTML($article['article_content'], 400);?>....
          </div>
          <a href="article?detail=<?php echo $article['article_id'];?>" class="read-more" title="read more">Read More&nbsp;<i class="fa fa fa-long-arrow-right"></i></a>
        <?php
	}
	$content = ob_get_clean();
	return $content;
}
function count_events($day,$month,$year) {
	global $database;
	$counted ='';
	$sort = $year."-".$month."-".$day;
	$NewStartDate = date("Y-m-d", strtotime($sort));
	$rows = $database->select(true,'events',"sort_date ='$NewStartDate'");
	$num_rows = count($rows);
	
		if($num_rows > 0) { 
		
		if($num_rows > 1) { $event = "Trainings"; } else { $event = "Training"; }
		$counted = $num_rows . " " . $event;
		}
		return $counted;
	
}
function list_events($day,$month,$year) {
	global $database;
	$sort = $year."-".$month."-".$day;
	$NewStartDate = date("Y-m-d", strtotime($sort));
	$rows = $database->select(true,'events',"sort_date ='$NewStartDate'","event_id desc");
	
	$num_rows = count($rows);
		
		echo "<div class='list'>";
		if($num_rows == 0) {
			echo "<div id='blank'>No Training</div>";
			} else {
			
			echo "<div id='event_row_last'><b>";
			if($num_rows > 1) { echo " $num_rows Trainings Found"; } else { echo "$num_rows Training Found"; }
			echo "</b></div>";
			$x = 0;
			foreach($rows as $row) {
				$x++;
				/*$from = str_split($row['time_from'], 2);
				$from_hr = $from[0].' :';
				if($from_hr >= 12) { $dial_from = 'PM'; } else { $dial_from = 'AM'; }
				$from_min = $from[1]." ".$dial_from;
				
				$to = str_split($row['time_until'], 2);
				$to_hr = $to[0].' :';
				if($to_hr >= 12) { $dial_to = 'PM'; } else { $dial_to = 'AM'; }
				$to_min = $to[1]." ".$dial_to;*/
				
			echo "<div id='event_row'><h4> Training ".$x." </h2>";
				echo "<h2><span> TITLE : </span>" . stripslashes($row['event_title']) . "</h2>";
				echo "<h2><span> Start Date : </span>".$row['start_date']."</h2>";
				echo "<h2><span> End Date : </span>".$row['end_date']."</h2>";
				echo "<div class='content_calendar'><h2><span> Description : </span></h2>".substr(stripslashes(strip_tags($row['event_description'])),0,200)."<a href='".SITE_URL."course/".$row['event_id']."/".  slugify($row['event_title'])."/' target='_blank'> [...] More</a></div>";
			echo "</div>";
			}
		}
		echo "</div>";
	}
        
function flashingUpcomingEvents(){
    global $database;
    $rows = $database->select(true,'events',"status = 1 and sort_date >= '".date('Y-m-d')."'","event_id DESC LIMIT 30 ");

    $num_rows = count($rows);
    if($num_rows > 0) {
        foreach($rows as $row) {
            echo "\n".'<div>'.stripslashes($row['event_title']).' "'. DateRange($row['start_date'],$row['end_date']).'"</div>';
        }
    }
}

/**
* slugify()
* Convert string to slug.
* @param string $text Input string
*/
function slugify($text) { 
   $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
   $text = trim($text, '-');
   $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
   $text = strtolower($text);
   $text = preg_replace('~[^-\w]+~', '', $text);
   if (empty($text)) { return 'n-a';  }
   return $text;
}

function active($url, $menuName, $actPagCssClass){ 
    if(strpos($url, $menuName)){ 
        return $actPagCssClass;
    } 
 }
?>