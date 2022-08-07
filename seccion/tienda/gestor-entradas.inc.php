<div class="row">
	<div class="col-1"></div>
	<div class="col-10" style="padding: 8em 0 1.5em 0;">
		<h2 class="textoBlack textoTitulo text-center"><?php echo $titulo ?></h2>
		
	</div>
	<div class="col-1"></div>
	<div class="col-1"></div>
	<div class="col-10">
		<div style="padding: 1.2em 0">
			<a href="<?php echo RUTA_NUEVA_ENTRADA_TIENDA; ?>" class="btn btn-principal-animado" role="button" id="boton-nueva-entrada">Nuevo producto</a>
		</div>		
		<div class="row">
			<?php 
				if (count($array_entradas) > 0) {
					?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Fecha de creación</th>
								<th>Nombre del producto</th>
								<th>Precio</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							for ($i = 0; $i < count($array_entradas); $i++) {
								$entrada_actual = $array_entradas[$i][0];
								?>								
								<tr>										
									<td><?php echo convertirFecha($entrada_actual -> obtener_fecha()); ?></td>
									<td><a target="_blank" href="<?php echo RUTA_ENTRADA_TIENDA . '/' . $entrada_actual -> obtener_url(); ?>"><?php echo $entrada_actual -> obtener_titulo(); ?></a></td>									
									<td>$<?php echo $entrada_actual -> obtener_precio(); ?></td>	
									<td></td>					
									<td>
										<form method="post" action="<?php echo RUTA_EDITAR_ENTRADA_TIENDA; ?>">
											<input type="hidden" name="id_editar" value="<?php echo $entrada_actual -> obtener_id(); ?>">
											<button type="submit" class="btn btn-principal" name="editar_entrada">Editar</button>
										</form>
									</td>
									<td>
										<form method="post" action="<?php echo RUTA_BORRAR_ENTRADA_TIENDA; ?>">
											<input type="hidden" name="id_borrar" value="<?php echo $entrada_actual -> obtener_id(); ?>">
											<button type="submit" class="btn btn-principal" name="borrar_entrada">Borrar</button>
										</form>
									</td>
								</tr>								
								<?php
							}
							?>
						</tbody>
					</table>
					<?php
				} else {
					?>
					<div class="col-12">
						<hr>
						<p>Cuando agregues productos se mostrarán aquí</p>
					</div>
					<?php
				}
			?>
		</div>
	</div>
</div>