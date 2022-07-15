<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/empleado/Empleado.inc.php';
include_once 'app/empleado/RecuperacionClave.inc.php';
include_once 'app/empleado/RepositorioEmpleado.inc.php';
include_once 'app/empleado/RepositorioRecuperacionClave.inc.php';

include_once 'app/Redireccion.inc.php';


function sa($longitud){
	$caracteres = '0123456789abcdefghijklmnopqrstcvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$numero_caracteres = strlen($caracteres);
	$string_aleatorio = '';

	for ($i = 0; $i < $longitud; $i++) { 
		$string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
	}
	return $string_aleatorio;

}
/*Empleado recuperacion*/
if (isset($_POST['enviar_email'])) {
	$email = $_POST['email'];

	Conexion::abrir_conexion();

	if (!RepositorioEmpleado :: email_existe(Conexion :: obtener_conexion(), $email)) {
		return;
	}

	$empleado = RepositorioEmpleado :: obtener_empleado_por_email(Conexion :: obtener_conexion(), $email);

	$nombre_empleado = $empleado -> obtener_nombre();
	$string_aleatorio = sa(10);

	$url_secreta = hash('sha256', $string_aleatorio . $nombre_empleado);

	$peticion_generada = RepositorioRecuperacionClaveEmpleado :: generar_peticion(Conexion :: obtener_conexion(), $empleado -> obtener_id(), $url_secreta);

	Conexion :: cerrar_conexion();

	if ($peticion_generada) {
		Redireccion :: redirigir(SERVIDOR);
	}

}