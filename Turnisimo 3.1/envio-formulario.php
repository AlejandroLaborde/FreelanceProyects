<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';

$nombre_usuario=$_POST['nombre'];
$email_usuario=$_POST['email'];
$consulta_usuario=$_POST['mensaje'];


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
   
try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'pruebas.sistemas.jm@gmail.com';                     // SMTP username
    $mail->Password   = 'evtpymrzvhgqrvbl';                               // SMTP password
    $mail->SMTPSecure = 's';                                               // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('pruebas.sistemas.jm@gmail.com', 'Contacto - TURNISIMO');
    $mail->addAddress('info@turnisimo.com.ar');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Probando';
    $mail->Body    = "Tu Nombre es: ".$nombre_usuario."\r\n";
    $mail->Body .= "Tu Email es: ".$email_usuario."\r\n"; 
    $mail->Body .= "Consulta: ".$consulta_usuario."\r\n";
    
        $mail->send();
        header("Location:index.php?i=ok");
    } catch (Exception $e) {
       header("Location:index.php?i=1");
    }
/*
    try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'pruebas.sistemas.jm@gmail.com';                     // SMTP username
    $mail->Password   = 'evtpymrzvhgqrvbl';                               // SMTP password
    $mail->SMTPSecure = 's';                                               // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('pruebas.sistemas.jm@gmail.com', 'TURNISIMO');
    $mail->addAddress('juanmanuelchico@hotmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Probando';
    $mail->Body    = "Tu Nombre es: ".$nombre_usuario."\r\n";
    $mail->Body .= "Tu Email es: ".$email_usuario."\r\n"; 
    $mail->Body .= "Consulta: ".$consulta_usuario."\r\n";
    
        $mail->send();
        header("Location:index.php?i=ok");
    } catch (Exception $e) {
       header("Location:index.php?i=1");
    }

*/
?>
