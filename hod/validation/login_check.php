<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  }
if(isset($_SESSION['loggedin']) == false AND !isset($_SESSION['email_add'])){
  header("Location: ../login.php");
  exit;
}
 ?>
