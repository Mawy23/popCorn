<div id="cabecera">
	<div class="menuBar">
		<div class="menuLogo">
	            <a href="index.php"><img src="img/logo/LogoMenu.png" alt="Logo PopCorn&Chill"/></a>
	    </div>
	    <div class="menuCompanyText">
	            <p><a href="index.php">PopCorn&Chill</a></p>
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

