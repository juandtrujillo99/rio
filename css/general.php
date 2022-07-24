<?php
    header("Content-type: text/css; charset: UTF-8");
    include_once 'identidad-corporativa.inc.php';
    /* las lineas estan corridas algunas casillas hacia abajo porque este codigo no se muestra en el navegador*/
?>

/*estilos para pc*/

html{scroll-behavior: smooth;}

*{margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;}

*::-moz-selection{background: <?php echo $colorMarca3;?>;color: #000;}

*::selection {background: #c9b340;color: #000;}

body{font-family: <?php echo $textoBook;?>;}

/*barra de scroll*/
body::-webkit-scrollbar {width: 6px;background: <?php echo $colorMarca4;?>;}
body::-webkit-scrollbar-thumb {background: <?php echo $colorMarca;?>;border-radius: 10px;border-right: 2px solid <?php echo $colorMarca;?>;}
/*barra de scroll*/

.bg-image{background-position: center center; background-attachment: scroll; background-size: cover;}


.mayusculas{text-transform: uppercase;}
.minusculas{text-transform: lowercase;}

.textoBlack{font-family: <?php echo $textoBlack;?>;text-transform: uppercase;}
.textoBold{font-family: <?php echo $textoBold;?>;letter-spacing: .05em;}
.textoBookBold{font-family: <?php echo $textoBookBold;?>;text-transform: uppercase;}
.textoBook{font-family: <?php echo $textoBook;?>}


.textoColorMarca{color: <?php echo $colorMarca;?>;}
.textoColorMarca1a{color: <?php echo $colorMarca1a;?>;}
.textoColorMarca3{color: <?php echo $colorMarca3;?>;}
.textoColorMarca4{color: <?php echo $colorMarca4;?>;}


.textoTitulo{font-size: 3em;font-family: <?php echo $textoBold;?>;letter-spacing: -.01em;line-height: 1em;}
.textoTitulo1{font-size: 2.5em;font-family: <?php echo $textoBold;?>;letter-spacing: .01em;line-height: 1em;}
.textoTitulo1a{font-size: 2em;font-family: <?php echo $textoBlack;?>;letter-spacing: -.01em;line-height: 1em;}
.textoSubtitulo{font-size: 2em;font-family: <?php echo $textoBold;?>;}
.textoSubtitulo1{font-size: 2em; margin-top: -.4em;}
.textoSubtituloMarginIzq{font-size: 2em;margin-left: 1em;margin-top: -1em;}
.textoParrafo{font-size: 1.5em;line-height: 1em;font-family: <?php echo $textoBook;?>;}
.textoParrafo1{font-size: 1.1em;line-height: 1.2em;}
.textoParrafo1a{font-size: .8em;line-height: .8em;}

.enlaceSubrayado{text-decoration: underline;color: <?php echo $colorMarca;?>;}


/*

.btn-principal{ background:transparent;color: white; border-radius: 0;}
.btn-principal:hover, .btn-principal:active{background-color: white;color: black;}

*/

.btn-claro{background-color: <?php echo $colorMarca?>; padding: 1em 2em;color: white;transform: skew(-15deg);}
.btn-claro:hover{box-shadow: inset 0px 0px 0px .4em <?php echo $colorMarca4?>;background-color: <?php echo $colorMarca4?>;}

.btn-oscuro{background-color: #000; padding: 1em 2em;color: white;transform: skew(-15deg);}
.btn-oscuro:hover{box-shadow: inset 0px 0px 0px .4em <?php echo $colorMarca4?>;background-color: <?php echo $colorMarca4?>;}




.btn-principal{box-shadow: inset 0px 0px 0px 4px black;line-height: 1.5em;padding: 1em 2em;}
.btn-principal:hover{box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca?>;}



.btn-principal-invertido{box-shadow: inset 0px 0px 0px 4px #c9c9c9; color: #c9c9c9;}
.btn-principal-invertido:hover{box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca?>; color: #c9c9c9;}



.btn-secundario{box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca4?>; color:<?php echo $colorMarca4?>;}
.btn-secundario:hover{box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca?>;}



.btn-principal-animado{
  box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca?>;
  padding: .5em 2em;
  font-family: <?php echo $textoBold;?>;
  color: <?php echo $colorMarca4?>;
  background-image: transparent 50%;
  background-size: 200%;
  background-position: 0% 50%;
  font-size: 1.2em;
  border-radius: 0;}


.btn-principal-animado:hover, .btn-principal-animado:active{color: <?php echo $colorMarca4?>;

  background-position: 100% 50%;transition: .4s;

background-image: linear-gradient(to right, transparent 50%, <?php echo $colorMarca;?> 50%, <?php echo $colorMarca;?> 100%);}





.btn-secundario-animado{
  box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca?>;
  padding: .5em 2em;
  font-family: <?php echo $textoBold;?>;
  color: <?php echo $colorMarca2?>;
  background-image: transparent 50%;  
  background-size: 200%;
  background-position: 0% 50%;
  font-size: 1.2em;
  border-radius: 0;}


.btn-secundario-animado:hover, .btn-principal-animado:active{color: <?php echo $colorMarca2?>;

  background-position: 100% 50%;transition: .4s;

background-image: linear-gradient(to right, transparent 50%, <?php echo $colorMarca4;?> 50%, <?php echo $colorMarca4;?> 100%);}





.btn:focus, .btn-large:focus,

.btn-floating:focus {

  background-color: #000;

  color: #fff;

}



.imagen{max-width: 100%;width: 100%}
.imagen-2{max-width: 50%;width: 50%}
.imagen-3{max-width: 33.3%;width: 33.3%}
.imagen-4{max-width: 25%;width: 25%}
.imagen-5{max-width: 10%;width: 10%}

.copyright{background-color:<?php echo $colorMarca4;?>;padding: .6em 1em 1em 1em;}
.copyright a{color:<?php echo $colorMarca4;?>;padding-top: .4em;}
.dev{background-color:<?php echo $colorMarca3;?>;padding: 1.5em 1em 2em 1em;}

.social-m {color: <?php echo $colorMarca2;?>;}
.social-m a{font-size: 1.5em;color: <?php echo $colorMarca2;?>;}
.social-m a:hover,.social-m a:focus {color: <?php echo $colorMarca;?>;}

.social2-m {padding: 2em 0;color: <?php echo $colorMarca4;?>;}
.social2-m a{font-size: 2.5em;padding: 0 .2em;color: <?php echo $colorMarca4;?>;}
.social2-m a:hover,.social2-m a:focus {color: <?php echo $colorMarca;?>;}

.social-pc {padding: 2em 0;color: <?php echo $colorMarca2;?>;}
.social-pc a{font-size: 2.5em;padding: 0 .2em;color: <?php echo $colorMarca2;?>;}
.social-pc a:hover,.social-pc a:focus {color: <?php echo $colorMarca;?>;}

.social2-pc {padding: 2em 0;color: <?php echo $colorMarca4;?>;}
.social2-pc a{font-size: 2.5em;padding: 0 .2em;color: <?php echo $colorMarca4;?>;}
.social2-pc a:hover,.social2-pc a:focus {color: <?php echo $colorMarca;?>;}


.planBg {background-color:#000;}
.planBg .titlePlan{padding: 1em 0;}
.planBg .pricePlan{padding: 1em 0;background-color: white;}
.planBg .pricePlan .discountPlan{background-color: <?php echo $colorDescuento; ?>; color: white;text-transform: uppercase;}
.planBg .pricePlan .lastPricePlan{text-decoration: line-through;padding-top: .5em}
.planBg .descriptionPlan{padding: 1em 0;color: white;}


.buyPlan{background-color: white;padding-top:1.5em;}

.agotado{
  filter:grayscale(100%) blur(2px);
}

.card{background-color:<?php echo $colorMarca2;?>;color:<?php echo $colorMarca4;?>}
.card .card-action a:not(.btn):not(.btn-large):not(.btn-small):not(.btn-large):not(.btn-floating) {color:<?php echo $colorMarca4;?>;}
.card .card-content{padding:.1em 0;}
.card .card-content .titulo{padding:.5em 0;line-height: 1em;}

#registro-usuarios{padding:3em 0;}
#registro-usuarios .col-md-4{padding:0 3em;}
#registro-usuarios .input-field{padding: .5em 0;}

.perfil .boton {background-color: <?php echo $colorMarca;?>;color: white;text-align: left;}

.entrada p i{font-family: <?php echo $textoBlack;?>;text-transform: uppercase;letter-spacing: .035em;font-size: 2.5em;line-height: 1em;}
.entrada p{font-size: 1.2em;line-height: 1.5em;}
.entrada .tienda{font-size: 1em;line-height: 1.5em;}
.entrada .color{width: 2em;height: 2em;margin-right: .5em;box-shadow: inset 0px 0px 0px .1em <?php echo $colorMarca3?>;display: inline-block;}
.entrada b{font-family: <?php echo $textoBookBold;?>;font-size: 1.2em;}

.suscripcion .bg{background-color: black;}
.suscripcion .texto{color: <?php echo $colorMarca4;?>;padding:0 2em;}
.suscripcion .texto .titulo{font-size: 1.7em;line-height: .9em;}
.suscripcion .texto .subtitulo{font-size: 1em;padding-top: .5em;}
.suscripcion input:not(.browser-default){color: <?php echo $colorMarca4;?>;border-bottom: 1px solid <?php echo $colorMarca4;?>;}

.footer a i{color: <?php echo $colorMarca2;?>;padding: 0 .5em;}
.footer .sec2{box-shadow: 0px .1px 5px 0px rgba(0,0,0,0.1);padding:1em 0;}
.footer .sec2 a:hover{text-decoration: underline;}