<script async='async'>
    function _(el){
        return document.getElementById(el);
    }    

    function subirImagenes(){//sube las fotos de portada de las imagenes
        var file = _("archivoImagen").files[0];
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("archivoImagen", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "<?php echo 'app/tienda/CargarArchivoImagen.inc.php';?>");
        ajax.send(formdata);

        function progressHandler(event){
        //_("loaded_n_total").innerHTML = event.loaded+" bytes subidos de "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBarImagen").value = Math.round(percent);
        _("statusFile").innerHTML = Math.round(percent)+"% subido... Por favor espera.";
        }
        function completeHandler(event){
            _("statusFile").innerHTML = event.target.responseText;
            _("progressBarImagen").value = 0;
        }
        function errorHandler(event){
            _("statusFile").innerHTML = "Falló la subida";
        }
        function abortHandler(event){
            _("statusFile").innerHTML = "Subida cancelada";
        }
    }

    
</script>