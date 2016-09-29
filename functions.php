<?php

	//see fail peab olema seotud kõigiga kus tahame sessiooni kasutada
	//saame nüüd kasutada $_SESSION muutujat
	session_start();

	$database = "if16_raitkeer";

	function signup($email, $password) {

		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUE (?, ?)");
		
		//asendan küsimärgid
		//iga märgi kohta tuleb lisada üks täht - mis tüüpi muutuja on
		// s-string
		// i-int
		// d-double
		$stmt->bind_param("ss", $email, $password);
		
		//aitab leida viga eelmises käsus
		echo $mysqli->error;
		
		if ( $stmt->execute() ) {
			echo "õnnestus";
					
		} else {
			echo "ERROR ".$stmt->error;
			
		}
	}

	function login($email, $password) {
		
		$notice = "";
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("
			SELECT id, email, password, created
			FROM user_sample
			WHERE email = ?
		
		");
		
		echo $mysqli->error;
		
		//asendan küsimärgi
		$stmt->bind_param("s", $email);
		
		//rea kohta tulba väärtus
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $created);
		
		$stmt->execute();
		
		//ainult SELECT'i puhul
		if($stmt->fetch()) {
			// oli olemas, rida käes
			//kasutaja sisestas sisselogimiseks
			$hash = hash("sha512", $password);
			
			if ($hash == $passwordFromDb) {
				echo "Kasutaja $id logis sisse";
				
				$_SESSION["userId"] = $id;
				$_SESSION["userEmail"] = $emailFromDb;
				
				header("Location: data.php");
				
				
			} else {
				$notice = "parool vale";
			}
			
			
		} else {
			
			//ei olnud ühtegi rida
			$notice = "Sellise emailiga ".$email." kasutajat ei ole olemas";
		}
		
		return $notice;
		
	}


















/*
Mitte just hea variant!

	function name($firstname, $lastname) {
		
		return $firstname . $lastname;
		
	}

	echo "Tere tulemast ". name("Rait ", "Keernik")."!";
	echo "<br>";
*/	

?>