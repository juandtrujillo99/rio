<?php

include_once 'app/blog/EscritorEntradas.inc.php';
include_once 'app/blog/RepositorioEntrada.inc.php';

$busqueda = null;
$resultados = null;

$buscar_titulo = true;
$buscar_contenido = true;
$buscar_tags = false;
$buscar_autor = false;

$ordenar_antiguas = false;

if (isset($_POST['buscar-blog']) && isset($_POST['termino-buscar-blog']) && !empty($_POST['termino-buscar-blog'])) {
	$busqueda = $_POST['termino-buscar-blog'];


	Conexion::abrir_conexion();
	$resultados = RepositorioEntradaBlog::buscar_entradas_todos_los_campos(Conexion::obtener_conexion(), $busqueda);

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

	if (isset($_POST['termino-buscar-blog']) && !empty($_POST['termino-buscar-blog'])) {
		$busqueda = $_POST['termino-buscar-blog'];

		Conexion::abrir_conexion();

		if ($buscar_titulo) {
			$entradas_por_titulo = RepositorioEntradaBlog::buscar_entradas_por_titulo(Conexion::obtener_conexion(),  $busqueda, $orden);
		}

		if ($buscar_contenido) {
			$entradas_por_contenido = RepositorioEntradaBlog::buscar_entradas_por_contenido(Conexion::obtener_conexion(),  $busqueda, $orden);
		}

		if ($buscar_tags) {
			//añadir tags cuando existan
		}

		if ($buscar_autor) {
			$entradas_por_autor = RepositorioEntradaBlog::buscar_entradas_por_autor(Conexion::obtener_conexion(), $busqueda, $orden);
		}
	}
}

$titulo = "Resultados de Búsqueda";

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
		<div class="row" style="padding: 6em 0 2.5em 0;" align="center">
		    <div class="col-1 d-block d-sm-none"></div>
		    <div class="col-10 col-md-6">
		    	<br>
		        <p class="textoBlack textoTitulo"><?php echo $titulo; ?></p> 
		    </div>    
		    <div class="col-1 col-md-1"></div>	        
		    
	        <div class="col-1 d-block d-sm-none"></div>
	        <div class="col-9 col-md-4">
	        	<div class="d-block d-sm-none"><br><br></div>
	            <form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_BLOG; ?>">
					<div class="input-field">
						<i class="material-icons prefix">search</i>
						<input type="text" id="autocomplete-input" name="termino-buscar-blog" <?php if(isset($busqueda)) echo "value='".$busqueda."'" ?> class="autocomplete" required>
						<label for="autocomplete-input">Busca de nuevo</label>
						<input type="hidden" name="buscar-blog">
					</div>
	            </form>	
	        </div> 
		</div>

		<div class="row">		
			<?php
			if (isset($_POST['termino-buscar-blog']) && count((array)$resultados)) {
				?>
			<div class="col-12">
				<p align="left"><?php echo "Aquí tenemos ".count($resultados)." resultado(s) para tu búsqueda";?></p>
				<hr>			
			</div>
				<?php
			} //COMPROBAR RESULTADOS EN BÚSQUEDA MÚLTIPLE
			if (isset($_POST['buscar-blog'])) {
				if(count((array)$resultados)) {
					EscritorEntradasBlog::mostrar_entradas_busqueda($resultados);
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
					<a class="btn btn-secundario-animado" href="<?php echo RUTA_BLOG; ?>">Volver atrás</a>
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
												EscritorEntradasBlog::mostrar_entradas_busqueda_multiple($entradas_por_titulo);
												break;
											case "contenido":
											EscritorEntradasBlog::mostrar_entradas_busqueda_multiple($entradas_por_contenido);
												break;
											case "tags":
												break;
											case "autor":
												EscritorEntradasBlog::mostrar_entradas_busqueda_multiple($entradas_por_autor);
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
									<a class="btn btn-secundario-animado" href="<?php echo RUTA_BLOG; ?>">Volver atrás</a>
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
