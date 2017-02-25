
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
 if($_POST){
$database->insert("tb_revistas", [
	"titulo" => $_POST["titulo"],
	"publicacion" => $_POST["publicacion"],
	"id_categoria"=> $_POST["categoria"]
]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertar revistas</title>
</head>
<body>
<form action="insertar.php" method="post">
	<label for="text">Titulo de revista</label>
 	<input type="text" name="titulo">

 	<label for="">Ano publicacion</label>
  	<input type="text" name="publicacion">

 	<select name="categoria" id="">
	  <?php
	  $data=$database->select("tb_categorias","*");
	  $len=count($data);
for ($i=0;$i<$len;$i++){
echo "<option value='".$data[$i]["id_categoria"]."'>".$data[$i]["categoria"]."</option>";
}
 
	  ?>

	  </select>
	  <br>
  	  	<br>
  	<input type="submit" value="Ingresar" style="margin-left:70px">
</form>

</body>
</html>