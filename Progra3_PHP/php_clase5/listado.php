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
 $data = $database->select("tb_personal","*");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado</title>
</head>
<body>
<ul>

<?php
	$len=count($data);
	for($i=0;$i<$len;$i++){
	echo"<li>".$data[$i]["nombre"]." ".$data[$i]["apellido"]." ".$data[$i]["id_departamento"]." <a href='editar.php?id=".$data[$i]["id_personal"]."'>Editar</a> | <a href=''>Eliminar</a></li>";
	}

	?>
</ul>

</body>
</html>

<?php


?>