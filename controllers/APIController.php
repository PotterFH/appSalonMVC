<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController
{
    public static function index()
    {
        $servicios = Servicio::all();
        echo json_encode($servicios);   
    }

    public static function guardar()
    {
        //Almacena la lista y devuelve su id
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];

        //Almacena las citas y el servicio

        //Toma el string de los id de servicios = {1, 2, 3} y los combierte en una array separando cada elemento por coma
        $idServicios = explode("," ,  $_POST['servicios']);

        foreach ($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'serviciosId' => $idServicio
            ];

            $citaServicio = new CitaServicio($args);
            $citaServicio-> guardar();
        }
        
        //Retornamos una respuesta
        echo json_encode(  ['resultado' => $resultado] );
    }
}
