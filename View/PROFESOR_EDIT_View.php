<?php
//Clase : PROFESORES_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---
	class PROFESOR_EDIT{

		//Funcion construct de la vista
		function __construct($tupla){	
			$this->tupla = $tupla;//informacion almacenada en una tupla del profesor
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='editar'></label> </h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_profesor();">
				<fieldset>
				 	<label id='dni'></label>: <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' maxlength="9" value ='<?php echo $this->tupla['DNI']?>' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')" readonly><br>
					<label id='Nombreprofesor'></label>: <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '' size = '15' maxlength="15" value ='<?php echo $this->tupla['NOMBREPROFESOR']?>' onblur="comprobarVacio('NOMBREPROFESOR')  && comprobarAlfabetico('NOMBREPROFESOR',15)" required ><br>
					<label id='Apellidosprofesor'></label> : <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '' size = '30'maxlength="30" value ='<?php echo $this->tupla['APELLIDOSPROFESOR']?>' onblur="comprobarVacio('APELLIDOSPROFESOR')  && comprobarAlfabetico('APELLIDOSPROFESOR',30)" required><br>
					<label id='Areaprofesor'></label>: <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR' placeholder = '' size = '60' maxlength="60" value ='<?php echo $this->tupla['AREAPROFESOR']?>' onblur="comprobarVacio('AREAPROFESOR')  && comprobarAlfabetico('AREAPROFESOR',60)" required ><br>
					<label id='Departamentoprofesor'></label>: <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR' placeholder = '' size = '60' maxlength="60" value ='<?php echo $this->tupla['DEPARTAMENTOPROFESOR']?>' onblur="comprobarVacio('DEPARTAMENTOPROFESOR') && comprobarAlfabetico('DEPARTAMENTOPROFESOR',60)" required ><br>

					<button type='submit' name='action' value='EDIT'><img src='../View/Img/editar.png' width="30px" height="30px"></button>
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

	} //fin EDIT

?>