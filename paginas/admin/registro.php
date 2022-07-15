<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';


include_once 'app/admin/Admin.inc.php';
include_once 'app/admin/RepositorioAdmin.inc.php';
include_once 'app/admin/ValidadorRegistro.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';


if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_404);
}


if (isset($_POST['enviar'])) {
	Conexion :: abrir_conexion();

	$validador = new ValidadorRegistroAdmin($_POST['nombre'], $_POST['email'], $_POST['clave1'], /*$_POST['clave2'], */Conexion :: obtener_conexion());



	if($validador -> registro_valido()){
		$admin = new Admin('', 
			$validador-> obtener_nombre(), 
			$validador-> obtener_email(), 
			password_hash($validador-> obtener_clave(), PASSWORD_DEFAULT), 
			'',
			'');


		$admin_insertado = RepositorioAdmin :: insertar_admin(Conexion :: obtener_conexion(), $admin);
		if ($admin_insertado) {
			//redirigir a REGISTRO CORRECTO
			Redireccion::redirigir(RUTA_REGISTRO_CORRECTO_ADMIN . '/' . $admin -> obtener_nombre());
		}
	}
}



$titulo = "Nuevo Colaborador | $nombreEmpresa";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";


include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/mostrarPass.php';
include_once 'seccion/cabecera-cierre.inc.php';


//El registro se adapta a moviles como lo hace el login
?>


<?php //body ?>
<div class="container-fluid">
	<?php //inicio ?>
	<div class="row section">
	    <?php //registro de admin?>
	    <div class="col-12 col-md-5 center-align valign-wrapper" style="box-shadow: 0px .1px 5px 0px rgba(0,0,0,0.1);">
	        <div class="row">
	        	<div class="col-2"></div>
		    	<div class="col-8">
		    		<img  loading="lazy" itemprop="image" class="imagen-2" src="<?php echo RUTA_IMG_OPTIMIZADA;?>logo/cuadrado.webp">
		        	<h1 class="textoBlack">Colaborador nueva cuenta</h1>
		    	</div>
	        </div>
	    </div>
	    <div class="row col-md-7 center-align valign-wrapper">
	    	<div class="col-1 col-md-3"></div>
	    	<div class="col-10 col-md-6">
	    		<form role="form" method="post" class="col-sm-12" action="<?php echo RUTA_REGISTRO_ADMIN; ?>">
					<?php
					if (isset($_POST['enviar'])) {
						include 'seccion/admin/registro_validado.inc.php';
					}
					else{
						include 'seccion/admin/registro_vacio.inc.php';
					}
					?>
				</form>	    		
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