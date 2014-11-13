<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
<link rel="stylesheet" href="css/style.css"/>
<title>Auto</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>

function getSelectedValue()
{
var e = document.getElementById("idMarca").value;

document.getElementById("hidden").setAttribute("value", e);
alert(e);
}

</script>
</head>
<body>
  <div id="all">         
        <ul id='menu'>
			<li><a href='home.php'>Home</a></li>
            <li><a href='#'>Cauta anunt</a></li>
			<li><a href='home.php'>Adauga anunt</a></li>
			
        </ul>
<?php
	$con=mysqli_connect("localhost:3306","root","","carsellerdb");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySql: " . mysqli_connect_error();
		}  
	$result=mysqli_query($con, "select marca from marci");
?>

        <div id="image"></div>
     
        <div id="contain">
			<div id="chooser">
				<p>Cauta masina:</p>
				<form method="POST" name="form1">
				<div class="categ">
						<label>Marca</label>
						<select name="marca" id="idMarca">
							
							<?php
							while($row=mysqli_fetch_array($result))
							{
							echo "<option value='".$row['marca']."'>".$row['marca']."</option>";
							}
							
							?>
						</select>
						<input type="submit" value="m" onclick="getSelectedValue()"/>
					</div>	
				</form>
				<form method="POST" action="insert.php">
				<input type="hidden" id='hidden' name="marca" value="<?php
					echo $_POST['marca']; ?>">
				</div>
				<div id="d1" class="categ">
					<label>Model</label>
					<select name="model">
					<!--<option  value=""></option>-->
					<option  value=""></option>
					<?php
					$modelResult=mysqli_query($con, "select model from modele, marci where marci.id_marca=modele.id_marca and marca="."'".$_POST['marca']."'");
					while($rowModel=mysqli_fetch_array($modelResult))
					{
					echo"<option value='".$rowModel['model']."'>".$rowModel['model']."</option>";
					}
					mysqli_close($con);
					?>
					</select>
				</div>
				
				<div class="categ">
				<label>An fabricatie</label>
				<input type="text" name="an">
				</div>
				
				<div class="categ">
					<label>Motorizare</label>
					<select name="motorizare">
					<option value="Diesel">Diesel</option>
					<option value="Benzina">Benzina</option>
					</select>
				</div>
				
				<div class="categ">
				<label>Capacitate motor(cmc)</label>
				<input type="text" name="capacitate">
				</div>
				
				<div class="categ">
				<label>Putere(CP)</label>
				<input type="text" name="cp">
				</div>
				
				<div class="categ">
				<label>Km</label>
					<input type="text" name="km">
				</div>
				
				<div class="categ">
				<label>Culoare</label>
					<input type="text" name="culoare">
				</div>
				
				<div class="categ">
				<label>Nr. usi</label>
					<input type="text" name="usi">
				</div>
				
				<div class="categ">
				<label>Pret</label>
					<input type="text" name="pret">
				</div>
				
				<div class="categ">
				<label>Telefon proprietar</label>
					<input type="text" name="telefon">
				</div>
				
				<div class="categ">
				<label>Email</label>
					<input type="text" name="email">
				</div>
				
				<!--<input type="hidden", name="marca" value=getSelectedValue()/>-->
				
				<input type="submit" value="Adauga anunt"/>
				</form>
			</div>
			<br><br>
			<div>
			
				</div>
        </div>
        
  </div>
</body>
</html>

