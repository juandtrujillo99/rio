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


$titulo = "Escoge una opción";
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."logo/cuadrado.webp";


include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
?>


<div class="container-fluid section" style="background-image: url(<?php echo RUTA_IMG_OPTIMIZADA.'fondo/linktree-m.webp';?>);background-size: cover;background-repeat: none;background-attachment: fixed;background-position: bottom center;">    

    <div class="row" align="center">
        <div class="col-12" style="margin-top: 6em;"></div>

        <div class="col-12">
            <div class="col-2 col-md-4"></div>
            <div class="col-8 col-md-4">
                <img itemprop="image" loading="lazy" src="<?php echo RUTA_IMG_OPTIMIZADA;?>logo/cuadrado.webp" class="imagen-2 circle" style="padding:1em;background-color: white;"> 
                <br><br>
                <p class="mayusculas textoBold" style="font-size: 1.1em;"><b>Con el más alto estándar de fabricación, color y calidad.</b></p>               
            </div>
            <div class="col-2 col-md-4"></div>   
        </div> <?php ///bien?>

        <div class="d-none d-sm-block col-md-3"></div>
        <div class="anime-1 row col-12 col-md-6">
            <div class="col-12" style="margin-top:6em;"></div>
            <div class="col-1"></div>  
            <div class="col-10 row">  
	            <div class="col-12">              
	                <a class="btn btn-secundario-animado  modal-trigger black-text" style="background-color: #F3D3C0;width: 100%;" href="<?php echo $whatsappEmpresa;?>"><p class="textoBold" style="padding: .5em 0;" itemprop="name">Comprar por Whatsapp</p></a>
	            </div>
	            <div class="col-12">
	                <br>
	                <a class="btn btn-secundario-animado  modal-trigger black-text" style="background-color: #F3D3C0;width: 100%;" href="<?php echo RUTA_TIENDA;?>"><p class="textoBold" style="padding: .5em 0;" itemprop="name">cátalogo</p></a>
	            </div> 
            </div>
            <div class="col-1"></div>  
        </div> 
        <div class="d-none d-sm-block col-md-3"></div>     


        <div id="contacto" class="row social-pc" align="center">
            <div class="col-12" style="padding: 4em 0 1em 0;">
            	<div class="d-none d-sm-block" style="padding-top: 2em;"></div>
                <?php include 'seccion/social.inc.php'; ?>
                <p><font class="textoBold textoParrafo1"><?php echo $nickEmpresa;?></font></p>
            </div>
        </div>
        <?php
include_once 'seccion/copyright.inc.php';
?>
    </div>
</div>

<?php //body ?>



<?php
include_once 'seccion/doc-terminacion.inc.php';
?>