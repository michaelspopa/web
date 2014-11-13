<?php
$con=mysqli_connect("127.0.0.1:3306","qwerty","","carsellerdb");
	if(mysqli_connect_errno())
	{
	echo("failed to connect to db ".mysqli_connect_error());
	}
	$marca=$_POST['marca'];
	$model=$_POST['model'];
	$an=$_POST['an'];
	$motorizare=$_POST['motorizare'];
	$capacitate=$_POST['capacitate'];
	$cp=$_POST['cp'];
	$km=$_POST['km'];
	$culoare=$_POST['culoare'];
	$usi=$_POST['usi'];
	$pret=$_POST['pret'];
	$telefon=$_POST['telefon'];
	$email=$_POST['email'];
	
	
	
	$sql="insert into cars(marca, model, an_fabricatie, motorizare, capacitate_motor, cp, km, culoare, nr_usi, pret, telefon, email) 
		values('$marca', '$model', $an, '$motorizare', $capacitate, $cp, $km, '$culoare', $usi, $pret, '$telefon', '$email')";
				
	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	}
		echo "Anunt adaugat";
		echo "<br>";
		echo "<a href='adauga.php'>Mergi inapoi</a>";

mysqli_close($con);
				
?>