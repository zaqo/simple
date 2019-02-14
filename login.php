<?php
require "config.php";
require "main.php";
$pdoUsers = new Users();
$user = $pdoUsers->get($_POST['email']);
if ($user['user_password']==md5($_POST['password'])) {
  echo '<script>window.location.replace("success.php");</script>';
} else {
  // NOT GOOD. 
  echo "Bad password";
  echo " <script>window.history.back(-1);</script>";
}
?>