<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/tienda/Entrada.inc.php';
include_once 'app/tienda/RepositorioEntrada.inc.php';
include_once 'app/tienda/ValidadorEntrada.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/Redireccion.inc.php';


if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];
	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}

$entrada_publica = 0;
if (isset($_POST['guardar'])) {
	Conexion :: abrir_conexion();
	
	$validador = new ValidadorEntradaTienda($_POST['titulo'], $_POST['url'], $_POST['imagen'], $_POST['url_externa'], $_POST['precio'], $_POST['texto'], $_POST['etiqueta'], Conexion :: obtener_conexion());

	//var_dump($validador -> obtener_texto()); //aun no se para que sirve, creo que solo es una prueba
	
	if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
		$entrada_publica = 1;
	}
	
	if ($validador -> entrada_valida()) {
		if (ControlSesionAdmin :: sesion_iniciada()) {
			
			$entrada = new EntradaTienda('', $_SESSION['id_admin'], $validador -> obtener_url(), $validador -> obtener_imagen(), $validador -> obtener_url_externa(), $validador -> obtener_precio(), $validador -> obtener_titulo(),
				$validador -> obtener_texto(), $validador -> obtener_etiqueta(),'', $entrada_publica);//es muy importante que aqui el orden sea el mismo que el de la tabla de la base de datos
				
			$entrada_insertada = RepositorioEntradaTienda :: insertar_entrada(Conexion :: obtener_conexion(), $entrada);
			if ($entrada_insertada) {
				Redireccion::redirigir(RUTA_GESTOR_ENTRADAS_TIENDA);
			}
		} else {
			Redireccion :: redirigir(RUTA_LOGIN);
		}
		
		Conexion :: cerrar_conexion();
	}
}

$titulo = "Crear nuevo producto";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";

include_once 'seccion/cabecera-inicio.inc.php';
?>
<script type='text/javascript' src="<?php echo RUTA_JS; ?>formatoDinero.js" async='async'></script>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>scroll-off.php">
<?php
include_once 'scripts/tienda/barra-progreso.php';//script que sube las imagenes de las entradas
include_once 'scripts/tienda/barra-progreso-archivo-imagen.php';//script que sube las imagenes de las entradas
include_once 'scripts/tienda/lista-categorias.php';
include_once 'seccion/cabecera-cierre.inc.php';
?>

<div class="container-fluid">
	<div class="d-block d-sm-none" style="background-color: #202020;color: white;padding: .5em 1em;font-size: 1.5em;position: fixed;width: 100%;z-index: 1001;">
		<div class="row">
	        <div class="col-2">
	            <a style="color: white;" href="<?php echo RUTA_GESTOR_ENTRADAS_TIENDA;?>"><i class="fa-solid fa-angle-left"></i></a>
	        </div>
	        <div class="col-10"><?php echo $titulo; ?></div>
        </div>
    </div>
	
	<div class="row">  
		<div class="col-md-2">
			<?php  include 'seccion/tienda/panel-ayuda-lateral.inc.php';?>
		</div>
		<div class="col-md-10 row">
			<div class="row valign-wrapper">
				<div class="col-12" style="padding: 3em 0 1em 0;">
				    <p class="text-center textoBlack mayusculas d-none d-sm-block" style="font-size:2em;padding:0 2em;line-height:1.1em"><?php echo $titulo; ?></p>
				</div>

				<div class="col-12 row">
					<div class="col-1"></div>
					<div class="col-10">
						<form method="post" action="<?php echo RUTA_NUEVA_ENTRADA_TIENDA ?>">
							<?php
								if (isset($_POST['guardar'])) {
									include_once 'seccion/tienda/form_nueva_entrada_validado.inc.php';
								} else {						
									include_once 'seccion/tienda/form_nueva_entrada_vacio.inc.php';
								}
							?>					
						</form>
					</div>
				</div>
			</div>
			<?php include_once 'seccion/copyright.inc.php';?>
		</div>
	</div>
</div>



<?php //abrir el buscador Modal ?>
	<div id="agotadoHelp" class="modal">
		<div class="modal-content">
			<form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_TIENDA; ?>">
				<div class="input-field">
					<i class="material-icons prefix">search</i>
					<input type="text" id="autocomplete-input" placeholder="¿Te ayudo a buscar?" name="termino-buscar-tienda" required class="autocomplete">				
					<input type="hidden" name="buscar-tienda">
				</div>
            </form>	
		</div>
	</div>



<script src="<?php echo RUTA_JS; ?>formato-texto.js"></script>
<?php
include_once 'seccion/doc-terminacion.inc.php';
?>
