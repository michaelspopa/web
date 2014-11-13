<?php
$con=mysqli_connect("localhost:3306","root","","carsellerdb");
	if(mysqli_connect_errno())
	{
	echo("failed to connect to db ".mysqli_connect_error());
	}
	
	$marca=$_GET['marca'];
	$model=$_GET['model'];
	$motorizare=$_GET['motorizare'];
	$usi=$_GET['usi'];
	
	$sql="select * from cars where marca='$marca' and model='$model' and motorizare='$motorizare' and usi=$usi";
	$result=mysqli_query($con, $sql);
	
		while($row=mysqli_fetch_array($result))
		{
		echo $row['marca'].' '.$row['model']." ".$row['motorizare'].' '.$row['usi'];
		}
		
		mysqli_close($con);
?>