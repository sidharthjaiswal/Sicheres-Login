<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
	$id= null;
	$name = $_POST["name"];
	$passwort = password_verify($_POST['password'], PASSWORD_DEFAULT);
	$kreditkarte = $_POST["kreditkarte"];

	$con = mysqli_connect("","root","");
	

	mysqli_select_db($con, "m183");
	

/* SQL-Abfrage ausführen */
$sql = "SELECT * FROM login";
$sql.= " WHERE name LIKE '$name%'";
$sql.= "WHERE password LIKE '$passwort%'";
$sql.= "WHERE kreditkarte LIKE '$kreditkarte'";
	
	mysqli_query($con, $sql);
	

	$res = mysqli_query($con, "SELECT * FROM Login");
	

	$num = mysqli_num_rows($res);
	

	if($num > 0)
		echo "";
	else
		echo "keine Ergebnisse!<br>";
	
	echo "<table width='100%' border='1'>
	<tr><th>ID</th><th>Name</th><th>Passwort</th><th>Kreditkartennummer</th></tr>";

	while ($dsatz = mysqli_fetch_assoc($res))
	{
		echo "<tr><td>" . $dsatz["id"] . "</td><td>"
		. $dsatz["name"] . "</td><td>"
		. $dsatz["password"] . "</td><td>"
        .$dsatz["kreditkarte"]."</td><tr>";
	}
	echo "</table>";
	

	mysqli_close($con);
	?>
</body></html>