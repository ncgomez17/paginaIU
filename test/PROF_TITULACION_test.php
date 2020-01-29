<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : PROF_TITULACION_test.php
// Descripción : 
//	Fichero de test de unidad de la entidad PROF_TITULACION
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROF_TITULACION
	include_once '../Model/PROF_TITULACION_Model.php';

//funcion para comprobar el add de PROF_TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_TITULACION_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Comprobar add insercion fallida 
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'ADD';
	$PROF_TITULACION_array_test1['error'] = 'El PROF_TITULACION ya existe';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codtitulacion = 'FMI';
	$añoacademico='2019-2018';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codtitulacion,$añoacademico);
// inserto la tupla
	$PROF_TITULACION->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->ADD();//alamcenamos lo que devuelve el add
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();	

// Comprobar Inserción realizada con éxito
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'ADD';
	$PROF_TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codtitulacion = 'FMI';
	$añoacademico='2019-2018';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codtitulacion,$añoacademico);
	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->ADD();//alamcenamos lo que devuelve el add
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();


}
//funcion para comprobar la edicion de los PROF_TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_TITULACION_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

//edit actualizacion realizada con exito
//--------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'EDIT';
	$PROF_TITULACION_array_test1['error'] = 'Actualización realizada con éxito';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codtitulacion = 'FMI';
	$añoacademico='2019-2018';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codtitulacion,$añoacademico);
    $PROF_TITULACION->ADD();
    $añoacademico='2019-2017';
    $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codtitulacion,$añoacademico);
	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->EDIT();//almacenamos lo que devuelve el edit
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	$PROF_TITULACION->DELETE();	
	

}
//funcion para comprobar search de PROF_TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_TITULACION_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

//search devuelve recordset
//--------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'SEARCH';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve recordset';
	$PROF_TITULACION_array_test1['error_esperado'] = 'array';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codtitulacion = 'FMI';
	$añoacademico='2019-2018';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codtitulacion,$añoacademico);
    $PROF_TITULACION->ADD();
	
// creo el modelo
    $PROF_TITULACION2 = new PROF_TITULACION_Model('','','');
	if(gettype($PROF_TITULACION2->SEARCH())==='object'){//comprobamos si el search es un object
	$PROF_TITULACION_array_test1['error_obtenido']='array';
	}
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	$PROF_TITULACION->DELETE();	
	$PROF_TITULACION2->DELETE();	
	//comprobamos que search devuelve error de estor de la base de datos
		 		//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'PROF_TITULACION';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	//Valores para la entidad
	$DNI = '44494151F';
	$codtitulacion = 'FMI';
	$añoacademico='2019-2018';


	$profesor = new PROF_TITULACION_Model($DNI,$codtitulacion,$añoacademico);
	$profesor->ADD();

	$buscar = new PROF_TITULACION_Model('','','\'');
	$USUARIOS_array_test1['error_obtenido'] = $buscar->SEARCH();//alamcenamos lo que devuelve el search
	
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado']) { //Si el resultado coinciden
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else { //Si no ponemos a FALSE el resultado.
		$USUARIOS_array_test1['resultado'] = 'FALSE';	
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);//Metemos el resultado en el array global unitario

	$profesor->DELETE();
	$buscar->DELETE();

}
//funcion para comprobar el deletede PROF_TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_TITULACION_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

//delete devuelve borrado realizado con exito
//--------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'DELETE';
	$PROF_TITULACION_array_test1['error'] = 'Borrado realizado con éxito';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codtitulacion = 'FMI';
	$añoacademico='2019-2018';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codtitulacion,$añoacademico);
// inserto la tupla
    $PROF_TITULACION->ADD();
    $PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->DELETE();//alamcenamos lo que devuelve el delete
	
// creo el modelo
  
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	$PROF_TITULACION->DELETE();	
	

}
//funcion para comprobar el rellena datos de los PROF_TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_TITULACION_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();
// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$PROF_TITULACION_array_test1['error_esperado'] = 'array';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codtitulacion = 'FMI';
	$añoacademico='2019-2018';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codtitulacion,$añoacademico);
// inserto la tupla
     $PROF_TITULACION->ADD();


	$PROF_TITULACION_array_test1['error_obtenido'] = gettype($PROF_TITULACION->RellenaDatos());//almacenamos el tipo que devuelve rellena datos
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();

}
//llamamos a las funciones
	PROF_TITULACION_ADD_test();
	PROF_TITULACION_RellenaDatos_test();
	PROF_TITULACION_EDIT_test();
	PROF_TITULACION_DELETE_test();
	PROF_TITULACION_SEARCH_test();
?>