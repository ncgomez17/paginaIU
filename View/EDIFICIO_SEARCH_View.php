<?php
//Clase : EDIFICIO_Vista
//Creado el : 06-10-2019
//Creado por: ncgomez17
//---
	class EDIFICIO_SEARCH{

		//funcion construct de la vista
		function __construct(){	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='buscar'></label> </h1>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_edificio_search();" >
				<fieldset>
				 	<label id='Codedificio'></label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = ''  value = '' size='10' maxlength='10' onblur="comprobarLetrasNumerosVacio('CODEDIFICIO',10)" ><br>
					<label id='Nombreedificio'></label> : <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = ''  value = '' size='50' maxlength='50' onblur=" comprobarAlfabeticoVacio('NOMBREEDIFICIO',50)" ><br>
					<label id='Direccionedificio'></label> : <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = ''  value = ''size='150' maxlength='150' onblur=" comprobarAlfabeticoVacio('DIRECCIONCENTRO',150)" ><br>
					<label id='Campusedificio'></label>: <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = ''  value = '' size='10' maxlength='10' onblur="comprobarAlfabeticoVacio('CAMPUSEDIFICIO',10)" ><br>

					<button type='submit' name='action' value='SEARCH'><img src='../View/Img/lupa.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
				
		
			<div class='volver'>
			<a href='../Controller/EDIFICIO_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>