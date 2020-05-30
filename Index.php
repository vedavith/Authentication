<?php 
//TODO: Generate an algorith that accepts a string genetate a encrypted string and authenticate user depending on that string0
include 'autoload.php';
use Encryption\CryptoLogic\Encrypt as Crypt;
class Index extends Crypt
{
    private static $instance;
    private string $user_name;
    private string $user_key;
    private string $token;
    private function __construct()
    {
       //*Heavy Lifting goes here 
        parent::__construct();
    }
    public static function getInstance()
    {
        if ( is_null( self::$instance ) )
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function main($hash_string,$crypt_procedure)
    {
        if($crypt_procedure)
        {
            $this->user_name = $hash_string;
            echo $this->cryptUserName($this->user_name,$crypt_procedure);
        }
        else
        {
            $this->user_key = $hash_string;
            echo $this->cryptUserName($this->user_key,$crypt_procedure);
        }
    }
    
    private function cryptUserName($hash_string,$crypt_procedure)
    {
        return $this->CryptMain($hash_string,$crypt_procedure);
    }

}

$index_object = Index::getInstance();
$index_object->main("hello",1); 
$index_object->main("hello",0);
?>