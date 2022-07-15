<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/usuario/Usuario.inc.php';
include_once 'app/usuario/RecuperacionClave.inc.php';
include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/RepositorioRecuperacionClave.inc.php';

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
/*Usuario recuperacion*/
if (isset($_POST['enviar_email'])) {
	$email = $_POST['email'];

	Conexion::abrir_conexion();

	if (!RepositorioUsuario :: email_existe(Conexion :: obtener_conexion(), $email)) { //Si el email no esta registrado en la base de datos, lo manda a login
		Redireccion :: redirigir(RUTA_RECUPERAR_CLAVE);
	}

	$usuario = RepositorioUsuario :: obtener_usuario_por_email(Conexion :: obtener_conexion(), $email);

	$nombre_usuario = $usuario -> obtener_nombre();
	$string_aleatorio = sa(10);

	$url_secreta = hash('sha256', $string_aleatorio . $nombre_usuario);

	$peticion_generada = RepositorioRecuperacionClave :: generar_peticion(Conexion :: obtener_conexion(), $usuario -> obtener_id(), $url_secreta);

	Conexion :: cerrar_conexion();

	if ($peticion_generada) {		
		include_once 'scripts/enviar-mail.php';
		Redireccion :: redirigir(RUTA_EMAIL_RECUPERACION_CLAVE);
	}
}
