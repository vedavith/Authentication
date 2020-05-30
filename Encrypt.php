<?php 
namespace Encryption\CryptoLogic
{
    class Encrypt
    {
        private string $set_hash_string;
        private array $hash;
        public function __construct()
        {
        
        }

        public function CryptMain($input,$crypt_flag)
        {
            $this->set_hash_string = $input;
            if($crypt_flag)
            {
                return $this->encrypt($input);
            }
            else
            {
                return $this->decrypt($input);
            }
        }

        private function encrypt($userName)
        {
            //return base64_encode($userName);
            $password_salt = $this->passwordSalt($userName);
            $password_hashed = password_hash($password_salt, PASSWORD_ARGON2ID);
            $_SESSION['password'] = base64_encode($password_hashed);
        }

        private function decrypt($userName)
        {
            $password_salt = $this->passwordSalt($userName);
            if(password_verify($password_salt,base64_decode($_SESSION['password'])))
            {
               $response_array =  array(
                   'authentication' => true,
                   "token" => array(
                       "username" => $userName,
                       "authToken" => uniqid()
                       ) 
                );

                echo json_encode($response_array);
            }
            else
            {
               $response_array = array(
                   "authentication" => false
               );
            }
        }

        private function passwordSalt($userName)
        {
            $split_string = str_split($userName);
            $count = 0;
            foreach($split_string as $key => $value)
            {
                $this->hash[$count] = base64_encode(ord($value));
                $count++;
            }
            $salt = implode("",$this->hash);
            return hash_hmac('SHA256',$userName,$salt);
        }
    }
}  
?>