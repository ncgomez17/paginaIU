<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : EDIFICIO_test.php
// Descripción : 
//	Fichero de test de unidad de la entidad EDIFICIO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad EDIFICIO
	include '../Model/EDIFICIO_Model.php';

//funcion para comprobar el add de EDIFICIO
//devolvera ok si se realiza correctamente false en caso contrario
function EDIFICIO_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar edit 
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'ADD';
	$EDIFICIO_array_test1['error'] = 'El EDIFICIO ya existe';
	$EDIFICIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEdificio ='casa';
	$nombreEdificio = 'hola';
	$direcciónEdificio = 'sur';
	$campusEdificio = 'ourense';
// creo el modelo
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
// inserto la tupla
	$edificio->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();//almacenamos los que devuelve el metodo add
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$edificio->DELETE();	

// Comprobar Inserción realizada con éxito
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'ADD';
	$EDIFICIO_array_test1['error'] = 'Inserción realizada con éxito';
	$EDIFICIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEdificio ='casa';
	$nombreEdificio = 'hola';
	$direcciónEdificio = 'sur';
	$campusEdificio = 'ourense';
// creo el modelo
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
// inserto la tupla
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();//almacenamos los que devuelve el metodo add
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$edificio->DELETE();


}
//funcion para comprobar la edicion de los EDIFICIO
//devolvera ok si se realiza correctamente false en caso contrario
function EDIFICIO_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();


//--------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'EDIT';
	$EDIFICIO_array_test1['error'] = 'Actualización realizada con éxito';
	$EDIFICIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEdificio ='casa';
	$nombreEdificio = 'hola';
	$direcciónEdificio = 'sur';
	$campusEdificio = 'ourense';
// creo el modelo
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
// inserto la tupla
    $edificio->ADD();
    $codEdificio='luis';
    $EDIFICIO =  new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->EDIT();//almacenamos los que devuelve el metodo edit
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	$edificio->DELETE();	
	

}
//funcion para comprobar el search de EDIFICIO
//devolvera ok si se realiza correctamente false en caso contrario
function EDIFICIO_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();


//--------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'SEARCH';
	$EDIFICIO_array_test1['error'] = 'Devuelve recordset';
	$EDIFICIO_array_test1['error_esperado'] = 'array';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEdificio ='casa';
	$nombreEdificio = 'hola';
	$direcciónEdificio = 'sur';
	$campusEdificio = 'ourense';
// creo el modelo
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
// inserto la tupla
    $edificio->ADD();
	
// creo el modelo
    $EDIFICIO2 = new EDIFICIO_Model('','','','');
	if(gettype($EDIFICIO2->SEARCH())==='object'){//comprobamos si lo que devuelve el search es un object
	$EDIFICIO_array_test1['error_obtenido']='array';
	}
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	$edificio->DELETE();	
	$EDIFICIO2->DELETE();	
	
					 		//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'EDIFICIO';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$codEdificio ='casa';
	$nombreEdificio = 'hola';
	$direcciónEdificio = 'sur';
	$campusEdificio = 'ourense';
// creo el modelo
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
// inserto la tupla
    $edificio->ADD();

	$buscar = new EDIFICIO_Model('','','\'','');
	$USUARIOS_array_test1['error_obtenido'] = $buscar->SEARCH();//almacenamos los que devuelve el metodo search
	
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado']) { //Si el resultado coinciden
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else { //Si no ponemos a FALSE el resultado.
		$USUARIOS_array_test1['resultado'] = 'FALSE';	
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);//Metemos el resultado en el array global unitario

	$edificio->DELETE();
	$buscar->DELETE();
}
//funcion para comprobar el delete de EDIFICIO
//devolvera ok si se realiza correctamente false en caso contrario
function EDIFICIO_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();


//--------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'DELETE';
	$EDIFICIO_array_test1['error'] = 'Borrado realizado con éxito';
	$EDIFICIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	// Relleno los datos de usuario	
	$codEdificio ='casa';
	$nombreEdificio = 'hola';
	$direcciónEdificio = 'sur';
	$campusEdificio = 'ourense';
// creo el modelo
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
// inserto la tupla
    $edificio->ADD();
    $EDIFICIO_array_test1['error_obtenido'] = $edificio->DELETE();//almacenamos los que devuelve el metodo delete
	
// creo el modelo
  
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	$edificio->DELETE();	
	

}
//funcion para comprobar el rellena datos de los EDIFICIO
//devolvera ok si se realiza correctamente false en caso contrario
function EDIFICIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();
// Comprobar devuelve recordset
//----------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'RellenaDatos';
	$EDIFICIO_array_test1['error'] = 'Devuelve el recordset';
	$EDIFICIO_array_test1['error_esperado'] = 'array';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEdificio ='casa';
	$nombreEdificio = 'hola';
	$direcciónEdificio = 'sur';
	$campusEdificio = 'ourense';
// creo el modelo
	$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direcciónEdificio,$campusEdificio);
// inserto la tupla
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();//almacenamos los que devuelve el metodo add


	$EDIFICIO_array_test1['error_obtenido'] = gettype($edificio->RellenaDatos());//almacenamos el tipo de dato que devuelve rellena datos
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$edificio->DELETE();

}
//llamamos a las funciones
	EDIFICIO_ADD_test();
	EDIFICIO_RellenaDatos_test();
	EDIFICIO_EDIT_test();
	EDIFICIO_DELETE_test();
	EDIFICIO_SEARCH_test();
?>