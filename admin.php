<?php
require_once __DIR__.'/includes/config.php';
require_once("includes/DAO/pelisDAO.php");
require_once("includes/DAO/pelis.php");
if(isset($_POST['insertar'])){
	$doc = new DOMDocument();
	$doc->load("XML/pelis.xml");
	$nombre = $_POST['nombre'];
	$productora = $_POST['productora'];
	$genero = $_POST['genero'];
	$edades = $_POST['edades'];
	$link = $_POST['link'];
	
	$pelicula = new TOUpeli();
	$dao_pelicula = new DAOPelis();

	$pelicula->set_nombre($nombre);
	$pelicula->set_productora($productora);
	$pelicula->set_genero($genero);
	$pelicula->set_edades($edades);
	$pelicula->set_link($link);
	$dao_pelicula->insert_Peli($pelicula);
}

?><!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png"/>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administrar</title>
</head>

<body>

<div id="contenedor">

<?php
	require("includes/comun/cabecera.php");
	require("includes/comun/sidebarIzq.php");
?>

	<div id="contenido">

	<?php
		/*if (!isset($_SESSION['esAdmin'])) {
			echo "<h1>Acceso denegado!</h1>";
			echo "<p>No tienes permisos suficientes para añadir nuevas películas.</p>";
		} else {*/
	?>
		<h1>Consola de administración</h1>
		<p>Aquí se añaden las películas a la cartelera disponible.</p>
		<fieldset>
		<form method = "POST" action = "admin.php">
		
			<div class="grupo-control">
				<label>Nombre de la película:</label> <input class="control" type="text" name="nombre" value="" />
			</div>
			<div class="grupo-control">
				<label>Productora:</label> <input class="control" type="text" name="productora" value="" />
			</div>
			<div class="grupo-control">
				<label>Género:</label> <input class="control" type="text" name="genero" value="" />
			</div>
			<div class="grupo-control">
				<label>Edad:</label> <input class="control" type="text" name="edades" value="" />
			</div>
			<div class="grupo-control">
				<label>Link:</label> <input class="control" type="text" name="link" value="" />
			</div>
			<div class="grupo-control"><button type="submit" name="insertar">Añadir</button></div>
		</form>
		</fieldset>

	<?php
		/*}*/
	?>
	</div>

<?php

	require("includes/comun/pie.php");

?>


</div>

</body>
</html>