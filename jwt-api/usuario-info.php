<?php 

require_once('./DbConnect.php');

require_once('./rest.php');

require_once('./api.php');

require_once('./jwt.php');



class UsuarioInfo extends Api{



    public function getParameters(){

       

        $idUsuario = $_GET["idUsuario"];

        $this->getUsuarioByID($idUsuario);



    }



    

    public function getUsuarioByID($idUsuario){



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




            $arreglo = array();



            $consulta = $db->prepare("SELECT usr_email AS email, usr_apellidos AS apellidos, usr_nombres AS nombres FROM usuarios

            WHERE rev_id='".$userId."'

            ");

            $consulta->execute();

            $res = $consulta->fetch(PDO::FETCH_ASSOC);



            $arreglo['Info'] = $res;

         

            $this->returnResponse(SUCCESS_RESPONSE, $arreglo);



             

        } catch(Exception $e){

            $this->throwError(ACCESS_TOKEN_ERRORS, $e->getMessage());

        }

    }



}



$revistas = new UsuarioInfo;



$revistas->getParameters();



?>