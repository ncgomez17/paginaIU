
<?php

//Clase : PROF_TITULACION_Modelo
//Creado el : 08-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------

class PROF_TITULACION_Model {

	var $DNI;//dni del profesor
	var $codTitulacion;//codigo de la titulacion
    var $anhoacademico;//año academico de la titulacion
	var $mysqli;//variable para conectar con la base de datos

//Constructor de la clase
//

function __construct($DNI,$CODTITULACION,$ANHOACADEMICO){
	$this->DNI = $DNI;
	$this->codTitulacion = $CODTITULACION;
	$this->anhoacademico= $ANHOACADEMICO;
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
	$this->comprobar_codTitulacion();
	$this->comprobar_anhoacademico();
	
	if (empty($this->erroresdatos))//comprobamos si el array de errores esta vacio
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
// function Comprobar_codTitulacion()
// Comprueba el formato del codTitulacion 
//	alfanumerico
//	mayor a 3
// 	menor  a 10
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_codTitulacion(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[a-zA-Z0-9]+$/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->codTitulacion)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='codTitulacion';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->codTitulacion)>10){//comprobamos que la cadena no sea mayor de 15
		$nombrearray['nombreatributo']='codTitulacion';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->codTitulacion)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='codTitulacion';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->codTitulacion)){//comprobamos que se trate de caracteres alfabeticos y numericos
		$nombrearray['nombreatributo']='codTitulacion';
		$nombrearray['codigoincidencia']='00060';
		$nombrearray['mensajeerror']='Solo se permiten alfabéticos y números';
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
// function comprobar_anhoacademico()
// Comprueba el formato de la fecha 
//	numerico
//	mayor  a 1
// 	menor  a 9
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_anhoacademico()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^^[0-9]{4}-[0-9]{4}$/";//establecemos el patron para realizar la comprobroacion de que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->anhoacademico)){//comprobamos si el telefono es vacio
		$nombrearray['nombreatributo']='anhoacademico';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->anhoacademico)>9){//comprobamos que la cadena no sea mayor de 11
		$nombrearray['nombreatributo']='anhoacademico';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->anhoacademico)<1){//comprobamos que la cadena no sea menor que 1
		$nombrearray['nombreatributo']='anhoacademico';
		$nombrearray['codigoincidencia']='00004';
		$nombrearray['mensajeerror']='Valor de atributo numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->anhoacademico)){//comprobamos que cumple con el patron de  fecha
		$nombrearray['nombreatributo']='anhoacademico';
		$nombrearray['codigoincidencia']='00110';
		$nombrearray['mensajeerror']='Solo se permiten dddd-dddd (año académico) donde d es un dígito';
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
		$sql = "select * from PROF_TITULACION where DNI = '".$this->DNI."' AND CODTITULACION = '".$this->codTitulacion."'" ;
		//la operacion fallo
		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';
		}
		//comprobamos que no existe la misma entidad
		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}
			//realizamos el insert
		$sql = "INSERT INTO PROF_TITULACION (
			DNI,
			CODTITULACION,
			ANHOACADEMICO
			) 
				VALUES (
					'".$this->DNI."',
					'".$this->codTitulacion."',
					'".$this->anhoacademico."'
					)";

		if (!$this->mysqli->query($sql)) {//no se realizo la operacion
			return 'Error de gestor de base de datos';
		}
		else{//se realizo con exito la operacion
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
			FROM PROF_TITULACION
			WHERE (
				DNI LIKE '%".$this->DNI."%' AND
				CODTITULACION LIKE '%".$this->codTitulacion."%' AND
				ANHOACADEMICO LIKE '%".$this->anhoacademico."%'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//no se realizo la operacion
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
/*buscamos todos los PROF_TITULACION que tengan el dni que le pasamos*/
function SEARCH1()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM PROF_TITULACION
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
//buscamos todos los prof_titulacion que tengan el codtitulacion que le pasamos
function SEARCH2()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM PROF_TITULACION
			WHERE (
			CODTITULACION='$this->codTitulacion' 
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
	if($this->comprobar_DNI()!==true && $this->Comprobar_codTitulacion()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//realizamos el delete
   $sql = "	DELETE FROM 
   				PROF_TITULACION
   			WHERE(
   				DNI = '$this->DNI' AND 
   				CODTITULACION = '$this->codTitulacion' AND
   				ANHOACADEMICO = '$this->anhoacademico'
   			)
   			";
   	//se realizo el delete
   	if ($this->mysqli->query($sql))
	{
		$resultado = 'Borrado realizado con éxito';
	}
	else//fallo en el delete
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	if($this->comprobar_DNI()!==true && $this->Comprobar_codTitulacion()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
    $sql = "SELECT *
			FROM PROF_TITULACION
			WHERE (
				(DNI = '$this->DNI'AND
				 CODTITULACION = '$this->codTitulacion'
				 ) 
			)";
	//fallo en la consulta
	if (!$resultado = $this->mysqli->query($sql))
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
	//realizamos un update
	$sql = "UPDATE PROF_TITULACION
			SET 
				ANHOACADEMICO = '$this->anhoacademico'
				WHERE(
				(DNI = '$this->DNI' AND CODTITULACION='$this->codTitulacion')
				)";
	if ($this->mysqli->query($sql))//se realiza el update exitosamente
	{
		$resultado = 'Actualización realizada con éxito';
	}
	else//fallo en el update
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}

	

}//fin de clase

?>