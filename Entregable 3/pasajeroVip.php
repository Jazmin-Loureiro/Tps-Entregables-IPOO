<?php
include_once ("pasajero.php");
class PasajeroVip extends Pasajero {

    //atributos 
    private $numViajero;
    private $cantMillas;

    /**
     * Crea un objeto de la clase
     * @param string $nom
     * @param string $ape
     * @param int $num
     * @param int $tel
     * @param int $asi
     * @param int $ticket
     * @param int $viajero
     * @param int $millas
     */
    public function __construct($nom, $ape, $num, $tel, $asi, $ticket, $viajero, $millas) {
        parent:: __construct($nom, $ape, $num, $tel, $asi, $ticket);
        $this -> numViajero = $viajero;
        $this -> cantMillas = $millas;
    }

    /**
     * Muestra el numero del viajero
     * @return int
     */
    public function getNumViajero() {
        return $this -> numViajero;
    }

    /**
     * Muestra las cantidad de millas del viajero
     * @return int
     */
    public function getCantMillas() {
        return $this -> cantMillas;
    }

    /**
     * Modifica el numero del viajero
     * @param int $nuevoViajero
     */
    public function setNumViajero($nuevoViajero) {
        $this -> numViajero = $nuevoViajero;
    }

    /**
     * Modifica la cantidad de millas del viajero
     * @param int $nuevasMillas
     */
    public function setCantMillas($nuevasMillas) {
        $this -> cantMillas = $nuevasMillas;
    }

    /**
     * Retorna el porcentaje que debe aplicarse como incremento según las características del pasajero
     * @return int
     */    
    public function darPorcentajeIncremento() {
        $porcentaje = 35;
        $millas = $this -> getCantMillas();
        if ($millas > 300) {
            $porcentaje = 30;
        }
        return $porcentaje;
    } 

    /**
     * Muestra los atributos de la clase
     * @return string
     */
    public function __toString() {
        $datos = parent::__toString();
        return $datos . "Numero de viajero: " . $this -> getNumViajero() . 
        "\nCantidad de millas: " . $this -> getCantMillas() . "\n";
    }

}