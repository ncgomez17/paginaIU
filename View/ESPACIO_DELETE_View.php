<?php
//Clase : ESPACIO_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class ESPACIO_DELETE{

		//funcion construct de la vista
		function __construct($tupla){	
			$this->tupla = $tupla;//mostramos informacion de la tupla
			$this->render();
		}
		//funcion construct del metodo render
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='borrar'></label> </h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post'>
				<fieldset>
				 	<label id='Codespacio'></label>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' maxlength='10' value ='<?php echo $this->tupla['CODESPACIO']?>'  onblur="comprobarVacio('CODESPACIO')"readonly ><br>
					<label id='Codedificio'></label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '30' maxlength='30' value ='<?php echo $this->tupla['CODEDIFICIO']?>'  onblur="comprobarVacio('CODEDIFICIO')  && comprobarAlfabetico('CODEDIFICIO',30)" readonly ><br>
					<label id='Codcentro'></label> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '10' maxlength='10' value ='<?php echo $this->tupla['CODCENTRO']?>'  onblur="comprobarVacio('CODCENTRO')" readonly ><br>
					<label id='Tipo'></label>:<input type = 'text' name='TIPO' id='TIPO'  value ='<?php echo $this->tupla['TIPO']?>'  readonly><br>
					<label id='Superficieespacio'></label>:<input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '4'  maxlength='4' value ='<?php echo $this->tupla['SUPERFICIEESPACIO']?>' onblur="comprobarVacio('SUPERFICIEESPACIO') && comprobarEntero('SUPERFICIEESPACIO')" readonly ><br>
					<label id='Numeroinventario'></label>:<input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '8' maxlength='8' value ='<?php echo $this->tupla['NUMINVENTARIOESPACIO']?>' onblur="comprobarVacio('NUMINVENTARIOESPACIO') && comprobarEntero('NUMINVENTARIOESPACIO')" readonly ><br>

					<button type='submit' name='action' value='DELETE'><img src='../View/Img/borrar.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
				
		
			<div class='volver'>
			<a href='../Controller/ESPACIO_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>