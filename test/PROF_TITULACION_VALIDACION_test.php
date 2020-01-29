<?php
//Test : PROF_TITULACION_VALIDACION_test.php
//Creado el : 5-12-2019
//Creado por: ncgomez17
//---
// Descripción : 
//	Fichero de test de validacion de la entidad PROF_TITULACION para sus validaciones
//	Saca por pantalla el resultado de los test
//funcion para realizar el test de la validacion de dni
//devolvemos el array con los resultados obtenidos
function PROF_TITULACION_DNI_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el DNI correcto
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Atributo correcto';
	$PROF_TITULACION_array_test1['error_esperado'] =true;
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$DNI ='44494151F';
	$prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
	$temp=$prof_titulacion->comprobar_DNI();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROF_TITULACION_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROF_TITULACION_array_test1['error_obtenido']=$PROF_TITULACION_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
}
// Comprobar el dni vacio
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
	$PROF_TITULACION_array_test1['error_esperado'] ='00001';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$DNI ='';
	$prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
	$temp=$prof_titulacion->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
	// Comprobar el dni demasiado largo
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00002';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$DNI = '44494151FT';
	$prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
	$temp=$prof_titulacion->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
	// Comprobar el dni demasiado corto
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$PROF_TITULACION_array_test1['error_esperado'] = '00003';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$DNI = '1F';
	$prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
	$temp=$prof_titulacion->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
	//comprobamos dni formato erroreo
	//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Formato dni erróneo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00010';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$DNI= '444A51F';
	$prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
	$temp=$prof_titulacion->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
	//comprobamos formato de dni no valido
	//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Dni no válido';
	$PROF_TITULACION_array_test1['error_esperado'] = '00011';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$DNI= '444A51T';
	$prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
	$temp=$prof_titulacion->comprobar_DNI();//llamamos a la funcion de comprobacion de dni
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
}
//funcion para realizar el test de la validacion de codtitulacion
//devolvemos el array con los resultados obtenidos
function PROF_TITULACION_codTitulacion_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codTitulacion correcto
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'codTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'Atributo correcto';
	$PROF_TITULACION_array_test1['error_esperado'] =true;
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$codTitulacion ='hola';
	$prof_titulacion = new PROF_TITULACION_Model('',$codTitulacion,'');
	$temp=$prof_titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROF_TITULACION_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROF_TITULACION_array_test1['error_obtenido']=$PROF_TITULACION_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
}
// Comprobar el codtitulacion vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] ='00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codTitulación ='';
	$prof_titulacion = new PROF_TITULACION_Model('',$codTitulación,'','');
	$temp=$prof_titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$prof_titulacion->DELETE();
	// Comprobar el codtitulacion demasiado largo
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codTitulación = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$prof_titulacion = new PROF_TITULACION_Model('',$codTitulación,'');
	$temp=$prof_titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$prof_titulacion->DELETE();
	// Comprobar el dni demasiado corto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codTitulación = 'aa';
	$prof_titulacion = new PROF_TITULACION_Model('',$codTitulación,'');
	$temp=$prof_titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$prof_titulacion->DELETE();
	//comprobamos codtitulacion no cumple el formato
	//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Solo se permiten alfabéticos y números';
	$TITULACION_array_test1['error_esperado'] = '00060';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codTitulación = '---';
	$prof_titulacion = new PROF_TITULACION_Model('',$codTitulación,'');
	$temp=$prof_titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$prof_titulacion->DELETE();
}
//funcion para realizar el test de la validacion de anhoaademico
//devolvemos el array con los resultados obtenidos
function PROF_TITULACION_anhoacademico_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el anhoacademico correcto
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'anhoacademico';
	$PROF_TITULACION_array_test1['error'] = 'Atributo correcto';
	$PROF_TITULACION_array_test1['error_esperado'] =true;
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$anhoacademico ='2019-2018';
	$prof_titulacion = new PROF_TITULACION_Model('','',$anhoacademico);
	$temp=$prof_titulacion->comprobar_anhoacademico();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROF_TITULACION_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROF_TITULACION_array_test1['error_obtenido']=$PROF_TITULACION_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
}
// Comprobar el anhoacademico vacio
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'anhoacademico';
	$PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
	$PROF_TITULACION_array_test1['error_esperado'] = '00001';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$fecha = '';
	$prof_titulacion = new PROF_TITULACION_Model('','',$fecha);
	$temp=$prof_titulacion->comprobar_anhoacademico();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
//comprobamos anhoacademico demasiado largo
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'anhoacademico';
	$PROF_TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00002';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$fecha ='';
		for($i=0;$i<=9; $i++){
		$fecha=$fecha.'a';//rellenamos el atributo
	}
	$prof_titulacion = new PROF_TITULACION_Model('','',$fecha);
	$temp=$prof_titulacion->comprobar_anhoacademico();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
//comprobamos anhoacademico demasiado corto
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'anhoacademico';
	$PROF_TITULACION_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
	$PROF_TITULACION_array_test1['error_esperado'] = '00004';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$fecha= '';
	$prof_titulacion = new PROF_TITULACION_Model('','',$fecha);
	$temp=$prof_titulacion->comprobar_anhoacademico();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();

//comprobamos anhoacademico no cumple el formato
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'anhoacademico';
	$PROF_TITULACION_array_test1['error'] = 'Solo se permiten dddd-dddd (año académico) donde d es un dígito';
	$PROF_TITULACION_array_test1['error_esperado'] = '00110';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	$fecha = '2019,2018';
	$prof_titulacion = new PROF_TITULACION_Model('','',$fecha);
	$temp=$prof_titulacion->comprobar_anhoacademico();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
	$prof_titulacion->DELETE();
}

//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function PROF_TITULACION_comprobar_atributos_mal_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'comprobar_atributos';
	$PROF_TITULACION_array_test1['error'] = 'Con dos atributos o más mal';
	$PROF_TITULACION_array_test1['error_esperado'] = '00110';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	//creamos un usuario con atributos incorrectos
	$DNI = '44494151FT';
	$codTitulación = 'nicolas';
	$anhoacademico = '2019,2018';
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulación,$anhoacademico);
	$temp=$prof_titulacion->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){//si es distinto de true recorremos el array
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$PROF_TITULACION_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	if(strpos($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado'])!==false){//miramos si hay coincidencia
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';	
	}
	}
	else{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);	
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function PROF_TITULACION_comprobar_atributos_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'comprobar_atributos';
	$PROF_TITULACION_array_test1['error'] = 'Con todos los atributos bien devuelve true';
	$PROF_TITULACION_array_test1['error_esperado'] = true;
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	//creamos un usuario con atributos correctos
	$DNI = '44494151F';
	$codTitulación = 'nicolas';
	$anhoacademico = '2019-2018';
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulación,$anhoacademico);
	$temp=$prof_titulacion->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){//si es distinto de true recorremos el array
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$PROF_TITULACION_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	}
	else{
		$PROF_TITULACION_array_test1['error_obtenido'] = true;
	}
	if ($PROF_TITULACION_array_test1['error_obtenido']===$PROF_TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
}
//llamamos a las funciones
PROF_TITULACION_DNI_validacion();
PROF_TITULACION_codTitulacion_validacion();
PROF_TITULACION_anhoacademico_validacion();
PROF_TITULACION_comprobar_atributos_test();
PROF_TITULACION_comprobar_atributos_mal_test();
?>