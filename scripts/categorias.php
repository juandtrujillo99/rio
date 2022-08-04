<?php
$categorias['0']['img']="RIO14-07-2022ggIARETE-CIRCONIA-REDONDA-CRIST-BLANCA.jpeg";
$categorias['0']['nombre']="Topos y aretes";

$categorias['1']['img']="RIO01-08-2022JcSROSARIO-3MM-EDICION-ESPECIAL-.jpg";
$categorias['1']['nombre']="Collar";


$categorias['2']['img']="RIO01-08-2022JcSROSARIO-3MM-EDICION-ESPECIAL-.jpg";
$categorias['2']['nombre']="Cadenas";


$categorias['3']['img']="RIO01-08-2022JcSROSARIO-3MM-EDICION-ESPECIAL-.jpg";
$categorias['3']['nombre']="Candongas";


$categorias['4']['img']="RIO21-06-2022OmS4.jpg";
$categorias['4']['nombre']="Conjuntos";


$categorias['5']['img']="RIO01-08-2022JcSROSARIO-3MM-EDICION-ESPECIAL-.jpg";
$categorias['5']['nombre']="Dijes";


$categorias['6']['img']="RIO01-08-2022JcSROSARIO-3MM-EDICION-ESPECIAL-.jpg";
$categorias['6']['nombre']="Pulseras";


$categorias['7']['img']="RIO01-08-2022JcSROSARIO-3MM-EDICION-ESPECIAL-.jpg";
$categorias['7']['nombre']="Tobilleras";
?>

	
<form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_TIENDA; ?>">
	<div class="media-scroller snaps-inline sombra">
		<input type="hidden" name="buscar-tienda">
		<?php
		for($i=0;$i<count($categorias);$i++){
			?>
			<div class="media-element col-12">
				<img src='<?php echo RUTA_TIENDA_COVER.$categorias[$i]["img"];?>' alt="<?php echo $categorias[$i]["nombre"];?>" class="imagen">
				<?php
				echo '<button style="font-size: .9em;margin:.5em;" class="btn btn-principal-animado" name="termino-buscar-tienda" value="'.$categorias[$i]['nombre'].'">'.$categorias[$i]['nombre'].'</button>';
				?>
			</div>
			<?php
			}
		?>
	</div>
</form>			


