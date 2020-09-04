<?php
include("conexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$consulta = $pdo->prepare("SELECT * FROM usuarios WHERE usr_email = :email");
$consulta->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
$consulta->execute();
$consulta->execute();
$numRev = $consulta->rowCount();
$res = $consulta->fetch(PDO::FETCH_ASSOC);

if ($numRev == 0) {
    header("Location:recordar-clave.php?error=1");
    exit();
}

$claveNueva = rand(10000, 99999);

$sql = "UPDATE usuarios SET usr_clave = SHA1(:claveNueva) WHERE usr_id = :idR";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':claveNueva', $claveNueva, PDO::PARAM_STR);
$stmt->execute();


$fin =  '<html><body style="background-color:#E6E6E6;">';
$fin .= '
					<center>
						<p align="center"><img src="https://revistaprioridades.com/admin/img/logoprio.jpeg" width="100"></p>
						<div style="font-family:arial; background:#FFF; width:600px; color:#000; text-align:justify; padding:15px; border-radius:10px;">
							Saludos!<br>
                            ' . strtoupper($res['usr_nombres']) . ', su nueva clave de acceso es: <b>'.$claveNueva.'</b>.<br>
                            Importante cambiarla una vez ingrese por su seguridad.
							
							
							<p align="center" style="color:#399;">
								¡Que tengas un excelente d&iacute;a!<br>
								<a href="https://revistaprioridades.com">www.revistaprioridades.com</a>
							</p>
						</div>
					</center>
					<p>&nbsp;</p>
				';
$fin .= '';
$fin .=  '</body></html>';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'a2plcpnl0884.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'notify@revistaprioridades.com';                     // SMTP username
    $mail->Password   = 'notify2020$';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('notify@revistaprioridades.com', 'Revista prioridades');
    $mail->addAddress($res['usr_email'], $res['usr_nombres']);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Revista prioridades - Validación de correo';
    $mail->Body = $fin;
    $mail->CharSet = 'UTF-8';

    $mail->send();
    //echo 'Cuenta creada';
} catch (Exception $e) {
    $this->throwError(NOT_SEND_EMAIL, $mail->ErrorInfo);
    //echo "Error: {$mail->ErrorInfo}";
}


header("Location:recordar-clave.php?msg=1");
