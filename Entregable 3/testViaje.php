<?php
include_once ("viaje.php");
include_once ("pasajero.php");
include_once ("responsableV.php");
include_once ("pasajeroEstandar.php");
include_once ("pasajeroVip.php");
include_once ("pasajeroEspecial.php");

/**
 *  Corrobora que un número se encuentre entre un mínimo y un máximo.
 * @param int $minSNE
 * @param int $maxSNE
 * @return string
 */
function solicitarNumeroEntre($minSNE, $maxSNE) {
        $numSNE = (trim(fgets(STDIN)));
        while ((((int)($numSNE) != $numSNE)) || (!($numSNE >= $minSNE && $numSNE <= $maxSNE))) {
        echo "Debe ingresar un número entre " . $minSNE . " y " . $maxSNE . ": ";
        $numSNE = trim(fgets(STDIN));
        }
        return $numSNE;
    }


/**
 * Muestra el menu del viaje y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcion () {
    /* int $opcionM */
    echo "\n**************** Menú: ****************\n 
    ¿Qué desea hacer?\n
    1.Crear viaje.\n 
    2.Cambiar codigo del viaje.\n 
    3.Cambiar destino del viaje.\n
    4.Cambiar cantidad maxima de pasajeros.\n
    5.Ingresar un nuevo pasajero.\n
    6.Cambiar datos de los pasajeros.\n
    7.Cambiar datos del responsable.\n
    8.Cambiar costo del viaje. \n
    9.Mostrar la informacion del viaje.\n
    10.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 10);
    return $opcionM;
}


/**
 * Muestra el menu de opciones para modificar a un pasajero estandar y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionPasajeroEstandar() {
    /* int $opcionP */
    echo "\n**************** Opciones Pasajero: ****************\n 
    ¿Qué desea hacer?\n
    1.Cambiar toda su informacion.\n 
    2.Cambiar su nombre.\n 
    3.Cambiar su apellido.\n
    4.Cambiar su DNI.\n
    5.Cambiar su telefono.\n
    6.Cambiar su numero del asiento.\n
    7.Cambiar su numero del ticket.\n
    8.Terminar.\n
    Seleccione una opcion: \n";
    $opcionP = solicitarNumeroEntre (1, 8);
    return $opcionP;
}

/**
 * Muestra el menu de opciones para modificar a un pasajero vip y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionPasajeroVip () {
    /* int $opcionP */
    echo "\n**************** Opciones Pasajero: ****************\n 
    ¿Qué desea hacer?\n
    1.Cambiar toda su informacion.\n 
    2.Cambiar su nombre.\n 
    3.Cambiar su apellido.\n
    4.Cambiar su DNI.\n
    5.Cambiar su telefono.\n
    6.Cambiar su numero del asiento.\n
    7.Cambiar su numero del ticket.\n
    8.Cambiar numero de viajero.\n
    9.Cambiar numero de millas.\n
    10.Terminar.\n
    Seleccione una opcion: \n";
    $opcionP = solicitarNumeroEntre (1, 10);
    return $opcionP;
}

/**
 * Muestra el menu de opciones para modificar a un pasajero especial y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionPasajeroEspecial () {
    /* int $opcionP */
    echo "\n**************** Opciones Pasajero: ****************\n 
    ¿Qué desea hacer?\n
    1.Cambiar toda su informacion.\n 
    2.Cambiar su nombre.\n 
    3.Cambiar su apellido.\n
    4.Cambiar su DNI.\n
    5.Cambiar su telefono.\n
    6.Cambiar su numero del asiento.\n
    7.Cambiar su numero del ticket.\n
    8.Cambiar si necesita servicios especiales.\n
    9.Cambiar si necesita asistencia especial.\n
    10.Cambiar si necesita alimentos especiales.\n
    11.Terminar.\n
    Seleccione una opcion: \n";
    $opcionP = solicitarNumeroEntre (1, 11);
    return $opcionP;
}





//Variable que habilita usar las opciones 2, 3, 4, 5, 6 , 7, 8 y 9 una vez creado el viaje.
$creacionV = 0;


//Menu de opciones
do {
    $opcionM = seleccionarOpcion();
    switch ($opcionM) {
        case 1:
            echo "Ingrese el codigo del viaje: \n";
            $codigoV = trim(fgets(STDIN));
            echo "Ingrese el destino: \n";
            $destinoV = trim(fgets(STDIN));
            echo "Ingrese la capacidad maxima de pasajeros: \n";
            $capMaxV = trim(fgets(STDIN));
            echo "Ingrese el valor del viaje: \n";
            $costoV = trim(fgets(STDIN));
            echo "Ingrese los datos del responsable del viaje\n";
            echo "Ingrese el numero de empleado: \n";
            $numeroEmp = trim(fgets(STDIN));
            echo "Ingrese el numero de licencia: \n";
            $numeroLic = trim(fgets(STDIN));
            echo "Ingrese el nombre del responsable: \n";
            $nombreR = trim(fgets(STDIN));
            echo "Ingrese el apellido del responsable: \n";
            $apellidoR = trim(fgets(STDIN));
            $responsable = new ResponsableV($numeroEmp, $numeroLic, $nombreR, $apellidoR);
            
            $viaje = new Viaje($codigoV, $destinoV, $capMaxV, $responsable, $costoV);
            echo "Desea ingresar pasajeros al viaje?: ";
            $respuestaP = trim(fgets(STDIN));
            if ($respuestaP == "si") {
                $i = 0;
                do {
                $pasajerosV = $viaje -> getColeccionPasajeros(); 
                echo "Ingrese el DNI del pasajero " . $i + 1 . ": \n";
                $dniNuevoP = trim(fgets(STDIN));
                $n = count($pasajerosV);
                $i = 0;
                $dniP = 0;
                while ($i < $n) {
                    $pasajero = $pasajerosV [$i];
                    $dniP = $pasajero -> getDni();
                    if ($dniNuevoP == $dniP) {
                        echo "Ya existe un pasajero cargado con ese DNI.\n";
                        echo "Ingrese un nuevo DNI: ";
                        $dniNuevoP = trim(fgets(STDIN));
                        $i = -1;
                    } 
                    $i = $i + 1;
                } 
                echo "Perfecto, no existe un pasajero con ese DNI cargado, puede proceder a cargarlo a continuacion si hay espacio disponible.\n";
                echo "Que tipo de pasajero desea cargar? (estandar, vip o especial):\n";
                $tipoPasajero = trim(fgets(STDIN));
                if ($tipoPasajero == "estandar") {
                    echo "Ingrese el nombre del pasajero " . $i + 1 . ": \n";
                    $nombreP = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero " . $i + 1 . ": \n";
                    $apellidoP = trim(fgets(STDIN));
                    echo "Ingrese el telefono del pasajero " . $i + 1 . ": \n";
                    $telefonoP = trim(fgets(STDIN));
                    echo "Ingrese el numero de asiento del pasajero " . $i + 1 . ": \n";
                    $numAsiP = trim(fgets(STDIN));
                    echo "Ingrese el numero del ticket del pasajero " . $i + 1 . ": \n";
                    $numTicketP = trim(fgets(STDIN));
                    $pasajeroEstandar = new PasajeroEstandar($nombreP, $apellidoP, $dniNuevoP, $telefonoP, $numAsiP, $numTicketP);
                    $pasajeroV [$i] = $pasajeroEstandar;
                    $venta = $viaje -> venderPasaje($pasajeroEstandar);
                    echo "Costo del viaje: $" . $venta . "\n";
                }
                elseif ($tipoPasajero == "vip") {
                    echo "Ingrese el nombre del pasajero " . $i + 1 . ": \n";
                    $nombreP = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero " . $i + 1 . ": \n";
                    $apellidoP = trim(fgets(STDIN));
                    echo "Ingrese el telefono del pasajero " . $i + 1 . ": \n";
                    $telefonoP = trim(fgets(STDIN));
                    echo "Ingrese el numero de asiento del pasajero " . $i + 1 . ": \n";
                    $numAsiP = trim(fgets(STDIN));
                    echo "Ingrese el numero del ticket del pasajero " . $i + 1 . ": \n";
                    $numTicketP = trim(fgets(STDIN));
                    echo "Ingrese el numero de viajero del pasajero " . $i + 1 . ": \n";
                    $numVia = trim(fgets(STDIN));
                    echo "Ingrese la cantidad de millas que posee el pasajero " . $i + 1 . ": \n";
                    $millasP = trim(fgets(STDIN));
                    $pasajeroVip = new PasajeroVip($nombreP, $apellidoP, $dniNuevoP, $telefonoP, $numAsiP, $numTicketP, $numVia, $millasP);
                    $pasajeroV [$i] = $pasajeroVip;
                    $venta = $viaje -> venderPasaje($pasajeroVip);
                    echo "Costo del viaje: $" . $venta . "\n";
                }
                elseif ($tipoPasajero == "especial") {
                    echo "Ingrese el nombre del pasajero " . $i + 1 . ": \n";
                    $nombreP = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero " . $i + 1 . ": \n";
                    $apellidoP = trim(fgets(STDIN));
                    echo "Ingrese el telefono del pasajero " . $i + 1 . ": \n";
                    $telefonoP = trim(fgets(STDIN));
                    echo "Ingrese el numero de asiento del pasajero: " . $i + 1 . ": \n";
                    $numAsiP = trim(fgets(STDIN));
                    echo "Ingrese el numero del ticket del pasajero: " . $i + 1 . ": \n";
                    $numTicketP = trim(fgets(STDIN));
                    echo "Ingrese si el pasajero necesita servicios especiales: ";
                    $servicios = trim(fgets(STDIN));
                    if ($servicios == "si") {
                        $servicios = true;
                    }
                    else {
                        $servicios = false;
                    }
                    echo "Ingrese si el pasajero necesita asistencia especial: ";
                    $asistenciaP = trim(fgets(STDIN));
                    if ($asistenciaP == "si") {
                        $asistenciaP = true;
                    }
                    else {
                        $asistenciaP = false;
                    }
                    echo "Ingrese si el pasajero necesita alimentos especiales: ";
                    $alimentosP = trim(fgets(STDIN));
                    if ($alimentosP == "si") {
                        $alimentosP = true;
                    }
                    else {
                        $alimentosP = false;
                    }
                    $pasajeroEspecial = new PasajeroEspecial($nombreP, $apellidoP, $dniNuevoP, $telefonoP, $numAsiP, $numTicketP, $servicios, $asistenciaP, $alimentosP);
                    $pasajeroV [$i] = $pasajeroEspecial;
                    $venta = $viaje -> venderPasaje($pasajeroEspecial);
                    echo "Costo del viaje: " . $venta . "\n";
                }
                echo "\nDesea ingresar otro pasajero?: ";
                $rto = trim(fgets(STDIN));
                $i = $i + 1;
                } while ($rto <> "no" && $i < $capMaxV); 
                if ($i >= $capMaxV) {
                echo "No es posible agregar mas pasajeros al viaje ya que se llego al limite de pasajeros permitido.\n";
                } 
            }
            $creacionV = 1;
            break;
        case 2:
            if ($creacionV == 0) {
                echo "No existe un viaje. Primero cree uno para asi poder cambiar su codigo.\n";
            }
            else {
                echo "Ingrese el nuevo codigo: ";
                $codigoN = trim(fgets(STDIN));
                $viaje -> setCodigo($codigoN);
                echo "Cambio de codigo exitoso.\n";
                }
            break;
        case 3:
            if ($creacionV == 0) {
                echo "No existe un viaje. Primero cree uno para asi poder cambiar su destino.\n";
            }
            else {
                echo "Ingrese el nuevo destino: ";
                $destinoN = trim(fgets(STDIN));
                $viaje -> setDestino($destinoN);
                echo "Cambio de destino exitoso.\n";
            }
            break;
        case 4:
            if ($creacionV == 0) {
                echo "No existe un viaje. Primero cree uno para asi poder cambiar la cantidad maxima de pasajeros.\n";
            }
            else {
                echo "Ingrese la nueva capacidad maxima de pasajeros: ";
                $capMaxNueva =trim(fgets(STDIN));
                $viaje -> setCapMaxPas($capMaxNueva);
                echo "Cambio de cantidad maxima de pasajeros exitoso.\n";
            }
            break;
        case 5:
            if ($creacionV == 0) {
                echo "No existe un viaje. Primero cree uno para asi poder agregar un pasajero.\n";
            }
            else{ 
                $capMaxActual = $viaje -> getCapMaxPas();
                $pasajerosV = $viaje -> getColeccionPasajeros();
                $cantPasajeros = count($pasajerosV);
                    if ($cantPasajeros < $capMaxActual) {
                        echo "\nIngrese el DNI del pasajero que desea agregar: ";
                        $dniNuevoP = trim(fgets(STDIN));
                        $n = count($pasajerosV);
                        $i = 0;
                        $dniP = 0;
                        while ($i < $n) {
                            $pasajero = $pasajerosV [$i];
                            $dniP = $pasajero -> getDni();
                            if ($dniNuevoP == $dniP) {
                                echo "Ya existe un pasajero cargado con ese DNI.\n";
                                echo "Ingrese un nuevo DNI: ";
                                $dniNuevoP = trim(fgets(STDIN));
                                $i = -1;
                            } 
                            $i = $i + 1;
                        } 
                        echo"Perfecto, no existe un pasajero con ese DNI cargado, puede proceder a cargarlo a continuacion si hay espacio disponible a continuacion.\n";
                        echo "Que tipo de pasajero desea cargar? (estandar, vip o especial):\n";
                        $tipoPasajero = trim(fgets(STDIN));
                        if ($tipoPasajero == "estandar") {
                            echo "Ingrese el nombre del pasajero " . $i + 1 . ": \n";
                            $nombreP = trim(fgets(STDIN));
                            echo "Ingrese el apellido del pasajero " . $i + 1 . ": \n";
                            $apellidoP = trim(fgets(STDIN));
                            echo "Ingrese el telefono del pasajero " . $i + 1 . ": \n";
                            $telefonoP = trim(fgets(STDIN));
                            echo "Ingrese el numero de asiento del pasajero " . $i + 1 . ": \n";
                            $numAsiP = trim(fgets(STDIN));
                            echo "Ingrese el numero del ticket del pasajero " . $i + 1 . ": \n";
                            $numTicketP = trim(fgets(STDIN));
                            $pasajeroEstandar = new PasajeroEstandar($nombreP, $apellidoP, $dniNuevoP, $telefonoP, $numAsiP, $numTicketP);
                            $pasajeroV [$i] = $pasajeroEstandar;
                            $venta = $viaje -> venderPasaje($pasajeroEstandar);
                            echo "Costo del viaje: $" . $venta . "\n";
                        }
                        elseif ($tipoPasajero == "vip") {
                            echo "Ingrese el nombre del pasajero " . $i + 1 . ": \n";
                            $nombreP = trim(fgets(STDIN));
                            echo "Ingrese el apellido del pasajero " . $i + 1 . ": \n";
                            $apellidoP = trim(fgets(STDIN));
                            echo "Ingrese el telefono del pasajero " . $i + 1 . ": \n";
                            $telefonoP = trim(fgets(STDIN));
                            echo "Ingrese el numero de asiento del pasajero " . $i + 1 . ": \n";
                            $numAsiP = trim(fgets(STDIN));
                            echo "Ingrese el numero del ticket del pasajero " . $i + 1 . ": \n";
                            $numTicketP = trim(fgets(STDIN));
                            echo "Ingrese el numero de viajero del pasajero " . $i + 1 . ": \n";
                            $numVia = trim(fgets(STDIN));
                            echo "Ingrese la cantidad de millas que posee el pasajero " . $i + 1 . ": \n";
                            $millasP = trim(fgets(STDIN));
                            $pasajeroVip = new PasajeroVip($nombreP, $apellidoP, $dniNuevoP, $telefonoP, $numAsiP, $numTicketP, $numVia, $millasP);
                            $pasajeroV [$i] = $pasajeroVip;
                            $venta = $viaje -> venderPasaje($pasajeroVip);
                            echo "Costo del viaje: $" . $venta . "\n";
                        }
                        elseif ($tipoPasajero == "especial") {
                            echo "Ingrese el nombre del pasajero " . $i + 1 . ": \n";
                            $nombreP = trim(fgets(STDIN));
                            echo "Ingrese el apellido del pasajero " . $i + 1 . ": \n";
                            $apellidoP = trim(fgets(STDIN));
                            echo "Ingrese el telefono del pasajero " . $i + 1 . ": \n";
                            $telefonoP = trim(fgets(STDIN));
                            echo "Ingrese el numero de asiento del pasajero: " . $i + 1 . ": \n";
                            $numAsiP = trim(fgets(STDIN));
                            echo "Ingrese el numero del ticket del pasajero: " . $i + 1 . ": \n";
                            $numTicketP = trim(fgets(STDIN));
                            echo "Ingrese si el pasajero necesita servicios especiales: ";
                            $servicios = trim(fgets(STDIN));
                            if ($servicios == "si") {
                                $servicios = true;
                            }
                            else {
                                $servicios = false;
                            }
                            echo "Ingrese si el pasajero necesita asistencia especial: ";
                            $asistenciaP = trim(fgets(STDIN));
                            if ($asistenciaP == "si") {
                                $asistenciaP = true;
                            }
                            else {
                                $asistenciaP = false;
                            }
                            echo "Ingrese si el pasajero necesita alimentos especiales: ";
                            $alimentosP = trim(fgets(STDIN));
                            if ($alimentosP == "si") {
                                $alimentosP = true;
                            }
                            else {
                                $alimentosP = false;
                            }
                            $pasajeroEspecial = new PasajeroEspecial($nombreP, $apellidoP, $dniNuevoP, $telefonoP, $numAsiP, $numTicketP, $servicios, $asistenciaP, $alimentosP);
                            $pasajeroV [$i] = $pasajeroEspecial;
                            $venta = $viaje -> venderPasaje($pasajeroEspecial);
                            echo "Costo del viaje: " . $venta . "\n";
                        }
                        
                    }
                    else {
                        echo "No es posible agregar mas pasajeros al viaje ya que se llego al limite de pasajeros permitido.\n";
                    }
                }
            break;    
        case 6:
            if ($creacionV == 0) {
                echo "No existe un viaje. Cree un viaje para asi poder modificar sus datos.\n";
            }
            else {
                    $pasajeroAModi = null;
                    $pasajerosV = $viaje -> getColeccionPasajeros();
                    echo "Ingrese el DNI del pasajero que desea modificar: \n";
                    $dniPasajero = trim(fgets(STDIN));
                    $n = count($pasajerosV);
                    $i = 0;
                    $encontrado = false;
                    while ($i < $n && $encontrado == false) {
                        $pasajero = $pasajerosV [$i];
                        $dniP = $pasajero -> getDni();
                        if ($dniPasajero == $dniP) {
                        $encontrado = true;
                        } 
                        $i = $i + 1;
                    } 
                    if ($encontrado == true) {
                        $pasajeroAModi = $pasajerosV [$i - 1];
                    }
                    else {
                        echo "No existe un pasajero con ese DNI.";
                        }        
                    
                    if ($pasajeroAModi instanceof PasajeroEstandar) {
                        do { 
                            $opcionP = seleccionarOpcionPasajeroEstandar();
                            switch ($opcionP) {
                                case 1:
                                    echo "Ingrese el nuevo nombre: ";
                                    $nombreM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNombre($nombreM);
                                    echo "Ingrese el nuevo apellido: ";
                                    $apellidoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setApellido($apellidoM);
                                    echo "Ingrese el nuevo DNI: ";
                                    $dniM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setDni($dniM);
                                    echo "Ingrese el nuevo telefono: ";
                                    $telefonoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setTelefono($telefonoM);
                                    echo "Ingrese el nuevo numero del asiento: ";
                                    $asiM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumAsiento($asiM);
                                    echo "Ingrese el nuevo numero del ticket: ";
                                    $ticketM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumTicket($ticketM);
                                    break;
                                case 2:
                                    echo "Ingrese el nuevo nombre: ";
                                    $nombreM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNombre($nombreM);
                                    break;
                                case 3:
                                    echo "Ingrese el nuevo apellido: ";
                                    $apellidoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setApellido($apellidM);
                                    break;
                                case 4:
                                    echo "Ingrese el nuevo DNI: ";
                                    $dniM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setDni($deniM);
                                    break;
                                case 5: 
                                    echo "Ingrese el nuevo telefono: ";
                                    $telefonoN = trim(fgets(STDIN));
                                    $pasajeroAModi -> setTelefono($telefonoM);
                                    break;
                                case 6: 
                                    echo "Ingrese el nuevo numero del asiento: ";
                                    $asiM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumAsiento($asiM);
                                break;
                                case 7: 
                                    echo "Ingrese el nuevo numero del ticket: ";
                                    $ticketM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumTicket($ticketM);
                                break;
                                case 8:
                                    echo "Cambios finalizados";
                                    break;
                            }
                        }  while ($opcionP <> 8);
                    }

                    if ($pasajeroAModi instanceof PasajeroVip) {
                        do {
                            $opcionP = seleccionarOpcionPasajeroVip();
                            switch ($opcionP) {
                                case 1:
                                    echo "Ingrese el nuevo nombre: ";
                                    $nombreM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNombre($nombreM);
                                    echo "Ingrese el nuevo apellido: ";
                                    $apellidoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setApellido($apellidoM);
                                    echo "Ingrese el nuevo DNI: ";
                                    $dniM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setDni($dniM);
                                    echo "Ingrese el nuevo telefono: ";
                                    $telefonoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setTelefono($telefonoM);
                                    echo "Ingrese el nuevo numero del asiento: ";
                                    $asiM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumAsiento($asiM);
                                    echo "Ingrese el nuevo numero del ticket: ";
                                    $ticketM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumTicket($ticketM);
                                    echo "Ingrese el nuevo numero de viajero: ";
                                    $numViajeroM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumViajero($numViajeroM);
                                    echo "Ingrese la nueva cantidad de millas: ";
                                    $millasM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setCantMillas($millasM);
                                    break;
                                case 2:
                                    echo "Ingrese el nuevo nombre: ";
                                    $nombreM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNombre($nombreM);
                                    break;
                                case 3:
                                    echo "Ingrese el nuevo apellido: ";
                                    $apellidoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setApellido($apellidoM);
                                    break;
                                case 4:
                                    echo "Ingrese el nuevo DNI: ";
                                    $dniM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setDni($deniM);
                                    break;
                                case 5: 
                                    echo "Ingrese el nuevo telefono: ";
                                    $telefonoN = trim(fgets(STDIN));
                                    $pasajeroAModi -> setTelefono($telefonoM);
                                    break;
                                case 6: 
                                    echo "Ingrese el nuevo numero del asiento: ";
                                    $asiM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumAsiento($asiM);
                                break;
                                case 7: 
                                    echo "Ingrese el nuevo numero del ticket: ";
                                    $ticketM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumTicket($ticketM);
                                break;
                                case 8:
                                    echo "Ingrese el nuevo numero de viajero: ";
                                    $numViajeroM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumViajero($numViajeroM);
                                break;
                                case 9:
                                    echo "Ingrese la nueva caantidad de millas: ";
                                    $millasM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setCantMillas($millasM);
                                break;
                                case 10:
                                    echo "Cambios finalizados";
                                    break;
                            }
                        }  while ($opcionP <> 10);
                    }
                    if ($pasajeroAModi instanceof PasajeroEspecial) {
                        do {
                            $opcionP = seleccionarOpcionPasajeroEspecial();
                            switch ($opcionP) {
                                case 1:
                                    echo "Ingrese el nuevo nombre: ";
                                    $nombreM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNombre($nombreM);
                                    echo "Ingrese el nuevo apellido: ";
                                    $apellidoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setApellido($apellidoM);
                                    echo "Ingrese el nuevo DNI: ";
                                    $dniM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setDni($dniM);
                                    echo "Ingrese el nuevo telefono: ";
                                    $telefonoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setTelefono($telefonoM);
                                    echo "Ingrese el nuevo numero del asiento: ";
                                    $asiM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumAsiento($asiM);
                                    echo "Ingrese el nuevo numero del ticket: ";
                                    $ticketM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumTicket($ticketM);
                                    echo "Ingrese nuevamente si el pasajero necesita servicios especiales: ";
                                    $serviciosM = trim(fgets(STDIN));
                                    if ($serviciosM == "si") {
                                        $serviciosM = true;
                                    }
                                    else {
                                        $serviciosM = false;
                                    }
                                    $pasajeroAModi -> setServiciosEspeciales($serviciosM);
                                    echo "Ingrese nuevamente si el pasajero necesita asistencia especial: ";
                                    $asistenciaM = trim(fgets(STDIN));
                                    if ($asistenciaM == "si") {
                                        $asistenciaM = true;
                                    }
                                    else {
                                        $asistenciaM = false;
                                    }
                                    $pasajeroAModi -> setAsistencia($asistenciaM);
                                    echo "Ingrese nuevamente si el pasajero necesita alimentos especiales: ";
                                    $alimentosM = trim(fgets(STDIN));
                                    if ($alimentosM == "si") {
                                        $alimentosM = true;
                                    }
                                    else {
                                        $alimentosM = false;
                                    }
                                    $pasajeroAModi -> setAlimentos($alimentosM);
                                    break;
                                case 2:
                                    echo "Ingrese el nuevo nombre: ";
                                    $nombreM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNombre($nombreM);
                                    break;
                                case 3:
                                    echo "Ingrese el nuevo apellido: ";
                                    $apellidoM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setApellido($apellidM);
                                    break;
                                case 4:
                                    echo "Ingrese el nuevo DNI: ";
                                    $dniM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setDni($deniM);
                                    break;
                                case 5: 
                                    echo "Ingrese el nuevo telefono: ";
                                    $telefonoN = trim(fgets(STDIN));
                                    $pasajeroAModi -> setTelefono($telefonoM);
                                    break;
                                case 6: 
                                    echo "Ingrese el nuevo numero del asiento: ";
                                    $asiM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumAsiento($asiM);
                                    break;
                                case 7: 
                                    echo "Ingrese el nuevo numero del ticket: ";
                                    $ticketM = trim(fgets(STDIN));
                                    $pasajeroAModi -> setNumTicket($ticketM);
                                    break;
                                case 8:
                                    echo "Ingrese nuevamente si el pasajero necesita servicios especiales: ";
                                    $serviciosM = trim(fgets(STDIN));
                                    if ($serviciosM == "si") {
                                        $serviciosM = true;
                                    }
                                    else {
                                        $serviciosM = false;
                                    }
                                    $pasajeroAModi -> setServiciosEspeciales($serviviosM);
                                    break;
                                case 9:
                                    echo "Ingrese nuevamente si el pasajero necesita asistencia especial: ";
                                    $asistenciaM = trim(fgets(STDIN));
                                    if ($asistenciaM == "si") {
                                        $asistenciaM = true;
                                    }
                                    else {
                                        $asistenciaM = false;
                                    }
                                    $pasajeroAModi -> setAsistencia($asistenciaM);
                                    break;
                                case 10:
                                    echo "Ingrese nuevamente si el pasajero necesita alimentos especiales: ";
                                    $alimentosM = trim(fgets(STDIN));
                                    if ($alimentosM == "si") {
                                        $alimentosM = true;
                                    }
                                    else {
                                        $alimentosM = false;
                                    }
                                    $pasajeroAModi -> setAlimentos($alimentosM);
                                    break;
                                case 11:
                                    echo "Cambios finalizados";
                                    break;
                            }
                        }  while ($opcionP <> 11);
                    }
            }
            break;
        case 7:
            if ($creacionV == 0) {
                echo "No existe un viaje. Primero cree uno para asi poder cambiar los datos del responsable.\n";
            }
            else {
                echo "\nIngrese el nuevo numero de empleado: ";
                $nuevoNumE = trim(fgets(STDIN));
                $responsable -> setNumEmpleado($nuevoNumE);
                echo "\nIngrese el nuevo numero de licencia: ";
                $nuevoNumL = trim(fgets(STDIN));
                $responsable -> setNumLicencia($nuevoNumL);
                echo "\nIngrese el nuevo nombre: ";
                $nuevoNom = trim(fgets(STDIN));
                $responsable -> setNombre($nuevoNom);
                echo "\nIngrese el nuevo apellido: ";
                $nuevoApe = trim(fgets(STDIN));
                $responsable -> setApellido($nuevoApe);
            }    
            break;
        case 8:
            if ($creacionV == 0) {
                echo "No existe un viaje. Primero cree uno para asi poder cambiar el valor del mismo.\n";
            }
            else {
                echo "Ingrese el nuevo valor: ";
                $costoNuevo =trim(fgets(STDIN));
                $viaje -> setCosto($costoNuevo);
                echo "Cambio del valor exitoso.\n";
            }
                break;
        case 9:
            if ($creacionV == 0) {
                echo "No existe un viaje. Primero cree uno para asi poder mostrar sus datos.\n";
            }
            else {
                echo $viaje -> __toString();
                }
            break;
        case 10:
            echo "Edicion finalizada";
            break;
    }
} while ($opcionM <> 10);