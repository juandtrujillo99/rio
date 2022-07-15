<input type="hidden" id="id-entrada" name="id-entrada" value="<?php echo $id_entrada; ?>">
<div class="col-12">
	<div class="input-field">
		<input type="text" name="titulo" id="titulo" class="validate"value="<?php echo $entrada_recuperada -> obtener_titulo(); ?>">
		<input type="hidden" id="titulo-original" name="titulo-original" value="<?php echo $entrada_recuperada -> obtener_titulo(); ?>">
		<label for="titulo">Título de esta entrada</label>
	</div>
	<br>
	<div class="input-field">
		<input type="text" name="url" id="url" class="validate"value="<?php echo $entrada_recuperada -> obtener_url(); ?>">
		<input type="hidden" id="url-original" name="url-original" value="<?php echo $entrada_recuperada -> obtener_url(); ?>">
		<label for="url">URL Personalizada</label>
	</div>
	<br>
	<div class="col-12">
		<ul class="collapsible">
		    <li>
				<div class="collapsible-header" title="Tómate y sube una foto para ir viendo tu progreso">Cambia la imagen de portada</div>
				<div class="collapsible-body">
					<span>
						<div class="form-group" id="upload_form">
							<?php
							$rutaFoto = RUTA_BLOG_COVER.$entrada_recuperada -> obtener_imagen();
							$foto = $entrada_recuperada -> obtener_imagen();

							if(!isset($rutaFoto)||empty($foto)){
								?>
								<h6><font color="grey">* Selecciona una imagen y luego presiona el boton subir.</font></h6>				
								<label for="file1" id="label-archivo" class="btn btn-principal">Seleccionar</label>
								<input type="file" name="file1" id="file1" class="d-none">					
							<?php
							}else{
								?>
								<h4><font color="grey">Foto actual</font></h4>		
								<img src="<?php echo RUTA_BLOG_COVER.$entrada_recuperada -> obtener_imagen();?>" class="imagen-3">	
								<input type="hidden" name="imagen" value="<?php echo $entrada_recuperada -> obtener_imagen(); ?>">
								<br><br>
								<h4>Cambiar foto</h4>
								<label for="file1" id="label-archivo" class="btn btn-principal" >Seleccionar</label>
								<input type="file" name="file1" id="file1" class="d-none">
								<?php
							}
							?>													
							<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()" class="btn btn-principal">
							<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>
							<h4 id="status"></h4>
				    		<input type="hidden" id="imagen-original" name="imagen-original" value="<?php echo $entrada_recuperada -> obtener_imagen(); ?>">								
						</div>
					</span>
				</div>
		    </li>
		</ul>
	</div>
	<br><br>
	<div class="input-field">
		<input type="text" name="url_externa" id="url_externa" class="validate" value="<?php echo $entrada_recuperada -> obtener_url_externa(); ?>">
		<input type="hidden" id="url_externa-original" name="url_externa-original" value="<?php echo $entrada_recuperada -> obtener_url_externa(); ?>">
		<label for="url_externa">Código del audio</label>
	</div>
	<br>
	<div class="input-field">
		<textarea id="texto" name="texto" class="materialize-textarea" data-length="120"><?php echo $entrada_recuperada -> obtener_texto(); ?></textarea>
		<input type="hidden" id="texto-original" name="texto-original" value="<?php echo $entrada_recuperada -> obtener_texto(); ?>">
		<label for="texto">Contenido</label>
    </div> 
	<br>   
	<div class="input-field">
		<input type="text" name="etiqueta" id="etiqueta" class="validate"value="<?php echo $entrada_recuperada -> obtener_etiqueta(); ?>">
		<input type="hidden" id="etiqueta-original" name="etiqueta-original" value="<?php echo $entrada_recuperada -> obtener_etiqueta(); ?>">
		<label for="etiqueta">Categoría de la entrada</label>
		<!-- tagline  -->
		<div class="chip chips-placeholder">
			<?php echo $entrada_recuperada -> obtener_etiqueta(); ?>
			<i class="close material-icons">close</i>
		</div>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="publicar" value="si" <?php if ($entrada_recuperada -> esta_activa()) echo 'checked' ?>>
			<input type="hidden" id="publicar-original" name="publicar-original" value="<?php echo $entrada_recuperada -> esta_activa(); ?>">
		</label>
	</div>
</div>