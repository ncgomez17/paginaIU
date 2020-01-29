<?php
//Clase : PROFESORES_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---
	class PROFESOR_SEARCH{

		//FUNCION CONSTRUCT DE LA VISTA
		function __construct(){	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='buscar'></label> </h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_profesores_search();">
				<fieldset>
				 	<label id='dni'></label>: <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' maxlength="9" value = '' onblur="comprobarDniVacio('DNI')" ><br>
					<label id='Nombreprofesor'></label>: <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '' size = '15' maxlength="15" value = '' onblur="comprobarAlfabeticoVacio('NOMBREPROFESOR',15)" ><br>
					<label id='Apellidosprofesor'></label>: <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOS' placeholder = '' size = '30' maxlength="30" value = '' onblur=" comprobarAlfabeticoVacio('APELLIDOSPROFESOR',30)" ><br>
					<label id='Areaprofesor'></label>: <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR' placeholder = '' size = '60' maxlength="60" value = '' onblur="comprobarAlfabeticoVacio('AREAPROFESOR',60)" ><br>
					<label id='Departamentoprofesor'></label> : <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR' placeholder = '' size = '60' maxlength="60" value = '' onblur="comprobarAlfabeticoVacio('DEPARTAMENTOPROFESOR',60)" ><br>

					<button type='submit' name='action' value='SEARCH'><img src='../View/Img/lupa.png' width="30px" height="30px"></button>
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

	} //fin SEARCH

?>