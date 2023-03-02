<?php
//Indica si los recursos de la respuesta pueden ser compartidos con el origen dado
header("Access-Control-Allow-Origin: *");

require '../Modelo/funciones.php';
$usuario = new usuarios();

//Si obtiene el dato de la URL entrara dentro del if
if ($_GET['moneda']) {
    //Deposita el parametro enviado desde la URL en una variable
    $id = $_GET['moneda'];
    //En caso de que la variable sea un numero ejecutara la instruccion sql
    if (is_numeric($id)) {
        //Selecciono el ultimo id de la tabla usuario para un if posterior
        $num = $usuario->ultimo_id();
        //Con el foreach guardo el resultado de la instruccion sql en una variable normal
        foreach($num as $renglon){ $id_usua = $renglon[0]; }
        //Convierto el parametro enviado en un integer
        $id = (int)$id;
        /*Escribo una condicion en la cual si el parametro enviado por la URL es mayor al id del ultimo registro de la tabla 'usuarios' escriba que el dato no existe*/
        if ($id > $id_usua) {
            echo 'El dato que ingreso no existe';
        }else{
            $moneda = $usuario->buscar_usuario($id);
            echo json_encode($moneda);
        }
    }else{
        //Este mensaje se mostrara si el dato no es numerico
        echo 'El dato que ingreso es incorrecto';
    } 
}

?>