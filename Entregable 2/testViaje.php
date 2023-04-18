<?php
include_once ("viaje.php");
include_once ("pasajero.php");
include_once ("responsableV.php");

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
    8.Mostrar la informacion del viaje.\n
    9.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 9);
    return $opcionM;
}


/**
 * Muestra el menu de opciones para modificar a un pasajero y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionPasajero () {
    /* int $opcionP */
    echo "\n**************** Opciones Pasajero: ****************\n 
    ¿Qué desea hacer?\n
    1.Cambiar toda su informacion.\n 
    2.Cambiar su nombre.\n 
    3.Cambiar su apellido.\n
    4.Cambiar su DNI.\n
    5.Cambiar telefono.\n
    6.Terminar.\n
    Seleccione una opcion: \n";
    $opcionP = solicitarNumeroEntre (1, 6);
    return $opcionP;
}


//Variable que habilita usar las opciones 2, 3, 4, 5, 6 , 7 y 8 una vez creado el viaje.
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
            $pasajerosV = []; 
            $i = 0;
            do {
                echo "Ingrese el nombre del pasajero " . $i + 1 . ": \n";
                $nombreP = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero " . $i + 1 . ": \n";
                $apellidoP = trim(fgets(STDIN));
                echo "Ingrese el DNI del pasajero " . $i + 1 . ": \n";
                $dniP = trim(fgets(STDIN));
                echo "Ingrese el telefono del pasajero " . $i + 1 . ": \n";
                $telefonoP = trim(fgets(STDIN));
                $pasajerosV [$i] = new Pasajero($nombreP, $apellidoP, $dniP, $telefonoP);
                echo "Desea ingresar otro pasajero?: ";
                $rto = trim(fgets(STDIN));
                $i = $i + 1;
            } while ($rto <> "no" && $i < $capMaxV);
            if ($i >= $capMaxV) {
                echo "No es posible agregar mas pasajeros al viaje ya que se llego al limite de pasajeros permitido.\n";
            }
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
            $viaje = new Viaje($codigoV, $destinoV, $capMaxV, $pasajerosV, $responsable);
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
                $cantPasajeros = count($pasajerosV);
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
                if ($cantPasajeros < $capMaxActual) {
                    echo "Ingrese el nombre del pasajero " . $cantPasajeros + 1 . ": \n";
                    $nombreN = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero " . $cantPasajeros + 1 . ": \n";
                    $apellidoN = trim(fgets(STDIN));
                    echo "Ingrese el DNI del pasajero " . $cantPasajeros + 1 . ": \n";
                    $dniN = trim(fgets(STDIN));
                    echo "Ingrese el telefono del pasajero " . $cantPasajeros + 1 . ": \n";
                    $telefonoN = trim(fgets(STDIN));
                    $nuevoPasajero = new Pasajero($nombreN, $apellidoN, $dniN, $telefonoN);
                    array_push($pasajerosV, $nuevoPasajero);
                    $viaje -> setColeccionPasajeros($pasajerosV);
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
                do {
                    $opcionP = seleccionarOpcionPasajero();
                    if ($opcionP <> 6) {
                        echo "Ingrese el numero del pasajero que desea modificar: \n";
                        $numPasajero = (solicitarNumeroEntre(1, count($pasajerosV))) - 1;
                        $pasajeroAModi = $pasajerosV [$numPasajero];
                    }
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
                            echo "Cambios finalizados";
                            break;
                    }
                } while ($opcionP <> 6);
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
                echo "No existe un viaje. Primero cree uno para asi poder mostrar sus datos.\n";
            }
            else {
                echo $viaje -> __toString();
                }
            break;
        case 9:
            echo "Edicion finalizada";
            break;
    }
} while ($opcionM <> 9);