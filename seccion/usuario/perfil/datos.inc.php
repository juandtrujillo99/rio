<ul class="col-12 collapsible">
	<li>
		<div align="left" class="collapsible-header col-12 valign-wrapper" style="background-color: #A60303; color: white;">
			<p class="col-10 textoBlack textoParrafo1" style="padding: .5em;">Información general</p> 
			<p class="col-2 right-align"><i class="fa-solid fa-angle-down"></i></p>
		</div>
		<div align="left" class="collapsible-body" style="background-color:transparent;">
			<div class="row">
				<div class="col-12">
					<p class="textoBook">Plan activo:</p>
					<?php 
					if (!empty($usuario -> obtener_plan())) {
						?>
						<p class="textoBookBold textoParrafo1"><?php echo $usuario -> obtener_plan()." training plan"; ?></p>
						<?php
						}
					?>		
					<hr>
					<p class="textoBook">Objetivo:</p>
					<?php 
					if (!empty($usuario -> obtener_objetivo())) {
						?>
						<p class="textoBookBold textoParrafo1 truncate"><?php echo $usuario -> obtener_objetivo(); ?></p>
						<?php
						}
					?>	
					<hr>
					<p class="textoBook">lugar de entrenamiento:</p>
					<?php 
					if (!empty($usuario -> obtener_lugar_entreno())) {
						?>
						<p class="textoBookBold textoParrafo1"><?php echo $usuario -> obtener_lugar_entreno(); ?></p>
						<?php
						}
					?>		
				</div>	
			</div>							
		</div>
	</li>
</ul>
<div class="col-12"><br></div>
<ul class="col-12 collapsible">
	<li>
		<div align="left" class="collapsible-header col-12 valign-wrapper" style="background-color: #A60303; color: white;">
			<p class="col-10 textoBlack textoParrafo1" style="padding: .5em;">Inicio de sesión y contacto</p> 
			<p class="col-2 right-align"><i class="fa-solid fa-angle-down"></i></p>
		</div>
		<div align="left" class="collapsible-body" style="background-color:transparent;">
			<div class="row">
				<div class="col-12 row">
					<div class="col-12">
						<p class="textoBook">Correo electrónico:</p>
						<?php 
						if (!empty($usuario -> obtener_email())) {
							?>
							<p class="textoBookBold textoParrafo1 truncate"><?php echo $usuario -> obtener_email(); ?></p>
							<?php
							}
						?>
						<br><hr>
					</div>	
					<div class="col-12 row">	
						<div class="col-11"><p class="textoBook">Teléfono:</p></div>
						<div class="col-1"><a class="col modal-trigger textoColorMarca" href="#cambiarTelefono"><i class="fa-solid fa-pen"></i></a></div>	
						<div class="col-12">				
							<?php 
							if (!empty($usuario -> obtener_telefono())) {
							?>
							<p class="textoBookBold textoParrafo1"><?php echo $usuario -> obtener_telefono(); ?></p>
							<?php
							}
							?>		
							<br><hr>
						</div>
					</div>
					<div class="col-12 row">	
						<div class="col-11"><p class="textoBook">Contraseña:</p></div>
						<div class="col-1"><a class="col modal-trigger textoColorMarca" href="#cambiarClave"><i class="fa-solid fa-pen"></i></a></div>	
						<div class="col-12">				
							<p class="textoBookBold textoParrafo1">***********</p>
						</div>
					</div>
				</div>	
			</div>							
		</div>
	</li>
</ul>