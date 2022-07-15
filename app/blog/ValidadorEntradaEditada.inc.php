<?php
include_once 'RepositorioEntrada.inc.php';
include_once 'Validador.inc.php';

class ValidadorEntradaEditadaBlog extends ValidadorBlog {
	private $cambios_realizados;

	private $checkbox;

	private $titulo_original;
	private $url_original;
	private $imagen_original;
	private $url_externa_original;
	private $texto_original;
	private $etiqueta_original;
	private $checkbox_original;

	public function __construct($titulo, $titulo_original, $url, $url_original, $imagen, $imagen_original, $url_externa, $url_externa_original, $texto,
		$texto_original, $etiqueta, $etiqueta_original, $checkbox, $checkbox_original, $conexion) {

		$this -> titulo = $this -> devolver_variable_si_iniciada($titulo);
		$this -> url = $this -> devolver_variable_si_iniciada($url);
		$this -> imagen = $this -> devolver_variable_si_iniciada($imagen);
		$this -> url_externa = $this -> devolver_variable_si_iniciada($url_externa);
		$this -> texto = $this -> devolver_variable_si_iniciada($texto);
		$this -> etiqueta = $this -> devolver_variable_si_iniciada($etiqueta);
		$this -> checkbox = $this -> devolver_variable_si_iniciada($checkbox);

		$this -> titulo_original = $this -> devolver_variable_si_iniciada($titulo_original);
		$this -> url_original = $this -> devolver_variable_si_iniciada($url_original);
		$this -> imagen_original = $this -> devolver_variable_si_iniciada($imagen_original);
		$this -> url_externa_original = $this -> devolver_variable_si_iniciada($url_externa_original);
		$this -> texto_original = $this -> devolver_variable_si_iniciada($texto_original);
		$this -> etiqueta_original = $this -> devolver_variable_si_iniciada($etiqueta_original);
		$this -> checkbox_original = $this -> devolver_variable_si_iniciada($checkbox_original);

		if ($this -> titulo == $this -> titulo_original &&
			$this -> url == $this -> url_original &&
			$this -> imagen == $this -> imagen_original &&
			$this -> url_externa == $this -> url_externa_original &&
			$this -> texto == $this -> texto_original &&
			$this -> etiqueta == $this -> etiqueta_original &&
			$this -> checkbox == $this -> checkbox_original) {

			$this -> cambios_realizados = false;
		} else {
			$this -> cambios_realizados = true;
		}

		if ($this -> cambios_realizados) {
			//echo 'Hay cambios';

			$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
			$this -> aviso_cierre = "</div>";

			if ($this -> titulo !== $this -> titulo_original) {
				$this -> error_titulo = $this -> validar_titulo($conexion, $this -> titulo);
			} else {
				$this -> error_titulo = "";
			}

			if ($this -> url !== $this -> url_original) {
				$this -> error_url = $this -> validar_url($conexion, $this -> url);
			} else {
				$this -> error_url = "";
			}

			if ($this -> imagen !== $this -> imagen_original) {
				$this -> error_imagen = $this -> validar_imagen($conexion, $this -> imagen);
			} else {
				$this -> error_imagen = "";
			}

			if ($this -> url_externa !== $this -> url_externa_original) {
				$this -> error_url_externa = $this -> validar_url_externa($conexion, $this -> url_externa);
			} else {
				$this -> error_url_externa = "";
			}

			if ($this -> texto !== $this -> texto_original) {
				$this -> error_texto = $this -> validar_texto($conexion, $this -> texto);
			} else {
				$this -> error_texto = "";
			}


			if ($this -> etiqueta !== $this -> etiqueta_original) {
				$this -> error_etiqueta = $this -> validar_etiqueta($conexion, $this -> etiqueta);
			} else {
				$this -> error_etiqueta = "";
			}

		} else {
			echo 'No hay cambios';
			//redirigir
		}
	}

	private function devolver_variable_si_iniciada($variable) {
		if ($this -> variable_iniciada($variable)) {
			return $variable;
		} else {
			return "";
		}
	}

	public function hay_cambios() {
		return $this -> cambios_realizados;
	}

	public function obtener_titulo_original() {
		return $this -> titulo_original;
	}

	public function obtener_url_original() {
		return $this -> url_original;
	}

	public function obtener_imagen_original() {
		return $this -> imagen_original;
	}

	public function obtener_url_externa_original() {
		return $this -> url_externa_original;
	}

	public function obtener_texto_original() {
		return $this -> texto_original;
	}

	public function obtener_etiqueta_original() {
		return $this -> etiqueta_original;
	}

	public function obtener_checkbox_original() {
		return $this -> checkbox_original;
	}

	public function obtener_checkbox() {
		return $this -> checkbox;
	}
}