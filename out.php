<?php

session_start();
if (isset($_SESSION['login'])) {
     session_destroy();
     header("Location:".basename($_SERVER['HTTP_REFERER']));
 }
 
 
 ?>
