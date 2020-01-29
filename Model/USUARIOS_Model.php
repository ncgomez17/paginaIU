
<?php

//Clase : USUARIOS_Modelo
//Creado el : 7-20-2019
//Creado por: ncgomez17
//-------------------------------------------------------

class USUARIOS_Model {

	var $login;//atributo clave con el que se identifica el usuario
	var $password;//contraseña para acceder a la gestion
	var $nombre;//nombre del usuario
	var $apellidos;//apellidos del usuario
	var $telefono;//telefono del usuario
	var $email;//email del usuario
	var $DNI;//dni del usuario
	var $fotopersonal;//foto del usuario
	var $FechaNacimiento;//fecha de nacimiento del usuario
	var $sexo;//sexo del usuario

	var $mysqli;//variale para la conexion con la base de datos

//Constructor de la clase
//

function __construct($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo){
	$this->login = $login;
	$this->password = $password;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->email = $email;
	$this->DNI = $DNI;
	$this->telefono = $telefono;
	$this->fotopersonal = $fotopersonal;
	$this->sexo = $sexo;
	$this->FechaNacimiento = $FechaNacimiento;
	$this->erroresdatos = array();//nos permitirá almacenar todos los errores de las comprobaciones

	//$this->Comprobar_atributos();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();//variable para conectar con la bd
}

// function Comprobar_atributos
// si todas las funciones de comprobacion de atributos individuales son true devuelve true
// si alguna es false, devuelve el array de errores de datos
function comprobar_atributos()
{//llamamos a todas las funciones para rellenar el array de errores
	$this->comprobar_login();
	$this->comprobar_password();
	$this->comprobar_nombre();
	$this->comprobar_apellidos();
	$this->comprobar_email();
	$this->comprobar_DNI();
	$this->comprobar_telefono();
	$this->comprobar_sexo();
	$this->comprobar_fecha();
	
	if (empty($this->erroresdatos))//si el array esta vacio todo esta correcto
	{
		return true;
	}
	else
		{
			return $this->erroresdatos;//devolvemos el array de errores
		}
}

// function Comprobar_login()
// Comprueba el formato del login 
//	alfabético
//	mayor a 3
// 	menor  a 15
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_login(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->login)){//comprobamos si el login es vacio
		$nombrearray['nombreatributo']='login';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->login)>15){//comprobamos que la cadena no sea mayor de 15
		$nombrearray['nombreatributo']='login';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->login)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='login';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!ctype_alpha($this->login)){//comprobamos que se trate de caracteres alfabeticos
		$nombrearray['nombreatributo']='login';
		$nombrearray['codigoincidencia']='000090';
		$nombrearray['mensajeerror']='Solo se permiten alfabéticos';
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
// function comprobar_password()
// Comprueba el formato de la password 
//	alfabético
//	mayor  a 3
// 	menor a 128
//	no vacio
// devuelve un true en caso de que todas las comprobaciones sean correctas,sino devuelve un array con los errores
function comprobar_password(){
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->password)){//comprobamos si el password es vacio
		$nombrearray['nombreatributo']='password';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->password)>15){//comprobamos que la cadena no sea mayor de 128
		$nombrearray['nombreatributo']='password';
		$nombrearray['codigoincidencia']='00005';
		$nombrearray['mensajeerror']='Password demasiado larga';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->password)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='password';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!ctype_alpha($this->password)){//comprobamos que se trate de caracteres alfabeticos
		$nombrearray['nombreatributo']='password';
		$nombrearray['codigoincidencia']='000090';
		$nombrearray['mensajeerror']='Solo se permiten alfabéticos';
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

// function comprobar_nombre()
// Comprueba el formato del nombre 
//	alfabético
//	mayor a 3
// 	menor  a 30
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_nombre()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]*$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->nombre)){//comprobamos si el nombre es vacio
		$nombrearray['nombreatributo']='nombre';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->nombre)>30){//comprobamos que la cadena no sea mayor de 30
		$nombrearray['nombreatributo']='nombre';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->nombre)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='nombre';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->nombre)){//comprobamos que se trate de caracteres alfabeticos podemos incluir un espacio entre estos
		$nombrearray['nombreatributo']='nombre';
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
// function comprobar_apellidos()
// Comprueba el formato del apellidos 
//	alfabético
//	mayor o a 3
// 	menor o a 50
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_apellidos()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^([a-zA-Z]+)[\s]?([a-zA-Z]+$)/";//establecemos el patron para realizar la comprobroacionde que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->apellidos)){//comprobamos si apellidos  es vacio
		$nombrearray['nombreatributo']='apellidos';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->apellidos)>50){//comprobamos que la cadena no sea mayor de 50
		$nombrearray['nombreatributo']='apellidos';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->apellidos)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='apellidos';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->apellidos)){//comprobamos que se trate de caracteres alfabeticos podemos incluir un espacio entre estos
		$nombrearray['nombreatributo']='apellidos';
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
// function comprobar_email()
// Comprueba el formato del email 
//	alfanumerico
//	mayor a 3
// 	menor  a 60
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_email()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/";//establecemos el patron para realizar la comprobroacion de que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->email)){//comprobamos si el dni es vacio
		$nombrearray['nombreatributo']='email';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->email)>60){//comprobamos que la cadena no sea mayor de 15
		$nombrearray['nombreatributo']='email';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->email)<3){//comprobamos que la cadena no sea menor que 3
		$nombrearray['nombreatributo']='email';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->email)){//comprobamos que cumple con el patron de email
		$nombrearray['nombreatributo']='email';
		$nombrearray['codigoincidencia']='00120';
		$nombrearray['mensajeerror']='Formato email erroneo';
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
// function comprobar_DNI()
// Comprueba el formato del DNI 
//	alfanumerico
//	mayor  a 3
// 	menor  a 9
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_DNI()
{
$comprobar=true;//variable donde determino si se cumplen las condiciones
$devolver=array();//variable donde meto los errores
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
// function comprobar_telefono()
// Comprueba el formato del telefono 
//	numerico
//	mayor  a 1
// 	menor  a 11
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_telefono()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[0-9]+$/";//establecemos el patron para realizar la comprobroacion de que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->telefono)){//comprobamos si el telefono es vacio
		$nombrearray['nombreatributo']='telefono';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->telefono)>11){//comprobamos que la cadena no sea mayor de 11
		$nombrearray['nombreatributo']='telefono';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->telefono)<1){//comprobamos que la cadena no sea menor que 1
		$nombrearray['nombreatributo']='telefono';
		$nombrearray['codigoincidencia']='00004';
		$nombrearray['mensajeerror']='Valor de atributo numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->telefono) && !preg_match("/^34\d{9}$/",$this->telefono) && !preg_match("/^\d{3}-\d{3}-\d{3}$/",$this->telefono)){//comprobamos que cumple con el patron de  telefono
		$nombrearray['nombreatributo']='telefono';
		$nombrearray['codigoincidencia']='00006';
		$nombrearray['mensajeerror']='Teléfono no válido';
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
// function comprobar_fecha()
// Comprueba el formato de la fecha 
//	numerico[0-1][0-9]/[0-3][0-9]/[0-9]{2}(?:[0-9]{2})?
//	mayor  a 1
// 	menor  a 11
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_fecha()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $patron="/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/";//establecemos el patron para realizar la comprobroacion de que cumple con los requisitos
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->FechaNacimiento)){//comprobamos si el telefono es vacio
		$nombrearray['nombreatributo']='FechaNacimiento';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
	if(strlen($this->FechaNacimiento)>11){//comprobamos que la cadena no sea mayor de 11
		$nombrearray['nombreatributo']='FechaNacimiento';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->FechaNacimiento)<1){//comprobamos que la cadena no sea menor que 1
		$nombrearray['nombreatributo']='FechaNacimiento';
		$nombrearray['codigoincidencia']='00004';
		$nombrearray['mensajeerror']='Valor de atributo numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(!preg_match($patron,$this->FechaNacimiento)){//comprobamos que cumple con el patron de  fecha
		$nombrearray['nombreatributo']='FechaNacimiento';
		$nombrearray['codigoincidencia']='00020';
		$nombrearray['mensajeerror']='Formato fecha erróneo';
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
// function comprobar_sexo()
// Comprueba el formato del sexo
//	alfabetico
//	mayor  a 3
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function comprobar_sexo()
{
 $comprobar=true;//boolean para determinar si se cumplen todas las comprobaciones
 $devolver=array();//array que contendrá todos los errores
 $nombrearray = array (
'nombreatributo' => '',
'codigoincidencia' => '',
'mensajeerror' => ''
);//array que contiene todos los valores que debe contener un error
	if(empty($this->sexo)){//comprobamos si el sexo es vacio
		$nombrearray['nombreatributo']='sexo';
		$nombrearray['codigoincidencia']='00001';
		$nombrearray['mensajeerror']='Atributo vacío';
		array_push($devolver,$nombrearray);//introducimos el error en el array de errores
		$comprobar=false;
	}
		if(strlen($this->sexo)>6){//comprobamos que la cadena no sea mayor de 6
		$nombrearray['nombreatributo']='sexo';
		$nombrearray['codigoincidencia']='00002';
		$nombrearray['mensajeerror']='Valor de atributo demasiado largo';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
	if(strlen($this->sexo)<3){//comprobamos que la cadena no sea menor que 1
		$nombrearray['nombreatributo']='sexo';
		$nombrearray['codigoincidencia']='00003';
		$nombrearray['mensajeerror']='Valor de atributo no numérico demasiado corto';
		array_push($devolver,$nombrearray);
		$comprobar=false;
	}
		if(strcmp($this->sexo,'hombre')!=0 && strcmp($this->sexo,'mujer')!=0){//comprobamos que cumple con el patron de  sexo
		$nombrearray['nombreatributo']='sexo';
		$nombrearray['codigoincidencia']='00100';
		$nombrearray['mensajeerror']='Solo se permiten los valores '.'hombre'.',mujer';
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
		$sql = "select * from USUARIOS where login = '".$this->login."'";
		//si no se realiza la consulta mostramos error
		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';
		}
		//si existe usuario con la misma clave mostramos error
		if ($result->num_rows==1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}
$sql = "INSERT INTO USUARIOS (
			login,
			password,
			nombre,
			apellidos,
			email,
			telefono,
			DNI,
			FechaNacimiento,
			fotopersonal,
			sexo) 
				VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->email."',
					'".$this->telefono."',
					'".$this->DNI."',
					'".$this->FechaNacimiento."',
					'".$this->fotopersonal."',
					'".$this->sexo."'
					)";

		if (!$this->mysqli->query($sql)) {//si no se realiza la consulta mostramos error
			return 'Error de gestor de base de datos';
		}
		else{//mostramos mensaje de exito
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
			FROM USUARIOS
			WHERE (
				login LIKE '%".$this->login."%' AND
				password LIKE '%".$this->password."%' AND
				nombre LIKE '%".$this->nombre."%' AND
				apellidos LIKE '%".$this->apellidos."%' AND
				email LIKE '%".$this->email."%' AND
				DNI LIKE '%".$this->DNI."%' AND
				telefono LIKE '%".$this->telefono."%' AND
				fotopersonal LIKE '%".$this->fotopersonal."%' AND
				FechaNacimiento LIKE '%".$this->FechaNacimiento."%' AND
				sexo LIKE '%".$this->sexo."%' 
			)
	";
	//si no se realiza la consulta mostramos mensaje de error
	if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;//devolvemos el resultado que se trata de una tupla
    
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	//realizamos el delete
	if($this->comprobar_login()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
   $sql = "	DELETE FROM 
   				USUARIOS
   			WHERE(
   				login = '$this->login'
   			)
   			";
   	//el delete se realizo con exito
    $filesql = " SELECT fotopersonal FROM USUARIOS WHERE login = '$this->login';";

   	$file = $this->mysqli->query($filesql);
   	$filename = $file->fetch_array()['fotopersonal'];

   	if ($this->mysqli->query($sql)) //Sentencia sql realizada con exito
	{
		$resultado = 'Borrado realizado con éxito';
				if($filename != ''){
				unlink($filename);				
			}
	}
	else
	{//el delete no se realizo mostramos mensaje de error
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	if($this->comprobar_login()!==true){//comprobamos si se validan correctamente los atributos clave
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	//realizamos consulta
    $sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";
	//si la consulta no se realizo mostramos mensaje de error
	if (!$resultado = $this->mysqli->query($sql))
	{
			return 'Error de gestor de base de datos';
	}else
	{//devolvemos la tupla con la informacion
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
	if($this->fotopersonal=="../Files/"){
		$sql = "UPDATE USUARIOS
			SET 
				password = '$this->password',
				nombre = '$this->nombre',
				apellidos = '$this->apellidos',
				email = '$this->email',
				telefono = '$this->telefono',
				DNI = '$this->DNI',
				FechaNacimiento = '$this->FechaNacimiento',
				sexo = '$this->sexo'
			WHERE (
				login = '$this->login'
			)
			";
		}else{
	//realizamos el update
	$sql = "UPDATE USUARIOS
			SET 
				password = '$this->password',
				nombre = '$this->nombre',
				apellidos = '$this->apellidos',
				email = '$this->email',
				telefono = '$this->telefono',
				fotopersonal = '$this->fotopersonal',
				DNI = '$this->DNI',
				FechaNacimiento = '$this->FechaNacimiento',
				sexo = '$this->sexo'
			WHERE (
				login = '$this->login'
			)
			";
		}
	//si se realizo mostramos mensaje de exito
	if ($this->mysqli->query($sql))
	{
		$resultado = 'Actualización realizada con éxito';
	}
	else
	{//no se realizo el update mostramos mensaje de error
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}
}

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
//comprobamos si los atrributos son correctos
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){

	if($this->comprobar_login()!==true &&$this->comprobar_password()!==true){//comprobamos si se validan correctamente todos los atributos
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
	
	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";

	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){//comprobamos si esisten usuarios con el mismo login
		return 'El login no existe';
	}
	else{//comprobamos si la password coincide
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{//la password no coincide
			return 'La password para este usuario no es correcta';
		}
	}
}
}//fin metodo login

//funcion para comprobar si se puede insertar el usuario
function Register(){
		//realizamos la consulta
		if($this->comprobar_login()!==true){//comprobamos si el login es correcto
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
		$sql = "select * from USUARIOS where login = '".$this->login."'";//realizamos la sentencia sql

		$result = $this->mysqli->query($sql);
		//comprobamos si existe un usuario con esa clave
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
			}
		else{//no existe ese usuario
	    		return true; //TEST : El usuario no existe

	}
}
}
//funcion para poder registrar usuarios
function registrar(){
//realizamos el insert
	if($this->comprobar_atributos()!==true){//comprobamos si se validan correctamente todos los atributos
		
			return $this->erroresdatos;//devolvemos el array con los errores
	}
	else{//sino realizamos la consulta
$sql = "INSERT INTO USUARIOS (
			login,
			password,
			nombre,
			apellidos,
			email,
			telefono,
			DNI,
			FechaNacimiento,
			fotopersonal,
			sexo) 
				VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->email."',
					'".$this->telefono."',
					'".$this->DNI."',
					'".$this->FechaNacimiento."',
					'".$this->fotopersonal."',
					'".$this->sexo."'
					)";
								
		if (!$this->mysqli->query($sql)) {//el insert no se realizo
			return 'Error de gestor de base de datos';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}
}

}//fin de clase


?> 