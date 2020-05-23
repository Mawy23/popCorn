<?php
require_once __DIR__.'/includes/config.php';
use popcorn\Aplication\Form\FormRegister;


?>
<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png" />
  <link rel="stylesheet" type="text/css" href="estilo.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Registro</title>
</head>

<body>

  <div id="contenedor">

    <?php
	require("includes/comun/cabecera.php");

?>

    <div id="contenido">
      <h1>Registro de usuario</h1>
      <?php 
    $form = new FormRegister(); $form->gestiona();
?>
    </div>

    <?php
	require("includes/comun/pie.php");
?>


  </div>

</body>

</html>