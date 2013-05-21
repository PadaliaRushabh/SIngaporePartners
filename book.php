<!DOCTYPE html>

<?php include 'base.php' ?> 
    <?php startblock('title') ?>
<title> Reservation </title>
<?php endblock() ?>
<?php startblock('content-hero') ?>

<?php endblock() ?>
<?php startblock('content') ?>

    <div class="page-header">
    <h1> Book A Trip</h1>
    </div>
     <?php
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
              if($login_flag == false){
                 echo"<div class='alert alert-error'>";
                 echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                 echo " <h4>Error!</h4>";
                 echo"You Need to login to register a trip";
                 echo"</div>";
              }
              if (isset( $_SESSION['success'])){
                if ( $_SESSION['success'] == "true"){
                 echo"<div class='alert alert-success'>";
                 echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                 echo " <h4>Success!</h4>";
                 echo"You Should receive an email to your registerted email account";
                 echo"</div>";
                 unset( $_SESSION['success']);
                }
                else{
                
                 echo"<div class='alert alert-error'>";
                 echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                 echo " <h4>Error!</h4>";
                 echo"You need to enter all the details";
                 echo"</div>";
            
                
                }
              
              }
            ?>
    <form class="form-horizontal" action="registertrip.php" method="post">
       <div class="control-group success">
        <label class="control-label" for="name">From</label>
       
        <div class="controls">
         <?php
         
         mysql_connect('localhost', 'root', 'Rushabh');
         mysql_select_db('JCU');

        $sql = "SELECT id,name FROM country";
        $result = mysql_query($sql);

        echo "<select name='country'>";
        while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        }
         echo "</select>";
         
         ?>
        </div>
       
      </div>
       <div class="control-group success">
        <label class="control-label" for="depature">Depature Date</label>
       
        <div class="controls">
          <input type="date" id="depature" name="depature">
          
        </div>
           <label class="control-label" for="return">Return Date</label>
       
        <div class="controls">
          <input type="date" id="return" name="return">
          
        </div>
       
      </div>
    	<div class="control-group success">
    		<label class="control-label" for="adult_travelers">Adult Passengers</label>
    		<div class="controls">
   			 <select name="adult_travelers">
   			  <option value="1"> 1 </option>
   			  <option value="2"> 2 </option>
   			  <option value="3"> 3 </option>
   			  <option value="4"> 4 </option>
   			  <option value="5"> 5 </option>
   			  <option value="6"> 6 </option>
   			  </select>
    		</div>
    		<label class="control-label" for="child_travelers">Child Passengers</label>
    		<div class="controls">
   			 <select name="child_travelers">
   			  <option value="0"> 0 </option>
   			  <option value="1"> 1 </option>
   			  <option value="2"> 2 </option>
   			  <option value="3"> 3 </option>
   			  <option value="4"> 4 </option>
   			  <option value="5"> 5 </option>
   			  </select>
    		</div>
    		<label class="control-label" for="infants_travelers">Infants Passengers</label>
    		<div class="controls">
   			 <select name="infants_travelers">
   			  <option value="0"> 0 </option>
   			  <option value="1"> 1 </option>
   			  <option value="2"> 2 </option>
   			  <option value="3"> 3 </option>
   			  <option value="4"> 4 </option>
   			  <option value="5"> 5 </option>
   			  </select>
    		</div>
    	</div>
    	
    	<div class="control-group">
    		<div class="controls">
    			<button type="submit" class="btn btn-primary btn-large">Submit</button>
    		</div>
    	</div>
    	
    </form>
<?php endblock() ?>
