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
 
 if ($_GET){
     $query=$database->select(
         "tb_revistas",
         "*",[
        "id_categoria"=>$_GET["id"]
         ]);
 }


 if($_POST){
$database->update("tb_revistas", [
	"titulo" => $_POST["titulo"],
	"publicacion" => $_POST["publicacion"],
	"id_categoria"=> $_POST["categoria"]
],
[
    "id_revista"=>$_POST["id"]
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
 	<input type="text" name="titulo" value="<?php echo $query[0]["titulo"];?>">

 	<label for="">Apellido</label>
  	<input type="text" name="publicacion" value="<?php echo $query[0]["publicacion"];?>">

 	<select name="categoria" id="">
	  <?php
	  $data=$database->select("tb_categorias","*");
	  $len=count($data);
for ($i=0;$i<$len;$i++){

    if ($data[$i]["id_categoria" ]== $query[0] ["id_categoria"]) {
    echo "<option value='".$data[$i]["id_categoria"]."' selected>".$data[$i]["categoria"]."</option>";
    }else {
        echo "<option value='".$data[$i] ["id_categoria"]."'>".$data[$i]["categoria"]."</option>";
    }

}
 
	  ?>

	  </select>
	  <br>
  	  	<br>
    <input type="hidden" name="id" value="<?php echo $query[0]["id_revista"];?>">
  	<input type="submit" value="Actualizar" style="margin-left:70px">
</form>

</body>
</html>