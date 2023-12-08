<?php require_once "vendor/autoload.php"; ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
?>

<?php 
//1. Crear una instancia de PHPMailer;
$mail = new PHPMailer(true);

try {
    //2. Configuración del servidor.
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP(); //Configurando el protocolo de envío.
    $mail->Host = "smtp.gmail.com"; //Configurando el host SMTP (Outlook, Gmail, ProtonMail). Dependiendo del servicio de correo del destinatario, el nombre del host va a cambiar.                    //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Habilitando la autenticación SMTP.
    $mail->Username = "correo.servidor@gmail.com"; //Usuario SMTP (A la configuración hay que darle acceso a una cuenta de correo).
    $mail->Password = "MiClaveFalsa123456"; //Contraseña SMTP (A la configuración hay que darle acceso a una cuenta de correo).
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;              
    
    $mail->setFrom("correo.servidor@gmail.com", "Daniel"); //Configurando quien envía el correo (Tiene que ser la cuenta a la cual se le dió acceso en la configuración del servidor).
    $mail->addAddress("correo.destinatario@protonmail.com", "Daniel"); //Configurando a quien se le envía el correo.
    
    //4. Contenido.
    $mail->isHTML(true); //Configurando el correo para que soporte HTML.
    $mail->Subject = "Asunto muy importante";
    $mail->Body = "Hola este es un correo de prueba utilizando PHPMailer <b>Negrita con HTML</b>";
    
    $mail->send();
    echo "El mensaje fue enviado correctamente";
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}
?>