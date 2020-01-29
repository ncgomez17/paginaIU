<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : CENTRO_test.php
// Descripción : 
//	Fichero de test de unidad de la entidad CENTRO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad CENTRO
	include_once '../Model/CENTRO_Model.php';

//funcion para comprobar el add de CENTRO
//devolvera ok si se realiza correctamente false en caso contrario
function CENTRO_ADD_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar add en este casa el elemento a insertar ya existe
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'ADD';
	$CENTRO_array_test1['error'] = 'El CENTRO ya existe';
	$CENTRO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de centro	
    $codCentro ='casa';
	$codEdificio = 'hola';
	$nombreCentro = 'sur';
	$direccionCentro = 'ourense';
	$responsableCentro='nico';
// creo el modelo
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
// inserto la tupla
	$centro->ADD();

	$CENTRO_array_test1['error_obtenido'] = $centro->ADD();//comprobamos que coinciden los valores
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])//si coinciden resultado se pone a ok
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else//sino resultado a false
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);//añadimos el array anterior al array de errores de entidades

	$centro->DELETE();//borramos el centro	

// Comprobar Inserción realizada con éxito
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'ADD';
	$CENTRO_array_test1['error'] = 'Inserción realizada con éxito';
	$CENTRO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
    $codCentro ='casa';
	$codEdificio = 'hola';
	$nombreCentro = 'sur';
	$direccionCentro = 'ourense';
	$responsableCentro='nico';
// creo el modelo
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
// inserto la tupla
	$CENTRO_array_test1['error_obtenido'] = $centro->ADD();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])//comprobamos si conciden los errores si se cumple resultado a ok
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else//resultado a false
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);//añadimos el array a errores

	$centro->DELETE();//borramos el centro creado


}
//funcion para comprobar la edicion de los CENTRO
//devolvera ok si se realiza correctamente false en caso contrario
function CENTRO_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();


//--------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'EDIT';
	$CENTRO_array_test1['error'] = 'Actualización realizada con éxito';
	$CENTRO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de centro	
    $codCentro ='casa';
	$codEdificio = 'hola';
	$nombreCentro = 'sur';
	$direccionCentro = 'ourense';
	$responsableCentro='nico';
// creo el modelo
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
// inserto la tupla
    $centro->ADD();
    $codCentro='norte';//editamos el codCentri
    $CENTRO =new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);//creamos el modelo de nuevo
	$CENTRO_array_test1['error_obtenido'] = $centro->EDIT();//llamamos al edit y lo almacenamos
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])//comprobamos si coinciden los errores si se cumpe resultado a ok
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else//sino resultado a false
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);//introducimos el array en errores
	$centro->DELETE();//borramos el centro creado	
	

}
//funcion para realizar el test del metodo search de CENTRO
//devolvemos el array con los resultados obtenidos
function CENTRO_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();


//--------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'SEARCH';
	$CENTRO_array_test1['error'] = 'Devuelve recordset';
	$CENTRO_array_test1['error_esperado'] = 'array';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de centro	
    $codCentro ='casa';
	$codEdificio = 'hola';
	$nombreCentro = 'sur';
	$direccionCentro = 'ourense';
	$responsableCentro='nico';
// creo el modelo
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
// inserto la tupla
    $centro->ADD();
	
// creo el modelo
    $CENTRO2 = new CENTRO_Model('','','','','');//centro vacio
	if(gettype($CENTRO2->SEARCH())==='object'){//comprobamos si el search devuelve objeto en este caso debe ser una tupla
	$CENTRO_array_test1['error_obtenido']='array';
	}
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])//comprobamos si coinciden los errores si se cumpe resultado a ok
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else//sino resultado a false
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);//añadimos al array de errores
	$centro->DELETE();//eliminamos el centro	
	$CENTRO2->DELETE();//eliminamos el centro vacio	
						 		//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'CENTRO';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	// Relleno los datos de centro	
    $codCentro ='casa';
	$codEdificio = 'hola';
	$nombreCentro = 'sur';
	$direccionCentro = 'ourense';
	$responsableCentro='nico';
// creo el modelo
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
// inserto la tupla
    $centro->ADD();

	$buscar = new EDIFICIO_Model('','','\'','','');//creamos un edificio vacio para realizar el search
	$USUARIOS_array_test1['error_obtenido'] = $buscar->SEARCH();//alamcenamos el valor que devuelve la busqueda
	
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado']) { //Si el resultado coinciden
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else { //Si no ponemos a FALSE el resultado.
		$USUARIOS_array_test1['resultado'] = 'FALSE';	
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);//Metemos el resultado en el array global unitario

	$centro->DELETE();//borramos el centro crrado
	$buscar->DELETE();//borramos el centro creado vacio

}
//funcion para realizar el text del metodo delete de CENTRO
//devolvemos un array con los resultados obtenidos
function CENTRO_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();


//--------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'DELETE';
	$CENTRO_array_test1['error'] = 'Borrado realizado con éxito';
	$CENTRO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	// Relleno los datos de centro
    $codCentro ='casa';
	$codEdificio = 'hola';
	$nombreCentro = 'sur';
	$direccionCentro = 'ourense';
	$responsableCentro='nico';
// creo el modelo
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
// inserto la tupla
    $centro->ADD();
    $CENTRO_array_test1['error_obtenido'] = $centro->DELETE();//alamcenamos lo que devuelve el delete
	
// creo el modelo
  
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])//comprobamos si coinciden los errores
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);//alamcenamos el array en errores
	$centro->DELETE();//borramos el centro	
	

}
//funcion para comprobar el rellena datos de los CENTRO
//devolvera ok si se realiza correctamente false en caso contrario
function CENTRO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();
// Comprobar devuelve recordset
//----------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'RellenaDatos';
	$CENTRO_array_test1['error'] = 'Devuelve el recordset';
	$CENTRO_array_test1['error_esperado'] = 'array';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	// Relleno los datos de centro	
    $codCentro ='casa';
	$codEdificio = 'hola';
	$nombreCentro = 'sur';
	$direccionCentro = 'ourense';
	$responsableCentro='nico';
// creo el modelo
	$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);
// inserto la tupla
	$centro->ADD();//realizamos el add


	$CENTRO_array_test1['error_obtenido'] = gettype($centro->RellenaDatos());//comprobamos que el rellenadatos devuelve un recordset
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])//comparamos los errores obtenidos
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);//alamcenamos el array en errores

	$centro->DELETE();//borramos el centro

}
//llamamos a las funciones
	CENTRO_ADD_test();
	CENTRO_RellenaDatos_test();
	CENTRO_EDIT_test();
	CENTRO_DELETE_test();
	CENTRO_SEARCH_test();
?>