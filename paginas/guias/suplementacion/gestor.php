<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/admin/RepositorioAdmin.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';

if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];
	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}


$titulo = "Gestor guías de suplementación";
$tipoGuia = "guia-suplementacion";
$rutaFile=RUTA_GESTOR_GUIA_SUPLEMENTACION;


include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<script type="text/javascript" src="<?php echo RUTA_JS; ?>desaparecer-automaticamente.js"></script>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
include_once 'scripts/formatoFecha.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
include_once 'scripts/subir-pdf.php';
?>



<?php //body ?>

<div class="container-fluid section">
	

      <div class="row">
      	<div class="col-12" style="margin-top: 5em;">
        	<h1 align="center" class="textoBlack"><?php echo $titulo; ?></h1>
        	<br><br>
        </div>
        <div class="col-1"></div>

        <div class="col-md-4 col-10 d-none d-sm-block">   
        	<div style="position:fixed;">    
				<form method="post" enctype="multipart/form-data" class="row col-12">
					<div class="col-1"></div>				
					<div class="col-10">
						<div class="input-field">
							<input type="email" name="email" id="email" class="validate" required>
							<label for="email" data-error="wrong" data-success="right">Escribe el correo electrónico del usuario</label>
						</div>
					</div>
					<div class="col-1"></div>
					<div class="col-1"></div>
					<div class="col-7">
						<label for="formato" class="btn-secundario-animado">Seleccionar</label>
					</div>
					<div class="col-1"></div>
					<div class="col-3">
						<input hidden type="file" name="formato" id="formato">
						<input class="btn-secundario-animado" type="submit" name="subir" value="cargar">
					</div>
					<div class="col-12"><br><br></div>					         
				</form>
				<form method="post" class="row col-12">
					<div class="col-10 row">
						<div class="col-1"></div>
						<input class="col-10" name="borrarFor" placeholder="nombre.pdf" required>
					</div>
					<div class="col-2">
						<input class="btn btn-secundario-animado" type="submit" name="borrar" value="Eliminar">
					</div>              
					<div>
						<?php echo $mensajeOk;?>
					</div>				           
				</form>
			</div> 
        </div>        



        
        <div class="col-md-5 col-12 row">  
	        <div class="col-1"></div> 
	        <div class="col-10">
	          <h3 align="center">Archivos en carpeta</h3> 
	          <br><hr> 
	          <?php echo $listar; ?> 
	          <div class="d-block d-sm-none" style="margin-top: 10em"></div>       
	        </div>
	        <div class="col-1"></div>
		</div> 



		<div class="col-12 d-block d-sm-none" style="background-color: white;z-index: 99;position:fixed;bottom: 0;">   
        	<div style="padding: 1em;">    
				<form method="post" enctype="multipart/form-data" class="row col-12">					
					<div class="col-6">
						<div class="input-field">
							<input type="email" name="email" id="email" class="validate" required>
							<label for="email" data-error="wrong" data-success="right">Escribe el correo electrónico del usuario</label>
						</div>
						<label for="formato" class="btn btn-secundario-animado">Seleccionar</label>
					</div>
					<div class="col-6">
						<input hidden type="file" name="formato" id="formato">
						<input class="btn btn-secundario-animado" type="submit" name="subir" value="cargar">
					</div>					         
				</form>
				<form method="post" class="row col-12">
					<div class="col-8 row">
						<div class="col-1"></div>
						<input class="col-10" name="borrarFor" placeholder="nombre.pdf" required>
					</div>
					<div class="col-4">
						<input class="btn btn-secundario-animado" type="submit" name="borrar" value="Eliminar">
					</div>              
					<div>
						<?php echo $mensajeOk;?>
					</div>				           
				</form>
			</div> 
        </div>




      </div> 

</div>


<?php //cuerpo 
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>
