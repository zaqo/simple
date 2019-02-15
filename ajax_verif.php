<?php
// Server -side validation procedure
// INIT
require "config.php";
require "main.php";
$pdoUsers = new Users();
$regPass = true;
$checks = "";

// PROCESS REGISTRATION CHECKS

// NAME
if ($_POST['name']=="") {
  $regPass = false;
  $checks .= "Please enter your name!";
}

// EMAIL: FILTER
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  $regPass = false;
  $checks .= "Please enter a valid email address!";
}
//EMAIL : MX
if(!checkdnsrr(array_pop(explode("@",$_POST["email"])),"MX")){
       
        $regPass =false;
		$checks .= "Wrong email address! Please correct it and try again.";
}

// CHECK IF EMAIL IS ALREADY REGISTERED
else {
  if ($pdoUsers->checkReg($_POST['email'])) {
    $regPass = false;
    $checks .= $_POST['email']." is already registered\n";
  }
}


// PASSWORD

if ($_POST['password']=="") {
  $regPass = false;
  $checks .= "Please enter a password!";
}

if ($_POST['cpassword']=="") {
  $regPass = false;
  $checks .= "Please confirm your password!";
}

// CHECK IF PASSWORDS MATCH
if ($_POST['password']!=$_POST['cpassword']) {
  $regPass = false;
  $checks .= "Passwords do not match!";
}

// IF CHECKS ARE ALL GREEN - GO FOR ACTUAL DATABASE REGISTRATION

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