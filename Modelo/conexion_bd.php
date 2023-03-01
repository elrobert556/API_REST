<?php

class BD_PDO
{
	function Ejecutar_Instruccion($instruccion_sql)
	{
		/*Se declara el nombre del host, el usuario, la contraseña y el nombre de la base de datos 
		para poder iniciar la conexion*/
		$host = "localhost";
		$usr  = "root";
		$pwd  = "";
		$db   = "api_rest";

		//Intenta hacer la conexion con las variables antes declaradas
		try {
				$conexion = new PDO("mysql:host=$host;dbname=$db;",$usr,$pwd);
		       //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		//En caso de no encontrar la base de datos 
		catch(PDOException $e)
			{
		      echo "Failed to get DB handle: " . $e->getMessage();
		      exit;    
		    }
		 
		 // Asignando una instruccion sql

		 $query=$conexion->prepare($instruccion_sql);
		if(!$query)
		{
			return "Error al mostrar";
		}
		else
		{
			$query->execute();
			while ($result = $query->fetch())
			    {
			        $rows[] = $result;
			    }	
		}
		return $rows;
	}
}