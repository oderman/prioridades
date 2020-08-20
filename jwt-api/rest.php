<?php 
	require_once('constants.php');
	class Rest {
		protected $request;
		protected $serviceName;
		protected $param;
		protected $dbConn;
		protected $userId;

		public function __construct() {
			
			$handler = fopen('php://input','r');
			
			$this->request = stream_get_contents($handler);
			
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$this->validateRequest();
			}
			
		}

		Public function validateRequest() {

			if($_SERVER['CONTENT_TYPE'] !== 'application/json') {
				$this->throwError(REQUEST_CONTENTTYPE_NOT_VALID, 'Request content type is not valid');
			}

	
			$data = json_decode($this->request, true);

			
			$this->param = $data['param'];
		
			
		}

		public function validateParameter($fieldName, $value, $dataType, $required = true) {
			if($required == true && empty($value) == true) {
				$this->throwError(VALIDATE_PARAMETER_REQUIRED, $fieldName . " parameter is required.");
			}

			switch ($dataType) {
				case BOOLEAN:
					if(!is_bool($value)) {
						$this->throwError(VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be boolean.');
					}
					break;
				case INTEGER:
					if(!is_numeric($value)) {
						$this->throwError(VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be numeric.');
					}
					break;

				case STRING:
					if(!is_string($value)) {
						$this->throwError(VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be string.');
					}
					break;
				
				default:
					$this->throwError(VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName);
					break;
			}

			return $value;

		}

		public function validateToken() {
			
		}

	

		public function throwError($code, $message) {
			header("content-type: application/json");
	
			http_response_code($code);
			$errorMsg = json_encode(['error' => ['status'=>$code, 'message'=>$message]]);
			echo $errorMsg; exit;
		}

		public function returnResponse($code, $data) {
			header("content-type: application/json");
			http_response_code($code);
			$response = json_encode($data);
			echo $response; exit;
		}

		/**
	    * Get hearder Authorization
	    * */
	    public function getAuthorizationHeader(){
	        $headers = null;
	        if (isset($_SERVER['Authorization'])) {
	            $headers = trim($_SERVER["Authorization"]);
	        }
	        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
	            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
	        } elseif (function_exists('apache_request_headers')) {
	            $requestHeaders = apache_request_headers();
	            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
	            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
	            if (isset($requestHeaders['Authorization'])) {
	                $headers = trim($requestHeaders['Authorization']);
	            }
	        }
	        return $headers;
	    }
	    /**
	     * get access token from header
	     * */
	    public function getBearerToken() {
	        $headers = $this->getAuthorizationHeader();
	        // HEADER: Get the access token from the header
	        if (!empty($headers)) {
	            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
	                return $matches[1];
	            }
	        }
	        $this->throwError( ATHORIZATION_HEADER_NOT_FOUND, 'Access Token Not found');
	    }
	}
