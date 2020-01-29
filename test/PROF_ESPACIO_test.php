<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : PROF_ESPACIO_test.php
// Descripción : 
//	Fichero de test de unidad de la entidad PROF_ESPACIO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROF_ESPACIO
include_once '../Model/PROF_TITULACION_Model.php';
//funcion para comprobar el add de PROF_ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_ESPACIO_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar add  el elemento ya existe
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'ADD';
	$PROF_ESPACIO_array_test1['error'] = 'El PROF_ESPACIO ya existe';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codespacio = 'ciencias';
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codespacio);
// inserto la tupla
	$PROF_ESPACIO->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();//alamcenamos lo que devuelve el add
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();	

// Comprobar Inserción realizada con éxito
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'ADD';
	$PROF_ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codespacio = 'ciencias';
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codespacio);
// inserto la tupla
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();//almacenamos lo que devuelve el add
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();


}
//funcion para comprobar la edicion de los PROF_ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_ESPACIO_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar edicion realizada con exito
//--------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'EDIT';
	$PROF_ESPACIO_array_test1['error'] = 'Actualización realizada con éxito';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codespacio = 'ciencias';
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codespacio);
// inserto la tupla
    $PROF_ESPACIO->ADD();
    $codespacio='letras';
    $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codespacio);
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->EDIT();//almacenamos lo que devuelve el edit
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	$PROF_ESPACIO->DELETE();	
	

}
//funcion para comprobar search de los PROF_ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_ESPACIO_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar search se realiza correctamente
//--------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'SEARCH';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve recordset';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'array';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codespacio = 'ciencias';
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codespacio);
// inserto la tupla
    $PROF_ESPACIO->ADD();
	
// creo el modelo
    $PROF_ESPACIO2 = new PROF_ESPACIO_Model('','');
	if(gettype($PROF_ESPACIO2->SEARCH())==='object'){//miramos si lo que devuele el search es un object
	$PROF_ESPACIO_array_test1['error_obtenido']='array';
	}
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	$PROF_ESPACIO->DELETE();	
	$PROF_ESPACIO2->DELETE();	

	// Comprobar search  da error de gestor de la base de datos
			 		//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'PROF_ESPACIO';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	//Valores para la entidad
	$DNI = '44494151F';
	$codespacio = 'FMI';


	$profesor = new PROF_ESPACIO_Model($DNI,$codespacio);
	$profesor->ADD();

	$buscar = new PROF_ESPACIO_Model('','\'');
	$USUARIOS_array_test1['error_obtenido'] = $buscar->SEARCH();//almacenamos lo que devuelve el search
	
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
//funcion para comprobar delete de los PROF_ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_ESPACIO_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

//comprobamos  delete realizado con exito
//--------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'DELETE';
	$PROF_ESPACIO_array_test1['error'] = 'Borrado realizado con éxito';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codespacio = 'ciencias';
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codespacio);
// inserto la tupla
    $PROF_ESPACIO->ADD();
    $PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->DELETE();//almacenamos lo que devuelve el delete
	
// creo el modelo
  
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	$PROF_ESPACIO->DELETE();	
	

}
//funcion para comprobar el rellena datos de los PROF_ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function PROF_ESPACIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();
// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'array';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$codespacio = 'ciencias';
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codespacio);
// inserto la tupla
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();


	$PROF_ESPACIO_array_test1['error_obtenido'] = gettype($PROF_ESPACIO->RellenaDatos());//cogemos el tipo de objeto que devuelve el rellena datos
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();

}
//llamamos a las funciones
	PROF_ESPACIO_ADD_test();
	PROF_ESPACIO_RellenaDatos_test();
	PROF_ESPACIO_EDIT_test();
	PROF_ESPACIO_DELETE_test();
	PROF_ESPACIO_SEARCH_test();
?>