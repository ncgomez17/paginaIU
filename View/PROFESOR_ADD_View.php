<?php
//Clase : PROFESORES_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---
	class PROFESOR_ADD{

		//funcion construct de la vista
		function __construct(){	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='añadir'></label> </h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_profesor();">
				<fieldset>
				 	<label id='dni'></label>: <input type = 'text' name = 'DNI' id = 'DNI' placeholder = 'Utiliza tu dni' size='9' maxlength='9'  value = '' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')" required><br>
					<label id='Nombreprofesor'></label>: <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '' size = '15' maxlength="15" value = '' onblur="comprobarVacio('NOMBREPROFESOR')  && comprobarAlfabetico('NOMBREPROFESOR',15)"required ><br>
					<label id='Apellidosprofesor'></label>: <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '' size = '30' maxlength="30" value = '' onblur="comprobarVacio('APELLIDOSPROFESOR')  && comprobarAlfabetico('APELLIDOSPROFESOR',30)" required><br>
					<label id='Areaprofesor'></label>: <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR' placeholder = '' size = '60' maxlength="60" value = '' onblur="comprobarVacio('AREAPROFESOR')  && comprobarAlfabetico('AREAPROFESOR',60)"required ><br>
					<label id='Departamentoprofesor'></label>: <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR' placeholder = '' size = '60' maxlength="60" value = '' onblur="comprobarVacio('DEPARTAMENTOPROFESOR') && comprobarAlfabetico('DEPARTAMENTOPROFESOR',60)" required ><br>

					<button type='submit' name='action' value='ADD'><img src='../View/Img/agregar.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
				
		
			<div class='volver'>
			<a href='../Controller/PROFESOR_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>