<?php 
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}

$message = '';
$recordperpage =  30;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
$result = MysqlSelectQuery("select * from newsletter order by newsletter_id desc limit $offset, $recordperpage");
if(isset($_GET['delete'])){
	MysqlQuery("delete from newsletter where newsletter_id='".$_GET['delete']."'");
	header("location: ".$_SERVER['PHP_SELF']);
}
if(isset($_POST['deleteLink']) && $_POST['deleteLink'] == 1){
	if(!isset($_POST['checkboxnewsletter'])){
		 $message = errorMsg("You did not select any newsletter, Please select at least one newsletter to delete!");
	 }
	 else{
	while(list($key,$val) = each($_POST['checkboxnewsletter'])){
		MysqlQuery("delete from newsletter where newsletter_id ='".$_POST['checkboxnewsletter'][$key]."'");	
			}
			header("location: newsletters");
	 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Newsletters | Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
  <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
     <script id="source" language="javascript" type="text/javascript" >
$(document).ready(function()  
{  
$("#checkall").live('click',function(event){  
$('input:checkbox:not(#checkall)').attr('checked',this.checked);  
//To Highlight  
			if ($(this).attr("checked") == true)  {  
//$(this).parents('table:eq(0)').find('tr:not(#chkrow)').css("background-color","#FF3700");  
				$("#box-table-a").find('tr:not(#chkrow)').css("background-color","#E4E4E4"); }  
					else  {  
//$(this).parents('table:eq(0)').find('tr:not(#chkrow)').css("background-color","#fff");  
				$("#box-table-a").find('tr:not(#chkrow)').css("background-color","#FFF");  
					}  
	});  
			$('input:checkbox:not(#checkall)').live('click',function(event) {  
					if($("#checkall").attr('checked') == true && this.checked == false){  
						$("#checkall").attr('checked',false);  
					$(this).closest('tr').css("background-color","#ffffff"); }  
						if(this.checked == true)  {  
						$(this).closest('tr').css("background-color","#E4E4E4");  
					CheckSelectAll();  
					}  
			if(this.checked == false){  
					$(this).closest('tr').css("background-color","#ffffff");   }  
					});    
function CheckSelectAll(){  
		var flag = true;  
		$('input:checkbox:not(#checkall)').each(function() {  
		if(this.checked == false)  
		flag = false;  
	});  
	$("#checkall").attr('checked',flag);  
		}  
}); 
 
    function DeleteArticle(val){
	if(confirm("Are you sure you want to delete this newsletter?")){
		window.location = "<?php echo $_SERVER['PHP_SELF'];?>?delete="+val;
	}
}

function Send(val){
	document.getElementById(val).value = 1;
	if(val == 'activate'){
		if(confirm('Activate selected Newsltter?')){
			document.getElementById('articlesForm').submit();
		}
	}
	else if(val == 'delete'){
			if(confirm('Are you sure you want to delete selected Newsletters? ')){
			document.getElementById('articlesForm').submit();
			}
		}
	else if(val == 'de-activate'){
			if(confirm('Are you sure you want to de-activate selected articles?')){
			document.getElementById('articlesForm').submit();
			}
		}
}
			</script>

</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<?php include ("headers/header.php");?>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="dashboard.php" class="main"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        <li class="item middle" id="two"><a href="articles.php" class="main "><span class="outer"><span class="inner content">Articles</span></span></a></li>
        <li class="item middle" id="three"></li>
        <li class="item middle" id="four"><a href="subscribers" class="main"><span class="outer"><span class="inner users">Subscribers</span></span></a></li>
		<li class="item middle" id="five"><a href="media" class="main"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li>        
		<li class="item middle" id="six"><a href="events" class="main"><span class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>        
		<li class="item middle" id="seven"><a href="newsletters" class="main current"><span class="outer"><span class="inner newsletter">Newsletter</span></span></a></li>        
		<li class="item last" id="eight"><a href="accounts" class="main"><span class="outer"><span class="inner settings">Accounts</span></span></a></li>        
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                       <li><a href="newsletters.php" class="current"><span>News Letters</span></a></li>
                      <li><a href="newsletter_new.php" ><span>New Newsletter</span></a></li>
                       
           </ul>
        </div>
    </div>
<!-- TABS END -->    
</div>
<!-- HIDDEN SUBMENU START -->
<div class="grid_16" id="hidden_submenu">
	  <ul class="more_menu">
		<li><a href="#">More link 1</a></li>
		<li><a href="#">More link 2</a></li>  
	    <li><a href="#">More link 3</a></li>    
        <li><a href="#">More link 4</a></li>                               
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 5</a></li>
		<li><a href="#">More link 6</a></li>  
	    <li><a href="#">More link 7</a></li> 
        <li><a href="#">More link 8</a></li>                                  
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 9</a></li>
		<li><a href="#">More link 10</a></li>  
	    <li><a href="#">More link 11</a></li>  
        <li><a href="#">More link 12</a></li>                                 
      </ul>            
  </div>
<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 >Sent Newsletters</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a href="#" class="inline_calendar">Total articles (<?php echo NUM_ROWS($result);?>) </a>
   	  <div class="hidden_calendar"></div>
    </div>
    <!--RIGHT TEXT/CALENDAR END-->
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
    <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <!--  SECOND SORTABLE COLUMN END -->
      <!--THIS IS A WIDE PORTLET-->
        <?php echo $message;?>
    <div class="portlet">
        
		<div class="portlet-content nopadding">
        <form action="" method="post" id="articlesForm">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr id="chkrow">
                <th width="65" scope="col"><input name="checkall" type="checkbox" id="checkall" value="" /></th>
                <th width="267" scope="col"> Title</th>
                <th width="276" scope="col">Description</th>
                <th width="129" scope="col">Sent Date</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
             <?php
			if(NUM_ROWS($result) > 0){
				while($rows = SqlArrays($result)){
					
			?>
              <tr>
                <td width="65"><label>
                    <input type="checkbox" name="checkboxnewsletter[]" id="checkbox" value="<?php echo $rows['newsletter_id'];?>" />
                </label></td>
                <td><?php echo stripslashes($rows['newsletter_title']);?></td>
                <td><?php echo substr(stripslashes(strip_tags($rows['newsletter_content'])),0,200);?></td>
                <td><?php echo $rows['posted_date'];?></td>
                <td><a href="edit_newsletter.php?edit=true&id=<?php echo $rows['newsletter_id'];?>" class="edit_icon" title="Edit"></a> <a href="javascript:DeleteArticle(<?php echo $rows['newsletter_id'];?>)" class="delete_icon" title="Delete"></a></td>
                </tr> 
            
              <?php
              }
			  ?> 
              <input name="activateLink" type="hidden" value="" id="activate" />
              <input name="deleteLink" type="hidden" value="" id="delete" />
              <input name="deactivateLink" type="hidden" value="" id="de-activate"/>
              <tr class="footer">
                <td colspan="2"><a href="javascript:void(0);" class="delete_inline" onclick="Send('delete')">Delete all</a></td>
                
                <td colspan="4" align="right">
                  <!--  PAGINATION START  -->             
                  <?php Pages_admin("SELECT COUNT(newsletter_id) AS numrows FROM newsletter ",$recordperpage,$pagenum,"newsletter.php?get"); ?>  
                  <!--  PAGINATION END  -->                </td>
                </tr>
              <?php
			}
              else{
				  ?>
              <tr>
                <td colspan="5"><?php echo warningMsg("No Articles(s) found");?></td>
                </tr>
                <?php
			  }
			  ?>
             
            </tbody>
          </table>
        </form>
		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">Tom Associates Training</div>
<!-- FOOTER END -->
</body>
</html>
