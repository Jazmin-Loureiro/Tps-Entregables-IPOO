<?php
include_once ("pasajero.php");
class PasajeroEstandar extends Pasajero {

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
        parent:: __construct($nom, $ape, $num, $tel, $asi, $ticket);
    }

    /**
     * Retorna el porcentaje que debe aplicarse como incremento según las características del pasajero
     * @return int
     */    
    public function darPorcentajeIncremento() {
        $porcentaje = 10;
        return $porcentaje;    
    } 

    /**
     * Muestra los atributos de la clase
     * @return string
     */
    public function __toString() {
        $datos = parent::__toString();
        return $datos;
    }

}

