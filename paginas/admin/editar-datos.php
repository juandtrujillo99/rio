<?php

include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/admin/Admin.inc.php';
include_once 'app/admin/RepositorioAdmin.inc.php';
include_once 'app/admin/editar-datos/RepositorioEdicionDatos.inc.php';
include_once 'app/Redireccion.inc.php';



if(!ControlSesionAdmin :: sesion_iniciada()) {
	Redireccion :: redirigir(SERVIDOR);
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];

	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}



include_once 'app/admin/editar-datos/ActualizarDatos.inc.php';


$titulo = "Editar datos";



include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/mostrarPass.php';
?>

<script type="text/javascript" src="<?php echo RUTA_JS; ?>desaparecer-automaticamente.js"></script>

<?php
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<div class="container-fluid">
	<div class="row">
		<div class="col-12 row">
			<div class="col-1 d-block d-sm-none"></div>
			<div class="col-10 col-md-12">
				<br><br>
				<h1 class="textoBlack" align="center"><?php echo $titulo; ?></h1>
			</div>
			<div class="col-2 col-md-4"></div>
			<a href="<?php echo RUTA_PERFIL_ADMIN; ?>" class="btn btn-secundario-animado col-8 col-md-4">Volver al perfil</a>
		</div>
		<div class="d-block d-sm-none col-1"></div>
		<div class="col-10 row">
			<div class="col-md-2 d-none d-sm-block"></div>
			<div class="col-md-10 row">
				<div class="col-12 col-md-5">
					<br><br>
					<h3 class="textoBold">Datos personales</h3>
					<br>
					<ul class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header">
								<span class="material-icons">perm_identity</span> Nombre completo
							</div>
							<div class="collapsible-body">
								<form role="form" class="row" method="post"  action="<?php echo RUTA_EDITAR_DATOS_ADMIN; ?>">
									<input type="text" name="nombre" placeholder="Nombres" style="margin-right: 1em;">
									<div class="col-12"><br></div>
									<button type="submit" name="guardar-nombre" class="btn btn-secundario-animado col-12 col-md-6">
										<span>Guardar cambios</span>
									</button>
								</form>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-1 d-none d-sm-block"></div>
				<div class="col-12 col-md-6">
					<br><br>
					<h3 class="textoBold">Inicio de sesión y seguridad</h3>
					<br>
					<ul class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header">
								<span class="material-icons">lock</span> Contraseña
							</div>
							<div class="collapsible-body">
								<form role="form" class="row" method="post"  action="<?php echo RUTA_EDITAR_DATOS_ADMIN; ?>">
									<div class="col-12 row">
										<input class="col-8" id="txtPassword" type="Password" name="clave" placeholder="Contraseña" autocomplete="off">
										<button id="show_password" class="btn btn-principal-animado col-4" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
									</div>
									<div class="col-12"><br></div>
									<button type="submit" name="guardar-clave" class="btn btn-principal col-12">
										<span><i class="fas fa-save"></i> Guardar cambios</span>
									</button>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>



<?php

include_once 'seccion/doc-terminacion.inc.php';

?>