<?php
//Script : CambioIdioma
//Creado el : 03-10-2019
//Creado por: ncgomez17
//nos permitira iniciar sesion
//---
session_start();
$idioma = $_GET['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>