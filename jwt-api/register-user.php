<?php 
require_once('./dbconnect.php');
require_once('./rest.php');
require_once('./api.php');
require_once('./jwt.php');

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

    
    public function registerUserInfo($apellidos, $nombres, $email, $pais, $ciudad, $clave, $telefono){

        try{    
            
           $db = $this->getDbInstance();

            $consulta = $db->prepare("INSERT INTO usuarios(usr_email, usr_clave, usr_apellidos, usr_nombres, usr_tipo, usr_suscripcion, usr_pais, usr_ciudad) 
            VALUES('".$email."', SHA1('".$clave."'), '".$apellidos."', '".$nombres."', 2, 0, '".$pais."', '".$ciudad."') ");
            $consulta->execute();

            $this->sendEmailConfirmation();
            
            $this->returnResponse(SUCCESS_RESPONSE, "El usuario fue registrado con éxito.");
             
        } catch(Exception $e){
            $this->throwError(ERROR_USER_REGISTER, $e->getMessage());
        }
    }

    
    public function sendEmailConfirmation(){

    }


}



$revistas = new RegisterUser;

$revistas->getParameters();

?>