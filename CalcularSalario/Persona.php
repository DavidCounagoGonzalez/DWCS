<?php

class Persona {
    public $nombre;
    public $apellido;
    public $salario;
    public $edad;
    
    public function __construct($nombre, $apellido, $salario, $edad) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->salario = $salario;
        $this->edad = $edad;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido): void {
        $this->apellido = $apellido;
    }

    public function setSalario($salario): void {
        $this->salario = $salario;
    }

    public function setEdad($edad): void {
        $this->edad = $edad;
    }
    
    public static function calcular($persona) {
        $salario = $persona->getSalario();
        
        if($salario<=2000 && $salario>=1000){
            if(($persona->getEdad())>45){
                $salario += ($salario*0.03);
            } else {
                $salario += ($salario*0.1);
            }
        }else if($salario<1000){
            if(($persona->getEdad())<30){
                $salario = 1100;
            }else if(($persona->getEdad())>45){
                $salario += ($salario*0.15);
            }else{
                $salario += ($salario*0.03);
            }
        }
        
        // echo "<p> El salario de " . $persona->getNombre() . " " . $persona->getApellido() . " es de " . round($salario, 2) . "€</p>";
        return $salario;
    }   
}

