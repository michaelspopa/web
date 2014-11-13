<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
<link rel="stylesheet" href="css/style.css"/>
<title>Auto</title>
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
			<li><a href='adauga.php'>Adauga anunt</a></li>
		
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
				<div class="categ">
					<!--<form style="width:0px; height:0px" method="POST">-->
					<form method="GET">
					<label>Marca</label>
						<select name="marca" id="selectVal" onchange="getSelectedValue()">
						<option value=""></option>
						<?php
						while($row=mysqli_fetch_array($result))
						{
						echo "<option value='".$row['marca']."'>".$row['marca']."</option>";
						}
						?>
						<!--<input type="hidden" name="test_text" id="text_content" value=""/>-->
						</select>
						<input type="submit" value="m" onclick="getSelectedValue()"/>
					</form>	
					<!--</form>-->
				</div>
				<form method="GET" action="afiseaza.php">
				<input type="hidden" id='hidden' name="marca" value="<?php
					echo $_POST['marca']; ?>">
				</div>
				<div class="categ">
					<label>Model</label>
					<select name="model">
					<option value=""></option>
					<?php
					$modelResult=mysqli_query($con, "select model from modele, marci where marci.id_marca=modele.id_marca and marca="."'".$_GET['marca']."'");
					while($rowModel=mysqli_fetch_array($modelResult))
					{
					echo"<option value='".$rowModel['model']."'>".$rowModel['model']."</option>";
					}
					mysqli_close($con);
					?>
					</select>
				</div>
				<div class="categ">
					<label>Motorizare</label>
					<select name="motorizare">
					<option value="Diesel">Diesel</option>
					<option value="Benzina">Benzina</option>
					</select>
				</div>
				<div class="categ">
				<label>Nr. usi</label>
					<input type="text" name="usi">
				</div>
				<input type="submit" value="Cauta"/>
				</form>
				<form method="GET" action="afiseazatot.php">
				<input type="submit" value="afiseaza toate anunturile"/>
				</form>
			</div>
			<br><br>
			<div>
			
				</div>
        </div>
        
  </div>
</body>
</html>

