<?php //modal que avisa al usuario que errores hay que corregir ?>
<div id="errores" class="modal">
	<div class="modal-content">
		<div class="row">
			<div class="col-12 row center-align valign-wrapper" style="padding: 2em;">
		    	<div class="col-md-4"></div>
		    	<div class="col-md-4">
		        	<p class="textoBlack mayusculas" style="font-size: 1.5em;line-height: 1.1;">Por favor completa o corrige los siguientes campos</p>
		        	<br>
					<?php $validador -> mostrar_error_imagen(); ?>	
					<?php $validador -> mostrar_error_titulo(); ?> 
					<?php $validador -> mostrar_error_etiqueta(); ?> 
					<?php $validador -> mostrar_error_precio(); ?>
					<?php $validador -> mostrar_error_url_externa(); ?>
					<?php $validador -> mostrar_error_url(); ?>  
					<?php $validador -> mostrar_error_texto(); ?>
					<br><br>
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-principal-animado">Entendido</a>
		        </div>
		    </div>
		</div>
	</div>
</div>

<a class="waves-effect waves-light btn modal-trigger" style="right: 0;position: fixed;" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>





<div class="row section">
    <?php //subida de la imagen?>
    <div class="col-12 col-md-7 row valign-wrapper">
    	<div class="col-md-2"></div>
    	<div class="col-md-9">
        	<?php
			$rutaFoto = RUTA_TIENDA_COVER.$validador -> obtener_imagen();
			$foto = $validador -> obtener_imagen();

			if(!isset($rutaFoto)||empty($foto)){
				?>
	        	<p class="textoBlack mayusculas" style="font-size: 1.2em;">Agrega una imagen de portada</p>	        	
				<?php $validador -> mostrar_error_imagen(); ?>			
				<label for="file1" id="label-archivo" class="btn btn-principal">Seleccionar</label>
				<input type="file" name="file1" id="file1" class="d-none">		
				<input name="imagen" class="d-none">	
				<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()" class="btn btn-secundario-animado">
				<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>							
			<?php
			}else{
				?>

				<div class="row" style="padding: 1em 0;">
					<div class="col-12">						
						<p class="textoBlack mayusculas" style="font-size: 1.2em;padding-bottom:1em;">Ya seleccionaste una imagen</p>
					</div>
					<div class="col-md-12 col-3">
			        	<?php $validador -> mostrar_error_imagen(); ?>					
						<input type="hidden" name="imagen" <?php $validador -> mostrar_imagen(); ?>>
						<img src="<?php echo RUTA_TIENDA_COVER.$validador -> obtener_imagen();?>" class="imagen d-block d-sm-none">
						<img src="<?php echo RUTA_TIENDA_COVER.$validador -> obtener_imagen();?>" class="imagen-3 d-none d-sm-block">
					</div>
					<div class="col-1"></div>
					<div class="col-md-12 col">
						<div class="d-none d-sm-block"><br></div>
						<p style="line-height: 1em;">¿Deseas cambiar la imagen?</p>
						<br>
						<label for="file1" id="label-archivo" class="btn btn-principal" style="font-size:.8em">Seleccionar</label>
						<input type="file" name="file1" id="file1" class="d-none">
						<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()" class="btn btn-principal" style="font-size:.8em">
						<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>	
					</div>
				</div>
				<?php
			}
			?>      	
        </div>
    </div>
    <div class="col-md-5 center-align valign-wrapper">
    	<div class="col-12 row">
    		<h4 id="status"></h4>		
    	</div>   	   	
    </div>
    <div class="col-12 row">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
		    <a href="#info" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
		</div>
	</div>
</div>

<div class="row section" id="info" style="display: flex;position: relative;">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-md-1"></div>
    	<div class="col-md-10 row">
    		<div class="col-12">
    			<p class="textoBlack mayusculas" style="font-size: 1.2em; padding-bottom: 1.2em;">Información básica</p>
    		</div>	
    		<div class="input-field col-md-12 col-12">
				<input type="text" name="titulo" id="titulo" class="validate"<?php $validador -> mostrar_titulo(); ?> >
				<?php $validador -> mostrar_error_titulo(); ?>
				<label for="titulo">Escribe el nombre del producto</label>
			</div>
			<div class="input-field col-md-5 col-12">
				<input type="number" name="url_externa" id="url_externa" class="validate"<?php $validador -> mostrar_url_externa(); ?> >
				<?php $validador -> mostrar_error_url_externa(); ?>
				<label for="url_externa">Cantidad en stock</label>
			</div>	
			<div class="col-1"></div>
			<div class="input-field col-md-6 col-12">
				<select name="etiqueta" id="etiqueta" class="validate">
					<option <?php $validador -> mostrar_etiqueta()?>><?php $validador -> mostrar_etiqueta_seleccionado()?></option>
					<?php
					for($i=0;$i<count($categorias);$i++){
						echo '<option value="'.$categorias[$i]['nombre'].'">'.$categorias[$i]['nombre'].'</option>';
					}
					?>
				</select>
				<label>Categoría</label>
				<?php $validador -> mostrar_error_etiqueta();	?>
			</div>	
			<div class="input-field col-md-5 col-12">
				<input type="number" name="precio" id="precio" class="validate"<?php $validador -> mostrar_precio(); ?> >
				<?php $validador -> mostrar_error_precio(); ?>
				<label for="precio">Escribe el precio sin puntos ni comas</label>
				<div class="d-none d-sm-block"><br><br></div>
			</div>		
			<div class="col-1"></div>
			<div class="input-field col-md-6 col-12">
				<input type="text" name="url" id="url" class="validate"<?php $validador -> mostrar_url(); ?> >
				<?php $validador -> mostrar_error_url(); ?>
				<label for="url">SKU</label>
				<div class="d-none d-sm-block"><br><br></div>
			</div>     	
        </div>
    </div>
    <div class="col-12 row">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
		    <a href="#" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <a href="#descripcion-texto" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
		</div>
	</div>
</div>

<div class="row section" id="descripcion-texto">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-md-1"></div>
    	<div class="col-md-10 row">
    		<div class="col-12">
    			<p class="textoBlack mayusculas" style="font-size: 1.2em;">Agrega más detalles del producto</p>
    		</div>
			<div class="input-field col-12">
				<textarea id="texto" name="texto" style="min-height: 20vh;max-height: 30vh;overflow-y: scroll;font-size: .9em;" class="materialize-textarea" data-length="3000" minlength="10" maxlength="3000"><?php $validador -> mostrar_texto(); ?></textarea>
				<?php $validador -> mostrar_error_texto(); ?>
				<label for="texto">Contenido</label>
				<p>
					<input id="bold" type="button" value="B" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Negrita">
					<input id="italic" type="button" value="<?php echo '𝑰';?>" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Cursiva"> 
					<input id="underline" type="button" value="U&#818;" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Subrayar">   
					<input id="enlazado" type="button" value="url" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Insertar enlace"> 
					<?php /*
					<a class="waves-effect waves-light btn btn-principal modal-trigger tooltipped" data-position="bottom" data-tooltip="Insertar imagen" href="#imgAdd">
						<i class="fa-regular fa-image"></i>
					</a>
					*/?>
				</p>
				<p id="resultado" class="d-none"></p>
			</div>      	
        </div>
    </div>
    <div class="col-12 row">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
		    <a href="#info" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <button type="submit" class="btn btn-principal-animado" name="guardar">Publicar</button>
		</div>
	</div>
</div>