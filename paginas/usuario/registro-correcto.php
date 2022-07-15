<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';



$titulo = "Registro Exitoso | $nombreEmpresa";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";


include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
?>


<div class="container-fluid">
	<?php //inicio ?>
	<div class="">
	    <?php //registro de admin?>
	    <div class="row section valign-wrapper">
	    	<div class="col-1"></div>
	    	<div class="col-10">
	    		<br>
	    		<div class="row sobreponer2">
	    			<div class="imagen-background2">
			            <img loading="lazy" itemprop="image" alt="Suscríbete a la newsletter de SYLVI" src="<?php echo RUTA_IMG_OPTIMIZADA;?>fondo/suscribete-a-newsletter.webp" class="imagen">
			        </div>
	    		</div>
	    		<br><br>
	    		<h1 class="textoTitulo">SUSCRIPCIÓN A NEWSLETTER</h1>
	    		<br>
	    		<p>Gracias por suscribirte a nuestra newsletter.<br> Te informaremos sobre nuevas colecciones y articulos de tu interés.</p>
	    		<br><br>
	    		<a class="btn btn-secundario-animado" href="<?php echo RUTA_TIENDA; ?>"><p>Ver productos</p></a>	
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