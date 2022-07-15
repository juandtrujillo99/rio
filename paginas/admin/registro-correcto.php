<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/admin/RepositorioAdmin.inc.php';



$titulo = "Registro Exitoso | $nombreEmpresa";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";


include_once 'seccion/cabecera-inicio.inc.php';
include_once 'seccion/cabecera-cierre.inc.php';
?>


<div class="container-fluid">
	<?php //inicio ?>
	<div class="row section">
	    <?php //registro de admin?>
	    <div class="col-12 col-md-5 center-align valign-wrapper" style="box-shadow: 0px .1px 5px 0px rgba(0,0,0,0.1);">
	        <div class="row">
	        	<div class="col-2"></div>
		    	<div class="col-8">
		    		<img  loading="lazy" itemprop="image" class="imagen-2" src="<?php echo RUTA_IMG_OPTIMIZADA;?>logo/cuadrado.webp">
		        	<h1 class="textoBlack">Cuenta creada exitosamente</h1>
		    	</div>
	        </div>
	    </div>
	    <div class="row col-md-7 center-align valign-wrapper">
	    	<div class="col-1 col-md-3"></div>
	    	<div class="col-10 col-md-6">
	    		<a class="btn btn-secundario-animado" href="<?php echo RUTA_PERFIL_ADMIN; ?>"><p>VOLVER AL PANEL DE CONTROL</p></a>
	    		<br><br><br>
	    		<a class="enlaceSubrayado black-text" style="line-height: 1.6em;" href="<?php echo RUTA_REGISTRO_ADMIN; ?>">REGISTRAR OTRA CUENTA</a>    		
	    	</div>
	    	<div class="col-1 col-md-3"></div>	    	
	    </div>
	</div>
	<?php //fin del formulario 
	include_once 'seccion/copyright.inc.php';
	?>
</div>


<?php

include_once 'seccion/doc-terminacion.inc.php'

?>