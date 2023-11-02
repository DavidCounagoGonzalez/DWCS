<?php

class Jugador{
    public $nombre;
    public $mano = array();
    
    public function __construct($nombre, $mano) {
        $this->nombre = $nombre;
        $this->mano = $mano;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getMano() {
        return $this->mano;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setMano($mano): void {
        $this->mano = $mano;
    }



}
