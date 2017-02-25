<?php
require  'medoo.php';
 
$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'revistas',
	'server' => 'localhost',
	'username' => 'root',
	// 'password' => 'root',
	'charset' => 'utf8',
 ]);
 $data = $database->select("tb_revistas","*");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado de revistas</title>
</head>
<body>
<ul>

<?php
	$len=count($data);
	for($i=0;$i<$len;$i++){
	echo"<li>".$data[$i]["titulo"]." ".$data[$i]["publicacion"]." ".$data[$i]["id_categoria"]." <a href='editar.php?id=".$data[$i]["id_categoria"]."'>Editar</a> | <a href=''>Eliminar</a></li>";
	}

	?>
</ul>

</body>
</html>

<?php


?>