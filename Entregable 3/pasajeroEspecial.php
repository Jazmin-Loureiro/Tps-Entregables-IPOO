<?php
class PasajeroEspecial extends Pasajero {

    //atributos 
    private $serviciosEspeciales;
    private $asistencia;
    private $alimentos;

    /**
    * Crea un objeto de la clase
    * @param string $nom
    * @param string $ape
    * @param int $num
    * @param int $tel
    * @param int $asi
    * @param int $ticket
    * @param boolean $servis
    * @param boolean $asis
    * @param boolean $ali
    */
    public function __construct($nom, $ape, $num, $tel, $asi, $ticket, $servis, $asis, $ali) {
        parent:: __construct($nom, $ape, $num, $tel, $asi, $ticket);
        $this -> serviciosEspeciales = $servis;
        $this -> asistencia = $asis;
        $this -> alimentos = $ali;
    }    

    /**
    * Muestra los servicios especiales
    * @return boolean
    */
    public function getServiciosEspeciales() {
        return $this -> serviciosEspeciales;
    }

    /**
    * Muestra la asistencia
    * @return boolean
    */
    public function getAsistencia() {
        return $this -> asistencia;
    }

    /**
    * Muestra los alimentos
    * @return boolean
    */
    public function getAlimentos() {
        return $this -> alimentos;
    }

    /**
    * Modifica los servicios especiales
    * @param boolean $nuevoS
    */
    public function setServiciosEspeciales($nuevoS) {
        $this -> serviciosEspeciales = $nuevoS;
    }

    /**
    * Modifica la asistencia
    * @param boolean $nuevasA
    */
    public function setAsistencia($nuevaA) {
        $this -> asistencia = $nuevaA;
    }

    /**
    * Modifica los alimentos
    * @param boolean $nuevoAli
    */
    public function setAlimentos($nuevoAli) {
        $this -> alimentos = $nuevoAli;
    }

    /**
    * Retorna el porcentaje que debe aplicarse como incremento según las características del pasajero
    * @return intsi
    */    
    public function darPorcentajeIncremento() {
        $extra = 0;
        $serviciosEspe = $this -> getServiciosEspeciales();
        $asistenciaExtra = $this -> getAsistencia();
        $alimentosEspe = $this -> getAlimentos();
        if ($serviciosEspe == true) {
            $extra = $extra + 1;
        }
        if ($asistenciaExtra == true) {
            $extra = $extra + 1;
        }
        if ($alimentosEspe == true) {
            $extra = $extra + 1;
        }
        if ($extra == 1) {
            $porcentaje = 15;
        }
        else {
            $porcentaje = 30;
        }
        return $porcentaje;
    } 

    /**
     * Retorna un string diciendo si necesita servicios especiales 
     * @return string
     */
    public function serviciosEspe() {
        if ($this -> getServiciosEspeciales() == true) {
            $respuesta = "Disponnible";
        }
        else {
            $respuesta = "No disponible";
        }
        return $respuesta;
    }

    /**
     * Retorna un string diciendo si necesita asistencia 
    * @return string
    */
    public function asistenciaExtra() {
        if ($this -> getAsistencia() == true) {
            $respuesta = "Disponnible";
        }
        else {
            $respuesta = "No disponible";
        }
        return $respuesta;
    }

    /**
     * Retorna un string diciendo si necesita alimentos especiales 
     * @return string
     */
    public function alimentosEspe() {
        if ($this -> getAlimentos() == true) {
            $respuesta = "Disponnible";
        }
        else {
            $respuesta = "No disponible";
        }
        return $respuesta;
    }

    /**
     * Muestra los atributos de la clase
     * @return string
     */
    public function __toString() {
        $datos = parent::__toString();
        return $datos . "\nServicios especiales: " . $this -> serviciosEspe() . "\nAsistencia: " . $this -> asistenciaExtra() . 
        "\nAlimentos especiales: " . $this -> alimentosEspe() . "\n";
    }

}