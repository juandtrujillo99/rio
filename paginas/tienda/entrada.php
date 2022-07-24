<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/Usuario.inc.php';
include_once 'app/admin/Admin.inc.php';
include_once 'app/tienda/Entrada.inc.php';
include_once 'app/tienda/Comentario.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/tienda/RepositorioEntrada.inc.php';
include_once 'app/tienda/RepositorioComentario.inc.php';

include_once 'app/admin/ControlSesionAdmin.inc.php';

if (ControlSesionAdmin::sesion_iniciada()) {    
    Conexion :: abrir_conexion();
    $id = $_SESSION['id_admin'];
    $admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}


$titulo = $entrada -> obtener_titulo();
$url = RUTA_ENTRADA_TIENDA . '/' .$entrada -> obtener_url();
$descripcionPagina = $descripcionAlterna;
$imagenCompartida = RUTA_TIENDA_COVER.$entrada -> obtener_imagen();

include_once 'seccion/cabecera-inicio.inc.php';
?>

<script type="text/javascript">const imageUrl = '<?php echo RUTA_TIENDA_COVER.$entrada -> obtener_imagen() ?>';</script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=625b4e8e85d62e001964c39a&product=sop' async='async'></script>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<link rel="canonical" href="<?php echo $url; ?>">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
?>
<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
<?php
//entrada.php es el archivo encargado de crear las entradas, es una plantilla
?>





<div class="container-fluid">
    <div class="barra-sup">
        <div class="d-none d-sm-block">
            <div class="row pc">
                <div class="col-2">
                    <a href="<?php echo RUTA_TIENDA;?>"><i class="fa-solid fa-angle-left"></i></a>
                </div>
                <div class="col-10">Todos los productos</div>
            </div>
        </div>
        <div class="d-block d-sm-none">
            <div class="row movil">
                <div class="col-3">
                    <a href="<?php echo RUTA_TIENDA;?>"><i class="fa-solid fa-angle-left"></i></a>
                </div>
                <div class="col-9">Todos los productos</div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-md-6 bg-image" style="background-image: url(<?php echo RUTA_TIENDA_COVER;?><?php echo $entrada -> obtener_imagen(); ?>) ;">
            <?php
            if ($entrada -> obtener_url_externa() !== ""){
            ?>
            <a class="col modal-trigger textoColorMarca" href="#mostrarDetalle">
                <img loading="lazy" itemprop="image" src="<?php echo RUTA_TIENDA_COVER.$entrada -> obtener_imagen(); ?>" class="imagen" alt="<?php echo $entrada -> obtener_titulo(); ?>" >
                <div class="imageContainer"></div>
            </a>
            <?php
            }else{
                ?>
            <a href="<?php echo RUTA_TIENDA_COVER;?><?php echo $entrada -> obtener_imagen(); ?>">
                <div class="row">
                    <div class="d-none d-sm-block section"></div>                
                    <div class="d-block d-sm-none" style="height: 50vh;">
                        <div class="imageContainer"></div>
                    </div>
                </div>
            </a>
            <?php
            }
            ?>            
        </div>

        <?php // informacion para pc  ?> 
        <div class="col-md-6 d-none d-sm-block" style="height: 100vh;position: absolute;right: 0;overflow-y: scroll;padding: 3em 4em; scroll-behavior: smooth;">
            <h1 class="textoBold mayusculas" style="letter-spacing: .01em"><?php echo $entrada -> obtener_titulo(); ?></h1>
            <?php 
            if (ControlSesionAdmin::sesion_iniciada()) {
                ?>
                <form method="post" action="<?php echo RUTA_EDITAR_ENTRADA_TIENDA; ?>">
                    <input type="hidden" name="id_editar" value="<?php echo $entrada -> obtener_id(); ?>">
                    <button type="submit" class="btn btn-principal" name="editar_entrada">Editar</button>
                </form>
            <?php 
            }?>  
            <br>
            <div class="textoParrafo1a">SKU: <?php echo $entrada -> obtener_url(); ?></div>             
            <br>
            <div class="row valign-wrapper">
                <div class="col-4">
                    <div class="textoParrafo" title="Pesos colombianos">$<?php echo $entrada -> obtener_precio(); ?> COP</div>  
                </div>
                <a class="col-6 btn btn-secundario-animado" style="font-size: .8em" href="<?php echo $whatsappCompra."%20".RUTA_ENTRADA_TIENDA."/".$entrada -> obtener_url(); ?>"><p>Comprar</p></a>
            </div>
            <br><br>
            <p><?php echo nl2br($entrada -> obtener_texto()); ?></p>      
            <br><br>
            <div class="sharethis-inline-share-buttons"></div>
        </div>

        <?php // informacion para moviles  ?>  
        <div class="col-12 d-block d-sm-none" style="padding: 3em;margin-top: -2em;background-color: white;border-radius: 2em;">
            <h1 class="textoBold mayusculas" style="letter-spacing: .01em"><?php echo $entrada -> obtener_titulo(); ?></h1>
            <?php 
            if (ControlSesionAdmin::sesion_iniciada()) {
                ?>
                <form method="post" action="<?php echo RUTA_EDITAR_ENTRADA_TIENDA; ?>">
                    <input type="hidden" name="id_editar" value="<?php echo $entrada -> obtener_id(); ?>">
                    <button type="submit" class="btn btn-principal" name="editar_entrada">Editar</button>
                </form>
            <?php 
            }?>  
            <br>
            <div class="textoParrafo1a">SKU: <?php echo $entrada -> obtener_url(); ?></div>             
            <br>
            <div class="col-12">
                <div class="textoParrafo" title="Pesos colombianos">$<?php echo $entrada -> obtener_precio(); ?> COP</div>  
            </div>
            <br>
            <a class="col-12 btn btn-secundario-animado" style="padding: .5em" href="<?php echo $whatsappCompra."%20".RUTA_ENTRADA_TIENDA."/".$entrada -> obtener_url(); ?>"><p>Comprar</p></a>
            <br><br>
            <p><?php echo nl2br($entrada -> obtener_texto()); ?></p>      
            <br><br>
            <div class="sharethis-inline-share-buttons"></div>


        </div>
        <div class="col-12 row" style="background-color: #0d0d0d; color: white;">
            <div class="col-1"></div>
            <div class="col-10">
                <script async src="https://comments.app/js/widget.js?3" data-comments-app-website="-69nWccB" data-limit="5" data-color="000"></script>
                <br><br>
                <?php include_once 'seccion/tienda/entradas_al_azar.inc.php'; ?>  
                <br><br>              
            </div>
        </div>
    </div>
</div>





<!-- Modal para cambio de nombre y apellido -->
<div id="mostrarDetalle" class="modal">
    <div class="modal-content">
        <div class="row col-12">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-12">
                <?php echo $entrada -> obtener_url_externa(); ?>                          
            </div>
            <div class="col-md-3"></div>
        </div>        
    </div>
</div>


<?php
include_once 'seccion/footer.inc.php';
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
