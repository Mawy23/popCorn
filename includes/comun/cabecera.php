<div id="cabecera">
	<div class="menuBar">
		<div class="menuLogo">
	            <a href="index.php"><img src="img/logo/logoMenu.png" alt="Logo La Estanteria"/></a>
	    </div>
	    <div class="menuCompanyText">
	            <p><a href="index.php">La Estantería</a></p>
	    </div>
	</div>
	<div class="saludo">
	<?php
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
		echo "Bienvenido, " . $_SESSION['nombre'] . ".<a href='logout.php'>(salir)</a>";
		
	} else {
		echo "<a href='login.php'>Login</a> <a href='registro.php'>Registro</a>";
	}
	?>
	</div>
</div>

