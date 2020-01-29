<?php
//testing funcionalidades globales
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : GLOBAL_test.php
// Descripción : 
//	Fichero de test Global contiene las pruebas globales
include '../Model/config.php';
// Esta funcion prueba de que el usuario definido con su contraseña se pueden conectar al gestor de la bd
function usuarioBD()
{
	global $ERRORS_array_test_global;//creamos el array de errores global
// creo array de almacen de test individual
	$global_array_test = array();

// usuario o contraseña no es correcto
//-------------------------------------------------------------------------------
	$global_array_test['error'] = 'Usuario contraseña erronea';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' (using password: YES)";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	mysqli_report(MYSQLI_REPORT_STRICT);//Esta funcion habilita o deshabilita las funciones internas de reporte .Lanza una mysqli_sql_exception para errors en lugar de para advertencias
	try{
		$mysqli = new mysqli(host, user, 'aaaa' , BD);//creamos el usuario sql

	}
	catch(mysqli_sql_exception $error){//capturamos la excepcion
		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' (using password: YES)";
	}

   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos los errores
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);

	// usuario correcto
//-------------------------------------------------------------------------------
	$global_array_test['error'] = 'Usuario correcto';
	$global_array_test['error_esperado'] = 'Correcto';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	mysqli_report(MYSQLI_REPORT_STRICT);//Esta funcion habilita o deshabilita las funciones internas de reporte .Lanza una mysqli_sql_exception para errors en lugar de para advertencias
	try{//capturamos el error
		$mysqli = new mysqli(host, user,pass, BD);//creamos el usuario sql
		if ($mysqli->connect_errno!=0) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }else {
    	$global_array_test['error_obtenido'] = 'Correcto';
    }
    }
	catch(mysqli_sql_exception $error){//capturamos la excepcion
		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
	}

   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos los errores obtenido y esperado
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);
}
 //esta funcion comprobara si la base de datos existe
	function existeBD(){
	// existe la BD
	//------------------------------------------
   //comprobamos que eexiste la bd
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existe la bd';
	$global_array_test['error_esperado'] = 'Correcto';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno!=0) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }else{
    		$global_array_test['error_obtenido'] = 'Correcto';//establecemos el error a correcto
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Fallo en la conexion con la BD";
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos los errores obtenido y esperado
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);

	// creo array de almacen de test individual

	//Prueba de que la base de datos a utilizar existe con su nombre correcto
	//------------------------------------------

	$global_array_test['entidad'] = 'Global';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'La base datos hola no existe';
	$global_array_test['error_esperado'] = "Unknown database 'hola'";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$user = 'root';
	$pass = 'iu';

	set_error_handler(function() { /* ignore errors */ });
	
	try{
		$mysqli = new mysqli(host, $user, $pass , 'hola');
		dns_get_record();
    	}catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Fallo en la conexion con la BD";
    	}
	
	restore_error_handler();
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	$global_array_test['error_obtenido'] = $mysqli->connect_error;
    }	


   	if ($global_array_test['error_esperado'] == $global_array_test['error_obtenido'])// Si el error obtenido es el esperado 
	{
		$global_array_test['resultado'] = 'OK';
	}
	else//sino
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);
}

//funcion para realizar el test de que las tablas de la base de datos se ha creado correctamente
//comprobamos cada una de las tablas
function ExistenTablas()
{// existe las tablas
	//------------------------------------------
  //comprobamos que existe la tabla CENTRO
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existen tablas';
	$global_array_test['error_esperado'] = 'Existe la tabla CENTRO';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
    	}
    	if( $mysqli->query("SHOW TABLES LIKE 'CENTRO'")->num_rows==0 ){//realizamos la consulta de si existe la tabla 
    		$global_array_test['error_obtenido'] = 'No existe la tabla CENTRO';
    	}
    	else{
    		$global_array_test['error_obtenido'] = 'Existe la tabla CENTRO';
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos el error esperado con el error obtenido
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);
	//------------------------------------------
   //comprobamos que existe la tabla EDIFICIO
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existen tablas';
	$global_array_test['error_esperado'] = 'Existe la tabla EDIFICIO';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
    	}
    	if( $mysqli->query("SHOW TABLES LIKE 'EDIFICIO'")->num_rows==0 ){//realizamos la consulta de si existe la table
    		$global_array_test['error_obtenido'] = 'No existe la tabla EDIFICIO';
    	}
    	else{
    		$global_array_test['error_obtenido'] = 'Existe la tabla EDIFICIO';
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos el valor obtenido con el esperado
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);

		//------------------------------------------
     //comprobamos que existe la tabla ESPACIO
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existen tablas';
	$global_array_test['error_esperado'] = 'Existe la tabla ESPACIO';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
    	}
    	if( $mysqli->query("SHOW TABLES LIKE 'ESPACIO'")->num_rows==0 ){//realizamos la consulta para comprobar si existe la tabla
    		$global_array_test['error_obtenido'] = 'No existe la tabla ESPACIO';
    	}
    	else{
    		$global_array_test['error_obtenido'] = 'Existe la tabla ESPACIO';
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos el valor obtenido con el esperado
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);
			//------------------------------------------
  //comprobamos que existe la tabla PROFESOR
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existen tablas';
	$global_array_test['error_esperado'] = 'Existe la tabla PROFESOR';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
    	}
    	if( $mysqli->query("SHOW TABLES LIKE 'PROFESOR'")->num_rows==0 ){//realizamos la consulta para comprobar s existe la tabla
    		$global_array_test['error_obtenido'] = 'No existe la tabla PROFESOR';
    	}
    	else{
    		$global_array_test['error_obtenido'] = 'Existe la tabla PROFESOR';
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos el vaor obtenido con el esperado
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);
			//------------------------------------------
  //comprobamos que existe la tabla TITULACION
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existen tablas';
	$global_array_test['error_esperado'] = 'Existe la tabla TITULACION';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
    	}
    	if( $mysqli->query("SHOW TABLES LIKE 'TITULACION'")->num_rows==0 ){//realizamos la consulta para comprobar si existe la tabla
    		$global_array_test['error_obtenido'] = 'No existe la tabla TITULACION';
    	}
    	else{
    		$global_array_test['error_obtenido'] = 'Existe la tabla TITULACION';
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);

				//------------------------------------------
   //comprobamos que existe la tabla USUARIOS
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existen tablas';
	$global_array_test['error_esperado'] = 'Existe la tabla USUARIOS';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
    	}
    	if( $mysqli->query("SHOW TABLES LIKE 'USUARIOS'")->num_rows==0 ){//realizamos la consulta para comprobar si existe la tabla
    		$global_array_test['error_obtenido'] = 'No existe la tabla USUARIOS';
    	}
    	else{
    		$global_array_test['error_obtenido'] = 'Existe la tabla USUARIOS';
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos el valor obtenido con el esperado
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);
				//------------------------------------------
     //comprobamos que existe la tabla PROF_ESPACIO
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existen tablas';
	$global_array_test['error_esperado'] = 'Existe la tabla PROF_ESPACIO';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
    	}
    	if( $mysqli->query("SHOW TABLES LIKE 'PROF_ESPACIO'")->num_rows==0 ){//realizamos la consulta para comprobar si existe la tabla
    		$global_array_test['error_obtenido'] = 'No existe la tabla PROF_ESPACIO';
    	}
    	else{
    		$global_array_test['error_obtenido'] = 'Existe la tabla PROF_ESPACIO';
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos el valor obtenido con el esperado
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);
					//------------------------------------------
   //comprobamos que existe la tabla PROF_TITULACION
	global $ERRORS_array_test_global;
	$global_array_test['error'] = 'Existen tablas';
	$global_array_test['error_esperado'] = 'Existe la tabla PROF_TITULACION';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';
	try{
	$mysqli = new mysqli(host, user, pass, BD);
		if ($mysqli->connect_errno) {//comprobamos si salta error
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }
    	}
    	catch(mysqli_sql_exception $error){//capturamos la excepcion
    		$global_array_test['error_obtenido']="Access denied for user 'iu2018'@'localhost' to database";
    	}
    	if( $mysqli->query("SHOW TABLES LIKE 'PROF_TITULACION'")->num_rows==0 ){//realizamos la consulta para comproar si existe la tabla
    		$global_array_test['error_obtenido'] = 'No existe la tabla PROF_TITULACION';
    	}
    	else{
    		$global_array_test['error_obtenido'] = 'Existe la tabla PROF_TITULACION';
    	}
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])//comparamos el valor obtenido con el esperado
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);





}
//llamamos a las funciones
usuarioBD();
existeBD();
ExistenTablas();
?>