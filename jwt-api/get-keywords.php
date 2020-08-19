<?php 
require_once('./dbconnect.php');
require_once('./rest.php');
require_once('./api.php');
require_once('./jwt.php');

class KeyWorkds extends Api{

    
    public function getKeyWords(){

        try{    
            
           $db = $this->getDbInstance();

           $arreglo = array();

           $consulta = $db->prepare("SELECT rev_keywords AS names FROM revistas");
           $consulta->execute();
           $res = $consulta->fetchAll(PDO::FETCH_ASSOC);


           $kw = array();
           $todo = array();

           foreach($res as $datos){
                $arreglo['keywords'][] = $datos;

                $kw = explode(",", $datos['names']);
                
                //$todo .= implode(",",$kw);

            }

            
            foreach($res as $datos){
                $arraydivision[$datos['names']] = $datos['names'];
            }
          
            $todo = implode(",",$arraydivision);
           
           
        
           // echo $todo;
            //echo implode(",",$todo);// Use of implode function   

        $this->converToResult($todo);

            
        

           

             
        } catch(Exception $e){
            $this->throwError(ERROR_USER_REGISTER, $e->getMessage());
        }
    }


    function converToResult($text){

        $fin = explode(",", $text);

        $arregloFin = array();

        $tamano = count($fin);

        
        $data = array(
        
            "KeyWords" => array()
          );

        for($e = 0; $e<$tamano; $e++){

            $data['KeyWords'][] = array(
                'name' => $fin[$e]
              );
        }
        
        echo json_encode($data);

    

        //$arregloFin['kewywords']['name'] = $fin;

       

       // print_r($fin);


    }


}



$revistas = new KeyWorkds;

$revistas->getKeyWords();


?>