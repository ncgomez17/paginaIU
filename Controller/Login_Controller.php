<?php
//Script : Login_Controller
//Creado el : 07-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------
session_start();
//coprobamos si el campo de login esta vacio si no mostramos la vista de login
if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	include '../View/Login_View.php';
	$login = new Login();
}
else{

	include '../Model/Access_DB.php';

	include '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','','','','','');//creamos usuarios con la contraseña y login introducidos
	$respuesta = $usuario->login();
//si la respuesta es true el usuario accede a la sesion sino se le mostrara el mensaje de que el login no es correcto
	if ($respuesta == 'true'){
		session_start();
		$_SESSION['login'] = $_REQUEST['login'];
		header('Location:../index.php');
	}
	else{
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}

}

?>

