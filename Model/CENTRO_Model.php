
<?php

//Clase : CENTRO_Modelo
//Creado el : 07-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------

class CENTRO_Model {

	var $codCentro;//codigo del centro
	var $codEdificio;//codigo del edificio en el que se encuentra
	var $nombreCentro;//nombre del centro
	var $direccionCentro;//direccion en la que se encuentra el centro
	var $responsableCentro;//responsable del centro
	

	var $mysqli;//variable para conectar con la bd

//Constructor de la clase
//

function __construct($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO){
	$this->codCentro = $CODCENTRO;
	$this->codEdificio = $CODEDIFICIO;
	$this->nombreCentro = $NOMBRECENTRO;
	$this->direccionCentro = $DIRECCIONCENTRO;
	$this->responsableCentro = $RESPONSABLECENTRO;
	$this->erroresdatos = array(); 

	//$this->Comprobar_atributos();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();//variable para establecer conexion con la base de datos
}
// function Comprobar_atributos
// si todas las funciones de comprobacion de atributos individuales son true devuelve true
// si alguna es false, devuelve el array de errores de datos
function comprobar_atributos()
{//llamamos a las funciones de comprobacion
	$this->comprobar_codCentro();
	$this->comprobar_codEdificio();
	$this->comprobar_nombreCentro();
	$this->comprobar_direccionCentro();
	$this->comprobar_responsableCentro();
	
	if (empty($this->erroresdatos))//comprobamos si el array esta vacio 
	{
		return true;
	}
	else
		{
			return $this->erroresdatos;//devolvemos el array de errores
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
// function Comprobar_nombreCentro()
// Comprueba el formato del nombreCentro
//	alfabeticos
//	mayor a 3
// 	menor  a 50
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_nombreCentro(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->nombreCentro)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='nombreCentro';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->nombreCentro)>50){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='nombreCentro';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->nombreCentro)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='nombreCentro';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->nombreCentro)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='nombreCentro';
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
// function Comprobar_direccionCentro()
// Comprueba el formato del direccionCentro
//	alfanumerico
//	mayor a 3
// 	menor  a 150
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_direccionCentro(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[a-zA-Z0-9-\/ªº]+$/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->direccionCentro)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='direccionCentro';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->direccionCentro)>150){//comprobamos que la cadena no sea mayor de 10
		$nombrearray['nombreatributo']='direccionCentro';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->direccionCentro)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='direccionCentro';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->direccionCentro)){//comprobamos que se trate de caracteres alfabeticos y numericos
		$nombrearray['nombreatributo']='direccionCentro';
		$nombrearray['codigoincidencia']='00050';
		$nombrearray['mensajeerror']='Solo están permitidas alfabéticos, números y los símbolos  “- / º ª” ';
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
// function Comprobar_responsableCentro()
// Comprueba el formato del responsableCentro
//	alfabeticos
//	mayor a 3
// 	menor  a 60
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_responsableCentro(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->responsableCentro)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='responsableCentro';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->responsableCentro)>60){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='responsableCentro';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->responsableCentro)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='responsableCentro';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron, $this->responsableCentro)){//comprobamos que se trate de caracteres alfabeticos 
		$nombrearray['nombreatributo']='responsableCentro';
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
		$sql = "select * from CENTRO where CODCENTRO = '".$this->codCentro."'";

		if (!$result = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // existe el centro
				return 'Inserción fallida: el elemento ya existe';
			}
			//realizamos el insert
		$sql = "INSERT INTO CENTRO (
			CODCENTRO,
			CODEDIFICIO,
			NOMBRECENTRO,
			DIRECCIONCENTRO,
			RESPONSABLECENTRO) 
				VALUES (
					'".$this->codCentro."',
					'".$this->codEdificio."',
					'".$this->nombreCentro."',
					'".$this->direccionCentro."',
					'".$this->responsableCentro."'
					)";

		if (!$this->mysqli->query($sql)) {//fallo en el insert
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
			FROM CENTRO
			WHERE (
				CODCENTRO LIKE '%".$this->codCentro."%' AND
				CODEDIFICIO LIKE '%".$this->codEdificio."%' AND
				NOMBRECENTRO LIKE '%".$this->nombreCentro."%' AND
				DIRECCIONCENTRO LIKE '%".$this->direccionCentro."%' AND
				RESPONSABLECENTRO LIKE '%".$this->responsableCentro."%'  
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
/*buscamos todos los centros que tengan el edificio que tiene como clave codEdificio*/
function SEARCH1()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM CENTRO
			WHERE (
			CODEDIFICIO='$this->codEdificio' 
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
//buscamos todos todos los espacios que dependen del centro buscado
function SEARCH2()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM ESPACIO
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
//buscamos todas las titulaciones que dependen del codigo del centro que le pasamos
function SEARCH3()
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
	if($this->Comprobar_codCentro()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//comprobamos que ningun espacio ni titulacion dependan de centro
   include_once '../Model/ESPACIO_Model.php';
   include_once '../Model/TITULACIÓN_Model.php';
   $espacio= new ESPACIO_Model('','',$this->codCentro,'','','');//creamos un espacio con el codcentro
   $titulación= new TITULACIÓN_Model('',$this->codCentro,'','');//creamos una titulacion con el codcentro
   $respuesta=$titulación->SEARCH1();//comprobamos que no existe ninguna titulación con el codcentro que le pasamos
   $respuesta2=$espacio->SEARCH1();//comprobamos que no existe ninguna espacio con el codcentro que le pasamos
   if($respuesta->num_rows==0 AND $respuesta2->num_rows==0){//no depende ni titulacion ni espacio de centro
   $sql = "	DELETE FROM 
   				CENTRO
   			WHERE(
   				CODCENTRO = '$this->codCentro'
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
else{//existe una titulacion o un espacio que dependen del centro
	$resultado='No se puede borrar porque existen espacios y titulaciones que dependen de este centro';
	return $resultado;
}
}
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	if($this->Comprobar_codCentro()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
    $sql = "SELECT *
			FROM CENTRO
			WHERE (
				(CODCENTRO = '$this->codCentro') 
			)";

	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
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
	$sql = "UPDATE CENTRO
			SET 
				CODEDIFICIO = '$this->codEdificio',
				NOMBRECENTRO = '$this->nombreCentro',
				DIRECCIONCENTRO = '$this->direccionCentro',
				RESPONSABLECENTRO = '$this->responsableCentro'
			WHERE (
				CODCENTRO = '$this->codCentro'
			)
			";
	if ($this->mysqli->query($sql))//fallo en la operacion
	{
		$resultado = 'Actualización realizada con éxito';
	}
	else
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}



}//fin de clase

?> 