<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';


$titulo = "Contraseña actualizada con exito";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>

<div class="container section center-align valign-wrapper" align="center">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<p class="textoBlack textoTitulo1">
				¡Listo!
			</p>
			<br>
			<p class="textoBookBold textoParrafo">
				<?php echo $titulo; ?>
			</p>
			<br><br>
			<a class="btn btn-secundario-animado" href="<?php echo RUTA_LOGIN_ADMIN; ?>">Iniciar sesión</a>
		</div>
	</div>
</div>



<?php
include_once 'seccion/doc-terminacion.inc.php';
