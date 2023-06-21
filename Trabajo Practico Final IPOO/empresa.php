<?php
class Empresa {
    //atributos
    private $idempresa;
    private $enombre;
    private $edireccion;
    private $mensajeoperacion;

    /**
     * Crea un objeto de la clase
     */
    public function __construct() {
        $this -> idempresa = 0;
        $this -> enombre = "";
        $this -> edireccion = "";
    }

    /**
     * Carga los datos de la empresa
     * @param $idempresa
     * @param $enom
     * @param $edire
     */
    public function cargar($idempresa, $enom, $edire) {
        $this -> setIdempresa($idempresa);
        $this -> setEnombre($enom);
        $this -> setEdireccion($edire);
    }

    /**
     * Muestra el id de la empresa
     * @return string  
     */    
    public function getIdempresa() {
        return $this -> idempresa;
    }

    /**
     * Muestra el nombre de la empresa
     * @return string  
     */    
    public function getEnombre() {
        return $this -> enombre;
    }

    /**
     * Muestra la direccion de la empresa
     * @return string  
     */    
    public function getEdireccion() {
        return $this -> edireccion;
    }
    
    public function getMensajeoperacion(){
		return $this->mensajeoperacion ;
	}

    /**
     * Modifica el id de la empresa
     * @param string $nuevoId
     */
    public function setIdempresa($idempresa) {
        $this -> idempresa = $idempresa;
    }

    /**
     * Modifica el nombre de la empresa
     * @param string $nuevoN
     */
    public function setEnombre($nuevoN) {
        $this -> enombre = $nuevoN;
    }

    /**
     * Modifica la direccion de la empresa
     * @param string $nuevaD
     */
    public function setEdireccion($nuevaD) {
        $this -> edireccion = $nuevaD;
    }

    public function setMensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    /**
	 * Recupera los datos de una empresa por su Id
	 * @param int $idEmpresaIngresado
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function Buscar($idEmpresaIngresado){
		$base=new BaseDatos();
		$consultaIdEmpresa="Select * from empresa where idempresa=".$idEmpresaIngresado;
        //echo "\nEsta es la consulta de buscar: " . $consultaIdEmpresa;
		$resp= false;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaIdEmpresa)){
				if($arregloEmpresa=$base->Registro()){					
				    $this->setIdempresa($idEmpresaIngresado);
					$this->setEnombre($arregloEmpresa['enombre']);
					$this->setEdireccion($arregloEmpresa['edireccion']);
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
	    $arregloEmpresas = null;
		$base=new BaseDatos();
		$consulta="Select * from empresa ";
		if ($condicion!=""){
		    $consulta=$consulta.' where '.$condicion;
		}
		$consulta.=" order by idempresa ";
		//echo $consulta;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){				
			    $arregloEmpresas= array();
				while($row2=$base->Registro()){
				    $idempresa=$row2['idempresa'];
					$enombre=$row2['enombre'];
					$edireccion=$row2['edireccion'];
				
					$empresa=new Empresa();
					$empresa->cargar($idempresa, $enombre, $edireccion);
					array_push($arregloEmpresas,$empresa);
				}
	        }	
            else {
		        $this->setMensajeoperacion($base->getError());
			}
	    }	
        else {
		    $this->setMensajeoperacion($base->getError());
		}	
		return $arregloEmpresas;
	}	

    public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$consultaInsertar="INSERT INTO empresa(enombre, edireccion) 
				VALUES ('".$this->getEnombre()."','".$this->getEdireccion()."')";
		//echo $consultaInsertar;
		if($base->Iniciar()){

			if($id = $base->devuelveIDInsercion($consultaInsertar)){
                $this->setIdempresa($id);
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
		$consultaModifica="UPDATE empresa SET enombre='".$this->getEnombre()."',edireccion='".$this->getEdireccion()."' WHERE idempresa=". $this->getIdempresa();
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
				$consultaBorra="DELETE FROM empresa WHERE idempresa=".$this->getIdempresa();
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
        return "\nId de la empresa: " . $this -> getIdempresa() . "\nNombre de la empresa: " . $this -> getEnombre() .
        "\nDireccion de la empresa: " . $this -> getEdireccion();
    }




}