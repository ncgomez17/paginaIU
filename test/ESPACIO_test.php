<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : ESPACIO_test.php
// Descripción : 
//	Fichero de test de unidad de la entidad ESPACIO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad ESPACIO
	include '../Model/ESPACIO_Model.php';

//funcion para comprobar el add de ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function ESPACIO_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Comprobar edit 
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'ADD';
	$ESPACIO_array_test1['error'] = 'El ESPACIO ya existe';
	$ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEspacio = 'ciencias';
	$codEdificio = 'edu';
	$codCentro = 'abs';
	$tipo ='PAS';
	$superficieEspacio = '2';
	$numInventarioEspacio = '3';
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
// inserto la tupla
	$espacio->ADD();

	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();//almacenamos lo que devuelve la funcion add
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$espacio->DELETE();	

// Comprobar Inserción realizada con éxito
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'ADD';
	$ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
	$ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEspacio = 'ciencias';
	$codEdificio = 'edu';
	$codCentro = 'abs';
	$tipo ='PAS';
	$superficieEspacio = '2';
	$numInventarioEspacio = '3';
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
// inserto la tupla
	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();//alamcenamos lo que devuele el metodo add
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])//mmiramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$espacio->DELETE();


}
//funcion para comprobar la edicion de los ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function ESPACIO_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


//--------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'EDIT';
	$ESPACIO_array_test1['error'] = 'Actualización realizada con éxito';
	$ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEspacio = 'ciencias';
	$codEdificio = 'edu';
	$codCentro = 'abs';
	$tipo ='PAS';
	$superficieEspacio = '2';
	$numInventarioEspacio = '3';
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
// inserto la tupla
    $espacio->ADD();
    $codEspacio='luis';
    $espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
	$ESPACIO_array_test1['error_obtenido'] = $espacio->EDIT();//alamcenamos lo que devuelve el metodo edit
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	$espacio->DELETE();	
	

}
//funcion para comprobar el search de ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function ESPACIO_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


//--------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'SEARCH';
	$ESPACIO_array_test1['error'] = 'Devuelve recordset';
	$ESPACIO_array_test1['error_esperado'] = 'array';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEspacio = 'ciencias';
	$codEdificio = 'edu';
	$codCentro = 'abs';
	$tipo ='PAS';
	$superficieEspacio = '2';
	$numInventarioEspacio = '3';
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
// inserto la tupla
    $espacio->ADD();
	
// creo el modelo
    $ESPACIO2 = new ESPACIO_Model('','','','','','');
	if(gettype($ESPACIO2->SEARCH())==='object'){//miramos si lo que devuelve el search se trata de un objeto
	$ESPACIO_array_test1['error_obtenido']='array';
	}
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])//miramos si hay coincdencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	$espacio->DELETE();	
	$ESPACIO2->DELETE();	
				 		//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'ESPACIO';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$codEspacio = 'ciencias';
	$codEdificio = 'edu';
	$codCentro = 'abs';
	$tipo ='PAS';
	$superficieEspacio = '2';
	$numInventarioEspacio = '3';


	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
	$espacio->ADD();

	$buscar = new ESPACIO_Model('','','\'','','','');
	$USUARIOS_array_test1['error_obtenido'] = $buscar->SEARCH();//alamcenamos lo que devuelve el search
	
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado']) { //Si el resultado coinciden
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else { //Si no ponemos a FALSE el resultado.
		$USUARIOS_array_test1['resultado'] = 'FALSE';	
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);//Metemos el resultado en el array global unitario

	$espacio->DELETE();
	$buscar->DELETE();

}
//funcion para comprobar el delete de ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function ESPACIO_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


//--------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'DELETE';
	$ESPACIO_array_test1['error'] = 'Borrado realizado con éxito';
	$ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	// Relleno los datos de usuario	
	$codEspacio = 'ciencias';
	$codEdificio = 'edu';
	$codCentro = 'abs';
	$tipo ='PAS';
	$superficieEspacio = '2';
	$numInventarioEspacio = '3';
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
// inserto la tupla
    $espacio->ADD();
    $ESPACIO_array_test1['error_obtenido'] = $espacio->DELETE();//alamcenamos lo que devuelve el delete
	
// creo el modelo
  
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	$espacio->DELETE();	
	

}
//funcion para comprobar el rellena datos de los ESPACIO
//devolvera ok si se realiza correctamente false en caso contrario
function ESPACIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();
// Comprobar devuelve recordset
//----------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$ESPACIO_array_test1['error_esperado'] = 'array';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEspacio = 'ciencias';
	$codEdificio = 'edu';
	$codCentro = 'abs';
	$tipo ='PAS';
	$superficieEspacio = '2';
	$numInventarioEspacio = '3';
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);
// inserto la tupla
	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();//almacenamos lo que devuelve la funcion add
	$ESPACIO_array_test1['error_obtenido'] = gettype($espacio->RellenaDatos());
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$espacio->DELETE();

}
//llamamos a las funciones
	ESPACIO_ADD_test();
	ESPACIO_RellenaDatos_test();
	ESPACIO_EDIT_test();
	ESPACIO_DELETE_test();
	ESPACIO_SEARCH_test();
?>