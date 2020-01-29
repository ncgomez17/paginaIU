<?php
//Clase : CENTRO_Vista
//Creado el : 06-10-2019
//Creado por: ncgomez17
//---
	class CENTRO_SEARCH{

		//funcion construct de la vista
		function __construct($tupla){
			$this->tupla=$tupla;//informacion de la tupla	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){
			
			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='buscar'></label> </h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_centro_search();">
				<fieldset>
				 	<label id='Codcentro'></label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' size='10' maxlength='10' placeholder = ''  value = '' onblur="comprobarLetrasNumerosVacio('CODCENTRO',10)" ><br>
					<label id='Codedificio'></label>:<select name="CODEDIFICIO">
						<option value =''></option>
					<?php 
						  while($temp=$this->tupla->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp['CODEDIFICIO']?>'><?php echo $temp['CODEDIFICIO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Combrecentro'></label>: <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = ''  value = ''size='50' maxlength='50' onblur="comprobarAlfabeticoVacio('NOMBRECENTRO',50)" ><br>
					<label id='Direccioncentro'></label>: <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '150' maxlength='1 50' value = '' onblur=" comprobarAlfabeticoVacio('DIRECCIONCENTRO',150)" ><br>
					<label id='Responsablecentro'></label>: <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = ''  value = '' size='60'maxlength='60' onblur=" comprobarAlfabeticoVacio('RESPONSABLECENTRO',60)" ><br>

					<button type='submit' name='action' value='SEARCH'><img src='../View/Img/lupa.png' width="30px" height="30px"></button>
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

	} //fin SEARCH

?>