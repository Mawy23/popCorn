<?php

namespace popcorn\Aplication\Form;

use laestanteria\Aplication\UsuarioLogin;

/**
 * FormLogin Class
 */
class FormLogin extends Form
{
    public function __construct()
    {
        parent::__construct('form-login');
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : '';

        $error['nombreUsuario'] = isset($errores['nombreUsuario']) ? $errores['nombreUsuario'] : '';
        $error['login'] = isset($errores['login']) ? $errores['login'] : '';

        $html = <<<EOF
        <fieldset>
            <legend>Usuario y Contraseña</legend>
            <div class="grupo-control">
                <label>Nombre de usuario:</label><input type="text" name="nombreUsuario" id="nombreUsuario" value="$nombreUsuario">
                ${error['nombreUsuario']}
            </div>
            <div class="grupo-control">   
               <label>Contraseña:</label> <input type="password" name="password" id="password" >
                ${error['login']}
            </div>
            <div class="grupo-control">
              <button type="submit" name="login">Entrar</button>
            </div>
        </fieldset>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $result = array();
        $user = array();

        $user['nombreUsuario'] = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;

        if (empty($user['nombreUsuario'])) {
            $result['nombreUsuario'] = '<span>El nombre del usuario no puede estar vacío</span>';
        }

        if (count($result) === 0) {
            $usuario = UsuarioLogin::login($user['nombreUsuario'], $datos['password']);

            if ($usuario !== false) {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $user['nombreUsuario'];
                $_SESSION['esAdmin'] = strcmp($usuario['rol'], 'admin') == 0 ? true : false;
                $result = 'index.php';
            } else {
                $result['login'] = '<span>Nombre de usuario o contraseña incorrectos</span>';
            }
        }

        return $result;
    }
}
