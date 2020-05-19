<?php

/* Transfer Object */
class TOUpeli {

  private $nombre;
  private $productora;
	private $genero;
	private $edades;
	private $link;
  
  function __construct($nombre = '', $productora = '', $genero = '', $edades = '', $link = ''){
    $this->nombre = $nombre;
    $this->productora = $productora;
		$this->genero = $genero;
		$this->edades = $edades;
		$this->link = $link;
  }
	
	/* Set functions (DAO uses)  ################################################################# */
	
	public function create_pelicula($columna){
		$this->nombre = $columna['nombre'];
		$this->productora = $columna['productora'];
		$this->genero = $columna['genero'];
		$this->edades = $columna['edades'];
		$this->link = $columna['link'];
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

	public function set_edades($edades){
		$this->edades = $edades;
	}

	public function set_link($link){
		$this->link = $link;
	}

	/* Get functions ################################################################# */

  public function get_peli(){
    $columna = [                                                                                                                                                                                                                                                              
      "nombre" => $this->nombre,
      "productora" => $this->productora,
			"genero" => $this->genero,
			"eades" => $this->edades, 
			"link" => $this->link
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

	public function get_edades(){
		return $this->edades;
	}

	public function get_link(){
		return $this->link;
	}
}
?>