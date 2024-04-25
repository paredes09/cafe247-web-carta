<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// importar la configuración de la BD
require_once "config.php";
// importar las librerias de PHPMailer
require_once '../../PHPMailer/Exception.php';
require_once '../../PHPMailer/PHPMailer.php';
require_once '../../PHPMailer/SMTP.php';
// Obtén y sanitiza los datos del formulario
$nombre = htmlspecialchars($_POST['name']);
$dni = htmlspecialchars($_POST['dni']);
$celular = htmlspecialchars($_POST['celular']);
$correo = htmlspecialchars($_POST['email']);
$categoria = intval($_POST['categoria']);
$detall = intval($_POST['detal']);
$monto = doubleval($_POST['monto']);
$descripcion = htmlspecialchars($_POST['description']);
$pedido = htmlspecialchars($_POST['solicitud']);
$detalle = htmlspecialchars($_POST['detalle']);
$fecha = date('Y-m-d H:i:s');

// Prepara la consulta SQL utilizando parámetros preparados para evitar inyecciones SQL
$query = "INSERT INTO consumidor (c_nombre, c_dni, c_celular, c_correo, cat, det, monto, descripcion, pedido, detalle, fecha) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepara la sentencia
$stmt = $con->prepare($query);

// Vincula los parámetros
$stmt->bind_param("ssssiidssss", $nombre, $dni, $celular, $correo, $categoria, $detall, $monto, $descripcion, $pedido, $detalle, $fecha);

// Inicializa el mensaje de respuesta
$response = array('success' => false, 'message' => 'Error al procesar la inserción.');



// Ejecuta la consulta
if ($stmt->execute()) {
    $ultimoId = $stmt->insert_id;
    $response['success'] = true;
    $response['message'] = 'Reclamo registrado correctamente.';
    // crear pdf con fpdf
    require('FPDF/fpdf.php');
    class PDF extends FPDF
    {
    function setDatos($nombre, $dni, $celular, $correo, $categoria, $detall, $monto, $descripcion, $pedido, $detalle, $fecha,$id)
    {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->celular = $celular;
        $this->correo = $correo;
        $this->categoria = $categoria;
        $this->detall = $detall;
        $this->monto = $monto;
        $this->descripcion = $descripcion;
        $this->pedido = $pedido;
        $this->detalle = $detalle;
        $this->fechaReclamo = $fecha;
        $this->id = $id;
    }

    function Header()
    {
        
        $this->Rect(10, 9, 190, 260, 'B','D');
        $this->Image('../assets/img/logo.png', 15, 10, 23);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(190, 10, 'CAFE247', 0, 0, 'C');
        $this->Ln(6);
        $this->Cell(190, 10, 'Ruc: 20611314877', 0, 0, 'C');
        $this->Ln(6);
        $this->Cell(190, 10, utf8_decode('Av. José Abelardo Quiñonez N°1010, San Juan'), 0, 0, 'C');
        $this->Ln(4);
    }

    function ConstanciaReclamacion()
    {
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(190, 10, 'CONSTANCIA DE RECLAMO', 1, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(95, 20, utf8_decode('RECLAMO WEB-001-') . str_pad($this->id, 3, '0', STR_PAD_LEFT), 1, 0, 'C');
        $this->Cell(95, 10, 'FECHA DEL RECLAMO:', 1, 1, 'S');
        $this->SetX($this->GetX() + 95);
        $this->Cell(95, 10, $this->fechaReclamo, 1, 0, 'S');
        $this->Ln(10);
        
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(190, 10,utf8_decode( '1. IDENTIFICACIÓN DEL CONSUMIDOR RECLAMANTE'), 1, 1, 'S');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(30, 10, 'NOMBRE:', 'LTRB', 0);
        $this->Cell(160, 10, utf8_decode(strtoupper($this->nombre)), 'LTRB', 1);
        $this->Cell(30, 10, 'DNI: '. $this->dni, 'LTRB', 0);
        $this->Cell(160, 10, 'CORREO: '. utf8_decode(strtoupper($this->correo)), 'LTRB', 1);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(190, 10,utf8_decode( '2. IDENTIFICACIÓN DEL BIEN CONTRATADO'), 1, 1, 'S');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(45, 10, 'PRODUCTO:   ' . ($this->categoria == 1 ? 'X' : ''), 'LTRB', 0);
        $this->Cell(45, 10, 'SERVICIO:   ' .($this->categoria == 2 ? 'X' : ''), 'LTRB', 0);
        $this->Cell(100, 10, 'MONTO RECLAMADO:  ' .$this->monto, 'LTRB', 1);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(190, 10,utf8_decode( '3. DETALLE DE LA RECLAMACIÓN Y PEDIDO DEL CONSUMIDOR'), 1, 1, 'S');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(30, 10, 'RECLAMO:   '. ($this->detall == 1 ? 'X' : ''), 'LTRB', 0);
        $this->Cell(30, 10, 'QUEJA: ' . ($this->detall == 2 ? 'X' : ''),'LTRB', 0);
        $this->Cell(130, 10, 'DESCRIPCION:  ' . utf8_decode(strtoupper($this->descripcion)), 'LTRB', 1);
        $this->Cell(190, 10, 'DETALLE Y PEDIDO:', 0,1);
        $this->MultiCell(190, 5, utf8_decode($this->pedido), 0,1);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(190, 10,utf8_decode( '4. OBSERVACIONES Y ACCIONES ADOPTADAS POR EL PROVEEDOR'), 1, 1, 'S');
        $this->SetFont('Arial', 'B', 9);
        $this->MultiCell(190, 5, utf8_decode($this->detalle), 1,0);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(45, 10, 'FECHA DE LA RESPUESTA:', 'LTRB', 0);
        $fechamas = strtotime('+15 day', strtotime($this->fechaReclamo));
        $fechaModificada = date('d/m/Y', $fechamas);
        $this->Cell(145, 10, $fechaModificada, 'LTRB', 1);
        

        $this->Ln(40);
        $this->Cell(0, 10, 'Firma del Cliente: ____________________________', 0, 1, 'C');
        $this->Ln(10);
        
        $this->SetY(-45);
        $this->MultiCell(80, 5, 'RECLAMO: Disconformidad relacionada a los productos o servicios', 'LTRB', 0);
        $this->SetXY($this->GetX() + 80, $this->GetY() - 10);
        $this->MultiCell(110, 5, utf8_decode('QUEJA: Disconformidad no relacionada a los productos o servicios. Malestar o descontento respecto a la atención al público.'), 'LTRB', 0);
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
    }
    
}

$pdf = new PDF();
$pdf->AddPage();
$nombre = htmlspecialchars($_POST['name']);
$dni = htmlspecialchars($_POST['dni']);
$celular = htmlspecialchars($_POST['celular']);
$correo = htmlspecialchars($_POST['email']);
$categoria = intval($_POST['categoria']);
$detall = intval($_POST['detal']);
$monto = doubleval($_POST['monto']);
$descripcion = htmlspecialchars($_POST['description']);
$pedido = htmlspecialchars($_POST['solicitud']);
$detalle = htmlspecialchars($_POST['detalle']);
$fecha = date('Y-m-d');

$pdf->setDatos($nombre, $dni, $celular, $correo, $categoria, $detall, $monto, $descripcion, $pedido, $detalle, $fecha, $ultimoId);
$pdf->ConstanciaReclamacion();
$pdfPath = 'FPDF/reportes/Constacia de Rlacamo '. urlencode(utf8_decode($nombre)) .'.pdf'; 
$pdf->Output($pdfPath, 'F');
$lastInsertId = $stmt->insert_id;
$updateQuery = "UPDATE consumidor SET pdf_path = ? WHERE c_correo = ? AND c_id = $lastInsertId";
$updateStmt = $con->prepare($updateQuery);
$updateStmt->bind_param("ss", $pdfPath, $correo);
$updateStmt->execute();
$updateStmt->close();
} else {
    $response['message'] = 'Errores: ' . $stmt->error;
}
$stmt->close();
$con->close();

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
    $mail->setFrom('soporte.ti@lacasadelasenchiladas.pe', 'CAFE247');
    $mail->addAddress("$correo");     //Add a recipient
    $mail->addAddress('reclamos@cafe247.pe');               //Name is optional
    //$mail->addReplyTo('xtremo.abril9@gmail.com', 'RECLAMO LCDLE');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'CONSTANCIA DE RECLAMO CAFE247';
    $mail->Body    = utf8_decode('Hola ' . strtoupper($nombre) . '
    Te adjuntamos la constancia de tu reclamo realizado en nuestra web. Recuerda que el plazo de respuesta es de 15 días hábiles. Para cualquier consulta,
    estamos a tu disposición a través de nuestros diferentes canales de atención.');
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->addAttachment($pdfPath);
    $mail->send();
    echo 'ENVIADO CORRECTAMENTE';
} catch (Exception $e) {
    echo "ERROR AL ENVIAR: {$mail->ErrorInfo}";
}
// Cierra la conexión y la sentencia


// Devuelve el resultado como JSON
echo json_encode($response);
?>
