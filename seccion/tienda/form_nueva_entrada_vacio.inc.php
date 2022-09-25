<div class="row section">
    <?php //subida de la imagen?>
    <div class="col-12 col-md-7 row valign-wrapper">
    	<div class="col-md-2"></div>
    	<div class="col-md-9">
        	<p class="textoBlack mayusculas" style="font-size: 1.2em;">Agrega la imagen del producto</p>
        	<br>
			<p style="line-height: 1.2em;"><font color="grey">* Selecciona la imagen y luego presiona el boton subir.</font></p>
			<br>
			<input type="file" name="file1" id="file1" class="d-none">
			<label for="file1" id="label-archivo" class="btn btn-principal">Seleccionar</label>		
			<input name="imagen" class="d-none">					
			<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()"  class="btn btn-secundario-animado">
			<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>	        	
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
		    <a href="#etiquetas" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
		</div>
	</div>
</div>

<div class="row section" id="etiquetas" style="display: flex;position: relative;">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-md-1"></div>
    	<div class="col-md-10 row">
    		<div class="col-12">
    			<p class="textoBlack mayusculas" style="font-size: 1.2em; padding-bottom: 1.2em;">Información básica</p>
    		</div>	
    		<div class="input-field col-md-12 col-12">
				<input type="text" name="titulo" id="titulo" class="validate">
				<label for="titulo">Escribe el nombre del producto</label>
			</div>
			<div class="input-field col-md-5 col-12">
				<input type="number" name="url_externa" id="url_externa" class="validate">
				<label for="url_externa">Cantidad en stock</label>
			</div>	
			<div class="col-1"></div>
			<div class="input-field col-md-6 col-12">
				<select name="etiqueta" id="etiqueta" class="validate">
					<option value="Sin categoría" selected>Selecciona una categoría</option>
					<?php
					for($i=0;$i<count($categorias);$i++){
						echo '<option value="'.$categorias[$i]['nombre'].'">'.$categorias[$i]['nombre'].'</option>';
					}
					?>
				</select>
			</div>	
			<div class="input-field col-md-5 col-12">
				<input type="number" name="precio" id="precio">
				<label for="precio">Escribe el precio sin puntos ni comas</label>
				<div class="d-none d-sm-block"><br><br></div>
			</div>		
			<div class="col-1"></div>
			<div class="input-field col-md-6 col-12">
				<input type="text" name="url" id="url" class="validate">
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
				<textarea id="texto" name="texto" style="min-height: 30vh;max-height: 35vh;overflow-y: scroll;" class="materialize-textarea" data-length="3000" minlength="10" maxlength="3000"></textarea>
				<label for="texto">Características, descripción, etc</label>
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
		    <a href="#etiquetas" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <button type="submit" class="btn btn-principal-animado" name="guardar">Publicar</button>
		</div>
	</div>
</div>