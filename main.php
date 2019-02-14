<?php
class Users{
  private $pdo = null;

  function __construct(){
  // Auto-connect to database on creating object

    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, DB_USER, DB_PASSWORD,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false]
    );
	
  }

  function __destruct() {
    $this->pdo = null;
  }

  function get($email=""){
  // get() : get user by email

    $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `email`=?");
    $stmt->execute(array($email));
    return $stmt->fetch();
  }

  function getID($id=""){
  // getID() : get user by ID

    $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `id`=?");
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function checkReg($email){
  // check() : check if given email is already registered
  // RETURNS TRUE IF EMPTY, FALSE IF SUCH RECORD ALREADY EXISTS

    return !empty($this->get($email));
  }

  function register($data){
  // register() : register a new user
  // DO YOUR FORM CHECKS SOMEWHERE ELSE FIRST!
  // $data must in the array format of name, email, password

    // THIS IS RAW BASIC PROTECTION FOR THE PASSWORD

    $data['2'] = md5($data['2']);

    // USING THE DATA FIELD AS A RANDOM CONFIRMATION KEY
    //$data['3'] = md5(date("YmdHis"));

    // INSERT INTO DATABASE
    $stmt = $this->pdo->prepare("INSERT INTO `users` (`user_name`, `email`, `user_password`) VALUES (?, ?, ?)");
	try {
		$pass = $stmt->execute($data);
	} catch (PDOException $e) {
    if ($e->getCode())
        echo "Syntax Error: ".$e->getMessage();
	} 
    

    // SEND COINFIRMATION EMAIL IF PASS
    if ($pass) {
      // CHANGE YOUR URL & MESSAGE HERE
      $msg = "Enter the confirmation URL in your web browser to complete the registration - http://yoursite.com/confirm.php?id=".$this->pdo->lastInsertId()."&h=".$data['3'];

      // SEND EMAIL
      @mail($data['1'], "Confirm your email", $msg);
    }
	
    return $pass;
  }

  function verify($id, $hash){
  // verify() : verify given id and hash

    // GET THE USER
    $user = $this->getID($id);

    // NOT FOUND
    if (empty($user)) { return false; }

    // HASH NOT MATCH
    if ($user['user_data']!=$hash) { return false; }

    // IF ALL ELSE PASS, ACTIVATE ACCOUNT
    $stmt = $this->pdo->prepare("UPDATE `users` SET `isValid`='1' WHERE `user_id`=?");
    $pass = $stmt->execute([$id]);

    // SEND A WELCOME EMAIL IF YOU WANT...
    return $pass;
  }
  
}
?>