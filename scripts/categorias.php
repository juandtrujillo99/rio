<?php
include_once 'tienda/lista-categorias.php';
?>

	
<form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_TIENDA; ?>">
	<div class="media-scroller snaps-inline sombra">
		<input type="hidden" name="buscar-tienda">
		<?php
		for($i=0;$i<count($categorias);$i++){
			?>
			<div class="media-element">
				<button name="termino-buscar-tienda" value="<?php echo $categorias[$i]['nombre'];?>">
					<div class="img-entrada bg-cover" style="background-image:url(<?php echo RUTA_TIENDA_COVER.$categorias[$i]["img"];?>);"></div>
					<p><?php echo $categorias[$i]['nombre'];?></p>
				</button>
			</div>
			<?php
			}
		?>
	</div>	
</form>	

<?php
if(ControlSesionAdmin :: sesion_iniciada()&&($admin -> obtener_nombre()=="Juan")){
	?>
	<a href="#imgAdd" style="padding:.5em .8em;border-radius: 2em;background-color: white;position: absolute;right: -1.5em;bottom: 6em;" class="waves-effect waves-light btn btn-principal-animado modal-trigger tooltipped" data-position="bottom" data-tooltip="Agregar categoría" href="#imgAdd"><i class="fa-solid fa-plus"></i></a>		


	<?php //subir una imagen al servidor Modal ?>
	<div id="imgAdd" class="modal" style="width: 90%;height: 70vh;overflow-y: scroll;">
		<div class="modal-header right">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
		</div>
		<div class="modal-content" align="left">
			<div class="row">
				<div class="col-md-7 col-12 row valign-wrapper" style="padding: 1em;">
			    	<div class="col-md-1"></div>
			    	<div class="col-md-10">
			        	<p class="textoBlack mayusculas" style="font-size: 1.5em;line-height: 1.1;">Sube una imagen al sitio web</p>
			        	<br>
						<p><font color="grey">* Selecciona la imagen y luego presiona el boton subir.</font></p>
						<br>
						<label for="archivoImagen" id="label-archivo-imagen" class="btn btn-principal">Seleccionar</label>
						<input type="file" name="archivoImagen" id="archivoImagen" class="d-none">		
						<input name="archivoImagen" class="d-none">					
						<input type="button" value="Subir" name="guardar_file_imagen" id="guardar_file_imagen" onclick="subirImagenes()"  class="btn btn-principal">
						<progress id="progressBarImagen" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>	   	
			        </div>
			    </div>
			    <div class="col-md-5 center-align valign-wrapper">
			    	<div class="col-12 row">
			    		<h4 id="statusFile"></h4>
			    		<p id="logTarget"></p>		
			    	</div>   	   	
			    </div>
			    <div class="col-12">
			    	<p>Script lista-categorias</p>
			    </div>	
			</div>
		</div>
	</div>
<?php
}