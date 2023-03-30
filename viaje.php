<?php
class Viaje {
    //Atributos 
    private $codigo;
    private $destino;
    private $capMaxPas;
    private $pasajeros;

    //Metodo constructor
    public function __construct($codV, $desV, $cantidadV, $psjV) {
       $this -> codigo = $codV;
       $this -> destino = $desV;
       $this -> capMaxPas = $cantidadV;
       $this -> pasajeros = $psjV;
    }

    public function getCodigo() {
        return $this -> codigo;
    }

    public function getDestino() {
        return $this -> destino;
    }

    public function getCapMaxPas() {
        return $this -> capMaxPas;
    }

    public function getPasajeros() {
        return $this -> pasajeros;
    }

    public function setCodigo($nuevoC) {
        $this -> codigo = $nuevoC;
    }

    public function setDestino($nuevoD) {
        $this -> destino = $nuevoD;
    }

    public function setCapMaxPas($nuevaCap) {
        $this -> capMaxPas = $nuevaCap;
    }

    public function setPasajeros($nuevosPasajeros) {
        $this -> pasajeros = $nuevosPasajeros;
    }

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
        "Pasajeros: \n" . $datosPas;
    }
}
















