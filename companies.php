<?php

session_start();
$doc1 = new DOMDocument();
$doc1->load("XML/compañias.xml");
$compañias = simplexml_load_file("XML/compañias.xml");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png"/>
<link rel="stylesheet" type="text/css" href="css/elementos.css">
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Compañias</title>
</head>

<body>

<div id="contenedor2">

<?php
	require("includes/comun/cabecera.php");
	
?>

	<div >

	<?php
		if (!isset($_SESSION['login'])) {
			echo "<h1 class = 'acceso-denegado'>Usuario no registrado!</h1>";
			echo "<p class = 'acceso-denegado'>Debes iniciar sesión para ver el contenido..</p>";
		} else {
	?>
		<table id="tabla-compañias">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Fecha</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
			
				foreach($compañias->children() as $productora){
					
					
					
				
					
					?>
					<tr>
						<td><?php echo  $productora->nombre . "<br>";?></td>
						<td><?php echo $productora->fundacion . "<br>";?></td>
						
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