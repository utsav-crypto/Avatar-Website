<?php
namespace core\Exceptions;
class _404_NOT_FOUND extends \Exception{
     public function errorMessage(){
          echo "<center><h1>404 Not Found</h1></center>";
          exit;
     }
}