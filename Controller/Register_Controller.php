<?php
//Script : Register_Controller
//Creado el : 07-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de register y enviarlos al modelo
//-------------------------------------------------------
session_start();
include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';

//session_start();
//si no se recoge ningun login invoca la vista de register
if(!isset($_POST['login'])){
	include '../View/Register_View.php';
	$register = new Register();
}
else{
		
	include '../Model/USUARIOS_Model.php';
	include '../Functions/Upload.php';
	$Imagen=isUpload();//Realizamos la funcion upload que devuelve un array
	if($Imagen["comprobacion"]==true){//comprobamos que el upload se ejecuto correctamente
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['DNI'],
	$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['telefono'],$_REQUEST['email'],$_REQUEST['FechaNacimiento'],
	$Imagen["ruta_imagen"],$_REQUEST['sexo']);
	$respuesta = $usuario->Register();
	//comprobamos si el usuario ya existe y si se puede registrar sino le mandamos un mensaje de que no se puede registrar
	
	if ($respuesta == 'true'){//registramos al usuario
		$respuesta = $usuario->registrar();//alamcenamos la repuesta del registrar
		Include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
		}
	else{//sino devolvemos respuesta
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}

}
	else{//devolvemos fallo de la imagen
        $respuesta="Fallo en el upload de la imagen";
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}
}

?>

