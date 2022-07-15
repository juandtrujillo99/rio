<?php

class EntradaTienda {
    
    private $id;
    private $autor_id;
    private $url;
    private $imagen;
    private $url_externa;
    private $precio;
    private $titulo;
    private $texto;
    private $etiqueta;
    private $fecha;
    private $activa;
    
    public function __construct($id, $autor_id, $url, $imagen, $url_externa, $precio, $titulo, $texto, $etiqueta, $fecha, $activa) {
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> url = $url;
        $this -> imagen = $imagen;
        $this -> url_externa = $url_externa;
        $this -> precio = $precio;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> etiqueta = $etiqueta;
        $this -> fecha = $fecha;
        $this -> activa = $activa;
    }
     
    public function obtener_id() {
        return $this -> id;
    }
    
    public function obtener_autor_id() {
        return $this -> autor_id;
    }
    
    public function obtener_url() {
        return $this -> url;
    }
    
    public function obtener_imagen() {
        return $this -> imagen;
    }
    
    public function obtener_url_externa() {
        return $this -> url_externa;
    }
    
    public function obtener_precio() {
        return $this -> precio;
    }
    
    public function obtener_titulo() {
        return $this -> titulo;
    }
    
    public function obtener_texto() {
        return $this -> texto;
    }

    public function obtener_etiqueta() {
        return $this -> etiqueta;
    }
    
    public function obtener_fecha() {
        return $this -> fecha;
    }
    
    public function esta_activa() {
        return $this -> activa;
    }
    
    public function cambiar_url($url) {
        $this -> url = $url;
    }
    
    public function cambiar_titulo($titulo) {
        $this -> titulo = $titulo;
    }
    
    public function cambiar_texto($texto) {
        $this -> texto = $texto;
    }
    
    public function cambiar_activa($activa) {
        $this -> activa = $activa;
    }
}