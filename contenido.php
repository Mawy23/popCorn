<?php

session_start();
$doc = new DOMDocument();
$doc->load("XML/pelis.xml");
$juegos = $doc->getElementsByTagName("juego");
//print_r($juegos);exit;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png"/>
<link rel="stylesheet" type="text/css" href="tabla.css">
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Películas</title>
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
					//Cambiado a pelis, falta lo de más abajo.
					<th>Nombre</th>
					<th>Productora</th>
					<th>Género</th>
					<th>Actores</th>
					<th>Edades</th>
					<th>Link</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($juegos as $juego){
					$name=$juego->getElementsByTagName("nombre");
					$nombre=$name->item(0)->nodeValue;

					$tag=$juego->getElementsByTagName("categoria");
					$categoria=$tag->item(0)->nodeValue;

					$players=$juego->getElementsByTagName("jugadores");
					$jugadores=$players->item(0)->nodeValue;

					$age=$juego->getElementsByTagName("edad");
					$edad=$age->item(0)->nodeValue;

					$path=$juego->getElementsByTagName("descargar");
					$descargar=$path->item(0)->nodeValue;

					$company=$juego->getElementsByTagName("compania");
					$comp=$company->item(0)->nodeValue;

					?>
					<tr>
						<td><?php echo $nombre?></td>
						<td><?php echo $comp?></td>
						<td><?php echo $categoria?></td>
						<td><?php echo $jugadores?></td>
						<td><?php echo $edad?></td>
						<td><a href="<?php echo $descargar?>">Descargar</a></td>
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