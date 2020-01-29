<?php
// Autor : ncgomez17
// Fecha : 5/12/2019
//Test : GENERAL_test.php
// Descripción : 
//	Fichero de test General:contiene las pruebas unitarias,de validaciones y globales
//	Saca por pantalla el resultado de los test
// crear el array principal de test
//S	$ERRORS_array_test = array();
	$ERRORS_array_test = array();
	$ERRORS_array_test_validaciones = array();
	$ERRORS_array_test_global=array();//lo declaramos como un array
	// incluimos aqui tantos ficheros de test como entidades
include '../test/GLOBAL_test.php';
include '../test/USUARIOS_test.php';
include '../test/TITULACION_test.php';
include '../test/PROFESOR_test.php';
include '../test/PROF_TITULACION_test.php';
include '../test/PROF_ESPACIO_test.php';
include '../test/ESPACIO_test.php';
include '../test/EDIFICIO_test.php';
include '../test/CENTRO_test.php';
include '../test/USUARIOS_VALIDACION_test.php';
include '../test/TITULACION_VALIDACION_test.php';
include '../test/PROFESOR_VALIDACION_test.php';
include '../test/PROF_TITULACION_VALIDACION_test.php';
include '../test/PROF_ESPACIO_VALIDACION_test.php';
include '../test/ESPACIO_VALIDACION_test.php';
include '../test/EDIFICIO_VALIDACION_test.php';
include '../test/CENTRO_VALIDACION_test.php';
?>
<?php
//esto nos permitirá contar los errores que se producen en las pruebas globales
$errores_global=0;//creamos una variable para contar los errores
foreach ($ERRORS_array_test_global as $error) {
if($error['resultado']=='FALSE'){
	$errores_global++;
}	
}
?>
<!--Mostramos el numero de test que hay y los errores que se encontraron-->
<h1>De <?php echo count($ERRORS_array_test_global);?> tests hay <?php echo $errores_global?> errores</h1>
<br>
<h1>DETALLES</h1>
<?php
//este array nos permitirá cambiar de color Pruebas globales en caso de fallo
$comprobacion=true;//declaramos la variable booleana
foreach ($ERRORS_array_test_global as $error) {
if($error['resultado']=='FALSE'){//se encontro un error
	$comprobacion=false;
}

}
if($comprobacion==false){
?>
<h1 style="color:red">Pruebas Globales </h1>
<?php
}else{
	?>
<h1 style="color:green">Pruebas Globales </h1>
<?php
}
?>
<table>
	<tr>
		<th>
			Error testeado
		</th>
		<th>
			Valor Esperado
		</th>
		<th>
			Valor Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test_global as $test)
	{
?>

		<?php
		//comprobamos que todos los test esten ok si se cumple esto los ponemos en verde
			if($test['resultado']=='OK'){
		?>
			<tr style="color:green">
		<?php
			}
		?>
		<?php
			if($test['resultado']=='FALSE'){//no se cumple un test lo ponemos en rojo
		?>
			<tr style="color:red">
		<?php
			}
		?>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
<?php	
	}
?>
</table>
<?php
//esta funcion nos dirá cuantos errores se han producido
$errores_unarias=0;//inizializamos la variable a cero
foreach ($ERRORS_array_test as $error) {
if($error['resultado']=='FALSE'){//si encontramos un false incrementamos la variable
	$errores_unarias++;
}	
}
?>
<!--Mostramos el numero de test que hay y los errores que se encontraron-->
<h1>De <?php echo count($ERRORS_array_test); ?> tests hay <?php echo $errores_unarias?> errores </h1>
<?php
//funcion que nos dira si se ha producido algun error
$comprobacion=true;
foreach ($ERRORS_array_test as $error) {
if($error['resultado']=='FALSE'){//se ha producido algun error
	$comprobacion=false;
}

}
if($comprobacion==false){//si la variable esta a false el texto a rojo
?>
<h1 style="color:red">Pruebas Unitarias</h1>
<?php
}else{//texto en rojo
	?>
<h1 style="color:green">Pruebas Unitarias</h1>
<?php
}
?>
<table>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Metodo
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Valor Esperado
		</th>
		<th>
			Valor Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test as $test)
	{
?>
		<?php
			if($test['resultado']=='OK'){//comprobamos si el test esta correcto si se cumple ponemos el texto a verde
		?>
			<tr style="color:green">
		<?php
			}
		?>
		<?php
			if($test['resultado']=='FALSE'){//si el test es incorrecto ponemos el texto a rojo
		?>
			<tr style="color:red">
		<?php
			}
		?>
		<td>
			<?php echo $test['entidad']; ?>
		</td>
		<td>
			<?php echo $test['metodo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
<?php	
	}
?>
</table>
<?php
//funcion para contar los errores
$errores_validaciones=0;//inicializamos la variable a 0
foreach ($ERRORS_array_test_validaciones as $error) {
if($error['resultado']=='FALSE'){//si algun resultado esta false incrementamos la variable
	$errores_validaciones++;
}	
}
?>
<!--Mostramos el numero de test que hay y los errores que se encontraron-->
<h1>De <?php echo count($ERRORS_array_test_validaciones); ?> tests hay <?php echo $errores_validaciones?> errores</h1>
<?php
//funcion que nos dirá si ha ocurrido algun error en el test
$comprobacion=true;//variable boolean
foreach ($ERRORS_array_test_validaciones as $error) {
if($error['resultado']=='FALSE'){//ponemos la variable a false
	$comprobacion=false;
}

}
if($comprobacion==false){//si la variable esta false el texto se pone en rojo
?>
<h1 style="color:red">Pruebas Validacion</h1>
<?php
}else{//en caso contrario se pone en verde
	?>
<h1 style="color:green">Pruebas Validacion</h1>
<?php
}
?>
<table>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Atributo
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Valor Esperado
		</th>
		<th>
			Valor Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test_validaciones as $test)
	{
?>
		<?php
			if($test['resultado']=='OK'){//ponemos la linea en verde
		?>
			<tr style="color:green">
		<?php
			}
		?>
		<?php
			if($test['resultado']=='FALSE'){//ponemos la linea en rojo
		?>
			<tr style="color:red">
		<?php
			}
		?>
		<td>
			<?php echo $test['entidad']; ?>
		</td>
		<td>
			<?php echo $test['atributo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
<?php	
	}
?>
</table>

