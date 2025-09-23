<?php
 class JwtManager
{
    private $secretKey;
    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }
    public function createToken($payload)
    {
        $base64UrlHeader = $this->base64UrlEncode(json_encode(["alg" => "HS256", "typ" => "JWT"]));
        $base64UrlPayload = $this->base64UrlEncode(json_encode($payload));
        $base64UrlSignature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $this->secretKey, true);
        $base64UrlSignature = $this->base64UrlEncode($base64UrlSignature);
        return $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;
    }

    private function base64UrlEncode($data)
    {
        $base64 = base64_encode($data);
        $base64Url = strtr($base64, '+/', '-_');
        return rtrim($base64Url, '=');
    }

    private function base64UrlDecode($data)
    {
        $base64 = strtr($data, '-_', '+/');
        $base64Padded = str_pad($base64, strlen($base64) % 4, '=', STR_PAD_RIGHT);
        return base64_decode($base64Padded);
    }

    public function validateToken($token)
    {
        // Implementation for validating JWT
        list($base64UrlHeader, $base64UrlPayload, $base64UrlSignature) = explode('.', $token);

        $signature = $this->base64UrlDecode($base64UrlSignature);
        $expectedSignature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $this->secretKey, true);

        return hash_equals($signature, $expectedSignature);
    }
}

/*

// Your secret key (keep this secure)
$secretKey = 'your_secret_key';
// Create an instance of JwtManager
$jwtManager = new JwtManager($secretKey);
// Create a JWT
$payload = [
    "user_id" => 123,
    "username" => "john_doe",
    "exp" => time() + 3600, // Token expiration time (1 hour)
];
$jwt = $jwtManager->createToken($payload);
echo "JWT Token: " . $jwt . PHP_EOL;
// Validate and decode the JWT
if ($jwtManager->validateToken($jwt)) {
    echo "JWT is valid." . PHP_EOL;
    $decodedPayload = $jwtManager->decodeToken($jwt);
    echo "Decoded Payload: " . json_encode($decodedPayload, JSON_PRETTY_PRINT);
} else {
    echo "JWT is invalid.";
}



function create(){
          // Your secret key (keep this secure)
          $secretKey = '1234';
          // Create an instance of JwtManager
          $jwt = new Jwt($secretKey);
          // Create a JWT
          $payload = [
              "user_id" => 123,
              "username" => "Abdur Rahman",
              "exp" => time() + 3600, // Token expiration time (1 hour)
          ];
  
          $token = $jwt->createToken($payload);
          echo "JWT Token: " . $token . PHP_EOL;
         
  
    }

    function valid0($token){
        $secretKey = '1234';
        $jwt = new Jwt($secretKey);
         // Validate and decode the JWT
         if ($jwt->validateToken($token)) {
            echo "JWT is valid." . PHP_EOL;
            $decodedPayload = $jwt->decodeToken($jwt);
            echo "Decoded Payload: " . json_encode($decodedPayload, JSON_PRETTY_PRINT);
        } else {
            echo "JWT is invalid.";
        }

    }
*/