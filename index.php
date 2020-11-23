<?php
//ATIVA O LOG DO PHP PARA DEPURAÇÃO
ini_set('display_errors', 0);
ini_set('log_errors', 0);
#ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
#error_reporting(E_ALL); 


define('PATH_BASE', dirname(__FILE__) );

define( 'DS', DIRECTORY_SEPARATOR );



require_once (PATH_BASE .DS.'includes'.DS.'requires.php' );

while(list($campo, $valor) = each($_REQUEST)) {
    $valores[$campo] = $valor;
}
$valores['file'] = $_FILES;


$boot = new boot($valores);
$boot->load();



?>
