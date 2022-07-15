<div class="input-field">
	<input type="text" name="nombre" id="nombre" class="validate">
	<label for="nombre">Nombre</label>
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
	<br><br>
</div>

<button type="submit" id="boton" class="btn btn-secundario-animado" name="enviar">Registrar</button>


