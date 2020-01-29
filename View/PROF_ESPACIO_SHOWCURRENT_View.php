<?php
//Clase : PROF_ESPACIO_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class PROF_ESPACIO_SHOWCURRENT{

		//funcion constructor de la vista
		function __construct($tupla){	
			$this->tupla = $tupla;//le pasamos informacion de la tupla
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='mostrardetalles'></label> </h1>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' >
				<fieldset>
				 	<label id='dni'></label>: <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' value ='<?php echo $this->tupla['DNI']?>' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')" readonly><br>
					<label id='Codespacio'></label>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '15' value ='<?php echo $this->tupla['CODESPACIO']?>' onblur="comprobarVacio('CODESPACIO')  && comprobarLetrasNumeros('CODESPACIO',15)" readonly><br>
					
				</fieldset>
					

			</form>
				
		
			<div class='volver'>
			<a href='../Controller/PROF_ESPACIO_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>