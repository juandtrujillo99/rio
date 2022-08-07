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
				te enviamos un email
			</p>
			<p class="textoBookBold textoParrafo">
				Esto podría tardar un momento
			</p>
			<br><br>
			<p class="textoBook textoParrafo">
				Haz 10 sentadillas y luego revisa la bandeja de entrada de tu correo electrónico, si no ves nada ahí, puedes mirar en la carpeta de spam. Accede al enlace para restablecer tu contraseña.
			</p>
			<br><br>
			<a class="btn btn-secundario-animado" href="<?php echo RUTA_LOGIN_ADMIN; ?>">Iniciar sesión</a>
		</div>
	</div>
</div>



<?php
include_once 'seccion/doc-terminacion.inc.php';
