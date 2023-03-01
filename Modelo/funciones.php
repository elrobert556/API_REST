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
    function listados($consulta_primaria,$consulta_foranea)
    {
        $datos = "";
        $datos_primaria = $this->Ejecutar_Instruccion($consulta_primaria);
        $datos_foranea = $this->Ejecutar_Instruccion($consulta_foranea);
        
        $selected = "";
        foreach ($datos_primaria as $renglon) 
        {
            if ($datos_foranea[0][0]==$renglon[0]) 
            {
                $selected = "Selected";
            }
            else
            {
                $selected = "";
            }
            $datos=$datos.'<option value="'.$renglon[0].'" '.$selected.'>'.$renglon[1].'</option>';
        }
        return $datos;
    }
}
?>