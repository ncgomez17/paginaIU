<?php
//Clase : CENTRO_Vista
//Creado el : 06-10-2019
//Creado por: ncgomez17
//---
	class CENTRO_DELETE{

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
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' >
				<fieldset>
				 	<label id='Codcentro'></label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '10' maxlength='10' value ='<?php echo $this->tupla['CODCENTRO']?>' onblur="comprobarVacio('CODCENTRO') &&  comprobarLetrasNumeros('CODCENTRO',10)"  readonly><br>
					<label id='Codedificio'></label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '10' maxlength='10' value ='<?php echo $this->tupla['CODEDIFICIO']?>' onblur="comprobarVacio('CODEDIFICIO')  && comprobarLetrasNumeros('CODEDIFICIO',10)" readonly><br>
					<label id='Nombrecentro'></label>: <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '50' maxlength='50' value ='<?php echo $this->tupla['NOMBRECENTRO']?>' onblur="comprobarVacio('NOMBRECENTRO')  && comprobarAlfabetico('NOMBRECENTRO',50)" readonly ><br>
					<label id='Direccioncentro'></label>: <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '150' maxlength='150' value ='<?php echo $this->tupla['DIRECCIONCENTRO']?>' onblur="comprobarVacio('DIRECCIONCENTRO')  && comprobarAlfabetico('DIRECCIONCENTRO',150)"readonly ><br>
					<label id='Responsablecentro'></label>: <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '60' maxlength='60' value ='<?php echo $this->tupla['RESPONSABLECENTRO']?>' onblur="comprobarVacio('RESPONSABLECENTRO') && comprobarAlfabetico('RESPONSABLECENTRO',60)"readonly ><br>

					<button type='submit' name='action' value='DELETE'><img src='../View/Img/borrar.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
				
		
			<div class='volver'>
			<a href='../Controller/CENTRO_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>