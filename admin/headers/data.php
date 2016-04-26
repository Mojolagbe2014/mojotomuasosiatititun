<?php
session_start();
require_once("../../scripts/config.php");
require_once("../../scripts/functions.php");
/*if(@$_SESSION['LOGGEDIN'] != true){
	header("location: ./");exit;
}*/
$message = '';

if(isset($_SESSION['data_search'])){
$recordperpage =  20;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
$result = MysqlselectQuery("select * from articles where article_title like'%".$_SESSION['data_search']."%' order by article_id desc limit $offset, $recordperpage");
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
        <form action="" method="post" id="articlesForm">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr id="chkrow">
                <th width="65" scope="col"><input name="checkall" type="checkbox" id="checkall" value="" /></th>
                <th width="267" scope="col"> Title</th>
                <th width="276" scope="col">Description</th>
                <th width="129" scope="col">Posted date</th>
                <th width="56" scope="col">Views</th>
                <th width="123" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             <?php
			if(NUM_ROWS($result) > 0){
				while($rows = SqlArrays($result)){
					if($rows['status'] == 0)
					$stat = '<a href="javascript:ActivateArticle('.$rows['article_id'].')" class="approve_icon" title="Activate"></a>';
					else
					$stat = 'Active';
			?>
              <tr>
                <td width="65"><label>
                    <input type="checkbox" name="checkboxArtcle[]" id="checkbox" value="<?php echo $rows['article_id'];?>" />
                </label></td>
                <td><?php echo stripslashes($rows['article_title']);?></td>
                <td><?php echo substr(stripslashes($rows['article_content']),0,200);?></td>
                <td><?php echo $rows['posted_date'];?></td>
                <td><?php echo $rows['views'];?></td>
                <td width="123"><?php echo $stat;?> <a href="edit_article.php?edit=true&id=<?php echo $rows['article_id'];?>" class="edit_icon" title="Edit"></a> <a href="javascript:DeleteArticle(<?php echo $rows['article_id'];?>)" class="delete_icon" title="Delete"></a></td>
              </tr> 
            
              <?php
              }
			  ?> 
             
              <?php
			}
              else{
				  ?>
              <tr>
                <td colspan="6"><?php echo warningMsg("No Articles(s) found");?></td>
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