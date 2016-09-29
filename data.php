<?php

	//ühendan sessiooniga
	
	require("functions.php");
	
	//kui ei ole sisse loginud, suunan login lehele
	
	if (!isset($_SESSION["userId"])) {
		
		header("Location: login.php");
	}
	
	
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		
	}


?>

<h1>Data</h1>

<p>

	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">logi välja</a>


</P>