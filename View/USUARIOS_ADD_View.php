<?php
//Clase : USUARIO_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---

	class USUARIOS_ADD{

		//Función construct de la vista
		function __construct(){	
			$this->render();
		}
		//Funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='añadir'></label>:</h1>	
			<form name = 'Form' id ="Form" action='../Controller/USUARIOS_Controller.php' method='post' enctype="multipart/form-data" onsubmit="return comprobar_registro();">
			         <fieldset>
				 	 <label id='Login'></label>: <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '15' maxlength="15" value = '' onblur="comprobarVacio('login')  && comprobarAlfabetico('login',15)" required ><br>
					<label id='Password'></label>  : <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '128' maxlength="128" value = '' onblur="comprobarVacio('password')  && comprobarLetrasNumeros('password',128)" required ><br>
					<label id='Nombre'></label> :<input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' maxlength="30" value = '' onblur="comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30)" required ><br>
					<label id='Apellidos'></label>  : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' maxlength="50" value = '' onblur="comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50)"required ><br>
					<label id='Telefono'></label>  : <input type = 'text' name = 'telefono' id = 'telefono' placeholder = 'pon tu número de teléfono' size = '11' maxlength="11" value = '' onblur="comprobarVacio('telefono')  && comprobarTelf('telefono')" required ><br>
					<label id='Email'></label> : <input type = 'text' name = 'email' id = 'email' size = '60' maxlength="60" value = '' onblur="comprobarVacio('email')  && comprobarEmail('email',60)" required ><br>

					<label id='dni'></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' maxlength="9" value = '' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')"  required><br>
					<label id='Fechanacimiento'></label> : <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento' placeholder = ''  value = '' onblur="comprobarVacio('FechaNacimiento')" onkeydown="return false" required><br>
					<label id='Foto'></label>: <input type = 'file' name = 'fotopersonal' id = 'fotopersonal' placeholder = ''  value = '' onblur="comprobarVacio('fotopersonal')" required ><br>
					<label id='Sexo'></label> :<select name="sexo" required>
						<option id='Hombre' value="hombre"></option>
		        		<option id='Mujer' value="mujer"></option>
					</select>
					
							<br>

					<button type='submit' name='action' value='ADD'><img src='../View/Img/agregar.png' width="30px" height="30px"></button>
					</fieldset>

			</form>
				
			<div class='volver'>
			<a href='../Controller/USUARIOS_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		<?php
		//incluimos el pie
			include '../View/Footer.php';
		} //fin metodo render

	} //fin add

?>

	