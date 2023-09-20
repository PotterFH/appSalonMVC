<?php

namespace Controllers;

use Model\Servicio;

class APIController
{
    public static function index()
    {
        $servicios = servicio::all();
        echo json_encode($servicios);   
    }
}
