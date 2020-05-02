<?php
namespace laestanteria\Aplication;
use laestanteria\Aplication\Dao\UsuarioRegistroDAO;


class UsuarioRegistro{

    /*Crea un nuevo usuario con los datos introducidos por parámetro.*/

    public static function crea($nombreUsuario, $nombre, $password, $rol){
        $registroDAO = new UsuarioRegistroDAO();
        return $registroDAO->inserta($nombreUsuario, $nombre, $password, $rol);
    }

}