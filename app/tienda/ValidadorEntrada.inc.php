<?php
include_once 'RepositorioEntrada.inc.php';
include_once 'Validador.inc.php';

class ValidadorEntradaTienda extends ValidadorTienda {
	
	public function __construct($titulo, $url, $imagen, $url_externa, $precio, $texto, $etiqueta, $conexion) {
		$this -> aviso_inicio = "<div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre = "</div>";
		
		$this -> titulo = "";
		$this -> url = "";
		$this -> imagen = "";
		$this -> url_externa = "";
		$this -> precio = "";
		$this -> texto = "";
		$this -> etiqueta = "";
		
		$this -> error_titulo = $this -> validar_titulo($conexion, $titulo);
		$this -> error_url = $this -> validar_url($conexion, $url);
		$this -> error_imagen = $this -> validar_imagen($conexion, $imagen);
		$this -> error_url_externa = $this -> validar_url_externa($conexion, $url_externa);
		$this -> error_precio = $this -> validar_precio($conexion, $precio);
		$this -> error_texto = $this -> validar_texto($conexion, $texto);
		$this -> error_etiqueta = $this -> validar_etiqueta($conexion, $etiqueta);
	}
}