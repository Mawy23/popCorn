<?php
require_once __DIR__.'/includes/config.php';


?><!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png"/>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>

<body>

<div id="contenedor2"class = "f">

<?php
	require("includes/comun/cabecera.php");
	require("includes/Form/FormLogin.php");
?>

	<div id="contenido">
		<h1>Acceso al sistema</h1>
<?php 
    $form = new FormLogin();
		$html = $form->gestiona();

		if (!isset($_SESSION)) {
				session_start();
		}

		if (isset($_SESSION['error_login'])) {
				if (count($_SESSION['error_login']) > 0) {
						echo '<ul class="errores">';
				}

				foreach ($_SESSION['error_login'] as $error) {
						echo "<li>$error</li>";
				}

				if (count($_SESSION['error_login']) > 0) {
						echo '</ul>';
				}
				unset($_SESSION['error_login']);
			}	 
?>
	</div>

<?php
	require("includes/comun/pie.php");
?>


</div>

</body>
</html>