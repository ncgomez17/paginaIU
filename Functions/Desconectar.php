<?php
//Script : Desconectar
//Creado el : 03-10-2019
//Creado por: ncgomez17
//nos permitira desconectar
//---
session_start();
session_destroy();
header('Location:../index.php');

?>
