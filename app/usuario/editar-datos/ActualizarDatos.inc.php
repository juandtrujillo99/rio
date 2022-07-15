<?php

Conexion::abrir_conexion();



$id_usuario = $_SESSION['id_usuario'];



/*if (isset($_POST['guardar-email'])) {

	$email = $_POST['email'];	

	if (isset($email)&&!empty($email)) {

		$email_actualizado = RepositorioUsuario::actualizar_email(Conexion::obtener_conexion(), $id_usuario, $email);

		?>

		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">

			El cambio se realizó correctamente.

		</p>

		<?php

	}

	else{//informar error

		return;

	}

}*/





if (isset($_POST['guardar-clave'])) {
	$clave_cifrada = password_hash($_POST['clave'], PASSWORD_DEFAULT);
	if (isset($clave_cifrada)&&!empty($clave_cifrada)) {
		$clave_actualizada = RepositorioUsuario::actualizar_password(Conexion::obtener_conexion(), $id_usuario, $clave_cifrada);?>
		<div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
			<div class="col-2 col-md-4"></div>
			<div class="col-8 col-md-4">
				<div class="card">
					<div class="card-content">
						<p class="card-title textoBold">Actualización correcta</p>
						<p>Recarga la página si no ves los cambios</p>
					</div>
					<div class="card-action">
						<a href="" class=" btn btn-principal-animado">Entendido</a>
					</div>
				</div>
			</div>
			<div class="col-2 col-md-4"></div>
		</div>

		<?php
	}else{//informar error
		return;
	}
}





if (isset($_POST['guardar-nombre'])||isset($_POST['guardar-apellido'])) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	if (isset($nombre)&&!empty($nombre)) {
		$nombre_actualizado = RepositorioUsuario::actualizar_nombre(Conexion::obtener_conexion(), $id_usuario, $nombre);?>

		<div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
			<div class="col-2 col-md-4"></div>
			<div class="col-8 col-md-4">
				<div class="card">
					<div class="card-content">
						<p class="card-title textoBold">Actualización correcta</p>
						<p>Recarga la página si no ves los cambios</p>
					</div>
					<div class="card-action">
						<a href="" class=" btn btn-principal-animado">Entendido</a>
					</div>
				</div>
			</div>
			<div class="col-2 col-md-4"></div>
		</div>

		<?php
	}
	if (isset($apellido)&&!empty($apellido)) {
		$apellido_actualizado = RepositorioUsuario::actualizar_apellido(Conexion::obtener_conexion(), $id_usuario, $apellido);?>

		<div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
			<div class="col-2 col-md-4"></div>
			<div class="col-8 col-md-4">
				<div class="card">
					<div class="card-content">
						<p class="card-title textoBold">Actualización correcta</p>
						<p>Recarga la página si no ves los cambios</p>
					</div>
					<div class="card-action">
						<a href="" class=" btn btn-principal-animado">Entendido</a>
					</div>
				</div>
			</div>
			<div class="col-2 col-md-4"></div>
		</div>

		<?php
	}else{//informar error
		return;
	}
}







if (isset($_POST['guardar-telefono'])) {
	$telefono = $_POST['telefono'];	
	if (isset($telefono)&&!empty($telefono)) {
		$telefono_actualizado = RepositorioUsuario::actualizar_telefono(Conexion::obtener_conexion(), $id_usuario, $telefono);?>

		<div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
			<div class="col-2 col-md-4"></div>
			<div class="col-8 col-md-4">
				<div class="card">
					<div class="card-content">
						<p class="card-title textoBold">Actualización correcta</p>
						<p>Recarga la página si no ves los cambios</p>
					</div>
					<div class="card-action">
						<a href="" class=" btn btn-principal-animado">Entendido</a>
					</div>
				</div>
			</div>
			<div class="col-2 col-md-4"></div>
		</div>

		<?php
	}else{//informar error
		return;
	}
}







Conexion::cerrar_conexion();