<?php



include_once 'app/admin/ValidadorLogin.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/Redireccion.inc.php';







ControlSesionAdmin :: cerrar_sesion();

Redireccion :: redirigir(SERVIDOR);