<?php

$destinatario = $email;
$asunto = "Restablece tu contraseña ".$nombreEmpresa;
$mensaje = "Ingresa al siguiente enlace para restablecer tu contraseña: ".RUTA_RECUPERACION_CLAVE."/".$url_secreta;

$exito = mail($destinatario, $asunto, $mensaje);

if ($exito) {
	echo 'email enviado';
} else {
	echo 'envio fallido';
}