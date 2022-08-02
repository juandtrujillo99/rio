<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/ControlSesion.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/tienda/EscritorEntradas.inc.php';

if(!ControlSesion::sesion_iniciada() && !ControlSesionAdmin::sesion_iniciada()) {
    Conexion :: abrir_conexion();
} else {

    if (ControlSesionAdmin::sesion_iniciada()) {
        Conexion :: abrir_conexion();
        $id = $_SESSION['id_admin'];
        $admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
    }
    elseif (ControlSesion::sesion_iniciada()) {
        Conexion :: abrir_conexion();
        $id = $_SESSION['id_usuario'];
        $usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
    }
}

$busqueda = null;
$resultados = null;

$buscar_titulo = true;
$buscar_contenido = true;
$buscar_tags = false;
$buscar_autor = false;

$ordenar_antiguas = false;

if (isset($_POST['buscar-tienda']) && isset($_POST['termino-buscar-tienda']) && !empty($_POST['termino-buscar-tienda'])) {
	$busqueda = $_POST['termino-buscar-tienda'];


	Conexion::abrir_conexion();
	$resultados = RepositorioEntradaTienda::buscar_entradas_todos_los_campos(Conexion::obtener_conexion(), $busqueda);

	Conexion::cerrar_conexion();
}

if (isset($_POST['busqueda_avanzada']) && isset($_POST['campos'])) {

	if (in_array("titulo", $_POST['campos'])) {
		$buscar_titulo = true;
	}

	if (in_array("contenido", $_POST['campos'])) {
		$buscar_contenido = true;
	}

	if (in_array("etiqueta", $_POST['campos'])) {
		$buscar_etiqueta = true;
	}

	if (in_array("autor", $_POST['campos'])) {
		$buscar_autor = true;
	}

	if ($_POST['fecha'] == "recientes") {
		$orden = "DESC";
	}

	if ($_POST['fecha'] == "antiguas") {
		$orden = "ASC";
	}

	if (isset($_POST['termino-buscar-tienda']) && !empty($_POST['termino-buscar-tienda'])) {
		$busqueda = $_POST['termino-buscar-tienda'];

		Conexion::abrir_conexion();

		if ($buscar_titulo) {
			$entradas_por_titulo = RepositorioEntradaTienda::buscar_entradas_por_titulo(Conexion::obtener_conexion(),  $busqueda, $orden);
		}

		if ($buscar_contenido) {
			$entradas_por_contenido = RepositorioEntradaTienda::buscar_entradas_por_contenido(Conexion::obtener_conexion(),  $busqueda, $orden);
		}

		if ($buscar_tags) {
			//añadir tags cuando existan
		}

		if ($buscar_autor) {
			$entradas_por_autor = RepositorioEntradaTienda::buscar_entradas_por_autor(Conexion::obtener_conexion(), $busqueda, $orden);
		}
	}
}

$titulo = "Resultados de Búsqueda";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";

include 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
include 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>

<?php //pc ?>

<div class="container">
	<div class="col-12">
		<div class="row" style="padding: 5em 0 2.5em 0;" align="center">
		    <div class="col-1"></div>
		    <div class="col-10" align="center">
		        <p class="textoBlack textoSubtitulo"><?php echo $titulo; ?></p> 
		    </div>    
		    <div class="col-1"></div>	         
		</div>

		<div class="row">		
			<?php
			if (isset($_POST['termino-buscar-tienda']) && count((array)$resultados)) {
				?>
			<div class="col-12">
				<p align="left"><?php echo "Aquí tenemos ".count($resultados)." resultado(s) para tu búsqueda";?></p>
				<hr>			
			</div>
				<?php
			} //COMPROBAR RESULTADOS EN BÚSQUEDA MÚLTIPLE
			if (isset($_POST['buscar-tienda'])) {
				if(count((array)$resultados)) {
					EscritorEntradasTienda::mostrar_entradas_busqueda($resultados);
					?>
				<div class="col-12">
					<hr><br>			
				</div>
				<?php
				} else {
					?>
			<div class="col-2"></div>
			<div class="col-8 section2 center-align valign-wrapper">
				<div class="col-12">
					<p class="textoBlack textoTitulo1">
						Lo sentimos
					</p>
					<br>
					<p class="textoBook textoParrafo">
						No encontramos coincidencias. Intenta buscar nuevamente usando otras palabras o vuelve atrás tocando el botón de abajo.
					</p>
					<br><br>
					<a class="btn btn-secundario-animado" href="<?php echo RUTA_TIENDA; ?>">Volver atrás</a>
					<br><br><br><br>
				</div>
			</div> 
				<?php
						}
					} else if (isset($_POST['busqueda_avanzada'])) {
						if (count($entradas_por_titulo) || count($entradas_por_contenido) || count($entradas_por_autor)) {
							$parametros = count($_POST['campos']);
							$ancho_columnas = 12 / $parametros;
							?>
							<div class="col-12">
								<?php
								for ($i = 0; $i < $parametros; $i++) {
								?>
									<div class="<?php echo 'col-'.$ancho_columnas;?> text-center">
										<h4><?php echo 'Coincidencias en '.$_POST['campos'][$i];?></h4>
										<br>
										<?php
										switch($_POST['campos'][$i]) {
											case "titulo":
												EscritorEntradasTienda::mostrar_entradas_busqueda_multiple($entradas_por_titulo);
												break;
											case "contenido":
											EscritorEntradasTienda::mostrar_entradas_busqueda_multiple($entradas_por_contenido);
												break;
											case "tags":
												break;
											case "autor":
												EscritorEntradasTienda::mostrar_entradas_busqueda_multiple($entradas_por_autor);
												break;
										}
										?>
									</div>
									<?php
								}
								?>
							</div>
							<?php
						} else {
							?>
							<div class="col-2"></div>
							<div class="col-8 section2 center-align valign-wrapper">
								<div class="col-12">
									<p class="textoBlack textoTitulo1">
										Lo sentimos
									</p>
									<br>
									<p class="textoBook textoParrafo">
										No encontramos coincidencias. Intenta buscar nuevamente usando otras palabras o vuelve atrás tocando el botón de abajo.
									</p>
									<br><br>
									<a class="btn btn-secundario-animado" href="<?php echo RUTA_TIENDA; ?>">Volver atrás</a>
									<br><br><br><br>
								</div>
							</div> 
							<?php
						}
					}
				?>	
		</div>
	</div>

</div>

<?php //pc ?>



<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>
