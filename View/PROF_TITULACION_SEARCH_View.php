<?php
//Clase : PROF_TITULACION_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class PROF_TITULACION_SEARCH{

		//funcion construct de la vista
		function __construct($tupla,$tupla2){
			$this->tupla=$tupla;//tuplas con los profesores
			$this->tupla2=$tupla2;//tuplas con las titulaciones
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='buscar'></label> </h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_prof_titulacion_search();" >
				<fieldset>
				 	 <label id='dni'></label>:<select name="DNI">
				 		<option value =''></option>
					<?php 
						  while($temp=$this->tupla->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp['DNI']?>'><?php echo $temp['DNI']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Codtitulacion'></label>:<select name="CODTITULACION">
						<option value =''></option>
					<?php 
						  while($temp2=$this->tupla2->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp2['CODTITULACION']?>'><?php echo $temp2['CODTITULACION']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Añoacademico'></label>: <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '9' maxlength="9" value ='' onblur="comprobarLetrasNumerosVacio('ANHOACADEMICO',9)"><br>

					<button type='submit' name='action' value='SEARCH'><img src='../View/Img/lupa.png' width="30px" height="30px"></button>
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

	} //fin SEARCH

?>