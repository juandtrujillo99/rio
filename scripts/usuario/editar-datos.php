<?php


include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/usuario/ControlSesion.inc.php';
include_once 'app/usuario/Usuario.inc.php';
include_once 'app/usuario/editar-datos/EdicionDatos.inc.php';
include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/editar-datos/RepositorioEdicionDatos.inc.php';
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
if(!ControlSesion :: sesion_iniciada()) {
	Redireccion :: redirigir(SERVIDOR);
}
else {
	Conexion::abrir_conexion();
	$id = $_SESSION['id_usuario'];
	$usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);


	$nombre_usuario = $usuario -> obtener_nombre();
	$string_aleatorio = sa(10);


	$url_secreta = hash('sha256', $string_aleatorio . $nombre_usuario);
	$peticion_generada = RepositorioEdicionDatos :: generar_peticion(Conexion :: obtener_conexion(), $usuario -> obtener_id(), $url_secreta);


	Conexion :: cerrar_conexion();



	if ($peticion_generada) {
		Redireccion :: redirigir(RUTA_EDITAR_DATOS_USUARIO."/".$url_secreta);
	}

}