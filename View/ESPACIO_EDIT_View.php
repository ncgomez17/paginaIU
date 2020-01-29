<?php
//Clase : ESPACIO_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class ESPACIO_EDIT{

		//funcion construct de la vista
		function __construct($tupla,$tuplaEdificios,$tuplaCentros){	
			$this->tupla = $tupla;//informacion de la tupla de espacio
			$this->tuplaEdificios=$tuplaEdificios;//informacion de la tupla de los edificios
			$this->tuplaCentros=$tuplaCentros;//informacion de la tupla de  los centros
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='editar'></label> </h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_espacio();">
				<fieldset>
				 	<label id='Codespacio'></label>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' maxlength='10' value ='<?php echo $this->tupla['CODESPACIO']?>'   onblur="comprobarVacio('CODESPACIO') && comprobarLetrasNumeros('CODESPACIO',10)"readonly ><br>
					<label id='Codedificio'></label>:<select name="CODEDIFICIO" onblur="comprobarVacio('CODEDIFICIO')" required>
						<option value ='<?php echo $this->tupla['CODEDIFICIO']?>'><?php echo $this->tupla['CODEDIFICIO']; ?></option>
					<?php 
						  while($temp=$this->tuplaEdificios->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp['CODEDIFICIO']?>'><?php echo $temp['CODEDIFICIO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Codcentro'></label>:<select name="CODCENTRO" onblur="comprobarVacio('CODCENTRO')" required>
						<option value ='<?php echo $this->tupla['CODCENTRO']?>'><?php echo $this->tupla['CODCENTRO']; ?></option>
					<?php 
						  while($temp2=$this->tuplaCentros->fetch_array()){
						  ?>
						  <option value ='<?php echo $temp2['CODCENTRO']?>'><?php echo $temp2['CODCENTRO']; ?></option>
						  	<?php
						  }
								  ?>
								</select>
								<br>
					<label id='Tipo'></label>: <select name="TIPO" required>
						<option value='<?php echo $this->tupla['TIPO'] ?>'><?php echo $this->tupla['TIPO'] ?></option>
						<option id='Despacho'value="DESPACHO"></option>
		        		<option id='Laboratorio'value="LABORATORIO"></option>
		        		<option id='Pas'value="PAS"></option>
					</select>
					<br>
					<label id='Superficieespacio'></label>:<input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = ''  size='4' maxlength='4' value ='<?php echo $this->tupla['SUPERFICIEESPACIO']?>' onblur="comprobarVacio('SUPERFICIEESPACIO') && comprobarEntero('SUPERFICIEESPACIO',0,9999)" required ><br>
					<label id='Numeroinventario'></label>:<input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size='8' maxlength='8' value ='<?php echo $this->tupla['NUMINVENTARIOESPACIO']?>' onblur="comprobarVacio('NUMINVENTARIOESPACIO') && comprobarEntero('NUMINVENTARIOESPACIO',0,99999999)" required ><br>

					<button type='submit' name='action' value='EDIT'><img src='../View/Img/editar.png' width="30px" height="30px"></button>
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

	} //fin EDIT

?>