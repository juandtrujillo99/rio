<div class="col-12">
	<div class="input-field">
		<input placeholder="¿Cuál es el nombre de este producto?" type="text" name="titulo" id="titulo" class="validate"<?php $validador -> mostrar_titulo(); ?> >
		<?php $validador -> mostrar_error_titulo(); ?>
		<label for="titulo">Nombre del producto</label>
	</div>
	<br>
	<div class="input-field">
		<input placeholder="Referencia" type="text" name="url" id="url" class="validate"<?php $validador -> mostrar_url(); ?> >
		<?php $validador -> mostrar_error_url(); ?>
		<label for="url">SKU</label>
	</div>
	<br>
	<div class="col-12">
		<ul class="collapsible">
		    <li>
				<div class="collapsible-header" title="Con esta fotografía las personas podran identificar fácilmente el producto">Selecciona y sube una imagen</div>
				<?php $validador -> mostrar_error_imagen(); ?>
				<div class="collapsible-body">
					<span>
						<div class="form-group" id="upload_form">
							<?php
							$rutaFoto = RUTA_TIENDA_COVER.$validador -> obtener_imagen();
							$foto = $validador -> obtener_imagen();

							if(!isset($rutaFoto)||empty($foto)){
								?>
								<h6><font color="grey">* Selecciona una imagen y luego presiona el boton subir.</font></h6>				
								<label for="file1" id="label-archivo" class="btn btn-principal">Seleccionar</label>
								<input type="file" name="file1" id="file1" class="d-none">		
								<input name="imagen" class="d-none">							
							<?php
							}else{
								?>
								<h4><font color="grey">Ya seleccionaste una imagen</font></h4>					
								<input type="hidden" name="imagen" <?php $validador -> mostrar_imagen(); ?>>
								<img src="<?php echo RUTA_TIENDA_COVER.$validador -> obtener_imagen();?>" class="imagen-3">
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
						</div>
					</span>
				</div>
		    </li>
		</ul>
	</div>
	<br><br>
	<div class="input-field">
		<input placeholder="(Opcional) Inserta un enlace externo para ver más detalles" type="text" name="url_externa" id="url_externa" class="validate"<?php $validador -> mostrar_url_externa(); ?> >
		<?php $validador -> mostrar_error_url_externa(); ?>
		<label for="url_externa">Enlace externo</label>
	</div>
	<br>
	<div class="input-field">
		<input placeholder="Escribe el precio del producto sin puntos ni comas" type="number" name="precio" id="precio" <?php $validador -> mostrar_precio(); ?> >
		<?php $validador -> mostrar_error_precio(); ?>
		<label for="precio">Precio</label>
	</div>
	<br>
	<div class="input-field">
		<textarea placeholder="Describe el producto" id="texto" name="texto" class="materialize-textarea"><?php $validador -> mostrar_texto(); ?></textarea>
		<?php $validador -> mostrar_error_texto(); ?>
		<label for="texto">Más detalles del producto</label>
    </div> 
	<br>   
	<div class="input-field">
		<input placeholder="Escribe la categoría del producto" type="text" name="etiqueta" id="etiqueta" class="validate" <?php $validador -> mostrar_etiqueta(); ?> >
		<?php $validador -> mostrar_error_etiqueta(); ?>
		<label for="etiqueta">Categoría del producto</label>
		<!-- tagline  -->
		<div class="chip chips-placeholder">
			<?php echo $validador -> obtener_etiqueta(); ?>
			<i class="close material-icons">close</i>
		</div>
	</div>
</div>