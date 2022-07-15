<?php



$titulo = 'Recupera tu contraseña';



include_once 'seccion/cabecera-inicio.inc.php';
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
	        	<h1 class="textoBlack">¿Olvidaste tu<br> contraseña?</h1>
	            <div class="d-block d-sm-none" style="height: 10vh;"></div>
	        </div>
	    </div>
	    <div class="row col-md-7 center-align valign-wrapper">
	    	<div class="col-1 col-md-3"></div>
	    	<div class="col-10 col-md-6">
	    		<div class="col-12" align="left">
	    			<p class="textoBlack textoSubtitulo">Restablecer contraseña</p>
	    			<br>
	    			<p>Escribe el correo electrónico con el que te inscribiste para comenzar la recuperación.</p>
	    			<br><br>
	    		</div>
	    		<form role="form" method="post" class="col-12" action="<?php echo RUTA_GENERAR_URL_SECRETA; ?>">
					<div class="input-field">
						<input type="email" name="email" id="email" class="validate" required autofocus>
						<label for="email" data-error="wrong" data-success="right">Email</label>
					</div>

					<button type="submit" id="boton" class="btn btn-secundario-animado" name="enviar_email">Enviar</button>
				</form> 
				<div class="col-12"><br></div>
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