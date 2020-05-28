<?php
require_once __DIR__.'/includes/config.php';
require_once("includes/DAO/pelisDAO.php");
require_once("includes/DAO/pelis.php");
if(isset($_POST['insertar'])){


	
	$pelicula = new TOUpeli();
	$dao_pelicula = new DAOPelis();

	$film_name = $_POST['nombre'];
	$film_studio = $_POST['productora'];
	$film_genre = $_POST['genero'];
	$film_ages = $_POST['edades'];
	$film_link = $_POST['link'];

	$pelicula->set_nombre($film_name);
	$pelicula->set_productora($film_studio);
	$pelicula->set_genero($film_genre);
	$pelicula->set_edades($film_ages);
	$pelicula->set_link($film_link);
	$dao_pelicula->insert_Peli($pelicula);
}

?><!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png"/>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administrar</title>
</head>

<body>

<div id="contenedor2">

<?php
	require("includes/comun/cabecera.php");
?>

	<div id="contenido">

	<?php
	
		if(!isset($_SESSION['login']) || ($_SESSION['admin'] != '1')){
			echo "<h1>Acceso denegado!</h1>";
			echo "<h3>Solo los administradores pueden añadir películas la página.</h3>";
			
		} else {
	?>
	
		<h1>Añade ua película para que toda la comunidad pueda disfrutarla</h1>
		<p>Aquí se añaden las películas a la cartelera disponible.</p>
		<fieldset>
		<form method = "POST" action = "admin.php">
		
			<div class="campo">
				<label>Nombre de la película:</label> <input class="control" type="text" name="nombre"  />
			</div>
			<div class="campo">
				<label>Productora:</label> <input class="control" type="text" name="productora"  />
			</div>
			<div class="campo">
				<label>Género:</label> <input class="control" type="text" name="genero"  />
			</div>
			<div class="campo">
				<label>Edad:</label> <input class="control" type="text" name="edades" />
			</div>
			<div class="campo">
				<label>Link:</label> <input class="control" type="text" name="link" />
			</div>
			<div class="campo"><button type="submit" name="insertar">Añadir</button></div>
		</form>
		</fieldset>

	<?php
		}
	?>
	</div>

<?php

	require("includes/comun/pie.php");

?>


</div>

</body>
</html>