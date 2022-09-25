<?php



abstract class ValidadorTienda {

	protected $aviso_inicio;
	protected $aviso_cierre;

	protected $titulo;
	protected $url;
	protected $imagen;
	protected $url_externa;
	protected $precio;
	protected $texto;
	protected $etiqueta;

	protected $error_titulo;
	protected $error_url;
	protected $error_imagen;
	protected $error_url_externa;
	protected $error_precio;
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
			return "Escribe el nombre del producto";
		}
		else{
			$this -> titulo = $titulo;
		}
		if (strlen($titulo) >255) {
			return "El nombre del producto no puede tener más de 255 caracteres";
		}
		if (RepositorioEntradaTienda :: titulo_existe($conexion, $titulo)) {
			return "Ya existe este producto en stock, escoge un nombre diferente";
		}
	}

	protected function validar_url($conexion, $url){
		if (!$this -> variable_iniciada($url)) {
			return "Inserta el código de referencia del producto";
		}
		else{
			$this -> url = $url;
		}


		$url_tratada = str_replace(' ', '-', $url);
		$url_tratada = preg_replace('/\s+/', '', $url_tratada);


		if (strlen($url) != strlen($url_tratada)) {
			$this -> url = $url_tratada;
		}
		if (RepositorioEntradaTienda :: url_existe($conexion, $url)) {
			return "Ya existe este producto en stock, escribe una referencia diferente";
		}
	}

	protected function validar_imagen($conexion, $imagen){
		if (!$this -> variable_iniciada($imagen)) {
			return "Falta que selecciones una imagen del producto";
		}
		else{
			$this -> imagen = $imagen;
		}
	}


	protected function validar_url_externa($conexion, $url_externa){//cantidad
		$this -> url_externa = $url_externa;
	}

	protected function validar_precio($conexion, $precio){
		if (!$this -> variable_iniciada($precio)) {
			return "Debes agregar el precio del producto";
		}
		else{
			$this -> precio = $precio;
		}
	}


	protected function validar_texto($conexion, $texto){
		$texto_tratado = str_replace('"', "'", $texto);
		htmlspecialchars($texto_tratado);
		$this -> texto = $texto_tratado;
	}

	protected function validar_etiqueta($conexion, $etiqueta){		
		if(!$this -> variable_iniciada($etiqueta)){
			return "Debes asignarle una categoría al producto";
		}
		else {
			$this -> etiqueta = $etiqueta;
		}
		if (!empty($etiqueta) && strlen($etiqueta) < 1) {
			return "Debes asignarle una categoría al producto";
		}
		return "";
	}


	public function obtener_titulo(){return $this -> titulo;}
	public function obtener_url(){return $this -> url;}
	public function obtener_imagen(){return $this -> imagen;}
	public function obtener_url_externa(){return $this -> url_externa;}
	public function obtener_precio(){return $this -> precio;}
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

	public function mostrar_precio(){
		if ($this -> precio != "") {
			echo 'value = "' . $this -> precio . '"';
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
	public function mostrar_etiqueta_seleccionado(){
		if ($this -> etiqueta !== "") {
			echo $this -> etiqueta;
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

	public function mostrar_error_precio(){
		if ($this -> error_precio != "") {
			echo $this -> aviso_inicio . $this -> error_precio . $this -> aviso_cierre;
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
		if ($this -> error_titulo == "" && $this -> error_url == "" && $this -> error_imagen == "" && $this -> error_url_externa == "" && $this -> error_precio == "" && $this -> error_texto == "" && $this -> error_etiqueta == "") {
			return true;
		}
		else {
			return false;
		}
	}
}