<?php
$categorias['0']['nombre']="Topos y aretes";
$categorias['1']['nombre']="Collar";
$categorias['1']['nombre']="Cadenas";
$categorias['2']['nombre']="Candongas";
$categorias['3']['nombre']="Conjuntos";
$categorias['4']['nombre']="Dijes";
$categorias['4']['nombre']="Pulseras";
$categorias['4']['nombre']="Tobilleras";
?>


<form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_TIENDA; ?>">
	<div class="input-field">
		<input type="hidden" name="buscar-tienda">
		<?php
			for($i=0;$i<count($categorias);$i++){
				echo '<button style="font-size: .9em;margin:.5em;" class="btn btn-principal" name="termino-buscar-tienda" value="'.$categorias[$i]['nombre'].'">'.$categorias[$i]['nombre'].'</button>';
			}
		?>
	</div>
</form>			

