<?php
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] == 1){
	header("location: dashboard");exit;
}
$message ="";
if(isset($_POST['sbmt']) &&$_POST['sbmt'] == 1 ){

	$_SESSION['LOGGEDIN'] = "";
	$password = addslashes($_POST['password']);
	$username = addslashes($_POST['username']);
	$hashPassword = sha1($password);
	if($password == "" || $username == "") {$message = errorMsgLogin("Please enter username or password!");}
	else{
	$result = MysqlSelectQuery("select username,firstname, lastname, user_id, acct_type from login where username='$username' and password = '$hashPassword'");
	
	if(NUM_ROWS($result) > 0){
	$rows = SqlArrays($result);
	//if($rows['username'] != $username && $rows['password'] != $password)
	$_SESSION['LOGGEDIN'] = 1;
	$_SESSION['first_name'] = $rows['firstname'];
	$_SESSION['last_name'] = $rows['lastname'];
	$_SESSION['accountType'] = $rows['acct_type'];
	$_SESSION['ID'] = $rows['admin_id'];
	header("location: dashboard");exit;
	}
	else{
	$message = errorMsgLogin("Invalid Login!");
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Tom Associates Training</title>
<link href="css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
 <script type="text/javascript">
    function Send(){
			document.getElementById('sbmt').value = 1;
			document.getElementById('loginForm').submit();
		}
		</script>
</head>

<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
    <h1><img src="../images/logoHead.png" width="50" height="47" style="float:left; margin-bottom:10px; margin-right:5px" />Admin - Login</h1>
    	<div id="login">
         <?php echo $message;?>
    	  <form id="loginForm" name="form1" method="post" action="">
    	    <p>
    	      <label><strong>Username</strong>
<input type="text" name="username" class="inputText" id="username" />
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Password</strong>
  <input type="password" name="password" class="inputText" id="password" />
  	        </label>
    	    </p>
            <input name="sbmt" type="hidden" value="" id="sbmt" />
            <!--<button class="black_button" name="submit"><span>Authentification</span></button>-->
    		<a class="black_button" href="javascript: void(0)" onclick="Send()"><span>Authentification</span></a>
            <!-- <label>
             <input type="checkbox" name="checkbox" id="checkbox" />
              Remember me</label>-->            
    	  </form>
		  <br clear="all" />
    	</div>
        <!--<div id="forgot">
        <a href="#" class="forgotlink"><span>Forgot your username or password?</span></a></div>-->
  </div>
</div>
<br clear="all" />
</body>
</html>
