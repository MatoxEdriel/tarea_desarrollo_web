<?php

class Categoria {
    private $id_categoria;
    private $nombre;
    private $descripcion;

    function __construct() {

    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    // Métodos get y set parametrizados
    public function __set($nombre, $valor) {
        if (property_exists('Categoria', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Categoria', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}