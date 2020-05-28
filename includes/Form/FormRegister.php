<!DOCTYPE html>
<html>

    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery_login.js"></script>
   
    </head>

</html>
<?php

include_once('Form.php');
require_once('includes\DAO\usuario.php');
require_once('includes\DAO\usuarioDAO.php');

    class FormRegistro extends Form{
        
        public function __construct(){
            parent::__construct('register');
        }
        
        protected function generaCampos(){
            
            $html =             
            '<fieldset  class="fb-col contenido_log_reg" id ="contenido_reg">
                <h1>ÚNETE A NOSOTROS</h1>
                
                <div>
                    <input name="username" type="text" id="username" placeholder="Nombre de usuario" required="" />
                    <span class="error_form" id="uname_error_message"></span>
                </div>        
                <br>
                <div>
                    <input name="nombre" type="text" id="nombre" placeholder="Nombre propio" required=""/>
                    <span class="error_form" id="sname_error_message"></span>
                </div>
                <br>
                <div>
                    <input name="password" type="password" id="password" placeholder="Contraseña" required=""/>
                    <span class="error_form" id="password_error_message"></span>
                </div>
                <br>
                <div>
                    <input  name="password2" type="password" id="password2" placeholder="Reintroducir contraseña" required=""/>
                    <span class="error_form" id="password2_error_message"></span>
                </div>
                <br>
                <div>
                    <input  name="admin" type="checkbox" id="admin" />
                    <span class="error_form" id="admin_error_message">Admin</span>
                </div>
                <br>
                <div>
                    <button type="submit" name="register" id="register" >REGISTRARSE</button>
                </div>                
            
            </fieldset>';
            
            return $html;
        }
        
        protected function procesaFormulario($datos){
            if(!isset($_SESSION)) { 
                session_start(); 
            }             
            $id_user = "";
            $username = htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
            $nombre= htmlspecialchars(trim(strip_tags($_REQUEST["nombre"])));           
            $password = $_REQUEST["password"];
            $password2 = $_REQUEST["password2"];
            $admin = 0;
            $_SESSION['error_registro'] = [];
               
            
            
            if ($password != $password2) {  //Se comparan las contraseñas son iguales, si no, error
                $_SESSION['error_registro'][] = "Las contraseñas introducidas no coinciden";

            }
            

            if (empty($username) ) {    //Si el campo de usuario está vacío, error
                $_SESSION['error_registro'][] = "El usuario no puede estar vacío";

            }

            if ( empty($password) || empty($password2)) {//Si el campo de contraseña está vacío, error
                $_SESSION['error_registro'][] = "La contraseñas no puede estar vacía";

            }

            if(isset($_POST['admin'])){
                $admin = 1;
            }

            $dao_usuario = new usuarioDAO();

            if ($dao_usuario->search_user($username)) { //Verificar si el usuario ya está en la BBDD
                $_SESSION['error_registro'][] = "El usuario insertado ya existe";

            }           
            
            
            $encrypted = password_hash($password,PASSWORD_BCRYPT); //Creación del hash de la contraseña para su subida
            $user = new TOUusuario( $username, $nombre, $encrypted, $admin);


            if (count($_SESSION['error_registro']) == 0)  {
                if ($dao_usuario->insert_User($user)) { //Si la creación del usuario es exitosa se realiza el login
                    $_SESSION['login'] = '1';
                    $_SESSION['username'] = $username;
                    $res = $user->get_admin();
                    if($res == '1'){
                        $_SESSION['admin']= '1';
                    }else{
                        $_SESSION['admin']= '0';
                    }
                    
                    return "index.php";
                }

                else {  //En caso contrario, error
                    $_SESSION['error_registro'][] = "El registro no ha tenido éxito";
                    
                    return "registro.php";
                }
            }

            else {  //En caso contrario vuelta a registro.php con los errores
                return "registro.php";
            }

        }

}
    ?>
