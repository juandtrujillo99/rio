<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/blog/RepositorioEntrada.inc.php';
include_once 'app/Redireccion.inc.php';


if (isset($_POST['borrar_entrada'])) {
	$id_entrada = $_POST['id_borrar'];

	Conexion :: abrir_conexion();
	RepositorioEntradaBlog :: eliminar_comentarios_y_entrada(Conexion :: obtener_conexion(), $id_entrada);
	Conexion :: cerrar_conexion();
	Redireccion :: redirigir(RUTA_GESTOR_ENTRADAS_BLOG);
}