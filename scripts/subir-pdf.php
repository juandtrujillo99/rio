<?php

/////////////ENLISTAR LOS FICHEROS EXISTENTES
$listar = null;
$carpeta = "pdf/".$tipoGuia."/";//carpeta donde se guardan los archivos
$directorio=opendir($carpeta);

while ($elemento = readdir($directorio)){
  if ($elemento != '.' && $elemento != '..'){
    if (is_dir($carpeta.$elemento))
    {
      $listar .="<a href='$carpeta$elemento' target='_blank'>$elemento</a><br><hr>";
    }
    else
    {
      $listar .=" <a href='$carpeta$elemento' target='_blank'>$elemento</a><br><hr>";
    }
  }
}


if (!isset($_POST["subir"])||empty($_POST["subir"])) {
    $_POST["subir"]='';
  }


$mensajeOk = null; 


///////////////////////// SUBIR UN NUEVO FICHERO /////////////////////////////////////////////
if ($_POST["subir"] == "cargar"){
  $folder = $carpeta;
  $archivo = $_FILES["formato"]["name"];
  $archivo = str_replace(' ', '-', $archivo);
  move_uploaded_file($_FILES["formato"]["tmp_name"] , "$folder".$archivo);
  $usuario = $_POST["email"];
  $nuevoNombre = $usuario."-".$tipoGuia;
  rename("$folder".$archivo, "$folder".$nuevoNombre);
  ?>
  <div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
    <div class="col-2 col-md-4"></div>
    <div class="col-8 col-md-4">
      <div class="card">
        <div class="card-content">
          <p class="card-title textoBold">Se ha subido el archivo <?php echo $nuevoNombre; ?> con éxito</p>
          <p>Recarga la página en caso de que no lo veas en la lista</p>
        </div>
        <div class="card-action">
          <a href="<?php echo $rutaFile; ?>" class=" btn btn-principal-animado">Entendido</a>
        </div>
      </div>
    </div>
    <div class="col-2 col-md-4"></div>
  </div>
  <?php 
}


/////////////////////////////// BORRAR ARCHIVO ////////////////////////////////////


if (isset($_POST['borrar'])){
  $borrarFor=($_POST['borrarFor']);
  @unlink($carpeta.$borrarFor);
   ?>
  <div class="row desaparecer-automaticamente section center-align valign-wrapper" style="position: fixed;z-index: 1000;width: 100%;">
    <div class="col-2 col-md-4"></div>
    <div class="col-8 col-md-4">
      <div class="card">
        <div class="card-content">
          <p class="card-title textoBold">Se eliminó el archivo con éxito</p>
          <p>Recarga la página en caso de que no veas los cambios en lista</p>
        </div>
        <div class="card-action">
          <a href="<?php echo $rutaFile; ?>" class=" btn btn-principal-animado">Entendido</a>
        </div>
      </div>
    </div>
    <div class="col-2 col-md-4"></div>
  </div>
  <?php 
}
            