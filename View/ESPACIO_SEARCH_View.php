<?php
//Clase : ESPACIO_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class ESPACIO_SEARCH{

		//funcion construct de la vista
		function __construct($tupla,$tupla2){
		    $this->tupla=$tupla;//tupla con los edificios
		    $this->tupla2=$tupla2;//tupla con los centros
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='buscar'></label> </h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_espacio_search();" >
				<fieldset>
				 	<label id='Codespacio'></label> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' maxlength="10" value = ''  onblur="comprobarLetrasNumerosVacio('CODESPACIO',10)"><br>
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
					<label id='Codcentro'></label>:<select name="CODCENTRO">
						<option value =''></option>
					<?php 
						  while($temp2=$this->tupla2->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp2['CODCENTRO']?>'><?php echo $temp2['CODCENTRO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Tipo'></label>: <select name="TIPO">
						<option value =''></option>
						<option id='Despacho'value="DESPACHO"></option>
		        		<option id='Laboratorio'value="LABORATORIO"></option>
		        		<option id='Pas'value="PAS"></option>
					</select>
					<br>
					<label id='Superficieespacio'></label>:<input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '4' maxlength="4" value = '' onblur=" comprobarEnteroVacio('SUPERFICIEESPACIO',0,9999)" ><br>
					<label id='Numeroinventario'></label>:<input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '8' maxlength="8" value = '' onblur="comprobarEnteroVacio('NUMINVENTARIOESPACIO',0,99999999)" ><br>

					<button type='submit' name='action' value='SEARCH'><img src='../View/Img/lupa.png' width="30px" height="30px"></button>
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

	} //fin SEARCH

?>