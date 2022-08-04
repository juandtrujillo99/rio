<?php

header("Content-type: text/html; charset=utf8");

include '../../app/config.inc.php';



if (empty($_FILES["archivoImagen"])) {

	echo "Olvidaste seleccionar un archivo válido.";

}

else{

	$fileName = $_FILES["archivoImagen"]["name"]; // The file name
	$fileTmpLoc = $_FILES["archivoImagen"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["archivoImagen"]["type"]; // The type of file it is
	$fileSize = $_FILES["archivoImagen"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["archivoImagen"]["error"]; // 0 for false... and 1 for true
	$carpeta = "../../assets/tienda/categorias";//carpeta donde se suben los archivos
	
	$fileName = str_replace(' ', '-', $fileName);

	$directorio = DIRECTORIO_RAIZ."/assets/tienda/categorias/";//se crea la variable para la ruta de la carpeta
	$carpeta_objetivo = $directorio.basename($_FILES['archivoImagen']['name']);
	$tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);


	if (!$fileTmpLoc) { // if file not chosen

	    echo "Selecciona un archivo válido antes de presionar el boton 'subir'";

	    exit();

	}

	if ($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg" && $tipo_imagen != "webp" && $tipo_imagen != "gif") { // if file not chosen

	    echo "Sólo se admiten los formatos JPG, JPEG, PNG o WEBP.";

	    exit();

	}




	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $numero_caracteres = strlen($caracteres);

    $string_aleatorio = '';

    

    for ($i = 0; $i < 2; $i++) {

        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];

    }

    



	if(move_uploaded_file($fileTmpLoc, $carpeta."/".$nombreEmpresa.date("d-m-Y").$string_aleatorio.utf8_decode($fileName))){		

		?>

		<input type="text" name="imagen" value="<?php echo $nombreEmpresa.date("d-m-Y").$string_aleatorio.$fileName;?>" class="d-none">

		<img src="<?php echo RUTA_TIENDA_CATEGORIAS.$nombreEmpresa.date("d-m-Y").$string_aleatorio."$fileName";?>" class="imagen-3">

		<br><br><br><br>

		<?php
		echo $nombreEmpresa.date("d-m-Y").$string_aleatorio."$fileName";

	} else {

	    echo "Falló la subida, error al mover el archivo";

	}

}

?>

