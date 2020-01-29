
<?php
//Script : Index_Controller
//Creado el : 07-10-2019
//Creado por: ncgomez17
//-------------------------------------------------------
//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
	header('Location: ../index.php');
}
//esta autenticado
else{
	include '../View/users_index_View.php';
	new Index();
}

?>