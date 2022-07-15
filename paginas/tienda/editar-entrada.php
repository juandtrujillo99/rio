<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/tienda/Entrada.inc.php';
include_once 'app/tienda/RepositorioEntrada.inc.php';
include_once 'app/tienda/ValidadorEntradaEditada.inc.php';

include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion :: abrir_conexion();

if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];
	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}

if (isset($_POST['guardar_cambios_entrada'])) {
	$entrada_publica_nueva = 0;
	if (isset($_POST['publicar']) && $_POST['publicar'] == "si") {
		$entrada_publica_nueva = 1;
	}


	$validador = new ValidadorEntradaEditadaTienda($_POST['titulo'], $_POST['titulo-original'], $_POST['url'], $_POST['url-original'], $_POST['imagen'], $_POST['imagen-original'], $_POST['url_externa'], htmlspecialchars($_POST['url_externa-original']), $_POST['precio'], $_POST['precio-original'], $_POST['texto'], htmlspecialchars($_POST['texto-original']), $_POST['etiqueta'], $_POST['etiqueta-original'], $entrada_publica_nueva, $_POST['publicar-original'], Conexion :: obtener_conexion());

	if (!$validador -> hay_cambios()) {
		Redireccion :: redirigir(RUTA_GESTOR_ENTRADAS_TIENDA);
	} else {
		if ($validador -> entrada_valida()) {
			$cambio_efectuado = RepositorioEntradaTienda :: actualizar_entrada(Conexion :: obtener_conexion(),
				$_POST['id-entrada'], $validador -> obtener_titulo(), $validador -> obtener_url(), $validador -> obtener_imagen(), $validador -> obtener_url_externa(), $validador -> obtener_precio(),
				$validador -> obtener_texto(), $validador -> obtener_etiqueta(), $validador -> obtener_checkbox());

			if ($cambio_efectuado) {
				//echo 'ENTRADA VÁLIDA Y GUARDADA';
				Redireccion :: redirigir(RUTA_GESTOR_ENTRADAS_TIENDA);
			}
		}
	}
}

$titulo = "Editar producto de la tienda";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";

include_once 'seccion/cabecera-inicio.inc.php';
?>
<script type='text/javascript' src="<?php echo RUTA_JS; ?>formatoDinero.js" async='async'></script>
<?php
include_once 'scripts/tienda/barra-progreso.php';//script que sube las imagenes de las entradas
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';

?>
<div class="container" style="margin-bottom: 3em;">
	<div class="row valign-wrapper">
		<div class="col-12" style="padding: 7em 0 2em 0;">
		    <h1 class="text-center textoBlack textoTitulo"><?php echo $titulo; ?></h1>
		</div>

		<div class="col-12 row">
			<div class="col-1"></div>
			<div class="col-10">
				<form method="post" action="<?php echo RUTA_EDITAR_ENTRADA_TIENDA ?>">
				<?php
					if (isset($_POST['editar_entrada'])) {
						$id_entrada = $_POST['id_editar'];

						$entrada_recuperada = RepositorioEntradaTienda :: obtener_entrada_por_id(
							Conexion::obtener_conexion(), $id_entrada);

						include_once 'seccion/tienda/form_entrada_recuperada.inc.php';

						Conexion::cerrar_conexion();
					} else if (isset($_POST['guardar_cambios_entrada'])) {
						$id_entrada = $_POST['id-entrada'];
						$entrada_recuperada = RepositorioEntradaTienda :: obtener_entrada_por_id(
							Conexion::obtener_conexion(), $id_entrada);		

						include_once 'seccion/tienda/form_entrada_recuperada_validada.inc.php';
					}
				?>
				<br>
				<button type="submit" class="btn btn-secundario-animado" name="guardar_cambios_entrada">Guardar cambios</button>
				</form>	
			</div>
		</div>
	</div>
</div>

<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>