<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : PROFESOR_test.php
// Descripción : 
//	Fichero de test de unidad de la entidad PROFESOR
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROFESOR
	include '../Model/PROFESOR_Model.php';

//funcion para comprobar el add de PROFESOR
//devolvera ok si se realiza correctamente false en caso contrario
function PROFESOR_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar add insercion fallida 
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'ADD';
	$PROFESOR_array_test1['error'] = 'El PROFESOR ya existe';
	$PROFESOR_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$nombreprofesor = 'luis';
	$apellidosprofesor ='gomez';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'ciencia';
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
// inserto la tupla
	$profesor->ADD();

	$PROFESOR_array_test1['error_obtenido'] = $profesor->ADD();//alamcenamos lo que devuelve el add
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])//comparamos los resultados
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$profesor->DELETE();	

// Comprobar Inserción realizada con éxito
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'ADD';
	$PROFESOR_array_test1['error'] = 'Inserción realizada con éxito';
	$PROFESOR_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$nombreprofesor = 'luis';
	$apellidosprofesor ='gomez';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'ciencia';
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
	$PROFESOR_array_test1['error_obtenido'] = $profesor->ADD();//almacenamos lo que devuelve el add
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])//comparamos los resultados
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$profesor->DELETE();


}
//funcion para comprobar la edicion de los PROFESOR
//devolvera ok si se realiza correctamente false en caso contrario
function PROFESOR_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

//comprobar edit actualizacion realizada con exito
//--------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'EDIT';
	$PROFESOR_array_test1['error'] = 'Actualización realizada con éxito';
	$PROFESOR_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$nombreprofesor = 'luis';
	$apellidosprofesor ='gomez';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'ciencia';
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
// inserto la tupla
    $profesor->ADD();
    $nombreprofesor='luis';
    $profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
	$PROFESOR_array_test1['error_obtenido'] = $profesor->EDIT();//almacenamos lo que devuelve el edit
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])//comparamos los resultados
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	$profesor->DELETE();	
	

}
//funcion para comprobar el search de PROFESOR
//devolvera ok si se realiza correctamente false en caso contrario
function PROFESOR_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

//comprobar search devuelve un recordset
//--------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'SEARCH';
	$PROFESOR_array_test1['error'] = 'Devuelve recordset';
	$PROFESOR_array_test1['error_esperado'] = 'array';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$nombreprofesor = 'luis';
	$apellidosprofesor ='gomez';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'ciencia';
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
// inserto la tupla
    $profesor->ADD();
	
// creo el modelo
    $PROFESOR2 = new PROFESOR_Model('','','','','');//creamos profesor vacio
	if(gettype($PROFESOR2->SEARCH())==='object'){//comprobamos que el search devuelve un objeto
	$PROFESOR_array_test1['error_obtenido']='array';
	}
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	$profesor->DELETE();	
	$PROFESOR2->DELETE();	
	//comprobamos que el search devuelve error de gestor de base de datos
	 		//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'PROFESOR';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	//Valores para la entidad
	$DNI = '44494151F';
	$nombreprofesor = 'luis';
	$apellidosprofesor ='gomez';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'ciencia';


	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
	$profesor->ADD();

	$buscar = new PROFESOR_MODEL('','','\'','','');//creamos un profesor
	$USUARIOS_array_test1['error_obtenido'] = $buscar->SEARCH();//almacenamos el resultado de search
	
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
//funcion para comprobar el delete de PROFESOR
//devolvera ok si se realiza correctamente false en caso contrario
function PROFESOR_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

//comprobar delete borrado realizado con exito
//--------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'DELETE';
	$PROFESOR_array_test1['error'] = 'Borrado realizado con éxito';
	$PROFESOR_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$nombreprofesor = 'luis';
	$apellidosprofesor ='gomez';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'ciencia';
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
// inserto la tupla
    $profesor->ADD();
    $PROFESOR_array_test1['error_obtenido'] = $profesor->DELETE();//almacenamos lo que devuelve el delete
	
// creo el modelo
  
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])//comprobamos los resultados
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	$profesor->DELETE();	
	

}
//funcion para comprobar el rellena datos de los PROFESOR
//devolvera ok si se realiza correctamente false en caso contrario
function PROFESOR_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();
// Comprobar devuelve recordset
//----------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'RellenaDatos';
	$PROFESOR_array_test1['error'] = 'Devuelve el recordset';
	$PROFESOR_array_test1['error_esperado'] = 'array';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '44494151F';
	$nombreprofesor = 'luis';
	$apellidosprofesor ='gomez';
	$areaprofesor = 'matematicas';
	$departamentoprofesor = 'ciencia';
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor);
// inserto la tupla
	 $profesor->ADD();


	$PROFESOR_array_test1['error_obtenido'] = gettype($profesor->RellenaDatos());//almacenamos el tipo de dato que devuelve el rellena datos
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])//comparamos resultados
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$profesor->DELETE();

}
//llamamos a las funciones
	PROFESOR_ADD_test();
	PROFESOR_RellenaDatos_test();
	PROFESOR_EDIT_test();
	PROFESOR_DELETE_test();
	PROFESOR_SEARCH_test();
?>