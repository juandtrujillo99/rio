<div class="row">
    <div class="col-1 d-block d-sm-none"></div>
    <div align="center" class="col-10 col-md-12 bg-image" style="background-image: url(<?php echo RUTA_IMG_OPTIMIZADA;?>fondo/profile-cover.webp);">
        <div class="valign-wrapper row">
            <div class="d-none d-sm-block" style="height: 50vh;"></div>
            <div class="d-block d-sm-none" style="height: 30vh;"></div>
            <div align="center" class="col-12">
                <p class="textoBlack textoTitulo1a white-text" style="font-size: 2.5em;">Hola <?php echo $usuario -> obtener_nombre(); ?></p>
            </div>            
        </div>
    </div>  
    <div class="col-1 d-block d-sm-none"></div>



    <div class="col-1 col-md-4"></div>
    <div class="col-10 col-md-4 row" align="center">

        <div id="actualizar" class="modal bottom-sheet col-12 col-md-12" style="max-height: 100%;">    
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat white-text" style="position: absolute;right: 0;background-color: black;padding: .05em 2.5em;">X</a>
            <div style="background-color:#A60303;padding: 3em 0;">
                <p class="textoBold textoSubtitulo white-text">CONFIGURACIÓN DE TU foto del perfil</p>
            </div>
            <div>
                <form class="text-center row" action="<?php echo RUTA_PERFIL; ?>" method="post" enctype="multipart/form-data">
                    <?php
    if(file_exists(DIRECTORIO_RAIZ."/assets/fotos-perfil/usuario/".$usuario->obtener_email()."foto")) {
                        ?>  
                    <div class="col-12 col-md-6" style="background-color:black;padding: 2em 0;">
                        <br>
                        <a target="_blank" class="btn btn-principal-animado" href="<?php echo SERVIDOR.'/assets/fotos-perfil/usuario/'.$usuario->obtener_email()."foto"; ?>" data-lightbox="Foto de perfil" data-title="Foto de perfil">Ver foto</a>
                        <input class="btn btn-principal-animado" type="submit" value="Eliminar" name="borrar"><br>
                    </div>
                    <div class="d-block d-sm-none col-1"></div>
                    <div class="col-10 col-md-6" style="padding: 2em 0;">            
                        <label class="btn btn-secundario-animado" for="archivo_subido" id="label-archivo" title="Selecciona una foto" style="margin-bottom: 0">Cambiar foto</label>  
                        <input class="d-none" type="file" name="archivo_subido" id="archivo_subido">    
                        <input class="btn btn-secundario-animado" type="submit" value="Subir" name="guardar_imagen" id="guardar_imagen"><br><br>
                        <p class="grey-text"><i class="fa-solid fa-circle-info"></i> Si deseas cambiar tu foto de perfil primero presiona <b>CAMBIAR FOTO</b> y después <b>SUBIR</b>.</p> 
                    </div>   
                    <div class="d-block d-sm-none col-1"></div>             
                </form> 
            </div>
        </div>

        <div class="d-none d-sm-block col-md-4"></div>
        <a class="modal-trigger col-12 col-md-4" href="#actualizar">
            <div align="center">   
                <div class="img-profile bg-cover circle" style="background-color: black;margin-top: -5em;background-image:url(<?php echo SERVIDOR.'/assets/fotos-perfil/usuario/'.$usuario->obtener_email()."foto"; ?>);"></div>
                <div class="img-profile-flag bg-cover circle d-none d-sm-block" style="background-image:url(<?php echo SERVIDOR.'/assets/paises/'.$usuario->obtener_pais(); ?>.png);"></div>
                <div class="img-profile-flag-m bg-cover circle d-block d-sm-none" style="background-image:url(<?php echo SERVIDOR.'/assets/paises/'.$usuario->obtener_pais(); ?>.png);"></div>
            </div>
        </a>
        <div class="d-none d-sm-block col-md-4"></div>

            <?php
    } else {        
                    ?>
                    <div class="col-12 col-md-6" align="left" style="background-color:black;padding: 2em 6em 3.5em 6em;color: white;">
                        <br>
                        <p class="textoBlack textoParrafo">Recomendaciones:</p><br>
                        <p>
                            1. El archivo no debe pesar más de 500kb.<br>
                            2. Sólo se admiten imágenes JPG, JPEG, PNG o GIF.
                        </p>
                    </div>
                    <div class="d-block d-sm-none col-1"></div>
                    <div class="col-10 col-md-6 center" style="padding: 4em 0;">            
                        <label class="btn btn-secundario-animado" for="archivo_subido" id="label-archivo" title="Selecciona una foto" style="margin-bottom: 0">Seleccionar foto</label>  
                        <input class="d-none" type="file" name="archivo_subido" id="archivo_subido">    
                        <input class="btn btn-secundario-animado" type="submit" value="Subir" name="guardar_imagen" id="guardar_imagen"><br><br>
                        <p class="grey-text"><i class="fa-solid fa-circle-info"></i> Primero presiona <b>SELECCIONAR FOTO</b> y después <b>SUBIR</b>.</p> 
                    </div>   
                    <div class="d-block d-sm-none col-1"></div>   
                </form>
            </div>
        </div>


        <div class="col-3 col-md-4"></div>
        <a class="col-6 col-md-4 waves-effect waves-light btn modal-trigger" style="background-color: white;margin-top: -5em;" href="#actualizar">
            <span style="font-size:6em;" class="material-icons">account_circle</span>
            <span class="material-icons">add_a_photo</span>
        </a>
        <div class="col-3 col-md-4"></div>                               
        <?php
        }
        ?>
    </div>
    <div class="col-1 col-md-4"></div>
















</div>