<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : TITULACION_test.php
// Descripción : 
//	Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad TITULACION
	include '../Model/TITULACIÓN_Model.php';


//funcion para comprobar el add de los TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function TITULACION_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar add 
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'ADD';
	$TITULACION_array_test1['error'] = 'La titulacion ya existe';
	$TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codTitulacion = 'nico';
	$codCentro = 'aaaaa';
	$nombreTitulacion='Faa';
	$responsable = 'minombre'; 
// creo el modelo
	$titulacion = new TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsable);
// inserto la tupla
	$titulacion->ADD();

	$TITULACION_array_test1['error_obtenido'] = $titulacion->ADD();//almacenamos lo que devuelve el add
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();	

// Comprobar Inserción realizada con éxito
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'ADD';
	$TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
	$TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codTitulacion = 'nico';
	$codCentro = 'aaaaa';
	$nombreTitulacion='Faaar';
	$responsable = 'minombre'; 
// creo el modelo
	$titulacion = new TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsable);
// inserto la tupla
	$TITULACION_array_test1['error_obtenido'] = $titulacion->ADD();//almacenamos lo que devuelve el add
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();


}
//funcion para comprobar la edicion de los TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function TITULACION_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

//comprobamos edt devuelve actualizacion realizada con exito
//--------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'EDIT';
	$TITULACION_array_test1['error'] = 'Actualización realizada con éxito';
	$TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codTitulacion = 'nico';
	$codCentro = 'aaaaa';
	$nombreTitulacion='Faaar';
	$responsable = 'minombre'; 
// creo el modelo
	$titulacion = new TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsable);
// inserto la tupla
    $titulacion->ADD();
    $nombre='luis';
    $titulacion = new  TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsable);
	$TITULACION_array_test1['error_obtenido'] = $titulacion->EDIT();//almcenamos lo que devuelve el edit
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();	
	
}
//funcion para comprobar el search de los TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function TITULACION_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

//comprobamos si search devuelve recordset
//--------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'SEARCH';
	$TITULACION_array_test1['error'] = 'Devuelve recordset';
	$TITULACION_array_test1['error_esperado'] = 'array';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codTitulacion = 'nico';
	$codCentro = 'aaaaa';
	$nombreTitulacion='Faaar';
	$responsable = 'minombre'; 
// creo el modelo
	$titulacion = new TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsable);
    $titulacion->ADD();
	
// creo el modelo
    $TITULACION2 = new TITULACIÓN_Model('','','','','','','','','','');//creamos titulacion vacia
	if(gettype($TITULACION2->SEARCH())==='object'){//miramos si el search devuelve un object
	$TITULACION_array_test1['error_obtenido']='array';
	}
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);
 	$titulacion->DELETE();	
 	$TITULACION2->DELETE();	
	//comprobamos que search devuelve error de gestor e base de datos
 		//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'TITULACION';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	//Valores para la entidad
	$codTitulacion = 'nico';
	$codCentro = 'aaaaa';
	$nombreTitulacion='Faaar';
	$responsable = 'minombre'; 


	$titulacion = new TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsable);
	$titulacion->ADD();

	$buscar = new TITULACIÓN_MODEL('','','\'','');
	$USUARIOS_array_test1['error_obtenido'] = $buscar->SEARCH();//almacenamos lo que devuelve el search
	
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado']) { //Si el resultado coinciden
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else { //Si no ponemos a FALSE el resultado.
		$USUARIOS_array_test1['resultado'] = 'FALSE';	
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);//Metemos el resultado en el array global unitario

	$titulacion->DELETE();
	$buscar->DELETE();
}
//funcion para comprobar el delete de los TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function TITULACION_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();


//--------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'DELETE';
	$TITULACION_array_test1['error'] = 'Borrado realizado con éxito';
	$TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codTitulacion = 'nico';
	$codCentro = 'aaaaa';
	$nombreTitulacion='Faaar';
	$responsable = 'minombre'; 
// creo el modelo
	$titulacion = new TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsable);
    $titulacion->ADD();
    $TITULACION_array_test1['error_obtenido'] = $titulacion->DELETE();//almacenamos lo que devuelve el delete
	
// creo el modelo
  
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])//miramos si hay coinciencia
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();	

}
//funcion para comprobar el rellena datos de los TITULACION
//devolvera ok si se realiza correctamente false en caso contrario
function TITULACION_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();
// Comprobar devuelve recordset
//----------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$TITULACION_array_test1['error_esperado'] = 'array';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codTitulacion = 'nico';
	$codCentro = 'aaaaa';
	$nombreTitulacion='Faaar';
	$responsable = 'minombre'; 
// creo el modelo
	$titulacion = new TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsable);
	$titulacion->ADD();


	$TITULACION_array_test1['error_obtenido'] = gettype($titulacion->RellenaDatos());//almacenamos el tipo de dato que devuelve el rellena datos
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();

}
//llamamos a las funciones
	TITULACION_ADD_test();
	TITULACION_RellenaDatos_test();
	TITULACION_EDIT_test();
	TITULACION_DELETE_test();
	TITULACION_SEARCH_test();

?>