<?php
require_once __DIR__.'/includes/config.php';
use laestanteria\Aplication\Form\FormLogin;

?><!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>

<body>

<div id="contenedor">

<?php
	require("includes/comun/cabecera.php");
	require("includes/comun/sidebarIzq.php");
?>

	<div id="contenido">
		<h1>Acceso al sistema</h1>
<?php 
    $form = new FormLogin(); $form->gestiona();
?>
	</div>

<?php
	require("includes/comun/pie.php");
?>


</div>

</body>
</html>