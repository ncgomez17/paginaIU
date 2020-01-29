<?php
//Clase : EDIFICIO_Vista
//Creado el : 06-10-2019
//Creado por: ncgomez17
//---
	class EDIFICIO_DELETE{

		//funcion construct de la vista
		function __construct($tupla){	
			$this->tupla = $tupla;//informacion de la tupla
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='borrar'></label> </h1>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' >
				<fieldset>
				 	<label id='Codedificio'></label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '10' maxlength='10' value ='<?php echo $this->tupla['CODEDIFICIO']?>' onblur="comprobarVacio('CODEDIFICIO')"readonly><br>
					<label id='Nombreedificio'></label>: <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO'  size = '50' maxlength='50' value ='<?php echo $this->tupla['NOMBREEDIFICIO']?>' onblur="comprobarVacio('NOMBREPROFESOR')  && comprobarLetras('NOMBREPROFESOR',50)" readonly><br>
					<label id='Direccionedificio'></label> : <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '150' maxlength='150' value ='<?php echo $this->tupla['DIRECCIONEDIFICIO']?>' onblur="comprobarVacio('DIRECCIONEDIFICIO')  && comprobarAlfabetico('DIRECCIONEDIFICIO',150)" readonly ><br>
					<label id='Campusedificio'></label>: <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '10' maxlength='10' value ='<?php echo $this->tupla['CAMPUSEDIFICIO']?>' onblur="comprobarVacio('CAMPUSEDIFICIO')  && comprobarAlfabetico('CAMPUSEDIFICIO',10)"readonly ><br>

					<button type='submit' name='action' value='DELETE'><img src='../View/Img/borrar.png' width="30px" height="30px"></button>
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

	} //fin DELETE

?>