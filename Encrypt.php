<?php 
namespace Encryption\CryptoLogic
{
    class Encrypt
    {
        private string $set_hash_string;
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
            return base64_encode($userName);
        }

        private function decrypt($userKey)
        {
            return base64_decode($userKey);
        }
    }
}  
?>