<?php
require 'conexion_bd.php';
class usuarios extends BD_PDO{
    function ultimo_id(){
        $num = $this->Ejecutar_Instruccion("SELECT id FROM usuarios ORDER BY id DESC LIMIT 1");
        return $num;
    }
    function buscar_usuario($id){
        $moneda = $this->Ejecutar_Instruccion("SELECT *FROM usuarios WHERE ID =$id");
        return $moneda;
    }
    function tabla_usuarios($moneda){
        $tabla="";
        foreach ($moneda as $renglon)
        {
            $tabla.='<table border="colspan">';
            $tabla.='<tr>';
            $tabla.='<td>ID</td>';
            $tabla.='<td>Correo</td>';
            $tabla.='<td>Token</td>';
            $tabla.='<td>Salt</td>';
            $tabla.='<td>User_password</td>';
            $tabla.='<td>Estado</td>';
            $tabla.='<td>Privilegio</td>';
            $tabla.='<tr>';
            $tabla.='<tr>';
            $tabla.='<td>'.$renglon[0].'</td>';
            $tabla.='<td>'.$renglon[1].'</td>';
            $tabla.='<td>'.$renglon[2].'</td>';
            $tabla.='<td>'.$renglon[3].'</td>';
            $tabla.='<td>'.$renglon[4].'</td>';
            $tabla.='<td>'.$renglon[5].'</td>';
            $tabla.='<td>'.$renglon[6].'</td>';
            $tabla.='<tr>';
            $tabla.='</table>';
        }
        return $tabla;
    }
}
?>