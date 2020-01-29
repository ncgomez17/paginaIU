<?php
//Clase : PROF_TITULACION_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class PROF_TITULACION_ADD{

		//funcion construct de la vista
		function __construct($tupla,$tupla2){
			$this->tupla=$tupla;//tupla con los profesores
			$this->tupla2=$tupla2;//tupla con las titulaciones	
			$this->render();
		}
		//funcion rendeer para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='añadir'></label> </h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_profesor_titulacion();">
				<fieldset>
				 	<label id='dni'></label>:<select name="DNI" required>
					<?php 
						  while($temp=$this->tupla->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp['DNI']?>'><?php echo $temp['DNI']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Codtitulacion'></label>:<select name="CODTITULACION" required>
					<?php 
						  while($temp2=$this->tupla2->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp2['CODTITULACION']?>'><?php echo $temp2['CODTITULACION']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Añoacademico'></label>: <input type = 'text' name = 'ANHOACADEMICO' id ='ANHOACADEMICO' placeholder = '' size = '9' maxlength="9" value ='' onblur="comprobarVacio('ANHOACADEMICO')  && comprobarAnhoAcademico('ANHOACADEMICO',9)" required><br>
					<button type='submit' name='action' value='ADD'><img src='../View/Img/agregar.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
				
		
			<div class='volver'>
			<a href='../Controller/PROF_TITULACION_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>