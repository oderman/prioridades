<?php 
require_once('./dbconnect.php');
require_once('./rest.php');
require_once('./api.php');
require_once('./jwt.php');

class UserInformation extends Api{

    public function getParameters(){
       
        $this->getUserInformation();

    }

    
    public function getUserInformation(){

        try{
            $token = $this->getBearerToken();
            $payload = JWT::decode($token, SECRETE_KEY,['HS256']);
            
           $db = $this->getDbInstance();

           $userId = $this-> getUserIDFromToken($token);


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

$revistas = new UserInformation;

$revistas->getParameters();

?>