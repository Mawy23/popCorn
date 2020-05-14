<?php

include_once('DAOF.php');
include_once('pelis.php');

/* Data Access Object */
class DAOPelis extends DAO {
	
	public function __construct(){
		parent::__construct();
	}
	

	public function insert_Peli($TOUpeli){
    
    $nombre = $TOUpeli->get_nombre();
    $productora = $TOUpeli->get_productora();
    $genero = $TOUpeli->get_genero();
		$sql = "INSERT INTO peliculas SET nombre='$nombre' , productora ='$productora', genero='$genero'";
		
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
      
        $peli = new TOUpeli($result['nombre'], $result['productora'], $result['genero']);
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
			$user = new TOUpeli($result['nombre'],$result['productora'],$result['genero']);
			return $user;
		}
	}



	/*public function update_name($username, $new_name){
		$sql = sprintf("UPDATE user SET name = '" .$new_name. "' WHERE username = '" .$username. "' ");
		$result = $this->insertarConsulta($sql);
		if ($result == null)
			return null;
		else 
			return true;
	}*/


}

?>