<?php

if(isset($_POST['guardar_imagen']) && !empty($_FILES['archivo_subido']['tmp_name'])) {
	$directorio = DIRECTORIO_RAIZ."/assets/fotos-perfil/admin/";//se crea la variable para la ruta de la carpeta
	$carpeta_objetivo = $directorio.basename($_FILES['archivo_subido']['name']);
	$subida_correcta = 1;
	$tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);
	$comprobacion = getimagesize($_FILES['archivo_subido']['tmp_name']);
	
	if($comprobacion !== false) {
		$subida_correcta = 1;
	} else {
		$subida_correcta = 0;
	}	

	if ($_FILES['archivo_subido']['size'] > 41943040) {
		?>
		<div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
			<div class="col-2 col-md-4"></div>
			<div class="col-8 col-md-4">
				<div class="card">
					<div class="card-content">
						<p class="card-title textoBold">Ha ocurrido un error</p>
						<p>El archivo no puede pesar más de 500kb.</p>
					</div>
					<div class="card-action">
						<a href="" class=" btn btn-principal-animado">Entendido</a>
					</div>
				</div>
			</div>
			<div class="col-2 col-md-4"></div>
		</div>
		<?php
		$subida_correcta = 0;
	}	

	if ($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg" && $tipo_imagen != "gif") {
		?>
		<div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
			<div class="col-2 col-md-4"></div>
			<div class="col-8 col-md-4">
				<div class="card">
					<div class="card-content">
						<p class="card-title textoBold">Ha ocurrido un error</p>
						<p>Sólo se admiten los formatos JPG, JPEG, PNG y GIF.</p>
					</div>
					<div class="card-action">
						<a href="" class=" btn btn-principal-animado">Entendido</a>
					</div>
				</div>
			</div>
			<div class="col-2 col-md-4"></div>
		</div>		
		<?php
		$subida_correcta = 0;
	} else {
		if (move_uploaded_file($_FILES['archivo_subido']['tmp_name'],
		DIRECTORIO_RAIZ."/assets/fotos-perfil/admin/".$admin->obtener_nombre())) {
			?>
			<div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
				<div class="col-2 col-md-4"></div>
				<div class="col-8 col-md-4">
					<div class="card">
						<div class="card-image">
							
				            <div align="center" style="padding:2em 0;">   
				                <div class="img-profile bg-cover" style="background-image:url(<?php echo SERVIDOR.'/assets/fotos-perfil/admin/'.$admin->obtener_nombre(); ?>);"></div>
				            </div>
        						
						</div>
						<div class="card-content">
							<p class="card-title textoBold">Pronto se actualizará la foto de perfil</p>
							<p>Es posible que el cambio tarde unos momentos en aparecer en toda la plataforma.</p>
						</div>
						<div class="card-action">
							<a href="" class=" btn btn-principal-animado">Entendido</a>
						</div>
					</div>
				</div>
				<div class="col-2 col-md-4"></div>
			</div>
			<?php
		} else {
			?>
			<div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
				<div class="col-2 col-md-4"></div>
				<div class="col-8 col-md-4">
					<div class="card">
						<div class="card-content">
							<p class="card-title textoBold">Ha ocurrido un error</p>
							<p>Intentalo nuevamente más tarde.</p>
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
	}
}
?>





<?php
/////////////////////////////// BORRAR ARCHIVO ////////////////////////////////////      

if (isset($_POST['borrar']) && file_exists(DIRECTORIO_RAIZ."/assets/fotos-perfil/admin/".$admin->obtener_nombre())) {	
	@unlink(DIRECTORIO_RAIZ."/assets/fotos-perfil/admin/".$admin->obtener_nombre());
	return;//Si le dan al boton (borrar) y ademas, el archivo existe, borra el archivo de la carpeta
}elseif (isset($_POST['borrar']) && !file_exists(DIRECTORIO_RAIZ."/assets/fotos-perfil/admin/".$admin->obtener_nombre())) {
		return;//Si se pulsa el boton (borrar) y el archivo NO existe, no es necesario que haga nada
}else{
	return;//En cualquier otro caso, no haga nada
}
?>