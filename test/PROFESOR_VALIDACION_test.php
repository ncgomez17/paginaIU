<?php
//Test : PROFESOR_VALIDACION_test.php
//Creado el : 5-12-2019
//Creado por: ncgomez17
//---
// Descripción : 
//	Fichero de test de validacion de la entidad PROFESOR para sus validaciones
//	Saca por pantalla el resultado de los test
//funcion para realizar el test de la validacion de dni
//devolvemos el array con los resultados obtenidos
function PROFESOR_DNI_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el DNI correcto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Atributo correcto';
	$PROFESOR_array_test1['error_esperado'] =true;
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$DNI ='44494151F';
	$profesor = new PROFESOR_Model($DNI,'','','','');
	$temp=$profesor->comprobar_DNI();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
}
else{

	$PROFESOR_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROFESOR_array_test1['error_obtenido']=$PROFESOR_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
// Comprobar el dni vacio
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Atributo vacío';
	$PROFESOR_array_test1['error_esperado'] ='00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$DNI ='';
	$profesor = new PROFESOR_Model($DNI,'','','','');
	$temp=$profesor->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//alamcenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	// Comprobar el dni demasiado largo
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$DNI = '44494151FT';
	$profesor = new PROFESOR_Model($DNI,'','','','');
	$temp=$profesor->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	// Comprobar el dni demasiado corto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$DNI = '1F';
	$profesor = new PROFESOR_Model($DNI,'','','','');
	$temp=$profesor->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos dni formato
	//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Formato dni erróneo';
	$PROFESOR_array_test1['error_esperado'] = '00010';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$DNI= '444A51F';
	$profesor = new PROFESOR_Model($DNI,'','','','');
	$temp=$profesor->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
    //comprobamos si el dni es valido
	//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Dni no válido';
	$PROFESOR_array_test1['error_esperado'] = '00011';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$DNI= '444A51T';
	$profesor = new PROFESOR_Model($DNI,'','','','');
	$temp=$profesor->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
//funcion para realizar el test de la validacion de nombreprofesor
//devolvemos el array con los resultados obtenidos
function PROFESOR_nombre_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el nombre correcto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'nombreProfesor';
	$PROFESOR_array_test1['error'] = 'Atributo correcto';
	$PROFESOR_array_test1['error_esperado'] =true;
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$nombreprofesor ='nicolas';
	$profesor = new PROFESOR_Model('',$nombreprofesor,'','','');
	$temp=$profesor->comprobar_nombreProfesor();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROFESOR_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROFESOR_array_test1['error_obtenido']=$PROFESOR_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
// Comprobar el nombre vacio
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'nombreProfesor';
	$PROFESOR_array_test1['error'] = 'Atributo vacío';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$nombre = '';
	$profesor = new PROFESOR_Model('',$nombre,'','','');
	$temp=$profesor->comprobar_nombreProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si coincide
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
//comprobamos si nombre es demasiado largo
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'nombreProfesor';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$nombre = '';
	for($i=0;$i<=50; $i++){
		$nombre=$nombre.'a';//rellenamos el atributo
	}
	$profesor = new PROFESOR_Model('',$nombre,'','','');
	$temp=$profesor->comprobar_nombreProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos si nombre es demasiado corto
//-------------------------------------------------------------------------------

	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'nombreProfesor';
	$PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$nombre = 'aa';
	$profesor = new PROFESOR_Model('',$nombre,'','','');
	$temp=$profesor->comprobar_nombreProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos nombre formato invalido
	//-------------------------------------------------------------------------------

	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'nombreProfesor';
	$PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$PROFESOR_array_test1['error_esperado'] = '00030';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$nombre = '1a-';
	$profesor = new PROFESOR_Model('',$nombre,'','','');
	$temp=$profesor->comprobar_nombreProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
//funcion para realizar el test de la validacion de apellidosprofesor
//devolvemos el array con los resultados obtenidos
function PROFESOR_apellidos_profesor_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el apellidosprofesor correcto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'apellidosProfesor';
	$PROFESOR_array_test1['error'] = 'Atributo correcto';
	$PROFESOR_array_test1['error_esperado'] =true;
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$apellidos ='44494151F';
	$profesor = new PROFESOR_Model('','',$apellidos,'','');
	$temp=$profesor->comprobar_apellidosProfesor();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROFESOR_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROFESOR_array_test1['error_obtenido']=$PROFESOR_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
// Comprobar apellidos vacio
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'apellidosProfesor';
	$PROFESOR_array_test1['error'] = 'Atributo vacío';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$apellidos = '';
	$profesor = new PROFESOR_Model('','',$apellidos,'','');
	$temp=$profesor->comprobar_apellidosProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si coincide
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
//comprobamos si apellidos es demasiado largo
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'apellidosProfesor';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$apellidos ='';
		for($i=0;$i<=30; $i++){
		$apellidos=$apellidos.'a';//rellenamos el atributo
	}
	$profesor = new PROFESOR_Model('','',$apellidos,'','');
	$temp=$profesor->comprobar_apellidosProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos si apellidos es demasiado corto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'apellidosProfesor';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$apellidosProfesor = 'a';
	$profesor = new PROFESOR_Model('','',$apellidosProfesor,'','');
	$temp=$profesor->comprobar_apellidosProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos si apellidos tiene el formato correcto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'apellidosProfesor';
	$PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$PROFESOR_array_test1['error_esperado'] = '00030';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$apellidos = 'hola a2';
	$profesor = new PROFESOR_Model('','',$apellidos,'','');
	$temp=$profesor->comprobar_apellidosProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
//funcion para realizar el test de la validacion de areaprofesor
//devolvemos el array con los resultados obtenidos
function PROFESOR_area_profesor_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el areaprofesor correcto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'areaProfesor';
	$PROFESOR_array_test1['error'] = 'Atributo correcto';
	$PROFESOR_array_test1['error_esperado'] =true;
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$area ='doscientos';
	$profesor = new PROFESOR_Model('','','',$area,'');
	$temp=$profesor->comprobar_areaProfesor();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROFESOR_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROFESOR_array_test1['error_obtenido']=$PROFESOR_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
// Comprobar el areaprofesor vacio
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'areaProfesor';
	$PROFESOR_array_test1['error'] = 'Atributo vacío';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$area = '';
	$profesor = new PROFESOR_Model('','','',$area,'');
	$temp=$profesor->comprobar_areaProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
//comprobamos si areaprofesor es demasiado largo
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'areaProfesor';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$area='';
	for($i=0;$i<=60; $i++){
		$area=$area.'a';//rellenamos el atributo
	}
	$profesor = new PROFESOR_Model('','','',$area,'');
	$temp=$profesor->comprobar_areaProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos si areaprofesor es demasiado corto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'areaProfesor';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$area = 'a';
	$profesor = new PROFESOR_Model('','','',$area,'');
	$temp=$profesor->comprobar_areaProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos formato areaprofesor
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'areaProfesor';
	$PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$PROFESOR_array_test1['error_esperado'] = '00030';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$area = 'abs1';
	$profesor = new PROFESOR_Model('','','',$area,'');
	$temp=$profesor->comprobar_areaProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
//funcion para realizar el test de la validacion de departamentoprofesor
//devolvemos el array con los resultados obtenidos
function PROFESOR_departamento_profesor_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el departamentoprofesor correcto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'departamentoProfesor';
	$PROFESOR_array_test1['error'] = 'Atributo correcto';
	$PROFESOR_array_test1['error_esperado'] =true;
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$departamento ='ciencias';
	$profesor = new PROFESOR_Model('','','','',$departamento);
	$temp=$profesor->comprobar_departamentoProfesor();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROFESOR_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROFESOR_array_test1['error_obtenido']=$PROFESOR_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
// Comprobar el departamentoprofesor vacio
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'departamentoProfesor';
	$PROFESOR_array_test1['error'] = 'Atributo vacío';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$departamento = '';
	$profesor = new PROFESOR_Model('','','','',$departamento);
	$temp=$profesor->comprobar_departamentoProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si coincide
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
//comprobamos si departamentoprofesor demasiado largo
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'departamentoProfesor';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$departamento='';
	for($i=0;$i<=60; $i++){
		$departamento=$departamento.'a';//rellenamos atrbuto
	}
	$profesor = new PROFESOR_Model('','','','',$departamento);
	$temp=$profesor->comprobar_departamentoProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay concidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos departamentoprofesor es demasiado corto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'departamentoProfesor';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$departamento = 'a';
	$profesor = new PROFESOR_Model('','','','',$departamento);
	$temp=$profesor->comprobar_departamentoProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
	//comprobamos si departamentoprofesor cumple con el formato
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'departamentoProfesor';
	$PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$PROFESOR_array_test1['error_esperado'] = '00030';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	$departamento = 'abs1';
	$profesor = new PROFESOR_Model('','','','',$departamento);
	$temp=$profesor->comprobar_departamentoProfesor();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROFESOR_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos a los errores
	
}
	if (strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
	$profesor->DELETE();
}
//funcion para realizar el test de la validacion de comprobar_atributos
//dos o mas atributos mal
//devolvemos el array con los resultados obtenidos
function PROFESOR_comprobar_atributos_mal_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'comprobar_atributos';
	$PROFESOR_array_test1['error'] = 'Con dos atributos o más mal';
	$PROFESOR_array_test1['error_esperado'] = '00011';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	//creamos un usuario con atributos incorrectos
	$DNI = '44494151FT';
	$nombreprofesor = 'nicolas';
	$apellidosprofesor = 'cid2';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'algebra';
	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
	$temp=$profesor->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$PROFESOR_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';//almacenamos los errores
	}
	}
	if(strpos($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado'])!==false){//miramos si hay coincidencia
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else{
		$PROFESOR_array_test1['resultado'] = 'FALSE';	
	}
	}
	else{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);	
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function PROFESOR_comprobar_atributos_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'comprobar_atributos';
	$PROFESOR_array_test1['error'] = 'Con todos los atributos bien devuelve true';
	$PROFESOR_array_test1['error_esperado'] = true;
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	//creamos un usuario con atributos correctos
	$DNI = '44494151F';
	$nombreprofesor = 'nicolas';
	$apellidosprofesor = 'cid';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'algebra';
	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
	$temp=$profesor->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$PROFESOR_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';//almacenamos los errores
	}
	}
	}
	else{
		$PROFESOR_array_test1['error_obtenido'] = true;
	}
	if ($PROFESOR_array_test1['error_obtenido']===$PROFESOR_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
}
//llamamos a las funciones
PROFESOR_DNI_validacion();
PROFESOR_apellidos_profesor_validacion();
PROFESOR_nombre_validacion();
PROFESOR_area_profesor_validacion();
PROFESOR_departamento_profesor_validacion();
PROFESOR_comprobar_atributos_test();
PROFESOR_comprobar_atributos_mal_test();
?>