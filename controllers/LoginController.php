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
                    $email->enviarConfirmacion();

                    //Crear el usuario
                    $resultado = $usuario->guardar();

                    if($resultado){
                        header('Location: /mensaje');
                    }


                    debuguear($email);
                }
            }
        }

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router){

        $alertas = [];

        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)){
            //Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no valido');
        }else{
            //Modificar el usuario confirmado
            $usuario->confirmado = "1";
            $usuario->TOKEN = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta Comprobada Correctamente');
        }

        //Obtener alertas
        $alertas = Usuario::getAlertas();

        //Renderizar la vista
        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }
}
