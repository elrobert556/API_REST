<?php

#Muestra posibles errores
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "C:/xampp/htdocs/API_REST/php_error_log");

require 'Controlador/ruta.php';

$index = new ruta();
$index ->index();

?>