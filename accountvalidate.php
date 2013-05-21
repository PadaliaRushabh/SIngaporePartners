<?php


  require_once "Mail.php";
  
  session_start();
  $required = array('name', 'username', 'email', 'password','again_password');

// Loop over field names, make sure each one exists and is not empty

$error = false;
$get_fail=" ";
foreach($required as $field) {
  if (empty($_POST[$field])) {
		$error = true;
		$get_fail = $get_fail.$field . ",";
		
  }
  else{
  $_SESSION[$field] = $_POST[$field];
  
  }
}
   
  
  if($error == true){
   $_SESSION['fail'] = $get_fail;
   $_SESSION['success'] = "false";
   header("location: account.php");
  }
  
    if(strlen(trim($_SESSION['password'] ))<5){
    
        $error = true;
        $_SESSION['password'] = "fail";
        header("location: account.php");
    
     
    }
    if(strcmp( trim($_SESSION['password']),trim($_SESSION['again_password']))!= 0) {
    
     $error = true;
     $_SESSION['again_password'] = "false";
     header("location: account.php");
    }
    
  if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
   	$_SESSION['email_fail'] = 'email';
   	$error = true;
   	header("location: account.php");
  }
    
	$con = mysql_connect("localhost", "root" , "Rushabh");
  if(!$con){
  die('could not Connect: ' .mysql_error());
  }
  mysql_select_db("JCU" , $con);
  $username = mysql_real_escape_string($_POST["username"]);
  $result = mysql_query("select count(1) from tb_login where username='$username'");
  $row = mysql_fetch_array($result);
  
  if($row[0] ==1){
  $error = true;
  $_SESSION['username'] = "fail";
  	header("location: account.php");
  }

  else if($error == false){
	$name  = mysql_real_escape_string($_POST["name"]);
	$username = mysql_real_escape_string($_POST["username"]);
	$email  = mysql_real_escape_string($_POST["email"]);
	$password= mysql_real_escape_string($_POST["password"]);
	$again_password= mysql_real_escape_string($_POST["again_password"]);
	


  //echo $name . $title .	$password .  $again_password.$email;

  $to_email = $name ."<" . $_SESSION['email'].">";
  $from = "Rushabh Padalia <padalia.rushabh@gmail.com>";
  $to = $to_email;
  $subject = "Conform your singapore partner account";
  $message = "Past the below link to conform your account\n\n\n http:\\localhost\jcu\Assignment2\conformaccount.php?name={$name}&username={$username}&email={$email}&password={$password}";
  $body = $message;
 
  $host = "ssl://smtp.gmail.com";
  $port = "465";
  $username = "padalia.rushabh@gmail.com";
  $password = "creative@321.com";
 
  $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
  $smtp = Mail::factory('smtp',
   array ('host' => $host,
      'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
  $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION[ 'username']);
    unset($_SESSION['password']);
    unset($_SESSION['again_password']);
    $_SESSION[''];
    //echo("<p>Message successfully sent!</p>");
    $_SESSION['success'] = "true";
    header("location: account.php");
    //echo("<a href='account.php' > Go Back </a>"); 
}
}
?>
