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

    protected function generaCamposFormulario($datos, $errores)
    {
        $name = isset($datos['nombre']) ? $datos['nombre'] : '';
        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : '';

        $error['nombre'] = isset($errores['nombre']) ? $errores['nombre'] : '';
        $error['nombreUsuario'] = isset($errores['nombreUsuario']) ? $errores['nombreUsuario'] : '';
        $error['password'] = isset($errores['password']) ? $errores['password'] : '';
        $error['repassword'] = isset($errores['repassword']) ? $errores['repassword'] : '';

        $html = <<<EOF
        <fieldset>
            <div class="grupo-control">
                <label>Nombre completo:</label> <input type="text" name="nombre" id="nombre"  value="$name">
                ${error['nombre']}
            </div>
            <div class="grupo-control">
                <label>Nombre de usuario:</label><input type="text" name="nombreUsuario" id="nombreUsuario"  value="$nombreUsuario">
                ${error['nombreUsuario']}
             </div>
            <div class="grupo-control">
                <label>Contraseña:</label><input type="password" name="password" id="password" >
                ${error['password']}
             </div>
            <div class="grupo-control">
                 <label>Vuelve a introducir la contraseña:</label><input type='password' name="repassword" id="repassword">
                ${error['repassword']}
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
        $result = array();
        $user = array();

        $user['nombre'] = isset($datos['nombre']) ? $datos['nombre'] : null;

        if ( empty($user['nombre']) || mb_strlen($user['nombre']) < 5 ) {
            $result['nombre'] = '<span>El nombre tiene que tener una longitud de al menos 5 caracteres.</span>';
        }


        $user['password'] = isset($datos['password']) ? $datos['password'] : null;

        if ( strlen($user['password']) < 3 ) {
            $result['password'] = '<span>El longitud de la contraseña debe ser de 3 o más caracteres.</span>';
        }

        $user['repassword'] = isset($datos['repassword']) ? $datos['repassword'] : null;

        if ( strcmp($user['repassword'], $user['password']) !== 0 ) {
            $result['repassword'] = '<span>Las contraseñas deben coincidir.</span>';
        }


        $user['nombreUsuario'] = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;

        if ( empty($user['nombreUsuario']) || mb_strlen($user['nombreUsuario']) < 5) {
            $result['nombreUsuario'] = '<span>El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.</span>';
        }

        if (count($result) === 0) {
            $rol = "user";
            UsuarioRegistro::crea($user['nombreUsuario'],$user['nombre'],$user['password'], $rol);
            $_SESSION['login'] = true;
            $_SESSION['nombre'] = $user['nombreUsuario'];
            if($rol=== "admin")
                $_SESSION['admin'] =false;
            else
                $_SESSION['admin'] =true;
            $result = 'index.php';
        }

        return $result;
    }
}