<?php


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


$titulo = "Imagenes de $nombreEmpresa";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";


include_once 'seccion/admin/perfil/subir_foto.inc.php';
include_once 'seccion/cabecera-inicio.inc.php';
?>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>desaparecer-automaticamente.js"></script>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<?php //body ?>

<div class="container">
	<div class="row" style="padding-top: 8em;">	     
		<div class="col-12">
			<h3 align="center">Archivos en carpeta</h3>  
			<br> 
		</div>    
		<?php 


		/////////////ENLISTAR LOS FICHEROS EXISTENTES
		$listar = null;
		$carpeta = "./assets/tienda/categorias/";//carpeta donde se guardan los archivos
		$directorio=opendir($carpeta);


		while ($elemento = readdir($directorio)){
			if ($elemento != '.' && $elemento != '..'){
				if (is_dir($carpeta.$elemento)){
					echo "";
				?>
				
				<?php
				}else{
				?>
				<div class="col-3">
					<div class="img-profile bg-cover" style="background-image:url(<?php echo $carpeta.$elemento ;?>);"></div>
					<p><?php echo $elemento ;?></p> 
				</div>            
				<?php
				}
			}
		}


		?>        
	</div>

</div>


<?php //cuerpo 
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>
