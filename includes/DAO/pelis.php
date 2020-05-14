<?php

/* Transfer Object */
class TOUpeli {

  private $nombre;
  private $productora;
  private $genero;
  
  function __construct($nombre = '', $productora = '', $genero = ''){
    $this->nombre = $nombre;
    $this->productora = $productora;
    $this->genero = $genero;
  }
	
	/* Set functions (DAO uses)  ################################################################# */
	
	public function create_pelicula($columna){
		$this->nombre = $columna['nombre'];
		$this->productora = $columna['productora'];
		$this->genero = $columna['genero'];
	}

	public function set_nombre($nombree){
		$this->nombre = $nombree;
	}

	public function set_productora($productoraa){
		$this->productora = $productoraa;
	}

	public function set_genero($generoo){
		$this->genero = $generoo;
	}

	/* Get functions ################################################################# */

  public function get_peli(){
    $columna = [                                                                                                                                                                                                                                                              
      "nombre" => $this->nombre,
      "productora" => $this->productora,
      "genero" => $this->genero
    ];

    return $columna;
  }
  
  public function get_nombre(){
    return $this->nombre;
  }
	
	public function get_productora(){
		return $this->productora;
	}

	public function get_genero(){
		return $this->genero;
	}
}
?>