<?php
//Clase : USUARIO_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---

	class USUARIOS_SEARCH{

		//Función construct de la vista
		function __construct(){	
			$this->render();
		}
		//Función render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='buscar'></label>:</h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post'enctype="multipart/form-data" onsubmit="return comprobar_registro_search();">
					<fieldset>
				 	<label id='Login'></label>: <input type = 'text' name = 'login' id = 'login' placeholder = '' size="9" value = '' onblur="comprobarLetrasNumerosVacio('login',15)" ><br>
					<label id='Password'></label> : <input type = 'password' name = 'password' id = 'password' placeholder = '' size = '128' maxlength="128" value = '' onblur="comprobarLetrasNumerosVacio('password',128)" ><br>
					<label id='Nombre'></label> : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' maxlength="30" value = '' onblur=" comprobarAlfabeticoVacio('nombre',30)" ><br>
					<label id='Apellidos'></label> : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' maxlength="50" value = '' onblur=" comprobarAlfabeticoVacio('apellidos',50)" ><br>
					<label id='Telefono'></label> : <input type = 'text' name = 'telefono' id = 'telefono' placeholder = 'pon tu número de teléfono' size = '11' maxlength="11" value = '' onblur="comprobarTelfVacio('telefono')"  ><br>
					<label id='Email'></label>  : <input type = 'text' name = 'email' id = 'email' size = '60' maxlength="60" value = '' onblur="comprobarEmailVacio('email',60)" ><br>

					<label id='dni'></label>  : <input type = 'text' name = 'DNI' id = 'DNI'   value = '' onblur="comprobarDniVacio('DNI')" ><br>
					<label id='Fechanacimiento'></label> : <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento' placeholder = ''  value = ''  onkeydown="return false"><br>
					<label id='Foto'></label>: <input type = 'file' name = 'fotopersonal' id = 'fotopersonal' placeholder = ''  value = ''  ><br>
					<label id='Sexo'></label> :<select name="sexo">
						<option value='' ></option>
						<option id='Hombre'value="hombre"></option>
		        		<option id='Mujer'value="mujer"></option>
					</select>
					<br>
					<button type='submit' name='action' value='SEARCH'><img src='../View/Img/lupa.png' width="30px" height="30px"></button>
					</fieldset>
			</form>
				
		
			<div class='volver'>
			<a href='../Controller/USUARIOS_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
		//Incluimos el pie
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>

	