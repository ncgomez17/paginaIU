<?php
//Test : PROF_ESPACIO_VALIDACION_test.php
//Creado el : 5-12-2019
//Creado por: ncgomez17
//---
// Descripción : 
//	Fichero de test de validacion de la entidad PROF_ESPACIO para sus validaciones
//	Saca por pantalla el resultado de los test
//funcion para realizar el test de la validacion de dni
//devolvemos el array con los resultados obtenidos
function PROF_ESPACIO_DNI_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el DNI correcto
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Atributo correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] =true;
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	$DNI ='44494151F';
	$prof_espacio = new PROF_ESPACIO_Model($DNI,'');
	$temp=$prof_espacio->comprobar_DNI();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROF_ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROF_ESPACIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROF_ESPACIO_array_test1['error_obtenido']=$PROF_ESPACIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
	$prof_espacio->DELETE();
}
// Comprobar el DNI vacio
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Atributo vacío';
	$PROF_ESPACIO_array_test1['error_esperado'] ='00001';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	$DNI ='';
	$prof_espacio = new PROF_ESPACIO_Model($DNI,'');
	$temp=$prof_espacio->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
	$prof_espacio->DELETE();
	// Comprobar el dni demasiado largo
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00002';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	$DNI = '44494151FT';
	$prof_espacio = new PROF_ESPACIO_Model($DNI,'');
	$temp=$prof_espacio->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
	$prof_espacio->DELETE();
	// Comprobar el dni demasiado corto
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00003';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	$DNI = '1F';
	$prof_espacio = new PROF_ESPACIO_Model($DNI,'');
	$temp=$prof_espacio->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
	$prof_espacio->DELETE();
	//-------------------------------------------------------------------------------
	//comprobacion de dni formato erroneo
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Formato dni erróneo';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00010';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	$DNI= '444A51F';
	$prof_espacio = new PROF_ESPACIO_Model($DNI,'');
	$temp=$prof_espacio->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
	$prof_espacio->DELETE();

	//-------------------------------------------------------------------------------
	//comprobamos dni no valido
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Dni no válido';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00011';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	$DNI= '444A51T';
	$prof_espacio = new PROF_ESPACIO_Model($DNI,'');
	$temp=$prof_espacio->comprobar_DNI();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$PROF_ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
	$prof_espacio->DELETE();
}
//funcion para realizar el test de la validacion de codespacio
//devolvemos el array con los resultados obtenidos
function PROF_ESPACIO_codEspacio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codEspacio correcto
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'codEspacio';
	$PROF_ESPACIO_array_test1['error'] = 'Atributo correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] =true;
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	$codEspacio ='holaa';
	$prof_espacio = new PROF_ESPACIO_Model('',$codEspacio);
	$temp=$prof_espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$PROF_ESPACIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$PROF_ESPACIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($PROF_ESPACIO_array_test1['error_obtenido']=$PROF_ESPACIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
	$prof_espacio->DELETE();
}
// Comprobar el codespacio vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'PROF_ESPACIO';	
	$TITULACION_array_test1['atributo'] = 'codEspacio';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] ='00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codEspacio ='';
	$prof_espacio = new PROF_ESPACIO_Model('',$codEspacio,'','');
	$temp=$prof_espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
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
	$prof_espacio->DELETE();
	// Comprobar el codespacio demasiado largo
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'PROF_ESPACIO';	
	$TITULACION_array_test1['atributo'] = 'codEspacio';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codEspacio = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$prof_espacio = new PROF_ESPACIO_Model('',$codEspacio);
	$temp=$prof_espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
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
	$prof_espacio->DELETE();
	// Comprobar el codespacio demasiado corto
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'PROF_ESPACIO';	
	$TITULACION_array_test1['atributo'] = 'codEspacio';
	$TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codEspacio = 'aa';
	$prof_espacio = new PROF_ESPACIO_Model('',$codEspacio);
	$temp=$prof_espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
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
	$prof_espacio->DELETE();
	//-------------------------------------------------------------------------------
	//comprobamos el codespacio no cumple el formato
	$TITULACION_array_test1['entidad'] = 'PROF_ESPACIO';	
	$TITULACION_array_test1['atributo'] = 'codEspacio';
	$TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
	$TITULACION_array_test1['error_esperado'] = '00040';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$codEspacio = 'a2-,';
	$prof_espacio = new PROF_ESPACIO_Model('',$codEspacio);
	$temp=$prof_espacio->comprobar_codEspacio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$TITULACION_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado'])!==false)//miramos si hay concidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
	$prof_espacio->DELETE();
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function PROF_ESPACIO_comprobar_atributos_mal_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'comprobar_atributos';
	$PROF_ESPACIO_array_test1['error'] = 'Con dos atributos o más mal';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00040';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	//creamos un usuario con atributos incorrectos
	$DNI = '44494151FT';
	$codEspacio = 'nicolas,';
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);
	$temp=$prof_espacio->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$PROF_ESPACIO_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	if(strpos($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado'])!==false){//miramos si hay coincidencia
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';	
	}
	}
	else{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);	
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function PROF_ESPACIO_comprobar_atributos_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar atributos correctos
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'comprobar_atributos';
	$PROF_ESPACIO_array_test1['error'] = 'Con todos los atributos bien devuelve true';
	$PROF_ESPACIO_array_test1['error_esperado'] = true;
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	//creamos un usuario con atributos correctos
	$DNI = '44494151F';
	$codEspacio = 'nicolas';
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);
	$temp=$prof_espacio->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$PROF_ESPACIO_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	}
	else{
		$PROF_ESPACIO_array_test1['error_obtenido'] = true;
	}
	if ($PROF_ESPACIO_array_test1['error_obtenido']===$PROF_ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
}
//llamamos a las funciones
PROF_ESPACIO_DNI_validacion();
PROF_ESPACIO_codEspacio_validacion();
PROF_ESPACIO_comprobar_atributos_test();
PROF_ESPACIO_comprobar_atributos_mal_test();
?>