<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/editar-datos/RepositorioEdicionDatos.inc.php';
include_once 'app/usuario/ControlSesion.inc.php';


if (!ControlSesion::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_usuario'];
	$usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
}

include_once 'app/usuario/editar-datos/ActualizarDatos.inc.php';

$titulo = "Mi perfil | $nombreEmpresa";
$navbar = "position: absolute;";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/mostrarPass.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<script type="text/javascript" src="<?php echo RUTA_JS; ?>desaparecer-automaticamente.js"></script>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
include_once 'scripts/formatoFecha.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<?php //body ?>
<?php
include_once 'seccion/usuario/perfil/subir_foto.inc.php';
?>
<div class="container">
	<?php
	include_once 'seccion/usuario/perfil/portada.inc.php';
	?>

	<div class="row center-align valign-wrapper" style="padding: 2em;">
	    <div class="col-12 col-md-6 row">
	        <a href="<?php echo RUTA_GUIA_EJERCICIOS; ?>" class="col-md-3 col-6 textoTitulo tooltipped" data-position="top" data-tooltip="Rutina de ejercicios" style="padding:.5em">
	            <p style="background-color: #A60303;color: white;"><i class="fa-solid fa-dumbbell" style="padding:.5em 0;"></i></p>
	        </a>
	        <a href="<?php echo RUTA_GUIA_ALIMENTACION; ?>" class="col-md-3 col-6 textoTitulo tooltipped" data-position="top" data-tooltip="Guía de alimentación" style="padding:.5em">
	            <p style="background-color: #A60303;color: white;"><i class="fa-solid fa-carrot" style="padding:.5em 0;"></i></p>
	        </a>
	        <a href="<?php echo RUTA_GUIA_SUPLEMENTACION; ?>" class="col-md-3 col-6 textoTitulo tooltipped" data-position="top" data-tooltip="Guía de suplementación" style="padding:.5em">
	            <p style="background-color: #A60303;color: white;"><i class="fa-solid fa-bolt" style="padding:.5em 0;"></i></p>
	        </a>
	        <a href="#" class="col-md-3 col-6 textoTitulo tooltipped" data-position="top" data-tooltip="Mi progreso" style="padding:.5em">
	            <p style="background-color: #A60303;color: white;"><i class="fa-solid fa-list-check" style="padding:.5em 0;"></i></p>
	        </a>
	        <ul class="collapsible col-12">
				<li>
					<div align="left" class="collapsible-header col-12 valign-wrapper" style="background-color: #A60303; color: white;">
						<p class="col-10 textoBlack textoParrafo1" style="padding: .5em;">Datos básicos</p> 
						<p class="col-2 right-align"><i class="fa-solid fa-angle-down"></i></p>
					</div>
					<div align="left" class="collapsible-body" style="background-color:transparent;">
						<div class="row">
							<div class="col-12">
								<div class="col-12 row">	
									<div class="col-11"><p class="textoBook">Nombre completo:</p></div>
									<div class="col-1"><a class="col modal-trigger textoColorMarca" href="#editarNombre"><i class="fa-solid fa-pen"></i></a></div>	
									<div class="col-12">				
										<?php 
										if (!empty($usuario -> obtener_nombre())) {
											?>
											<p class="textoBookBold textoParrafo1"><?php echo $usuario -> obtener_nombre() ." ". $usuario -> obtener_apellido() ; ?></p>
											<?php
											}
										?>
									</div>
								</div>	
								<br><hr>
								<p class="textoBook">Edad:</p>
								<?php 
								if (!empty($usuario -> obtener_fecha_nacimiento())) {
									?>
									<p class="textoBookBold textoParrafo1">
									<?php 
										$primeraFecha = $usuario -> obtener_fecha_nacimiento();
										$segundaFecha = "-10 days";
										include_once 'scripts/contarFechas.php';
										echo $years." Años";?> 
									</p>
									<?php
									}
								?>	
								<br><hr>
								<p class="textoBook">Altura:</p>
								<?php 
								if (!empty($usuario -> obtener_altura())) {
									?>
									<p class="textoBookBold textoParrafo1"><?php echo $usuario -> obtener_altura()." cm"; ?></p>
									<?php
									}
								?>
								<br><hr>
								<p class="textoBook">Restricciones médicas:</p>
								<?php 
								if (!empty($usuario -> obtener_restricciones())) {
									?>
									<p class="textoBookBold textoParrafo1"><?php echo $usuario -> obtener_restricciones(); ?></p>
									<?php
									}else{
										?>
										<p class="textoBookBold textoParrafo1">Ninguna</p>
										<?php	
									}
								?>	
								<br><hr>
								<p class="textoBook">Tipo de dieta:</p>
								<?php 
								if (!empty($usuario -> obtener_dieta())) {
									?>
									<p class="textoBookBold textoParrafo1"><?php echo $usuario -> obtener_dieta(); ?></p>
									<?php
									}
								?>	
							</div>	
						</div>							
					</div>
				</li>
			</ul>
	    	<div class="col-12"><br></div>
	    </div>
   	 	<div class="d-none d-sm-block col-md-1"></div>
	    <div class="col-12 col-md-5 row">
	        <?php include_once 'seccion/usuario/perfil/datos.inc.php';?>
	    </div>
	</div>
</div>




  

<!-- Modal para cambio de nombre y apellido -->
<div id="editarNombre" class="modal center-align">
	<div class="modal-content">
		<p class="textoBlack textoParrafo">Actualiza tu nombre o apellido</p>
		<br>
		<form role="form" method="post" action="<?php echo RUTA_PERFIL; ?>">
			<div class="input-field">
				<input type="text" name="nombre" id="nombre" class="validate">
				<label for="nombre">Nombres</label>				
			</div>
			<div class="input-field">
				<input type="text" name="apellido" id="apellido" class="validate">
				<label for="apellido">Apellidos</label>
			</div>
			<br>
			<button type="submit" class="btn btn-secundario-animado" name="guardar-nombre">Guardar cambios</button>
		</form>
	</div>
</div>


<!-- Modal para cambio de contraseña -->
<div id="cambiarClave" class="modal center-align">
	<div class="modal-content">
		<p class="textoBlack textoParrafo">Actualiza tu contraseña</p>
		<br>
		<form role="form" method="post"  action="<?php echo RUTA_PERFIL; ?>">
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
			<button type="submit" class="btn btn-secundario-animado" name="guardar-clave">Actualizar</button>
		</form>
	</div>
</div>



<!-- Modal para cambio de telefono -->
<div id="cambiarTelefono" class="modal center-align">
	<div class="modal-content">
		<p class="textoBlack textoParrafo">Actualiza tu teléfono</p>
		<br>
		<form role="form" method="post" action="<?php echo RUTA_PERFIL; ?>">
			<div class="input-field">
				<input type="number" name="telefono" class="validate">
				<label for="telefono">Teléfono</label>
			</div>
			<button type="submit" class="btn btn-secundario-animado" name="guardar-telefono">Actualizar</button>
		</form>
	</div>
</div>



<?php //cuerpo 
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>
