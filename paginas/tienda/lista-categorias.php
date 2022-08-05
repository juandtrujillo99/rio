<?php

/////////////ENLISTAR LOS FICHEROS EXISTENTES
$listar = null;
$carpeta = "./assets/tienda/categorias/";//carpeta donde se guardan los archivos
$directorio=opendir($carpeta);


$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';    

    for ($i = 0; $i < 3; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }


if (!isset($_POST["subir"])||empty($_POST["subir"])) {
  $_POST["subir"]='';
}


$mensajeOk = null;        

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


$titulo = "Gestión de imágenes";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";


include_once 'seccion/admin/perfil/subir_foto.inc.php';
include_once 'seccion/cabecera-inicio.inc.php';
?>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>desaparecer-automaticamente.js"></script>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
?>



<?php //body ?>

<div class="container-fluid">
	<div class="row">	     
		<div class="col-12">
			<h1 align="center" style="padding:1.2em 0;"><?php echo $titulo; ?></h1>   
		</div>  

		<div class="col-10 row">
			<div class="col-4" align="center">
				<form class="row" method="post" enctype="multipart/form-data">
					<div class="col-6">
						<label for="formato" class="btn btn-principal-animado">Seleccionar</label>
						<input hidden type="file" name="formato" id="formato">
					</div>
					<div class="col-6">
						<input class="btn btn-secundario-animado" type="submit" name="subir" value="Cargar">
					</div>

					<?php
					///////////////////////// SUBIR UN NUEVO FICHERO /////////////////////////////////////////////
					if ($_POST["subir"] == "Cargar")
					{
					$folder = $carpeta."/".$nombreEmpresa.$string_aleatorio;
					move_uploaded_file($_FILES["formato"]["tmp_name"] , "$folder".$_FILES["formato"]["name"]);
					header("Location: #");
					}
					?>
				</form>
			</div>
			<div class="col-1"></div> 
			<div class="col-7 row">    
				<?php 
				/////////////ENLISTAR LOS FICHEROS EXISTENTES

				while ($elemento = readdir($directorio)){
					if ($elemento != '.' && $elemento != '..'){
					?>
					<div class="col-3">							
						<div class="row" style="padding:.5em">
							<div class="col-12">
								<div class="img-entrada bg-cover" style="background-image:url(<?php echo $carpeta.$elemento ;?>);"></div>
							</div>
							<div class="col-12 row" style="padding:1em .5em">
								<div class="col-11"><?php echo $elemento ;?></div>
								<div class="col-1">
									<form method="post">
										<input type="hidden" name="borrarFor" value="<?php echo $elemento ;?>">
										<button name="borrar" style="background-color: white;border: 0;"><i class="fa-regular fa-trash-can"></i></button>
										<div>
										<?php echo $mensajeOk;?>
										</div>
										<?php
										/////////////////////////////// BORRAR ARCHIVO ////////////////////////////////////       

										if (isset($_POST['borrar'])){
										$borrarFor=($_POST['borrarFor']);
										@unlink($carpeta.$borrarFor);
										header("Location: #");
										}
										?>
									</form>
								</div>
							</div>
						</div>							
						<br><br>
					</div>           
					<?php						
					}
				}
				?>        
			</div>
		</div> 

</div>


<?php //cuerpo 
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>
