<?php
require  'medoo.php';
 
$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'empresa',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
]);
 
 if ($_GET){
     $query=$database->select(
         "tb_personal",
         "*",[
        "id_personal"=>$_GET["id"]
         ]);
 }


 if($_POST){
$database->delete("tb_personal", 
[
	"id_personal"=>$_POST["id"]
]);
header("location:listado.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertar</title>
</head>
<body>
<form action="eliminar.php" method="post">
<h2>Desea eliminar este registro?</h2>

<p> <?php echo $query[0] ["nombre"]. " " .$query[0]["apellido"];?> </p>

<inpunt type="submit" value="SI"><inpunt type="button" value="NO" onclick="history.back();">

	
</form>

</body>
</html>