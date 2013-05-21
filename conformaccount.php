<?php
$con = mysql_connect("localhost", "root" , "Rushabh");
if(!$con){
die('could not Connect: ' .mysql_error());
}
mysql_select_db("JCU" , $con);
 
$sql = "INSERT INTO tb_login (username , password , email) 
		VALUES
		('$_GET[username]' , '$_GET[password]' , '$_GET[email]')";
if(!mysql_query($sql , $con)){
	die('Error: ' .mysql_error());
}
else{
  echo "Success Account created";
}

$con = mysql_connect('localhost' , 'root' , 'Rushabh');
if(!$con){
die('could not Connect: ' .mysql_error());
}
?>
