<?php
//Clase : TITULACIÓN_Vista
//Creado el : 07-10-2019
//Creado por: ncgomez17
//---
	class TITULACIÓN_SHOWCURRENT{

		//Funcion construct de la vista
		function __construct($tupla){	
			$this->tupla = $tupla;//informacion de la tupla
			$this->render();
		}
		//Funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='mostardetalles'></label> </h1>	
			<form name = 'Form' action='../Controller/TITULACIÓN_Controller.php' method='post'>
				<fieldset>
				 	<label id='Codtitulacion'></label> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' maxlength="10" value ='<?php echo $this->tupla['CODTITULACION']?>' onblur="comprobarVacio('CODTITULACION')"readonly><br>
					<label id='Codcentro'></label> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO'  size = '10' maxlength="10" value ='<?php echo $this->tupla['CODCENTRO']?>' onblur="comprobarVacio('CODCENTRO')  && comprobarLetrasNumeros('CODCENTRO',10)" readonly><br>
					<label id='Nombretitulacion'></label> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '30' maxlength="30" value ='<?php echo $this->tupla['NOMBRETITULACION']?>' onblur="comprobarVacio('NOMBRETITULACION')  && comprobarAlfabetico('NOMBRETITULACION',30)" readonly ><br>
					<label id='Responsabletitulacion'></label>  : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = 'Solo letras' size = '60' maxlength="60" value ='<?php echo $this->tupla['RESPONSABLETITULACION']?>' onblur="comprobarVacio('RESPONSABLETITULACION')  && comprobarAlfabetico('RESPONSABLETITULACION',60)"readonly ><br>

					</fieldset>

			</form>
				
		
			<div class='volver'>
			<a href='../Controller/TITULACIÓN_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
		//Incluimos el pie
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>