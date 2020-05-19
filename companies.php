<?php

session_start();
$doc1 = new DOMDocument();
$doc1->load("XML/compañias.xml");
$compañias = $doc1->getElementsByTagName("compañias");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png"/>
<link rel="stylesheet" type="text/css" href="tabla.css">
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Compañias</title>
</head>

<body>

<div id="contenedor2">

<?php
	require("includes/comun/cabecera.php");
	require("includes/comun/sidebarIzq.php");
?>

	<div id="tablas">

	<?php
		if (!isset($_SESSION['login'])) {
			echo "<p>Debes iniciar sesión para ver todas nuestras películas</p>";
		} else {
	?>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Fecha</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($compañias as $productora){

					$name=$productora->getElementsByTagName("nombre");
					$nombre=$name->item(0)->nodeValue;

					$fechas=$productora->getElementsByTagName("fundacion");
					$fecha=$fechas->item(0)->nodeValue;

					$name=$productora->getElementsByTagName("nombre");
					$nombre=$name->item(1)->nodeValue;

					$fechas=$productora->getElementsByTagName("fundacion");
					$fecha=$fechas->item(1)->nodeValue;

					$name=$productora->getElementsByTagName("nombre");
					$nombre=$name->item(2)->nodeValue;

					$fechas=$productora->getElementsByTagName("fundacion");
					$fecha=$fechas->item(2)->nodeValue;

					$name=$productora->getElementsByTagName("nombre");
					$nombre=$name->item(3)->nodeValue;

					$fechas=$productora->getElementsByTagName("fundacion");
					$fecha=$fechas->item(3)->nodeValue;
					
					?>
					<tr>
						<td><?php echo $nombre?></td>
						<td><?php echo $fecha?></td>
						
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
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