<?php
//Clase : PROF_ESPACIO_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class PROF_ESPACIO_SEARCH{

		//funcion construct para crear la vista
		function __construct($tupla,$tupla2){
			$this->tupla=$tupla;//tupla con los profesores
			$this->tupla2=$tupla2;//tupla con los espacios
			$this->render();
		}
		//funcion reender para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='buscar'></label> </h1>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post'>
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
					<label id='Codespacio'></label>:<select name="CODESPACIO">
						<option value =''></option>
					<?php 
						  while($temp2=$this->tupla2->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp2['CODESPACIO']?>'><?php echo $temp2['CODESPACIO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>

					<button type='submit' name='action' value='SEARCH'><img src='../View/Img/lupa.png' width="30px" height="30px"></button>
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

	} //fin SEARCH

?>