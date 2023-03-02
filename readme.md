# API RESTFUL
### ¿Como llamar a la API_RESTFUL?
Para llamar a la API_RESTFUL es tan simple como poner la siguiente URL en una peticion de tipo GET en Thunder Client: localhost/API_REST/tu-id (Esto es suponiendo que se ha clonado este repositorio).
En la parte que dice 'tu-id' deberas ingresar el id del usuario que deseas ver.  
Ejemplo: "localhost/API_REST/1" daria el siguiente resultado.
```json
[
  {  
    "0": 1,  
    "1": "joel@gmail.com",  
    "2": "token",  
    "3": "salt",  
    "4": "password",  
    "5": "Activo",  
    "6": "Admin",  
    "id": 1,  
    "correo": "joel@gmail.com",  
    "token": "token",  
    "salt": "salt",  
    "user_password": "password",  
    "estado_usuario": "Activo",  
    "privilegio": "Admin"  
  }  
]  
  ```
Como se menciono al principio de la documentacion, el unico camnpo que se debera ingresar es el id del usuario deseado. Este dato se escribe despues de la carpeta **API_RESTFUL** con un **/** al antes del id.    

A continuacion documentare el codigo detallando que hace cada linea.
  ### Controlador/datos.php
  ```php
  <?php
//Indica si los recursos de la respuesta pueden ser compartidos con el origen dado.
header("Access-Control-Allow-Origin: *");

require '../Modelo/funciones.php';
$usuario = new usuarios();

//Si obtiene el dato de la URL entrara dentro del if.
if ($_GET['moneda']) {
    //Deposita el parametro enviado desde la URL en una variable.
    $id = $_GET['moneda'];
    //En caso de que la variable sea un numero ejecutara la instruccion sql.
    if (is_numeric($id)) {
        //Selecciono el ultimo id de la tabla usuario para un if posterior.
        $num = $usuario->ultimo_id();
        //Con el foreach guardo el resultado de la instruccion sql en una variable normal.
        foreach($num as $renglon){ $id_usua = $renglon[0]; }
        //Convierto el parametro enviado en un integer.
        $id = (int)$id;
        //Escribo una condicion en la cual si el parametro enviado por la URL es mayor al id del ultimo registro de la tabla 'usuarios' escriba que el dato no existe.
        if ($id > $id_usua) {
            echo 'El dato que ingreso no existe';
        }else{
            $moneda = $usuario->buscar_usuario($id);
            echo json_encode($moneda);
        }
    }else{
        //Este mensaje se mostrara si el dato no es numerico.
        echo 'El dato que ingreso es incorrecto';
    } 
}

?>
```
### Modelo/funciones.php
```php
<?php
require 'conexion_bd.php';
class usuarios extends BD_PDO{
    //Esta funcion se manda a llamar desde '../Controlador/datos.php' para saber el ultimo id registrado en la tabla 'usuarios'. Esto sirve para validar el parametero que se envia por la URL.
    function ultimo_id(){
        $num = $this->Ejecutar_Instruccion("SELECT id FROM usuarios ORDER BY id DESC LIMIT 1");
        return $num;
    }
    //Esta funcion se manda a llamar desde ../Controlador/datos.php' para traer un usuario con el id especificado por medio de la URL.
    function buscar_usuario($id){
        $moneda = $this->Ejecutar_Instruccion("SELECT *FROM usuarios WHERE ID =$id");
        return $moneda;
    }
}
?>
```
### Modelo/conexion_bd.php
```php
<?php

class BD_PDO
{
	function Ejecutar_Instruccion($instruccion_sql)
	{
		//Se declara el nombre del host, el usuario, la contraseña y el nombre de la base de datos para poder iniciar la conexion.
		$host = "localhost";
		$usr  = "root";
		$pwd  = "";
		$db   = "api_rest";

		//Intenta hacer la conexion con las variables antes declaradas.
		try {
				$conexion = new PDO("mysql:host=$host;dbname=$db;",$usr,$pwd);
		       //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		//En caso de no encontrar la base de datos.
		catch(PDOException $e)
			{
		      echo "Failed to get DB handle: " . $e->getMessage();
		      exit;    
		    }
		 
		 // Asignando una instruccion sql.

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
```
