<?php
include("timeinterval.php");
//array for the add event form field
$add_event = array('title'=>'','description'=>'','venue'=>'','fee'=>'','start_date'=>'','end_date'=>'','time'=>'','department'=>'','state'=>'');

$register = array('name'=>'','company'=>'','address'=>'','email'=>'','telephone'=>'', 'approvers_name'=>'','approvers_nos'=>'');

// general inser, delete, update query function
function MysqlQuery($Insertquery){
	global $sql_connection;
	$query = $Insertquery;
	$result = mysqli_query($sql_connection,$query) or die("Invalid Query".mysqli_error($sql_connection));
	if($result){
		return true;
	}
}
function NUM_ROWS($result){
	$number = mysqli_num_rows($result);
	return $number;
}
function SqlArrays ($result){
	$array = mysqli_fetch_array($result);
	return $array;
}
// retrieving query
function MysqlSelectQuery($Insertquery){
	global $sql_connection;
	$query = $Insertquery;
	$result = mysqli_query($sql_connection,$query) or die("Invalid Query".mysqli_error($sql_connection));
		return $result;
}
function checkFields(){
		while (list ($key, $val) = each ($_POST)) {
		if ($val == "") return false;
		else 
		return true;
	}
}

function successMsg($message){
	$msg = '<p class="info" id="success"><span class="info_inner">'.$message.'</span></p>';
	return $msg;
}
function warningMsg($message){
	$msg = '<p class="info" id="warning"><span class="info_inner">'.$message.'</span></p>';
	return $msg;
}
function errorMsgLogin($message){
	$msg = '<p class="error">'.$message.'</p>';
	return $msg;
}
function errorMsg($message){
	$msg = '<p class="info" id="error"><span class="info_inner">'.$message.'</span></p>';
	return $msg;
}
function isValidURL($url)
{
return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}
/********************************************************************************************************
Url Rewrite Paging
*******************************************************************/
function Pages_rewrite($query1,$recordperpage,$pagenum,$pagelink){
	$result = MysqlSelectQuery($query1) or die ("Invalid Query:".mysqli_error());
	$row = SqlArrays($result);
	$total_record = $row ['numrows'];
	$maxpage = ceil($total_record / $recordperpage);

	//$nav ="";
	$current = "";
	$current = $pagenum;
	$index_limit = 10;
	$start=max($current-intval($index_limit/2), 1);
    $end=$start+$index_limit-1;	 
	echo '<br /><br /><div class="paging">';

        if($current==1) {
            echo '<span class="prn">&lt; Previous</span>&nbsp;';
        } else {
            $i = $current-1;
            echo '<a href="'.$pagelink.'page/'.$i.'/" class="prn" rel="nofollow" title="go to page'.$i.'">&lt; Previous</a>&nbsp;';
            echo '<span class="prn">...</span>&nbsp;';
        }
		
	  if($start > 1) {
            $i = 1;
            echo '<a href="'.$pagelink.'page/'.$i.'/" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        for ($i = $start; $i <= $end && $i <= $maxpage; $i++){
            if($i==$current) {
                echo '<span>'.$i.'</span>&nbsp;';
            } else {
                echo '<a href="'.$pagelink.'page/'.$i.'/" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
            }
        }
		   if($maxpage > $end){
            $i = $maxpage;
            echo '<a href="'.$pagelink.'page/'.$i.'/" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        if($current < $maxpage) {
            $i = $current+1;
            echo '<span class="prn">...</span>&nbsp;';
            echo '<a href="'.$pagelink.'page/'.$i.'/" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
        } else {
            echo '<span class="prn">Next &gt;</span>&nbsp;';
        }
        
        //if nothing passed to method or zero, then dont print result, else print the total count below:
        if ($maxpage != 0){
            //prints the total result count just below the paging
			echo '<p id="total_count">(Viewing Page '.$pagenum.' of '.$maxpage.') | (Total '.$total_record.' Result (s))</p></div>';
        }
}
/****************************************
End Url Rewrite Paging
*******************************/

/********************************************************************************************************
Url Rewrite Paging
*******************************************************************/
function Paging($query1,$recordperpage,$pagenum,$pagelink){
	$result = MysqlSelectQuery($query1) or die ("Invalid Query:".mysqli_error());
	$row = SqlArrays($result);
	$total_record = $row ['numrows'];
	$maxpage = ceil($total_record / $recordperpage);

	//$nav ="";
	$current = "";
	$current = $pagenum;
	$index_limit = 10;
	$start=max($current-intval($index_limit/2), 1);
    $end=$start+$index_limit-1;	 
	echo '<br /><br /><div class="paging">';

        if($current==1) {
            echo '<span class="prn">&lt; Previous</span>&nbsp;';
        } else {
            $i = $current-1;
            echo '<a href="'.$pagelink.'&page='.$i.'" class="prn" rel="nofollow" title="go to page'.$i.'">&lt; Previous</a>&nbsp;';
            echo '<span class="prn">...</span>&nbsp;';
        }
		
	  if($start > 1) {
            $i = 1;
            echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        for ($i = $start; $i <= $end && $i <= $maxpage; $i++){
            if($i==$current) {
                echo '<span>'.$i.'</span>&nbsp;';
            } else {
                echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
            }
        }
		   if($maxpage > $end){
            $i = $maxpage;
            echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        if($current < $maxpage) {
            $i = $current+1;
            echo '<span class="prn">...</span>&nbsp;';
            echo '<a href="'.$pagelink.'&page='.$i.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
        } else {
            echo '<span class="prn">Next &gt;</span>&nbsp;';
        }
        
        //if nothing passed to method or zero, then dont print result, else print the total count below:
        if ($maxpage != 0){
            //prints the total result count just below the paging
			echo '<p id="total_count">(Viewing Page '.$pagenum.' of '.$maxpage.') | (Total '.$total_record.' Result (s))</p></div>';
        }
}
/****************************************
End Url Rewrite Paging
*******************************/

/********************************************************************************************************
Url Rewrite Paging
*******************************************************************/
function Pages_admin($query1,$recordperpage,$pagenum,$pagelink){
	$result = MysqlSelectQuery($query1) or die ("Invalid Query:".mysqli_error());
	$row = SqlArrays($result);
	$total_record = $row ['numrows'];
	$maxpage = ceil($total_record / $recordperpage);

	//$nav ="";
	$current = "";
	$current = $pagenum;
	$index_limit = 10;
	$start=max($current-intval($index_limit/2), 1);
    $end=$start+$index_limit-1;	 
	echo '<div class="pagination" id="paging_button">';

        if($current==1) {
            echo '<span class="previous-off">&laquo; Previous</span>';
        } else {
            $i = $current-1;
            echo '<a href="'.$pagelink.'&page='.$i.'" rel="nofollow" title="go to page'.$i.'">&laquo; Previous</a>&nbsp;';
            
        }
		
	  if($start > 1) {
            $i = 1;
            echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        for ($i = $start; $i <= $end && $i <= $maxpage; $i++){
            if($i==$current) {
                echo ' <span class="active">'.$i.'</span>&nbsp;';
            } else {
                echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
            }
        }
		   if($maxpage > $end){
            $i = $maxpage;
            echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        if($current < $maxpage) {
            $i = $current+1;
            echo '<span>...</span>&nbsp;';
            echo '<a href="'.$pagelink.'&page='.$i.'" class="next" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
        } else {
            echo '<span class="disabled">Next &gt;</span>&nbsp;';
        }
        
        //if nothing passed to method or zero, then dont print result, else print the total count below:
        if ($maxpage != 0){
            //prints the total result count just below the paging
			echo '<p id="total_count">(Viewing Page '.$pagenum.' of '.$maxpage.') | (Total '.$total_record.' Result (s))</p></div>';
        }
}

function Pages_admin_fancy($query1,$recordperpage,$pagenum,$pagelink){
	$result = MysqlSelectQuery($query1) or die ("Invalid Query:".mysqli_error());
	$row = SqlArrays($result);
	$total_record = $row ['numrows'];
	$maxpage = ceil($total_record / $recordperpage);

	//$nav ="";
	$current = "";
	$current = $pagenum;
	$index_limit = 10;
	$start=max($current-intval($index_limit/2), 1);
    $end=$start+$index_limit-1;	 
	echo '<div class="pagination" id="paging_button">';

        if($current==1) {
            echo '<span class="previous-off">&laquo; Previous</span>';
        } else {
            $i = $current-1;
            echo '<a href="javascript: void(0)" id="'.$i.'" rel="nofollow" title="go to page'.$i.'">&laquo; Previous</a>&nbsp;';
            
        }
		
	  if($start > 1) {
            $i = 1;
            echo '<a href="javascript: void(0)" id="'.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        for ($i = $start; $i <= $end && $i <= $maxpage; $i++){
           /* if($i==$current) {
                echo ' <span class="active">'.$i.'</span>&nbsp;';
            } else {*/
                echo '<a href="javascript: void(0)" id="'.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
           // }
        }
		   if($maxpage > $end){
            $i = $maxpage;
            echo '<a href="javascript: void(0)" id="'.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        if($current < $maxpage) {
            $i = $current+1;
            echo '<span>...</span>&nbsp;';
            echo '<a href="javascript: void(0)" id="'.$i.'" class="next" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
        } else {
            echo '<span class="disabled">Next &gt;</span>&nbsp;';
        }
        
        //if nothing passed to method or zero, then dont print result, else print the total count below:
        if ($maxpage != 0){
            //prints the total result count just below the paging
			echo '<p id="total_count">(Viewing Page '.$pagenum.' of '.$maxpage.') | (Total '.$total_record.' Result (s))</p></div>';
        }
}
/****************************************
End Url Rewrite Paging
*******************************/
function nicetime($date)

{

if(empty($date)) {

return "No date provided";

}

$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

$lengths = array("60","60","24","7","4.35","12","10");

$now = time();

$unix_date = strtotime($date);

// check validity of date

if(empty($unix_date)) {

return "Bad date";

}

// is it future date or past date

if($now > $unix_date) {

$difference = $now - $unix_date;

$tense = "ago";

} else {

$difference = $unix_date - $now;
$tense = "from now";}

for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {

$difference /= $lengths[$j];

}

$difference = round($difference);

if($difference != 1) {

$periods[$j].= "s";

}

return "$difference $periods[$j] {$tense}";

}

function smcf_validate_email($email) {
	$at = strrpos($email, "@");

	// Make sure the at (@) sybmol exists and  
	// it is not the first or last character
	if ($at && ($at < 1 || ($at + 1) == strlen($email)))
		return false;

	// Make sure there aren't multiple periods together
	if (preg_match("/(\.{2,})/", $email))
		return false;

	// Break up the local and domain portions
	$local = substr($email, 0, $at);
	$domain = substr($email, $at + 1);


	// Check lengths
	$locLen = strlen($local);
	$domLen = strlen($domain);
	if ($locLen < 1 || $locLen > 64 || $domLen < 4 || $domLen > 255)
		return false;

	// Make sure local and domain don't start with or end with a period
	if (preg_match("/(^\.|\.$)/", $local) || preg_match("/(^\.|\.$)/", $domain))
		return false;

	// Check for quoted-string addresses
	// Since almost anything is allowed in a quoted-string address,
	// we're just going to let them go through
	if (!preg_match('/^"(.+)"$/', $local)) {
		// It's a dot-string address...check for valid characters
		if (!preg_match('/^[-a-zA-Z0-9!#$%*\/?|^{}`~&\'+=_\.]*$/', $local))
			return false;
	}

	// Make sure domain contains only valid characters and at least one period
	if (!preg_match("/^[-a-zA-Z0-9\.]*$/", $domain) || !strpos($domain, "."))
		return false;	

	return true;
}

/*Created by Barrett at RRPowered.com*/
//Call the function

function time_ago($cur_time){
	if($cur_time == "")return "No date provided";
	else
$time_ = time() - strtotime($cur_time);

$seconds =$time_;
$minutes = round($time_ / 60);
$hours = round($time_ / 3600);
$days = round($time_ / 86400);
$weeks = round($time_ / 604800);
$months = round($time_ / 2419200);
$years = round($time_ / 29030400);

//Seconds

if($seconds <= 60){

   $time="Today";//"$seconds seconds ago";   

//Minutes

}else if($minutes <= 60){

   //if($minutes == 1){
   $time="Today";//"one minute ago";
  // }else{
//   $time="$minutes minutes ago";
//   }

//Hours

}else if($hours <= 24){

 // if($hours == 1){
  $time="Today";//"one hour ago";
 /* }else{
  $time="$hours hours ago";
  }*/

//Days

}else if($days <= 7){

   if($days == 1){
   $time="Yesterday";
   }else{
   $time="$days days ago";
   }

//Weeks

}else if($weeks <= 4){

  if($weeks == 1){
  $time="A week ago";
  }else{
  $time="$weeks weeks ago";
  }

//Months

}else if($months <= 12){

  if($months == 1){
  $time="A month ago";
  }else{
  $time="$months months ago";
  }

//Years

}else{  

  if($years == 1){
  $time="A year ago";
  }else{
  $time="$years years ago";
  }  

}
return $time;
}
function Get_News(){
	if(connection()){
		$result = MysqlSelectQuery('select * from news order by news_id desc limit 0, 5');
		while($rows = SqlArrays($result)){
			echo '<li><a href="'.SITE_URL.'news/'.$rows['News_id'].'/">'.$rows['newsTitle'].'</a></li>';
		
		}
	}
}


function random($lenght){
	$characters = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$name = "";
	for($i = 0; $i< $lenght; $i++){
		$name.= $characters[mt_rand(0, strlen ($characters) - 1)];
	}
	return $name;
}
function SendHtmlEmails($to,$subject,$innerMsg){

$headers = "From: Tom Associates Training <info@tomassociatesng.com> \r\n";
$headers .= "Reply-To: info@tomassociatesng.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n".
'X-Mailer: PHP/' . phpversion();

$message = '<html>
<head>
</head>

<body>
<center>
<table width="600" background="#FFFFFF" style="text-align:left;" cellpadding="0" cellspacing="0">
<tr>
	<td height="18" width="31" style="border-bottom:1px solid #e4e4e4;">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
	<td height="18" width="131">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
	<td height="18" width="466" style="border-bottom:1px solid #e4e4e4;">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
</tr>
<tr>
	<td height="2" width="31" style="border-bottom:1px solid #e4e4e4;">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
	<td height="2" width="131">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
	<td height="2" width="466" style="border-bottom:1px solid #e4e4e4;">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
</tr>
<!--GREEN STRIPE-->
<tr>
	<td height="113" colspan="3" background="'.SITE_URL.'admin/images/email-head.png" style="border-top:1px solid #FFF; border-bottom:1px solid #FFF;">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div></td>
	
	<!--WHITE TEXT AREA-->
	<!--GREEN TEXT AREA-->
	</tr>

<!--DOUBLE BORDERS BOTTOM-->
<tr>
	<td height="3" width="31" style="border-top:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4;">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
	<td height="3" width="131">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
	<td height="3" style="border-top:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4;">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
</tr>
<tr>
	<td colspan="3">
	<!--CONTENT STARTS HERE-->
	<br />
	<br />
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td width="15"><div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
</td>
<td width="325" style="padding-right:10px; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;" valign="top">';
	$message .= $innerMsg;
	$message .='</td>
	
	<td style="border-left:1px solid #e4e4e4; padding-left:15px;" valign="top">
	
	<!--RIGHT COLUMN FIRST BOX-->
	<table width="100%" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #e4e4e4; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;">
	<tr>
	<td>
	<div style="font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold; padding-bottom:10px;">Add Us To Your Address Book</div>
	<img src="'.SITE_URL.'admin/images/addressbook.gif" align="right" style="padding-left:10px; padding-top:10px; padding-bottom:10px;" alt=""/>
	<p>To help ensure that you receive all email messages consistently in your inbox with images displayed, please add this address to your address book or contacts list: <strong>[info@tomassociatesng.com]</strong>.</p>
	<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #e4e4e4; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;">
	<tr>
	<td>
	<div style="font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold; padding-bottom:10px;">Have Any Questions?</div>
	<img src="'.SITE_URL.'admin/images/penpaper.gif" align="right" style="padding-left:10px; padding-top:10px; padding-bottom:10px;" alt=""/>
	<p>Don\'t hesitate to hit the reply button to any of the messages you receive.</p>
	<br />
	</td>
	</tr>
	</table>
	<br />
	<table cellpadding="0" width="100%" cellspacing="0" style="font-family:Trebuchet MS, Verdana, Arial; font-size:12px;">
	<tr>
	<td>
	<div style="font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold; padding-bottom:10px;">Have A Topic Idea?</div>
	<img src="'.SITE_URL.'admin/images/lightbulb.gif" align="right" style="padding-left:10px; padding-top:10px; padding-bottom:10px;" alt=""/>
	<p>I\'d love to hear it! Just reply any time and let me know what topics you\'d like to know more about.</p>

	<br />
	</td>
	</tr>
	</table>
	
	</td>
	</tr>
	</table>
	</td>
</tr>
</table>
<br />
<table cellpadding="0" style="border-top:1px solid #e4e4e4; text-align:center; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;" cellspacing="0" width="600">
<tr>
	<td height="2" style="border-bottom:1px solid #e4e4e4;">
	<div style="line-height: 0px; font-size: 1px; position: absolute;">&nbsp;</div>
	</td>
</tr>
	<td style="font-family:Trebuchet MS, Verdana, Arial; font-size:12px;" bgcolor="#CCCCCC">
	<br />
	{5/7, Alade Lawal Street, 
Opposite Anthony Police Station, 
Idi-Iroko, Anthony Village,
Lagos - Nigeria.}<br />
	<a href="'.SITE_URL.'unsubscribe?email=" style="color:#06F; font-size:10px;">Unsubscribe if you don\'t want to recieve emails again or this mail was sent to you by mistake</a>
	</td>
</tr>
</table>
</center>
</body>
</html>';
mail($to,$subject,$message,$headers);
}

// Credits: http://www.bitrepository.com/
function highlight($str, $keywords = '')
{
$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter

$style = 'highlight';
$style_i = 'highlight_important';

/* Apply Style */

$var = '';

foreach(explode(' ', $keywords) as $keyword)
{
$replacement = "<span class='".$style."'>".$keyword."</span>";
$var .= $replacement." ";

$str = str_ireplace($keyword, $replacement, $str);
}

/* Apply Important Style */

$str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);

return $str;
}


function statistics($table){
	$result = MysqlSelectQuery("select * from $table");
	$num = NUM_ROWS($result);
	return $num;
}
?>