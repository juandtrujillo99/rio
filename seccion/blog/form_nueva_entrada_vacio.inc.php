<div class="col-12">
	<div class="input-field">
		<input type="text" name="titulo" id="titulo" class="validate">
		<label for="titulo">Ponle un título a esta entrada</label>
	</div>
	<br>
	<div class="input-field">
		<input type="text" name="url" id="url" class="validate">
		<label for="url">URL Personalizada</label>
	</div>
	<br>
	<div class="col-12">
		<ul class="collapsible">
		    <li>
				<div class="collapsible-header" title="Tómate y sube una foto para ir viendo tu progreso">Sube una imagen de portada</div>
				<div class="collapsible-body">
					<span>
						<div class="form-group" id="upload_form">
							<h6><font color="grey">* Selecciona una imagen y luego presiona el boton subir.</font>
							</h6>
							<br>
							<label for="file1" id="label-archivo" class="btn btn-principal">Seleccionar</label>
							<input type="file" name="file1" id="file1" class="d-none">		
							<input name="imagen" class="d-none">					
							<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()"  class="btn btn-principal">
							<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>
							<h4 id="status"></h4>				
						</div>
					</span>
				</div>
		    </li>
		</ul>
	</div>
	<br><br>
	<div class="input-field">
		<input type="text" name="url_externa" id="url_externa">
		<label for="url_externa">Código del audio</label>
	</div>
	<br>
	<div class="input-field">
		<textarea id="texto" name="texto" class="materialize-textarea" data-length="120"></textarea>
		<label for="texto">¿Qué deseas compartir?</label>
    </div> 
	<br>   
	<div class="input-field">
		<input type="text" name="etiqueta" id="etiqueta" class="validate">
		<label for="etiqueta">Categoría de la entrada</label>
	</div>
</div>