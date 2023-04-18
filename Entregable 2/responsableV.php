<?php
class ResponsableV {
    
    //atributos
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    /**
     * Crea un objeto de la clase
     * @param int $numE
     * @param int $numL
     * @param string $nom
     * @param string $ape
     */
    public function __construct($numE, $numL, $nom, $ape) {
        $this -> numEmpleado = $numE;
        $this -> numLicencia = $numL;
        $this -> nombre = $nom;
        $this -> apellido = $ape;
    }

    /**
     * Muestra el numero de empleado del responsable
     * @return int
     */
    public function getNumEmpleado() {
        return $this -> numEmpleado;
    }

    /**
     * Muestra el numero de licencia del responsable
     * @return int
     */
    public function getNumLicencia() {
        return $this -> numLicencia;
    }

    /**
     * Muestra el nombre del responsable
     * @return string
     */
    public function getNombre() {
        return $this -> nombre;
    }

    /**
     * Muestra el apellido del responsable
     * @return string
     */
    public function getApellido() {
        return $this -> apellido;
    }

    /**
     * Modifica el numero de empleado del responsable
     * @param int $nuevoNE
     */
    public function setNumEmpleado($nuevoNE) {
        $this -> numEmpleado = $nuevoNE;
    }
    
    /**
     * Modifica el numero de licencia del responsable
     * @param int $nuevoNL
     */
    public function setNumLicencia($nuevoNL) {
        $this -> numLicencia = $nuevoNL;
    }

    /**
     * Modifica el nombre del responsable
     * @param string $nuevoN
     */
    public function setNombre($nuevoN) {
        $this -> nombre = $nuevoN;
    }

    /**
     * Modifica el apellido del responsable
     * @param string $nuevoA
     */
    public function setApellido($nuevoA) {
        $this -> apellido = $nuevoA;
    }

    /**
     * Muestra los atributos de la clase
     * @return string
     */
    public function __toString() {
        return "\nNumero de empleado: " . $this -> getNumEmpleado() . "\nNumero de licencia: " . $this -> getNumLicencia() . "\nNombre: " . $this -> getNombre() . "\nApellido: " . $this -> getApellido();
    }
}