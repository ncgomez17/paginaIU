<?php
//Test : EDIFICIO_VALIDACION_test.php
//Creado el : 5-12-2019
//Creado por: ncgomez17
//---
// Descripción : 
//	Fichero de test de valudcion de la entidad EDIFICIO para sus validaciones
//	Saca por pantalla el resultado de los test
//funcion para realizar el test de la validacion de codEdificio
//devolvemos el array con los resultados obtenidos
function EDIFICIO_codEdificio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codEdificio correcto
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'codEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo correcto';
	$EDIFICIO_array_test1['error_esperado'] =true;
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$codEdificio = 'holaa';
	$edificio = new EDIFICIO_Model($codEdificio,'','','');
	$temp=$edificio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$EDIFICIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($EDIFICIO_array_test1['error_obtenido']=$EDIFICIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
}
// Comprobar el codEdificio vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'codEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$codEdificio = '';
	$edificio = new EDIFICIO_Model($codEdificio,'','','');
	$temp=$edificio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();

//-------------------------------------------------------------------------------
	// Comprobar el codEdificio es demasiado largo
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'codEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$codEdificio ='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	$edificio = new EDIFICIO_Model($codEdificio,'','','');
	$temp=$edificio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar el codEdificio demasiado croto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'codEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$codEdificio = 'a';
	$edificio = new EDIFICIO_Model($codEdificio,'','','');
	$temp=$edificio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar el codEdificio no cumple el formato
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'codEdificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
	$EDIFICIO_array_test1['error_esperado'] = '00040';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$codEdificio = 'ab2,';
	$edificio = new EDIFICIO_Model($codEdificio,'','','');
	$temp=$edificio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{//miramos si hay coincidencia
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
}
//funcion para realizar el test de la validacion de nombreedificio 
//devolvemos el array con los resultados obtenidos
function EDIFICIO_nombreEdificio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el nombreedificio correcto
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'nombreEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo correcto';
	$EDIFICIO_array_test1['error_esperado'] =true;
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$nombre = 'holaa';
	$edificio = new EDIFICIO_Model('',$nombre,'','');
	$temp=$edificio->comprobar_nombreEdificio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$EDIFICIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($EDIFICIO_array_test1['error_obtenido']=$EDIFICIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
}
// Comprobar el nombredificio vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'nombreEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$nombre = '';
	$edificio = new EDIFICIO_Model('',$nombre,'','');
	$temp=$edificio->comprobar_nombreEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();

//-------------------------------------------------------------------------------
	// Comprobar el nombredificio es demasiado largo
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'nombreEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$nombre ='';
		for($i=0;$i<=150; $i++){
		$nombre=$nombre.'a';//rellenamos el atributo
	}
	$edificio = new EDIFICIO_Model('',$nombre,'','');
	$temp=$edificio->comprobar_nombreEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar el nombredificio es demasiado corto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'nombreEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$nombre = 'a';
	$edificio = new EDIFICIO_Model('',$nombre,'','');
	$temp=$edificio->comprobar_nombreEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
//-------------------------------------------------------------------------------
	// Comprobar el nombredificio no cumple con el formato
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'nombreEdificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$EDIFICIO_array_test1['error_esperado'] = '00030';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$nombre = 'ab2,';
	$edificio = new EDIFICIO_Model('',$nombre,'','');
	$temp=$edificio->comprobar_nombreEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
}
//funcion para realizar el test de la validacion de direccionedificio 
//devolvemos el array con los resultados obtenidos
function EDIFICIO_direccionEdificio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el direccionedificio correcto
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'direccionEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo correcto';
	$EDIFICIO_array_test1['error_esperado'] =true;
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$direccion = 'Rua 12ª';
	$edificio = new EDIFICIO_Model('','','',$direccion);
	$temp=$edificio->comprobar_direccionEdificio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$EDIFICIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($EDIFICIO_array_test1['error_obtenido']=$EDIFICIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
}
// Comprobar el direcciondificio vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'direccionEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$direccion = '';
	$edificio = new EDIFICIO_Model('','',$direccion,'');
	$temp=$edificio->comprobar_direccionEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();

//-------------------------------------------------------------------------------
	// Comprobar el direccionedificio es demsiado largo
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'direccionEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$direccion ='';
		for($i=0;$i<=150; $i++){
		$direccion=$direccion.'a';//rellenamos el atributo
	}
	$edificio = new EDIFICIO_Model('','',$direccion,'');
	$temp=$edificio->comprobar_direccionEdificio();//llamamos a la funcion de comprobacio
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
//-------------------------------------------------------------------------------
		// Comprobar el direccionedificio es demsiado corto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'direccionEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$direccion = 'a';
	$edificio = new EDIFICIO_Model('','',$direccion,'');
	$temp=$edificio->comprobar_direccionEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
//-------------------------------------------------------------------------------
		// Comprobar el direccionedificio no cumple con el formato
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'direccionEdificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y los símbolos  “- / º ª”';
	$EDIFICIO_array_test1['error_esperado'] = '00050';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$direccion = 'hola,';

	$edificio = new EDIFICIO_Model('','',$direccion,'');
	$temp=$edificio->comprobar_direccionEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
}
//funcion para realizar el test de la validacion de campusEdificio 
//devolvemos el array con los resultados obtenidos
function EDIFICIO_campus_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el campusedificio correcto
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'campusEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo correcto';
	$EDIFICIO_array_test1['error_esperado'] =true;
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$campus = 'holaa';
	$edificio = new EDIFICIO_Model('','','','',$campus);
	$temp=$edificio->comprobar_campusEdificio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$EDIFICIO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($EDIFICIO_array_test1['error_obtenido']=$EDIFICIO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
}
	// Comprobar el campusedificio es demsiado largo
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'campusEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$campus = '';
	$edificio = new EDIFICIO_Model('','','',$campus);
	$temp=$edificio->comprobar_campusEdificio();//llamamos a la funcion  de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();

//-------------------------------------------------------------------------------
		// Comprobar el campusedificio es demsiado largo
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'campusEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$campus='';
	for($i=0;$i<=10; $i++){
		$campus=$campus.'a';//rellenamos el atributo
	}
	$edificio = new EDIFICIO_Model('','','',$campus);
	$temp=$edificio->comprobar_campusEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
//-------------------------------------------------------------------------------
			// Comprobar el campusedificio es demsiado corto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'campusEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$campus = 'ad';
	$edificio = new EDIFICIO_Model('','','',$campus);
	$temp=$edificio->comprobar_campusEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
//-------------------------------------------------------------------------------
			// Comprobar el campusedificio no cumple con el formato
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'campusEdificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$EDIFICIO_array_test1['error_esperado'] = '00030';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$campus = 'abc-';
	$edificio = new EDIFICIO_Model('','','',$campus);
	$temp=$edificio->comprobar_campusEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
}
//funcion para realizar el test de la validacion de comprobar_atributos
//comprobamos que al insertar dos o más atributos mas devuelve el array de errores
//devolvemos el array con los resultados obtenidos
function EDIFICIO_comprobar_atributos_mal_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'comprobar_atributos';
	$EDIFICIO_array_test1['error'] = 'Con dos atributos o más mal';
	$EDIFICIO_array_test1['error_esperado'] = '00030';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	//creamos un usuario con atributos incorrectos
	$codEdificio = 'abs1';
	$nombreEdificio = 'casa';
	$direcciónEdificio = 'casa,,';
	$campusEdificio = 'hola-a';
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
	$temp=$edificio->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$EDIFICIO_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	if(strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false){//miramos si hay coincidencia
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';	
	}
	}
	else{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);	
}
//funcion para realizar el test de la validacion de comprobar_atributos 
//devuelve true ya que todos los atriutos estan correctos
//devolvemos el array con los resultados obtenidos
function EDIFICIO_comprobar_atributos_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar atributos correctos
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'comprobar_atributos';
	$EDIFICIO_array_test1['error'] = 'Con todos los atributos bien devuelve true';
	$EDIFICIO_array_test1['error_esperado'] = true;
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	$codEdificio = 'abs1';
	$nombreEdificio = 'casa';
	$direcciónEdificio = 'casaª';
	$campusEdificio = 'holaa';
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
	$temp=$edificio->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$EDIFICIO_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	}
	else{
		$EDIFICIO_array_test1['error_obtenido'] = true;
	}
	if ($EDIFICIO_array_test1['error_obtenido']===$EDIFICIO_array_test1['error_esperado'])//miramos si hay coincidecnia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
}
//llamamamos a las funciones
EDIFICIO_codEdificio_validacion();
EDIFICIO_nombreEdificio_validacion();
EDIFICIO_direccionEdificio_validacion();
EDIFICIO_campus_validacion();
EDIFICIO_comprobar_atributos_test();
EDIFICIO_comprobar_atributos_mal_test();
?>