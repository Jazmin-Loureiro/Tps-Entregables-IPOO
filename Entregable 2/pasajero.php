<?php
class Pasajero {
    
    //atributos
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    /**
     * Crea un objeto de la clase
     * @param string $nom
     * @param string $ape
     * @param int $num
     * @param int $tel
     */
    public function __construct($nom, $ape, $num, $tel) {
        $this -> nombre = $nom;
        $this -> apellido = $ape;
        $this -> dni = $num;
        $this -> telefono = $tel;
    }
    
    /**
     * Muestra el nombre del pasajero
     * @return string  
     */    
    public function getNombre() {
        return $this -> nombre;
    }

    /**
     * Muestra el apellido del pasajero
     * @return string  
     */    
    public function getApellido() {
        return $this -> apellido;
    }

    /**
     * Muestra el dni del pasajero
     * @return int  
     */    
    public function getDni() {
        return $this -> dni;
    }

    /**
     * Muestra el telefono del pasajero
     * @return int  
     */    
    public function getTelefono() {
        return $this -> telefono;
    }

    /**
     * Modifica el nombre del pasajero
     * @param string $nuevoN
     */
    public function setNombre($nuevoN) {
        $this -> nombre = $nuevoN;
    }

    /**
     * Modifica el apellido del pasajero
     * @param string $nuevoA
     */
    public function setApellido($nuevoA) {
        $this -> apellido = $nuevoA;
    }

    /**
     * Modifica el dni del pasajero
     * @param int $nuevoD
     */
    public function setDni($nuevoD) {
        $this -> dni = $nuevoD;
    }

    /**
     * Modifica el telefono del pasajero
     * @param int $nuevoT
     */
    public function setTelefono($nuevoT) {
        $this -> telefono = $nuevoT;
    }

    /**
     * Muestra los atributos de la clase
     * @return string
     */
    public function __toString() {
        return "\nNombre del pasajero: " . $this -> getNombre() . "\nApellido del pasajero: " . $this -> getApellido() . "\nDNI del pasajero: " . $this -> getDni() . "\nTelefono del pasajero: " . $this -> getTelefono();
    }
    
}