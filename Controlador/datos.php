<?php

header("Access-Control-Allow-Origin: *");

require '../Modelo/funciones.php';
$usuario = new usuarios();

if ($_GET['moneda']) {
    $id = $_GET['moneda'];
    if (is_numeric($id)) {
        $num = $usuario->ultimo_id();
        foreach($num as $renglon){ $id_usua = $renglon[0]; }
        $id = (int)$id;
        if ($id > $id_usua) {
            echo 'El dato que ingreso no existe';
        }else{
            $moneda = $usuario->buscar_usuario($id);
            echo json_encode($moneda);
        }
    }else{
        echo 'El dato que ingreso es incorrecto';
    } 
}

?>