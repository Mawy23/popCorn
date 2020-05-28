<?php

include_once('Form.php');
require_once('includes\DAO\usuario.php');
require_once('includes\DAO\usuarioDAO.php');

class FormLogin extends Form {

	public function __construct(){
		parent::__construct('login');
	}

	protected function generaCampos(){
		 $html  =
		'<fieldset>
			<h1>PopCorn&Chill</h1>
			<div>
			<input name="username" type="text" id="username" placeholder="Nombre de usuario" required="">
            </div>
            <br>
			<div>
			<input name="password" type="password" id="password" placeholder="Contraseña" required="">
			</div>
			<br>    
			<div>
			<button type="submit"  name="login id="submit">ENTRAR</button>
			</div>
		 </fieldset>';
        return $html;
	}

	protected function procesaFormulario($datos){

	    if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    } 
	    
	    $_SESSION['error_login'] = [];
	    $username = isset($datos['username']) ? $datos['username'] : null;
	    $password = isset($datos['password']) ? $datos['password'] : null;
	    $user = new TOUusuario();
	    $dao_usuario = new usuarioDAO();

	    if (empty($username) ) {
	        $_SESSION['error_login'][] = "El nombre de usuario no puede estar vacío";
	    }

	    if (empty($password) ) {
	        $_SESSION['error_login'][] = "El password no puede estar vacío.";
	    }
        $userData = $dao_usuario->search_user($username);       
        
        if($userData->get_admin() == '1'){
            $_SESSION['admin'] = '1';
        }else{
            $_SESSION['admin'] = '0';
        }

	    if (count($_SESSION['error_login']) == 0)  {

	        if ($userData == null) {
	            $_SESSION['error_login'][] = "Usuario y/o contraseña no son correctos.";
	            return "login.php";
	        }
	        else {		


	            $encrypted = $userData->get_password();
	            if (password_verify($password, $encrypted)) {
                    $_SESSION['login'] = '1';
                    
                
                    
	                $_SESSION['username'] = $username;
	                return "index.php";
	            }
	            else {
	                $_SESSION['error_login'][] = "Usuario y/o contraseña no son correctos";
	                return "login.php";
	            }
	        } 
	    }

	    else {
	       return "login.php";
	    }
       
	}
}

?>
