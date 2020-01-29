
<?php

//Clase : PROFESORES_Modelo
//Creado el : 03-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------

class PROFESOR_Model {

	var $DNI;//dni del profesor,es clave
	var $nombreprofesor;//nombre del profesor
	var $apellidosprofesor;//apellidos del profesor
	var $areaprofesor;//area en la qe trabaja el profesor
	var $departamentoprofesor;//departamento del profesor

	var $mysqli;//variable para conectar con la bd

//Constructor de la clase
//

function __construct($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR){
	$this->DNI = $DNI;
	$this->nombreprofesor = $NOMBREPROFESOR;
	$this->apellidosprofesor = $APELLIDOSPROFESOR;
	$this->areaprofesor = $AREAPROFESOR;
	$this->departamentoprofesor = $DEPARTAMENTOPROFESOR;
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
	$this->comprobar_nombreProfesor();
	$this->comprobar_DNI();
	$this->comprobar_apellidosProfesor();
	$this->comprobar_areaProfesor();
	$this->comprobar_departamentoProfesor();
	
	if (empty($this->erroresdatos))//si no se ha rellenado el array de errores es que esa todo correcto
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
// function Comprobar_nombreProfesor()
// Comprueba el formato del nombreProfesor
//	alfabeticos
//	mayor a 3
// 	menor  a 15
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_nombreProfesor(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->nombreprofesor)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='nombreprofesor';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->nombreprofesor)>50){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='nombreprofesor';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->nombreprofesor)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='nombreprofesor';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->nombreprofesor)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='nombreprofesor';
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
// function Comprobar_apellidosProfesor()
// Comprueba el formato del apellidosProfesor
//	alfabeticos
//	mayor a 3
// 	menor  a 30
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_apellidosProfesor(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->apellidosprofesor)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='apellidosprofesor';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->apellidosprofesor)>30){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='apellidosprofesor';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->apellidosprofesor)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='apellidosprofesor';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->apellidosprofesor)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='apellidosprofesor';
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
// function Comprobar_areaProfesor()
// Comprueba el formato del areaProfesor
//	alfabeticos
//	mayor a 3
// 	menor  a 60
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_areaProfesor(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->areaprofesor)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='areaprofesor';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->areaprofesor)>60){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='areaprofesor';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->areaprofesor)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='areaprofesor';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->areaprofesor)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='areaprofesor';
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
// function Comprobar_departamentoProfesor()
// Comprueba el formato del departamentoProfesor
//	alfabeticos
//	mayor a 3
// 	menor  a 60
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_departamentoProfesor(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->departamentoprofesor)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='departamentoprofesor';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->departamentoprofesor)>60){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='departamentoprofesor';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->departamentoprofesor)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='departamentoprofesor';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->departamentoprofesor)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='departamentoprofesor';
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
	//realizamos la consulta
		$sql = "select * from PROFESOR where DNI = '".$this->DNI."'";

		if (!$result = $this->mysqli->query($sql))//no se realizo la consulta
		{
			return 'Error de gestor de base de datos';
		}
		//comprobamos que no existe profesor con el mismo dni
		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}
//realizamos insert
		$sql = "INSERT INTO PROFESOR (
			DNI,
			NOMBREPROFESOR,
			APELLIDOSPROFESOR,
			AREAPROFESOR,
			DEPARTAMENTOPROFESOR
			) 
				VALUES (
					'".$this->DNI."',
					'".$this->nombreprofesor."',
					'".$this->apellidosprofesor."',
					'".$this->areaprofesor."',
					'".$this->departamentoprofesor."'
					)";
		//no se realizo el insert
		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';
		}
		else{//operacion realizada
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
			FROM PROFESOR
			WHERE (
				DNI LIKE '%".$this->DNI."%' AND
				NOMBREPROFESOR LIKE '%".$this->nombreprofesor."%' AND
				APELLIDOSPROFESOR LIKE '%".$this->apellidosprofesor."%' AND
				AREAPROFESOR LIKE '%".$this->areaprofesor."%' AND
				DEPARTAMENTOPROFESOR LIKE '%".$this->departamentoprofesor."%' 
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//no se realizo la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
//funcion que nos permite encontrar el prof_espacio que tenga el dni que le pasamos
function SEARCH2()
{
	//realizamos la consulta
	$sql = "SELECT *
			FROM PROF_ESPACIO
			WHERE (
				DNI ='$this->DNI'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//no se realizo la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
//funcion que nos permite encontrar el prof_titulacion que tenga el dni que le pasamos
function SEARCH3()
{
	//realizamos la consulta
	$sql = "SELECT *
			FROM PROF_TITULACION
			WHERE (
				DNI ='$this->DNI'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//no se realizo la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	if($this->comprobar_DNI()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//comprobamos que no existe ningun espacio ni ninguna titulacion que dependa de profesor
	include_once '../Model/PROF_TITULACION_Model.php';
	include_once '../Model/PROF_ESPACIO_Model.php';
		$prof_titulacion= new PROF_TITULACION_Model($this->DNI,'','');//creamos un prof_titulacion con el dni que le pasamos
		$resultado=$prof_titulacion->SEARCH1();//buscamos todos los prof_titulacion que coincidan con el dni que le pasamos
		$prof_espacio= new PROF_ESPACIO_Model($this->DNI,'');//creamos un prof_espacio con el dni que le pasamos
		$resultado2=$prof_espacio->SEARCH1();//buscamos todos los prof_espacio con el dni que le pasamos
		if($resultado->num_rows==0 AND $resultado2->num_rows==0){//si ninguna de las entidades depende realizamos el delete
   $sql = "	DELETE FROM 
   				PROFESOR
   			WHERE(
   				DNI = '$this->DNI'
   			)
   			";

   	if ($this->mysqli->query($sql))//operacion realizada con exito
	{
		$resultado = 'Borrado realizado con éxito';
	}
	else//no se puedo realizar el delete
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}//la entidad depende de otras
 $resultado='Existen espacios o titulaciones que dependen de este profesor';
 return $resultado;
}
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	if($this->comprobar_DNI()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
    $sql = "SELECT *
			FROM PROFESOR
			WHERE (
				(DNI = '$this->DNI') 
			)";
	//no se realiza la consulta
	if (!$resultado = $this->mysqli->query($sql))
	{
			return 'Error de gestor de base de datos';
	}else
	{//se devuelve la tupla
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
	$sql = "UPDATE PROFESOR
			SET 
				DNI = '$this->DNI',
				NOMBREPROFESOR = '$this->nombreprofesor',
				APELLIDOSPROFESOR = '$this->apellidosprofesor',
				AREAPROFESOR = '$this->areaprofesor',
				DEPARTAMENTOPROFESOR = '$this->departamentoprofesor'
			WHERE (
				DNI = '$this->DNI'
			)
			";
	if ($this->mysqli->query($sql))//se realizo la operacion con exito
	{
		$resultado = 'Actualización realizada con éxito';
	}
	else
	{//fallo en la operacion
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}

	

}//fin de clase

?> 