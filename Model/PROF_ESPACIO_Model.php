
<?php

//Clase : PROF_ESPACIO_Modelo
//Creado el : 08-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------

class PROF_ESPACIO_Model {

	var $DNI;//dni del profesor
	var $codEspacio;//espacio de trabajo del profesor

	var $mysqli;//variable para conectar a la base de datos

//Constructor de la clase
//

function __construct($DNI,$CODESPACIO){
	$this->DNI = $DNI;
	$this->codEspacio = $CODESPACIO;
	$this->erroresdatos = array(); 

	//$this->Comprobar_atributos();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();//variable para conectar con la bd
}
// function Comprobar_atributos
// si todas las funciones de comprobacion de atributos individuales son true devuelve true
// si alguna es false, devuelve el array de errores de datos
function comprobar_atributos()
{//llamamos a las funciones de comprobacion
	$this->comprobar_DNI();
	$this->comprobar_codEspacio();
	
	if (empty($this->erroresdatos))//si esta vacio el array de errores todo esta correcto 
	{
		return true;
	}
	else
		{
			return $this->erroresdatos;//devolvemos el array de errores
		}
}
// function comprobar_DNI()
// Comprueba el formato del DNI 
//	alfanumerico
//	mayor  a 3
// 	menor  a 9
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_DNI()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $letras = explode(',','T,R,W,A,G,M,Y,F,P,D,X,B,N,J,Z,S,Q,V,H,L,C,K,E');//variable utilizada para comprobar la letra del dni
 $patron="/[0-9]{7,8}[A-Z]/";//establecemos el patron para realizar la comprobroacion de que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->DNI)){//comprobamos si el dni es vacio
		$nombrearray['nombreatributo']='DNI';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->DNI)>9){//comprobamos que la cadena no sea mayor de 9
		$nombrearray['nombreatributo']='DNI';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->DNI)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='DNI';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->DNI)){//comprobamos que cumple con el patron de  DNI
		$nombrearray['nombreatributo']='DNI';
		$nombrearray['codigoincidencia']='00010';
		$nombrearray['mensajeerror']='Formato dni erróneo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(
      (strlen($this->DNI)!=9) ||
      (!is_long($entero=intval(substr($this->DNI,0,8)))) ||
      (!in_array($letra=strtoupper(substr($this->DNI,8,1)),$letras)) ||
      ($letra!=$letras[$entero%23])
      ){ //compruebo que el campor es un dni con la letra correcta
		$nombrearray['nombreatributo']='DNI';
		$nombrearray['codigoincidencia']='00011';
		$nombrearray['mensajeerror']='Dni no válido';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if($comprobar){
		return true;
	}
	else{
		array_push($this->erroresdatos,$devolver);//introducimos el error en el array de errores(de la clase)
		return $devolver;
	}
}
// function Comprobar_codEspacio()
// Comprueba el formato del codEspacio
//	alfanumerico
//	mayor a 3
// 	menor  a 10
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_codEspacio(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[a-zA-Z0-9-]+$/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->codEspacio)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='codEspacio';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->codEspacio)>10){//comprobamos que la cadena no sea mayor de 10
		$nombrearray['nombreatributo']='codEspacio';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->codEspacio)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='codEspacio';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->codEspacio)){//comprobamos que se trate de caracteres alfabeticos y numericos
		$nombrearray['nombreatributo']='codEspacio';
		$nombrearray['codigoincidencia']='00040';
		$nombrearray['mensajeerror']='Solo están permitidas alfabéticos, números y el “-”';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if($comprobar){
		return true;
	}
	else{
		array_push($this->erroresdatos,$devolver);//introducimos el error en el array de errores(de la clase)
		return $devolver;
	}

}
//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	if($this->comprobar_atributos()!==true){//comprobamos si se validan correctamente todos los atributos
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//realizamos la consulta
		$sql = "select * from PROF_ESPACIO where DNI = '".$this->DNI."' AND CODESPACIO = '".$this->codEspacio."'" ;
		//no se realizo la operacion
		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // existe la entidad
				return 'Inserción fallida: el elemento ya existe';
			}
		//realizamos el insert
		$sql = "INSERT INTO PROF_ESPACIO (
			DNI,
			CODESPACIO
			) 
				VALUES (
					'".$this->DNI."',
					'".$this->codEspacio."'
					)";
		//no se realiza la operacion
		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
}
}
    

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
	//realizamos la consulta
	$sql = "SELECT *
			FROM PROF_ESPACIO
			WHERE (
				DNI LIKE '%".$this->DNI."%' AND
				CODESPACIO LIKE '%".$this->codEspacio."%' 
			)
	";

	if (!$resultado = $this->mysqli->query($sql))//error en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}

/*buscamos todos los PROF_ESPACIO que tengan el dni que le pasamos*/
function SEARCH1()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM PROF_ESPACIO
			WHERE (
			DNI='$this->DNI' 
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
//funcion para encontrar todos los prof_espacios que tengan el codespacio que le pasamos
function SEARCH2()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM PROF_ESPACIO
			WHERE (
			CODESPACIO='$this->codEspacio' 
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}


//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	if($this->comprobar_DNI()!==true && $this->Comprobar_codEspacio()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//realizamos o delete
   $sql = "	DELETE FROM 
   				PROF_ESPACIO
   			WHERE(
   				DNI = '$this->DNI' AND 
   				CODESPACIO = '$this->codEspacio'
   			)
   			";

   	if ($this->mysqli->query($sql))//se realiza el borrado con exito
	{
		$resultado = 'Borrado realizado con éxito';
	}
	else//error en el borrado
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	if($this->comprobar_DNI()!==true && $this->Comprobar_codEspacio()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
    $sql = "SELECT *
			FROM PROF_ESPACIO
			WHERE (
				(DNI = '$this->DNI'AND
				 CODESPACIO = '$this->codEspacio') 
			)";

	if (!$resultado = $this->mysqli->query($sql))//fallo en la operacion
	{
			return 'Error de gestor de base de datos';
	}else//devolvemos la tupla
	{
		$tupla = $resultado->fetch_array();
	}
	return $tupla;
}
}


// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{
	if($this->comprobar_atributos()!==true){//comprobamos si se validan correctamente todos los atributos
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//realizamos el update
	$sql = "UPDATE PROF_ESPACIO
			SET 
				DNI = '$this->DNI',
				CODESPACIO = '$this->codEspacio'
			WHERE (
				DNI = '$this->DNI' AND CODESPACIO='$this->codEspacio'
			)
			";
	if ($this->mysqli->query($sql))//operacion realizada con exito
	{
		$resultado = 'Actualización realizada con éxito';
	}
	else//fallo en la operacion
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}

	

}//fin de clase

?>