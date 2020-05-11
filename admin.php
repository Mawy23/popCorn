<?php
require_once __DIR__.'/includes/config.php';
if(isset($_POST['insertar'])){
	$doc = new DOMDocument();
	$doc->load("XML/juegos.xml");
	$nombre = $_POST['name'];
	$marca = $_POST['marca'];
	$categoria = $_POST['tag'];
	$jugadores = $_POST['players'];
	$edad = $_POST['age'];
	$link = "reglas/".$_POST['pdf'];

	$rootTag = $doc->getElementsByTagName("juegosdemesa")->item(0);

	$juegoTag = $doc->createElement("juego");
	$nombreTag = $doc->createElement("nombre",$nombre);
	$marcaTag = $doc->createElement("compania",$marca);
	$categoriaTag = $doc->createElement("categoria",$categoria);
	$jugadoresTag = $doc->createElement("jugadores", $jugadores);
	$edadTag = $doc->createElement("edad", $edad);
	$downTag = $doc->createElement("descargar", $link);

	$juegoTag->appendChild($nombreTag);
	$juegoTag->appendChild($marcaTag);
	$juegoTag->appendChild($categoriaTag);
	$juegoTag->appendChild($jugadoresTag);
	$juegoTag->appendChild($edadTag);
	$juegoTag->appendChild($downTag);

	$rootTag->appendChild($juegoTag);
	$doc->save("XML/juegos.xml");
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
		if (!isset($_SESSION['esAdmin'])) {
			echo "<h1>Acceso denegado!</h1>";
			echo "<p>No tienes permisos suficientes para añadir juegos.</p>";
		} else {
	?>
		<h1>Consola de administración</h1>
		<p>Aquí se añaden los juegos al catálogo.</p>
		<fieldset>
		<form method = "POST" action = "admin.php">
			
			<div class="grupo-control">
				<label>Nombre de juego:</label> <input class="control" type="text" name="name" value="" />
			</div>
			<div class="grupo-control">
				<label>Compañia:</label> <input class="control" type="text" name="marca" value="" />
			</div>
			<div class="grupo-control">
				<label>Categorias:</label> <input class="control" type="text" name="tag" value="" />
			</div>
			<div class="grupo-control">
				<label>Jugadores:</label> <input class="control" type="text" name="players" value="" />
			</div>
			<div class="grupo-control">
				<label>Edad:</label> <input class="control" type="text" name="age" value="" />
			</div>
			<div class="grupo-control">
				<label>Nombre pdf:</label> <input class="control" type="text" name="pdf" value="" />
			</div>
			<div class="grupo-control"><button type="submit" name="insertar">Añadir</button></div>
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