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


	$titulo = "Rutina de ejercicios ".$nombreEmpresa;
	$tipoGuia = "rutina-ejercicios";
	$pdf = DIRECTORIO_RAIZ."/pdf/".$tipoGuia."/".$usuario->obtener_email()."-".$tipoGuia;

	if (!file_exists($pdf)) {
		Redireccion::redirigir(RUTA_RUTINA_EJERCICIOS_NO_DISPONIBLE);
	}else{		
		//el pdf si existe
	}
}





include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>cronometro.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<?php //body ?>

<div class="container-fluid">

<?php 

include_once 'seccion/guias/rutina-ejercicios/portada.inc.php';
include_once 'seccion/guias/rutina-ejercicios/recomendaciones.inc.php';
include_once 'seccion/guias/rutina-ejercicios/semana.inc.php';

?>



<?php //inicio ?>
<div class="row" id="pdf">
    <?php //registro de usuario?>
    <div class="col-12 col-md-5">	    
    	<div class="section valign-wrapper"> 
        <div class="col-1"></div>
	    	<div class="col-10 row">
		    	<div class="col-12">
		    		<br><br>
	    			<p class="textoBook">
	    				<b>RETO:</b> Utiliza este cronometro e intenta terminar la rutina en el menor tiempo posible manteniendo un buen rendimiento y desempeño, <b>máximo 50 a 60 min</b>.
	    			</p>
	    			<br><br>
				    <?php include 'seccion/cronometro.php';	?>
						<br><br>
				  </div>
		    </div>
		    <div class="col-1"></div>
      </div>
    </div>

    <div class="row col-12 col-md-7 section">
    	<div id="adobe-dc-view" style="width: 100%; border:0"></div>
    </div>
</div>





<?php //body ?>




<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>

<script type="text/javascript">
  document.addEventListener("adobe_dc_view_sdk.ready", function(){
    var adobeDCView = new AdobeDC.View({clientId: "19444807c22b4c229420d7c18dd88d4a", divId: "adobe-dc-view"});
    adobeDCView.previewFile({
      content: { location: { url: "<?php echo RUTA_RUTINA_EJERCICIOS_PDF ."/".$usuario->obtener_email()."-".$tipoGuia; ?>" } },
      metaData: { fileName: "<?php echo $titulo; ?>" }
    }, {});
  });
</script>
<script src="<?php echo RUTA_JS; ?>cronometro.js"></script>
<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>