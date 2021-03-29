<?php
include_once('../st-core/vendor/autoload.php');
set_time_limit(10);
//$_SESSION['username'] = "narendra

require_once("../st-core/lib/App.php");
$request = $app->captureRequest();
$app->handle($request);
exit();
