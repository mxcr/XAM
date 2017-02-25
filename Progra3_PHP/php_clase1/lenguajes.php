<?php
$lenguajes=["Java","JavaScript","PHP",".NET","Python"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lunguajes</title>
</head>
<body>
<?php
if ($_GET) {
	echo "<h3>Lenguaje seleccionado: 
	</h3>".$lenguajes[$_GET["id"]];
}
?>

</body>
</html>