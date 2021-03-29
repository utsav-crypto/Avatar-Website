<?php
namespace lib;
use core\rout\handlerRout;
use core\rout\Request;
use core\rout\interfaces\IRequest;
class App{
     function __construct(){

     }
     function captureRequest(){
          return new Request;
     }
     function handle(IRequest $request){
          Rout::$ptr = new handlerRout($request); 
          require_once(ROOT."routes/web.php");
     }
     function __destruct(){
          Rout::resolve();
     }
}
$app = new App;
 ?>
