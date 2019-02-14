<?php
// Server -side validation procedure
// INIT
require "config.php";
require "main.php";
$pdoUsers = new Users();
$regPass = true;
$checks = "";

// PROCESS REGISTRATION CHECKS


// CHECK IF EMAIL IS ALREADY REGISTERED

  if ($pdoUsers->checkReg($_POST['email'])) {
    $regPass = false;
    $checks .= $_POST['email']." is already registered\n";
  }

// CHECK IF PASSWORDS MATCH
elseif ($_POST['password']!=$_POST['cpassword']) {
  $regPass = false;
  $checks .= "Passwords do not match!";
}

// IF CHECKS ARE ALL GREEN - GO FOR ACTUAL DATABASE REGISTRATION
$checks .=$_POST['name'].$_POST['email'].$_POST['password'];
if ($regPass) {
  if (!$pdoUsers->register([$_POST['name'], $_POST['email'], $_POST['password']])) {
    $regPass = false;
    $checks .= "Database Error: record was not inserted! ";
  }
}

// THE RESULTS
echo json_encode([
  "status" => $regPass,
  "message" => $checks
]);
?>