<?php 

$emailError="";
$email="";
//$host,$username,$password,$databasename = ""; // TODO: 1

//$connect=mysql_connect($host,$username,$password); // TODO: 1
//$db=mysql_select_db($databasename); // TODO: 1

//$mailer="Kontakt@xmuch.media"; // TODO: 2
//$subject="Subskrypcja"; // TODO: 2
//$message="Dziękuję za Subskrypjcę! Od teraz będziesz z nami na bierząco!"; // TODO: 2

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["email"])) {
		$emailError = "Podaj E-mail!";
	} else {
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$emailError = "Nieprawidłowy format!"; 
		} else {
			//mysql_query("insert into dataBaseTable values('$email')"); // TODO: 1
			//mail($mailer, $subject, $message) // TODO: 2
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