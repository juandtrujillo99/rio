<div class="col-12 row center-align valign-wrapper" id="registro-usuarios">
	<div class="col-12 col-md-4">
		<div class="input-field">
			<input type="text" name="nombre" id="nombre" class="validate" <?php $validador -> mostrar_nombre()?>>
			<label for="nombre">Nombres</label>
			<?php $validador -> mostrar_error_nombre();	?>
		</div>
		<div class="input-field">
			<input type="text" name="apellido" id="apellido" class="validate" <?php $validador -> mostrar_apellido()?>>
			<label for="apellido">Apellidos</label>
			<?php $validador -> mostrar_error_apellido();	?>
		</div>
		<div class="input-field">
			<input type="email" name="email" id="email" class="validate" <?php $validador -> mostrar_email()?>>
			<label for="email" data-error="wrong" data-success="right">Email</label>
			<?php $validador -> mostrar_error_email();	?>
		</div>
		<div class="input-field row">
			<input class="col-9" type="password" name="clave1" id="txtPassword">
			<label for="clave1">Contraseña</label>
			<?php $validador -> mostrar_error_clave1();	?>
			<div class="col-1"></div>
			<button class="col-2 btn" id="show_password" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
		</div>	
		<div class="input-field">
			<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="validate" <?php $validador -> mostrar_fecha_nacimiento()?>>
			<label for="fecha_nacimiento">Fecha de nacimiento</label>
			<?php $validador -> mostrar_error_fecha_nacimiento();	?>			
		</div>	
	</div>



	<div class="col-12 col-md-4">		
		<div class="input-field">
			<select name="pais" id="pais" class="validate">
				<option <?php $validador -> mostrar_pais()?>><?php $validador -> mostrar_pais_seleccionado()?></option>
				<?php
				for($i=0;$i<count($paises);$i++){
					echo '<option value="'.$paises[$i]['nombre'].'">'.$paises[$i]['nombre'].'</option>';
				}
				?>
			</select>
			<label>País</label>
			<?php $validador -> mostrar_error_pais();	?>
		</div>
		<div class="input-field">
			<input type="number" name="telefono" id="telefono" class="validate" <?php $validador -> mostrar_telefono()?>>
			<label for="telefono" data-error="wrong" data-success="right">Teléfono</label>
			<?php $validador -> mostrar_error_telefono();	?>
		</div>
		<div class="input-field">
			<select name="dieta" id="dieta" class="validate">
				<option <?php $validador -> mostrar_dieta()?>><?php $validador -> mostrar_dieta_seleccionada()?></option>
				<option value="sin restricciones">Sin restricciones</option>
				<option value="vegetariana">Vegetariana</option>
				<option value="flexitariana">Flexitariana</option>
				<option value="vegana">Vegana</option>
			</select>
			<label>Dieta</label>
			<?php $validador -> mostrar_error_dieta();	?>
		</div>
		<div class="input-field">
			<select name="objetivo" id="objetivo" class="validate">
				<option <?php $validador -> mostrar_objetivo()?>><?php $validador -> mostrar_objetivo_seleccionado()?></option>
				<option value="aumento de masa muscular">Aumento de masa muscular</option>
				<option value="perdida de grasa">Perdida de grasa</option>
				<option value="tonificación">Tonificación</option>
				<option value="mejorar estado físico">Mejorar estado físico</option>
			</select>
			<label>Objetivo</label>
			<?php $validador -> mostrar_error_objetivo();	?>
		</div>

		<div class="input-field">
			<input type="number" name="altura" id="altura" class="validate" <?php $validador -> mostrar_altura()?>>
			<label for="altura">Altura</label>
			<?php $validador -> mostrar_error_altura();	?>
		</div>	
	</div>


	<div class="col-12 col-md-4">		
		<div class="input-field">
			<input type="number" name="peso" id="peso" class="validate" <?php $validador -> mostrar_peso()?>>
			<label for="peso">Peso</label>
			<?php $validador -> mostrar_error_peso();	?>
		</div>
		<div class="input-field">
			<select name="lugar_entreno" id="lugar_entreno" class="validate">
				<option <?php $validador -> mostrar_lugar_entreno()?>><?php $validador -> mostrar_lugar_entreno_seleccionado()?></option>
				<option value="en casa">En Casa</option>
				<option value="en gimnasio">En Gimnasio</option>
			</select>
			<label>Lugar de entreno</label>
			<?php $validador -> mostrar_error_lugar_entreno();	?>
		</div>
		<div class="input-field">
          <textarea id="restricciones" name="restricciones" class="materialize-textarea"></textarea>
          <label for="restricciones">Restricciones</label>
			<?php $validador -> mostrar_error_restricciones();	?>
        </div>

		<div class="input-field">
			<select name="plan" id="plan" class="validate">
				<option <?php $validador -> mostrar_plan()?>><?php $validador -> mostrar_plan_seleccionado()?></option>
				<option value="basic">Basic</option>
				<option value="standard">Standard</option>
				<option value="advanced">Advanced</option>
				<option value="pro">Pro</option>
			</select>
			<label>Plan</label>
			<?php $validador -> mostrar_error_plan();	?>
		</div>	
		<button type="submit" id="boton" class="btn btn-secundario-animado" name="enviar">Registrar</button>	
	</div>
</div>
