<?php

	//see fail peab olema seotud k�igiga kus tahame sessiooni kasutada
	//saame n��d kasutada $_SESSION muutujat
	session_start();

	$database = "if16_raitkeer";

	function signup($email, $password) {

		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUE (?, ?)");
		
		//asendan k�sim�rgid
		//iga m�rgi kohta tuleb lisada �ks t�ht - mis t��pi muutuja on
		// s-string
		// i-int
		// d-double
		$stmt->bind_param("ss", $email, $password);
		
		//aitab leida viga eelmises k�sus
		echo $mysqli->error;
		
		if ( $stmt->execute() ) {
			echo "�nnestus";
					
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
		
		//asendan k�sim�rgi
		$stmt->bind_param("s", $email);
		
		//rea kohta tulba v��rtus
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $created);
		
		$stmt->execute();
		
		//ainult SELECT'i puhul
		if($stmt->fetch()) {
			// oli olemas, rida k�es
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
			
			//ei olnud �htegi rida
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