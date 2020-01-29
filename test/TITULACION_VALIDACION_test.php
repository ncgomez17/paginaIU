<?php
//Test : TITUTLACION_VALIDACION_test.php
//Creado el : 5-12-2019
//Creado por: ncgomez17
//---
// Descripción : 
//	Fichero de test de validacion de la entidad TITULACION para sus validaciones
//	Saca por pantalla el resultado de los test

//funcion para realizar el test de la validacion de codtitulacion
//devolvemos el array con los resultados obtenidos
function TITULACION_codTitulacion_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codtitulacion correcto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Atributo correcto';
	$TITULACION_array_test1['error_esperado'] =true;
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codtitulacion = 'abs1';
	$titulacion = new TITULACIÓN_Model($codtitulacion,'','','');
	$temp=$titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$TITULACION_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($TITULACION_array_test1['error_obtenido']=$TITULACION_array_test1['error_esperado']==true)//miramos si coincide
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$titulacion->DELETE();
}
// Comprobar el codtitualcion vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] ='00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codTitulación ='';
	$titulacion = new TITULACIÓN_Model($codTitulación,'','','');
	$temp=$titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
	// Comprobar el codtitualcion demasiado largo
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codTitulación = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$titulacion = new TITULACIÓN_Model($codTitulación,'','','');
	$temp=$titulacion->comprobar_codTitulacion();//llamamos a al funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
	// Comprobar el codtitulacion demasiado corto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codTitulación = 'aa';
	$titulacion = new TITULACIÓN_Model($codTitulación,'','','');
	$temp=$titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
	//comprobamos si codtitulacion cumple con el formato
	//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'Solo se permiten alfabéticos y números';
	$TITULACION_array_test1['error_esperado'] = '00060';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codTitulación = '---';
	$titulacion = new TITULACIÓN_Model($codTitulación,'','','');
	$temp=$titulacion->comprobar_codTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
}
//funcion para realizar el test de la validacion de codcentro
//devolvemos el array con los resultados obtenidos
function TITULACION_codCentro_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codCentro correcto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codCentro';
	$TITULACION_array_test1['error'] = 'Atributo correcto';
	$TITULACION_array_test1['error_esperado'] =true;
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codcentro = 'abs1';
	$titulacion = new TITULACIÓN_Model('',$codcentro,'','');
	$temp=$titulacion->comprobar_codCentro();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$TITULACION_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($TITULACION_array_test1['error_obtenido']=$TITULACION_array_test1['error_esperado']==true)//miramos si coincide
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$titulacion->DELETE();
}
// Comprobar el codcentro vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codCentro';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codCentro = '';
	$titulacion = new TITULACIÓN_Model('',$codCentro,'','');
	$temp=$titulacion->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos errores
	
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
	$titulacion->DELETE();
//comprobamos codcentro demasiado corto
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codCentro';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codCentro = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$titulacion = new TITULACIÓN_Model('',$codCentro,'','');
	$temp=$titulacion->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
	//comprobamos si codcentro demasiado corto
//-------------------------------------------------------------------------------

	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codCentro';
	$TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codCentro = 'a';
	$titulacion = new TITULACIÓN_Model('',$codCentro,'','');
	$temp=$titulacion->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos a los errores
	
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
	$titulacion->DELETE();
	//comprobamos si codcentro cumple con el formato
	//-------------------------------------------------------------------------------

	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'codCentro';
	$TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
	$TITULACION_array_test1['error_esperado'] = '00040';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codCentro = '1a-,';
	$titulacion = new TITULACIÓN_Model('',$codCentro,'','','');
	$temp=$titulacion->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
}
//funcion para realizar el test de la validacion de nombre_titulacion
//devolvemos el array con los resultados obtenidos
function TITULACION_nombre_titulacion_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el nombre correcto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'nombreTitulacion';
	$TITULACION_array_test1['error'] = 'Atributo correcto';
	$TITULACION_array_test1['error_esperado'] =true;
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$nombre = 'titulacion';
	$titulacion = new TITULACIÓN_Model('','',$nombre,'');
	$temp=$titulacion->comprobar_nombreTitulacion();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
}
else{

	$TITULACION_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($TITULACION_array_test1['error_obtenido']=$TITULACION_array_test1['error_esperado']==true)//miramos si coincide
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$titulacion->DELETE();
}
// Comprobar el nombre vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'nombreTitulacion';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$nombre = '';
	$titulacion = new TITULACIÓN_Model('','',$nombre,'');
	$temp=$titulacion->comprobar_nombreTitulacion();//llamamos a la funcion de comprobacion
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
	$titulacion->DELETE();
//comprobamos si nombre es demasiado largo
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'nombreTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$nombre ='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$titulacion = new TITULACIÓN_Model('','',$nombre,'');
	$temp=$titulacion->comprobar_nombreTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
	//comprobamos si nombre es demasiado corto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'nombreTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$nombre = 'a';
	$titulacion = new TITULACIÓN_Model('','',$nombre,'');
	$temp=$titulacion->comprobar_nombreTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
	//comprobamos si nombre cumple el formato
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'nombreTitulacion';
	$TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$TITULACION_array_test1['error_esperado'] = '00030';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$nombre = 'hola a2';
	$titulacion = new TITULACIÓN_Model('','',$nombre,'');
	$temp=$titulacion->comprobar_nombreTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
}
//funcion para realizar el test de la validacion de reponsabletitulacion
//devolvemos el array con los resultados obtenidos
function TITULACION_responsable_titulacion_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el responsabletitulacion correcto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'responsableTitulacion';
	$TITULACION_array_test1['error'] = 'Atributo correcto';
	$TITULACION_array_test1['error_esperado'] =true;
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$responsable = 'profesor';
	$titulacion = new TITULACIÓN_Model('','','',$responsable);
	$temp=$titulacion->comprobar_responsableTitulacion();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$TITULACION_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($TITULACION_array_test1['error_obtenido']=$TITULACION_array_test1['error_esperado']==true)//miramos si coincide
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$titulacion->DELETE();
}
// Comprobar el responsable vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'responsableTitulacion';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$responsable = '';
	$titulacion = new TITULACIÓN_Model('','','',$responsable);
	$temp=$titulacion->comprobar_responsableTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado'])!==false)//miramos si coincide
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$titulacion->DELETE();
//comprobamos si el responsable es demasiado corto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'responsableTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$responsable='';
	for($i=0;$i<=60; $i++){
		$responsable=$responsable.'a';//rellenamos el atributo
	}
	$titulacion = new TITULACIÓN_Model('','','',$responsable);
	$temp=$titulacion->comprobar_responsableTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
}
	if (strpos($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado'])!==false)//miramos s hay coincidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$titulacion->DELETE();
	//comprobamos si responsable es demasiado corto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'responsableTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$responsable = 'a';
	$titulacion = new TITULACIÓN_Model('','','',$responsable);
	$temp=$titulacion->comprobar_responsableTitulacion();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almaceenamos los errores
	
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
	$titulacion->DELETE();
	//comprobamos si responsable cumple con el formato
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'responsableTitulacion';
	$TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$TITULACION_array_test1['error_esperado'] = '00030';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$responsable = 'abs1';
	$titulacion = new TITULACIÓN_Model('','','',$responsable);
	$temp=$titulacion->comprobar_responsableTitulacion();//llamamos a la funcionde comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//almacenamos los errores
	
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
	$titulacion->DELETE();
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function TITULACION_comprobar_atributos_mal_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'comprobar_atributos';
	$TITULACION_array_test1['error'] = 'Con dos atributos o más mal';
	$TITULACION_array_test1['error_esperado'] = '00030';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	//creamos un usuario con atributos incorrectos
	$codTitulación = '1';//indicamos un login mal con caracteres numericos
	$codCentro = 'mipassword';
	$nombreTitulacion= 'nicolas'; 
	$responsableTitulacion = 'nicolas1';
	$titulacion = new TITULACIÓN_Model($codTitulación,$codCentro,$nombreTitulacion,$responsableTitulacion);
	$temp=$titulacion->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$TITULACION_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';//almacenamos los errores
	}
	}
	if(strpos($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado'])!==false){//miramos si hay coincidencia
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else{
		$TITULACION_array_test1['resultado'] = 'FALSE';	
	}
	}
	else{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);	
}
//funcion para realizar el test de la validacion de codtitulacion
//devolvemos el array con los resultados obtenidos
function TITULACION_comprobar_atributos_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar atributos correctos
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'comprobar_atributos';
	$TITULACION_array_test1['error'] = 'Con todos los atributos bien devuelve true';
	$TITULACION_array_test1['error_esperado'] = true;
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	//creamos un usuario con atributos correctos
	$codTitulación = '123a';
	$codCentro = 'mipassword';
	$nombreTitulacion= 'nicolas'; 
	$responsableTitulacion = 'nicolas';
	$titulacion = new TITULACIÓN_Model($codTitulación,$codCentro,$nombreTitulacion,$responsableTitulacion);
	$temp=$titulacion->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$TITULACION_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';//almacenamos los errores
	}
	}
	}
	else{
		$TITULACION_array_test1['error_obtenido'] = true;
	}
	if ($TITULACION_array_test1['error_obtenido']===$TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
}
//llamamos a las funciones
TITULACION_codTitulacion_validacion();
TITULACION_codCentro_validacion();
TITULACION_nombre_titulacion_validacion();
TITULACION_responsable_titulacion_validacion();
TITULACION_comprobar_atributos_test();
TITULACION_comprobar_atributos_mal_test();
?>