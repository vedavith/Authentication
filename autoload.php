<?php 
namespace Encryption\AutoLoad
{
        spl_autoload_register(function () {
            //include 'Index.php';
            include 'Encrypt.php';
        });
}
?>