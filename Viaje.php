<?php

//Creamos la clase viaje
class Viaje
{

    //inicializamos atributos
    private $codigo;
    private $destino;
    private $canMaxPasajeros;
    private $pasajerosEnViaje = [];



    //Metodos

    //Declaracion Metodo contructor
    /**
     * @param int $cod
     * @param string $dest
     * @param int $canMaxP
     * @param array $pasajeros
     * 
     */
    public function __construct($cod, $dest, $canMaxP, $pasajeros)
    {
        $this->codigo = $cod;
        $this->destino = $dest;
        $this->canMaxPasajeros = $canMaxP;
        $this->pasajerosEnViaje[] = $pasajeros;
    }


    //Inicio Declaracion Metodos obtener
    /**
     * @return string $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @return string $destino
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * @return string $canMaxPasajeros
     */
    public function getCanMaxPasajeros()
    {
        return $this->canMaxPasajeros;
    }

    /**
     * @return array $pasajerosEnViaje
     */
    public function getPasajerosEnViaje()
    {
        return $this->pasajerosEnViaje;
    }

    //Fin Declaracion Metodos obtener

    //Incio declaracion Metodos set
    public function setCodigo($cod)
    {
        $this->codigo = $cod;
    }


    public function setDestino($dest)
    {
        $this->destino = $dest;
    }

    public function setCanMaxPasajeros($canMaxP)
    {
        $this->canMaxPasajeros = $canMaxP;
    }
    /**
     * @param int $posicion
     * @param array $pasajero
     */
    public function setPasajerosEnViaje($posicion, $pasajero)
    {
        $this->pasajerosEnViaje[$posicion] = $pasajero;
    }

    //Fin declaracion Metodos set

    
    /**
     * @return string $salida
     */
    public function __toString()
    {
        $salida = "";
        $salida = $salida . "Codigo: " . $this->codigo . "\n". "Destino: " . $this->destino. "\n" . "Cantidad maxima de pasajeros: " . $this->canMaxPasajeros . "\n". "Listado de pasajeros: \n" . mostrarArreglo($this->pasajerosEnViaje);
        return  $salida;
    }
}

    
//Funcion que retorna una concatenacion de listado de pasajeros, con sus datos correspondientes 
    /**
    * @param array $arrPasajeros
     * @return string $listaPasajeros
     */
function mostrarArreglo($arrPasajeros)
{
   
    $listaPasajeros = "";
    $long = count($arrPasajeros);
    for ($i = 0; $i < $long; $i++) {
        $listaPasajeros = $listaPasajeros . "Pasajero " . $i + 1 . ": " . $arrPasajeros[$i]["Nombre"] . " " . $arrPasajeros[$i]["Apellido"] . " " . $arrPasajeros[$i]["DNI"] . " " . "\n";
    }
    return $listaPasajeros;
}


?>