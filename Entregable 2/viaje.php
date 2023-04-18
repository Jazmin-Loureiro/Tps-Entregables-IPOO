<?php
class Viaje {
    
    //Atributos 
    private $codigo;
    private $destino;
    private $capMaxPas;
    private $coleccionPasajeros;
    private $responsable;


    /**
     * Metodo constructor, crea un objeto de la clase
     * @param int $codV
     * @param string $desV
     * @param int $cantidadV
     * @param array $psjV
     * @param object $respo
     */
    public function __construct($codV, $desV, $cantidadV, $psjV, $respo) {
        $this -> codigo = $codV;
        $this -> destino = $desV;
        $this -> capMaxPas = $cantidadV;
        $this -> coleccionPasajeros = $psjV;
        $this -> responsable = $respo;
    }


    /**
     * Muestra el codigo del viaje.
     * @return int
     */
    public function getCodigo() {
        return $this -> codigo;
    }

    /**
     * Muestra el destino del viaje.
     * @return string
     */
    public function getDestino() {
        return $this -> destino;
    }

    /**
     * Muestra la capacidad maxima del viaje.
     * @return int
     */
    public function getCapMaxPas() {
        return $this -> capMaxPas;
    }

    /**
     * Muestra el array de pasajeros del viaje.
     * @return array
     */
    public function getColeccionPasajeros() {
        return $this -> coleccionPasajeros;
    }

    /**
     * Muestra al responsable del viaje.
     * @return object
     */
    public function getResponsable() {
        return $this -> responsable;
    }

    /**
     * Permite modificar el codigo del viaje.
     * @param int $nuevoC
     */
    public function setCodigo($nuevoC) {
        $this -> codigo = $nuevoC;
    }

    /**
     * Permite modificar el destino del viaje.
     * @param string $nuevoD
     */
    public function setDestino($nuevoD) {
        $this -> destino = $nuevoD;
    }

    /**
     * Permite modificar la capacidad maxima del viaje.
     * @param int $nuevaCap
     */
    public function setCapMaxPas($nuevaCap) {
        $this -> capMaxPas = $nuevaCap;
    }

    /**
     * Permite modificar el array de pasajeros del viaje.
     * @param array $nuevosPasajeros
     */
    public function setColeccionPasajeros($nuevosPasajeros) {
        $this -> coleccionPasajeros = $nuevosPasajeros;
    }

    /**
     * Permite modificar el array de pasajeros del viaje.
     * @param object $nuevoResponsable
     */
    public function setResponsable($nuevoResponsable) {
        $this -> responsable = $nuevoResponsable;
    }

    /**
     * Muestra en un string todos los datos del viaje
     * return string
     */
    public function __toString() {
        $datosPas = "";
        $pasajeros = $this -> getColeccionPasajeros();
        $n = count($pasajeros);
        for ($i = 0; $i < $n; $i++) {
            $datosPas = $datosPas . 
            "\nPasajero N°" . ($i + 1) . ": \n" . $pasajeros[$i];
        }
        return "\nInformación del viaje: \n" . 
        "\nCodigo del viaje: \n" . $this -> getCodigo() . 
        "\nDestino del viaje: \n" . $this -> getDestino() . 
        "\nCantidad de pasajeros: \n" . $this -> getCapMaxPas() . 
        "\nPasajeros: \n" . $datosPas . 
        "\nResponsable: \n" . $this -> getResponsable();
    }

}
















