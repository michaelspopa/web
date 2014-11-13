<?php
$con=mysqli_connect("localhost:3306","root","","carsellerdb");
	if(mysqli_connect_errno())
	{
	echo("failed to connect to db ".mysqli_connect_error());
	}
	
	$sql="select * from cars";
	$result=mysqli_query($con, $sql);
		echo "<table border =1px style='background-color: #00CBFD'>
		<tr>
            <th>Nr.crt</th>
            <th>Marca</th>
            <th>Model</th>
            <th>An fabricatie</th>
            <th>Motorizare</th>
            <th>Capacitate motor</th>
            <th>Cp</th>
            <th>Km</th>
            <th>Culoare</th>
            <th>Nr usi</th>
            <th>Pret</th>
            <th>Telefon</th>
            </tr>";
		while($row=mysqli_fetch_array($result))
		{
				echo "<tr>";
                echo "<td>" . $row['id_masina'] . "</td>";
                echo "<td>" . $row['marca'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['an_fabricatie'] . "</td>";
                echo "<td>" . $row['motorizare'] . "</td>";
                echo "<td>" . $row['capacitate_motor'] . "</td>";
                echo "<td>" . $row['cp'] . "</td>";
                echo "<td>" . $row['km'] . "</td>";
                echo "<td>" . $row['culoare'] . "</td>";
                echo "<td>" . $row['nr_usi'] . "</td>";
                echo "<td>" . $row['pret'] . "</td>";
                echo "<td>" . $row['telefon'] . "</td>";
                echo "</tr>";
		
		echo"<p>";
		#echo $row['id_masina'].' '.$row['marca'].' '.$row['model']." ".$row['an_fabricatie'].' '.$row['motorizare'].' '.'capacitate motor:'.$row['capacitate_motor'].' '.'CP:'.$row['cp'].' '.'km:'.$row['km'].' '.$row['culoare'].' '.'nr usi:'.$row['nr_usi'].' '.'pret: '.$row['pret'].' '.'telefon:'.$row['telefon'];
		#echo "</p>";
		}
		echo '</table>';
		echo "<a href='home.php'>Mergi inapoi</a>";
		mysqli_close($con);
?>