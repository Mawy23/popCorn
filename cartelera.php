<?php

session_start();

include_once('includes/DAO/pelisDAO.php');
include_once('includes/DAO/pelis.php');

$pelicula = new TOUpeli();
$dao_pelicula = new DAOPelis();
//print_r($juegos);exit;
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo/pop.png" />
  <link rel="stylesheet" type="text/css" href="tabla.css">
  <link rel="stylesheet" type="text/css" href="estilo.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Películas</title>
</head>

<body>

  <div id="contenedor2">

    <?php
	require("includes/comun/cabecera.php");
?>

    <div id="tablas">

      <?php
		if (!isset($_SESSION['login'])) {
			echo "<h1>Usuario no registrado!</h1>";
			echo "<p>Debes iniciar sesión para ver el contenido..</p>";
		} else {
	?>
      <table id = "tabla-cartelera">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Productora</th>
            <th>Género</th>
            <th>Edades</th>
            <th>Link</th>
          </tr>
        </thead>
        <tbody>

          <?php

			$resultado = $dao_pelicula->showalldata();

			while(!empty($resultado)){
				$aux = array_shift($resultado);
				
				
				$nombre = $aux->get_nombre();
				$productora = $aux->get_productora();
				$genero = $aux->get_genero();
				$edades = $aux->get_edades();
				$link = $aux->get_link();

				?>

          <tr>
            <td><?php echo $nombre ?></td>
            <td><?php echo $productora ?></td>
            <td><?php echo $genero ?></td>
            <td><?php echo $edades ?></td>
            <td>
              <?php echo "<a  href = " . $link .">Link</a>"?>

            </td>
          </tr>

          <?php
			
			}

			?>


          <?php
				}
				?>
        </tbody>
      </table>

    </div>

    <?php
	require("includes/comun/pie.php");
?>


  </div>

</body>

</html>