<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/admin/RepositorioAdmin.inc.php';
include_once 'app/admin/ValidadorLogin.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';




if (ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_PERFIL_ADMIN);
}


if (isset($_POST['login'])) {
	Conexion::abrir_conexion();
	$validador = new ValidadorLoginAdmin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());


	if ($validador -> obtener_error() === '' &&
		!is_null($validador -> obtener_admin())) {
		//iniciar sesion

		//redirigir a dashboard
		ControlSesionAdmin::iniciar_sesion(
			$validador -> obtener_admin() -> obtener_id(),
			$validador -> obtener_admin() -> obtener_nombre());
		Redireccion::redirigir(RUTA_PERFIL_ADMIN);
		}

	Conexion::cerrar_conexion();
}





$titulo = "Inicio de sesión $nombreEmpresa";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/mostrarPass.php';
include_once 'seccion/cabecera-cierre.inc.php';
?>



<?php //body ?>
<div class="container-fluid">
	<?php //inicio ?>
	<div class="row section">
	    <?php //registro de admin?>
	    <div class="col-12 col-md-5 center-align valign-wrapper" style="box-shadow: 0px .1px 5px 0px rgba(0,0,0,0.1);">
	    	<div class="col-2"></div>
	    	<div class="col-8">
	    		<img  loading="lazy" itemprop="image" class="imagen-2" src="<?php echo RUTA_IMG_OPTIMIZADA;?>logo/cuadrado.webp">
	        	<h1 class="textoBlack">Inicio de sesión</h1>
	    	</div>
	    </div>
	    <div class="row col-md-7 center-align valign-wrapper">
	    	<div class="col-1 col-md-3"></div>
	    	<div class="col-10 col-md-6">
	    		<form role="form" method="post" class="col-sm-12" action="<?php echo RUTA_LOGIN_ADMIN; ?>">

					<div class="input-field">
						<input type="email" name="email" id="email" class="validate"

						<?php

						if(isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])){

							echo 'value="' . $_POST['email'] . '"';

						}

						?> required autofocus >
						<label for="email" data-error="wrong" data-success="right">Email</label>
					</div>

					<div class="input-field row">
						<input class="col-9" type="password" name="clave" id="txtPassword">
						<label for="clave">Contraseña</label>						
						<div class="col-1"></div>
						<button class="col-2 btn" id="show_password" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
						<?php
						if(isset($_POST['login'])){
							$validador -> mostrar_error();
						}
						?>
						<br><br>
					</div>

					<button type="submit" id="boton" class="btn btn-secundario-animado" name="login">Iniciar sesión</button>
				</form> 
				<br>  		
				<a class="col-12" href="<?php echo RUTA_RECUPERAR_CLAVE_ADMIN; ?>">¿Olvidaste tu contraseña?</a>	
	    	</div>
	    	<div class="col-1 col-md-3"></div>	    	
	    </div>
	</div>
	<?php //fin del formulario 
	include_once 'seccion/copyright.inc.php';
	?>
</div>
<?php //body ?>




	


<?php

include_once 'seccion/doc-terminacion.inc.php';

?>

