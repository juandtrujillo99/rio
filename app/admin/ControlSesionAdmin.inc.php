<?php

//Esta clase se encarga de autorizar el acceso al admin
class ControlSesionAdmin{

    public static function iniciar_sesion($id_admin, $nombre_admin) {
        if (session_id() == '') {
            session_start();
        }
        $_SESSION['id_admin'] = $id_admin;
        $_SESSION['nombre_admin'] = $nombre_admin;
    }

        

    public static function cerrar_sesion() {
        if (session_id() == '') {
            session_start();
        }


        if (isset($_SESSION['id_admin'])) {
            unset($_SESSION['id_admin']);
        }
    

        if (isset($_SESSION['nombre_admin'])) {
            unset($_SESSION['nombre_admin']);
        }

        session_destroy();
    }

    

    public static function sesion_iniciada() {
        if (session_id() == '') {
            session_start();
        }

        
        if (isset($_SESSION['id_admin']) && isset($_SESSION['nombre_admin'])) {
            return true;
        } else {
            return false;
        }
    }
}

    