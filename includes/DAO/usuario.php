<?php

/* Transfer Object */
class TOUusuario {

  private $username;
  private $nombre;
	private $password;
	private $admin;
	
  
  function __construct($username = '', $nombre = '', $password = '', $admin = '', $link = ''){
    $this->username = $username;
    $this->nombre = $nombre;
		$this->password = $password;
		$this->admin = $admin;
		$this->link = $link;
  }
	
	/* Set functions (DAO uses)  ################################################################# */
	
	public function create_usuario($columna){
		$this->username = $columna['username'];
		$this->nombre = $columna['nombre'];
		$this->password = $columna['password'];
		$this->admin = $columna['admin'];
	}

	public function set_username($usernamee){
		$this->username = $usernamee;
	}

	public function set_nombre($nombree){
		$this->nombre = $nombree;
	}

	public function set_password($password){
		$this->password = $password;
	}

	public function set_admin($admin){
		$this->admin = $admin;
	}


	/* Get functions ################################################################# */

  public function get_usuario(){
    $columna = [                                                                                                                                                                                                                                                              
      "username" => $this->username,
      "nombre" => $this->nombre,
			"password" => $this->password,
			"eades" => $this->admin
    ];

    return $columna;
  }
  
  public function get_username(){
    return $this->username;
  }
	
	public function get_nombre(){
		return $this->nombre;
	}

	public function get_password(){
		return $this->password;
	}

	public function get_admin(){
		return $this->admin;
	}
}
?>