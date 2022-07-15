<?php
include_once 'app/Conexion.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/admin/RepositorioAdmin.inc.php';
include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';



if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];
	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}

$titulo = "Gestor de usuarios";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'seccion/doc-navbar.inc.php';
include_once 'scripts/formatoFecha.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/panel_control_declaracion.inc.php';


$array_usuarios = RepositorioUsuario :: obtener_todos(Conexion::obtener_conexion());
?>


<div class="row">
	<div class="col-1"></div>
	<div class="col-10" style="padding: 6em 0 1.5em 0;">
		<h2 class="textoBlack textoTitulo text-center"><?php echo $titulo ?></h2>
		<br>
		<a href="<?php echo RUTA_REGISTRO; ?>" class="btn btn-secundario-animado" role="button" id="boton-nueva-entrada">Registrar nuevo usuario</a>
		<br>
		<br>
	</div>
	<div class="col-1"></div>
	<div class="col-1"></div>
	<div class="col-10">
		<div class="row">
			<?php 
				if (count($array_usuarios) > 0) {
					?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Fecha de registro</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Plan</th>
								<th>Objetivo</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							for ($i = 0; $i < count($array_usuarios); $i++) {
								$usuario_actual = $array_usuarios[$i];
								?>								
								<tr>										
									<td>
										<?php echo convertirFecha($usuario_actual -> obtener_fecha_registro());
										?>
										<br> 
										<?php
										$primeraFecha = $usuario_actual -> obtener_fecha_registro();
										$segundaFecha = "+1 days";
										include_once 'scripts/contarFechas.php';
										echo "Hace ".$days." días";?> 
									</td>
									<td><?php echo $usuario_actual -> obtener_nombre()." ".$usuario_actual -> obtener_apellido(); ?></td>									
									<td><?php echo $usuario_actual -> obtener_email(); ?></td>	
									<td><?php echo $usuario_actual -> obtener_plan(); ?></td>					
									<td><?php echo $usuario_actual -> obtener_objetivo(); ?></td>
									<td>
										<?php /*
										<form method="post" action="<?php echo RUTA_BORRAR_USUARIO; ?>">
											<input type="hidden" name="id_borrar" value="<?php echo $usuario_actual -> obtener_id(); ?>">
											<button type="submit" class="btn btn-principal" name="borrar_usuario">Borrar</button>
										</form>
										*/ ?>
									</td>
								</tr>								
								<?php
							}
							?>
						</tbody>
					</table>
					<?php
				} else {
					?>
					<h3 class="text-center">Todavía no hay usuarios</h3>
					<br>
					<br>
					<?php
				}
			?>
		</div>
	</div>
</div>

<?php
include_once 'seccion/panel_control_cierre.inc.php';
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';

