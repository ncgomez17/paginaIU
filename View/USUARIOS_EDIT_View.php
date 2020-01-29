<?php
//Clase : USUARIO_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---

	class USUARIOS_EDIT{

		//Función construct de la vista
		function __construct($tupla){	
			$this->tupla = $tupla;//informacion de la tupla
			$this->render();
		}
		//Función render para crear la vista 
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>

		
			<h1><label id='editar'></label>:</h1>
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' enctype="multipart/form-data" onsubmit="return comprobar_registro_edit();">
					</fieldset>
		  			<label id='Login'></label>: <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '15' maxlength="15" value = '<?php echo $this->tupla['login']; ?>' onblur="comprobarVacio('login')  && comprobarAlfabetico('login',15)" readonly required><br>

					<label id='Password'></label> : <input type = 'password' name = 'password' id = 'password' placeholder = '' size = '128' maxlength="128"value = '<?php echo $this->tupla['password']; ?>' onblur="comprobarVacio('password')  && comprobarLetrasNumeros('password',128)" required><br>

					<label id='Nombre'></label> : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' maxlength="30" value = '<?php echo $this->tupla['nombre']; ?>' onblur="comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30)" required><br>

					<label id='Apellidos'></label> : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' maxlength="50"value = '<?php echo $this->tupla['apellidos']; ?>' onblur="comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50)" required><br>
					<label id='telefono'></label> : <input type = 'text' name = 'telefono' id = 'telefono' placeholder = '' size = '11' maxlength="11" value = '<?php echo $this->tupla['telefono']; ?>' onblur="comprobarVacio('telefono')&& comprobarTelf('telefono')" required ><br>

					<label id='Email'></label> : <input type = 'text' name = 'email' id = 'email' size = '60' maxlength="60" value = '<?php echo $this->tupla['email']; ?>' onblur="comprobarVacio('email')  && comprobarEmail('email',60)"required ><br>

					<label id='dni'></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' maxlength="9" value = '<?php echo $this->tupla['DNI']; ?>' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')" required><br>
					<label id='Fechanacimiento'></label> : <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento'  value = '<?php echo $this->tupla['FechaNacimiento']; ?>' onblur="comprobarVacio('FechaNacimiento')" onkeydown="return false" required ><br>
					<?php echo '<a href="'. $this->tupla['fotopersonal'], '">Image</a>';?>
					<br>
					<label id='Foto'></label>: <input type = 'file' name = 'fotopersonal' id = 'fotopersonal'  value = '<?php echo $this->tupla['fotopersonal']; ?>' onblur="comprobarVacio('fotopersonal')"><br>
					<label id='Sexo'></label> :<select name="sexo">
						<option value = '<?php echo $this->tupla['sexo']; ?>' required><?php echo $this->tupla['sexo']; ?> </option>
						<?php
						 if($this->tupla['sexo']=="mujer"){
 						 ?>
						<option id='Hombre'value="hombre"></option>
		        		<?php	
		        		}
		        		else{
		        			?>
		        		<option id='Mujer'value="mujer"></option>
		        		<?php
		        		}
		        		?>
					</select>
					<br>
					<button type='submit' name='action' value='EDIT'><img src='../View/Img/editar.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
			<br>
				
		
			<div class='volver'>
			<a href='../Controller/USUARIOS_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
		//INCLUIMOS EL PIE
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	