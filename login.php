<?php

	//var_dump($_GET);
	
	//echo"<br>";
	
	//var_dump($_POST);
	
	$signupEmailError = "";
	
	//kas keegi vajutas nuppu ja see on olemas
	
	if (isset ($_POST["signupEmail"])) {
		
		//on olemas
		//kas epost on tühi	
		if (empty ($_POST["signupEmail"])) {
			
			//on tühi
			$signupEmailError="Väli on kohustuslik";
		}
	}
	
	$signupPasswordError = "";
	
	//kas keegi vajutas nuppu ja see on olemas
	
	if (isset ($_POST["signupPassword"])) {
		
		//on olemas	
		if (empty ($_POST["signupPassword"])) {
			
			//on tühi
			$signupPasswordError="Väli on kohustuslik";
		
		} else {
			
			//parool ei olnud tühi
			
			if ( strlen ($_POST["signupPassword"]) < 8 ) {
				
				$SignupPasswordError = "*Parool peab olema vähemalt 8 tähemärki pikk";
			}
		}
	}

	$firstNameError = "";
	
	//kas keegi vajutas nuppu ja see on olemas
	
	if (isset ($_POST["firstName"])) {
		
		//on olemas
		if (empty ($_POST["firstName"])) {
			
			//on tühi
			$firstNameError="Väli on kohustuslik";
		}
	}

	$surnameError = "";
	
	//kas keegi vajutas nuppu ja see on olemas

	if (isset ($_POST["surname"])) {
	
		//on olemas
		if (empty ($_POST["surname"])) {
			
			//on tühi
			$surnameError="Väli on kohustuslik";
		}
	}

	$addressError = "";
	
	//kas keegi vajutas nuppu ja see on olemas

	if (isset ($_POST["address"])) {
	
		//on olemas
		if (empty ($_POST["address"])) {
			
			//on tühi
			$addressError="Väli on kohustuslik";
		}
	}


?>




<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		<h1>Logi sisse</h1>

		<form method="POST">
		
			<input name="loginEmail" placeholder="e-mail" type="email">
			
			<br><br>
			
			<input name="loginPassword" placeholder="Parool" type="password">
			
			<br><br>
			
			<input type="submit" value="Logi sisse">
		
		</form>
		
		<h1>Loo kasutaja</h1>

		<form method="POST">
		
			<input name="signupEmail" placeholder="e-mail" type="email"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input name="signupPassword" placeholder="Parool" type="password"> <?php echo $signupPasswordError; ?>
			
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
		
		</form>
	
		<h1>Sisesta oma nimi</h1>

		<form method="POST">
		
			<input name="firstName" placeholder="First Name" type="text"> <?php echo $firstNameError; ?>
			
			<br><br>
			
			<input name="surname" placeholder="Surname" type="text"> <?php echo $surnameError; ?>
			
			<br><br>
			
			<input type="submit" value="Sisesta">
		
		</form>
	
		<h1>Sisesta oma asukoht</h1>
		
		<form method="POST">
			
			<input name="address" placeholder="address" type="text"> <?php echo $addressError; ?>
			
			<br><br>
			
			<input type="submit" value="Sisesta">
			
		</form>
	
	</body>
</html> 
