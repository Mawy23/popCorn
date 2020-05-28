<?php
require_once __DIR__.'/includes/config.php';
use popcorn\Aplication\Form\FormRegister;


?>
<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png" />
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Registro</title>
</head>

<body>

  <div id="contenedor2">

    <?php
  require("includes/comun/cabecera.php");
  require("includes/Form/FormRegister.php");
?>

    <div id="contenido">
      <h1>Registro de usuario</h1>
      <?php 
    $form = new FormRegistro();
    $html = $form->gestiona();

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['error_registro'])) {
        if (count($_SESSION['error_registro']) > 0) {
            echo '<ul class="errores">';
        }

        foreach ($_SESSION['error_registro'] as $error) {
            echo "<li>$error</li>";
        }

        if (count($_SESSION['error_registro']) > 0) {
            echo '</ul>';
        }
        unset($_SESSION['error_registro']);
      }
?>
    </div>

    <?php
	require("includes/comun/pie.php");
?>


  </div>

</body>

</html>