<?php
class Pasajero {
    
    //atributos
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;
    private $numAsiento;
    private $numTicket;

    /**
     * Crea un objeto de la clase
     * @param string $nom
     * @param string $ape
     * @param int $num
     * @param int $tel
     * @param int $asi
     * @param int $ticket
     */
    public function __construct($nom, $ape, $num, $tel, $asi, $ticket) {
        $this -> nombre = $nom;
        $this -> apellido = $ape;
        $this -> dni = $num;
        $this -> telefono = $tel;
        $this -> numAsiento = $asi;
        $this -> numTicket = $ticket;
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
     * Muestra el numero del asiento del pasajero
     * @return int  
     */    
    public function getNumAsiento() {
        return $this -> numAsiento;
    }

    /**
     * Muestra el numero del ticket del pasajero
     * @return int  
     */    
    public function getNumTicket() {
        return $this -> numTicket;
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
     * Modifica el numero del asiento del pasajero
     * @param int $nuevoAsi
     */
    public function setNumAsiento($nuevoAsi) {
        $this -> numAsiento = $nuevoAsi;
    }

    /**
     * Modifica el numero del ticket del pasajero
     * @param int $nuevoTic
     */
    public function setNumTicket($nuevoTic) {
        $this -> numTicket = $nuevoTic;
    }

    /**
 * Retorna el porcentaje que debe aplicarse como incremento según las características del pasajero
 * @return int
 */    
public function darPorcentajeIncremento() {
    $porcentaje = 0;    
    return $porcentaje;
} 

    /**
     * Muestra los atributos de la clase
     * @return string
     */
    public function __toString() {
        return "\nNombre del pasajero: " . $this -> getNombre() . "\nApellido del pasajero: " . $this -> getApellido() . 
        "\nDNI del pasajero: " . $this -> getDni() . "\nTelefono del pasajero: " . $this -> getTelefono() . 
        "\nNumero del asiento: " . $this -> getNumAsiento() . "\nNumero del ticket: " . $this -> getNumTicket() . "\n";
    }
    
}