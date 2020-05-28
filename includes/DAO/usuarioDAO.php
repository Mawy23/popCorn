<?php

include_once('DAOF.php');
include_once('usuario.php');

/* Data Access Object */
class usuarioDAO extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del user. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}
	

	public function insert_User($TOUusuario){
	
    $username = $TOUusuario->get_username();
    $nombre = $TOUusuario->get_nombre();
    $password =  $TOUusuario->get_password();
		$admin = $TOUusuario->get_admin();
		

		$sql = "INSERT INTO usuarios SET nombreUsuario='$username' , nombre='$nombre', password='$password', admin='$admin'";
		
		if (!$this->insertarConsulta($sql))
			return false;
		else 
		{
			return true;
		}
	}

	
	public function search_user($username){
		$sql = sprintf("SELECT * FROM usuarios WHERE nombreUsuario = '$username'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUusuario($result['nombreUsuario'],$result['nombre'],$result['password'],$result['admin']);
			return $user;
		}
	}

	public function search_admin($username){
		
		$sql = sprintf("SELECT admin FROM usuarios WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else{
			
			return true;
		}
	}


}

?>