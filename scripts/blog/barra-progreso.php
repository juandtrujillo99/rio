<script async='async'>
    function _(el){
        return document.getElementById(el);
    }    
    function progressHandler(event){
        //_("loaded_n_total").innerHTML = event.loaded+" bytes subidos de "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent)+"% subido... Por favor espera.";
    }
    function completeHandler(event){
        _("status").innerHTML = event.target.responseText;
        _("progressBar").value = 0;
    }
    function errorHandler(event){
        _("status").innerHTML = "Falló la subida";
    }
    function abortHandler(event){
        _("status").innerHTML = "Subida cancelada";
    }

    function subirImagen(){//sube las fotos de los controles de usuario
        var file = _("file1").files[0];
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("file1", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "<?php echo 'app/blog/CargarArchivo.inc.php';?>");
        ajax.send(formdata);
    }
</script>