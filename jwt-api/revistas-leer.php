<?php 
require_once('./dbconnect.php');
require_once('./rest.php');
require_once('./api.php');
require_once('./jwt.php');

class RevistaPdf extends Api{

    public function getParameters(){
       
        $idRevista = $_GET["idRevista"];
        $this->getMagazinePdfByID($idRevista);

    }

    
    public function getMagazinePdfByID($idRevista){

        try{
            $token = $this->getBearerToken();
            $payload = JWT::decode($token, SECRETE_KEY,['HS256']);
            
           $db = $this->getDbInstance();

           $userId = $this-> getUserIDFromToken($token);

            $consultaUsr = $db->prepare("SELECT * FROM usuarios WHERE usr_id='".$userId."'");
            $consultaUsr->execute();
            $num = $consultaUsr->rowCount();
            $usr = $consultaUsr->fetch();

            if($num == 0){
                $this->throwError(USER_NOT_EXIST, 'El usuarios no existe.');
            }

            if($usr['usr_suscripcion'] == 0){
                $this->throwError(SUSCRIPTION_DISABLED, 'El usuarios no tiene suscripción activa.');
            }

            $arreglo = array();

            $consulta = $db->prepare("SELECT rev_id AS id, CONCAT('https://revistaprioridades.com/admin/revistas/', rev_archivo) AS pdf FROM revistas
            WHERE rev_id='".$idRevista."'
            ");
            $consulta->execute();
            $numRev = $consulta->rowCount();
            $res = $consulta->fetch(PDO::FETCH_ASSOC);

            if($numRev == 0){
                $this->throwError(MAGAZINE_NOT_EXIST, 'La revista no existe.');
            }

            $arreglo['Magazine'] = $res;
         

           


            $this->returnResponse(SUCCESS_RESPONSE, $arreglo);

             
        } catch(Exception $e){
            $this->throwError(ACCESS_TOKEN_ERRORS, $e->getMessage());
        }
    }

}

$revistas = new RevistaPdf;

$revistas->getParameters();

?>