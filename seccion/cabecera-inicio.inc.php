<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-D33NQCHHP1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-D33NQCHHP1');
		</script>
		<meta name="google-site-verification" content="dYWp7O8wCNvU9XqEQs9uPiI8KVP3NyGZzSVD8CX88XE" />
		<meta charset="UTF-8">
		<meta name="theme-color" content="#b98d32">
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
		<script src="https://kit.fontawesome.com/b7d9edf076.js" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="<?php echo RUTA_IMG_OPTIMIZADA; ?>logo/icono.webp" type="imagen/x-icon" rel="ahortcut icon" />
		<meta name="distribution" content="global" />


		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>materialize.php">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.php">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>menu.php">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>aparecer.css">


		
		<?php
		
		include_once 'app/usuario/ControlSesion.inc.php';
		include_once 'app/admin/ControlSesionAdmin.inc.php';
		
		// el titulo se convirtio en una variable, por lo tanto, cada pagina puede tener su propio titulo
		if(!isset($titulo) || empty($titulo)){
			$titulo = $nombreEmpresa;
		}
		echo "<title>$titulo</title>" . PHP_EOL;

		// la descripcion de la Pagina se convirtio en una variable, por lo tanto, cada pagina puede tener su propia descripcion
		if(!isset($descripcionAlterna) || empty($descripcionAlterna)){
			$descripcionAlterna = "Entrenamiento 100% Online, Totalmente personalizado. Juntos lograremos los resultados que tanto estás anhelando" . PHP_EOL;
		}
		echo '<meta name="description" content="'.$descripcionAlterna .'"/>' . PHP_EOL;



		//la imagen de la Pagina se convirtio en una variable, por lo tanto, cada pagina puede tener su propia imagen
		if(!isset($imagenCompartida) || empty($imagenCompartida)){
			$imagenCompartida = '<meta itemprop="image" content="'. RUTA_IMG_OPTIMIZADA .'Email-marketing.webp">' . PHP_EOL;
		}
		echo '<meta itemprop="image" content="'. $imagenCompartida .'"/>' . PHP_EOL;


		// la propiedad position de la navbar le permite ser fixed o absolute dependiendo de la pestaña, 
		// $navbar es una variable, por lo tanto, cada pagina puede tener su propia caracteristica
		if(!isset($navbar) || empty($navbar)){
			$navbar = "position: fixed;";
		}
