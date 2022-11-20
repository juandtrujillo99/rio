<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/ControlSesion.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
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


$titulo = "Joyería ".$nombreEmpresa;
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."logo/cuadrado3.webp";


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
include_once 'scripts/tienda/lista-categorias.php';
?>



<?php //body ?>

<div class="container">
	<?php
		include_once 'seccion/inicio/portada.inc.php';	
		?>	
		<div class="row">
			<div class="col-12 row">			
				<div class="col-12 row">
					

			<div class="col-12 center-align d-none d-sm-block" style="padding:3em 0;">
				<div><br><br></div>
			</div>






<div class="col-12 row">
	<form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_TIENDA; ?>" class="col-12 row">
		<?php
		for($i=0;$i<count($categorias);$i++){
			?>
		<button name="termino-buscar-tienda" value="<?php echo $categorias[$i]['nombre'];?>" class="col-md-3 col-6" style="padding: 1em;border: 0;background-color: transparent; ">
			<div class="row card">
				<div class="card-image">
					<div class="img-entrada bg-cover" style="background-image:url(<?php echo RUTA_TIENDA_CATEGORIAS.$categorias[$i]["img"];?>);"></div>
				</div>
				<div class="card-content">
					<p class="titulo textoBold mayusculas"><?php echo $categorias[$i]['nombre'];?></p>
				</div>
			</div>					
		</button>
		<input type="hidden" name="buscar-tienda">
			<?php
			}
		?>
	</form>	
</div>	

<?php /*
<div class="d-block d-sm-none">
	<form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_TIENDA; ?>">
		<div class="media-scroller-m snaps-inline sombra">
			<input type="hidden" name="buscar-tienda">
			<?php
			for($i=0;$i<count($categorias);$i++){
				?>
				<div class="media-element">
					<button name="termino-buscar-tienda" value="<?php echo $categorias[$i]['nombre'];?>">
						<div class="img-entrada bg-cover" style="background-image:url(<?php echo RUTA_TIENDA_CATEGORIAS.$categorias[$i]["img"];?>);"></div>
						<p><?php echo $categorias[$i]['nombre'];?></p>
					</button>
				</div>
				<?php
				}
			?>
		</div>	
	</form>	
</div>
*/
?>










				</div>
				<div class="col-12"><br><br></div>	
			</div>
		</div>
</div>

<?php //body ?>

<?php
include_once 'seccion/footer.inc.php';
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>