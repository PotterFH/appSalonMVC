<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $router->render('auth/login');
    }

    public static function logout()
    {
        echo "Desde Logout";
    }

    public static function olvide(Router $router)
    {
        $router->render('auth/olvide-password', []);
    }


    public static function recuperar()
    {
        echo "Desde recuperar";
    }

    public static function crear(Router $router)
    {
        $usuario = new Usuario;

        // Alertas Vacias
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            //Revisar que no  haya alertas, es decir que lleno todos lo campos
            if (empty($alertas)) {
                //Verificar que no exista el usuario
                // $usuario->existeUsuario();
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                }else{
                    //Hashear password
                    $usuario->hasPassword();
                    
                    //Enviar token
                    $usuario->crearToken();

                    //Enviar el email para validar token
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);

                    debuguear($email);
                }
            }
        }

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}
