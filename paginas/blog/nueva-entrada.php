<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/blog/Entrada.inc.php';
include_once 'app/blog/RepositorioEntrada.inc.php';
include_once 'app/blog/ValidadorEntrada.inc.php';
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
	
	$validador = new ValidadorEntradaBlog($_POST['titulo'], $_POST['url'], $_POST['imagen'], $_POST['url_externa'], $_POST['texto'], $_POST['etiqueta'], Conexion :: obtener_conexion());

	//var_dump($validador -> obtener_texto()); aun no se para que sirve, creo que solo es una prueba
	
	if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
		$entrada_publica = 1;
	}
	
	if ($validador -> entrada_valida()) {
		if (ControlSesionAdmin :: sesion_iniciada()) {
			
			$entrada = new EntradaBlog('', $_SESSION['id_admin'], $validador -> obtener_url(), $validador -> obtener_imagen(), $validador -> obtener_url_externa(), $validador -> obtener_titulo(),
				$validador -> obtener_texto(), $validador -> obtener_etiqueta(),'', $entrada_publica);//es muy importante que aqui el orden sea el mismo que el de la tabla de la base de datos
				
			$entrada_insertada = RepositorioEntradaBlog :: insertar_entrada(Conexion :: obtener_conexion(), $entrada);
			if ($entrada_insertada) {
				Redireccion::redirigir(RUTA_GESTOR_ENTRADAS_BLOG);
			}
		} else {
			Redireccion :: redirigir(RUTA_LOGIN);
		}
		
		Conexion :: cerrar_conexion();
	}
}

$titulo = "Nueva entrada de la newsletter";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/blog/barra-progreso.php';//script que sube las imagenes de las entradas
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
				<form class="form-nueva-entrada" method="post" action="<?php echo RUTA_NUEVA_ENTRADA_BLOG ?>">
					<?php
						if (isset($_POST['guardar'])) {
							include_once 'seccion/blog/form_nueva_entrada_validado.inc.php';
						} else {						
							include_once 'seccion/blog/form_nueva_entrada_vacio.inc.php';
						}
					?>
					<br>
					<button type="submit" class="btn btn-secundario-animado" name="guardar">Publicar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>
