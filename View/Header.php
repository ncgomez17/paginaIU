<?php
//Vista : Header_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	else{
	}
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>
<html>
<head>
	<title>
		Ejemplo arquitectura IU
	</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../View/css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../View/css/modal.css">
	<title>
		<?php echo $strings['Ejemplo arquitectura IU']; ?>
	</title>
	<script type="text/javascript" src="../View/js/tcal.js"></script> 
	<script type="text/javascript" src="../View/js/validaciones.js"></script> 
	<script type="text/javascript" src="../View/js/cambioIdioma.js"></script> 
	<script type="text/javascript" src="../View/js/comprobar.js"></script> 
	<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/tcal.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/modal.css" />
	<link href="https://fonts.googleapis.com/css?family=Cuprum&display=swap" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../View/Icons/SaludyRepública.jpg">
	<script type="text/javascript" src="../View/js/Strings_<?php echo $_COOKIE["idioma"];?>.js"></script>
</head>
<script>
/*function leerCookie(){6
alert(miscookies)
var listaCookies=miscookies.split(";");
for (i in listaCookies) {
    busca = listaCookies[i].search("idioma");
    if (busca > -1) {micookie=lista[i]}
    }
var igual = micookie.indexOf("=");
var valor = micookie.substring(igual+1);
return valor;
}
*/

//funcion para leer una cookie name  con un determinado valor,si no existe la cookie crea por defecto una cookie idioma con valor SPANISH
function readCookie(name) {
  var toret=false;//boolean para comprobar si existe la cookie
  var nameEQ = name + "=";//estabelecemos hasta donde llega el nombre 
  var ca = document.cookie.split(';');//dividimos las cadenas usando como separador ;

  for(var i=0;i < ca.length;i++) {//realizamos un bucle para encontrar la cookie que buscamos

    var c = ca[i];//guardamos el valor de cada cookie
    while (c.charAt(0)==' ') c = c.substring(1,c.length);//mientras se cumpla el patron leemos a partir del primer espacio
    if (c.indexOf(nameEQ) == 0) {//comparamos con la cookie buscada
    	toret=true;
      return decodeURIComponent( c.substring(nameEQ.length,c.length) );//devuelve el valor de la cookie
    }

  }
  if(toret==false){//si no existe la cookie creamos una cookie idioma con valor SPANISH
  	document.cookie = "idioma=" + encodeURIComponent('SPANISH');//establecemos la cookie idioma a name
  	return decodeURIComponent('SPANISH');//devuelve el valor de la cookie
  }

  return null;

}
/*
//funcion para coger la ruta del idioma en el que estamos(para acceder al fichero de idiomas correcto)
function ruta(){
	var cadena1=readCookie('idioma');//cadena con el valor de la cookie idioma
	var cadena2='../View/js/';//directorio donde se encuentra el fichero
	var cadena3='.js';//cadena con el tipo de fichero
	var cadena4=cadena2.concat(cadena1,cadena3);//concatenamos
	return cadena4;
}
*/
//funcion para modificar la cookie idioma
function modificarCookie(name){
document.cookie = "idioma=" + encodeURIComponent(name);//establecemos la cookie idioma a name
}
</script>
<body onload="cambioIdioma(readCookie('idioma'));">
		<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="aviso"><img src="../View/Icons/cerrar.jpg" name="aviso"/></div>
	  			<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" alt="" src="../View/Icons/salir.png" width="25"/>
				</a>
			</div>
		</div>
<header>
	<p style="text-align:center">
		<h1>
			<label id="Portal"></label>
		</h1>
	</p>
	<div class="Idioma" >
		<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
			<br>
			<br>
			<a href="../Functions/CambioIdioma.php?idioma=ENGLISH" style="text-decoration: none;" onclick="modificarCookie('ENGLISH');" > <img src='../View/Icons/ingles.jpg' width="25" height="20"> </a>
			<a href="../Functions/CambioIdioma.php?idioma=SPANISH" style="text-decoration: none;" onclick="modificarCookie('SPANISH');" > <img src='../View/Icons/espanha.png' width="25" height="20"> </a>
			<a href="../Functions/CambioIdioma.php?idioma=GALLAECIAN" style="text-decoration: none;"onclick="modificarCookie('GALLAECIAN');" > <img src='../View/Icons/galicia.jpg' width="25" height="20"> </a>
		</form>
	</div>

	<div class="Usuario" >
<?php
	
	if (IsAuthenticated()){
?>
<label id='usuario'></label>
<?php
		echo  ' : ' . $_SESSION['login'] . '<br>';

?>			
	<div id="Desconectar">
		<a href='../Functions/Desconectar.php'>
			<img src='../View/Img/desconectar.png' width="30" height="30">
		</a>
	</div>

<?php
	
	
	}else{
		?>
		<label id='nousuario'></label>
		<?php
		/*echo 	'<form name=\'registerForm\' action=\'../Controller/Register_Controller.php\' method=\'post\'>
					<input type=\'submit\' name=\'action\' value=\'REGISTER\'>
				</form>';*/
?>
	
		<a href='../Controller/Register_Controller.php'><img src='../View/Img/registro.png' width="30" height="30"></a>
<?php
	}	
?>
</div>
<hr id="Linea">
</header>

<div id = 'main'>
<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>
<article>
