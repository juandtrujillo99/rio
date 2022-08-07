<?php



class RecuperacionClave{


	private $id;
	private $admin_id;
	private $url_secreta;
	private $fecha;


	public function __construct($id, $admin_id, $url_secreta, $fecha){

		$this -> id = $id;
		$this -> admin_id = $admin_id;
		$this -> url_secreta = $url_secreta;
		$this -> fecha = $fecha;
	}
}