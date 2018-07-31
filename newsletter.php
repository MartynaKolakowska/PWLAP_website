<?php 

$emailError="";
$email="";
$host,$username,$password,$databasename = ""; // TODO

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["email"])) {
		$emailError = "Podaj E-mail!";
	} else {
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$emailError = "Nieprawidłowy format!"; 
		} else {
			mysql_query("insert into dataBaseTable values('$email')");
			$emailError = "Będziemy w kontakcie!";
		}
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include 'index.html';
?>