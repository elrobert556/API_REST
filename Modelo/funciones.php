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
}
?>