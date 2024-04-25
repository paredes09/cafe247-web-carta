<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "config.php";
require_once '../PHPMailer/Exception.php';
require_once '../PHPMailer/PHPMailer.php';
require_once '../PHPMailer/SMTP.php';

$name = $_POST['name'];
$correo = $_POST['email'];
$telefono = $_POST['phone'];
$fecha = $_POST['date'];
$hora = $_POST['time'];
$personas = $_POST['people'];
$mensaje = $_POST['mensaje'];

// Preparar la consulta SQL utilizando parámetros para evitar SQL Injection
$sql = "INSERT INTO reservas (r_nombre, r_correo, r_telefono, r_fecha, r_hora, r_npersonas, r_mensaje) 
VALUES (?, ?, ?, ?, ?, ?, ?)";
// Preparar la consulta
$stmt = $con->prepare($sql);

// Vincular los parámetros con la consulta SQL
$stmt->bind_param("sssssis", $name, $correo, $telefono, $fecha, $hora, $personas, $mensaje);

// Inicializa el mensaje de respuesta
$response = array('success' => false, 'message' => 'Error al procesar la inserción.');

if($stmt->execute()){
    // Enviar correo
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.lacasadelasenchiladas.pe';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'soporte.ti@lacasadelasenchiladas.pe';                     //SMTP username
        $mail->Password   = '$LCDLE2020$';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('soporte.ti@lacasadelasenchiladas.pe', 'CAFE247 - RESERVAS');
        $mail->addAddress("$correo");     //Add a recipient
        $mail->addAddress('soporte.ti@lacasadelasenchiladas.pe');               //Name is optional
        //$mail->addReplyTo('xtremo.abril9@gmail.com', 'RECLAMO LCDLE');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'SOLICITUD DE RESERVA CAFE247';
        $mail->Body = '
        <p>Su solicitud de reserva ha sido enviada correctamente.
         En breve nos comunicaremos con usted para confirmar su reserva. Gracias por preferirnos.</p>
        <hr>
        <h2>Datos de la reserva</h2>
        <ul>
            <li><strong>Nombre:</strong> ' . $name . '</li>
            <li><strong>Correo:</strong> ' . $correo . '</li>
            <li><strong>Teléfono:</strong> ' . $telefono . '</li>
            <li><strong>Fecha:</strong> ' . $fecha . '</li>
            <li><strong>Hora:</strong> ' . $hora . '</li>
            <li><strong>Personas:</strong> ' . $personas . '</li>
            <li><strong>Mensaje:</strong> ' . $mensaje . '</li>
        </ul>';

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //$mail->addAttachment($pdfPath);
        $mail->send();
    } catch (Exception $e) {
        echo "ERROR AL ENVIAR: {$mail->ErrorInfo}";
    }
    // Fin envío de correo
    $response['success'] = true;
    $response['message'] = 'Solicitud de reserva enviada correctamente.'; 
    
} else {
    $response['message'] = 'Error al registrar el reclamo.';

}
$stmt->close();
$con->close();   
echo json_encode($response);

?>
