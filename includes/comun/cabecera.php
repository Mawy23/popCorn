<div id="cabecera">
	<div class="menuBar">
		<div class="menuLogo">
	            <a href="index.php"><img src="img/logo/LogoMenu.png" alt="Logo PopCorn&Chill"/></a>
	    </div>
	    <div class="menuCompanyText">
	            <p><a href="index.php">PopCorn&Chill</a></p>
	    </div>
	</div>
	<div class = "menu">
	<ul class = "align-left ul ">
		<li class = "li"><a href="index.php">INICIO  </a></li>
		<li class = "li"><a href="cartelera.php">CARTELERA</a></li>		
		<li class = "li"><a href="companies.php">COMPAÑIAS</a></li>
		<li class = "li"><a href="admin.php">AÑADIR PELÍCULAS</a> </li>	
	</ul>
	
	<div class = "align-right" >
		<ul class = "saludo-der">
		<?php
		if (isset($_SESSION["login"])) {
			?>
			Bienvenido <?php echo $_SESSION["username"]?>
			<?php
			echo "<a href='logout.php'>Logout</a> ";
		} else {
			echo "<a href='login.php'>Login</a> <a href='registro.php'>Registro</a>";
		}
		?></ul></div>
		
	</div>
	
	
		
		
</div>

