<?php

abstract class Empleado{
    
    public $nombre;
    public $apellido;
    public $añosEmp;
    public $salariOG;
    
    public function __construct($nombre, $apellido, $añosEmp, $salariOG) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->añosEmp = $añosEmp;
        $this->salariOG = $salariOG;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getAñosEmp() {
        return $this->añosEmp;
    }

    public function getSalariOG() {
        return $this->salariOG;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido): void {
        $this->apellido = $apellido;
    }

    public function setAñosEmp($añosEmp): void {
        $this->añosEmp = $añosEmp;
    }

    public function setSalariOG($salariOG): void {
        $this->salariOG = $salariOG;
    }

    public static function calculaSalario($empleado){
        $salarioFinal = $empleado->getSalariOG() + ($empleado->getSalariOG()*($empleado->getAñosEmp()/100)) ;
        return round($salarioFinal, 2);
    }
}

class Normal extends Empleado{
    public static function calcularSalario($empleado) {
        $salarioFinal = $empleado->getSalariOG() + ($empleado->getSalariOG()*($empleado->getAñosEmp()/100)) ;
        return round($salarioFinal, 2);
    }
}

class Jefe extends Empleado{
    public static function calcularSalario($empleado) {
        $salarioFinal = $empleado->getSalariOG() + ($empleado->getSalariOG()*($empleado->getAñosEmp()/20)) ;
        return round($salarioFinal, 2);
    }
}

class Becario extends Empleado{
    public static function calculaSalario($empleado) {
        $salarioFinal = $empleado->getSalariOG() + ($empleado->getSalariOG()*($empleado->getAñosEmp()/500)) ;
        return round($salarioFinal, 2);
    }
}

