<?php
//Clase : TITULACIÓN_Vista
//Creado el : 07-10-2019
//Creado por: ncgomez17
//---
	class TITULACIÓN_SEARCH{

		//funcion construct de la vista
		function __construct(){	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='buscar'></label> </h1>	
			<form name = 'Form' action='../Controller/TITULACIÓN_Controller.php' method='post'onsubmit="return comprobar_titulacion_search();" >
				<fieldset>
				 	<label id='Codtitulacion'></label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' maxlength="10" value = '' onblur="comprobarLetrasNumerosVacio('CODTITULACION',10)" ><br>
					<label id='Codcentro'></label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '10' maxlength="10" value = '' onblur="comprobarLetrasNumerosVacio('CODCENTRO',10)" ><br>
					<label id='Nombretitulacion'></label>: <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' maxlength="50" value = '' onblur="comprobarAlfabeticoVacio('NOMBRETITULACION',50)" ><br>
					<label id='Responsabletitulacion'></label>: <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '60' maxlength="60" value = '' onblur="comprobarAlfabeticoVacio('RESPONSABLETITULACION',60)" ><br>

					<button type='submit' name='action' value='SEARCH'><img src='../View/Img/lupa.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
				
		
			<div class='volver'>
			<a href='../Controller/TITULACIÓN_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
		//incluimos el pie
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>