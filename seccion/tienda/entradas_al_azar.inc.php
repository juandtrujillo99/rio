<?php
include_once 'app/tienda/EscritorEntradas.inc.php';
?>

<div class="row">
	<?php
		for ($i = 0; $i < count($entradas_azar); $i++) {
			$entrada_actual = $entradas_azar[$i];
		?>		
		<a href="<?php echo $entrada_actual -> obtener_url(); ?>" class="col-md-3 col-6">
            <div class="row card" style="margin: .5em;">
				<div class="card-image">					
		            <div align="center">   
		                <div class="img-entrada bg-cover" style="background-image:url(<?php echo RUTA_TIENDA_COVER.$entrada_actual -> obtener_imagen(); ?>);"></div>
		            </div>
		            <span class="card-title textoBold filtroEntrada truncate"><?php echo EscritorEntradasTienda::resumir_titulo(nl2br($entrada_actual -> obtener_titulo())); ?></span>
		        </div>          
            </div>
        </a>
		<?php
		}
	?>
</div>
