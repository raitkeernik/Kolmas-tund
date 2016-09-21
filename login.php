<?php

	//var_dump($_GET);
	
	//echo"<br>";
	
	//var_dump($_POST);
	
	$signupEmailError = "";
	
	//kas keegi vajutas nuppu ja see on olemas
	
	if (isset ($_POST["signupEmail"])) {
		
		//on olemas
		//kas epost on t�hi	
		if (empty ($_POST["signupEmail"])) {
			
			//on t�hi
			$signupEmailError="V�li on kohustuslik";
		}
	}
	
	$signupPasswordError = "";
	
	//kas keegi vajutas nuppu ja see on olemas
	
	if (isset ($_POST["signupPassword"])) {
		
		//on olemas	
		if (empty ($_POST["signupPassword"])) {
			
			//on t�hi
			$signupPasswordError="V�li on kohustuslik";
		
		} else {
			
			//parool ei olnud t�hi
			
			if ( strlen ($_POST["signupPassword"]) < 8 ) {
				
				$SignupPasswordError = "*Parool peab olema v�hemalt 8 t�hem�rki pikk";
			}
		}
	}

	$firstNameError = "";
	
	//kas keegi vajutas nuppu ja see on olemas
	
	if (isset ($_POST["firstName"])) {
		
		//on olemas
		if (empty ($_POST["firstName"])) {
			
			//on t�hi
			$firstNameError="V�li on kohustuslik";
		}
	}

	$surnameError = "";
	
	//kas keegi vajutas nuppu ja see on olemas

	if (isset ($_POST["surname"])) {
	
		//on olemas
		if (empty ($_POST["surname"])) {
			
			//on t�hi
			$surnameError="V�li on kohustuslik";
		}
	}

	$addressError = "";
	
	//kas keegi vajutas nuppu ja see on olemas

	if (isset ($_POST["address"])) {
	
		//on olemas
		if (empty ($_POST["address"])) {
			
			//on t�hi
			$addressError="V�li on kohustuslik";
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
