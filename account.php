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
<?php startblock('content-hero') ?>

<?php endblock() ?>
<?php startblock('content') ?>
     <?php 
       if(isset($_SESSION['success'])){
        if(strcmp($_SESSION['success'], 'true') == 0){
        echo "<div class='alert alert-success'>";
        echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo"<h2>Step 1 Complete</h2>";
        echo "Check your registered email and past the link to complete the process";
        echo "</div>";  
        unset($_SESSION['success']);
        }
       }
      else{
	      echo"<div class='alert alert-block'>";
        echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo"<strong>Warning!</strong> All the fields are required!";
        echo"</div>";
        }
    
    ?>
    <form class="form-horizontal" action="accountvalidate.php" method="post">
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
        <label class="control-label" for="username">UserName</label>
       
        <div class="controls">
          <input type="text" id="username" placeholder="username" name="username">
           <?php foreach($err as $field) {
          if(strcasecmp(trim($field) , "username") == 0){
          echo  "<span class='help-inline'>Invalid username or username taken</span>";
         
            }
          }
           if(isset($_SESSION['username'])){ 
          
            if(strcasecmp($_SESSION['username'] , "fail") == 0 ){
                 echo  "<span class='help-inline'> Username taken</span>";
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
    		<label class="control-label" for="password">Password(min 6 letters)</label>
    		<div class="controls">
   			 <input type="password" id="password" placeholder="password" name="password" >
   			    <?php 
   			    if(!isset($_SESSION['password'])){
   			      foreach($err as $field) {
                if(strcasecmp(trim($field) , "password") == 0  ){
                  echo  "<span class='help-inline'>Please enter a password(min 6 letters)</span>";
         
                }
              }
            }
          if(isset($_SESSION['password'])){ 
          
            if(strcasecmp($_SESSION['password'] , "fail") == 0 ){
                 echo  "<span class='help-inline'> password min 6 letters</span>";
            }
           }
          ?>
    		</div>
    	</div>
    	<div class="control-group error">
    		<label class="control-label" for="again_password">Again Password(min 6 letters)</label>
    		<div class="controls">
   			 <input type="password" id="again_password" placeholder="again_password" name="again_password" >
   			    <?php foreach($err as $field) {
          if(strcasecmp(trim($field) , "again_password") == 0){
          echo  "<span class='help-inline'>Please enter a password again(min 6 letters)h</span>";
         
            }
          }
          if(isset($_SESSION['again_password'])){
          
            if(strcmp($_SESSION['again_password'] , 'false') == 0){
              echo  "<span class='help-inline'>Password does not match</span>";
            }
          }
           unset($_SESSION['email']);
          ?>
    		</div>
    	</div>

    	<div class="control-group">
    		<div class="controls">
    			<button type="Create Account" class="btn btn-primary">Send</button>
    		</div>
    	</div>
    	
    </form>
<?php endblock() ?>
