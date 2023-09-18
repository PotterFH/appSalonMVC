<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        //Crear el objeto de email

        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'b5183643f4f912';
        $phpmailer->Password = 'ab1f7250edea55';

        $phpmailer->setFrom('cuentas@appsalon.com');
        $phpmailer->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $phpmailer->Subject = 'Confirma tu cuenta';

        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet = 'UTF-8';
        $contenido  = "<html>";
        $contenido .= "<p><strong> Hola " . $this->nombre . "</strong> Has creado tu cuenta en AppSalon, solo debes confirmarla presionando en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $phpmailer->Body = $contenido;

        //Enviar email
        $phpmailer->send();
    }

    public function enviarInstrucciones()
    {
        //Crear el objeto de email

        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'b5183643f4f912';
        $phpmailer->Password = 'ab1f7250edea55';

        $phpmailer->setFrom('cuentas@appsalon.com');
        $phpmailer->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $phpmailer->Subject = 'Restablecer contraseña';

        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet = 'UTF-8';
        $contenido  = "<html>";
        $contenido .= "<p><strong> Hola " . $this->nombre . "</strong> Has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'> Restablecer tu password</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $phpmailer->Body = $contenido;

        //Enviar email
        $phpmailer->send();
    }
}
