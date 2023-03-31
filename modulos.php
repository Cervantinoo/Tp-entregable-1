<?php
/**
 * Funcion que muestra un menu de opciones.
 * @var string $opcion
 * @return string $opcion
 */
function menu()
{
    echo "Opcion 1: Ver informacion del viaje: \n";
    echo "Opcion 2: cargar informacion del viaje: \n";
    echo "Opcion 3: Modificar datos del viaje: \n";
    echo "Opcion 0: Para finalizar el programa. \n";
    $opcion = trim(fgets(STDIN));
    return $opcion;
}

/**
 * Funcion que permite cargar datos de los pasajeros
 * @var string $nombre
 * @var string $apellido
 * @var string $dni
 * @return array $arrDatos
 */
function datosPasajeros()
{
    echo "Ingrese el nombre del pasajero: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese el apellido del pasajero: ";
    $apellido = trim(fgets(STDIN));
    echo "Ingrese el DNI del pasajero: ";
    $dni = trim(fgets(STDIN));
    $arrDatos = array("Nombre" => $nombre, "Apellido" => $apellido, "DNI" => $dni);
    return $arrDatos;
}

/**
 * Funcion que mostrara un mensaje con opciones para poder modificar datos de un viaje
 * @var string $opcionesModificar
 * @return string $opcionesModificar
 */
function MenumodificarInformacion()
{
    echo "¿Que datos desea modificar?: \n";
    echo "Opcion 1: Codigo de viaje: \n";
    echo "Opcion 2: Destino del viaje: \n";
    echo "Opcion 3: Cantidad Maxima de pasajeros: \n";
    echo "opcion 4: Datos del pasajero: \n";
    $opcionModificar = trim(fgets(STDIN));
    return $opcionModificar;
}

/**
 * Funcion que permite modificar los datos de un viaje, Por ejemplo, el codigo de viaje o algun dato en particular de un pasajero
 * @param object $objViaje
 * @var string $codigo
 * @var string $destino
 * @var int $cantPasajeros
 */
function ModificarInformacion($Objviaje)
{
    $opcionModificar = MenuModificarInformacion();
    switch ($opcionModificar) {
        case 1;
            echo "Ingrese el nuevo codigo de viaje: \n";
            $codigo = trim(fgets(STDIN));
            $Objviaje->setCodigo($codigo);
            break;
        case 2;
            echo "Ingrese el nuevo destino de viaje: \n";
            $destino = trim(fgets(STDIN));
            $Objviaje->setDestino($destino);
            break;
        case 3;
            echo "Ingrese la nueva cantidad máxima de pasajeros: \n";
            $cantPasajeros = trim(fgets(STDIN));
            $Objviaje->setCanMaxPasajeros($cantPasajeros);
            break;
        case 4; //Modificar datos del pasajero
            modificarDatosPasajeros($Objviaje);
        default;
            echo "Ingreso una opcion incorrecta, por favor ingrese la opcion correcta :) \n";
            break;
    }
}


//Funcion que permite cargar los datos un viaje.
/**
 * @param object $Objviaje
 * @var string $codigo
 * @var string $destino
 * @var int $cantPasajeros
 * @var string $bandera
 * @var array $arr
 * @var int $i 
 */

function cargarInformacion($Objviaje)
{
    echo "Ingrese codigo de viaje: ";
    $codigo = trim(fgets(STDIN));
    $Objviaje->setCodigo($codigo);

    echo "Ingrese destino del viaje: ";
    $destino = trim(fgets(STDIN));
    $Objviaje->setDestino($destino);

    echo "ingrese cantidad máxima de pasajeros: ";
    $cantPasajeros = trim(fgets(STDIN));
    $Objviaje->setCanMaxPasajeros($cantPasajeros);

    echo "ingrese datos del pasajero: \n";

    $i = 0;
    $bandera = "";
    while ($bandera != "s") {
        $arr = datosPasajeros();
        $Objviaje->setPasajerosEnViaje($i, $arr);
        $i++;
        echo "¿Ya termindo de cargar pasajeros? S/N: ";
        $bandera = trim(fgets(STDIN));
    }
}


//Funcion que permite elegir que dato de un pasajero queremos modificar, y luego modifica el dato elegido
/**
 * @param object $Objviaje
 * @var int $numPasajero
 * @var string $opcionModificarDato
 * @var string $nombre
 * @var string $apellido
 * @var string $dni
 * @var array $arr
 *  
 */

function modificarDatosPasajeros($Objviaje)
{
    echo "Listado de pasajeros: \n";
    echo mostrarArreglo($Objviaje->getPasajerosEnViaje());
    echo "Ingrese el número de pasajero que desea cambiar: ";
    $numPasajero = trim(fgets(STDIN));
    $numPasajero -= 1;
    echo "¿Que datos del pasajero desea modificar?... \n";
    echo "Opcion 1: Nombre \n";
    echo "Opcion 2: Apellido \n";
    echo "Opcion 3: DNI \n";
    $opcionModificarDato = trim(fgets(STDIN));
    switch ($opcionModificarDato) {
        case 1;
            echo "Ingrese el nombre de la persona: ";
            $nombre = trim(fgets(STDIN));            
            $arr = array("Nombre" => $nombre, "Apellido" => $Objviaje->getPasajerosEnViaje()[$numPasajero]["Apellido"], "DNI" => $Objviaje->getPasajerosEnViaje()[$numPasajero]["DNI"]);
            $Objviaje->setPasajerosEnViaje($numPasajero, $arr);
            break;
        case 2;
            echo "Ingrese el apellido de la persona: ";
            $apellido = trim(fgets(STDIN));
            $arr = array("Nombre" => $Objviaje->getPasajerosEnViaje()[$numPasajero]["Nombre"], "Apellido" => $apellido, "DNI" => $Objviaje->getPasajerosEnViaje()[$numPasajero]["DNI"]);
            $Objviaje->setPasajerosEnViaje($numPasajero, $arr);

            break;
        case 3;
            echo "Ingrese el DNI de la persona: ";
            $dni = trim(fgets(STDIN));
            $arr = array("Nombre" => $Objviaje->getPasajerosEnViaje()[$numPasajero]["Nombre"], "Apellido" => $Objviaje->getPasajerosEnViaje()[$numPasajero]["Apellido"], "DNI" => $dni);;
            $Objviaje->setPasajerosEnViaje($numPasajero, $arr);
            break;
        default;
            echo "Ingreso una opcion incorrecta, por favor ingrese la opcion correcta :) \n";
            break;
    }
}
