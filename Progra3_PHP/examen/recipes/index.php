<?php

	require  'medoo.php';
 
    $database = new medoo([
        // required
        'database_type' => 'mysql',
        'database_name' => 'examen',
        'server' => 'localhost',
        'username' => 'root',
       // 'password' => 'root',
        'charset' => 'utf8'
    ]);
	
	$data = $database->select("tb_recipes", [
	
		"[><]tb_recipe_category" => ["id_category" => "id_category"]
 
	], [
		"tb_recipes.id_recipe",
		"tb_recipes.recipe_name",
		"tb_recipes.recipe_prep_time",
		"tb_recipes.recipe_cook_time",
		"tb_recipes.recipe_serves",
		"tb_recipes.recipe_description",
		"tb_recipes.recipe_image",
		"tb_recipes.id_category",
		"tb_recipe_category.id_category"
	], [
		"ORDER" => ["tb_recipes.id_recipe" => "DESC"]
	]);
	
	echo count($data);

?>



<html>
	<head>
		<title>Recipes</title>
		<style>
		body{
			margin: 0;
			padding: 0;
			font-family: Arial;
		}
		header{
			display: inline-block;
			width: 100%;
			height: 300px;
			background: url(./imgs/header.jpg) no-repeat center center;
		}
		h1{
			margin: 140px 0 0 0;
			font-size: 50px;
			text-align: center;
			text-shadow: 3px 1px 2px rgba(150, 150, 150, 1);
		}
		
		#recipes{
			width:1050px;
			margin:auto;
		}
		
		.recipe{
			width:250px;
			float:left;
			margin:5px;
			border: 1px solid #ccc;
			background:#e74c3c;
		}
		
		.recipe img{
			width:250px;
		}
		
		.recipe a{
			text-decoration:none;
			color: #000;
		}
		
		.recipe h3{
			padding: 0 0 0 10px;
			color:#fff;
			font-size:11px;
		}
		
		</style>
	</head>
	<body>
		
		<header>
			<h1>OUR RECIPES</h1>
		</header>
	
	
		<section>
			<div id="recipes">

			<?php
				
				$len=count($data);
				echo $len;
				for ($i=0; $i <$len; $i++) { 
				
				echo"<div class='recipe'>".
					"<a href='recipe.php?id_recipe=".$data[$i]["id_recipe"]."'>".
						"<img src='./imgs/".$data[$i]["recipe_image"]."'>".
						"<h3>".$data[$i]["recipe_name"]."</h3>".
					"</a>".
				"</div>";
				}
			?>	
				
				
			</div>

		</section>

	</body>
</html>