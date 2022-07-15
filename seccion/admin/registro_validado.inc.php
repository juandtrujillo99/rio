<div class="input-field">
	<input placeholder="Nombre" type="text" name="nombre" id="nombre" class="validate" <?php $validador -> mostrar_nombre()?>>
	<?php
	$validador -> mostrar_error_nombre();
	?>
</div>

<div class="input-field">
	<input placeholder="Correo electrónico" type="email" name="email" id="email" class="validate" <?php $validador -> mostrar_email()?>>
	<?php
	$validador -> mostrar_error_email();
	?>
</div>

<div class="input-field row">
	<input placeholder="Contraseña" class="col-9" type="password" name="clave1" id="txtPassword">
	<label for="clave1">Contraseña</label>
	<?php
	$validador -> mostrar_error_clave1();
	?>
	<div class="col-1"></div>
	<button class="col-2 btn" id="show_password" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
	<br><br>
</div>

<button type="submit" id="boton" class="btn btn-secundario-animado" name="enviar">Registrar</button>