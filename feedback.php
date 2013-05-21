<?php


  require_once "Mail.php";
  
  session_start();
  $required = array('name', 'title', 'msg_type', 'message', 'email');

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
   header("location: contact.php");
  }
  
  if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
   	$_SESSION['email_fail'] = 'email';
   	$error = true;
   	header("location: contact.php");
  }


  else if($error == false){
	$name  = mysql_real_escape_string($_POST["name"]);
	$title = mysql_real_escape_string($_POST["title"]);
	$msg_type  = mysql_real_escape_string($_POST["msg_type"]);
	$message= mysql_real_escape_string($_POST["message"]);
	$email= mysql_real_escape_string($_POST["email"]);
	


 
  $from = "Rushabh Padalia <padalia.rushabh@gmail.com>";
  $to = "Rushabh Padalia <padalia.rushabh@gmail.com>";
  $subject = $email." Name:" . $name. " " .$msg_type.$title;
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
    unset($_SESSION['title']);
    unset($_SESSION[ 'msg_type']);
    unset($_SESSION['message']);
    unset($_SESSION['email']);
    $_SESSION[''];
    //echo("<p>Message successfully sent!</p>");
    $_SESSION['success'] = "true";
    header("location: contact.php");
    //echo("<a href='contact.php' > Go Back </a>"); 
}
}
?>
