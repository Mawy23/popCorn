<?php
require_once __DIR__.'/includes/config.php';

//Doble seguridad: unset + destroy
unset($_SESSION["login"]);
unset($_SESSION["esAdmin"]);
unset($_SESSION["nombre"]);


session_destroy();
//header('Location: index.php');
?><!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png"/>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Portada</title>
</head>

<body>

<div id="contenedor2">

<?php
	require("includes/comun/cabecera.php");
	if(!isset($_SESSION)) 
	{ 
			session_start(); 
	} 
	session_destroy();
	header("Location:index.php");
	exit;

?>



<?php
	require("includes/comun/pie.php");
?>


</div>

</body>
</html>