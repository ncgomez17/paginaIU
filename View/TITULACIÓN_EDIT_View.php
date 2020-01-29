<?php
//Clase : TITULACIÓN_Vista
//Creado el : 07-10-2019
//Creado por: ncgomez17
//---
	class TITULACIÓN_EDIT{

		//funcion construct de la vista
		function __construct($tupla,$tupla2){	
			$this->tupla = $tupla;//informacion de la tupla
			$this->tupla2 = $tupla2;//informacion de los centros
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='editar'></label> </h1>	
			<form name = 'Form' action='../Controller/TITULACIÓN_Controller.php' method='post' onsubmit="return comprobar_titulacion();">
				<fieldset>
				 	<label id='Codtitulacion'></label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' maxlength="10" value ='<?php echo $this->tupla['CODTITULACION']?>' onblur="comprobarVacio('CODTITULACION') && comprobarLetrasNumeros('CODTITULACION',10)"readonly required><br>
					<label id='Codcentro'></label>:<select name="CODCENTRO" required>
					<?php 
						  while($temp=$this->tupla2->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp['CODCENTRO']?>'><?php echo $temp['CODCENTRO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Nombretitulacion'></label>: <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' maxlength="50" value ='<?php echo $this->tupla['NOMBRETITULACION']?>' onblur="comprobarVacio('NOMBRETITULACION')  && comprobarAlfabetico('NOMBRETITULACION',50)" required ><br>
					<label id='Responsabletitulacion'></label>: <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = 'Solo letras' size = '60' maxlength="60" value ='<?php echo $this->tupla['RESPONSABLETITULACION']?>' onblur="comprobarVacio('RESPONSABLETITULACION')  && comprobarAlfabetico('RESPONSABLETITULACION',60)"required ><br>

					<button type='submit' name='action' value='EDIT'><img src='../View/Img/editar.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
				
		
			<div class='volver'>
			<a href='../Controller/TITULACIÓN_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
		//incluye el pie
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>