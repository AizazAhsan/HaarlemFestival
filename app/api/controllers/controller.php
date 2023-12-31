<?php



use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

require_once __DIR__ . '/../../vendor/autoload.php';



class controller
{
    function checkForJwt() {
         // Check for token header
         if(!isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $this->respondWithError(401, "No token provided");
            return;
        }

        // Read JWT from header
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
        // Strip the part "Bearer " from the header
        $arr = explode(" ", $authHeader);
        $jwt = $arr[1];


        // Decode JWT

        $secret_key = 'secret123!';

        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
                // username is now found in
                // echo $decoded->data->username;
                return $decoded;
            } catch (Exception $e) {
                $this->respondWithError(401, $e->getMessage());
                return;
            }
        }
    }

    function respond($data)
    {
        $this->respondWithCode(200, $data);
    }

    function respondWithError($httpcode, $message)
    {
        $data = array('errorMessage' => $message);
        $this->respondWithCode($httpcode, $data);
    }

    private function respondWithCode($httpcode, $data)
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($httpcode);
        echo json_encode($data);
    }

    function createObjectFromPostedJson($className)
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $object = new $className();
        foreach ($data as $key => $value) {
            if(is_object($value)) {
                continue;
            }
            $object->{$key} = $value;
        }
        return $object;
    }

    function checkForGuidToken(){
        require_once __DIR__ . '/../../service/apiKeyService.php';
        if(!isset($_SERVER['HTTP_GUID'])) {
            $this->respondWithError(401, "No token provided");
            return;
        }
        $guid = $_SERVER['HTTP_GUID'];
        $apiKeyService = new apiKeyService();
        $result = $apiKeyService->checkApiKey($guid);
        if($result) {
            return true;
        } else {
            $this->respondWithError(401, "Invalid token");
            return;
        }


    }
}
