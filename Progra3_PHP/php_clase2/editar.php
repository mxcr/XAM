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
$database->update("tb_personal", [
	"nombre" => $_POST["nombre"],
	"apellido" => $_POST["apellido"],
	"id_departamento"=> $_POST["departamento"]
],
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
<form action="editar.php" method="post">
	<label for="text">Nombre</label>
 	<input type="text" name="nombre" value="<?php echo $query[0]["nombre"];?>">

 	<label for="">Apellido</label>
  	<input type="text" name="apellido" value="<?php echo $query[0]["apellido"];?>">

 	<select name="departamento" id="">
	  <?php
	  $data=$database->select("tb_departamentos","*");
	  $len=count($data);
for ($i=0;$i<$len;$i++){

    if ($data[$i]["id_departamento" ]== $query[0] ["id_departamento"]) {
    echo "<option value='".$data[$i]["id_departamento"]."' selected>".$data[$i]["departamento"]."</option>";
    }else {
        echo "<option value='".$data[$i] ["id_departamento"]."'>".$data[$i]["departamento"]."</option>";
    }

}
 
	  ?>

	  </select>
	  <br>
  	  	<br>
    <input type="hidden" name="id" value="<?php echo $query[0]["id_personal"];?>">
  	<input type="submit" value="Actualizar" style="margin-left:70px">
</form>

</body>
</html>