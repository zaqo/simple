 <?php?>
<html>
<head>
  <title>LOGIN PAGE</title>
  <meta  http-equiv="Content-Type" content="text/html; charset=utf8">
  <link rel="stylesheet" type="text/css" href="./css/simple.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="./js/validate.js"></script>
</head>
<body>
  <!-- [HEADER] -->
  <header id="header"></header>
  <?php

if(isset($_GET['command'])) 		$error 	= "Invalid USER ID or Password";
else $error='';
?>
  <!-- [BODY] -->
  <div id="body">
    <h3>Please LOGIN to use this site</h3>
    <form method=post action=gatekeeper.php>
    
    <label for="email">Email: </label>
    <input type="email" id="email" name="email" placeholder="jhon@brown.com" required><br>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" placeholder="Password" required><br>
    <div class="invalidElem">
									<?php echo $error; ?>
	</div>
    <input type="submit" value="Enter"/>
    </form>
  </div>
	<div class="regElem">
		<a href="new_user.html">Registration</a>
	</div>
  <!-- [FOOTER] -->
  <footer id="footer">
    
    2019 &copy; Copyright by S.Pavlov 
  </footer>
</body>
</html>
<?php?>