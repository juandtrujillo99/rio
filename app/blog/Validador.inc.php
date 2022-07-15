<?php



abstract class ValidadorBlog {

	protected $aviso_inicio;
	protected $aviso_cierre;

	protected $titulo;
	protected $url;
	protected $imagen;
	protected $url_externa;
	protected $texto;
	protected $etiqueta;

	protected $error_titulo;
	protected $error_url;
	protected $error_imagen;
	protected $error_url_externa;
	protected $error_texto;
	protected $error_etiqueta;



	function __construct(){

	}


	protected function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;
		}
		else{
			return false;
		}
	}



	protected function validar_titulo($conexion, $titulo){
		if (!$this -> variable_iniciada($titulo)) {
			return "Escribe un titulo";
		}
		else{
			$this -> titulo = $titulo;
		}
		if (strlen($titulo) >255) {
			return "El titulo no puede ocupar más de 255 caracteres";
		}
		if (RepositorioEntradaBlog :: titulo_existe($conexion, $titulo)) {
			return "Ya existe una entrada con ese titulo, escoge uno diferente";
		}
	}

	protected function validar_url($conexion, $url){
		if (!$this -> variable_iniciada($url)) {
			return "Inserta la url con la que quieres que aparezca tu entrada";
		}
		else{
			$this -> url = $url;
		}


		$url_tratada = str_replace(' ', '-', $url);
		$url_tratada = preg_replace('/\s+/', '', $url_tratada);


		if (strlen($url) != strlen($url_tratada)) {
			$this -> url = $url_tratada;
		}
		if (RepositorioEntradaBlog :: url_existe($conexion, $url)) {
			return "Esa URL ya fue elegida, escoge otra";
		}
	}

	protected function validar_imagen($conexion, $imagen){
		if (!$this -> variable_iniciada($imagen)) {
			return "Este espacio no puede estar vacío";
		}
		else{
			$this -> imagen = $imagen;
		}
	}




	protected function validar_url_externa($conexion, $url_externa){
		/*
		if (!$this -> variable_iniciada($url_externa)) {
			return "Inserta la url del video correctamente";
		}
		else{
			$this -> url_externa = $url_externa;
		}
		*/

		$url_externa_tratada = str_replace('"', "'", $url_externa);		

		htmlspecialchars($url_externa_tratada);
		$this -> url_externa = $url_externa_tratada;
	}


	protected function validar_texto($conexion, $texto){
		if (!$this -> variable_iniciada($texto)) {
			return "Este cuadro no puede estar vacío";
		}
		else{

			$texto_tratado = str_replace('"', "'", $texto);
			htmlspecialchars($texto_tratado);
			$this -> texto = $texto_tratado;
		}
	}

	protected function validar_etiqueta($conexion, $etiqueta){
		if (!$this -> variable_iniciada($etiqueta)) {
			return "Este cuadro no puede estar vacío";
		}
		else{
			$this -> etiqueta = $etiqueta;
		}
	}


	public function obtener_titulo(){return $this -> titulo;}
	public function obtener_url(){return $this -> url;}
	public function obtener_imagen(){return $this -> imagen;}
	public function obtener_url_externa(){return $this -> url_externa;}
	public function obtener_texto(){return $this -> texto;}
	public function obtener_etiqueta(){return $this -> etiqueta;}
	

	public function mostrar_titulo(){
		if ($this -> titulo != "") {
			echo 'value = "' . $this -> titulo . '"';
		}
	}

	public function mostrar_url(){
		if ($this -> url != "") {
			echo 'value = "' . $this -> url . '"';
		}
	}

	public function mostrar_imagen(){
		if ($this -> imagen != "") {
			echo 'value = "' . $this -> imagen . '"';
		}
	}

	public function mostrar_url_externa(){
		if ($this -> url_externa != "") {
			echo 'value = "' . $this -> url_externa . '"';
		}
	}

	public function mostrar_texto(){
		if ($this -> texto != "" && strlen(trim($this -> texto)) > 0) {
			echo $this -> texto;
		}
	}


	public function mostrar_etiqueta(){
		if ($this -> etiqueta != "") {
			echo 'value = "' . $this -> etiqueta . '"';
		}
	}



	public function mostrar_error_titulo(){
		if ($this -> error_titulo != "") {
			echo $this -> aviso_inicio . $this -> error_titulo . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_url(){
		if ($this -> error_url != "") {
			echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_imagen(){
		if ($this -> error_imagen != "") {
			echo $this -> aviso_inicio . $this -> error_imagen . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_url_externa(){
		if ($this -> error_url_externa != "") {
			echo $this -> aviso_inicio . $this -> error_url_externa . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_texto(){
		if ($this -> error_texto != "") {
			echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_etiqueta(){
		if ($this -> error_etiqueta != "") {
			echo $this -> aviso_inicio . $this -> error_etiqueta . $this -> aviso_cierre;
		}
	}

	public function entrada_valida(){
		if ($this -> error_titulo == "" && $this -> error_url == "" && $this -> error_imagen == "" && $this -> error_url_externa == "" && $this -> error_texto == "" && $this -> error_etiqueta == "") {
			return true;
		}
		else {
			return false;
		}
	}
}