<?php
//Clase : PROF_TITULACION_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class PROF_TITULACION_EDIT{

		//FUNCIO CONSTRUCT DE LA VISTA
		function __construct($tupla){	
			$this->tupla = $tupla;//INFORMACION DE LA TUPLA
			$this->render();
		}
		//FUNCION RENDER PARA CREAR LA VISTA
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='editar'></label> </h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_profesor_titulacion();">
				<fieldset>
				 	<label id='dni'></label>: <input type = 'text' name = 'DNI' id = 'DNI' placeholder = ''  value ='<?php echo $this->tupla['DNI']?>' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')" readonly><br>
					<label id='Codtitulacion'></label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' value ='<?php echo $this->tupla['CODTITULACION']?>' onblur="comprobarVacio('CODTITULACION')  && comprobarLetrasNumeros('CODTITULACION',15)"readonly ><br>
					<label id='Añoacademico'></label>: <input type = 'text' name = 'ANHOACADEMICO' id ='ANHOACADEMICO' placeholder = '' size = '9'  maxlength="9"value ='<?php echo $this->tupla['ANHOACADEMICO']?>' onblur="comprobarVacio('ANHOACADEMICO')  && comprobarAnhoAcademico('ANHOACADEMICO',9)" required><br>

					<button type='submit' name='action' value='EDIT'><img src='../View/Img/editar.png' width="30px" height="30px"></button>
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

	} //fin EDIT

?>