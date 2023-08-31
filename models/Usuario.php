<?php

namespace Model;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'telefono', 'admin', 'confirmado', 'token', 'password'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? null;
        $this->confirmado = $args['confirmado'] ?? null;
        $this->token = $args['token'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    //Mensajes de validacion para la creacion de cuenta
    public function validarNuevaCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        if(!$this->telefono){
            self::$alertas['error'][] = 'El telefono es obligatorio';
        }
        if(strlen($this->password) < 6 ){
            self::$alertas['error'][] = 'Password demasiado debil';
        }

        return self::$alertas;
    }

    //Revisa si el usuario ya existe
    public function existeUsuario(){
         $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        //  debuguear($query);
         
         $resultado = self::$db->query($query);

         if($resultado->num_rows){
            self::$alertas['error'][] = 'El usuario ya esta registrado';
         }

         return $resultado;
    }

    public function hasPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken(){
        $this->token = uniqid();
    }
}