<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/admin/RepositorioAdmin.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';

if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];
	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}


$titulo = "Administración | $nombreEmpresa";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";


include_once 'seccion/admin/perfil/subir_foto.inc.php';
include_once 'seccion/cabecera-inicio.inc.php';
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

<div class="container">
	<?php
	include_once 'seccion/admin/perfil/portada.inc.php';
	?>
  
	<div class="row perfil" style="padding: 2em;">
	    <div class="col-12 col-md-6 row textoParrafo center-align valign-wrapper">
	        <a href="<?php echo RUTA_GESTOR_ENTRADAS_TIENDA;?>" class="col-12 tooltipped" data-position="top" data-tooltip="Gestionar tienda" style="padding:.5em">
	            <p class="boton"><i style="padding:.5em" class="fa-solid fa-tag"></i> Gestionar tienda</p>
	        </a>		        
	        <a href="<?php echo RUTA_REGISTRO_ADMIN; ?>" class="col-12 tooltipped" data-position="top" data-tooltip="Registrar nuevo colaborador" style="padding:.5em">
	            <p class="boton"><i style="padding:.5em" class="fa-solid fa-user-pen"></i> Nuevo colaborador</p>
	        </a>        
	        <a href="<?php echo $urlEmpresaAlterna; ?>" class="col-12 tooltipped" data-position="top" data-tooltip="ir a SYLVI" style="padding:.5em">
	            <p class="boton"><i style="padding:.5em" class="fa-solid fa-pen-to-square"></i> Ir a SYLVI</p>
	        </a>
	    </div>
   	 	<div class="d-none d-sm-block col-md-1"></div>
	    <div class="col-12 col-md-5">   
	    	<div class="d-block d-sm-none"><br></div>	
	        <?php include_once 'seccion/admin/perfil/datos.inc.php';?>
	    </div>
	</div>

</div>


<?php //cuerpo 
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>
