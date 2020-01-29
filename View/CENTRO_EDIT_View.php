<?php
//Clase : CENTRO_Vista
//Creado el : 06-10-2019
//Creado por: ncgomez17
//---
	class CENTRO_EDIT{

		//funcion construct de la vista
		function __construct($tupla,$tupla2){	
			$this->tupla = $tupla;//informacion de la tupla centro
			$this->tupla2 = $tupla2;//informacion de los edificios
			$this->render();
		}
		//funcion render para crear la vista
		function render(){
			
			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='editar'></label> </h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_centro();">
				<fieldset>
				 	<label id='Codcentro'></label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '10'maxlength='10' value ='<?php echo $this->tupla['CODCENTRO']?>' onblur="comprobarVacio('CODCENTRO') && comprobarLetrasNumeros('CODCENTRO',10)" required readonly><br>
					<label id='Codedificio'></label>:<select name="CODEDIFICIO" onblur="comprobarVacio('CODEDIFICIO')" required>
						<option value ='<?php echo $this->tupla['CODEDIFICIO']?>'><?php echo $this->tupla['CODEDIFICIO']; ?></option>
					<?php 
						  while($temp=$this->tupla2->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp['CODEDIFICIO']?>'><?php echo $temp['CODEDIFICIO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Nombrecentro'></label>: <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '50' maxlength='50' value ='<?php echo $this->tupla['NOMBRECENTRO']?>' onblur="comprobarVacio('NOMBRECENTRO')  && comprobarAlfabetico('NOMBRECENTRO',50)" required ><br>
					<label id='Direccioncentro'></label>: <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '150' maxlength='150' value ='<?php echo $this->tupla['DIRECCIONCENTRO']?>' onblur="comprobarVacio('DIRECCIONCENTRO')  && comprobarAlfabetico('DIRECCIONCENTRO',150)" required><br>
					<label id='Responsablecentro'></label>: <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size='60' maxlength='60' value ='<?php echo $this->tupla['RESPONSABLECENTRO']?>' onblur="comprobarVacio('RESPONSABLECENTRO') && comprobarAlfabetico('RESPONSABLECENTRO',60)" required><br>

					<button type='submit' name='action' value='EDIT'><img src='../View/Img/editar.png' width="30px" height="30px"></button>
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

	} //fin EDIT

?>