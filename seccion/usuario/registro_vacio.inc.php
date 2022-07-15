<div class="col-12 row center-align valign-wrapper" id="registro-usuarios">
	<div class="col-12 col-md-4">
		<div class="input-field">
			<input type="text" name="nombre" id="nombre" class="validate">
			<label for="nombre">Nombres</label>
		</div>
		<div class="input-field">
			<input type="text" name="apellido" id="apellido" class="validate">
			<label for="apellido">Apellidos</label>
		</div>
		<div class="input-field">
			<input type="email" name="email" id="email" class="validate">
			<label for="email" data-error="wrong" data-success="right">Email</label>
		</div>
		<div class="input-field row">
			<input class="col-9" type="password" name="clave1" id="txtPassword">
			<label for="clave1">Contraseña</label>
			<div class="col-1"></div>
			<button class="col-2 btn" id="show_password" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
		</div>	
		<div class="input-field">
			<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="validate">
			<label for="fecha_nacimiento">Fecha de nacimiento</label>
		</div>	
	</div>



	<div class="col-12 col-md-4">		
		<div class="input-field">
			<select name="pais" id="pais" class="validate">
				<option value="" disabled selected>Selecciona país</option>
				<?php
				for($i=0;$i<count($paises);$i++){
					echo '<option value="'.$paises[$i]['nombre'].'">'.$paises[$i]['nombre'].'</option>';
				}
				?>
			</select>
			<label>País</label>
		</div>
		<div class="input-field">
			<input type="number" name="telefono" id="telefono" class="validate">
			<label for="telefono" data-error="wrong" data-success="right">Teléfono</label>
		</div>
		<div class="input-field">
			<select name="dieta" id="dieta" class="validate">
				<option value="" disabled selected>Tipo de dieta</option>
				<option value="vegetariana">Vegetariana</option>
				<option value="flexitariana">Flexitariana</option>
				<option value="vegana">Vegana</option>
				<option value="sin restricciones">Sin restricciones</option>
			</select>
			<label>Dieta</label>
		</div>
		<div class="input-field">
			<select name="objetivo" id="objetivo" class="validate">
				<option value="" disabled selected>Selecciona el objetivo</option>
				<option value="aumento de masa muscular">Aumento de masa muscular</option>
				<option value="perdida de grasa">Perdida de grasa</option>
				<option value="tonificación">Tonificación</option>
				<option value="mejorar estado físico">Mejorar estado físico</option>
			</select>
			<label>Objetivo</label>
		</div>

		<div class="input-field">
			<input type="number" name="altura" id="altura" class="validate">
			<label for="altura">Altura</label>
		</div>	
	</div>


	<div class="col-12 col-md-4">		
		<div class="input-field">
			<input type="number" name="peso" id="peso" class="validate">
			<label for="peso">Peso</label>
		</div>
		<div class="input-field">
			<select name="lugar_entreno" id="lugar_entreno" class="validate">
				<option value="" disabled selected>Selecciona lugar de entreno</option>
				<option value="en casa">En Casa</option>
				<option value="en gimnasio">En Gimnasio</option>
			</select>
			<label>Lugar de entreno</label>
		</div>
		<div class="input-field">
          <textarea id="restricciones" name="restricciones" class="materialize-textarea"></textarea>
          <label for="restricciones">Restricciones</label>
        </div>

		<div class="input-field">
			<select name="plan" id="plan" class="validate">
				<option value="" disabled selected>Selecciona el plan</option>
				<option value="nutri-y-suple">Nutrición y suplementación</option>
				<option value="ejercicios">Solo rutina de ejercicios</option>
				<option value="alimentacion">Solo guía de alimentación</option>
				<option value="suplementacion">Solo guía de suplementación</option>
				<option value="basic">Basic</option>
				<option value="standard">Standard</option>
				<option value="advanced">Advanced</option>
				<option value="pro">Pro</option>
			</select>
			<label>Plan</label>
		</div>	
		<button type="submit" id="boton" class="btn btn-secundario-animado" name="enviar">Registrar</button>	
	</div>
</div>


