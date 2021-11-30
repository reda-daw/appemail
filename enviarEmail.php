<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';



// Carga la configuración

$config = parse_ini_file('configuracion.ini');


$mail = new PHPMailer;

$mail->isSMTP();

// SMTPDebug = 0 -> desactivado (para uso en producción)

// SMTPDebug = 1 -> mensajes del cliente

// SMTPDebug = 2 -> mensajes del cliente y servidor

$mail->SMTPDebug = $config['SMTPDebug'];

$mail->Host = $config['host'];

$mail->Port = $config['port'];

$mail->SMTPAuth = $config['SMTPAuth'];

$mail->SMTPSecure = $config['SMTPSecure'];

// Usuario de google

$mail->Username = $config['username'];

// Clave

$mail->Password = $config['password'];

$mail->setFrom('daw.modulos@gmail.com', 'MODULO DAW');

// Los destinatarios se añaden con addAdrress()

$mail->addAddress($config['email'], $config['remitente']);

// Asunto del correo

$mail->Subject = $config['asunto'];

$mail->Body = 'Este mensaje es un texto de prueba del cuerpo';

$mail->MsgHTML('Este mensaje es un texto de prueba del cuerpo');

//$mail->addAttachment('test.txt');


// Enviar

if (!$mail->send()) {

   echo 'Error en el envío: ' . $mail->ErrorInfo;

} else {

   echo 'El email ha sido enviado correctamente.';

}


?>