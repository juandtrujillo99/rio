<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/usuario/Usuario.inc.php';
include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/ControlSesion.inc.php';

if (!ControlSesion::sesion_iniciada()) {//sin inicio de sesion de usuario
	Redireccion::redirigir(RUTA_LOGIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_usuario'];
	$usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
}


$titulo = "Contenido no disponible";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>

<div class="container section center-align valign-wrapper">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<p class="textoBlack textoTitulo1">
				Contenido no disponible
			</p>
		<?php 
		if(($usuario->obtener_plan()!="pro")&&($usuario->obtener_plan()!="advanced")&&($usuario->obtener_plan()!="standard")&&($usuario->obtener_plan()!="basic")) {
            ?>
			<p class="textoBookBold textoParrafo">
				Parece que no has activado ningun plan
			</p>
			<br><br>		
			<p class="textoBook textoParrafo">				
				Activa tu plan de entrenamiento personalizado online y obtén 1 mes completo de asesoría.
			</p>
			<br><br>
			<a class="btn btn-secundario-animado" href="<?php echo RUTA_ASESORIA_COLOMBIA; ?>">Ver planes</a>
		<?php
	    }else{
    	?>
    		<p class="textoBookBold textoParrafo">
				Estamos elaborando tu guía de suplementación
			</p>
			<br><br>
    		<p class="textoBook textoParrafo">				
				Recuerda que si es la primera vez que obtienes una asesoría tardaremos máximo 4 días hábiles después del pago.
				<br><br>
				Por el momento, ¿Quieres saber mi secreto para aumentar el rendimiento en mis entrenamientos?
			</p>
			<br><br>
			<a class="btn btn-secundario-animado" href="<?php echo SERVIDOR; ?>">Descargar ebook ahora</a>				
		<?php
        }
        ?>		
		</div>
	</div>
</div>


<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
