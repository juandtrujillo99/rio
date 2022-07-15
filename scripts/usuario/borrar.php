<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';


if (isset($_POST['borrar_usuario'])) {
	$id_usuario = $_POST['id_borrar'];

	Conexion :: abrir_conexion();
	RepositorioUsuario :: eliminar_usuario(Conexion :: obtener_conexion(), $id_usuario);
	Conexion :: cerrar_conexion();
	Redireccion :: redirigir(RUTA_GESTOR_USUARIOS);
}