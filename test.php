<?php
$secret="6LecyDIUAAAAAOLTyOiM02CxRmgd3jMIp9nJNFdD";
$response= 'ceruasfs';

$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success=json_decode($verify);
var_dump($captcha_success);
