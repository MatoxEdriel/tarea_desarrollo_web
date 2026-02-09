<?php

class Vela {
    private $id_vela;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $aroma;
    private $color;
    private $id_categoria;
    private $fecha_registro;
    
    function __construct() {
        
    }

    function getId_vela() { 
        return $this->id_vela; 
    }

    function getNombre() { 
        return $this->nombre; 
    }

    function getDescripcion() { 
        return $this->descripcion; 
    }

    function getPrecio() { 
        return $this->precio; 
    }

    function getStock() { 
        return $this->stock; 
    }

    function getAroma() { 
        return $this->aroma; 
    }

    function getColor() { 
        return $this->color; 
    }

    function getId_categoria() { 
        return $this->id_categoria; 
    }

    function getFecha_registro() { 
        return $this->fecha_registro; 
    }

    function setId_vela($id_vela) { 
        $this->id_vela = $id_vela; 
    }

    function setNombre($nombre) { 
        $this->nombre = $nombre; 
    }

    function setDescripcion($descripcion) { 
        $this->descripcion = $descripcion; 
    }

    function setPrecio($precio) { 
        $this->precio = $precio; 
    }

    function setStock($stock) { 
        $this->stock = $stock; 
    }

    function setAroma($aroma) { 
        $this->aroma = $aroma; 
    }

    function setColor($color) { 
        $this->color = $color; 
    }

    function setId_categoria($id_categoria) { 
        $this->id_categoria = $id_categoria; 
    }
    
    function setFecha_registro($fecha_registro) { 
        $this->fecha_registro = $fecha_registro; 
    }

    // Métodos get y set parametrizados
    public function __set($nombre, $valor) {
        if (property_exists('Vela', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Vela', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}