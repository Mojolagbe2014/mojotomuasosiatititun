<?php
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}

$result = MysqlSelectQuery("select * from login order by user_id ");

if(isset($_GET['delete'])){
	MysqlQuery("delete from login where user_id='".$_GET['delete']."'");
	header("location: ".$_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Accounts | Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript">

$(document).ready(function()
{
$(".users").dblclick(function()
{
var ID=$(this).attr('id');
$("#first_"+ID).hide();
$("#last_"+ID).hide();
$("#user_"+ID).hide();
$("#first_input_"+ID).show();
$("#last_input_"+ID).show();
$("#user_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();
var last=$("#last_input_"+ID).val();
var user=$("#user_input_"+ID).val();
var dataString = 'id='+ ID +'&firstname='+first+'&lastname='+last+'&username='+user;
$("#first_"+ID).html('<img src="images/preloader.gif" width="20" height="20" />'); // Loading image

if(first.length>0&& last.length>0 && user.length>0)
{

$.ajax({
type: "POST",
url: "headers/edit_user.php",
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(first);
$("#last_"+ID).html(last);
$("#user_"+ID).html(user);
}
});
}
else
{
alert('Enter something.');
}

});

// Edit input box click action
$(".editbox").mouseup(function() 
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
 function DeleteUser(val){
	if(confirm("Are you sure you want to delete this user?")){
		window.location = "<?php echo $_SERVER['PHP_SELF'];?>?delete="+val;
	}
}
</script>
<style>

.editbox 
{
display:none
}
</style>
</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<?php include ("headers/header.php");?>
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="dashboard.php" class="main"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        <li class="item middle" id="two"><a href="articles.php" class="main"><span class="outer"><span class="inner content">Articles</span></span></a></li>
        <li class="item middle" id="three"></li>
        <li class="item middle" id="four"><a href="subscribers" class="main"><span class="outer"><span class="inner users">Subscribers</span></span></a></li>
		<li class="item middle" id="five"><a href="media" class="main"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li>        
		<li class="item middle" id="six"><a href="events" class="main"><span class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>        
		<li class="item middle" id="seven"><a href="newsletters" class="main"><span class="outer"><span class="inner newsletter">Newsletter</span></span></a></li>        
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
                        <li><a href="accounts" class="current" ><span>Users</span></a></li>
                      <li><a href="new_user" ><span>New User<em></em></span></a></li>
                             
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
    
     <h1 class="content_edit">User Accounts</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a href="#" class="inline_tip">Double click on each quote to enter quick edit mode</a>
   	  <div class="hidden_calendar"></div>
    </div>
    <!--RIGHT TEXT/CALENDAR END-->
    
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
	<?php //echo $message;?>
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
    <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <!--  SECOND SORTABLE COLUMN END -->
      <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
        
		<div class="portlet-content nopadding">
        <form action="" method="post" >
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr id="chkrow">
                <th width="201" scope="col"> Firstname</th>
                <th width="281" scope="col">Lastname</th>
                <th width="235" scope="col">Username</th>
                <th colspan="2" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             <?php
			if(NUM_ROWS($result) > 0){
				while($rows = SqlArrays($result)){
					$id = $rows['user_id'];
			?>
              <tr id="<?php echo $id; ?>" class="users">
                <td><span id="first_<?php echo $id; ?>" class="text"><?php echo stripslashes($rows['firstname']); ?></span>
                  <input type="text" class="editbox" id="first_input_<?php echo $id; ?>" value="<?php echo $rows['firstname']; ?>" />
                                </td>
                <td><span id="last_<?php echo $id; ?>" class="text"><?php echo stripslashes($rows['lastname']); ?></span>
				
                 <input type="text" class="editbox" id="last_input_<?php echo $id; ?>" value="<?php echo $rows['lastname']; ?>" />
                </td>
                <td><span id="user_<?php echo $id; ?>" class="text"><?php echo stripslashes($rows['username']); ?></span>
                  <input type="text" class="editbox" id="user_input_<?php echo $id; ?>" value="<?php echo $rows['username']; ?>" />
                </td>
                <td width="113"><a href="change_pass?id=<?php echo $id; ?>">Change Password</a></td>
                <td width="86"><?php
                if($rows['acct_type'] != 1){
					?>
                <a href="javascript:DeleteUser(<?php echo $rows['user_id'];?>)" class="delete_icon" title="Delete"></a>
                <?php } ?>
                </td>
              </tr>
              <?php
              }
			}
              else{
				  ?>
              <tr>
                <td colspan="5"><?php //echo warningMsg("No Quote(s) found");?></td>
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

		<!-- This contains the hidden content for inline calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			
			</div>
		</div>
        <!--Second hidden element called from the tip message right of the title-->
        <div class='hidden'>
			<div id='inline_example2' title="This is a modal" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from the second hidden element on this page.</strong></p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">Tom Associates Training</div>
<!-- FOOTER END -->
</body>
</html>
