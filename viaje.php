<?php
class Viaje {
    
    //Atributos 
    private $codigo;
    private $destino;
    private $capMaxPas;
    private $pasajeros;


      /**
     * Metodo constructor, crea un objeto de la clase
     * @param int
     * @param string
     * @param int
     * @param array
     */
    public function __construct($codV, $desV, $cantidadV, $psjV) {
       $this -> codigo = $codV;
       $this -> destino = $desV;
       $this -> capMaxPas = $cantidadV;
       $this -> pasajeros = $psjV;
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
    public function getPasajeros() {
        return $this -> pasajeros;
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
    public function setPasajeros($nuevosPasajeros) {
        $this -> pasajeros = $nuevosPasajeros;
    }

    /**
     * Muestra en un string todos los datos del viaje
     * return string
     */
    public function __toString() {
        $datosPas = "";
        for ($i = 0; $i < count($this -> getPasajeros()); $i++) {
            $datosPas = $datosPas . 
            "\nPasajero N°" . ($i + 1) . ": " . $this -> getPasajeros()[$i]["nombre"] . 
            " " . $this -> getPasajeros()[$i]["apellido"] . 
            " con DNI \n" . $this -> getPasajeros()[$i]["dni"];
        }
        return "\nInformación del viaje: \n" . 
        "\nCodigo del viaje: \n" . $this -> getCodigo() . 
        "\nDestino del viaje: \n" . $this -> getDestino() . 
        "\nCantidad de pasajeros: \n" . $this -> getCapMaxPas() . 
        "\nPasajeros: \n" . $datosPas;
    }
}
















