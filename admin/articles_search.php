<?php
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}
$message = '';

$_SESSION['data_search'] = '';
if(isset($_GET['keyword'])){
	if($_GET['keyword'] != ""){
		$_SESSION['data_search'] = $_GET['keyword']; 
$recordperpage =  20;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
$result = MysqlselectQuery("select * from articles where article_title like'%".$_GET['keyword']."%' order by article_id desc limit $offset, $recordperpage");
	}
else {
	$message = errorMsg('Please enter word to search');
	}
}
if(isset($_GET['delete'])){
	MysqlQuery("delete from articles where articles_id='".$_GET['delete']."'");
	header("location: ".$_SERVER['REQUEST_URI']);
}
if(isset($_GET['activate'])){
	MysqlQuery("update articles set status=1 where article_id='".$_GET['activate']."'");
	header("location: ".$_SERVER['REQUEST_URI']);
}
if(isset($_POST['deleteLink']) && $_POST['deleteLink'] == 1){
	if(!isset($_POST['checkboxEvent'])){
		 $message = errorMsg("You did not select any article(s), Please select at least one article to delete!");
	 }
	 else{
	while(list($key,$val) = each($_POST['checkboxArtcle'])){
		MysqlQuery("delete from articles where articles_id ='".$_POST['checkboxArtcle'][$key]."'");	
			}
			header("location: ".$_SERVER['REQUEST_URI']);
	 }
}
if(isset($_POST['activateLink'])&& $_POST['activateLink'] == 1){
	if(!isset($_POST['checkboxEvent'])){
		 $message = errorMsg("You did not select any article(s), Please select at least one article to activate!");
	 }
	 else{
	while(list($key,$val) = each($_POST['checkboxArtcle'])){
		MysqlQuery("update articles set status=1 where article_id ='".$_POST['checkboxArtcle'][$key]."'");	
			}
			header("location: ".$_SERVER['REQUEST_URI']);
	 }
}
?>
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Articles | Modern Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />
<link type="text/css" href="js/wysiwyg/jquery.wysiwyg.css" rel="stylesheet" />
   <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	function showLoader(){
	
		$('.search-background').fadeIn(200);
	}
	
	function hideLoader(){
	
		$('.search-background').fadeOut(200);
	};
	
	$("#paging_button a").click(function(){
		
		showLoader();
		
		$("#paging_button a").css({'background-color' : '','color':'#03F'});
		$(this).css({'background-color' : '#006699','color':'#FFF'});

		$("#search").load("headers/data.php?page=" + this.id +"&keyword="+ $("#keyword").val(), hideLoader);
		
		return false;
	});
	
	$("#1").css({'background-color' : '#006699','color':'#FFF'});
	showLoader();
	$("#search").load("headers/data.php?page=1&keyword="+ $("#keyword").val(), hideLoader);
	
});
</script>
     <script type="text/javascript">
    function SendFrm(){
			//document.getElementById('sbmt').value = 1;
			document.getElementById('searchForm').submit();
		}
		</script>
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
	if(confirm("Are you sure you want to delete this article?")){
		window.location = "<?php echo $_SERVER['REQUEST_URI'];?>?delete="+val;
	}
}
function ActivateArticle(val){
	if(confirm("Activate this article?")){
		window.location = "<?php echo $_SERVER['REQUEST_URI'];?>?activate="+val;
	}
}

function Send(val){
	document.getElementById(val).value = 1;
	if(val == 'activate'){
		if(confirm('Activate selected Articles?')){
			document.getElementById('articlesForm').submit();
		}
	}
	else if(val == 'delete'){
			if(confirm('Are you sure you want to delete this article? ')){
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
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="dashboard.php" class="main"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        <li class="item middle" id="two"><a href="articles.php" class="main current"><span class="outer"><span class="inner content">Articles</span></span></a></li>
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
                       <li><a href="articles.php"><span>All Articles</span></a></li>
                      <li><a href="newarticle.php"><span>New Article</span></a></li>
                      <li><a href="articles_search" class="current"><span>Search Articles</span></a></li>          
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
   <!-- CONTENT TITLE -->
    <div class="grid_9">
    <h1 class="content_edit">Search article</h1>
    </div>
    <!-- CONTENT TITLE RIGHT BOX -->
    <div class="clear">
    </div>
<!--    TEXT CONTENT OR ANY OTHER CONTENT START     -->
    <div class="grid_15" id="textcontent">
  <?php echo $message;?>
       <form id="searchForm" action="" method="get">
    	<label>Enter Keyword</label>
        <input name="keyword" type="text" class="smallInput wide" id="keyword" />
        <!--WYSIWYG Editor is linked to the textarea with id: #wysiwyg-->
        <!-- BUTTONS -->
        <a class="button" href="javascript:void(0);" onclick="SendFrm()"><span>Search</span></a>
      </form><br /><br />
      <?php
	  if(isset($_GET['keyword']) && $_GET['keyword'] != ""){
		  ?>
          <h2>Found: <?php echo $num." result for ". $_GET['keyword'];?></h2>
      <div id="search_content" style="margin-top:10px">
      <div class="search-background">
			<label><img src="images/loader.gif" alt="" /></label>
		</div>
      <div class="portlet">
        
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
        <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
         <input name="activateLink" type="hidden" value="" id="activate" />
              <input name="deleteLink" type="hidden" value="" id="delete" />
              <input name="deactivateLink" type="hidden" value="" id="de-activate"/>
              <tr class="footer">
                <td colspan="4"><a href="javascript:void(0);" class="delete_inline" onclick="Send('delete')">Delete all</a><a href="javascript:Send('activate');" class="approve_inline">Activate all</a></td>
                <td colspan="5" align="right">
                  <!--  PAGINATION START  -->             
                  <?php Pages_admin_fancy("SELECT COUNT(article_id) AS numrows FROM articles where article_title like'%".$_GET['keyword']."%' ",$recordperpage,$pagenum,""); ?>  
                  <!--  PAGINATION END  -->                </td>
                </tr>
        </table>
      </div>
      </div>
      <?php
	  }
	  ?>
    <!--NOTIFICATION MESSAGES-->
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
