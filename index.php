<?php
require_once __DIR__.'/includes/config.php';
?><!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>La Estantería</title>
</head>

<body>

<div id="contenedor">

<?php
	require("includes/comun/cabecera.php");
	require("includes/comun/sidebarIzq.php");
?>

	<div id="contenido">
		<h1>Bienvenid@ a la Estantería.</h1>
		<p>La mayor estantería de juegos de mesa del mundo.</p>
		<p>En nuestra página web encontrarás todos los juegos de mesa que ya conoces y los que todavía no. Has perdido las reglas del juego, no pasa nada, a través de nuestro servicio gratuito podrás consultarlas e incluso descargarlas.</p>
	</div>

<?php

	require("includes/comun/pie.php");

?>


</div>

</body>
</html>