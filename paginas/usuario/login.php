<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/ValidadorLogin.inc.php';
include_once 'app/usuario/ControlSesion.inc.php';




if (ControlSesion::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_INICIO_USUARIO);
}


if (isset($_POST['login'])) {
	Conexion::abrir_conexion();
	$validador = new ValidadorLogin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());


	if ($validador -> obtener_error() === '' &&
		!is_null($validador -> obtener_usuario())) {
		//iniciar sesion

		//redirigir a dashboard
		ControlSesion::iniciar_sesion(
			$validador -> obtener_usuario() -> obtener_id(),
			$validador -> obtener_usuario() -> obtener_nombre());
		Redireccion::redirigir(RUTA_INICIO_USUARIO);
		}

	Conexion::cerrar_conexion();
}





$titulo = "Iniciar sesión $nombreEmpresa";
$navbar = "position: absolute;";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/mostrarPass.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<?php //body ?>
<div class="container-fluid">
	<?php //inicio ?>
	<div class="row section">
	    <?php //registro de usuario?>
	    <div class="col-12 col-md-5 center-align valign-wrapper" style="background-color: #A60303; color: white;">
	        <div class="row">
	        	<h1 class="textoBlack">Inicio de sesión</h1>
	            <div class="d-block d-sm-none" style="height: 10vh;"></div>
	        </div>
	    </div>
	    <div class="row col-md-7 center-align valign-wrapper">
	    	<div class="col-1 col-md-3"></div>
	    	<div class="col-10 col-md-6">
	    		<form role="form" method="post" class="col-12" action="<?php echo RUTA_LOGIN; ?>">

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
				<div class="col-12"><br></div>
				<a class="col-12" href="<?php echo RUTA_RECUPERAR_CLAVE; ?>">¿Olvidaste tu contraseña?</a>	
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

