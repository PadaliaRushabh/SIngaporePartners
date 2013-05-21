<!DOCTYPE html>

<!-- saved from url=(0054)http://twitter.github.com/bootstrap/examples/hero.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php require_once 'ti.php' ?>
    <meta charset="utf-8">
    <?php emptyblock('title') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
   

  </head>

  <body>
<?php startblock('nav') ?>
   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="home.php">SingaporePartner</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="Transport.php">Transportation</a></li>
                  <li><a href="book.php">Reservation</a></li>
                  <li><a href="Accomodation.php">Accomodation</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Other</li>
                  <li><a href="Special.php">Special services</a></li>
                  <li><a href="photos.php">Photo Gallery</a></li>
                  
                </ul>
              </li>
              
              <li><a href="book.php">Reservation</a></li>
              <li><a href="faq.php">FAQ</a></li>
              
            </ul>
            <?php
              session_start();
              $login_flag = false;  
              if(isset($_SESSION['login']))
              {
                if(strcmp($_SESSION['login'] , "fail") == 0){
                  $login_flag = false;
                
                }
                
                else{
                  echo "<form class='navbar-form pull-right' action='out.php' method='post'>";
                  echo " <label span='2'> loged in as {$_SESSION['login']}</label>";
                  echo "<button type='submit' class='btn'>Log Out</button>";
                  echo"</form>";
                  
                  $login_flag = true; 
                }
              }
              if($login_flag == false){
                echo "<form class='navbar-form pull-right ' action='auth.php' method='post'>";
                echo "<input class='span2' type='text' placeholder='Email' name='username'>";
                echo "<input class='span2' type='password' placeholder='Password' name='password'>";
                echo "<button type='submit' class='btn'>Sign in</button>";
                echo "<ul class='nav'><li><a href='account.php'>Create Account</a></li></ul>";
                echo"</form>";
              }
            ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<?php endblock() ?>
    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
<?php emptyblock('content-hero') ?>
<?php emptyblock('content') ?>
<?php emptyblock('span') ?>
      <hr>
<?php startblock('footer') ?> 
      <footer>


     
    <address>
    <strong>Singapore Partner</strong><br>
    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
    <a href="mailto:singapore.partner@gmail.com">singapore.partner@gmail.com</a>
    </address>


      
        <p>@ Team Evolution JCU University</p>
      </footer>
<?php endblock() ?>
    </div> <!-- /container -->
<?php startblock('js') ?> 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Bootstrap, from Twitter_files/jquery.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-transition.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-alert.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-modal.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-dropdown.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-scrollspy.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-tab.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-tooltip.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-popover.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-button.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-collapse.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-carousel.js"></script>
    <script src="./Bootstrap, from Twitter_files/bootstrap-typeahead.js"></script>
    
    
<?php endblock() ?>
  

</body></html>
