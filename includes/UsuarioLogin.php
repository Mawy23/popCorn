<?php
namespace laestanteria\Aplication;
use laestanteria\Aplication\Dao\UsuarioLoginDAO;

class UsuarioLogin{

	/*Devuelve un objeto
	Usuario con la información del usuario $nombreUsuario, o false si no lo encuentra.*/

	public static function buscaUsuario($nombreUsuario){
		$user = new UsuarioLoginDAO();
		return $user->buscaUsuarioDAO($nombreUsuario);
	}	

	

	/*Usando las
	funciones anteriores, devuelve un objeto Usuario si el usuario existe y coincide su
	contraseña. En caso contrario, devuelve false.*/

	public static function login($nombreUsuario, $password){
		$userDAO = new UsuarioLoginDAO();
		$usuario = $userDAO->buscaUsuarioDAO($nombreUsuario);

		if(!empty($usuario) && self::compruebaPassword($password, $usuario['password'])){
			return $usuario;
		}

		return false;
	}

	/*Comprueba si la contraseña
	introducida coincide con la del Usuario.*/
	public function compruebaPassword($password, $password2){
		if(password_verify($password,$password2)){
		    return true;
        }
		return false;
	}


}