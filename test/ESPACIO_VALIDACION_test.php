<?php
//Test : ESPACIO_VALIDACION_test.php
//Creado el : 5-12-2019
//Creado por: ncgomez17
//---
// Descripción : 
//	Fichero de test de validacion de la entidad ESPACIO para sus validaciones
//	Saca por pantalla el resultado de los test
//funcion para realizar el test de la validacion de codEspacio
//devolvemos el array con los resultados obtenidos
function ESPACIO_codEspacio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codEspacio correcto
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEspacio';
	$ESPACIO_array_test1['error'] = 'Atributo correcto';
	$ESPACIO_array_test1['error_esperado'] =true;
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEspacio = 'holaa';
	$espacio = new ESPACIO_Model($codEspacio,'','','','','');
	$temp=$espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$ESPACIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($ESPACIO_array_test1['error_obtenido']=$ESPACIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
// Comprobar codEspacio vacio
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEspacio';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEspacio = '';
	$espacio = new ESPACIO_Model($codEspacio,'','','','','');
	$temp=$espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
// Comprobar codEspacio demasiado largo
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEspacio';
	$ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEspacio = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$espacio = new ESPACIO_Model($codEspacio,'','','','','');
	$temp=$espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincdencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar codEspacio demasiado corto

	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEspacio';
	$ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00003';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEspacio = 'a';
	$espacio = new ESPACIO_Model($codEspacio,'','','','','');
	$temp=$espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
	//-------------------------------------------------------------------------------
	// Comprobar codEspacio no cumple el formato

	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEspacio';
	$ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
	$ESPACIO_array_test1['error_esperado'] = '00040';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEspacio = 'aa1,';
	$espacio = new ESPACIO_Model($codEspacio,'','','','','');
	$temp=$espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
//funcion para realizar el test de la validacion de codEdificio
//devolvemos el array con los resultados obtenidos
function ESPACIO_codEdificio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codEdificio correcto
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEdificio';
	$ESPACIO_array_test1['error'] = 'Atributo correcto';
	$ESPACIO_array_test1['error_esperado'] =true;
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEdificio = 'holaa';
	$espacio = new ESPACIO_Model('','',$codEdificio,'','','');
	$temp=$espacio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$ESPACIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($ESPACIO_array_test1['error_obtenido']=$ESPACIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
// Comprobar codEdificio vacio
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEdificio';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEdificio = '';
	$espacio = new ESPACIO_Model('',$codEdificio,'','','','');
	$temp=$espacio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();

//-------------------------------------------------------------------------------
	// Comprobar codEdificio demasiado largo
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEdificio';
	$ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEdificio ='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$espacio = new ESPACIO_Model('',$codEdificio,'','','','');
	$temp=$espacio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar codEdificio demasiado corto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEdificio';
	$ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00003';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEdificio = 'a';
	$espacio = new ESPACIO_Model('',$codEdificio,'','','','');
	$temp=$espacio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar codEdificio cumple con el formato
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codEdificio';
	$ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
	$ESPACIO_array_test1['error_esperado'] = '00040';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEdificio = 'ab2,';
	$espacio = new ESPACIO_Model('',$codEdificio,'','','','');
	$temp=$espacio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
//funcion para realizar el test de la validacion de codCentro
//devolvemos el array con los resultados obtenidos
function ESPACIO_codCentro_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codcentro correcto
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codCentro';
	$ESPACIO_array_test1['error'] = 'Atributo correcto';
	$ESPACIO_array_test1['error_esperado'] =true;
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codcentro = 'holaa';
	$espacio = new ESPACIO_Model('',$codcentro,'','','','');
	$temp=$espacio->comprobar_codCentro();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$ESPACIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($ESPACIO_array_test1['error_obtenido']=$ESPACIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
// Comprobar codCentro vacio
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codCentro';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codCentro = '';
	$espacio = new ESPACIO_Model('','',$codCentro,'','','');
	$temp=$espacio->comprobar_codCentro();//llamamos a la funcion de comrpobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();

//-------------------------------------------------------------------------------

// Comprobar codCentro demasiado largo
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codCentro';
	$ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codCentro ='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$espacio = new ESPACIO_Model('','',$codCentro,'','','');
	$temp=$espacio->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------

// Comprobar codCentro demasiado corto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codCentro';
	$ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00003';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codCentro = 'a';
	$espacio = new ESPACIO_Model('','',$codCentro,'','','');
	$temp=$espacio->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
// Comprobar codCentro no cumple el formato
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'codCentro';
	$ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
	$ESPACIO_array_test1['error_esperado'] = '00040';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codCentro = 'ab2,';
	$espacio = new ESPACIO_Model('','',$codCentro,'','','');
	$temp=$espacio->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
//funcion para realizar el test de la validacion de superficieEspacio
//devolvemos el array con los resultados obtenidos
function ESPACIO_superficieEspacio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual

	// Comprobar el superficieEspacio correcto
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'superficieEspacio';
	$ESPACIO_array_test1['error'] = 'Atributo correcto';
	$ESPACIO_array_test1['error_esperado'] =true;
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$superficie = '233';
	$espacio = new ESPACIO_Model('','','','','',$superficie);
	$temp=$espacio->comprobar_superficieEspacio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$ESPACIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($ESPACIO_array_test1['error_obtenido']=$ESPACIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
// Comprobar superficieEspacio vacio
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'superficieEspacio';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$superficie = '';
	$espacio = new ESPACIO_Model('','','','',$superficie,'');
	$temp=$espacio->comprobar_superficieEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();

//-------------------------------------------------------------------------------
	// Comprobar superficieEspacio atributo demasiado largo
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'superficieEspacio';
	$ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$superficie='';
	for($i=0;$i<=4; $i++){
		$superficie=$superficie.'1';//rellenamos el array
	}
	$espacio = new ESPACIO_Model('','','','',$superficie,'');
	$temp=$espacio->comprobar_superficieEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar superficieEspacio demasiado corto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'superficieEspacio';
	$ESPACIO_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00004';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$superficie = '';
	$espacio = new ESPACIO_Model('','','','',$superficie,'');
	$temp=$espacio->comprobar_superficieEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar superficieEspacio no cumple el formato
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'superficieEspacio';
	$ESPACIO_array_test1['error'] = 'Solo se permiten números';
	$ESPACIO_array_test1['error_esperado'] = '00070';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$superficie = 'abc';
	$espacio = new ESPACIO_Model('','','','',$superficie,'');
	$temp=$espacio->comprobar_superficieEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
//funcion para realizar el test de la validacion de numeroInventario
//devolvemos el array con los resultados obtenidos
function ESPACIO_numerodeInventarioEspacio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el numeroInventario correcto
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'numeroInventario';
	$ESPACIO_array_test1['error'] = 'Atributo correcto';
	$ESPACIO_array_test1['error_esperado'] =true;
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$numero = '244';
	$espacio = new ESPACIO_Model('','','','','',$numero);
	$temp=$espacio->comprobar_numeroInventario();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$ESPACIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($ESPACIO_array_test1['error_obtenido']=$ESPACIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
// Comprobar numeroInventario vacio
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'numeroInventario';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$numero = '';
	$espacio = new ESPACIO_Model('','','','','',$numero);
	$temp=$espacio->comprobar_numeroInventario();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();

//-------------------------------------------------------------------------------
	// Comprobar numeroInventario demasiado largo
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'numeroInventario';
	$ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$numero='';
	for($i=0;$i<=8; $i++){
		$numero=$numero.'1';//rellenamos el atributo
	}
	$espacio = new ESPACIO_Model('','','','','',$numero);
	$temp=$espacio->comprobar_numeroInventario();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar numeroInventario demasiado corto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'numeroInventario';
	$ESPACIO_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00004';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$numero = '';
	$espacio = new ESPACIO_Model('','','','','',$numero);
	$temp=$espacio->comprobar_numeroInventario();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar numeroInventario cumple el formato
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'numeroInventario';
	$ESPACIO_array_test1['error'] = 'Solo se permiten números';
	$ESPACIO_array_test1['error_esperado'] = '00070';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$numero = 'abc';
	$espacio = new ESPACIO_Model('','','','','',$numero);
	$temp=$espacio->comprobar_numeroInventario();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
//funcion para realizar el test de la validacion de tipo
//devolvemos el array con los resultados obtenidos
function ESPACIO_tipo_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el tipo correcto
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'tipo';
	$ESPACIO_array_test1['error'] = 'Atributo correcto';
	$ESPACIO_array_test1['error_esperado'] =true;
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$tipo = 'PAS';
	$espacio = new ESPACIO_Model('','','',$tipo,'','');
	$temp=$espacio->comprobar_tipo();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$ESPACIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($ESPACIO_array_test1['error_obtenido']=$ESPACIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
// Comprobar el tipo vacio
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'tipo';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$tipo = '';
	$espacio = new ESPACIO_Model('','','',$tipo,'','');
	$temp=$espacio->comprobar_tipo();//llamamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
	//-------------------------------------------------------------------------------
	// Comprobar el tipo es demasiado largo
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'tipo';
	$ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$tipo = 'laboratorioo';
	$espacio = new ESPACIO_Model('','','',$tipo,'','');
	$temp=$espacio->comprobar_tipo();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();

//-------------------------------------------------------------------------------
	// Comprobar el tipo demasiado corto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'tipo';
	$ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00003';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$tipo='ho';
	$espacio = new ESPACIO_Model('','','',$tipo,'','');
	$temp=$espacio->comprobar_tipo();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar el tipo si cumple con el formato
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'tipo';
	$ESPACIO_array_test1['error'] = 'Solo se permiten los valores '.'DESPACHO,'.'LABORATORIO,'.'PAS';
	$ESPACIO_array_test1['error_esperado'] = '00080';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$tipo = 'DESPACHOOO';
	$espacio = new ESPACIO_Model('','','',$tipo,'','');
	$temp=$espacio->comprobar_tipo();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
	$espacio->DELETE();
}
//funcion para realizar el test de la validacion de comprobar_atributos
//introducimos dos o mas atributos mal 
//devolvemos el array con los resultados obtenidos
function ESPACIO_comprobar_atributos_mal_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'comprobar_atributos';
	$ESPACIO_array_test1['error'] = 'Con dos atributos o más mal';
	$ESPACIO_array_test1['error_esperado'] = '00080';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	//creamos un usuario con atributos incorrectos
	$codEspacio = 'abs1';
	$codEdificio = 'casa,';
	$codCentro = 'abs2';
	$tipo = 'hola';
	$superficieEspacio = '2';
	$numInventarioEspacio = 'a';
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
	$temp=$espacio->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$ESPACIO_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	if(strpos($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado'])!==false){//miramos si hay coincidencia
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else{
		$ESPACIO_array_test1['resultado'] = 'FALSE';	
	}
	}
	else{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);	
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function ESPACIO_comprobar_atributos_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Comprobar atributos correctos
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['atributo'] = 'comprobar_atributos';
	$ESPACIO_array_test1['error'] = 'Con todos los atributos bien devuelve true';
	$ESPACIO_array_test1['error_esperado'] = true;
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	$codEspacio = 'abs1';
	$codEdificio = 'casa';
	$codCentro = 'abs2';
	$tipo = 'DESPACHO';
	$superficieEspacio = '2';
	$numInventarioEspacio = '2';
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
	$temp=$espacio->comprobar_atributos();//llamamos a la funcon de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$ESPACIO_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	}
	else{
		$ESPACIO_array_test1['error_obtenido'] = true;
	}
	if ($ESPACIO_array_test1['error_obtenido']===$ESPACIO_array_test1['error_esperado'])//miramos si coinciden
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
}
//llamamos a las funciones
ESPACIO_codEspacio_validacion();
ESPACIO_codEdificio_validacion();
ESPACIO_codCentro_validacion();
ESPACIO_tipo_validacion();
ESPACIO_superficieEspacio_validacion();
ESPACIO_numerodeInventarioEspacio_validacion();
ESPACIO_comprobar_atributos_test();
ESPACIO_comprobar_atributos_mal_test();
?>