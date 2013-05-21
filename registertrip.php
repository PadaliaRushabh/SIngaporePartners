<?php


  require_once "Mail.php";
  
  session_start();
  $login_flag = false;
   if(isset($_SESSION['login']))
              {
                if(strcmp($_SESSION['login'] , "fail") == 0){
                  $login_flag = false;
                
                }
                
                else{
                  
                  $login_flag = true; 
                }
              }
   if($login_flag == true){
    
      $required = array('depature', 'return');

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
   header("location: book.php");
  }
  
  else if($error == false){
	$country  = mysql_real_escape_string($_POST["country"]);
	$depature = mysql_real_escape_string($_POST["depature"]);
	$return  = mysql_real_escape_string($_POST["return"]);
	$adult_travelers= mysql_real_escape_string($_POST["adult_travelers"]);
	$child_travelers= mysql_real_escape_string($_POST["child_travelers"]);
	$infants_travelers= mysql_real_escape_string($_POST["infants_travelers"]);
	$email = $_SESSION['login'] ."<" . $_SESSION['email'].">";
	$message = "This letter is send as a conformation of trip, you will receive more details to select flight and hotel in next message\nFrom:{$country}\nDepature:{$depature}\nReturn:{$return}\nAdult:{$adult_travelers}\nChild:{$child_travelers}\nInfants:{$infants_travelers}";


 
  $from ="Rushabh Padalia <padalia.rushabh@gmail.com>";
  $to =$email;
  $subject = "Singapore Partner Trip Booking";
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
   //echo("<p>" . $mail->getMessage() . "</p>");
   $_SESSION['success'] = "true";
    header("location: book.php");
  } else {
   
    $_SESSION[''];
    //echo("<p>Message successfully sent!</p>");
    $_SESSION['success'] = "true";
    header("location: book.php");
    //echo("<a href='contact.php' > Go Back </a>"); 
}
}
}
else{
header("location: book.php");

}
?>
