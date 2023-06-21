<?php
class Pasajero {
    //Atributos
    private $pdocumento; 
    private $pnombre;
    private $papellido;
    private $ptelefono;
    private $idviaje;
    private $mensajeoperacion;

    /**
     * Crea un objeto de la clase
     */
    public function __construct() {
        $this -> pdocumento = "";
        $this -> pnombre = "";
        $this -> papellido = "";
        $this -> ptelefono = "";
        $this -> idviaje = "";
    }

    /**
     * Carga los datos del pasajero
     * @param $pdoc
     * @param $pnom
     * @param $pape
     * @param $ptele
     * @param $idv
     */
    public function cargar($pdoc, $pnom, $pape, $ptele, $idv) {
        $this -> setPdocumento($pdoc);
        $this -> setPnombre($pnom);
        $this -> setPapellido($pape);
        $this -> setPtelefono($ptele);
        $this -> setIdviaje($idv);
    }

    /**
     * Muestra el documento del pasajero
     * @return int  
     */    
    public function getPdocumento() {
        return $this -> pdocumento;
    }

    /**
     * Muestra el nombre del pasajero
     * @return string
     */    
    public function getPnombre() {
        return $this -> pnombre;
    }

    /**
     * Muestra el apellido del pasajero
     * @return string  
     */    
    public function getPapellido() {
        return $this -> papellido;
    }

    /**
     * Muestra el telefono del pasajero
     * @return int  
     */    
    public function getPtelefono() {
        return $this -> ptelefono;
    }

    /**
     * Muestra el ide del viaje
     * @return int  
     */    
    public function getIdviaje() {
        return $this -> idviaje;
    }

    public function getMensajeoperacion(){
		return $this->mensajeoperacion ;
	}

    /**
     * Modifica el documento del pasajero
     * @param int $nuevoPdoc
     */
    public function setPdocumento($nuevoPdoc) {
        $this -> pdocumento = $nuevoPdoc;
    }

    /**
     * Modifica el nombre del pasajero
     * @param string $nuevoPnom
     */
    public function setPnombre($nuevoPnom) {
        $this -> pnombre = $nuevoPnom;
    }

    /**
     * Modifica el apellido del pasajero
     * @param string $nuevoPape
     */
    public function setPapellido($nuevoPape) {
        $this -> papellido = $nuevoPape;
    }

    /**
     * Modifica el telefono del pasajero
     * @param int $nuevoPtel
     */
    public function setPtelefono($nuevoPtel) {
        $this -> ptelefono = $nuevoPtel;
    }

    /**
     * Modifica el id del viaje
     * @param int $nuevoId
     */
    public function setIdviaje($nuevoId) {
        $this -> idviaje = $nuevoId;
    }

    public function setMensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    /**
	 * Recupera los datos de un pasajero a traves de el documento
	 * @param int $pDocumentoIngresado
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function Buscar($pDocumentoIngresado){
		$base=new BaseDatos();
		$consultaPDocumentoIngresado="Select * from pasajero where pdocumento=".$pDocumentoIngresado;
        //echo "\nEsta es la consulta de buscar: " . $consultaPDocumentoIngresado;
		$resp= false;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaPDocumentoIngresado)){
				if($arregloPasajeros=$base->Registro()){					
				    $this->setPdocumento($pDocumentoIngresado);
					$this->setPnombre($arregloPasajeros['pnombre']);
					$this->setPapellido($arregloPasajeros['papellido']);
                    $this->setPtelefono($arregloPasajeros['ptelefono']);
                    $this->setIdviaje($arregloPasajeros['idviaje']);
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
	    $arregloPasajeros = null;
		$base=new BaseDatos();
		$consulta="Select * from pasajero ";
		if ($condicion!=""){
		    $consulta=$consulta.' where '.$condicion;
		}
		$consulta.=" order by pdocumento ";
		//echo $consulta;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){				
			    $arregloPasajeros= array();
				while($row2=$base->Registro()){
				    $pdocumento=$row2['pdocumento'];
					$pnombre=$row2['pnombre'];
					$papellido=$row2['pnombre'];
					$ptelefono=$row2['ptelefono'];
                    $idviaje=$row2['idviaje'];
				
					$pasajero=new Pasajero();
					$pasajero->cargar($pdocumento, $pnombre, $papellido, $ptelefono, $idviaje);
					array_push($arregloPasajeros,$pasajero);
				}
	        }	
            else {
		        $this->setMensajeoperacion($base->getError());
			}
	    }	
        else {
		    $this->setMensajeoperacion($base->getError());
		}	
		return $arregloPasajeros;
	}

    public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$consultaInsertar="INSERT INTO pasajero(pdocumento, pnombre, papellido, ptelefono, idviaje) 
				VALUES (".$this->getPdocumento().",'". $this->getPnombre()."','".$this->getPapellido()."',". $this->getPtelefono().",".$this->getIdviaje().")";
		//echo $consultaInsertar;
		if($base->Iniciar()){

			if($base->Ejecutar($consultaInsertar)){

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
		$consultaModifica="UPDATE pasajero SET pnombre='".$this->getPnombre()."',papellido='".$this->getPapellido()."',ptelefono=".$this->getPtelefono().",idviaje=".$this->getIdviaje()." WHERE pdocumento=". $this->getPdocumento();
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
				$consultaBorra="DELETE FROM pasajero WHERE pdocumento=".$this->getPdocumento();
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
        return "\nDocumento del pasajero: " . $this -> getPdocumento() . "\nNombre del pasajero: " . $this -> getPnombre() . "\nApellido de pasajero: " . $this -> getPapellido() . "\nTelefono del pasajero: " . $this -> getPtelefono() . "\nId del viaje del pasajero: " . $this -> getIdviaje();
    }
}