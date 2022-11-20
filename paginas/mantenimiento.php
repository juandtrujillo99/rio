<?php
header($_SERVER['SERVER_PROTOCOL'] . "404 Not Found", true, 404);

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
/*
include_once 'app/usuario/Usuario.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
*/
$titulo = "Estamos trabajando en ello";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>

<div class="container section center-align valign-wrapper" align="center">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<p class="textoBlack textoTitulo1">
				Mantenimiento
			</p>
			<br><br>
			<p class="textoBook textoParrafo">
				Estamos mejorando el sitio para que adquieras tus productos con mayor facilidad
			</p>
			<br><br>
			<a class="btn btn-secundario-animado" href="<?php echo $instagramEmpresa; ?>">Ver más</a>
		</div>
	</div>
</div>


<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
