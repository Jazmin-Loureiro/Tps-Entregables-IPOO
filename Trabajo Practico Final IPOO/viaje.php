<?php

use LDAP\Result;

class Viaje {
    //Atributos
    private $idviaje;
	private $vdestino; 
    private $vcantmaxpasajeros;
	private $objEmpresa;
    private $objResponsable;
    private $vimporte;
    private $colPasajeros;
    private $mensajeoperacion;

    /**
     * Crea un objeto de la clase
     */
    public function __construct() {
        $this -> idviaje = 0;
        $this -> vdestino = "";
        $this -> vcantmaxpasajeros = "";
        $this -> objEmpresa = "";
        $this -> objResponsable = "";
        $this -> vimporte = "";
        $this -> colPasajeros = [];
    }

    /**
     * Carga los datos del viaje
     * @param $idv
     * @param $vdes
     * @param $vcant
     * @param $objE
     * @param $objR
     * @param $vimp
     */
    public function cargar($idviaje, $vdes, $vcant, $objE, $objR, $vimp) {
        $this -> setIdviaje($idviaje);
        $this -> setVdestino($vdes);
        $this -> setVcantmaxpasajeros($vcant);
        $this -> setObjEmpresa($objE);
        $this -> setObjResponsable($objR);
        $this -> setVimporte($vimp);
    }

    /**
     * Muestra el id del viaje
     * @return int  
     */    
    public function getIdviaje() {
        return $this -> idviaje;
    }

    /**
     * Muestra el destino del viaje
     * @return string
     */    
    public function getVdestino() {
        return $this -> vdestino;
    }

    /**
     * Muestra la cantidad maxima de pasajeros
     * @return int
     */    
    public function getVcantmaxpasajeros() {
        return $this -> vcantmaxpasajeros;
    }

    /**
     * Muestra el obj empresa
     * @return object  
     */    
    public function getObjEmpresa() {
        return $this -> objEmpresa;
    }

    /**
     * Muestra el obj responsable
     * @return object  
     */    
    public function getObjResponsable() {
        return $this -> objResponsable;
    }

    /**
     * Muestra la coleccion de pasajeros
     * @return array  
     */    
    public function getColPasajeros() {
        return $this -> colPasajeros;
    }

    public function getMensajeoperacion(){
		return $this->mensajeoperacion ;
	}

    /**
     * Muestra el importe del viaje
     * @return int  
     */    
    public function getVimporte() {
        return $this -> vimporte;
    }

    /**
     * Modifica el id del viaje
     * @param int $nuevoId
     */
    public function setIdviaje($idviaje) {
        $this -> idviaje = $idviaje;
    }

    /**
     * Modifica el destino del viaje
     * @param string $nuevoDes
     */
    public function setVdestino($nuevoDes) {
        $this -> vdestino = $nuevoDes;
    }

    /**
     * Modifica cantidad maxima de pasajeros
     * @param int $nuevaCant
     */
    public function setVcantmaxpasajeros($nuevaCant) {
        $this -> vcantmaxpasajeros = $nuevaCant;
    }

    /**
     * Modifica el obj empresa
     * @param object $nuevoIdEm
     */
    public function setObjEmpresa($nuevoObjE) {
        $this -> objEmpresa = $nuevoObjE;
    }

    /**
     * Modifica el obj responsable
     * @param object $nuevoObjR
     */
    public function setObjResponsable($nuevoObjR) {
        $this -> objResponsable = $nuevoObjR;
    }

    /**
     * Modifica el importe del viaje
     * @param int $nuevoImp
     */
    public function setVimporte($nuevoImp) {
        $this -> vimporte = $nuevoImp;
    }

    public function setMensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    /**
     * Modifica la coleccion de pasajeros
     * @param array $nuevaCol
     */
    public function setColPasajeros($nuevaCol) {
        $this -> colPasajeros = $nuevaCol;
    }

    /**
	 * Recupera los datos de un viaje a traves de el Id
	 * @param int $idViajeIngresado
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function Buscar($idViajeIngresado){
		$base=new BaseDatos();
		$consultaIdViajeIngresado="Select * from viaje where idviaje=".$idViajeIngresado;
        //echo "\nEsta es la consulta de buscar: " . $consultaIdViajeIngresado;
		$resp= false;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaIdViajeIngresado)){
				if($arregloViajes=$base->Registro()){					
				    $this->setIdviaje($idViajeIngresado);
					$this->setVdestino($arregloViajes['vdestino']);
					$this->setVcantmaxpasajeros($arregloViajes['vcantmaxpasajeros']);
                    $newObjEmpresa = new Empresa();
                    $newObjEmpresa -> Buscar($arregloViajes['idempresa']);
                    $this->setObjEmpresa($newObjEmpresa);
                    $newObjResponsable = new Responsable();
                    $newObjResponsable -> Buscar($arregloViajes['rnumeroempleado']);
                    $this->setObjResponsable($newObjResponsable);
                    $this->setVimporte($arregloViajes['vimporte']);
                    $newObjPasajero = new Pasajero;
                    $arregloPasajeros = $newObjPasajero -> listar("idviaje=".$idViajeIngresado);
                    $this->setColPasajeros($arregloPasajeros);
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
	    $arregloViajes = null;
		$base=new BaseDatos();
		$consulta="Select * from viaje ";
		if ($condicion!=""){
		    $consulta=$consulta.' where '.$condicion;
		}
		$consulta.=" order by idviaje ";
		//echo $consulta;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){				
			    $arregloViajes= array();
				while($row2=$base->Registro()){
				    $idviaje=$row2['idviaje'];
					$vdestino=$row2['vdestino'];
					$vcantmaxpasajeros=$row2['vcantmaxpasajeros'];
					$objEmpresa = new Empresa();
                    $objEmpresa->Buscar($row2["idempresa"]);
                    $objResponsable = new Responsable();
                    $objResponsable->Buscar($row2["rnumeroempleado"]);
                    $vimporte=$row2['vimporte'];
					$viaje=new Viaje();
					$viaje->cargar($idviaje, $vdestino, $vcantmaxpasajeros, $objEmpresa, $objResponsable, $vimporte);
					array_push($arregloViajes,$viaje);
				}
	        }	
            else {
		        $this->setMensajeoperacion($base->getError());
			}
	    }	
        else {
		    $this->setMensajeoperacion($base->getError());
		}	
		return $arregloViajes;
	}

    public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$consultaInsertar="INSERT INTO viaje(vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) 
				VALUES ('". $this->getVdestino()."',".$this->getVcantmaxpasajeros().",". $this->getObjEmpresa()->getIdempresa().",".$this->getObjResponsable()->getRnumeroempleado().",".$this->getVimporte().")";
		//echo $consultaInsertar;
		if($base->Iniciar()){

			if($id = $base->devuelveIDInsercion($consultaInsertar)){
                $this->setIdviaje($id);
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
		$consultaModifica="UPDATE viaje SET vdestino='".$this->getVdestino()."',vcantmaxpasajeros=".$this->getVcantmaxpasajeros().",idempresa=".$this->getObjEmpresa()->getIdempresa().",rnumeroempleado=".$this->getObjResponsable()->getRnumeroempleado().",vimporte=".$this->getVimporte()." WHERE idviaje=". $this->getIdviaje();
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
				$consultaBorra="DELETE FROM viaje WHERE idviaje=".$this->getIdviaje();
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
     * Crea un string de la coleccion de pasajeros del viaje
     * @return string
     */
    public function stringColPasa() {
        $arregloPasa = [];
        $arregloPasa = $this -> getColPasajeros();
        $nC = count($arregloPasa);
        $stringPasajeros = "";
        if ($nC > 0) {
            for ($i = 0; $i < $nC; $i++) {
                $pasajeroFor = $arregloPasa [$i];
                $stringPasajeros = $stringPasajeros . $i + 1 . "." . $pasajeroFor . "\n";
            }
        }
        else {
            $stringPasajeros = "No hay pasajeros cargados.";
        }
        return $stringPasajeros;
    }

    /**
     * Muestra los atributos de la clase
     * @return string
     */
    public function __toString() {
        return "\nId del viaje: " . $this -> getIdviaje() . "\nDestino del viaje: " . $this -> getVdestino() . "\nCantidad maxima de pasajeros del viaje: " . $this -> getVcantmaxpasajeros() . "\nEmpresa del viaje: " . $this -> getObjEmpresa() . "\nResponsable del viaje: " . $this -> getObjResponsable() . "\nImporte del viaje: " . $this -> getVimporte() . "\nColeccion de pasajeros: \n" . $this -> stringColPasa();
    }
}