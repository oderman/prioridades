<?php 

require_once('./dbconnect.php');

require_once('./rest.php');

require_once('./api.php');

require_once('./jwt.php');



class ActivateUser extends Api{



    public function getParameters(){

        $this->activarUsuario();
    }

    public function activarUsuario(){


        try{

            $token = $this->getBearerToken();

            $payload = JWT::decode($token, SECRETE_KEY,['HS256']);



            $db = $this->getDbInstance();

            $userId = $this-> getUserIDFromToken($token);





            $val = $db->prepare("UPDATE usuarios SET usr_suscripcion = 1 WHERE usr_id = :userid");

            $val->bindParam(":userid", $userId);

            $val->execute();

            $userVal = $val->fetch(PDO::FETCH_ASSOC);



            //Validar si el token es igual al de la BD

            if($userVal['usr_token_actual'] != $token){

                $this->throwError(USER_ALREADY_LOGUED, 'El usuario ya está logueado en otro dispositivo.');

            }

            



            $arreglo = array();



            $consulta = $db->prepare("SELECT usr_id AS id, usr_email AS email, usr_apellidos AS apellidos, usr_nombres AS nombres, usr_telefono AS telefono, usr_pais AS pais, usr_ciudad AS ciudad, usr_fecha_vencimiento AS fecha_fin FROM usuarios

            WHERE usr_id='".$userId."'

            ");

            $consulta->execute();

            $numRev = $consulta->rowCount();

            $res = $consulta->fetch(PDO::FETCH_ASSOC);



            if($numRev == 0){

                $this->throwError(MAGAZINE_NOT_EXIST, 'El usuario no existe.');

            }



            $arreglo['User'] = $res;

         



            $this->returnResponse(SUCCESS_RESPONSE, $arreglo);



             

        } catch(Exception $e){

            $this->throwError(ACCESS_TOKEN_ERRORS, $e->getMessage());

        }

    }



}



$activarUsuario = new ActivateUser;



$activarUsuario->getParameters();



?>