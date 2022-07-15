<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';


include_once 'app/admin/Admin.inc.php';
include_once 'app/usuario/Usuario.inc.php';
include_once 'app/admin/RepositorioAdmin.inc.php';
include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/ValidadorRegistro.inc.php';

if (isset($_POST['enviar'])) {
	Conexion :: abrir_conexion();

	$validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], Conexion :: obtener_conexion());


	if($validador -> registro_valido()){
		$usuario = new Usuario('', 
			$validador-> obtener_nombre(), 
			$validador-> obtener_email(), 
			'',
			'');


		$usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion :: obtener_conexion(), $usuario);
		if ($usuario_insertado) {
			//redirigir a REGISTRO CORRECTO
			Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/' . $usuario -> obtener_nombre());
			
		}
		else{
			echo "no sirve";
		}
	}
}



$titulo = "Suscripción | $nombreEmpresa";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";



include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/paises.php';
include_once 'scripts/mostrarPass.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';


//El registro se adapta a moviles como lo hace el login
?>


<?php //body ?>
<div class="container-fluid">
	<?php //inicio ?>
	<div class="row">
	    <?php //registro de admin?>
	    <div class="col-12 center-align valign-wrapper" style="background-color: #A60303; color: white;">
	        <div class="row">
	        	<h1 class="textoBlack" style="margin-top: 2em;margin-bottom: .5em;">Registro de nuevo usuario</h1>
	        </div>
	    </div>
	    <div class="row col-12 center-align valign-wrapper">
	    	<div class="col-1 d-block d-sm-none"></div>
	    	<div class="col-10 col-md-12">
	    		<form role="form" method="post" class="row" action="<?php echo RUTA_REGISTRO; ?>">
					<div class="col-12 row bg center-align valign-wrapper">
                        <div class="col-4 input-field" style="padding-left:2em;">
                            <input type="text" name="nombre" id="nombre" class="validate" placeholder="Escribe tu nombre">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4 input-field">
                            <input type="email" name="email" id="email" class="validate" placeholder="Escribe tu correo electrónico">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                            <button type="submit" id="boton" class="btn btn-principal-animado" name="enviar">¡Listo!</button>
                        </div>
                    </div>
				</form>	    		
	    	</div>
	    	<div class="col-1 d-block d-sm-none"></div>	    	
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