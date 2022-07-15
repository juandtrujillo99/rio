<?php //inicio ?>

<div class="row d-block d-sm-none">
    <?php //seccion portada moviles ?>
    <div class="col-12">
        <img loading="lazy" itemprop="image" alt="imagen de portada de SYLVI" style="margin-top: 2em" src="<?php echo RUTA_IMG_OPTIMIZADA;?>fondo/suscribete-a-newsletter-m.webp" class="imagen">
    </div>
    <div class="col-12 row" style="margin-top:-15em;margin-bottom:3em">
        <div class="col-1"></div>
        <form role="form" method="post" class="col-10 suscripcion" action="<?php echo RUTA_REGISTRO; ?>">
            <div class="col-12 row bg valign-wrapper">
                <div class="col-12 texto">
                    <br>
                    <h1 class="textoBold titulo">Aprende a combinar tus prendas uniendote a nuestra newsletter</h1>
                    <h3 class="textoBook subtitulo" itemprop="description">Dinos a donde quieres que te enviemos notificaciones para que no te pierdas de nada.</h3>
                </div>
                <div class="col-1"></div>
                <div class="col-10 input-field">
                    <input type="text" name="nombre" id="nombre" class="validate">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="col-1"></div>
                <div class="col-1"></div>
                <div class="col-10 input-field">
                    <input type="email" name="email" id="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right">Email</label>
                </div>
                <div class="col-12 center-align">
                    <button type="submit" id="boton" class="btn btn-principal-animado" name="enviar">¡Listo!</button>
                    <br><br>
                </div>
            </div>
        </form> 
    </div>
</div>

<?php //inicio ?>



<?php //inicio ?>

<div class="row d-none d-sm-block" style="background-color: white;">
    <?php //seccion portada pc ?>
    <div class="sobreponer2">
        <div class="imagen-background2">
            <img loading="lazy" itemprop="image" alt="Suscríbete a la newsletter de SYLVI" src="<?php echo RUTA_IMG_OPTIMIZADA;?>fondo/suscribete-a-newsletter.webp" class="imagen">
        </div>
        <div class="filtro2"></div>
        <div class="row">
            <div class="col-12">
                <p class="textoBold" style="font-size: 3.8em;line-height: 1.2em;">Aprende a combinar tus prendas</p>
                <p itemprop="description" class="textoBook" style="font-size: 1.2em;">Dinos a donde quieres que te enviemos notificaciones para que no te pierdas de nada.<br><br></p>
            </div>
            <div class="col-12">
                <form role="form" method="post" class="row suscripcion" action="<?php echo RUTA_REGISTRO; ?>">
                    <div class="col-12 row bg center-align valign-wrapper">
                        <div class="col-4 input-field" style="padding-left:2em;">
                            <input type="text" name="nombre" id="nombre" class="validate" placeholder="Escribe tu nombre">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4 input-field">
                            <input type="email" name="email" id="email" class="validate" placeholder="Escribe tu correo electrónico">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                            <button type="submit" id="boton" class="btn btn-principal-animado" name="enviar">¡Listo!</button>
                        </div>
                    </div>
                </form> 
            </div>            
        </div>
    </div>
</div>

<?php //inicio ?>