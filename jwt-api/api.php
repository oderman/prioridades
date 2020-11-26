<?php 

	class Api extends Rest {
		
		public function __construct() {
			parent::__construct();
			$db  = new DbConnect;
			$this->dbConn = $db->connect();
		}

		

		public function generateToken() {
			$email = $this->validateParameter('email', $this->param['email'], STRING);
			$pass = $this->validateParameter('pass', $this->param['pass'], STRING);
		
		//	$email = $this->param['email'];
		//	$pass =  $this->param['pass'];
			try {
				$stmt = $this->dbConn->prepare("SELECT * FROM usuarios WHERE usr_email = :email AND usr_clave = SHA1(:pass)");
				$stmt->bindParam(":email", $email);
				$stmt->bindParam(":pass", $pass);
				$stmt->execute();
				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				if(!is_array($user)) {
				
					$this->throwError(INVALID_USER_PASS, "Email or Password is incorrect.");
				}

				if($user['usr_suscripcion'] == 0){
					$this->throwError(SUBSCRIPTION_NOT_ACTIVATED, 'El usuario no tiene suscripción activa. Si eres nuevo debes validar tu correo para activar la suscripción.');
				}

				$paylod = [
					'iat' => time(),
					'iss' => 'localhost',
					'exp' => time() + (1440*60),
					'userId' => $user['usr_id']
				];

				$token = JWT::encode($paylod, SECRETE_KEY);

				$insertToken = $this->dbConn->prepare("UPDATE usuarios SET usr_token_actual = :token WHERE usr_email = :email");
				$insertToken->bindParam(":token", $token);
				$insertToken->bindParam(":email", $email);
				$insertToken->execute();
				
				$data = ['token' => $token];
				$this->returnResponse(SUCCESS_RESPONSE, $data);
			} catch (Exception $e) {
			
				$this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
			}
		}


		public function getMagazines(){
			$magazineId = $this->validateParameter('magazineId', $this->param['magazineId'], STRING);
			echo $magazineId;

			try{
				$token = $this->getBearerToken();
				$payload = JWT::decode($token, SECRETE_KEY,['HS256']);
			 	print_r($payload);
			} catch(Exception $e){
				$this->throwError(ACCESS_TOKEN_ERRORS, $e->getMessage());
			}
		}

		protected function getDbInstance(){
			$db  = new DbConnect;
			return $db->connect();
		
		}

		protected function getUserIDFromToken($token){
			$tokenParts = explode(".", $token);  
			$tokenHeader = base64_decode($tokenParts[0]);
			$tokenPayload = base64_decode($tokenParts[1]);
			$jwtHeader = json_decode($tokenHeader);
			$jwtPayload = json_decode($tokenPayload);
			return $jwtPayload->userId;
		}
}
 ?>