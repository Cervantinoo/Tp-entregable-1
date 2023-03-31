<?php
//Importamos librerias
include 'Viaje.php';
include 'modulos.php';

//Cargamos un array con valores por defecto
$arrPasajeros = array("Nombre" => "Nombre", "Apellido" => "Apellido", "DNI" => "Dni");

//instanciamos el objeto con valores de referencia, luegos seran cambiados. 
$Objviaje = new Viaje(0, "destino", 0, $arrPasajeros);


$opcion = 1;
while ($opcion != 0) {
    $opcion = menu();
    switch ($opcion) {
        case 1; //Mostrar Informacion
            echo $Objviaje;
            break;
        case 2; //cargar Informacion
            cargarInformacion($Objviaje);
            break;
        case 3; //Modificar Informacion
            ModificarInformacion($Objviaje);
        case 0;
            echo "Ah finalizado el programa.";
            break;
        default;
            echo "Ingreso una opcion incorrecta, por favor ingrese la opcion correcta :) \n";
            break;
    }
}


