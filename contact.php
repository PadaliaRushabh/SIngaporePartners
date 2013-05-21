<!DOCTYPE html>

<?php include 'base.php' ?> 
<?php
session_start();
if(isset($_SESSION['success'])){
  if(strcmp($_SESSION['success'], 'false') == 0){
    unset($_SESSION['success']);
    $err = explode("," , $_SESSION['fail']);
  } 
  }

?>
<?php startblock('title') ?>
<title> Contact us </title>
<?php endblock() ?>
<?php startblock('content-hero') ?>

<?php endblock() ?>
<?php startblock('content') ?>
    <div class="page-header">
    <h1>Contact Us </h1>
    </div>
    <address>
    <strong>Singapore Partner.</strong><br>
    795 Folsom Ave, Suite 600<br>
    Singapore, CA 94107<br>
    <abbr title="Phone">Phone:</abbr> (123) 456-7890
    </address>
     
    <address>
    <a href="mailto:singapore.partner@gmail.com">singapore.partner@gmail.com</a>
    </address>
<hr>
    <div class="page-header">
    <h1> Send us your feedback!</h1>
    </div>
     <?php 
       if(isset($_SESSION['success'])){
        if(strcmp($_SESSION['success'], 'true') == 0){
        echo "<div class='alert alert-success'>";
        echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo "Message successfully sent!";
        echo "</div>";  
        unset($_SESSION['success']);
        }
       }
      else{
	      echo"<div class='alert alert-block'>";
        echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo"<strong>Warning!</strong> All fields are required!";
        echo"</div>";
        }
    
    ?>
    <form class="form-horizontal" action="feedback.php" method="post">
       <div class="control-group error">
        <label class="control-label" for="name">Name</label>
       
        <div class="controls">
          <input type="text" id="name" placeholder="Name" name="name" value="<?php if(isset($_SESSION['name'])){ echo htmlentities($_SESSION['name']); unset($_SESSION['name']);} ?>" >
           <?php foreach($err as $field) {
          if(strcasecmp(trim($field) , "name") == 0){
          echo  "<span class='help-inline'>Please enter you name</span>";
         
            }
          }
          ?>
        </div>
       
      </div>
       <div class="control-group error">
        <label class="control-label" for="email">Email</label>
       
        <div class="controls">
          <input type="text" id="email" placeholder="Email" name="email" value="<?php if(isset($_SESSION['email'])){ echo htmlentities($_SESSION['email']);} ?>" >
           <?php foreach($err as $field) {
          if(strcasecmp(trim($field) , "email") == 0){
          echo  "<span class='help-inline'>Please enter your email</span>";
         
            }
          }
          if(isset($_SESSION['email'])){
          
            if(strcmp($_SESSION['email_fail'] , 'email') == 0){
              echo  "<span class='help-inline'>Please enter a valid Email</span>";
            }
          }
           unset($_SESSION['email']);
          ?>
        </div>
       
      </div>
    	<div class="control-group error">
    		<label class="control-label" for="title">Title</label>
    		<div class="controls">
   			 <input type="text" id="title" placeholder="Title" name="title" value="<?php if(isset($_SESSION['title'])){ echo htmlentities($_SESSION['title']); unset($_SESSION['title']);} ?>">
   			    <?php foreach($err as $field) {
          if(strcasecmp(trim($field) , "title") == 0){
          echo  "<span class='help-inline'>Please enter a title</span>";
         
            }
          }
          ?>
    		</div>
    	</div>
    	<div class="control-group">
			<label class="control-label">Message Type:</label>
			<div class="controls">
    	  <label class="radio inline">
				  <input type="radio" name="msg_type" id="inlineradio1" value="Comment:" checked> Comment
				</label>
				<label class="radio inline">
				  <input type="radio" name="msg_type" id="inlineradio2" value="Complaint:"> Complaint
				</label>
				<label class="radio inline">
				 	<input type="radio" name="msg_type" id="inlineradio3" value="Request:"> Request
				</label>
			</div>	 
		</div>
    	<div class="control-group error">
			<label class="control-label">Message:</label>
    		<div class="controls">
    			<textarea rows="10" name="message" id="message"> <?php if(isset($_SESSION['message'])){ echo htmlentities($_SESSION['message']); unset($_SESSION['message']);} ?> </textarea>
    			   <?php foreach($err as $field) {
          if(strcasecmp(trim($field) , "message") == 0){
          echo  "<span class='help-inline'>Please enter a message</span>";
         
            }
          }
          ?>
    		</div>
    	</div>
    	<div class="control-group">
    		<div class="controls">
    			<button type="submit" class="btn btn-primary">Send</button>
    		</div>
    	</div>
    	
    </form>
<?php endblock() ?>
