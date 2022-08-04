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


$titulo = "Inicio | ".$nombreEmpresa;
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."logo/cuadrado.webp";


include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>scroll-x.php">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
if(ControlSesionAdmin :: sesion_iniciada()){
	include_once 'scripts/tienda/barra-progreso-archivo-imagen.php';//script que sube las imagenes de las entradas
}
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>


<div class="container">		
		<div class="row">
			<div class="col-12 center-align" style="padding:6em 0 2em 0; font-size: 1em;">
				<div class="d-none d-sm-block"><br><br></div>
				<?php include_once 'scripts/categorias.php'; ?>
			</div>

			<div class="col-12 center-align">
				<p class="textoBook d-block d-sm-none">Nuevos productos</p>
				<p class="textoBook d-none d-sm-block">Nuevos productos</p>
			</div>
			<div class="col-12 row">
				<div class="col-md-1"></div>				
				<div class="col-md-10 col-12 row">
					<?php EscritorEntradasTienda::escribir_cuatro_entradas(); ?>
				</div>
				<div class="col-1"></div>	
				<div class="col-12 center-align">	
					<br>				
				    <a class="btn btn-secundario-animado" href="<?php echo RUTA_TIENDA; ?>"><p class="textoBold">Ver más</p></a>
				    <br><br><br>
				</div>
			</div>
		</div>
</div>

<?php //body ?>



<?php
include_once 'seccion/footer.inc.php';
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>