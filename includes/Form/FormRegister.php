<?php

namespace popcorn\Aplication\Form;

use popcorn\Aplication\UsuarioRegistro;

/**
 * FormRegister Class
 */
class FormRegister extends Form
{
    public function __construct() {
        parent::__construct('form-register');
    }

    protected function generaCamposFormulario()
    {
        
        $html = <<<EOF
        <fieldset>
            <div class="grupo-control">
                <label>Nombre completo:</label> <input type="text" name="nombre" id="nombre"  >
            </div>
            <div class="grupo-control">
                <label>Nombre de usuario:</label><input type="text" name="nombreUsuario" id="nombreUsuario"  >
             </div>
            <div class="grupo-control">
                <label>Contraseña:</label><input type="password" name="password" id="password" >
             </div>
            <div class="grupo-control">
                 <label>Vuelve a introducir la contraseña:</label><input type='password' name="repassword" id="repassword">
            </div>
            <div class="grupo-control">
                <label>Admin:</label><input type="checkbox" name="admin" id="admin" >
             </div>
            <div>
                <div class="grupo-control"><button type="submit" name="registro">Registrar</button></div>
            </div>
        </fieldset>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $id_user = "";
        $username = htmlspecialchars(trim(strip_tags($datos['nombreUsuario']))); 
        $nombre = htmlspecialchars(trim(strip_tags($datos['nombre']))); 
        $password = htmlspecialchars(trim(strip_tags($datos['password']))); 
        $password2 = htmlspecialchars(trim(strip_tags($datos['repassword']))); 
        $rol = $datos['admin']; 
        $_SESSION['error_registro'] = [];
        
        if ($password != $password2) {  
            $_SESSION['error_registro'][] = "Las contraseñas introducidas no coinciden";
        }
        if (empty($username) ) {    
            $_SESSION['error_registro'][] = "El usuario no puede estar vacío";
        }
        if ( empty($password) || empty($password2)) {
            $_SESSION['error_registro'][] = "La contraseñas no puede estar vacía";
        }  
        $encrypted = password_hash($password,PASSWORD_BCRYPT); 
        if (count($_SESSION['error_registro']) == 0)  {
            if(isset($rol)){
                $admin = 1;
            }
            UsuarioRegistro::crea($username, $nombre, $password, $admin);
            $_SESSION['login'] = true;                
            $_SESSION['nombre'] = $username;
            if($admin == 1){
                $_SESSION['admin']= '1';
            }else{
                $_SESSION['admin']= '0';
            }
            
            return "index.php";        
        }
        else {  
            return "registro.php";
        }
    }
}