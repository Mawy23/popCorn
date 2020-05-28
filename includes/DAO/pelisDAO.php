<?php

include_once('DAOF.php');
include_once('pelis.php');

/* Data Access Object */
class DAOPelis extends DAO {
	
	public function __construct(){
		parent::__construct();
	}
	

	public function insert_Peli($peli){
    
    $nombre = $peli->get_nombre();
    $productora = $peli->get_productora();
		$genero = $peli->get_genero();
		$edades = $peli->get_edades();
		$link = $peli->get_link();
		$sql = "INSERT INTO peliculas SET nombre='$nombre' , productora ='$productora', genero='$genero', edades='$edades', link='$link'";
		
		if (!$this->insertarConsulta($sql))
			return false;
		else 
		{
			return true;
		}
  }
  
  public function showalldata(){
    $sql = sprintf("SELECT * FROM peliculas");
    $query = $this->devolverConsulta($sql);
    $array = [];
    while($result = mysqli_fetch_assoc($query)){
      
        $peli = new TOUpeli($result['nombre'], $result['productora'], $result['genero'], $result['edades'], $result['link']);
        array_push($array, $peli);
    }
     
    return $array;
  }

	
	public function search_Peli($nombre){
		$sql = sprintf("SELECT * FROM peliculas WHERE nombre = $nombre");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUpeli($result['nombre'],$result['productora'],$result['genero'], $result['edades'], $result['link']);
			return $user;
		}
	}

}

?>