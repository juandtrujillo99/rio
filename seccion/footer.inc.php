<?php /*?>
<div id="contacto" class="row  social-m" align="center">
	<div class="col-1 col-md-2"></div>
	<div class="col-12 col-md-4">
		<p class="textoBlack textoSubtitulo">Contacto</p>
		<br>
		<p class="textoRegular">
			Email: <?php echo $emailEmpresa;?>
			<br>
			Teléfono: +57<?php echo $telefonoEmpresa;?>
		</p>
	</div>
	<div class="col-12 col-md-4">
		<div class="d-block d-sm-none"><br><br></div>		
		<p class="textoBlack textoSubtitulo">SOCIAL</p>
		<?php include 'seccion/social.inc.php'; ?>
	</div>
</div>
<?php */?>



<div class="footer">
	<div class="row sec2">		
		<div class="col-1"></div>
		<div class="col-2 col-md-1">
			<img  loading="lazy" itemprop="image" class="imagen" src="<?php echo RUTA_IMG_OPTIMIZADA;?>logo/cuadrado3.webp">
		</div>
		<div class="col-md-7 col-6 valign-wrapper">				
			<p style="padding-left: 1em;">
				Contáctenos<br>
				<a href="tel:+57<?php echo $telefonoEmpresa?>" target="_blank"><?php echo "+57 ".$telefonoEmpresa?></a><br>
				<a href="<?php echo $mailEmpresa?>" target="_blank"><?php echo $emailEmpresa?></a>						
			</p>					
		</div>
		<div class="col-md-2 col-3 valign-wrapper" align="right">
			<div class="social-pc d-none d-sm-block">
				<?php include 'seccion/social.inc.php'; ?>
			</div>
			<div class="social-m d-block d-sm-none">
				<?php include 'seccion/social.inc.php'; ?>
			</div>
		</div>
	</div>
</div>
