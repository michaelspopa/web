<?php
$con=mysqli_connect("localhost:3306","root","","carsellerdb");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySql: " . mysqli_connect_error();
		}  
					$modelResult=mysqli_query($con, "select model from modele, marci where marci.id_marca=modele.id_marca and marca="."'".$_GET['']."'");
					while($rowModel=mysqli_fetch_array($modelResult))
					{
					echo"<option value='".$rowModel['model']."'>".$rowModel['model']."</option>";
					}
					mysqli_close($con);
?>