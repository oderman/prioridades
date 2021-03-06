<?php 

	/*Security*/
	define('SECRETE_KEY', 'test123');
	
	/*Data Type*/
	define('BOOLEAN', 	'1');
	define('INTEGER', 	'2');
	define('STRING', 	'3');

	/*Error Codes*/
	define('REQUEST_METHOD_NOT_VALID',		        100);
	define('REQUEST_CONTENTTYPE_NOT_VALID',	        101);
	define('REQUEST_NOT_VALID', 			        102);
    define('VALIDATE_PARAMETER_REQUIRED', 			103);
	define('VALIDATE_PARAMETER_DATATYPE', 			104);
	define('API_NAME_REQUIRED', 					105);
	define('API_PARAM_REQUIRED', 					106);
	define('API_DOST_NOT_EXIST', 					107);
	define('INVALID_USER_PASS', 					401);
	define('USER_NOT_ACTIVE', 						401);

	define('SUCCESS_RESPONSE', 						200);

	/*Server Errors*/

	define('JWT_PROCESSING_ERROR',					300);
	define('ATHORIZATION_HEADER_NOT_FOUND',			301);
	define('ACCESS_TOKEN_ERRORS',					302);	

	define('SUSCRIPTION_DISABLED',					401);
	define('USER_NOT_EXIST',					    401);
	define('MAGAZINE_NOT_EXIST',					204);
	define('REQUIRED_FIELD',	  					306);
	define('ERROR_USER_REGISTER',  					307);
	define('USER_EXIST',						    703);
	define('NOT_SEND_EMAIL',					    309);	
	define('TOKEN_NO_SENT',					        701);	
	define('SUBSCRIPTION_NOT_ACTIVATED',		    700);	
	define('USER_NOT_REGISTERED',		    702);
	define('USER_ALREADY_LOGUED',		    703);	
?>