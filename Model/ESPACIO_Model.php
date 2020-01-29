
<?php

//Clase : ESPACIO_Modelo
//Creado el : 08-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------

class ESPACIO_Model {

	var $codEspacio;//codigo del espacio
	var $codEdificio;//codigo de edificio en el que encuentra el espacio
	var $codCentro;//codigo del centro al que pertenece
	var $tipo;//tipo de espacio
	var $superficieEspacio;//superficie que mide el espacio
	var $numInventarioEspacio;//numero de inventario
	

	var $mysqli;//variable para conectar con la base de datos

//Constructor de la clase
//

function __construct($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO){
	$this->codEspacio = $CODESPACIO;
	$this->codEdificio = $CODEDIFICIO;
	$this->codCentro = $CODCENTRO;
	$this->tipo = $TIPO;
	$this->superficieEspacio = $SUPERFICIEESPACIO;
	$this->numInventarioEspacio = $NUMINVENTARIOESPACIO;
	$this->erroresdatos = array(); 

	//$this->Comprobar_atributos();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();//variable para conectar con la bd
}
// function Comprobar_atributos
// si todas las funciones de comprobacion de atributos individuales son true devuelve true
// si alguna es false, devuelve el array de errores de datos
function comprobar_atributos()
{//llamamos a todas las funciones de comprobacion
	$this->comprobar_codEspacio();
	$this->comprobar_codEdificio();
	$this->comprobar_codCentro();
	$this->comprobar_tipo();
	$this->comprobar_superficieEspacio();
	$this->comprobar_numeroInventario();
	if (empty($this->erroresdatos))//comprobamos si el array de errores esta vacio 
	{
		return true;
	}
	else
		{
			return $this->erroresdatos;//devolvemos el array de errores
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
// function comprobar_tipo()
// Comprueba el formato del tipo
//	alfabetico
//	mayor  a 3
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_tipo()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->tipo)){//comprobamos si el sexo es vacio
		$nombrearray['nombreatributo']='tipo';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
		if(strlen($this->tipo)>11){//comprobamos que la cadena no sea mayor de 10
		$nombrearray['nombreatributo']='tipo';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->tipo)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='tipo';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(strcmp($this->tipo,'DESPACHO')!=0 && strcmp($this->tipo,'LABORATORIO')!=0 && strcmp($this->tipo,'PAS')!=0){//comprobamos que cumple con el patron de  sexo
		$nombrearray['nombreatributo']='tipo';
		$nombrearray['codigoincidencia']='00080';
		$nombrearray['mensajeerror']='Solo se permiten los valores '.'DESPACHO,'.'LABORATORIO,'.'PAS';
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
// function comprobar_superficieEspacio()
// Comprueba el formato del superficieEspacio 
//	numerico
//	mayor  a 1
// 	menor  a 4
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_superficieEspacio()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[0-9]+$/";//establecemos el patron para realizar la comprobroacion de que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->superficieEspacio)){//comprobamos si el telefono es vacio
		$nombrearray['nombreatributo']='superficieEspacio';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->superficieEspacio)>4){//comprobamos que la cadena no sea mayor de 4
		$nombrearray['nombreatributo']='superficieEspacio';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->superficieEspacio)<1){//comprobamos que la cadena no sea menor que 1
		$nombrearray['nombreatributo']='superficieEspacio';
		$nombrearray['codigoincidencia']='00004';
		$nombrearray['mensajeerror']='Valor de atributo numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->superficieEspacio)){//comprobamos que cumple con el patron de  superficieEspacio
		$nombrearray['nombreatributo']='superficieEspacio';
		$nombrearray['codigoincidencia']='00070';
		$nombrearray['mensajeerror']='Solo se permiten números';
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
// function comprobar_numeroInventario()
// Comprueba el formato del numeroInventario
//	numerico
//	mayor  a 1
// 	menor  a 8
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_numeroInventario()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[0-9]+$/";//establecemos el patron para realizar la comprobroacion de que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->numInventarioEspacio)){//comprobamos si el telefono es vacio
		$nombrearray['nombreatributo']='numeroInventario';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->numInventarioEspacio)>8){//comprobamos que la cadena no sea mayor de 8
		$nombrearray['nombreatributo']='numeroInventario';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->numInventarioEspacio)<1){//comprobamos que la cadena no sea menor que 1
		$nombrearray['nombreatributo']='numeroInventario';
		$nombrearray['codigoincidencia']='00004';
		$nombrearray['mensajeerror']='Valor de atributo numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->numInventarioEspacio)){//comprobamos que cumple con el patron de  superficieEspacio
		$nombrearray['nombreatributo']='numeroInventario';
		$nombrearray['codigoincidencia']='00070';
		$nombrearray['mensajeerror']='Solo se permiten números';
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
		$sql = "select * from ESPACIO where CODESPACIO = '".$this->codEspacio."'";

		if (!$result = $this->mysqli->query($sql))//no se realizo la operacion
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // existe el espacio
				return 'Inserción fallida: el elemento ya existe';
			}
			//realizamos el insert
		$sql = "INSERT INTO ESPACIO (
			CODESPACIO,
			CODEDIFICIO,
			CODCENTRO,
			TIPO,
			SUPERFICIEESPACIO,
			NUMINVENTARIOESPACIO) 
				VALUES (
					'".$this->codEspacio."',
					'".$this->codEdificio."',
					'".$this->codCentro."',
					'".$this->tipo."',
					'".$this->superficieEspacio."',
					'".$this->numInventarioEspacio."'

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
			FROM ESPACIO
			WHERE (
				CODESPACIO LIKE '%".$this->codEspacio."%' AND
				CODEDIFICIO LIKE '%".$this->codEdificio."%' AND
				CODCENTRO LIKE '%".$this->codCentro."%' AND
				TIPO LIKE '%".$this->tipo."%' AND
				SUPERFICIEESPACIO LIKE '%".$this->superficieEspacio."%' AND 
				NUMINVENTARIOESPACIO LIKE '%".$this->numInventarioEspacio."%'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
/* buscamos todos los espacios que tengan codEdificio y codCentro igual al que le pasamos*/
function SEARCH1()
{
	//realizamos la consulta

	$sql = "SELECT *
			FROM ESPACIO
			WHERE (
			CODEDIFICIO='$this->codEdificio' OR CODCENTRO='$this->codCentro'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))//fallo en la consulta
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}
//buscamos todos los prof_espacios que tengan el codespacio que le pasamos
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
	if($this->Comprobar_codEspacio()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//comprobamos si existe un profesor que dependa de este espacio
	include_once '../Model/PROF_ESPACIO_Model.php';
	$prof_espacio= new PROF_ESPACIO_Model('',$this->codEspacio);//creamos un prof_espacio con el codespacio que le pasamos
	$respuesta= $prof_espacio->SEARCH2();//buscamos todos los prof_espacio que tengan el codespacio que le pasamos
	if($respuesta->num_rows==0){//realizamos la consulta
    $sql = "	DELETE FROM 
   				ESPACIO
   			WHERE(
   				CODESPACIO = '$this->codEspacio'
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
else{//existe un profesor que depende del espacio
	$resultado='No se puede borrar porque existe un profesor que depende de ese espacio';
	return $resultado;
}

}
}


// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	if($this->Comprobar_codEspacio()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
    $sql = "SELECT *
			FROM ESPACIO
			WHERE (
				(CODESPACIO = '$this->codEspacio') 
			)";

	if (!$resultado = $this->mysqli->query($sql))//fallo en la base de datos
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
	$sql = "UPDATE ESPACIO
			SET 
				CODEDIFICIO = '$this->codEdificio',
				CODCENTRO = '$this->codCentro',
				TIPO = '$this->tipo',
				SUPERFICIEESPACIO = '$this->superficieEspacio',
				NUMINVENTARIOESPACIO = '$this->numInventarioEspacio'
			WHERE (
				CODESPACIO = '$this->codEspacio'
			)
			";
	if ($this->mysqli->query($sql))//operacion realiada
	{
		$resultado = 'Actualización realizada con éxito';
	}
	else//fallo en la operación
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}



}//fin de clase

?> 