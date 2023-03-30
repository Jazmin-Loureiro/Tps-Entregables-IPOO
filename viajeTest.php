<?php
include 'viaje.php.php';

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


function seleccionarOpcion () {
    /* int $opcionM */
    echo "**************** Menú: ****************\n 
    ¿Qué desea hacer?\n
    1.Crear viaje.\n 
    2.Cambiar codigo del viaje.\n 
    3.Cambiar destino del viaje.\n
    4.Cambiar cantidad maxima de pasajeros.\n
    5.Ingresar un nuevo pasajero.\n
    6.Cambiar datos de los pasajeros.\n
    7.Terminar.\n
     Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 7);
    return $opcionM;
}


function seleccionarOpcionPasajero () {
    /* int $opcionP */
    echo "**************** Opciones Pasajero: ****************\n 
    ¿Qué desea hacer?\n
    1.Cambiar toda su informacion.\n 
    2.Cambiar su nombre.\n 
    3.Cambiar su apellido.\n
    4.Cambiar su DNI.\n
    5.Terminar.\n
    Seleccione una opcion: \n";
    $opcionP = solicitarNumeroEntre (1, 6);
    return $opcionP;
}

//Variable que habilita usar las opciones 2, 3, 4, 5 una vez creado el viaje.
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
                $pasajerosV[$i] ["nombre"] = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero " . $i + 1 . ": \n";
                $pasajerosV[$i] ["apellido"] = trim(fgets(STDIN));
                echo "Ingrese el DNI del pasajero " . $i + 1 . ": \n";
                $pasajerosV[$i] ["dni"] = trim(fgets(STDIN));
                echo "Desea ingresar otro pasajero?: ";
                $rto = trim(fgets(STDIN));
                $i = $i + 1;
            } while ($rto <> "no" && $i < $capMaxV);
            if ($i >= $capMaxV) {
                echo "No es posible agregar mas pasajeros al viaje ya que se llego al limite de pasajeros permitido.\n";
            }
            $viaje = new Viaje($codigoV, $destinoV, $capMaxV, $pasajerosV);
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
                if ($cantPasajeros < $capMaxActual) {
                    $nuevoPasajero = [];
                    echo "Ingrese el nombre del pasajero " . $cantPasajeros + 1 . ": \n";
                    $nuevoPasajero ["nombre"] = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero " . $cantPasajeros + 1 . ": \n";
                    $nuevoPasajero ["apellido"] = trim(fgets(STDIN));
                    echo "Ingrese el DNI del pasajero " . $cantPasajeros + 1 . ": \n";
                    $nuevoPasajero ["dni"] = trim(fgets(STDIN));
                    array_push($pasajerosV, $nuevoPasajero);
                    print_r($pasajerosV);
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
                    if ($opcionP <> 5) {
                        echo "Ingrese el numero del pasajero que desea modificar: \n";
                        $numPasajero = solicitarNumeroEntre(1, count($pasajerosV));
                    }
                    switch ($opcionP) {
                        case 1:
                           echo "Ingrese el nuevo nombre: ";
                           $pasajerosV[$numPasajero - 1] ["nombre"] = trim(fgets(STDIN));
                           echo "Ingrese el nuevo apellido: ";
                           $pasajerosV[$numPasajero - 1] ["apellido"] = trim(fgets(STDIN));
                           echo "Ingrese el nuevo DNI: ";
                           $pasajerosV[$numPasajero - 1] ["dni"] = trim(fgets(STDIN));
                           $viaje -> setPasajeros($pasajerosV);
                            break;
                        case 2:
                            echo "Ingrese el nuevo nombre: ";
                            $pasajerosV[$numPasajero - 1] ["nombre"] = trim(fgets(STDIN));
                            $viaje -> setPasajeros($pasajerosV);
                            break;
                        case 3:
                            echo "Ingrese el nuevo apellido: ";
                            $pasajerosV[$numPasajero - 1] ["apellido"] = trim(fgets(STDIN));
                            $viaje -> setPasajeros($pasajerosV);
                            break;
                        case 4:
                            echo "Ingrese el nuevo DNI: ";
                            $pasajerosV[$numPasajero - 1] ["dni"] = trim(fgets(STDIN));
                            $viaje -> setPasajeros($pasajerosV);
                            break;
                        case 5:
                           echo "Cambios finalizados";
                            break;
                    }
                } while ($opcionP <> 5);
            }
            break;
        case 7:
            echo "Edicion finalizada";
            echo $viaje -> __toString();
            break;
    }
} while ($opcionM <> 7);