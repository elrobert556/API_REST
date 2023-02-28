<?php

require 'Modelo/conexion_bd.php';

$obj = new BD_PDO();

$usuarios = $obj->Ejecutar_Instruccion("SELECT *FROM usuarios");

require 'Vista/vista.php';

?>