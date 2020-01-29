
<?php

//Clase : TITULACIÓN_Modelo
//Creado el : 07-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------

class TITULACIÓN_Model {

	var $codTitulación;//codigo de la titulación
	var $codCentro;//codigo del centro
	var $nombreTitulacion;//nombre de la titulacion
	var $responsableTitulacion;//responsable de la titulación
	

	var $mysqli;//variable para realizar la conexion con la base de datos

//Constructor de la clase
//

function __construct($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION){
	$this->codTitulación = $CODTITULACION;
	$this->codCentro = $CODCENTRO;
	$this->nombreTitulacion = $NOMBRETITULACION;
	$this->responsableTitulacion = $RESPONSABLETITULACION;
	$this->erroresdatos = array(); 

	//$this->Comprobar_atributos();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();//variable para conectar con la bd
}

// function Comprobar_atributos
// si todas las funciones de comprobacion de atributos individuales son true devuelve true
// si alguna es false, devuelve el array de errores de datos
function comprobar_atributos()
{
	//llamamos a las funciones de comprobacion para ver si se rellena el array de errores
	$this->comprobar_codTitulacion();
	$this->comprobar_codCentro();
	$this->comprobar_nombreTitulacion();
	$this->comprobar_responsableTitulacion();
	
	if (empty($this->erroresdatos))//si el array esta vacio esta todo correcto
	{
		return true;
	}
	else
		{
			return $this->erroresdatos;//devolvemos el array de errores
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
	if(empty($this->codTitulación)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='codTitulacion';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->codTitulación)>10){//comprobamos que la cadena no sea mayor de 15
		$nombrearray['nombreatributo']='codTitulacion';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->codTitulación)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='codTitulacion';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->codTitulación)){//comprobamos que se trate de caracteres alfabeticos y numericos
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
// function Comprobar_codCentro()
// Comprueba el formato del codCentro 
//	alfanumerico
//	mayor a 3
// 	menor  a 10
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_codCentro(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[a-zA-Z0-9-]+$/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->codCentro)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='codCentro';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->codCentro)>10){//comprobamos que la cadena no sea mayor de 10
		$nombrearray['nombreatributo']='codCentro';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->codCentro)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='codCentro';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->codCentro)){//comprobamos que se trate de caracteres alfabeticos y numericos
		$nombrearray['nombreatributo']='codCentro';
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
// function Comprobar_nombreTitulacion()
// Comprueba el formato del nombreTitulacion 
//	alfabeticos
//	mayor a 3
// 	menor  a 50
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_nombreTitulacion(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->nombreTitulacion)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='nombreTitulacion';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->nombreTitulacion)>50){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='nombreTitulacion';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->nombreTitulacion)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='nombreTitulacion';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->nombreTitulacion)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='nombreTitulacion';
		$nombrearray['codigoincidencia']='00030';
		$nombrearray['mensajeerror']='Solo están permitidas alfabéticos (y espacios entre letras)';
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
// function Comprobar_responsableTitulacion()
// Comprueba el formato del responsableTitulacion 
//	alfabeticos
//	mayor a 3
// 	menor  a 60
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_responsableTitulacion(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->responsableTitulacion)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='responsableTitulacion';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->responsableTitulacion)>60){//comprobamos que la cadena no sea mayor de 60
		$nombrearray['nombreatributo']='responsableTitulacion';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->responsableTitulacion)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='responsableTitulacion';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->responsableTitulacion)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='responsableTitulacion';
		$nombrearray['codigoincidencia']='00030';
		$nombrearray['mensajeerror']='Solo están permitidas alfabéticos (y espacios entre letras)';
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
		$sql = "select * from TITULACION where CODTITULACION = '".$this->codTitulación."'";
		//si la consulta no se realiza mostramos error
		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';
		}
		//si existe una titulación con el mismo codigo no se realiza la insercion sino insertamos los nuevos atributos
		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}

		$sql = "INSERT INTO TITULACION (
			CODTITULACION,
			CODCENTRO,
			NOMBRETITULACION,
			RESPONSABLETITULACION
			) 
				VALUES (
					'".$this->codTitulación."',
					'".$this->codCentro."',
					'".$this->nombreTitulacion."',
					'".$this->responsableTitulacion."'
					)";

		if (!$this->mysqli->query($sql)) {//comprobamos que se realiza la consulta
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
			FROM TITULACION
			WHERE (
				CODTITULACION LIKE '%".$this->codTitulación."%' AND
				CODCENTRO LIKE '%".$this->codCentro."%' AND
				NOMBRETITULACION LIKE '%".$this->nombreTitulacion."%' AND
				RESPONSABLETITULACION LIKE '%".$this->responsableTitulacion."%' 
			)
	";
	//si no se realiza la consulta mostramos error
	if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;//devolvemos a tupla con los resultados de la busqueda
    
}
//funcion que nos permitira encontrar los prof_titulacion que coincidan con los codtitulacion que le pasamos
function SEARCH2()
{
	//realizamos la consulta
	$sql = "SELECT *
			FROM PROF_TITULACION
			WHERE (
				CODTITULACION ='$this->codTitulación'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//no se realizo la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
/*realizamos esta función para encontrar todas las titulaciones que tienen como  centro aquel con codCentro*/
function SEARCH1()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM TITULACION
			WHERE (
			CODCENTRO='$this->codCentro' 
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
	if($this->comprobar_codTitulacion()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//comprobamos que no existen Profesores relacionados con la titulacion
	include_once'../Model/PROF_TITULACION_Model.php';
	$prof= new PROF_TITULACION_Model('',$this->codTitulación,'');//creamos un prof_titulacion con el codtitulacion que le pasamos
	$resultado=$prof->SEARCH2();//buscamos todos los prof_titulacion que tengan el codtitulacion que le pasamos
	//si no estan relacionadas con ningun profesor se realiza el delete
	if($resultado->num_rows==0){


   $sql = "	DELETE FROM 
   			 TITULACION
   			WHERE(
   				CODTITULACION = '$this->codTitulación'
   			)
   			";
//comprobamos que se realiza la consulta sino mostramos error
   	if ($this->mysqli->query($sql))
	{
		$resultado = 'Borrado realizado con éxito';
	}
	else
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
//si existen profesores que dependen de la titulacion
else{
	$resultado='Hay profesores que dependen de esta titulacion';
	return $resultado;
}
}
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
		if($this->comprobar_codTitulacion()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta

	//realizamos la consulta
    $sql = "SELECT *
			FROM TITULACION
			WHERE (
				(CODTITULACION = '$this->codTitulación') 
			)";
			//si no se realiza la consulta mostramos error
	if (!$resultado = $this->mysqli->query($sql))
	{
			return 'Error de gestor de base de datos';
	}else
	{//devolvemos la tupla de la consulta
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
	$sql = "UPDATE TITULACION
			SET 
				CODTITULACION = '$this->codTitulación',
				CODCENTRO = '$this->codCentro',
				NOMBRETITULACION = '$this->nombreTitulacion',
				RESPONSABLETITULACION = '$this->responsableTitulacion'
			WHERE (
				CODTITULACION = '$this->codTitulación'
			)
			";

	if ($this->mysqli->query($sql))//si se realiza el update correctamente mostramos mensaje de validez
	{
		$resultado = 'Actualización realizada con éxito';
	}
	else
	{//mostramos mensajes de error
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}

	

}//fin de clase

?> 