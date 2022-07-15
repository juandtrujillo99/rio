<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';


$titulo = "Email enviado";

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
			<p class="textoBookBold textoParrafo">
				Contraseña actualizada
			</p>
			<br><br>
			<p class="textoBook textoParrafo">
				Se ha modificado tu contraseña con éxito, pulsa el botón y comienza a entrenar, recuerda que no hay progreso sin esfuerzo.
			</p>
			<br><br>
			<a class="btn btn-secundario-animado" href="<?php echo RUTA_LOGIN; ?>">Iniciar sesión</a>
		</div>
	</div>
</div>



<?php
include_once 'seccion/doc-terminacion.inc.php';
