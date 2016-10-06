<?php

	//�hendan sessiooniga
	
	require("functions.php");
	
	//kui ei ole sisse loginud, suunan login lehele
	
	if (!isset($_SESSION["userId"])) {
		
		header("Location: login.php");
	}
	
	
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		
	}

	$vanusError = "";
	
	if (isset ($_POST["vanus"])) {

	//on olemas
		if (empty ($_POST["vanus"])) {
			
			//on t�hi
			$vanusError="V�li on kohustuslik";
		}
	}

	$colorError = "";
	
	if (isset ($_POST["color"])) {

	//on olemas
		if (empty ($_POST["color"])) {
			
			//on t�hi
			$vanusError="V�li on kohustuslik";
		}
	}

	if ( isset($_POST["vanus"]) &&
	 isset($_POST["color"]) &&
	 !empty($_POST["vanus"]) &&
	 !empty($_POST["color"])
	){
		colorEvent($_POST["vanus"], $_POST["color"]);
		
	}

	$people = getAllPeople();
	
	echo "<pre>";
	var_dump($people[5]);
	echo "</pre>";
	
	
	
?>

<h1>Data</h1>

<p>

	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">logi v�lja</a>


</P>

<h3>Salvesta s�ndmus</h3>

<form method="POST">
		
	<input name="vanus" placeholder="vanus" type="number"> <?php echo $vanusError; ?>
	
	<br><br>
	
	<input name="color" placeholder="color" type="color"> <?php echo $colorError; ?>
	
	<br><br>
	
	<input type="submit" value="Sisesta">

</form>

<h2>Arhiiv</h2>

<?php

	
	$html = "<table>";
		
		$html .= "<tr>";
			$html .= "<th>ID</th>";
			$html .= "<th>Vanus</th>";
			$html .= "<th>V�rv</th>";
		$html .= "</tr>";
		
		//iga liikme kohta massivis
		foreach ($people as $p) {
			
			$html .= "<tr>";
				$html .= "<td>".$p->id."</td>";
				$html .= "<td>".$p->age."</td>";
				$html .= "<td>".$p->color."</td>";
			$html .= "</tr>";
			
		}
	
	$html .= "</table>";
	
	
	echo $html;

?>

<h2>Midagi huvitavat</h2>

<?php

	foreach($people as $p) {
		
		$style = "
			background-color:".$p->color.";
			width: 40px;
			height: 40px;
			border-radius: 20px;
			text-align: center;
			line-height: 39px;
			float: left;
			margin: 20px;
		";
		
		echo "<p style = ' ".$style." '>".$p->age."</p>";
		
	}


?>


