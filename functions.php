<?php
  // functions.php
  /*
	function sum($x,$y)
	{
		
		return $x+$y;
		
	}
	echo sum(44342424,324242);
	echo "<br>";
	echo sum(1,1);
	echo "<br>";
	
	
	function hello($name,$surname)
	{
		return "Tere tulemast ".$name." ".$surname;
	}
	
	echo hello("Stas","Majevski");
	*/
	
	
	/******************************************/
	//                 SIGN UP              
	/******************************************/
	
	var_dump($GLOBALS); // php muutuaja , sees on koik muutujad
	
	function signUp($email,$password,$birthday,$gender)
	{
		// UHENDUS
		$database = "if16_stanislav";
		$mysqli = new mysqli($GLOBALS["serverHost"],$GLOBALS["serverUsername"],$GLOBALS["serverPassword"], $database);
		
		// sqli rida
		$stmt = $mysqli->prepare("INSERT INTO login (email,password,birthday,gender) VALUES (?,?,?,?)");
		
		
		echo $mysqli->error; // !!! Kui l�heb midagi valesti, siis see k�sk printib viga
		
		// stringina �ks t�ht iga muutuja kohta (?), mis t��p
		// string - s
		// integer - i
		// float (double) - d
		$stmt->bind_param("ssss",$email,$password,$birthday,$gender); // sest on email ja password VARCHAR - STRING , ehk siis email - s, password - sa
		
		//t�ida k�sku
		if($stmt->execute())
		{
			echo "salvsestamine �nnestus";
		}
		else
		{
			echo "ERROR ".$stmt->error;
		}
		
		//panen �henduse kinni
		$stmt->close();
		$mysqli->close();
	}
?>