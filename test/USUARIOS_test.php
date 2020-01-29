<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad USUARIOS
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad USUARIOS
	include '../Model/USUARIOS_Model.php';

// function USUARIOS_Login_test()
// Valida:
//		login no existente
//		password no correcta para el login
//		login correcto

function USUARIOS_login_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login no existe
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'El login no existe';
	$USUARIOS_array_test1['error_esperado'] = 'El login no existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'loginerror';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login();//alamcenamos lo que devuelve el login
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si coinciden
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Comprobar La password para este usuario no es correcta
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'La password para este usuario no es correcta';
	$USUARIOS_array_test1['error_esperado'] = 'La password para este usuario no es correcta';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'nico';
	$password = 'mipassword';
	$DNI='11622091F';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='676854321';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
// inserto la tupla
	$usuarios->ADD();
// cambio la password en el objeto modelo usuario
	$usuarios->password = 'passwordfalsa';

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login();//almacenamos lo que devuelve login
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($ERRORS_array_test, $USUARIOS_array_test1);		
// elimino la tupla
	$usuarios->DELETE();

// Comprobar login exitoso
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Login Correcto';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

// Relleno los datos de usuario	
	$login = 'nico';
	$password = 'aaaaa';
	$DNI='11622091F';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='676854321';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
// inserto la tupla
	$usuarios->ADD();
// pruebo el login
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login();//almacenamos lo que devuelve login
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($ERRORS_array_test, $USUARIOS_array_test1);	
// elimino la tupla
	$usuarios->DELETE();

}


//funcion para comprobar la regristar de los usuarios
//devolvera ok si se realiza correctamente false en caso contrario	

function USUARIOS_Registrar_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el usuario ya existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'register';
	$USUARIOS_array_test1['error'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_esperado'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'nico';
	$password = 'aaaaa';
	$DNI='11622091F';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='676854321';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
// inserto la tupla
	$usuarios->ADD();

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->register();//almacenamos lo que devuelve el register
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();	

// Comprobar el usuario no existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'register';
	$USUARIOS_array_test1['error'] = 'El usuario no existe';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'jrodeiro';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->register();//almacenamos lo que devuelve el register
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Comprobar error en la inserción
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'registrar';
	$USUARIOS_array_test1['error'] = 'Error en la inserción';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'jrodeiro';
	$password = 'javi';
	$DNI='11622091F';
	$nombre = 'javi\' ,\'kdfalkj'; 
	$apellidos = 'rodeiro';
	$telefono='676854321';
	$email = 'jrodeiro@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';

	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
	//$USUARIOS_array_test1['error_obtenido'] = $usuarios->registrar();
	$resultado=$usuarios->registrar();
	if(is_array($resultado)){//si se añade alguna dato incorrecto que interrumpa la insercion se almacenaran los errores de este en un array por eso comprobamos que es un array,si este lo es se produce un eerror del gestor de base de datos
		$USUARIOS_array_test1['error_obtenido'] = 'Error de gestor de base de datos';
	}
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//comprobamos si coinciden
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);	

	$usuarios->DELETE();

// Comprobar Inserción realizada con éxito
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'registrar';
	$USUARIOS_array_test1['error'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'jrodeiro';
	$password = 'javi';
	$DNI='11622091F';
	$nombre = 'javikdfalkj'; 
	$apellidos = 'rodeiro';
	$telefono='676854321';
	$email = 'jrodeiro@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';

	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->registrar();//almacenamos lo que devuelve el registrar
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();


}
//funcion para comprobar el add de los usuarios
//devolvera ok si se realiza correctamente false en caso contrario
function USUARIOS_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar add usuario ya existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'nico';
	$password = 'aaaaa';
	$DNI='11622091F';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='676854321';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
// inserto la tupla
	$usuarios->ADD();

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();//almacenamos lo que devuelve el add
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincide
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();	

// Comprobar Inserción realizada con éxito
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'nicoub';
	$password = 'aaaaa';
	$DNI='11622091F';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='676854323';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';

	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();//almacenamos lo que devuelve el add
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();


}
//funcion para comprobar la edicion de los usuarios
//devolvera ok si se realiza correctamente false en caso contrario
function USUARIOS_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

//comprobamos edit actualizacion realizada con exito
//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'EDIT';
	$USUARIOS_array_test1['error'] = 'Actualización realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'nico';//METEMOS UN USUARIO 
	$password = 'abababa';
	$DNI='11622091F';
	$nombre = 'nicolass'; 
	$apellidos = 'miapellido';
	$telefono='676854321';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';

	
// creo el modelo
    $usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
    $usuarios->ADD();
    $nombre='luis';
    $usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->EDIT();//almacenamos lo que devuelve el edit
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	

}
//funcion para comprobar el search de los USUARIOS
//devolvera ok si se realiza correctamente false en caso contrario
function USUARIOS_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

//comprobamos search devuelve recordset
//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Devuelve recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
		// Relleno los datos de usuario	
	$login = 'nico';//METEMOS UN USUARIO 
	$password = 'abababa';
	$DNI='11622091F';
	$nombre = 'nicolass'; 
	$apellidos = 'miapellido';
	$telefono='676854321';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';

	
// creo un usuario para que la busqueda devuelva un recordset
    $usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
    $usuarios->ADD();
	
// creo el modelo
    $usuarios2 = new USUARIOS_Model('','','','','','','','','','');//creamos usuario vacio
	if(gettype($usuarios2->SEARCH())==='object'){//miramos si el search devuelve un object
	$USUARIOS_array_test1['error_obtenido']='array';
	}
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);
	$usuarios->DELETE();
	//comprobamos si e search devuelve error de gestor de base de datos
	//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	//Valores para la entidad

		$login = 'aaa';
		$password = 'aaa';
		$dni = '37503860Z';
		$nombre = 'aaa';
		$apellidos = 'aaa';
		$telefono = '628114682';
		$email = 'acb@esei.es';
		$fechanacimiento = '2019-11-11';
		$fotopersonal = '';
		$sexo ='hombre';


	$usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$fechanacimiento,$fotopersonal,$sexo);
	$usuarios->ADD();

	$buscar = new USUARIOS_MODEL('','','','','\'','','','','','');
	$USUARIOS_array_test1['error_obtenido'] = $buscar->SEARCH();//almacenamos lo que devuelve el search
	
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado']) { //Si el resultado coinciden
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else { //Si no ponemos a FALSE el resultado.
		$USUARIOS_array_test1['resultado'] = 'FALSE';	
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);//Metemos el resultado en el array global unitario

	$usuarios->DELETE();
	$buscar->DELETE();

}
//funcion para comprobar el delete de los USUARIOS
//devolvera ok si se realiza correctamente false en caso contrario
function USUARIOS_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

//comprobamos delete devuelve borrado realiado con exito
//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'DELETE';
	$USUARIOS_array_test1['error'] = 'Borrado realizado con éxito';
	$USUARIOS_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
		// Relleno los datos de usuario	
	$login = 'nico';//METEMOS UN USUARIO 
	$password = 'abababa';
	$DNI='11622091F';
	$nombre = 'nicolass'; 
	$apellidos = 'miapellido';
	$telefono='676854321';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';

	
// creo un usuario para que la busqueda devuelva un recordset
    $usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
    $usuarios->ADD();
    $USUARIOS_array_test1['error_obtenido'] = $usuarios->DELETE();//almacenamos lo que devuelve el delete
	
// creo el modelo
  
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	

}
//funcion para comprobar el rellena datos de los usuarios
//devolvera ok si se realiza correctamente false en caso contrario
function USUARIOS_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();
// Comprobar devuelve recordset
//----------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'RellenaDatos';
	$USUARIOS_array_test1['error'] = 'Devuelve el recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'nicoub';
	$password = 'aaaaa';
	$DNI='11622091F';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='676854323';
	$email = 'miemail@uvigo.es';
	$FechaNacimiento='2019-12-27';
	$fotopersonal='';
	$sexo='hombre';


	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();//almacenamos lo que devuelve el add


	$USUARIOS_array_test1['error_obtenido'] = gettype($usuarios->RellenaDatos());//almacenamos el tipo de dato que devuelve el rellena datos
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])//miramos si hay coincidencia
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();

}
//llamamos a las funciones
	USUARIOS_login_test();
	USUARIOS_Registrar_test();
	USUARIOS_ADD_test();
	USUARIOS_RellenaDatos_test();
	USUARIOS_EDIT_test();
	USUARIOS_DELETE_test();
	USUARIOS_SEARCH_test();

?>