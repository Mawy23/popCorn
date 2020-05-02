<?php

session_start();
$doc1 = new DOMDocument();
$doc2 = new DOMDocument();
$doc1->load("XML/marcas.xml");
$doc2->load("XML/juegos.xml");
$marcas = $doc1->getElementsByTagName("marca");
$juegos = $doc2->getElementsByTagName("juego");
//print_r($marcas);exit;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="tabla.css">
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Marcas</title>
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
			echo "<h1>Usuario no registrado!</h1>";
			echo "<p>Debes iniciar sesión para ver el contenido..</p>";
		} else {
	?>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Fundación</th>
					<th>Total juegos</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($marcas as $marca){

					$name=$marca->getElementsByTagName("nombre");
					$nombre=$name->item(0)->nodeValue;

					$date=$marca->getElementsByTagName("fecha");
					$fecha=$date->item(0)->nodeValue;

					$total = 0;
					foreach($juegos as $juego){
						$id_juego=$juego->getElementsByTagName("compania");
						$comp=$id_juego->item(0)->nodeValue;
						if($comp == $nombre){
							$total = $total + 1;
						}
					}
					?>
					<tr>
						<td><?php echo $nombre?></td>
						<td><?php echo $fecha?></td>
						<td><?php echo $total?></td>
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