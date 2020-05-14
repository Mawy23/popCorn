<?php
namespace popcorn\Aplication\Dao;

use popcorn\Aplication\Aplication;

class UsuarioRegistroDAO{

    public function inserta($nombreUsuario, $nombre, $password, $rol){
        $app = Aplication::getSingleton();
        $conn = $app->conexionBD();
        $query = $conn->prepare("INSERT INTO usuarios (nombreUsuario, nombre, password, rol) VALUES (?,?,?,?)");
        $hashpass = password_hash($password, PASSWORD_DEFAULT);
        $query->bind_param("ssss",
            $nombreUsuario,
            $nombre,
            $hashpass,
            $rol);

        if(!$query->execute()){
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        else
            return false;
    }

	
}