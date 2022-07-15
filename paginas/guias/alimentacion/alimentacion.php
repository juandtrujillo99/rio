<?php

include_once 'app/config.inc.php';

include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/ControlSesion.inc.php';


if (!ControlSesion::sesion_iniciada()) {
  Redireccion::redirigir(RUTA_LOGIN); 
}else {
  Conexion :: abrir_conexion();
  $id = $_SESSION['id_usuario'];
  $usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);


  $titulo = "Guía de alimentación saludable ".$nombreEmpresa;
  $tipoGuia = "guia-alimentacion";
  $pdf = DIRECTORIO_RAIZ."/pdf/".$tipoGuia."/".$usuario->obtener_email()."-".$tipoGuia;

  if (!file_exists($pdf)) {
    Redireccion::redirigir(RUTA_GUIA_ALIMENTACION_NO_DISPONIBLE);
  }else{    
    //el pdf si existe
  }
}





include_once 'seccion/cabecera-inicio.inc.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<?php //body ?>

<div class="container-fluid">

<?php 

include_once 'seccion/guias/alimentacion/portada.inc.php';
include_once 'seccion/guias/alimentacion/recomendaciones.inc.php';

?>



<?php //inicio ?>
<div class="row col-12 section" id="pdf">
	<div id="adobe-dc-view" style="width: 100%; border:0"></div>
</div>
<?php //body ?>




<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>

<script type="text/javascript">
  document.addEventListener("adobe_dc_view_sdk.ready", function(){
    var adobeDCView = new AdobeDC.View({clientId: "19444807c22b4c229420d7c18dd88d4a", divId: "adobe-dc-view"});
    adobeDCView.previewFile({
      content: { location: { url: "<?php echo RUTA_GUIA_ALIMENTACION_PDF ."/".$usuario->obtener_email()."-".$tipoGuia; ?>" } },
      metaData: { fileName: "<?php echo $titulo; ?>" }
    }, {});
  });
</script>

<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>