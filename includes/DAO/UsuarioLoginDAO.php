<?php
namespace laestanteria\Aplication\Dao;
use laestanteria\Aplication\Aplication;

class UsuarioLoginDAO{

	public function buscaUsuarioDAO($nombre_usuario){
		$app = Aplication::getSingleton();
		$conn = $app->conexionBD();
		$query = $conn->prepare("SELECT * FROM usuarios U WHERE U.nombreUsuario = ?");


		$query->bind_param("s",$nombre_usuario);
		if(!$query->execute()){
			echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
			exit();	
		}

		$rs = $query->get_result();
		$result = false;

		if ($rs->num_rows==1) {
			$row = $rs->fetch_assoc();
			$result = $row;
		}
		
		
		$query->close();
		return $result;
	}
}