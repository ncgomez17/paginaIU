
<?php

//Clase : EDIFICIO_Modelo
//Creado el : 03-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------



class EDIFICIO_Model {

	var $codEdificio;//codigo del edificio
	var $nombreEdificio;//nombre del edificio
	var $direcciónEdificio;//direccion donde se encuentra el edificio
	var $campusEdificio;//campus del edificio

	var $mysqli;//variable para conectar con la base de datos

//Constructor de la clase
//

function __construct($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO){
	$this->codEdificio = $CODEDIFICIO;
	$this->nombreEdificio = $NOMBREEDIFICIO;
	$this->direcciónEdificio = $DIRECCIONEDIFICIO;
	$this->campusEdificio = $CAMPUSEDIFICIO;
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
	$this->comprobar_codEdificio();
	$this->comprobar_nombreEdificio();
	$this->comprobar_direccionEdificio();
	$this->comprobar_campusEdificio();
	if (empty($this->erroresdatos))//comprobamos si el array de errores esta vacio
	{
		return true;
	}
	else
		{
			return $this->erroresdatos;//devolvemos el array de errores
		}
}
// function Comprobar_codEdificio()
// Comprueba el formato del codEdificio
//	alfanumerico
//	mayor a 3
// 	menor  a 10
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_codEdificio(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[a-zA-Z0-9-]+$/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->codEdificio)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='codEdificio';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->codEdificio)>10){//comprobamos que la cadena no sea mayor de 10
		$nombrearray['nombreatributo']='codEdificio';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->codEdificio)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='codEdificio';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->codEdificio)){//comprobamos que se trate de caracteres alfabeticos y numericos
		$nombrearray['nombreatributo']='codEdificio';
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
// function Comprobar_nombreEdificio()
// Comprueba el formato del nombreEdificio
//	alfabeticos
//	mayor a 3
// 	menor  a 50
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_nombreEdificio(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->nombreEdificio)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='nombreEdificio';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->nombreEdificio)>50){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='nombreEdificio';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->nombreEdificio)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='nombreEdificio';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->nombreEdificio)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='nombreEdificio';
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
// function Comprobar_direccionEdificio()
// Comprueba el formato del direccionEdificio
//	alfanumerico
//	mayor a 3
// 	menor  a 150
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_direccionEdificio(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[a-zA-Z0-9-\/ªº]+$/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->direcciónEdificio)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='direccionEdificio';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->direcciónEdificio)>150){//comprobamos que la cadena no sea mayor de 10
		$nombrearray['nombreatributo']='direccionEdificio';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->direcciónEdificio)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='direccionEdificio';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->direcciónEdificio)){//comprobamos que se trate de caracteres alfabeticos y numericos
		$nombrearray['nombreatributo']='direccionEdificio';
		$nombrearray['codigoincidencia']='00050';
		$nombrearray['mensajeerror']='Solo están permitidas alfabéticos, números y los símbolos  “- / º ª”';
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
// function Comprobar_campusEdificio()
// Comprueba el formato del campusEdificio
//	alfabeticos
//	mayor a 3
// 	menor  a 10
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_campusEdificio(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->campusEdificio)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='campusEdificio';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->campusEdificio)>10){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='campusEdificio';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->campusEdificio)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='campusEdificio';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->campusEdificio)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='campusEdificio';
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
		$sql = "select * from EDIFICIO where CODEDIFICIO = '".$this->codEdificio."'";

		if (!$result = $this->mysqli->query($sql))//fallo en la operacion
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // existe el edificio
				return 'Inserción fallida: el elemento ya existe';
			}
			//realizamos el insert
		$sql = "INSERT INTO EDIFICIO (
			CODEDIFICIO,
			NOMBREEDIFICIO,
			DIRECCIONEDIFICIO,
			CAMPUSEDIFICIO
			) 
				VALUES (
					'".$this->codEdificio."',
					'".$this->nombreEdificio."',
					'".$this->direcciónEdificio."',
					'".$this->campusEdificio."'
					)";

		if (!$this->mysqli->query($sql)) {//fallo en la operacion
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
			FROM EDIFICIO
			WHERE (
				CODEDIFICIO LIKE '%".$this->codEdificio."%' AND
				NOMBREEDIFICIO LIKE '%".$this->nombreEdificio."%' AND
				DIRECCIONEDIFICIO LIKE '%".$this->direcciónEdificio."%' AND
				CAMPUSEDIFICIO LIKE '%".$this->campusEdificio."%' 
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
//esta funcion encuentra los centros que tengan el codedificio que le pasamos
function SEARCH2()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM CENTRO
			WHERE (
				CODEDIFICIO ='$this->codEdificio'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
//esta funcion  encuentra los espacios que tienen el codedificio que le pasamos
function SEARCH3()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM ESPACIO
			WHERE (
				CODEDIFICIO = '$this->codEdificio'
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
	if($this->Comprobar_codEdificio()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//comprobamos que ningun centro o espacio dependan del edifico
   include_once '../Model/CENTRO_Model.php';
   include_once '../Model/ESPACIO_Model.php';
   $centro= new CENTRO_Model('',$this->codEdificio,'','','');//creamos un centro con el codedificio que le pasamos
   $espacio= new ESPACIO_Model('',$this->codEdificio,'','','','');//creamos un espacio con el codedificio que le pasamos
   $respuesta=$centro->SEARCH1();//encontramos todos los centros que tengan el codedificio que le pasamos
   $respuesta2=$espacio->SEARCH1();//encontramos todos los espacios que tengan el codedificio que le pasamos
   if($respuesta->num_rows==0 AND $respuesta2->num_rows==0){//no dependen ni de edificio ni de espacio
   $sql = "	DELETE FROM 
   				EDIFICIO
   			WHERE(
   				CODEDIFICIO = '$this->codEdificio'
   			)
   			";
   	

   	if ($this->mysqli->query($sql))//operacion realizada con exito
	{
		$resultado = 'Borrado realizado con éxito';
	}
	else//fallo en la operacion
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
else{//depende de un espacio o centro
	$resultado='No se puede borrar porque existen centros o espacios que dependen de este edificio';
	return $resultado;
}
}
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	if($this->Comprobar_codEdificio()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
    $sql = "SELECT *
			FROM EDIFICIO
			WHERE (
				(CODEDIFICIO = '$this->codEdificio') 
			)";

	if (!$resultado = $this->mysqli->query($sql))// fallo en la consulta
	{
			return 'Error de gestor de base de datos';
	}else//devolvemos la tupla con la informacion
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
	$sql = "UPDATE EDIFICIO
			SET 
				CODEDIFICIO = '$this->codEdificio',
				NOMBREEDIFICIO = '$this->nombreEdificio',
				DIRECCIONEDIFICIO = '$this->direcciónEdificio',
				CAMPUSEDIFICIO = '$this->campusEdificio'
			WHERE (
				CODEDIFICIO = '$this->codEdificio'
			)
			";
	if ($this->mysqli->query($sql))// la operacion se realizo con exito
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