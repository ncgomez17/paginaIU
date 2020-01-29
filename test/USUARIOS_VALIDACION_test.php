<?php
//Test : USUARIOS_VALIDACION_test.php
//Creado el : 5-12-2019
//Creado por: ncgomez17
//---
// Descripción : 
//	Fichero de test de validacion de la entidad USUARIOS para sus validaciones
//	Saca por pantalla el resultado de los test
//funcion para realizar el test de la validacion de login
//devolvemos el array con los resultados obtenidos
function USUARIOS_login_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual

	// Comprobar el login correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'nicolas';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
	$temp=$usuarios->comprobar_login();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] ='00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = '';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
	$temp=$usuarios->comprobar_login();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	// Comprobar el login demasiado largo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
	$temp=$usuarios->comprobar_login();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincdencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	// Comprobar el login demasiado largo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00003';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'a';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
	$temp=$usuarios->comprobar_login();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos el formato del login
	//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Solo se permiten alfabéticos';
	$USUARIOS_array_test1['error_esperado'] = '000090';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = '1';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
	$temp=$usuarios->comprobar_login();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
//funcion para realizar el test de la validacion de password
//devolvemos el array con los resultados obtenidos
function USUARIOS_password_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el password correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'password';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$password = 'contraseña';
	$usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
	$temp=$usuarios->comprobar_password();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso si devuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el password vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'password';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$password = '';
	$usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
	$temp=$usuarios->comprobar_password();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincdencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//comprobamos si el password es demasiado largo
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'password';
	$USUARIOS_array_test1['error'] = 'Password demasiado larga';
	$USUARIOS_array_test1['error_esperado'] = '00005';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$password = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
	$temp=$usuarios->comprobar_password();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos password demasiado corta
//-------------------------------------------------------------------------------

	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'password';
	$USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00003';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$password = 'a';
	$usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
	$temp=$usuarios->comprobar_password();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//-------------------------------------------------------------------------------
//comprobamos el formato de la password
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'password';
	$USUARIOS_array_test1['error'] = 'Solo se permiten alfabéticos';
	$USUARIOS_array_test1['error_esperado'] = '000090';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$password = '1';
	$usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
	$temp=$usuarios->comprobar_password();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
//funcion para realizar el test de la validacion de nombre
//devolvemos el array con los resultados obtenidos
function USUARIOS_nombre_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el nombre correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'nombre';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$nombre = 'nicolas';
	$usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
	$temp=$usuarios->comprobar_nombre();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el nombre vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'nombre';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$nombre = '';
	$usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
	$temp=$usuarios->comprobar_nombre();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//comprobamos si nombre demasiado largo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'nombre';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$nombre ='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
	$temp=$usuarios->comprobar_nombre();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si nombre es demasiado corto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'nombre';
	$USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00003';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$nombre = 'a';
	$usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
	$temp=$usuarios->comprobar_nombre();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si nombre cumple el formato
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'nombre';
	$USUARIOS_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$USUARIOS_array_test1['error_esperado'] = '00030';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$nombre = '12';
	$usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
	$temp=$usuarios->comprobar_nombre();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
//funcion para realizar el test de la validacion de apellidos
//devolvemos el array con los resultados obtenidos
function USUARIOS_apellidos_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el apellidos correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'apellidos';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$apellidos = 'gomez';
	$usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
	$temp=$usuarios->comprobar_apellidos();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el apellidos vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'apellidos';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$apellidos = '';
	$usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
	$temp=$usuarios->comprobar_apellidos();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//comprobamos si apellidos es demasiado largo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'apellidos';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$apellidos='';
	for($i=0;$i<=50; $i++){
		$apellidos=$apellidos.'a';//rellenamos el atrbuto
	}
	$usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
	$temp=$usuarios->comprobar_apellidos();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si apellidos es demasiado corto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'apellidos';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00003';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$apellidos = 'a';
	$usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
	$temp=$usuarios->comprobar_apellidos();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si apellidos cumple con el formato
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'apellidos';
	$USUARIOS_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$USUARIOS_array_test1['error_esperado'] = '00030';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$apellidos = '12';
	$usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
	$temp=$usuarios->comprobar_apellidos();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincdencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
//funcion para realizar el test de la validacion de email
//devolvemos el array con los resultados obtenidos
function USUARIOS_email_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el email correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'email';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$email = 'nicolas@nico.es';
	$usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
	$temp=$usuarios->comprobar_email();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el email vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'email';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$email = '';
	$usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
	$temp=$usuarios->comprobar_email();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//comprobamos si email es demasiado largo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'email';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$email='';
	for($i=0;$i<=60; $i++){
		$email=$email.'a';//rellenamos el atributo
	}
	$usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
	$temp=$usuarios->comprobar_email();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si email demasiado corto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'email';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00003';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$email = 'a';
	$usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
	$temp=$usuarios->comprobar_email();//llamamos a la funcion de comprobacion 
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos el formato de email
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'email';
	$USUARIOS_array_test1['error'] = 'Formato email erroneo';
	$USUARIOS_array_test1['error_esperado'] = '00120';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$email = 'nico@n';
	$usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
	$temp=$usuarios->comprobar_email();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
//funcion para realizar el test de la validacion de DNI
//devolvemos el array con los resultados obtenidos
function USUARIOS_DNI_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el dni correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$DNI = '44494151F';
	$usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
	$temp=$usuarios->comprobar_DNI();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el dni vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$DNI = '';
	$usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
	$temp=$usuarios->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//comprobamos si dni es demasiado largo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$DNI='';
	for($i=0;$i<=9; $i++){
		$DNI=$DNI.'a';//rellenamos el atributo
	}
	$usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
	$temp=$usuarios->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si dni es demasiado corto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00003';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$DNI = '12';
	$usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
	$temp=$usuarios->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si dni es erroreo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Formato dni erróneo';
	$USUARIOS_array_test1['error_esperado'] = '00010';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$DNI = '999456789';//introducimos nueve numeros
	$usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
	$temp=$usuarios->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobacion de dni no valido
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Dni no válido';
	$USUARIOS_array_test1['error_esperado'] = '00011';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$DNI = '44494151T';//introducimos un dni con una letra incorrecta
	$usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
	$temp=$usuarios->comprobar_DNI();//llamamos a la funcionde comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//-------------------------------------------------------------------------------

}
//funcion para realizar el test de la validacion de telefono
//devolvemos el array con los resultados obtenidos
function USUARIOS_telefono_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el telefono correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'telefono';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$telefono = '683399685';
	$usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
	$temp=$usuarios->comprobar_telefono();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el telefono vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'telefono';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$telefono = '';
	$usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
	$temp=$usuarios->comprobar_telefono();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos a los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//comprobamos si telefono demasiado largo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'telefono';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$telefono='';
	for($i=0;$i<=11; $i++){
		$telefono=$telefono.'1';//rellenamos el atributo
	}
	$usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
	$temp=$usuarios->comprobar_telefono();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos a los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si telefono es demasiado corto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'telefono';
	$USUARIOS_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00004';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$telefono ='';
	$usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
	$temp=$usuarios->comprobar_telefono();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos a los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si telefono cumple con el formato
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'telefono';
	$USUARIOS_array_test1['error'] = 'Teléfono no válido';
	$USUARIOS_array_test1['error_esperado'] = '00006';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$telefono ='68439A224';//introducimos una letra en el medio
	$usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
	$temp=$usuarios->comprobar_telefono();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coicidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
//funcion para realizar el test de la validacion de fecha
//devolvemos el array con los resultados obtenidos
function USUARIOS_fecha_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar la fecha correcta
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'FechaNacimiento';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$fecha = '2019-05-29';
	$usuarios = new USUARIOS_Model('','','','','','','',$fecha,'','');
	$temp=$usuarios->comprobar_fecha();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//almacenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el fecha vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'FechaNacimiento';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$fecha = '';
	$usuarios = new USUARIOS_Model('','','','','','','',$fecha,'','');
	$temp=$usuarios->comprobar_fecha();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//comprobamos si fecha es demasiada larga
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'FechaNacimiento';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$fecha='';
	for($i=0;$i<=11; $i++){
		$fecha=$fecha.'1';//rellenamos el atributo
	}
	$usuarios = new USUARIOS_Model('','','','','','','',$fecha,'','');
	$temp=$usuarios->comprobar_fecha();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos fecha demasiado corto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'FechaNacimiento';
	$USUARIOS_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00004';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$fecha = '';
	$usuarios = new USUARIOS_Model('','','','','','','',$fecha,'','');
	$temp=$usuarios->comprobar_fecha();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos el error
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos el formato de fecha
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'FechaNacimiento';
	$USUARIOS_array_test1['error'] = 'Formato fecha erróneo';
	$USUARIOS_array_test1['error_esperado'] = '00020';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$fecha = '27-08-2019';//introducimos una fecha con un formato erroneo
	$usuarios = new USUARIOS_Model('','','','','','','',$fecha,'','');
	$temp=$usuarios->comprobar_fecha();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos s hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
//funcion para realizar el test de la validacion de sexo
//devolvemos el array con los resultados obtenidos
function USUARIOS_sexo_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el sexo correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'sexo';
	$USUARIOS_array_test1['error'] = 'Atributo correcto';
	$USUARIOS_array_test1['error_esperado'] =true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$sexo = 'nicolas';
	$usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
	$temp=$usuarios->comprobar_sexo();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$USUARIOS_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($USUARIOS_array_test1['error_obtenido']=$USUARIOS_array_test1['error_esperado']==true)//miramos si coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
// Comprobar el sexo vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'sexo';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$sexo = '';
	$usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
	$temp=$usuarios->comprobar_sexo();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobar sexo demasiado corto
	//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'sexo';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$sexo='hombree';
	$usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
	$temp=$usuarios->comprobar_sexo();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
//comprobamos si sexo es demasiado corto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'sexo';
	$USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00003';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$sexo='ho';
	$usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
	$temp=$usuarios->comprobar_sexo();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si sexo es hombre o mujer
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'sexo';
	$USUARIOS_array_test1['error'] = 'Solo se permiten los valores '.'hombre'.',mujer';
	$USUARIOS_array_test1['error_esperado'] = '00100';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$sexo = 'hombree';
	$usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
	$temp=$usuarios->comprobar_sexo();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$USUARIOS_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
	$usuarios->DELETE();
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function USUARIOS_comprobar_atributos_mal_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'comprobar_atributos';
	$USUARIOS_array_test1['error'] = 'Con dos atributos o más mal';
	$USUARIOS_array_test1['error_esperado'] = '000090';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	//creamos un usuario con atributos incorrectos
	$login = '1233';//indicamos un login mal con caracteres numericos
	$password = 'mipassword';
	$nombre = 'nicolas'; 
	$apellidos = 'nicolas';
	$email = 'miemail@uvigo.es';
	$DNI = '44494151T';//DNI con la letra mal
	$telefono = '988220099';
	$FechaNacimiento = '2019-5-27';
	$fotopersonal = '';
	$sexo = 'hombre';
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
	$temp=$usuarios->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$USUARIOS_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';//almacenamos los errores
	}
	}
	if(strpos($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado'])!==false){//miramos si hay coincidencia
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else{
		$USUARIOS_array_test1['resultado'] = 'FALSE';	
	}
	}
	else{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);	
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function USUARIOS_comprobar_atributos_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar atributos correctos
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'comprobar_atributos';
	$USUARIOS_array_test1['error'] = 'Con todos los atributos bien devuelve true';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'nicolas'; 
	$apellidos = 'nicolas';
	$email = 'miemail@uvigo.es';
	$DNI = '44494151F';
	$telefono = '988220099';
	$FechaNacimiento = '2019-05-27';
	$fotopersonal = '';
	$sexo = 'hombre';
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
	$temp=$usuarios->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$USUARIOS_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';//almacenamos los errores
	}
	}
	}
	else{
		$USUARIOS_array_test1['error_obtenido'] = true;
	}
	if ($USUARIOS_array_test1['error_obtenido']===$USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
}
//llamamos a las funciones
USUARIOS_login_validacion();
USUARIOS_password_validacion();
USUARIOS_nombre_validacion();
USUARIOS_apellidos_validacion();
USUARIOS_email_validacion();
USUARIOS_DNI_validacion();
USUARIOS_telefono_validacion();
USUARIOS_fecha_validacion();
USUARIOS_sexo_validacion();
USUARIOS_comprobar_atributos_test();
USUARIOS_comprobar_atributos_mal_test();
?>