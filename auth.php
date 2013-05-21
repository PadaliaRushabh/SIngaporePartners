<?php
	$con = mysql_connect("localhost" , "root" , "Rushabh");
	if(!$con){
		die("Could not connect" . mysql_error());
	}

	$user  = mysql_real_escape_string($_POST["username"]);
	$pwd = mysql_real_escape_string($_POST["password"]);
	mysql_select_db("JCU" , $con);

	$sql = "select count(1),email from tb_login where username = '$user' and password = '$pwd'";
	$result = mysql_query($sql,$con);	
	$row = mysql_fetch_array($result);
	$email = $row[1];
  //echo $row[0];
	session_start();
	//$url = $_SERVER['REQUEST_URI'];
	if($row[0] == 1){
	
		$_SESSION['login'] = $user;
		$_SESSION['email'] = $email;
		header("Location:".basename($_SERVER['HTTP_REFERER']));
	}
	else {
	
		$_SESSION['login'] = "fail";
		header("Location:".basename($_SERVER['HTTP_REFERER']));
	}
mysql_close($con);
?>
