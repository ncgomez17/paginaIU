<?php
//Clase : ESPACIO_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class ESPACIO_ADD{

		//funcion construct de la vista
	function __construct($tupla,$tupla2){
			$this->tupla=$tupla;//informacion de los edificios
			$this->tupla2=$tupla2;//informacion de los centros	
			$this->render();
			
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='añadir'></label> </h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_espacio();">
				<fieldset>
				 	<label id='Codespacio'></label>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' maxlength='10'value = '' onblur="comprobarVacio('CODESPACIO') && comprobarLetrasNumeros('CODESPACIO',10)" required><br>
					<label id='Codedificio'></label>:<select name="CODEDIFICIO" onblur="comprobarVacio('CODEDIFICIO')">
					<?php 
						  while($temp=$this->tupla->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp['CODEDIFICIO']?>'><?php echo $temp['CODEDIFICIO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Codcentro'></label>:<select name="CODCENTRO" onblur="comprobarVacio('CODCENTRO')" required>
					<?php 
						  while($temp2=$this->tupla2->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp2['CODCENTRO']?>'><?php echo $temp2['CODCENTRO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Tipo'></label>: <select name="TIPO" onblur="comprobarVacio('TIPO')" required>
						<option id='Despacho' value="DESPACHO"></option>
		        		<option id='Laboratorio' value="LABORATORIO"></option>
		        		<option id='Pas' value="PAS"></option>
					</select>
					<br>
					<label id='Superficieespacio'></label>:<input type = 'text' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = ''  value = '' size='4' maxlength='4' onblur="comprobarVacio('SUPERFICIEESPACIO') && comprobarEntero('SUPERFICIEESPACIO',0,9999)" ><br>
					<label id='Numeroinventario'></label>:<input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '8' maxlength='8' value = '' onblur="comprobarVacio('NUMINVENTARIOESPACIO') && comprobarEntero('NUMINVENTARIOESPACIO',0,99999999)" ><br>

					<button type='submit' name='action' value='ADD'><img src='../View/Img/agregar.png' width="30px" height="30px"></button>
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

	} //fin ADD

?>