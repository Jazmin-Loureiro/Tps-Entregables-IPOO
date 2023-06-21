<?php
include_once ("BaseDatos.php");
include_once ("viaje.php");
include_once ("pasajero.php");
include_once ("empresa.php");
include_once ("responsable.php");

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
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcion () {
    echo "\n**************** Menú Principal: ****************\n 
    Gestionar info de:\n
    1.Empresas.\n 
    2.Responsables.\n 
    3.Viajes.\n
    4.Pasajeros.\n
    5.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 5);
    return $opcionM;
}

/**
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionEmpresas () {
    echo "\n**************** Menú Empresas: ****************\n 
    1.Agregar.\n 
    2.Modificar.\n 
    3.Eliminar.\n
    4.Mostrar.\n
    5.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 5);
    return $opcionM;
}

/**
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionResponsables () {
    echo "\n**************** Menú Responsables: ****************\n 
    1.Agregar.\n 
    2.Modificar.\n 
    3.Eliminar.\n
    4.Mostrar.\n
    5.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 5);
    return $opcionM;
}

/**
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionViajes () {
    echo "\n**************** Menú Viajes: ****************\n 
    1.Agregar.\n 
    2.Modificar.\n 
    3.Eliminar.\n
    4.Mostrar.\n
    5.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 5);
    return $opcionM;
}

/**
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionPasajeros () {
    echo "\n**************** Menú Pasajeros: ****************\n 
    1.Agregar.\n 
    2.Modificar.\n 
    3.Eliminar.\n
    4.Mostrar.\n
    5.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 5);
    return $opcionM;
}

/**
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionModificacionesE () {
    echo "\n**************** Menú Modificaciones Empresa: ****************\n 
    1.Nombre.\n 
    2.Direccion.\n
    3.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 3);
    return $opcionM;
}

/**
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionModificacionesR () {
    echo "\n**************** Menú Modificaciones Responsable: ****************\n 
    1.Numero de licencia.\n 
    2.Nombre.\n 
    3.Apellido.\n
    4.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 4);
    return $opcionM;
}

/**
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionModificacionesV () {
    echo "\n**************** Menú Modificaciones Viaje: ****************\n 
    1.Destino.\n 
    2.Cantidad maxima de pasajeros.\n 
    3.Empresa.\n
    4.Responsable.\n
    5.Importe.\n
    6.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 6);
    return $opcionM;
}

/**
 * Muestra el menu y solicita una opcion valida a realizar.
 * @return int
 */
function seleccionarOpcionModificacionesP() {
    echo "\n**************** Menú Modificaciones Pasajero: ****************\n 
    1.Nombre.\n 
    2.Apellido.\n 
    3.Telefono.\n
    4.Viaje.\n
    5.Terminar.\n
    Seleccione una opcion: \n";
    $opcionM = solicitarNumeroEntre (1, 5);
    return $opcionM;
}

//Verifica si hay una empresa
$objEmpresa = new Empresa();
$arregloObjE = $objEmpresa -> listar();
$countEmpresas = count($arregloObjE);
//Verifica si hay un responsable 
$objResponsable = new Responsable();
$arregloObjR = $objResponsable -> listar();
$countResponsables = count($arregloObjR);
//Verifica si hay un viaje
$objViaje = new Viaje();
$arregloObjV = $objViaje -> listar();
$countViajes = count($arregloObjV);
//Obj pasajero que se usa para saber la coleccion de pasajeros de cada viaje
$objPasajero = new Pasajero();
$arregloObjP = $objPasajero -> listar();
$countPasajeros = count($arregloObjP);


do {
    $opcionM = seleccionarOpcion();
    switch ($opcionM) {
        case 1:
            //Edicion empresas
            do {
                $opcionE = seleccionarOpcionEmpresas();
                switch ($opcionE) {
                    case 1:
                        //Agregar
                        $arregloObjE = $objEmpresa -> listar();
                        $countEmpresas = count($arregloObjE);
                        echo "\nIngrese el nombre de la empresa: \n";
                        $nombreE = trim(fgets(STDIN));
                        echo "\nIngrese la direccion de la empresa: \n";
                        $direccionE = trim(fgets(STDIN));
                        $empresaNueva = new Empresa();
                        $empresaNueva -> cargar(null, $nombreE, $direccionE);
                        $respuesta = $empresaNueva -> insertar();
                        if ($respuesta == true) {
                            echo "La empresa fue agregada correctamente.";
                        }
                        else {
                            echo "No se pudo agregar la empresa.";
                        }    
                        break;
                    case 2:
                        //Modificar
                        //Verifico si hay empresas para modificar.
                        $arregloObjE = $objEmpresa -> listar();
                        $countEmpresas = count($arregloObjE);
                        if ($countEmpresas == 0) {
                            echo "\nNo hay empresas disponibles para modificar.\n";
                        }
                        else {
                            //Muestro las empresas que hay disponibles para modificar
                            $stringEmpresasMostrar = " ";
                            for ($i = 0; $i < $countEmpresas; $i++) {
                                $empresasMostrar = $arregloObjE[$i];
                                $stringEmpresasMostrar = $stringEmpresasMostrar . $i + 1 . "." . $empresasMostrar . "\n";
                            }
                            echo "\nSeleccione la empresa que desea modificar: \n" . $stringEmpresasMostrar;
                            $numeroE = solicitarNumeroEntre(1, $countEmpresas);
                            $empresaParaModificar = $arregloObjE [$numeroE - 1];
                            //Muesstro el menu de opciones a modificar
                            do {
                                $opcionMEmpresa = seleccionarOpcionModificacionesE();
                                switch ($opcionMEmpresa) {
                                    case 1: 
                                        echo "\nIngrese el nuevo nombre de la empresa: \n";
                                        $nuevoNombreE = trim(fgets(STDIN));
                                        $empresaParaModificar -> setEnombre($nuevoNombreE);
                                        $respuesta = $empresaParaModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl nombre ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }   
                                        break;
                                    case 2:
                                        echo "\nIngrese la nueva direccion de la empresa: \n";
                                        $nuevaDireccionE = trim(fgets(STDIN));
                                        $empresaParaModificar -> setEdireccion($nuevaDireccionE);
                                        $respuesta = $empresaParaModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nLa direccion ha sido cambiada correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }   
                                        break;
                                    case 3: 
                                        echo "\nModificaciones terminadas.\n";
                                        break;
                                }
                            } while ($opcionMEmpresa <> 3);
                        }
                        break;
                    case 3:
                        //Eliminar
                        $arregloObjE = $objEmpresa -> listar();
                        $countEmpresas = count($arregloObjE);
                        if ($countEmpresas == 0) {
                            echo "\nNo hay empresas disponibles para eliminar.\n";
                        }
                        else {
                            $stringEmpresasMostrar = "";
                            for ($i = 0; $i < $countEmpresas; $i++) {
                                $empresasMostrar = $arregloObjE[$i];
                                $stringEmpresasMostrar = $stringEmpresasMostrar . $i + 1 . "." . $empresasMostrar . "\n";
                            }
                            echo "\nSeleccione la empresa que desea eliminar: \n" . $stringEmpresasMostrar;
                            $numEmpresaSeleccion = trim(fgets(STDIN));
                            $empresaParaEliminar = $arregloObjE [$numEmpresaSeleccion - 1];
                            $arregloObjV = $objViaje -> listar();
                            $countViajes = count($arregloObjV);
                            $i = 0;
                            $valido = true;
                            while ($i < $countViajes && $valido == true) {
                                $viajeAComparar = $arregloObjV [$i];
                                $empresaViaje = $viajeAComparar -> getObjEmpresa();
                                if ($empresaParaEliminar == $empresaViaje) {
                                    $valido = false;
                                }
                                $i++;
                            }
                            if ($valido == false) {
                                echo "\nNo es posible eliminar la empresa ya que hay viajes cargados en la misma.\n";
                            }
                            else {
                                $respuesta = $empresaParaEliminar -> eliminar();
                                if ($respuesta == true) {
                                    echo "\nLa empresa se ha eliminado correctamente.\n";
                                }
                                else {
                                    echo "\nNo fue posible realizar la eliminacion.";
                                }
                            }
                        }
                        break;
                    case 4:
                        //Mostrar
                        $arregloObjE = $objEmpresa -> listar();
                        $countEmpresas = count($arregloObjE);
                        if ($countEmpresas == 0) {
                            echo "\nNo existen empresas para mostrar.\n";
                        }
                        else {
                            $stringEmpresasMostrar = "";
                            for ($i = 0; $i < $countEmpresas; $i++) {
                                $empresasMostrar = $arregloObjE[$i];
                                $stringEmpresasMostrar = $stringEmpresasMostrar . $i + 1 . "." . $empresasMostrar . "\n";
                            }
                            echo $stringEmpresasMostrar;
                        }
                        break;
                    case 5:
                        echo "Edicion finalizada";
                        break;
                }
            } while ($opcionE <> 5);
            break;
        case 2:
            //Edicion responsables
            do {
                $opcionR = seleccionarOpcionResponsables();
                switch ($opcionR) {
                    case 1:
                        //Agregar
                        echo "\nIngrese el numero de licencia del responsable: \n";
                        $numLicencia = trim(fgets(STDIN));
                        echo "\nIngrese el nombre del responsable: \n";
                        $nombreR = trim(fgets(STDIN));
                        echo "\nIngrese el apellido del responsable: \n";
                        $apellidoR = trim(fgets(STDIN));
                        $responsableNuevo = new Responsable();
                        $responsableNuevo -> cargar(null, $numLicencia, $nombreR, $apellidoR);
                        $respuesta = $responsableNuevo -> insertar();
                        if ($respuesta == true) {
                            echo "El responsable fue agregado correctamente.";
                        }
                        else {
                            echo "No se pudo agregar el responsable.";
                        }
                        break;
                    case 2:
                        //Modificar
                        //Verifico si existen responsables cargados que se puedan modificar.
                        $arregloObjR = $objResponsable -> listar();
                        $countResponsables = count($arregloObjR);
                        if ($countResponsables == 0) {
                            echo "\nNo hay responsables para modificar.\n";
                        }
                        else {
                            //Muestro los responsables que hay disponibles para modificar
                            $stringResponsablesMostrar = " ";
                            for ($i = 0; $i < $countResponsables; $i++) {
                                $responsablesMostrar = $arregloObjR[$i];
                                $stringResponsablesMostrar = $stringResponsablesMostrar . $i + 1 . "." . $responsablesMostrar . "\n";
                            }
                            echo "\nSeleccione el responsable que desea modificar: \n" . $stringResponsablesMostrar;
                            $numeroR = solicitarNumeroEntre(1, $countResponsables);
                            $responsableAModificar = $arregloObjR [$numeroR - 1];
                            //Menu de modificaciones
                            do {
                                $opcionMResponsable = seleccionarOpcionModificacionesR();
                                switch ($opcionMResponsable) {
                                    case 1: 
                                        echo "\nIngrese el nuevo numero de licencia del responsable: \n";
                                        $nuevoNumeroR = trim(fgets(STDIN));
                                        $responsableAModificar -> setRnumerolicencia($nuevoNumeroR);
                                        $respuesta = $responsableAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl numero de licencia ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }   
                                        break;
                                    case 2:
                                        echo "\nIngrese el nuevo nombre del responsable: \n";
                                        $nuevoNombreR = trim(fgets(STDIN));
                                        $responsableAModificar -> setRnombre($nuevoNombreR);
                                        $respuesta = $responsableAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl nombre ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                        break;
                                    case 3:
                                        echo "\nIngrese el nuevo apellido del responsable: \n";
                                        $nuevoApellidoR = trim(fgets(STDIN));
                                        $responsableAModificar -> setRapellido($nuevoApellidoR);
                                        $respuesta = $responsableAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl apellido ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                        break;
                                    case 4: 
                                        echo "\nModificaciones terminadas.\n";
                                        break;
                                }
                            } while ($opcionMResponsable <> 4);
                        }
                        break;
                    case 3:
                        //Eliminar
                        $arregloObjR = $objResponsable -> listar();
                        $countResponsables = count($arregloObjR);
                        if ($countResponsables == 0) {
                            echo "\nNo hay responsables disponibles para eliminar.\n";
                        }
                        else {
                            $stringResponsablesMostrar = "";
                            for ($i = 0; $i < $countResponsables; $i++) {
                                $responsablesMostrar = $arregloObjR[$i];
                                $stringResponsablesMostrar = $stringResponsablesMostrar . $i + 1 . "." . $responsablesMostrar . "\n";
                            }
                            echo "\nSeleccione el responsable que desea eliminar: \n" . $stringResponsablesMostrar;
                            $numResponsableSeleccion = trim(fgets(STDIN));
                            $responsableParaEliminar = $arregloObjR [$numResponsableSeleccion - 1];
                            $arregloObjV = $objViaje -> listar();
                            $countViajes = count($arregloObjV);
                            $i = 0;
                            $valido = true;
                            while ($i < $countViajes && $valido == true) {
                                $viajeAComparar = $arregloObjV [$i];
                                $responsableViaje = $viajeAComparar -> getObjResponsable();
                                if ($responsableParaEliminar == $responsableViaje) {
                                    $valido = false;
                                }
                                $i++;
                            }
                            if ($valido == false) {
                                echo "\nNo es posible eliminar el responsable ya que es utilizado en algun viaje.\n";
                            }
                            else {
                                $respuesta = $responsableParaEliminar -> eliminar();
                                if ($respuesta == true) {
                                    echo "\nEl responsable se ha eliminado correctamente.\n";
                                }
                                else {
                                    echo "\nNo fue posiblre realizar la eliminacion.";
                                }
                            }
                        }
                        break;
                    case 4:
                        //Mostrar
                        $arregloObjR = $objResponsable -> listar();
                        $countResponsables = count($arregloObjR);
                        if ($countResponsables == 0) {
                            echo "\nNo existen responsables para mostrar.\n";
                        }
                        else {
                            $stringResponsablesMostrar = " ";
                            for ($i = 0; $i < $countResponsables; $i++) {
                                $responsablesMostrar = $arregloObjR[$i];
                                $stringResponsablesMostrar = $stringResponsablesMostrar . $i + 1 . "." . $responsablesMostrar . "\n";
                            }
                            echo $stringResponsablesMostrar;
                        }
                        break;
                    case 5:
                        echo "Edicion finalizada";
                        break;
                }
            } while ($opcionR <> 5);

            break;
        case 3:
            //Edicion viajes
            do {
                $opcionV = seleccionarOpcionViajes();
                switch ($opcionV) {
                    case 1:
                        //Verifica si hay una empresa para crear el viaje y/o si hay un responsable para crear el viaje
                        if ($countEmpresas == 0 || $countResponsables == 0) {
                            echo "\nNo es posible crear un viaje ya que no existe una empresa o un responsable para asignarle al mismo\n";
                        }
                        else {
                            //Agregar
                            echo "\nIngrese el destino del viaje: \n";
                            $destinoV = trim(fgets(STDIN));
                            echo "\nIngrese la cantidad maxima de pasajeros: \n";
                            $cantMax = trim(fgets(STDIN));
                            //Se elije la empresa del viaje
                            echo "\nSeleccione la empresa para su viaje: \n";
                            $arregloObjE = $objEmpresa -> listar();
                            $countEmpresas = count($arregloObjE);
                            $stringEmpresas = "";
                            for ($i = 0; $i < $countEmpresas; $i++) {
                                $empresasFor = $arregloObjE[$i];
                                $stringEmpresas = $stringEmpresas . $i + 1 . "." . $empresasFor . "\n";
                            }
                            echo $stringEmpresas;
                            $numSeleccionE = solicitarNumeroEntre(1, $countEmpresas);
                            $empresaV = $arregloObjE [$numSeleccionE - 1];
                            //Se elije el responsable del viaje
                            echo "\nSeleccione el responsable para su viaje: \n";
                            $arregloObjR = $objResponsable -> listar();
                            $countResponsables = count($arregloObjR);
                            $stringResponsables = "";
                            for ($i = 0; $i < $countResponsables; $i++) {
                                $responsablesFor = $arregloObjR[$i];
                                $stringResponsables = $stringResponsables . $i + 1 . "." . $responsablesFor . "\n";
                            }
                            echo $stringResponsables;
                            $numSeleccionR = solicitarNumeroEntre(1, $countResponsables);
                            $responsableV = $arregloObjR [$numSeleccionR - 1];
                            echo "Ingrese el importe del viaje: ";
                            $importeV = trim(fgets(STDIN));
                            //Se cargan los datos del viaje
                            $viajeNuevo = new Viaje();
                            $viajeNuevo -> cargar(null, $destinoV, $cantMax, $empresaV, $responsableV, $importeV);
                            $respuesta = $viajeNuevo -> insertar();
                            if ($respuesta == true) {
                                echo "El viaje fue agregado correctamente.";
                            }
                            else {
                                echo "No se pudo agregar el viaje.";
                            }
                        }
                        break;
                    case 2:
                        //Modificaciones
                        $arregloObjV = $objViaje -> listar();
                        $countViajes = count($arregloObjV);
                        if ($countViajes == 0) {
                            echo "\nNo existen viajes para modificar.\n";
                        }
                        else {
                            $stringViajesMostrar = " ";
                            for ($i = 0; $i < $countViajes; $i++) {
                                $viajesMostrar = $arregloObjV[$i];
                                $stringViajesMostrar = $stringViajesMostrar . $i + 1 . "." . $viajesMostrar . "\n";
                            }
                            echo "\nSeleccione el viaje que desea modificar: \n" . $stringViajesMostrar;
                            $numeroV = solicitarNumeroEntre(1, $countViajes);
                            $viajeAModificar = $arregloObjV [$numeroV - 1];
                            //Menu de modificaciones
                            do {
                                $opcionMViaje = seleccionarOpcionModificacionesV();
                                switch ($opcionMViaje) {
                                    case 1: 
                                        echo "\nIngrese el nuevo destino del viaje: \n";
                                        $nuevoDestino = trim(fgets(STDIN));
                                        $viajeAModificar -> setVdestino($nuevoDestino);
                                        $respuesta = $viajeAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl destino ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                        break;
                                    case 2:
                                        //Obtengo los pasajeros actuales del viaje 
                                        $colPasajerosViajeModi = $viajeAModificar -> getColPasajeros();
                                        $countPasajerosModi = count($colPasajerosViajeModi);
                                        if ($countPasajerosModi == 0) {
                                            echo "\nIngrese la nueva cantidad maxima de pasajeros del viaje:\n";
                                            $nuevaCap = trim(fgets(STDIN));
                                            $viajeAModificar -> setVcantmaxpasajeros($nuevaCap);
                                            $respuesta = $viajeAModificar -> modificar();
                                            if ($respuesta == true) {
                                                echo "\nLa cantidad maxima de pasajeros ha sido cambiada correctamente.\n";
                                            }
                                            else {
                                                echo "\nNo se a podido realizar el cambio.\n";
                                            }
                                        }
                                        else {
                                            //Verifico que no se ingrese una nueva cap max menor a los pasajeros que ya estan en el viaje.
                                            echo "\nIngrese la nueva cantidad maxima de pasajeros del viaje (tenga en cuenta ya a los pasajeros cargados, por ende no ingrese una cantidad menor a " . $countPasajerosModi . "): \n";
                                            $nuevaCap = trim(fgets(STDIN));
                                            $valido = false; 
                                            if ($nuevaCap < $countPasajerosModi) {
                                            echo "\n Debe Ingresar una cantidad maxima mayor a " . $countPasajerosModi . ":";
                                            $nuevaCap = trim(fgets(STDIN));
                                            }
                                            else {
                                                $valido = true;
                                            }
                                            while ($valido == false) {
                                                if ($nuevaCap < $countPasajerosModi) {
                                                    echo "\n Debe Ingresar una cantidad maxima mayor a " . $countPasajerosModi . ":";
                                                    $nuevaCap = trim(fgets(STDIN));
                                                }
                                                else {
                                                    $valido = true;
                                                }
                                            }
                                            $viajeAModificar -> setVcantmaxpasajeros($nuevaCap);
                                            $respuesta = $viajeAModificar -> modificar();
                                            if ($respuesta == true) {
                                                echo "\nLa cantidad maxima de pasajeros ha sido cambiada correctamente.\n";
                                            }
                                            else {
                                                echo "\nNo se a podido realizar el cambio.\n";
                                            }
                                        }
                                        break;
                                    case 3:
                                        echo "\nSeleccione la nueva empresa del viaje: \n";
                                        //Muestro las empresas disponibles
                                        $arregloObjE = $objEmpresa -> listar();
                                        $countEmpresas = count($arregloObjE);
                                        $stringEmpresasMostrar = " ";
                                        for ($i = 0; $i < $countEmpresas; $i++) {
                                            $empresasMostrar = $arregloObjE[$i];
                                            $stringEmpresasMostrar = $stringEmpresasMostrar . $i + 1 . "." . $empresasMostrar . "\n";
                                        }
                                        echo $stringEmpresasMostrar;
                                        //Selecciona la nueva empresa
                                        $numeroNuevaE = trim(fgets(STDIN));
                                        $nuevaEmpresa = $arregloObjE [$numeroNuevaE - 1];
                                        $viajeAModificar -> setObjEmpresa($nuevaEmpresa);
                                        $respuesta = $viajeAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nLa empresa ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                        break;
                                    case 4:
                                        echo "\nSeleccione el nuevo responsable del viaje: \n";
                                        //Muestro los responsables disponibles
                                        $arregloObjR = $objResponsable -> listar();
                                        $countResponsables = count($arregloObjR);
                                        $stringResponsablesMostrar = " ";
                                        for ($i = 0; $i < $countResponsables; $i++) {
                                            $responsablesMostrar = $arregloObjR[$i];
                                            $stringResponsablesMostrar = $stringResponsablesMostrar . $i + 1 . "." . $responsablesMostrar . "\n";
                                        }
                                        echo $stringResponsablesMostrar;
                                        //Selecciona el nuevo responsable
                                        $numeroNuevoR = trim(fgets(STDIN));
                                        $nuevoResponsable = $arregloObjR [$numeroNuevoR - 1];
                                        $viajeAModificar -> setObjResponsable($nuevoResponsable);
                                        $respuesta = $viajeAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl responsable ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                        break;
                                    case 5:
                                        echo "\nIngrese el nuevo importe del viaje: \n";
                                        $nuevoImporte = trim(fgets(STDIN));
                                        $viajeAModificar -> setVimporte($nuevoImporte);
                                        $respuesta = $viajeAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl importe ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                        break;
                                    case 6: 
                                        echo "\nModificaciones terminadas.\n";
                                        break;
                                }
                            } while ($opcionMViaje <> 6);    
                        }      
                        break;
                    case 3:
                        //Eliminar
                        $arregloObjV = $objViaje -> listar();
                        $countViajes = count($arregloObjV);
                        if ($countViajes == 0) {
                            echo "\nNo hay viajes disponibles para eliminar.\n";
                        }
                        else {
                            $stringViajesMostrar = "";
                            for ($i = 0; $i < $countViajes; $i++) {
                                $viajesMostrar = $arregloObjV[$i];
                                $stringViajesMostrar = $stringViajesMostrar . $i + 1 . "." . $viajesMostrar . "\n";
                            }
                            echo "\nSeleccione el viaje que desea eliminar: \n" . $stringViajesMostrar;
                            $numViajeSeleccion = trim(fgets(STDIN));
                            $viajeParaEliminar = $arregloObjV [$numViajeSeleccion - 1];
                            $arregloPasajerosViaje = $viajeParaEliminar -> getColPAsajeros();
                            $countArregloPasajerosViaje = count($arregloPasajerosViaje);
                            if ($countArregloPasajerosViaje == 0) {
                                $respuesta = $viajeParaEliminar -> eliminar();
                                if ($respuesta == true) {
                                    echo "\nEl viaje se ha eliminado correctamente.\n";
                                }
                                else {
                                    echo "\nNo fue posible realizar la eliminacion.";
                                }
                            }
                            else {
                                echo "\nNo es posible eliminar el viaje ya que existen pasajeros en el mismo.\n";
                            }
                        }
                        break;
                    case 4:
                        //Mostrar
                        $arregloObjV = $objViaje -> listar();
                        $countViajes = count($arregloObjV);
                        if ($countViajes == 0) {
                            echo "\nNo existen viajes para mostrar.\n";
                        }  
                        else {
                            $stringViajesMostrar = " ";
                            for ($i = 0; $i < $countViajes; $i++) {
                                $viajesMostrar = $arregloObjV[$i];
                                $stringViajesMostrar = $stringViajesMostrar . $i + 1 . "." . $viajesMostrar . "\n";
                            }
                            echo $stringViajesMostrar;
                        }  
                        break;
                    case 5:
                        echo "Edicion finalizada";
                        break;
                }
            } while ($opcionV <> 5);
            break;
        case 4:
            //Edicion pasajeros
            do {
                $opcionP = seleccionarOpcionPasajeros();
                switch ($opcionP) {
                    case 1:
                        //Verifica si hay un viaje para asi poder crear un pasajero
                        if ($countViajes == 0) {
                            echo "\nNo es posible crear un pasajero ya que no existe un viaje para asignarle\n";
                        }
                        else {
                            //Agregar
                            echo "\nIngrese el documento del pasajero: \n";
                            $documentoP = trim(fgets(STDIN));
                            echo "\nIngrese el nombre del pasajero: \n";
                            $nombreP = trim(fgets(STDIN));
                            echo "\nIngrese el apellido del pasajero: \n";
                            $apellidoP = trim(fgets(STDIN));
                            echo "\nIngrese el telefono del pasajero: \n";
                            $telefonoP = trim(fgets(STDIN));
                            //Se elije el viaje del pasajero (se muestran solo los que tienen espacio disponible de acuerdo a la cap max)
                            echo "\nSeleccione el viaje: \n";
                            $arregloObjV = $objViaje -> listar();
                            $countViajes = count($arregloObjV);
                            $arregloObjP = $objPasajero -> listar();
                            $countPasajeros = count($arregloObjP);
                            $existenPasajeros = true;
                            $arregloViajesDisponiblesN = 0;
                            $arregloViajesDisponibles = [];
                            $stringViajes = " ";
                            for ($i = 0; $i < $countViajes; $i++) {
                                $viajesFor = $arregloObjV[$i];
                                $pasajerosViajeArreglo = [];
                                $capMaxViaje = $viajesFor -> getVcantmaxpasajeros();
                                $idViajeRevisar = $viajesFor -> getIdviaje();
                                for ($j = 0; $j < $countPasajeros; $j++) {
                                    $pasajeroFor = $arregloObjP [$j];
                                    $idViajePasa = $pasajeroFor -> getIdviaje();
                                    if ($idViajePasa == $idViajeRevisar) {
                                        array_push($pasajerosViajeArreglo, $pasajeroFor);
                                    }
                                }
                                if ($countPasajeros == 0) {
                                    $existenPasajeros = false;
                                }
                                if (count($pasajerosViajeArreglo) < $capMaxViaje) {
                                    array_push($arregloViajesDisponibles, $viajesFor);
                                    $arregloViajesDisponiblesN = $arregloViajesDisponiblesN + 1;
                                    $stringViajes = $stringViajes . $arregloViajesDisponiblesN . "." . $viajesFor . "\n";
                                }
                            }
                            //SI HAY VIAJES DISPONIBLES SE PROCEDE A MOSTRAR LOS VIAJES Y GUARDAR EL MISMO
                            if (count($arregloViajesDisponibles) > 0 || $existenPasajeros == false) {
                                echo $stringViajes;
                                $numSeleccionV = solicitarNumeroEntre(1, $arregloViajesDisponiblesN);
                                $viajeSeleccionado = $arregloViajesDisponibles [$numSeleccionV - 1];
                                $viajeP = $viajeSeleccionado -> getIdviaje();
                                //Se cargan los datos del pasajero
                                $pasajeroNuevo = new Pasajero();
                                $pasajeroNuevo -> cargar($documentoP, $nombreP, $apellidoP, $telefonoP, $viajeP);
                                //Evalua si no existe un pasajero con el mismo id
                                $arregloObjP = $objPasajero -> listar();
                                $countPasajeros = count($arregloObjP);
                                $i = 0;
                                $encontrado = false;
                                while ($i < $countPasajeros && $encontrado == false) {
                                    $pasajero = $arregloObjP[$i];
                                    $dniArreglo = $pasajero -> getPdocumento();
                                    if ($dniArreglo == $documentoP) {
                                        $encontrado = true;
                                        echo "No es posible agregar el pasajero ya que ya existe uno con el mismo DNI.";
                                    }
                                    $i++;
                                }
                                if ($encontrado == false) {
                                    $respuesta = $pasajeroNuevo -> insertar();
                                    if ($respuesta == true) {
                                        echo "El pasajero fue agregado correctamente.";
                                    }
                                    else {
                                        echo "No se pudo agregar el pasajero.";
                                    }
                                }
                            }
                            else {
                                echo "No hay viajes con espacio disponible.";
                            }
                        }
                        break;
                    case 2:
                        //Modificaciones
                        $arregloObjP = $objPasajero -> listar();
                        $countPasajeros = count($arregloObjP);
                        if ($countPasajeros == 0) {
                            echo "\nNo existen pasajeros disponibles ara modificar.\n";
                        }
                        else {
                            $stringPasajerosMostrar = "";
                            for ($i = 0; $i < $countPasajeros; $i++) {
                                $pasajerosMostrar = $arregloObjP[$i];
                                $stringPasajerosMostrar = $stringPasajerosMostrar . $i + 1 . "." . $pasajerosMostrar . "\n";
                            }
                            echo "\nSeleccione el pasajero que desea modificar: \n" . $stringPasajerosMostrar;
                            $numeroP = solicitarNumeroEntre(1, $countPasajeros);
                            $pasajeroAModificar = $arregloObjP [$numeroP - 1];
                        }
                        //Menu de modificaciones
                        do {
                            $opcionMPasajero = seleccionarOpcionModificacionesP();
                            switch ($opcionMPasajero) {
                                case 1: 
                                    echo "\nIngrese el nuevo nombre del pasajero: \n";
                                        $nuevoNombre = trim(fgets(STDIN));
                                        $pasajeroAModificar -> setPnombre($nuevoNombre);
                                        $respuesta = $pasajeroAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl nombre ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                    break;
                                case 2:
                                    echo "\nIngrese el nuevo apellido del pasajero: \n";
                                        $nuevoApellido = trim(fgets(STDIN));
                                        $pasajeroAModificar -> setPapellido($nuevoApellido);
                                        $respuesta = $pasajeroAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl apellido ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                    break;
                                case 3:
                                    echo "\nIngrese el nuevo telefono del pasajero: \n";
                                        $nuevoTelefono = trim(fgets(STDIN));
                                        $pasajeroAModificar -> setPtelefono($nuevoTelefono);
                                        $respuesta = $pasajeroAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl telefono ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                    break;
                                case 4:
                                    $arregloObjV = $objViaje -> listar();
                                    $countViajes = count($arregloObjV);
                                    $nP = 0;
                                    $stringViajesDisponibles = "";
                                    $arrayViajesDis = [];
                                    for ($i = 0; $i < $countViajes; $i++) {
                                        $viajeForM = $arregloObjV [$i];
                                        $cantPasajeros = $viajeForM -> getColPasajeros();
                                        $cantPasajerosN = count($cantPasajeros);
                                        $cantMaxFor = $viajeForM -> getVcantmaxpasajeros();
                                        if ($cantPasajerosN < $cantMaxFor) {
                                            $nP = $nP + 1;
                                            array_push($arrayViajesDis, $viajeForM);
                                            $stringViajesDisponibles = $stringViajesDisponibles . $nP .  "." . $viajeForM . "\n";
                                        }
                                    }
                                    if ($nP == 0) {
                                        echo "\nNo existen viajes con espacio disponible para poder realizar el cambio de id";
                                    }
                                    else {
                                        echo "\nSeleccione el nuevo viaje, por ende el nuevo id: \n" . $stringViajesDisponibles;
                                        $numSeleccionId = solicitarNumeroEntre(1, $nP);
                                        $viajeAModificarP = $arrayViajesDis [$numSeleccionId - 1];
                                        $nuevoIdV = $viajeAModificarP -> getIdviaje();
                                        $pasajeroAModificar -> setIdviaje($nuevoIdV);
                                        $respuesta = $pasajeroAModificar -> modificar();
                                        if ($respuesta == true) {
                                            echo "\nEl viaje, por ende su Id, ha sido cambiado correctamente.\n";
                                        }
                                        else {
                                            echo "\nNo se a podido realizar el cambio.\n";
                                        }
                                    }
                                    break;
                                case 5: 
                                    echo "\nModificaciones terminadas.\n";
                                    break;
                            }
                        } while ($opcionMPasajero <> 5);
                        break;
                    case 3:
                        //Eliminar
                        $arregloObjP = $objPasajero -> listar();
                        $countPasajeros = count($arregloObjP);
                        if ($countPasajeros == 0) {
                            echo "\nNo hay pasajeros disponibles para eliminar.\n";
                        }
                        else {
                            $stringPasajerosMostrar = "";
                            for ($i = 0; $i < $countPasajeros; $i++) {
                                $pasajerosMostrar = $arregloObjP[$i];
                                $stringPasajerosMostrar = $stringPasajerosMostrar . $i + 1 . "." . $pasajerosMostrar . "\n";
                            }
                            echo "\nSeleccione el pasajero que desea eliminar: \n" . $stringPasajerosMostrar;
                            $numPasajeroSeleccion = trim(fgets(STDIN));
                            $pasajeroParaEliminar = $arregloObjP [$numPasajeroSeleccion - 1];
                            $respuesta = $pasajeroParaEliminar -> eliminar();
                            if ($respuesta == true) {
                                echo "\nEl pasajero se ha eliminado correctamente.\n";
                            }
                            else {
                                echo "\nNo fue posible realizar la eliminacion.";
                            }
                        }
                        break;
                    case 4:
                        //Mostrar
                        $arregloObjP = $objPasajero -> listar();
                        $countPasajeros = count($arregloObjP);
                        $stringPasajerosMostrar = "";
                        if ($countViajes == 0) {
                            echo "\nNo existen pasajeros para mostrar.\n";
                        }  
                        else {
                            for ($i = 0; $i < $countPasajeros; $i++) {
                                $pasajerosMostrar = $arregloObjP[$i];
                                $stringPasajerosMostrar = $stringPasajerosMostrar . $i + 1 . "." . $pasajerosMostrar . "\n";
                            }
                            echo $stringPasajerosMostrar;
                        }
                        
                        break;
                    case 5:
                        echo "Edicion finalizada";
                        break;
                }
            } while ($opcionP <> 5);
            break;
        case 5:
            echo "Edicion finalizada";
            break;
    }
} while ($opcionM <> 5);