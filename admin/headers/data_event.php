<?php
session_start();
require_once("../../scripts/config.php");
require_once("../../scripts/functions.php");
/*if(@$_SESSION['LOGGEDIN'] != true){
	header("location: ./");exit;
}*/
$message = '';
if(isset($_GET['keyword'])){
$recordperpage =  10;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
$result = MysqlselectQuery("select * from events where event_title like'%".$_SESSION['data_event']."%' order by event_id desc limit $offset, $recordperpage");
}
?>
<?php
/*include("dbcon.php");
	
$per_page = 5;
$sqlc = "show columns from events";
$rsdc = mysql_query($sqlc);
$cols = mysql_num_rows($rsdc);
$page = $_REQUEST['page'];

$start = ($page-1)*5;
$sql = "select * from events order by event_id limit $start,5";
$rsd = mysql_query($sql) or die( mysql_error());*/
?>

<div class="portlet-content nopadding" id="search">
        <form action="" method="post" id="eventsForm">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" >
            <thead>
              <tr id="chkrow">
                <th width="56" scope="col"><input name="checkall" type="checkbox" id="checkall" value="" /></th>
                <th width="240" scope="col">Event Title</th>
                <th width="110" scope="col">Start Date</th>
                <th width="131" scope="col">End Date</th>
                <th width="101" scope="col">Posted date</th>
                <th width="88" scope="col">Registration</th>
                <th width="61" scope="col">Views</th>
                <th width="129" align="center" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php
			if(NUM_ROWS($result) > 0){
				while($rows = SqlArrays($result)){
					if($rows['status'] == 0)
					$stat = '<a href="javascript:ActivateEvent('.$rows['event_id'].')" class="approve_icon" title="Activate"></a>';
					else
					$stat = 'Active';
			$reg_result = MysqlSelectQuery("select * from registration where event_id='".$rows['event_id']."'");
			$reg_no = NUM_ROWS($reg_result);
				
			?>
              <tr>
                <td width="56"><label>
                  <input type="checkbox" name="checkboxEvent[]" id="checkbox" value="<?php echo $rows['event_id'];?>" />
                </label></td>
                <td><a href="../training-detail?detail=<?php echo $rows['event_id'];?>" target="_blank"><?php echo $rows['event_title'];?></a></td>
                <td><?php echo $rows['start_date'];?></td>
                <td><?php echo $rows['end_date'];?></td>
                <td><?php echo $rows['posted_date'];?></td>
                <td align="center"><a href="registrations?reg=<?php echo $rows['event_id'];?>" title="view candidates" style="text-decoration:underline"><?php echo $reg_no;?></a></td>
                <td align="center"><?php echo $rows['views'];?></td>
                <td width="129" align="left"><?php echo $stat;?> <a href="edit_events.php?edit=true&id=<?php echo $rows['event_id'];?>" class="edit_icon" title="Edit"></a> <a href="javascript:DeleteEvent(<?php echo $rows['event_id'];?>)" class="delete_icon" title="Delete"></a></td>
              </tr> 
              
              <?php
              }
			  
			}
              else{
			  ?>
              <tr>
                <td colspan="8" align="center"><?php echo warningMsg("No Event(s) found");?></td>
                </tr>
                <?php
			  }
			  ?>
             
              </tbody>
           
          </table>
        </form>
		</div>

<script type="text/javascript">
$(document).ready(function(){
	
	var Timer  = '';
	var selecter = 0;
	var Main =0;
	
	bring(selecter);
	
});

function bring ( selecter )
{	
	$('div.shopp:eq(' + selecter + ')').stop().animate({
		opacity  : '1.0',
		height: '60px'
		
	},300,function(){
		
		if(selecter < 6)
		{
			clearTimeout(Timer); 
		}
	});
	
	selecter++;
	var Func = function(){ bring(selecter); };
	Timer = setTimeout(Func, 20);
}

</script>