<?php
//Test : CENTRO_VALIDACION_test.php
//Creado el : 5-12-2019
//Creado por: ncgomez17
//---
// Descripción : 
//	Fichero de test de valudacion de la entidad CENTRO para sus validaciones
//	Saca por pantalla el resultado de los test
//funcion para realizar el test de la validacion de codCentro 
//devolvemos el array con los resultados obtenidos
function CENTRO_codCentro_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codCentro correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'codCentro';
	$CENTRO_array_test1['error'] = 'Atributo correcto';
	$CENTRO_array_test1['error_esperado'] =true;
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$codCentro = 'HOLAAA';//ponemos el codcentro vacio
	$centro = new CENTRO_Model($codCentro,'','','','');//creamos el objeto
	$temp=$centro->comprobar_codCentro();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$CENTRO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($CENTRO_array_test1['error_obtenido']=$CENTRO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
}
// Comprobar el codcentro vacio
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'codCentro';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$codCentro = '';//ponemos el codcentro vacio
	$centro = new CENTRO_Model($codCentro,'','','','');//creamos el objeto
	$temp=$centro->comprobar_codCentro();//llaamamos al metodo de comprobacion
	foreach ($temp as $errores) {//recorremos los errores obtenidos
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';//alamcenamos los errores
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//comprobamos si coincide alguna ocurrencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();//borramos el centro
//creamos si codcentro es demasiado largo
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'codCentro';
	$CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$codCentro ='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';//creamos el codcentro con un atributo demasiado laro
	$centro = new CENTRO_Model($codCentro,'','','','');//creamos el objeto
	$temp=$centro->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {//recorremos los errores
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//comprobamos si concide alguna ocurrencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();//borramos el centro
	//comprobamos si codcentro es demasiado corto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'codCentro';
	$CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$codCentro = 'a';//creamos codcentro
	$centro = new CENTRO_Model($codCentro,'','','','');//creamos el objeto
	$temp=$centro->comprobar_codCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {//recorremos los errores
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//comprobamos si coincide alguna ocurrencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();//eliminamos el centro
	//miramos si el codCentro cumple con su formato
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'codCentro';
	$CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
	$CENTRO_array_test1['error_esperado'] = '00040';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$codCentro = 'ab2,';//creamos el centro
	$centro = new CENTRO_Model($codCentro,'','','','');//creamos el objeto
	$temp=$centro->comprobar_codCentro();//llamammos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();//borramos el centro
}
//funcion para realizar el test de la validacion de codEdificio 
//devolvemos el array con los resultados obtenidos
function CENTRO_codEdificio_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el codEdificio correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'codEdificio';
	$CENTRO_array_test1['error'] = 'Atributo correcto';
	$CENTRO_array_test1['error_esperado'] =true;
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$codEdificio = 'HOLAAA';//ponemos el codcentro vacio
	$centro = new CENTRO_Model('',$codEdificio,'','','');//creamos el objeto
	$temp=$centro->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$CENTRO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($CENTRO_array_test1['error_obtenido']=$CENTRO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
}
	//miramos si el codEdificio esta vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'CENTRO';	
	$EDIFICIO_array_test1['atributo'] = 'codEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$codEdificio = '';//creamos codedificio vacio
	$edificio = new EDIFICIO_Model('',$codEdificio,'','','');
	$temp=$edificio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//comprobamos si coincide
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
		//miramos si el codEdificio es demsiado largo
	$EDIFICIO_array_test1['entidad'] = 'CENTRO';	
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
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay alguna coincidencia
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
	$edificio->DELETE();
		//miramos si el codEdificio es demasiado corto
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'CENTRO';	
	$EDIFICIO_array_test1['atributo'] = 'codEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$codEdificio = 'a';
	$edificio = new EDIFICIO_Model('',$codEdificio,'','','');
	$temp=$edificio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay alguna coincidencia
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
		//miramos si el codEdificio no cumple el formato
	$EDIFICIO_array_test1['entidad'] = 'CENTRO';	
	$EDIFICIO_array_test1['atributo'] = 'codEdificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
	$EDIFICIO_array_test1['error_esperado'] = '00040';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$codEdificio = 'ab2,';
	$edificio = new EDIFICIO_Model('',$codEdificio,'','','');
	$temp=$edificio->comprobar_codEdificio();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$EDIFICIO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado'])!==false)//miramos si hay alguna coincidencia
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
//funcion para realizar el test de la validacion de nombreCentro 
//devolvemos el array con los resultados obtenidos
function CENTRO_nombreCentro_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el nombreCentro correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'nombreCentro';
	$CENTRO_array_test1['error'] = 'Atributo correcto';
	$CENTRO_array_test1['error_esperado'] =true;
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$nombre = 'casa';//ponemos el codcentro vacio
	$centro = new CENTRO_Model('','',$nombre,'','');//creamos el objeto
	$temp=$centro->comprobar_nombreCentro();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$CENTRO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($CENTRO_array_test1['error_obtenido']=$CENTRO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
}
	//miramos si nombrecentro esta vacio
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'nombreCentro';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$nombre = '';
	$centro = new CENTRO_Model('','',$nombre,'','');
	$temp=$centro->comprobar_nombreCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay alguna coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
//miramos si nombrecentro es demasiado largo
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'nombreCentro';
	$CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$nombre ='';
		for($i=0;$i<=150; $i++){
		$nombre=$nombre.'a';
	}
	$centro = new CENTRO_Model('','',$nombre,'','');
	$temp=$centro->comprobar_nombreCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay alguna coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
		//miramos si nombrecentro es demasiado corto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'nombreCentro';
	$CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$nombre = 'a';
	$centro = new CENTRO_Model('','',$nombre,'','');
	$temp=$centro->comprobar_nombreCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay alguna coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
		//miramos si nombrecentro no cumple con el formato
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'nombreCentro';
	$CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$CENTRO_array_test1['error_esperado'] = '00030';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$nombre = 'ab2,';
	$centro = new CENTRO_Model('','',$nombre,'','');
	$temp=$centro->comprobar_nombreCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay alguna coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
}
//funcion para realizar el test de la validacion de direccionCentro 
//devolvemos el array con los resultados obtenidos
function CENTRO_direccionCentro_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el direccionCentro correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'direccionCentro';
	$CENTRO_array_test1['error'] = 'Atributo correcto';
	$CENTRO_array_test1['error_esperado'] =true;
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$direccion = 'Rua numero 12ª';//ponemos el codcentro vacio
	$centro = new CENTRO_Model('','','',$direccion,'');//creamos el objeto
	$temp=$centro->comprobar_direccionCentro();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$CENTRO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($CENTRO_array_test1['error_obtenido']=$CENTRO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
}
	//miramos si direccioncentro esta vacio
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'direccionCentro';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$direccion = '';
	$centro = new CENTRO_Model('','','',$direccion,'');
	$temp=$centro->comprobar_direccionCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay alguna coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();

//-------------------------------------------------------------------------------
		//miramos si direccioncentro es demasiado largo
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'direccionCentro';
	$CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$direccion ='';
		for($i=0;$i<=150; $i++){
		$direccion=$direccion.'a';//rellenamos el atributo
	}
	$centro = new CENTRO_Model('','','',$direccion,'');
	$temp=$centro->comprobar_direccionCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();

//-------------------------------------------------------------------------------
		//miramos si direccioncentro es demasiado corto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'direccionCentro';
	$CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$direccion = 'a';
	$centro = new CENTRO_Model('','','',$direccion,'');
	$temp=$centro->comprobar_direccionCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
//-------------------------------------------------------------------------------
		//miramos si direccioncentro no tiene el formato correcto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'direccionCentro';
	$CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y los símbolos  “- / º ª”';
	$CENTRO_array_test1['error_esperado'] = '00050';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$direccion = 'hola,';

	$centro = new CENTRO_Model('','','',$direccion,'');
	$temp=$centro->comprobar_direccionCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
}
//funcion para realizar el test de la validacion de responsableCentro 
//devolvemos el array con los resultados obtenidos
function CENTRO_responsableCentro_validacion()
{

	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	// Comprobar el responsableCentro correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'responsableCentro';
	$CENTRO_array_test1['error'] = 'Atributo correcto';
	$CENTRO_array_test1['error_esperado'] =true;
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$responsable = 'nicolas';//ponemos el codcentro vacio
	$centro = new CENTRO_Model('','','','',$responsable);//creamos el objeto
	$temp=$centro->comprobar_responsableCentro();//llamamos a la funcion de comprobacion
	if($temp!=true){//miramso sid evuelve true i no recorre array de errores
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
}
else{

	$CENTRO_array_test1['error_obtenido'] = $temp;//alamcenamos el valor de la variable
	if ($CENTRO_array_test1['error_obtenido']=$CENTRO_array_test1['error_esperado']==true)//miramos si coincide
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
}
	//miramos si responsablecentro esta vacio
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'responsableCentro';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$responsable = '';
	$centro = new CENTRO_Model('','','','',$responsable);
	$temp=$centro->comprobar_responsableCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();

//-------------------------------------------------------------------------------
		//miramos si responsablecentro es demasiado largo
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'responsableCentro';
	$CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$responsable='';
	for($i=0;$i<=60; $i++){
		$responsable=$responsable.'a';//rellenamos el atributo
	}
	$centro = new CENTRO_Model('','','','',$responsable);
	$temp=$centro->comprobar_responsableCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
//-------------------------------------------------------------------------------
		//miramos si responsablecentro es demasiado corto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'responsableCentro';
	$CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$responsable = 'ad';
	$centro = new CENTRO_Model('','','','',$responsable);
	$temp=$centro->comprobar_responsableCentro();//llamamos a la funcionde comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
//-------------------------------------------------------------------------------
			//miramos si responsablecentro no tiene el formato correcto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'responsableCentro';
	$CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos (y espacios entre letras)';
	$CENTRO_array_test1['error_esperado'] = '00030';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$responsable = 'abc-';
	$centro = new CENTRO_Model('','','','',$responsable);
	$temp=$centro->comprobar_responsableCentro();//llamamos a la funcion de comprobacion
	foreach ($temp as $errores) {
	$CENTRO_array_test1['error_obtenido'] .=$errores['codigoincidencia'].'|';
	
}
	if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false)//miramos si hay coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
	$centro->DELETE();
}
//funcion para realizar el test de la validacion de comprobar_atributos
//comprobamos si devuelve los errores en caso de dos o mas atributos mal
//devolvemos el array con los resultados obtenidos
function CENTRO_comprobar_atributos_mal_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar dos atributos erróneos
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'comprobar_atributos';
	$CENTRO_array_test1['error'] = 'Con dos atributos o más mal';
	$CENTRO_array_test1['error_esperado'] = '00050';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	//creamos un usuario con atributos incorrectos
	$codCentro = 'abs2';
	$codEdificio = 'casa';
	$nombreCentro = 'casaaa';
	$direccionCentro = 'ruta,,,';
	$responsableCentro = '3222';
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
	$temp=$centro->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$CENTRO_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	if(strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])!==false){//comprobamos si hay coincidencia
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else{
		$CENTRO_array_test1['resultado'] = 'FALSE';	
	}
	}
	else{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);	
}
//funcion para realizar el test de la validacion de comprobar_atributos
//devolvemos el array con los resultados obtenidos
function CENTRO_comprobar_atributos_test(){
	global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar atributos correctos
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['atributo'] = 'comprobar_atributos';
	$CENTRO_array_test1['error'] = 'Con todos los atributos bien devuelve true';
	$CENTRO_array_test1['error_esperado'] = true;
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	$codCentro = 'abs2';
	$codEdificio = 'casa';
	$nombreCentro = 'casaaa';
	$direccionCentro = 'ruta';
	$responsableCentro = 'nicolas';
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
	$temp=$centro->comprobar_atributos();//llamamos a la funcion de comprobacion
	if($temp!==true){
	foreach($temp as $errores){
		foreach($errores as $temp1){
		$CENTRO_array_test1['error_obtenido']	.= $temp1['codigoincidencia'] . '|';
	}
	}
	}
	else{
		$CENTRO_array_test1['error_obtenido'] = true;
	}
	if ($CENTRO_array_test1['error_obtenido']===$CENTRO_array_test1['error_esperado'])//comprobamos si hay coincidencia
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
}
//llamamos a las funciones
CENTRO_codCentro_validacion();
CENTRO_codEdificio_validacion();
CENTRO_nombreCentro_validacion();
CENTRO_direccionCentro_validacion();
CENTRO_responsableCentro_validacion();
CENTRO_comprobar_atributos_test();
CENTRO_comprobar_atributos_mal_test();
?>