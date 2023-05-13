<?php
class Viaje {
    
    //Atributos 
    private $codigo;
    private $destino;
    private $capMaxPas;
    private $coleccionPasajeros;
    private $responsable;
    private $costo;
    private $sumaCostos;


    /**
     * Metodo constructor, crea un objeto de la clase
     * @param int $codV
     * @param string $desV
     * @param int $cantidadV
     * @param object $respo
     * @param int $cos
     */
    public function __construct($codV, $desV, $cantidadV, $respo, $cos) {
        $this -> codigo = $codV;
        $this -> destino = $desV;
        $this -> capMaxPas = $cantidadV;
        $this -> coleccionPasajeros = [];
        $this -> responsable = $respo;
        $this -> costo = $cos;
        $this -> sumaCostos = 0;
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
     * Muestra el costo del viaje.
     * @return int
     */
    public function getCosto() {
        return $this -> costo;
    }

    /**
     * Muestra la sumatoria de todos los pasajes vendidos del viaje.
     * @return int
     */
    public function getSumaCosto() {
        return $this -> sumaCostos;
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
     * Permite modificar el costo del viaje.
     * @param int $nuevoCosto
     */
    public function setCosto($nuevoCosto) {
        $this -> costo = $nuevoCosto;
    }

    /**
     * Permite modificar la sumatoria de los pasajes vendidos del viaje.
     * @param int $nuevaSuma
     */
    public function setSumaCostos($nuevaSuma) {
        $this -> sumaCostos = $nuevaSuma;
    }

    /**
     * Retorna verdadero si la cantidad de pasajeros del viaje 
     * es menor a la cantidad máxima de pasajeros y falso caso contrario
     * @return boolean
     */
    public function hayPasajesDisponibles() {
        $pasajeros = $this -> getColeccionPasajeros();
        $cantPasajeros = count($pasajeros);
        $capacidadMax = $this -> getCapMaxPas();
        if ($cantPasajeros < $capacidadMax) {
            $disponibilidad = true;
        }
        else {
            $disponibilidad = false;
        }
        return $disponibilidad;
    }

    /**
     * Incorpora el pasajero a la colección de pasajeros (solo si hay espacio disponible) y
     * actualiza los costos abonados y retorna el costo final que deberá ser abonado por el pasajero.
     * @param object $objPasajero
     * @return float 
     */
    public function venderPasaje($objPasajero) {
        $dispoViaje = $this -> hayPasajesDisponibles();
        $costoV = $this -> getCosto();
        $sumaFinal = $this -> getSumaCosto();
        $arrayPasajeros = $this -> getColeccionPasajeros();
        $costoFinal = 0;
        if ($dispoViaje == true) {
            $incremento = $objPasajero -> darPorcentajeIncremento();
            $costoFinal = $costoV + (($incremento/100)*$costoV);
            $sumaFinal = $sumaFinal + $costoFinal;
            $this -> setSumaCostos($sumaFinal);
            array_push($arrayPasajeros, $objPasajero);
            $this -> setColeccionPasajeros($arrayPasajeros);
        }
        return $costoFinal; //EN EL MENU SI ES CERO EL COSTO FINAL SALE UN CARTEL QUE DIGA QUE NO HAY PASAJES DISPONIBLES
    }



    /**
     * Muestra en un string con los datos de los pasajeros
     * return string
     */
    public function datosPasajeros() {
        $datosPas = "";
        $pasajeros = $this -> getColeccionPasajeros();
        $n = count($pasajeros);
        for ($i = 0; $i < $n; $i++) {
            $datosPas = $datosPas . 
            "\nPasajero N°" . ($i + 1) . ": \n" . $pasajeros[$i];
        }
        return $datosPas;
    }

    /**
     * Muestra en un string todos los datos del viaje
     * return string
     */
    public function __toString() {
        $datos = $this -> datosPasajeros();
        return "\nInformación del viaje: \n" . 
        "\nCodigo del viaje: \n" . $this -> getCodigo() . 
        "\nDestino del viaje: \n" . $this -> getDestino() . 
        "\nCapacidad maxima de pasajeros: \n" . $this -> getCapMaxPas() . 
        "\nCosto del viaje: " . $this -> getCosto() . 
        "\nSumatoria de todos los pasajes vendidos: " . $this -> getSumaCosto() . "\n" . 
        "\nPasajeros: \n" . $datos . 
        "\nResponsable: \n" . $this -> getResponsable();
    }

}
















