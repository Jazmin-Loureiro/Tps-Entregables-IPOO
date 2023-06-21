<?php
class Responsable {
    //atributos
    private $rnumeroempleado;
    private $rnumerolicencia;
    private $rnombre;
    private $rapellido;  
    private $mensajeoperacion;

    /**
     * Crea un objeto de la clase
     */
    public function __construct() {
        $this -> rnumeroempleado = 0;
        $this -> rnumerolicencia = "";
        $this -> rnombre = "";
        $this -> rapellido = "";
    }

    /**
     * Carga los datos del responsable
     * @param $rnum
     * @param $rnuml
     * @param $rnom
     * @param $rape
     */
    public function cargar($rnumeroempleado, $rnuml, $rnom, $rape) {
        $this -> setRnumeroempleado($rnumeroempleado);
        $this -> setRnumerolicencia($rnuml);
        $this -> setRnombre($rnom);
        $this -> setRapellido($rape);
    }

    /**
     * Muestra el numero de empleado
     * @return int  
     */    
    public function getRnumeroempleado() {
        return $this -> rnumeroempleado;
    }

    /**
     * Muestra el numero de licencia
     * @return int  
     */    
    public function getRnumerolicencia() {
        return $this -> rnumerolicencia;
    }

    /**
     * Muestra el nombre del responsable
     * @return string  
     */    
    public function getRnombre() {
        return $this -> rnombre;
    }

    /**
     * Muestra el apellido del responsable
     * @return string  
     */    
    public function getRapellido() {
        return $this -> rapellido;
    }

    public function getMensajeoperacion(){
		return $this->mensajeoperacion ;
	}

    /**
     * Modifica el numero de empleado
     * @param int $nuevoN
     */
    public function setRnumeroempleado($rnumeroempleado) {
        $this -> rnumeroempleado = $rnumeroempleado;
    }

    /**
     * Modifica el numero de licencia
     * @param int $nuevaL
     */
    public function setRnumerolicencia($nuevaL) {
        $this -> rnumerolicencia = $nuevaL;
    }

    /**
     * Modifica el nombre del responsable
     * @param string $nuevoNom
     */
    public function setRnombre($nuevoNom) {
        $this -> rnombre = $nuevoNom;
    }

    /**
     * Modifica el apellido del responsable
     * @param int $nuevoA
     */
    public function setRapellido($nuevoA) {
        $this -> rapellido = $nuevoA;
    }

    public function setMensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    /**
	 * Recupera los datos del responsable a traves del numero del empleado
	 * @param int $rnumeroempleadoIngresado
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function Buscar($rnumeroempleadoIngresado){
		$base=new BaseDatos();
		$consultaRnumeroEmpleado="Select * from responsable where rnumeroempleado=".$rnumeroempleadoIngresado;
        //echo "\nEsta es la consulta de buscar: " . $consultaRnumeroEmpleado;
		$resp= false;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaRnumeroEmpleado)){
				if($arregloResponsable=$base->Registro()){					
				    $this->setRnumeroempleado($rnumeroempleadoIngresado);
					$this->setRnumerolicencia($arregloResponsable['rnumerolicencia']);
					$this->setRnombre($arregloResponsable['rnombre']);
                    $this->setRapellido($arregloResponsable['rapellido']);
					$resp= true;
				}				
		    }	
            else {
                $this->setMensajeoperacion($base->getError());
			}
		}	
        else {
		    $this->setMensajeoperacion($base->getError());
		}		
		return $resp;
	}

    public function listar($condicion=""){
	    $arregloResponsables = null;
		$base=new BaseDatos();
		$consulta="Select * from responsable ";
		if ($condicion!=""){
		    $consulta=$consulta.' where '.$condicion;
		}
		$consulta.=" order by rnumeroempleado ";
		//echo $consulta;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){				
			    $arregloResponsables= array();
				while($row2=$base->Registro()){
				    $rnumeroempleado=$row2['rnumeroempleado'];
					$rnumerolicencia=$row2['rnumerolicencia'];
					$rnombre=$row2['rnombre'];
					$rapellido=$row2['rapellido'];
				
					$responsable=new Responsable();
					$responsable->cargar($rnumeroempleado, $rnumerolicencia, $rnombre, $rapellido);
					array_push($arregloResponsables,$responsable);
				}
	        }	
            else {
		        $this->setMensajeoperacion($base->getError());
			}
	    }	
        else {
		    $this->setMensajeoperacion($base->getError());
		}	
		return $arregloResponsables;
	}

    public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$consultaInsertar="INSERT INTO responsable(rnumerolicencia, rnombre, rapellido) 
				VALUES (". $this->getRnumerolicencia().",'".$this->getRnombre()."','". $this->getRapellido()."')";
		//echo $consultaInsertar;
		if($base->Iniciar()){

			if($id = $base->devuelveIDInsercion($consultaInsertar)){
                $this->setRnumeroempleado($id);
			    $resp=  true;

			}	else {
					$this->setMensajeoperacion($base->getError());
					
			}

		} else {
				$this->setMensajeoperacion($base->getError());
			
		}
		return $resp;
	}

    public function modificar(){
	    $resp =false; 
	    $base=new BaseDatos();
		$consultaModifica="UPDATE responsable SET rnumerolicencia=".$this->getRnumerolicencia().",rnombre='".$this->getRnombre()."',rapellido='".$this->getRapellido()."' WHERE rnumeroempleado=". $this->getRnumeroempleado();
		//echo $consultaModifica;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaModifica)){
			    $resp=  true;
			}else{
				$this->setMensajeoperacion($base->getError());
				
			}
		}else{
				$this->setMensajeoperacion($base->getError());
	
		}
		return $resp;
	}

    public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM responsable WHERE rnumeroempleado=".$this->getRnumeroempleado();
				if($base->Ejecutar($consultaBorra)){
				    $resp=  true;
				}else{
						$this->setMensajeoperacion($base->getError());
					
				}
		}else{
				$this->setMensajeoperacion($base->getError());
			
		}
		return $resp; 
	}

    /**
     * Muestra los atributos de la clase
     * @return string
     */
    public function __toString() {
        return "\nNumero de empleado: " . $this -> getRnumeroempleado() . "\nNumero de licencia: " . $this -> getRnumerolicencia() . 
        "\nNombre del responsable: " . $this -> getRnombre() . "\nApellido del responsable: " . $this -> getRapellido();
    }

}

    