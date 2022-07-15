<?php

header("Content-type: text/html; charset=utf8");

include '../../app/config.inc.php';



if (empty($_FILES["file1"])) {

	echo "Olvidaste seleccionar un archivo válido.";

}

else{

	$fileName = $_FILES["file1"]["name"]; // The file name
	$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["file1"]["type"]; // The type of file it is
	$fileSize = $_FILES["file1"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
	$carpeta = "../../assets/blog/cover";//carpeta donde se suben los archivos
	
	$fileName = str_replace(' ', '-', $fileName);

	$directorio = DIRECTORIO_RAIZ."/assets/blog/cover/";//se crea la variable para la ruta de la carpeta
	$carpeta_objetivo = $directorio.basename($_FILES['file1']['name']);
	$tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);


	if (!$fileTmpLoc) { // if file not chosen

	    echo "Selecciona un archivo válido antes de presionar el boton 'subir'";

	    exit();

	}

	if ($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg" && $tipo_imagen != "gif") { // if file not chosen

	    echo "Sólo se admiten los formatos JPG, JPEG, PNG y GIF.";

	    exit();

	}




	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $numero_caracteres = strlen($caracteres);

    $string_aleatorio = '';

    

    for ($i = 0; $i < 3; $i++) {

        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];

    }

    



	if(move_uploaded_file($fileTmpLoc, $carpeta."/".$nombreEmpresa.date("d-m-Y").$string_aleatorio.utf8_decode($fileName))){		

		?>

		<input type="text" name="imagen" value="<?php echo $nombreEmpresa.date("d-m-Y").$string_aleatorio.$fileName;?>" class="d-none">

		<img src="<?php echo RUTA_BLOG_COVER.$nombreEmpresa.date("d-m-Y").$string_aleatorio."$fileName";?>" class="imagen-3">

		<br>

		<?php
		echo "Se subió correctamente";

	} else {

	    echo "Falló la subida, error al mover el archivo";

	}

}

?>

