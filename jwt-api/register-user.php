<?php 
require_once('./dbconnect.php');
require_once('./rest.php');
require_once('./api.php');
require_once('./jwt.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

class RegisterUser extends Api{

        

    public function getParameters(){
       
        $apellidos = $_GET["apellidos"];
        $nombres = $_GET["nombres"];
        $email = $_GET["email"];
        $pais = $_GET["pais"];
        $ciudad = $_GET["ciudad"];
        $clave = $_GET["clave"];
        $telefono = $_GET["telefono"];

        $this->registerUserInfo($apellidos, $nombres, $email, $pais, $ciudad, $clave, $telefono);


    }


    public function validarCampos($apellidos, $nombres, $email, $pais, $ciudad, $clave, $telefono){
        if($apellidos == "" || $nombres == "" || $email == "" || $pais == "" || $ciudad == "" || $clave == "" || $telefono == ""){
            $this->throwError(REQUIRED_FIELD, "Faltan campos requeridos por llenar.");
        }

        $this->registerUserInfo($apellidos, $nombres, $email, $pais, $ciudad, $clave, $telefono);
    }

    public function validarUsuarioExistente($email){
        $db = $this->getDbInstance();

        $consultaUsr = $db->prepare("SELECT * FROM usuarios WHERE usr_email='".$email."'");
        $consultaUsr->execute();
        $num = $consultaUsr->rowCount();

        if($num > 0){
            $this->throwError(USER_EXIST, 'Este usuario ya está registrado en nuestra base de datos.');
        }
    }

    
    public function registerUserInfo($apellidos, $nombres, $email, $pais, $ciudad, $clave, $telefono){

        try{ 
            
           $this->validarUsuarioExistente($email);
            
           $db = $this->getDbInstance();

            $consulta = $db->prepare("INSERT INTO usuarios(usr_email, usr_clave, usr_apellidos, usr_nombres, usr_tipo, usr_suscripcion, usr_pais, usr_ciudad) 
            VALUES('".$email."', SHA1('".$clave."'), '".$apellidos."', '".$nombres."', 2, 0, '".$pais."', '".$ciudad."') ");
            $consulta->execute();

            $newId = $db->lastInsertId();

            $this->sendEmailConfirmation($email, $nombres, $newId);
            
            $this->returnResponse(SUCCESS_RESPONSE, "El usuario fue registrado con éxito.");
             
        } catch(Exception $e){
            $this->throwError(ERROR_USER_REGISTER, $e->getMessage());
        }
    }

    
    public function sendEmailConfirmation($email, $nombres, $id){


		$fin =  '<html><body style="background-color:#E6E6E6;">';
		$fin .= '
					<center>
						<p align="center"><img src="https://revistaprioridades.com/admin/img/logoprio.jpeg" width="100"></p>
						<div style="font-family:arial; background:#FFF; width:600px; color:#000; text-align:justify; padding:15px; border-radius:10px;">
							Saludos!<br>
							'.strtoupper($nombres).', se ha registrado correctamente. A continuación le pedidos dar click en el siguiente enlace para validar su correo:
						
						    <p><a href="https://revistaprioridades.com/validar-correo.php?id='.$id.'">VALIDAR MI CORREO</a></p>
							
							
							<p align="center" style="color:#399;">
								¡Que tengas un excelente d&iacute;a!<br>
								<a href="https://revistaprioridades.com">www.revistaprioridades.com</a>
							</p>
						</div>
					</center>
					<p>&nbsp;</p>
				';	
		$fin .='';						
		$fin .=  '</body></html>';

		// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);
			echo '<div style="display:none;">';
				try {
					//Server settings
					$mail->SMTPDebug = 2;                                       // Enable verbose debug output
					$mail->isSMTP();                                            // Set mailer to use SMTP
					$mail->Host       = 'mail.revistaprioridades.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
					$mail->Username   = 'notify@revistaprioridades.com';                     // SMTP username
					$mail->Password   = 'notify2020$';                               // SMTP password
					$mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
					$mail->Port       = 465;                                    // TCP port to connect to

					//Recipients
					$mail->setFrom('notify@revistaprioridades.com', 'Registro exitoso.');
					$mail->addAddress($email, $nombres);     // Add a recipient


					// Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'Revista prioridades - Validación de correo';
					$mail->Body = $fin;
					$mail->CharSet = 'UTF-8';

					$mail->send();
					echo 'Cuenta creada';
				} catch (Exception $e) {echo "Error: {$mail->ErrorInfo}";}
			echo '</div>';

    }


}



$revistas = new RegisterUser;

$revistas->getParameters();

?>