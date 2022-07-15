<?php



include_once 'RepositorioUsuario.inc.php';



class ValidadorRegistro{


	private $aviso_inicio;
	private $aviso_cierre;


	private $nombre;
	private $apellido;
	private $email;
	private $clave;

	private $fecha_nacimiento;
	private $pais;
	private $telefono;
	private $dieta;

	private $objetivo;
	private $altura;
	private $peso;
	private $lugar_entreno;

	private $restricciones;
	private $plan;




	private $error_nombre;
	private $error_apellido;
	private $error_email;	
	private $error_clave1;
	private $error_clave2;


	private $error_fecha_nacimiento;
	private $error_pais;
	private $error_telefono;
	private $error_dieta;

	private $error_objetivo;
	private $error_altura;
	private $error_peso;
	private $error_lugar_entreno;

	private $error_restricciones;
	private $error_plan;



	public function __construct($nombre,$email,$conexion){

		$this -> aviso_inicio = "<span class='alert alert-danger'>";
		$this -> aviso_cierre = "</span>";

		$this -> nombre = "";
		$this -> email = "";



		$this -> error_nombre = $this -> validar_nombre($conexion, $nombre);
		$this -> error_email = $this -> validar_email($conexion, $email);
	}


	private function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;
		}
		else{
			return false;
		}
	}


	private function validar_nombre($conexion, $nombre){
		if(!$this -> variable_iniciada($nombre)){
			return "Este campo no puede estar vacio.";
		}
		else {
			$this -> nombre = $nombre;
		}
		if (!empty($nombre) && strlen($nombre) < 1) {
			return "Escribe el nombre.";
		}

		if (strlen($nombre) > 40) {
			return "El nombre no puede ser tan largo.";
		}
		return "";
	}




	private function validar_email($conexion, $email){
		if(!$this -> variable_iniciada($email)){
			return "Este campo no puede estar vacio.";
		}
		else {
			$this -> email = $email;
		}
		if (RepositorioUsuario :: email_existe($conexion, $email)) {
			return "El email ya está en uso, prueba con otro.";
		}
		return "";
	}







	public function obtener_nombre(){return $this -> nombre;}
	public function obtener_email(){return $this -> email;}




	public function obtener_error_nombre(){return $this -> error_nombre;}
	public function obtener_error_email(){return $this -> error_email;}
	

	public function mostrar_nombre(){
		if ($this -> nombre !== "") {
			echo 'value="'. $this -> nombre . '"';
		}
	}
	public function mostrar_error_nombre(){
		if ($this -> error_nombre !== "") {
			echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
		}
	}

	public function mostrar_email(){
		if ($this -> email !== "") {
			echo 'value="'. $this -> email . '"';
		}
	}
	public function mostrar_error_email(){
		if ($this -> error_email !== "") {
			echo $this -> aviso_inicio . $this -> error_email . $this -> aviso_cierre;
		}
	}



	

	public function registro_valido(){

		if ($this -> error_nombre === "" &&
			$this -> error_email === "") {
			return true;
	}
		else{
			return false;
		}
	}
}